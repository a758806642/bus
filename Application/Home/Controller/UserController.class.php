<?php
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    
    public function personal() {
        $user_id = $_SESSION['user_id'];
        $user = M('users')->where("id='$user_id'")->field('user_name,login_name,mobile,type')->find();
        $this->assign('user',$user);
        $this->display('personal_data');
    }

    public function update_personal() {
        $user_id = $_SESSION['user_id'];
        $user_name = $_POST['user_name'];
        $login_name = $_POST['login_name'];
        $data = array(
            'user_name' => $user_name,
            'login_name' => $login_name,
        );

        $res = M('users')->where("id='$user_id'")->save($data);
        $this->ajaxReturn($res,'json');
    }

    public function check_password() {
        $this->ajaxReturn('1');
    }

    public function change_password() {
        $this->display('change_password');
    }

    public function update_password() {
        $user_id = $_SESSION['user_id'];
        $oldpassword = md5($_POST['oldpassword']);
        $npassword = md5($_POST['npassword']);
        $cpassword = md5($_POST['cpassword']);
        $u_password = M('users')->where("id='$user_id'")->field('password')->find();

        if($oldpassword != $u_password['password']) {
            $res = -1;
            $this->ajaxReturn($res,'json');
        }

        if($npassword != $cpassword) {
            $res = -2;
            $this->ajaxReturn($res,'json');
        }

        $data = array(
            'password' => $npassword,
        );

        $res = M('users')->where("id='$user_id'")->save($data);
        $this->ajaxReturn($res,'json');
    }
}