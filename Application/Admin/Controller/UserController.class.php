<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {

    public function login() {
        $login_name = $_POST['login_name'];
        $password = $_POST['password'];
        if(!empty($login_name) && !empty($password)) {
            $m = M('users');
            $where['login_name'] = $login_name;
            $where['password'] = md5($password);
            $exists = $m->where($where)->find();
            if ($exists) {
                session_start();
                $_SESSION['admin_id'] = $exists['id'];
                $_SESSION['admin_login_name'] = $exists['login_name'];
                $_SESSION['admin_user_name'] = $exists['user_name'];
                $this->redirect('Index/admin_index');
            } else {
                $this -> error('用户名或者密码错误');
            }

        } else {
            $this->error('用户名或密码不能为空');
        }
    }

    public function layout() {
        session(null);
        $this->redirect('index/index');
    }

    public function index() {
        $m = M('users');
        $count = $m->count();
        $page  = new \Think\Page($count,15);
        $show  = $page->show();
        $list = $m->limit($page->firstRow.','.$page->listRows)->select();
        $this->assign('list',$list);
        $this->assign('page',$show);
        $this->assign('count',$count);
        $this->display();
    }

    public function add() {
        $this->display('User/user_add');
    }

    public function add_send() {
        $login_name = trim($_POST['login_name']);
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $user_name = trim($_POST['user_name']);
        // $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $user_type = $_POST['user_type'];
        $create_time = time();
        $users = M('users');
        // $id = $_GET['id'];

        if(empty($login_name)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('登陆名不能为空');history.back();</script>";
            return;
        }
        
        if(empty($user_name)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('会员昵称不能为空');history.back();</script>";
            return;
        }
        
        if(empty($password)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('密码不能为空');history.back();</script>";
            return;
        }

        if(strlen($password)<6) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('密码不能少于6位');history.back();</script>";
            return;
        }

        if(empty($repassword)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('确认密码不能为空');history.back();</script>";
            return;
        }

        

        // if(empty($email)) {
        //     header("Content-Type:text/html;charset=utf8"); 
        //     echo "<script language=javascript>alert('邮箱不能为空');history.back();</script>";
        //     return;
        // }

        if(empty($mobile)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('手机号不能为空');history.back();</script>";
            return;
        }

        if(strlen($mobile)<11) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('手机号位数错误');history.back();</script>";
            return;
        }

        if($password != $repassword) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('两次密码不一致');history.back();</script>";
            return;
        }

        // $where = array(
        //     'login_name' => $login_name,
        //     'email' => $email,
        //     'mobile' => $mobile,
        //     '_logic' => 'or'
        // );
        
        $login_name_isset = $users->where("login_name='$login_name'")->select();
        if($login_name_isset) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('登陆名已存在');history.back();</script>";
            return;
        }

        // $email_isset = $users->where("email='$email'")->select();
        // if($email_isset) {
        //     header("Content-Type:text/html;charset=utf8"); 
        //     echo "<script language=javascript>alert('邮箱已存在');history.back();</script>";
        //     return;
        // }

        $mobile_isset = $users->where("mobile='$mobile'")->select();
        if($mobile_isset) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('手机号已存在');history.back();</script>";
            return;
        }
        // $isset = $users->where($where)->select();
        // if($isset) {
        //     header("Content-Type:text/html;charset=utf8"); 
        //     echo "<script language=javascript>alert('登陆名已存在');history.back();</script>";
        //     return;
        // }

        $data = array(
            'login_name' => $login_name,
            'password' => md5($password),
            'user_name' => $user_name,
            'mobile' => $mobile,
            'type' => $user_type,
            'create_time' => $create_time
        );

        $res = $users->add($data);
        if ($res) {
            $this->success('添加成功');
        } else {
            $this->error('添加失败');
        }
    }

    public function edit() {
        $id = $_GET['id'];
        $users = M('users')->where("id='$id'")->find();
        // dump($users);exit;
        $this->assign('users',$users);
        $this->display();
    }

    public function update() {
        $id = $_GET['id'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $user_name = trim($_POST['user_name']);
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $user_type = $_POST['user_type'];
        $users = M('users');
        if(empty($user_name)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('会员昵称不能为空');history.back();</script>";
            return;
        }
        
        if(empty($password)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('密码不能为空');history.back();</script>";
            return;
        }

        if(strlen($password)<6) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('密码不能少于6位');history.back();</script>";
            return;
        }

        if(empty($repassword)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('确认密码不能为空');history.back();</script>";
            return;
        }

        

        if(empty($email)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('邮箱不能为空');history.back();</script>";
            return;
        }

        if(empty($mobile)) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('手机号不能为空');history.back();</script>";
            return;
        }

        if(strlen($mobile)<11) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('手机号位数错误');history.back();</script>";
            return;
        }

        if($password != $repassword) {
            header("Content-Type:text/html;charset=utf8"); 
            echo "<script language=javascript>alert('两次密码不一致');history.back();</script>";
            return;
        }

        $data = array(
            'password' => md5($password),
            'user_name' => $user_name,
            'email' => $email,
            'mobile' => $mobile,
            'type' => $user_type,
        );

        $res = $users->where("id='$id'")->save($data);
        if ($res) {
            $this->success('修改成功');
        } else {
            $this->error('修改失败');
        }
    }

    public function del() {
        $id = $_GET['id'];
        $users = M('users');
        $res = $users->where("id='$id'")->delete();
        if ($res) {
            $this->success('删除成功');
        } else {
            $this->error('删除失败');
        }
    }
}