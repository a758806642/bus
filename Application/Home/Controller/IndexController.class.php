<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $user_id = $_SESSION['user_id'];
        // dump($user_id);
        $a = $_SESSION['user_id'];
        if($user_id) {
            $user = M('users')->where("id='$user_id'")->find();
            $this->assign('user',$user);
        }
        
        $this->display();

    }

    public function city() {
        // 创建一个新cURL资源
        $ch = curl_init();
        $url = 'http://www.5bus.cn/Common/GetAllCity';
        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 抓取URL并把它传递给浏览器
        curl_exec($ch);
        $contents = curl_multi_getcontent($ch);
        // 关闭cURL资源，并且释放系统资源
        curl_close($ch);
        // echo "<pre>";
        // print_r(  );die;
        die(json_encode(json_decode($contents,true),JSON_UNESCAPED_UNICODE));
    }

    public function login() {
        $this->display('Login/index');
    }

    public function login_send() {
        $login_name = $_POST['login_name'];
        $password = $_POST['password'];
        if(empty($login_name) || empty($password)) {
            $this->error('帐号密码不能为空');
        }

        $m = M('users');
        $where['login_name'] = $login_name; 
        $where['mobile'] = $login_name; 
        $where['_logic'] = 'or'; 
        $map['_complex'] = $where; 
        $map['password'] = md5($password);
        $map['admin_type'] = 0;
        $res = $m->where($map)->find();
        if($res) {
            session_start();
            $_SESSION['user_id'] = $res['id'];
            $_SESSION['user_name'] = $res['user_name'];
            $this->redirect('Index/index');
        } else {
            $this->error('帐号密码错误');
        }
    }

    public function layout() {
        session(null);
        $this->redirect('Index/index');
    }

    public function reg() {
        $this->display('Register/index');
    }

    public function reg_send() {
        $login_name = $_POST['login_name'];
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];
        $repassword = $_POST['repassword'];
        $company_name = $_POST['company_name'];
        $province = $_POST['province'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $user_name = $_POST['user_name'];
        $code = $_POST['code'];
        $user_type = $_POST['user_type'];
        $create_time = time();

        if(empty($code)) {
            $this->error('验证码不能为空');
        }
        // $code = I('param.user_verify','');
        if(check_verify($code) === true){
            if(empty($login_name)) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('登陆名不能为空');history.back();</script>";
                return;
            }
            
            if(empty($mobile)) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('手机号不能为空');history.back();</script>";
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
    
            
            if($user_type == 0 || $user_type == 2) {
                if(empty($company_name)) {
                    header("Content-Type:text/html;charset=utf8"); 
                    echo "<script language=javascript>alert('企业名称不能为空');history.back();</script>";
                    return;
                }
        
                if(empty($province)) {
                    header("Content-Type:text/html;charset=utf8"); 
                    echo "<script language=javascript>alert('所在地不能为空');history.back();</script>";
                    return;
                }

                if(empty($address)) {
                    header("Content-Type:text/html;charset=utf8"); 
                    echo "<script language=javascript>alert('详细地址不能为空');history.back();</script>";
                    return;
                }

                if(empty($tel)) {
                    header("Content-Type:text/html;charset=utf8"); 
                    echo "<script language=javascript>alert('固定电话不能为空');history.back();</script>";
                    return;
                }
            }
                
    
            if(strlen($mobile)<11) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('手机号位数错误');history.back();</script>";
                return;
            }

            if(empty($user_name)) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('联系人不能为空');history.back();</script>";
                return;
            }
    
            if($password != $repassword) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('两次密码不一致');history.back();</script>";
                return;
            }

            $m = M('users');
            $login_name_isset = $m->where('login_name="'.$login_name.'"')->select();
            if($login_name_isset) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('登陆名已存在');history.back();</script>";
                return;
            }

            $mobile_isset = $m->where('mobile="'.$mobile.'"')->select();
            if($mobile_isset) {
                header("Content-Type:text/html;charset=utf8"); 
                echo "<script language=javascript>alert('手机号已存在');history.back();</script>";
                return;
            }

            $data = array(
                'login_name' => $login_name,
                'password' => md5($password),
                'user_name' => $user_name,
                'company_name' => $company_name,
                'province' => $province,
                'address' => $address,
                'tel' => $tel,
                'mobile' => $mobile,
                'type' => $user_type,
                'create_time' => $create_time
            );
    
            $res = $m->add($data);
            if ($res) {
                $this->success('添加成功',U('Index/index'));
            } else {
                $this->error('添加失败');
            }
            
        } else {
            $this->error('验证码错误');
        }

    }

    /** 
     *  
     * 验证码生成 
     */  
    public function verify_c(){  
        $Verify = new \Think\Verify();  
        $Verify->fontSize = 18;  
        $Verify->length   = 4;  
        $Verify->useNoise = false;  
        $Verify->codeSet = '0123456789';  
        $Verify->imageW = 130;  
        $Verify->imageH = 50;  
        //$Verify->expire = 600;  
        $Verify->entry();  
    } 

    public function detail_address() {
        $hot = $_POST['hot'];
        $type = $_POST['type'];
        $cityID = $_POST['cityID'];
        // 创建一个新cURL资源
        $ch = curl_init();
        $url = 'http://www.5bus.cn/Transfer/GetDetailAddress?hot='.$hot.'&type='.$type.'&cityID='.$cityID.'';
        // 设置URL和相应的选项
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 抓取URL并把它传递给浏览器
        curl_exec($ch);
        $contents = curl_multi_getcontent($ch);
        // 关闭cURL资源，并且释放系统资源
        curl_close($ch);
        // echo $contents;

        // echo "<pre>";
        // print_r(  );die;
        die(json_encode(json_decode($contents,true),JSON_UNESCAPED_UNICODE));


    }

}