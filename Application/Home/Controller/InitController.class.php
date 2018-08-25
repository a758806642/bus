<?php
namespace Home\Controller;
use Think\Controller;
class InitController extends Controller {

    protected $bai = [
        'Order' => ['travel'],
        'Order' => ['rent_order'],
        'Order' => ['shuttle_order'],
    ];
    public function _initialize() {
        
        $controller = CONTROLLER_NAME;
        $action = ACTION_NAME;
        if(isset($this->bai[$controller])) {
            if(in_array($action,$this->bai[$controller])) {

            } else {
                $user_id = session('user_id');
                if(empty($user_id)) {
                    $this->redirect('Index/login');
                }
            }
        } else {
            $user_id = session('user_id');
            if(empty($user_id)) {
                $this->redirect('Index/login');
            }
        }
        
    }

}