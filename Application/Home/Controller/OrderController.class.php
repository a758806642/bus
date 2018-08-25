<?php

namespace Home\Controller;

use Think\Controller;

class OrderController extends InitController
{
    public function travel()
    {
        $where['car_type'] = array('like', '%0%');
        $where['is_show'] = 0;
        $car_list = M('car')->where($where)->select();
        $this->assign('car_list', $car_list);
        $this->display('travel_order');
    }

    public function travel_order()
    {
        $user_id = $_SESSION['user_id'];
        $rental_type = $_POST['rental_type'];
        // $transport_data = $_POST['transport_data'];
        $order_type = $_POST['order_type'];
        // $total = $_POST['total'];   // 共有几天行程
        $car_id = $_POST['car_id'];
        $car_number = $_POST['car_number'];
        $travel = $_POST['travel'];

        cookie('travel', json_encode($travel));

        $user = M('users')->where("id='$user_id'")->find();
        $this->assign('user', $user);
        $this->assign('rental_type', $rental_type);
        $this->assign('order_type', $order_type);
        $this->assign('total', $total);
        $this->assign('car_id', $car_id);
        $this->assign('car_number', $car_number);
        $this->assign('travel', $travel);
        $this->display('travel_order_send');

    }

    public function travel_order_info()
    {
        $user_id = $_SESSION['user_id'];
        $travel = json_decode(cookie('travel'), true);    // 拆分
        $rental_type = $_POST['rental_type'];
        $order_type = 0;
        $car_id = $_POST['car_id'];
        $car_number = $_POST['car_number'];
        // $transport_data = $_POST['transport_data'];

        $order_level = $_POST['order_level'];
        $remark = $_POST['remark'];
        $notifyCarTeam = $_POST['notifyCarTeam']; // 短信
        $travel_username = $_POST['travel_username'];
        $travel_mobile = $_POST['travel_mobile'];
        $order_num = chr(rand(65, 90)) . time();
        $transport_time = strtotime($travel[1]['date'][0] . ' ' . $travel[1]['hours'][0] . ':' . $travel[1]['minutes'][0]);

        $data = array(
            'user_id' => $user_id,
            'car_id' => $car_id,
            'order_num' => $order_num,
            'rental_type' => $rental_type,
            'order_type' => $order_type,
            'car_number' => $car_number,
            'order_level' => $order_level,
            'travel_username' => $travel_username,
            'travel_mobile' => $travel_mobile,
            'transport_time' => $transport_time,
            'remark' => $remark,
            'order_status' => 1,
            'create_time' => time(),
        );

        $order_id = M('order')->getLastInsID($data);    // 函数改了
        if ($order_id !== 0) {
            foreach ($travel as $k => $v) {
                $k++;
                $ins = array(
                    'order_id' => $order_id,
                    'transport_time' => $transport_time,
                    'travel_start' => $v['travel_start'],
                    'start_address' => $v['travel_address'],
                    'fromjw' => $v['fromjw'],
                    'fromaddr' => $v['fromaddr'],
                    'travel_end' => $v['travel_end'],
                    'end_address' => $v['end_address'],
                    'tojw' => $v['tojw'],
                    'toaddr' => $v['toaddr'],
                );

                $busline_id = M('busline')->getLastInsID($ins);

                if ($v['total'] != 0) {
                    for ($i = 1; $i <= $v['total']; $i++) {
                        $v_ins = array(
                            'busline_id' => $busline_id,
                            'path' => $v["path$i"],
                            'path_address' => $v["pathname$i"],
                            'pathjw' => $v["pathjw$i"],
                            'pathaddr' => $v["pathjw$i"],
                        );

                        $via = M('via')->add($v_ins);
                    }
                }
            }

            $this->success('提交成功', U('Order/order_list', array('type' => 0)));
        } else {
            $this->error('提交失败');
        }

    }

