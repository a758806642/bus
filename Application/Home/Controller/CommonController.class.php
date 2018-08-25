<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    
    public function agreement() {
        $this->display('agreement');
    }

    public function attention() {
        $this->display('attention');
    }
}