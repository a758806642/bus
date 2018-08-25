<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/8/20
 * Time: 17:50
 */

namespace Admin\Controller;


use Think\Controller;

class CityController extends Controller
{
    public function city_price() {
        $where['car_type'] = array('like', '%1%');
        $car = M('car')->where($where)->select();
        $this->assign('car',$car);
        $this->display();
    }

    public function city_price_info(){
        $city = $_POST['city'];
        $city_price = $_POST['city_price'];
        $car_id = $_POST['car_id'];
        $data = array(
            'city' => $city,
            'city_price' => $city_price,
            'car_id' => $car_id,
        );

        $where = array(
            'city' => $city,
            'car_id' => $car_id,
        );
        $isset = M('cityprice')->where($where)->find();
        if($isset) {
            $res = M('cityprice')->where($where)->save(['city_price'=>$city_price]);
        } else {
            $res = M('cityprice')->add($data);
        }
        $this->ajaxReturn($res,'json');
    }

    public function city_price_list() {
        $city = $_POST['city'];
        $car_id = $_POST['car_id'];
        $where = array(
            'city' => $city,
            'car_id' => $car_id,
        );
        $res = M('cityprice')->where($where)->find();
        $this->ajaxReturn($res,'json');
    }
}