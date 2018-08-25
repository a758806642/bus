<?php
namespace Admin\Controller;
use Think\Controller;
use think\Image;
class OrderController extends Controller {

    public function order_list() {
        // dd($_REQUEST);
        $order_type = $_REQUEST['type'];
        $status = $_REQUEST['status'];
        $start_time = $_REQUEST['start_time'];
        $end_time = $_REQUEST['end_time'];
        $order_num = $_REQUEST['order_num'];
// dd($order_type);
        if(!empty($status)) {
            $where['o.order_status'] = $status;
        }
        
        if(!empty($start_time) && empty($end_time)) {
            $where['o.transport_time'] = array('egt',strtotime($start_time));
        }

        if(!empty($end_time) && empty($start_time)) {
            $where['o.transport_time'] = array('elt',strtotime($end_time));
        }

        if(!empty($start_time) && !empty($end_time)) {
            $where['o.transport_time'] = array('between',array(strtotime($start_time),strtotime($end_time)));
        }

        if(!empty($order_num)) {
            $where['o.order_num'] = array('like','%'.$order_num.'%');
        }

        import('ORG.Util.Page');
        $m = M('order as o');
        $where['o.order_type'] = $order_type;
        $count = $m->where($where)->count();
        $Page = new \Think\Page($count,10);
        $show = $Page->show();
        if($order_type == 0) {
            $order_list = $m->where($where)->order('create_time DESC')->limit($Page->firstRow.','.$Page->listRows)->select(); 
        } elseif ($order_type == 1) {
            $order_list = $m
                    ->join('__BUSLINE__ as b on b.order_id=o.id')
                    ->join('__CAR__ as c on c.id = o.car_id')
                    ->field('o.*,c.car_name,b.travel_start')
                    ->where($where)
                    ->order('o.create_time DESC')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select(); 
        } elseif ($order_type == 2) {
            $order_list = $m
                    ->join('__BUSLINE__ as b on b.order_id=o.id')
                    ->join('__CAR__ as c on c.id = o.car_id')
                    ->field('o.*,c.car_name,b.travel_start,b.service_type')
                    ->where($where)
                    ->order('o.create_time DESC')
                    ->limit($Page->firstRow.','.$Page->listRows)
                    ->select(); 
        }

        // dd($order_list);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->assign('order_list',$order_list);
        $this->assign('status',$status);
        $this->assign('order_num',$order_num);
        $this->assign('start_time',$start_time);
        $this->assign('end_time',$end_time);
        if($order_type == 0) {
            $this->display('travel_order_list');
        } elseif ($order_type == 1) {
            $this->display('rent_order_list');
        } elseif ($order_type == 2) {
            $this->display('shuttle_order_list');
        }
    }

    public function order_detail() {
        $order_id = $_REQUEST['order_id'];
        $order_type = $_REQUEST['type'];
        $order_data = M('order')->where("id='$order_id'")->find();
        $car_id = $order_data['car_id'];
        $car_data = M('car')->where("id='$car_id'")->find();
        $busline = M('busline')->where("order_id='$order_id'")->order('id ASC')->select();
        
        foreach($busline as $v) {
            $busline_id = $v['id'];
            // dd($busline_id);
            $via[] = M('via')->where("busline_id='$busline_id'")->select();
        }

        $this->assign('order_data',$order_data);
        $this->assign('car_data',$car_data);
        $this->assign('busline',$busline);
        $this->assign('via',$via);
        // dd($busline);
        if($order_type == 0) {
            $this->display('travel_order_detail');
        } elseif ($order_type == 1) {
            $this->display('rent_order_detail');
        } elseif ($order_type == 2) {
            $this->display('shuttle_order_detail');
        }
    }

    // 待报价修改
    public function ajax_update() {
        $id = $_POST['id'];
        $order_price = $_POST['order_price'];
        $order_status = 2;
        $data = array(
            'order_price' => $order_price,
            'order_status' => 2,
        );
        $res = M('order')->where("id='$id'")->save($data);
        $this->ajaxReturn($res);
    }

    // 确认订单
    public function order_verify() {
        $id = $_POST['id'];
        $res = M('order')->where("id='$id'")->save(['order_status'=>4]);
        $this->ajaxReturn($res);
    }

    // 派车
    public function ajax_send_car() {
        $id = $_POST['id'];
        $res = M('order')->where("id='$id'")->save(['order_status'=>5]);
        $this->ajaxReturn($res);
    }

    // 完成
    public function ajax_order_finish() {
        $id = $_POST['id'];
        $res = M('order')->where("id='$id'")->save(['order_status'=>6]);
        $this->ajaxReturn($res);
    }



}