    public function order_list()
    {
        $user_id = $_SESSION['user_id'];
        $order_type = $_REQUEST['type'];
        $status = $_REQUEST['status'];

        $start_time = $_REQUEST['start_time'];
        $end_time = $_REQUEST['end_time'];
        $order_num = $_REQUEST['order_num'];

        if ($order_type == 0) {

            $m = M('order as o');
            $where['o.user_id'] = $user_id;
            $where['o.order_type'] = $order_type;
            if (!empty($status)) {
                $where['o.order_status'] = $status;
            }

            if (!empty($start_time) && empty($end_time)) {
                $where['o.transport_time'] = array('egt', strtotime($start_time));
            }

            if (!empty($end_time) && empty($start_time)) {
                $where['o.transport_time'] = array('elt', strtotime($end_time));
            }

            if (!empty($start_time) && !empty($end_time)) {
                $where['o.transport_time'] = array('between', array(strtotime($start_time), strtotime($end_time)));
            }

            if (!empty($order_num)) {
                $where['o.order_num'] = array('like', '%' . $order_num . '%');
            }

            import('ORG.Util.Page');
            $count = $m->where($where)->count();
            $Page = new \Think\Page($count, 10);
            $show = $Page->show();
            $order_list = $m->join('__CAR__ as c on c.id = o.car_id')->where($where)->order('o.create_time DESC')->limit($Page->firstRow . ',' . $Page->listRows)->field('o.*,c.car_name')->select(); // $Page->firstRow 起始条数 $Page->listRows 获取多少条
            // dd($order_list);
            $this->assign('order_list', $order_list);
            $this->assign('status', $status);
            $this->assign('page', $show);
            $this->assign('count', $count);
            $this->assign('order_num', $order_num);
            $this->assign('start_time', $start_time);
            $this->assign('end_time', $end_time);
            $this->display('travel_order_list');
        } elseif ($order_type == 1) {

            $where['o.user_id'] = $user_id;
            $where['o.order_type'] = $order_type;
            if (!empty($status)) {
                $where['o.order_status'] = $status;
            }

            if (!empty($start_time) && empty($end_time)) {
                $where['o.transport_time'] = array('egt', strtotime($start_time));
            }

            if (!empty($end_time) && empty($start_time)) {
                $where['o.transport_time'] = array('elt', strtotime($end_time));
            }

            if (!empty($start_time) && !empty($end_time)) {
                $where['o.transport_time'] = array('between', array(strtotime($start_time), strtotime($end_time)));
            }

            if (!empty($order_num)) {
                $where['o.order_num'] = array('like', '%' . $order_num . '%');
            }

            import('ORG.Util.Page');
            $count = M('order as o')->where($where)->count();
            $Page = new \Think\Page($count, 10);
            $show = $Page->show();
            $order_list = M('order as o')
                ->join('__BUSLINE__ as b on b.order_id=o.id')
                ->join('__CAR__ as c on c.id=o.car_id')
                ->where($where)
                ->order('o.create_time DESC')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->field('o.*,c.car_name,b.travel_start,b.start_address,b.travel_end,b.end_address')
                ->select();
            // dd($order_list);
            $this->assign('order_list', $order_list);
            $this->assign('status', $status);
            $this->assign('page', $show);
            $this->assign('count', $count);
            $this->assign('order_num', $order_num);
            $this->assign('start_time', $start_time);
            $this->assign('end_time', $end_time);
            $this->display('rent_order_list');
        } elseif ($order_type == 2) {

            $where['o.user_id'] = $user_id;
            $where['o.order_type'] = $order_type;
            if (!empty($status)) {
                $where['o.order_status'] = $status;
            }

            if (!empty($start_time) && empty($end_time)) {
                $where['o.transport_time'] = array('egt', strtotime($start_time));
            }

            if (!empty($end_time) && empty($start_time)) {
                $where['o.transport_time'] = array('elt', strtotime($end_time));
            }

            if (!empty($start_time) && !empty($end_time)) {
                $where['o.transport_time'] = array('between', array(strtotime($start_time), strtotime($end_time)));
            }

            if (!empty($order_num)) {
                $where['o.order_num'] = array('like', '%' . $order_num . '%');
            }

            import('ORG.Util.Page');
            $count = M('order as o')->where($where)->count();
            $Page = new \Think\Page($count, 10);
            $show = $Page->show();
            $order_list = M('order as o')
                ->join('__BUSLINE__ as b on b.order_id=o.id')
                ->join('__CAR__ as c on c.id = o.car_id')
                ->where($where)
                ->order('o.create_time DESC')
                ->limit($Page->firstRow . ',' . $Page->listRows)
                ->field('o.*,c.car_name,b.travel_start,b.start_address,b.travel_end,b.end_address,b.service_type')
                ->select();
            // dd($order_list);
            $this->assign('order_list', $order_list);
            $this->assign('status', $status);
            $this->assign('page', $show);
            $this->assign('count', $count);
            $this->assign('order_num', $order_num);
            $this->assign('start_time', $start_time);
            $this->assign('end_time', $end_time);
            $this->display('shuttle_order_list');
        }

    }

