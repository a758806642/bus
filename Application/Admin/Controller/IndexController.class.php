<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $this->display('Login/login');
    }

    public function admin_index() {

        $this->display('index');
    }
}