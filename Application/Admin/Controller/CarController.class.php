<?php
namespace Admin\Controller;
use Think\Controller;
use think\Image;
class CarController extends Controller {
    public function index(){
        $m = M('car');
        $count = $m->count();
        $page  = new \Think\Page($count,15);
        $show  = $page->show();
        $car_list = $m->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('car_list',$car_list);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->display();
    }

    public function add() {
        $this->display('car_add');
    }

    public function add_send() {
        $car_name = $_POST['car_name'];
        $people_num = $_POST['people_num'];
        $bags_num = $_POST['bags_num'];
        $equivalent = $_POST['equivalent'];
        $score = $_POST['score'];
        $car_price = $_POST['car_price'];
        $car_type = implode(',',$_POST['car_type']);
        $is_show = $_POST['is_show'];
        $is_show = $_POST['is_show'];
        $create_time = time();
        $id = $_GET['id'];
        $m = M('car');
        
        // 上传文件 
        $info = $this->upload();
        if(!$info) {
            $car_pic = $_POST['car_pic'];
        } else {
            $car_pic = $info['pic_files']['savepath'].$info['pic_files']['savename'];
        }
        
        if(empty($car_name) || empty($people_num) || empty($bags_num) || empty($equivalent) || empty($score) || empty($car_price) || empty($car_pic) || (empty($car_type) && $car_type != 0)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('信息不可为空');history.back();</script>";
            return;
        }

        $data = array(
            'car_name' => $car_name,
            'people_num' => $people_num,
            'bags_num' => $bags_num,
            'equivalent' => $equivalent,
            'score' => $score,
            'car_price' => $car_price,
            'car_type' => $car_type,
            'is_show' => $is_show,
            'car_pic' => $car_pic,
        );

        if(empty($id)) {
            $data['create_time'] = $create_time;
            $res = $m->add($data);
            if ($res) {
                $this->success('添加成功',U('Car/index'));
            } else {
                $this->error('添加失败');
            }
        } elseif ($id) {
            $res = $m->where("id='$id'")->save($data);
            // dump($res);die;
            if ($res !== false) {
                $this->success('修改成功',U('Car/index'));
            } else {
                $this->error('修改失败');
            }
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $car = M('car')->where("id='$id'")->find();
        $this->assign('car',$car);
        $this->display('car_edit');
    }

    public function del() {
        $id = $_GET['id'];
        $car = M('car');
        $res = $car->where("id='$id'")->delete();
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }

    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   = 3145728 ;// 设置附件上传大小
        $upload->exts      = array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  = 'Application/Admin/Uploads/'; // 设置附件上传根目录
        $upload->savePath  = ''; // 设置附件上传（子）目录
        // 上传文件 
        $info = $upload->upload();
        return $info;
    }


}