    public function rent_order()
    {
        // $m = M('car')->where('');
        $this->display('rent_order');
    }

    public function car_list()
    {
        $car_id = rtrim($_REQUEST['car_id'], ',');
        $car_type = $_REQUEST['car_type'];
        $cityName = $_REQUEST['cityName'];
        $tenancy = intval($_REQUEST['tenancy']) == 999 ? 0.7 : intval($_REQUEST['tenancy']);
//        $this->ajaxReturn($tenancy, 'JSON');

        $m = M('car as c');
        $where['c.is_show'] = 0;

        if ($car_id) {
            $c_id = explode(',', $car_id);
            $where['c.id'] = array('in', $c_id);

        } else {
            $where['c.car_type'] = array('like', '%' . $car_type . '%');

        }

        $c_list = $m->where($where)->select();
        foreach ($c_list as $v) {
            $map['car_id'] = $v['id'];
            $map['city'] = $cityName;
            $city_price = M('cityprice')->where($map)->field('city_price')->find();

            $car_list[] = array(
                'id' => $v['id'],
                'car_name' => $v['car_name'],
                'people_num' => $v['people_num'],
                'bags_num' => $v['bags_num'],
                'equivalent' => $v['equivalent'],
                'car_price' => $v['car_price'],
                'score' => $v['score'],
                'car_type' => $v['car_type'],
                'is_show' => $v['is_show'],
                'car_pic' => $v['car_pic'],
                'create_time' => $v['create_time'],
                'city_price' => !empty($city_price['city_price']) ? intval($city_price['city_price'] * $tenancy) : '',
            );

        }

        $this->ajaxReturn($car_list, 'JSON');
    }

    public function car_type_list()
    {
        $car_type = $_REQUEST['car_type'];
        $m = M('car');
        $where['is_show'] = 0;
        $where['car_type'] = array('like', '%' . $car_type . '%');
        $car_list = $m->where($where)->select();
        $this->ajaxReturn($car_list, 'JSON');
    }

    public function rent_order_send()
    {
        $car_id = $_REQUEST['id'];
        $product['city_name'] = $_REQUEST['cityName'];
        $product['days'] = $_REQUEST['days'];
        $date = $_REQUEST['date'];
        $hour = $_REQUEST['hour'];
        $minute = $_REQUEST['minute'];
        $price = base64_decode($_REQUEST['p']);
        $product['car'] = M('car')->where("id='$car_id'")->field('id,car_name,car_price')->find();
        $product['transport_data'] = $date . ' ' . $hour . ':' . $minute;
        $user_id = $_SESSION['user_id'];
        $user = M('users')->where("id='$user_id'")->find();
        $map['city'] = trim($product['city_name']);
        $map['car_id'] = $car_id;
        $this->assign('product', $product);
        $this->assign('price', $price);
        $this->assign('user', $user);
        $this->display('rent_order_send');
    }

    public function rent_order_pay()
    {
//dd($_REQUEST);
        $car_id = $_REQUEST['car_id'];
        $transport_time = $_REQUEST['transport_data'];
        $days = $_REQUEST['days'];
        $travel = $_REQUEST['travel'][1];
        $remark = $_REQUEST['remark'];
        $travel_username = $_REQUEST['travel_username'];
        $travel_mobile = $_REQUEST['travel_mobile'];
        $city_name = $_REQUEST['city_name'];
        $price = $_REQUEST['price'];
        $user_id = $_SESSION['user_id'];
        $order_type = 1;
        $order_num = chr(rand(65, 90)) . time();
//dd($price);
        $data = array(
            'user_id' => $user_id,
            'car_id' => $car_id,
            'order_price' => $price,
            'order_num' => $order_num,
            'order_type' => $order_type,
            'travel_username' => $travel_username,
            'travel_mobile' => $travel_mobile,
            'transport_time' => strtotime($transport_time),
            'days' => $days,
            'remark' => $remark,
            'order_status' => 8,
            'create_time' => time(),
        );

        $order_id = M('order')->getLastInsID($data);
        if ($order_id !== 0) {

            $ins = array(
                'order_id' => $order_id,
                'transport_time' => strtotime($transport_time),
                'travel_start' => $travel['travel_start'],
                'start_address' => $travel['travel_address'],
                'fromjw' => $travel['fromjw'],
                'fromaddr' => $travel['fromaddr'],
                'travel_end' => $travel['travel_end'],
                'end_address' => $travel['end_address'],
                'tojw' => $travel['tojw'],
                'toaddr' => $travel['toaddr'],
            );

            $busline_id = M('busline')->getLastInsID($ins);

            if ($travel['total'] != 0) {
                for ($i = 1; $i <= $travel['total']; $i++) {
                    $v_ins = array(
                        'busline_id' => $busline_id,
                        'path' => $travel["path$i"],
                        'path_address' => $travel["pathname$i"],
                        'pathjw' => $travel["pathjw$i"],
                        'pathaddr' => $travel["pathjw$i"],
                    );

                    $via = M('via')->add($v_ins);
                }
            }

            $car = M('car')->where("id='$car_id'")->field('car_price,car_name')->find();
            $map['cai_id'] = $car_id;
            $map['city_name'] = $city_name;
            $this->assign('price', $price);
            $this->assign('car', $car);
            $this->assign('transport_time', $transport_time);
            $this->assign('days', $days);
            $this->assign('order_type', $order_type);
            $this->assign('city_name', $city_name);
            $this->display('order_pay');

        } else {
            $this->error('异常');

        }

    }

    public function wxpay()
    {
        $price = base64_decode($_REQUEST['p']);
        $id = $_REQUEST['id'];
        $order_type = $_REQUEST['order_type'];

        $this->assign('price', $price);
        $this->assign('id', $id);
        $this->assign('order_type', $order_type);
        $this->display();
    }

    public function shuttle_order()
    {
        $this->display('shuttle_order');
    }

    public function shuttle_order_send()
    {
        // dd($_REQUEST);
        $car_id = $_REQUEST['id'];
        $travel_start = $_REQUEST['travel_start'];
        $travel_end = $_REQUEST['travel_end'];
        $travel_end_address = $_REQUEST['travel_end_address'];
        $date = $_REQUEST['date'];
        $hour = $_REQUEST['hour'];
        $minute = $_REQUEST['minute'];
        $transport_time = $date . ' ' . $hour . ':' . $minute;
        // dd($transport_time);

        $this->display('shuttle_order_send');

    }

    public function shuttle_order_pay()
    {
        // dd($_REQUEST);
        $productID = $_REQUEST['productID'];
        $travel_username = $_REQUEST['BookerName'];
        $travel_mobile = $_REQUEST['BookerTelephone'];
        $transport_time = $_REQUEST['useTime'];
        $travel_start = $_REQUEST['departAddress'];
        $travel_end = $_REQUEST['travel_end'];
        $travel_end_address = $_REQUEST['arriveAddress'];
        $car_id = $_REQUEST['car_id'];
        $user_id = $_SESSION['user_id'];
        $departLongitude = $_REQUEST['departLongitude'];
        $departLatitude = $_REQUEST['departLatitude'];
        $fromjw = $departLongitude . ',' . $departLatitude;
        $arriveLongitude = $_REQUEST['arriveLongitude'];
        $arriveLatitude = $_REQUEST['arriveLatitude'];
        $tojw = $arriveLongitude . ',' . $arriveLatitude;
        $order_type = 2;
        $order_num = chr(rand(65, 90)) . time();

        $data = array(
            'user_id' => $user_id,
            'car_id' => $car_id,
            'order_num' => $order_num,
            'order_type' => $order_type,
            'travel_username' => $travel_username,
            'travel_mobile' => $travel_mobile,
            'transport_time' => strtotime($transport_time),
            'order_status' => 1,
            'create_time' => time(),
        );

        $order_id = M('order')->getLastInsID($data);
        if ($order_id !== 0) {

            // 注意： 因为 接送机/火车，出发目地地正好相反，所以存入判断是否取反值
            if ($productID == 2 || $productID == 4) {
                $ins = array(
                    'order_id' => $order_id,
                    'transport_time' => strtotime($transport_time),
                    'travel_start' => $travel_end,
                    'fromjw' => $tojw,
                    'start_address' => $travel_end_address,
                    'travel_end' => $travel_start,
                    'tojw' => $fromjw,
                    'service_type' => $productID,

                );
            } else {
                $ins = array(
                    'order_id' => $order_id,
                    'transport_time' => strtotime($transport_time),
                    'travel_start' => $travel_start,
                    'fromjw' => $fromjw,
                    'travel_end' => $travel_end,
                    'end_address' => $travel_end_address,
                    'tojw' => $tojw,
                    'service_type' => $productID,

                );
            }

            $busline_id = M('busline')->add($ins);


        }

        $car = M('car')->where("id='$car_id'")->field('car_price,car_name')->find();


        $this->assign('car', $car);
        $this->assign('order_type', $order_type);
        $this->assign('travel_start', $travel_start);
        $this->assign('transport_time', $transport_time);
        $this->assign('travel_end', $travel_end);
        $this->assign('travel_end_address', $travel_end_address);
        $this->display('order_pay');

    }

    public function order_detail()
    {

        $order_id = $_REQUEST['id'];
        $order_type = $_REQUEST['type'];
        $order_data = M('order')->where("id='$order_id'")->find();
        $car_id = $order_data['car_id'];
        $car_data = M('car')->where("id='$car_id'")->find();
        $busline = M('busline')->where("order_id='$order_id'")->order('id ASC')->select();
        foreach ($busline as $v) {
            $busline_id = $v['id'];
            $via[] = M('via')->where("busline_id='$busline_id'")->select();
        }

        $this->assign('order_data', $order_data);
        $this->assign('car_data', $car_data);
        $this->assign('busline', $busline);
        $this->assign('via', $via);
        $this->assign('order_type', $order_type);
        $this->display('order_detail');
    }

    // 已付款
    public function pay_finish()
    {
        $id = $_REQUEST['id'];
        $order_type = $_REQUEST['order_type'];
        $res = M('order')->where("id='$id'")->save(['order_status' => 3]);
        $this->redirect('Home/Order/order_list?type=' . $order_type);

    }

    // 取消订单
    public function order_cancel()
    {
        $id = $_REQUEST['id'];
        $res = M('order')->where("id='$id'")->save(['order_status' => 7]);
        $this->ajaxReturn($res);
    }

}