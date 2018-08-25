<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/css/common.css"/>
    <link rel="stylesheet" type="text/css" href="/Application/Admin/css/main.css"/>
    <script src="https://cdn.bootcss.com/jquery/2.1.2/jquery.js"></script>
</head>
<body>
<div class="topbar-wrap white">
    <div class="topbar-inner clearfix">
        <div class="topbar-logo-wrap clearfix">
            <h1 class="topbar-logo none"><a href="index.html" class="navbar-brand">后台管理</a></h1>
            <ul class="navbar-list clearfix">
                <li><a class="on" href="<?php echo U('index/admin_index');?>">首页</a></li>
            </ul>
        </div>
        <div class="top-info-wrap">
            <ul class="top-info-list clearfix">
                <?php if($_SESSION['admin_id']): ?><li><a href="#">欢迎管理员：<?php echo ($_SESSION['admin_user_name']); ?></a></li>
                    <!-- <li><a href="#">修改密码</a></li> -->
                    <li><a href="<?php echo U('User/layout');?>">退出</a></li><?php endif; ?>
            </ul>
        </div>
    </div>
</div>
<div class="container clearfix">
    <div class="sidebar-wrap">
        <div class="sidebar-title">
            <h1>菜单</h1>
        </div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>会员管理</a>
                    <ul class="sub-menu">
                        <li><a href='<?php echo U("User/index");?>'><i class="icon-font">&#xe014;</i>会员列表</a></li>
                        <li><a href='<?php echo U("User/add");?>'><i class="icon-font">&#xe026;</i>添加新会员</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>车型管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Car/index');?>"><i class="icon-font">&#xe043;</i>车型列表</a></li>
                        <li><a href="<?php echo U('Car/add');?>"><i class="icon-font">&#xe026;</i>添加新车型</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe018;</i>订单管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('Order/order_list',array('type'=>0));?>"><i class="icon-font">&#xe032;</i>旅游包车订单</a></li>
                        <li><a href="<?php echo U('Order/order_list',array('type'=>1));?>"><i class="icon-font">&#xe032;</i>日租包车订单</a></li>
                        <li><a href="<?php echo U('Order/order_list',array('type'=>2));?>"><i class="icon-font">&#xe032;</i>接送机/火车订单</a></li>
                    </ul>
                </li>
                 <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>日租包车价格管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('city/city_price');?>"><i class="icon-font">&#xe032;</i>城市地址价格</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->

    
    
 
    <!--/main-->

<script src="/Application/Home/js/layer/layer.js"></script>


        <div class="main-wrap">
                <div class="crumb-wrap">
                    <div class="crumb-list"><i class="icon-font"></i><a href='<?php echo U("Index/admin_index");?>'>首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">旅游包车订单列表</span></div>
                </div>

                <style>
                    .query {
                        background: #f4f4f3;
                        border-radius: 8px;
                        min-height: 30px;
                        padding: 20px 30px 20px 20px;
                        font-size: 16px;
                    }
                    .search{
                        float: right;
                    }
                    .float{
                        float: right;
                    }

                </style>
                    <div class="query">
                        <form action="<?php echo U('Order/order_list',array('type'=>0));?>" method="get" id="myform" name="myform" enctype="multipart/form-data">
                            <div class="search">
                                    <span>订单状态：</span>
                                        <select name="status" class="common-text" style="width:120px;">
                                            <option value="">
                                                全部
                                            </option>
                                            <option value="1" <?php if($status == 1): ?>selected<?php endif; ?>>
                                                待报价
                                            </option>
                                            <option value="2" <?php if($status == 2): ?>selected<?php endif; ?>>
                                                已报价
                                            </option>
                                            <option value="3" <?php if($status == 3): ?>selected<?php endif; ?>>
                                                已付款
                                            </option>
                                            <option value="4" <?php if($status == 4): ?>selected<?php endif; ?>>
                                                已确认
                                            </option>
                                            <option value="5" <?php if($status == 5): ?>selected<?php endif; ?>>
                                                已派车
                                            </option>
                                            <option value="6" <?php if($status == 6): ?>selected<?php endif; ?>>
                                                已完成
                                            </option>
                                            <option value="7" <?php if($status == 7): ?>selected<?php endif; ?>>
                                                已取消
                                            </option>
                                        </select>　　　　　
                                    <span>预定时间：</span><input class="common-text num_input" name="start_time" size="15" value="<?php echo ($start_time); ?>" type="date" placeholder="开始时间"> - 
                                        <input class="common-text num_input" name="end_time" size="15" value="<?php echo ($end_time); ?>" type="date" placeholder="结束时间">　　　　　
                                    <span>订单号查询：</span><input class="common-text num_input" name="order_num" size="15" value="<?php echo ($order_num); ?>" type="text" placeholder="请输入订单号">　　　　　
                                    <input class="btn btn-primary btn6 mr10 " value="提交" type="submit" >
                            </div>
                            
                        </form>
                    </div>



                <div class="result-wrap">
                    <form name="myform" id="myform" method="post">

                        <div class="result-content">
                            <table class="result-tab" width="100%" style="text-align:center;">
                                <tr>
                                    <th>订单号</th>
                                    <th>下单时间</th>
                                    <th>用车时间</th>
                                    <th>租车类型</th>
                                    <th>下单人</th>
                                    <th>订单状态</th>
                                    <!-- <th>操作</th> -->
                                </tr>
                                <?php if(is_array($order_list)): foreach($order_list as $key=>$list): ?><tr>
                                        <td><a href="<?php echo U('Order/order_detail',array('order_id'=>$list['id'],'type'=>0));?>"><?php echo ($list["order_num"]); ?></a></td>
                                        <td><?php echo (date("Y-m-d H:i",$list["create_time"])); ?></td>
                                        <td><?php echo (date("Y-m-d H:i",$list["transport_time"])); ?></td>
                                        <td><?php if($list["rental_type"] == 0): ?>单程<?php else: ?>往返<?php endif; ?></td>
                                        <td><?php echo ($list["travel_username"]); ?></td>
                                        <td>
                                            <span style="color:#009100" class="span">
                                                <?php if($list["order_status"] == 1): ?><input class="layui-btn layui-btn-primary layer-demolist a_input btn btn-primary btn5 mr10" type="button" name="order_price" value="待报价" data-id="<?php echo ($list["id"]); ?>"/>
                                                <?php elseif($list["order_status"] == 2): ?>
                                                    已报价： ￥<?php echo ($list["order_price"]); ?>
                                                <?php elseif($list["order_status"] == 3): ?>
                                                    已付款，应付：￥<?php echo ($list["order_price"]); ?>
                                                    <input class="btn btn-primary btn5 mr10 float" value="确认" type="button" id="ajax_order_verify" data-id="<?php echo ($list["id"]); ?>" name="ajax_order_verify">
                                                <?php elseif($list["order_status"] == 4): ?>
                                                    已确认，待派车<input class="btn btn-primary btn5 mr10 float" value="派车" type="button" id="ajax_send_car" data-id="<?php echo ($list["id"]); ?>" name="ajax_send_car">
                                                <?php elseif($list["order_status"] == 5): ?>
                                                    已派车<input class="btn btn-primary btn5 mr10 float" value="订单完成" type="button" id="ajax_order_finish" data-id="<?php echo ($list["id"]); ?>" name="ajax_order_finish">	
                                                <?php elseif($list["order_status"] == 6): ?>
                                                    已完成
                                                <?php elseif($list["order_status"] == 7): ?>
                                                    已取消<?php endif; ?>
                                            </span>
                                        </td>
                                        <!-- <td>
                                            <a class="link-update" href="<?php echo U('Order/edit',array('id'=>$list['id']));?>">修改</a>
                                        </td> -->
                                    </tr><?php endforeach; endif; ?>
                            </table>
                            <div class="result-list">
                                    总共：<?php echo ($count); ?>条数据
                            </div>
                            <div class="list-page"><?php echo ($page); ?></div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                $('.a_input').click(function(){
                    var id = $(this).data("id");
                    layer.prompt(function(val, index){
                    var order_price = val;
                        
                        $.ajax({
                            url: '/Admin/Order/ajax_update',
                            type: 'POST',
                            typeData: 'json',
                            data: { id: id, order_price: order_price},
                            success: function(res){
                                if(res>0) {
                                    layer.msg('报价成功');
                                    $('tr td .span').each(function(){
                                        if($(this).find('input').data('id') == id) {
                                            $(this).html('');
                                            $(this).html('<span style="color:#009100">已报价： ￥'+order_price);
                                        }

                                    });
                                } else {
                                    layer.msg('报价失败');
                                }
                                return;
                            },
                            error:function() {
                                layer.msg('异常');
                                return;
                            }
                        });
                        layer.close(index);
                    });
                });
                

                $('#ajax_order_verify').click(function(){
                    var id = $(this).data("id");
                        $.ajax({
                            url: '/Admin/Order/order_verify',
                            type: 'POST',
                            typeData: 'json',
                            data: { id: id},
                            success: function(res){
                                if(res>0) {
                                    layer.msg('确认成功');
                                    $('tr td .span').each(function(){
                                        if($(this).find('input').data('id') == id) {
                                            $(this).html('');
                                            $(this).html('已确认，待派车<input class="btn btn-primary btn5 mr10 float" value="派车" type="button" id="ajax_send_car" data-id="'+ id +'" name="ajax_send_car">');
                                        }

                                    });
                                } else {
                                    layer.msg('确认失败');
                                }
                                return;
                            },
                            error:function() {
                                layer.msg('异常');
                                return;
                            }
                        });
                        // layer.close(index);
                    });

                $('.span').on('click','#ajax_send_car',function(){
                    var id = $(this).data("id");
                        $.ajax({
                            url: '/Admin/Order/ajax_send_car',
                            type: 'POST',
                            typeData: 'json',
                            data: { id: id},
                            success: function(res){
                                if(res>0) {
                                    layer.msg('派车成功');
                                    $('tr td .span').each(function(){
                                        if($(this).find('input').data('id') == id) {
                                            $(this).html('');
                                            $(this).html('已派车<input class="btn btn-primary btn5 mr10 float" value="订单完成" type="button" id="ajax_order_finish" data-id="'+ id +'" name="ajax_order_finish">');
                                        }

                                    });
                                } else {
                                    layer.msg('派车失败');
                                }
                                return;
                            },
                            error:function() {
                                layer.msg('异常');
                                return;
                            }
                        });
                    });

                    $('.span').on('click','#ajax_order_finish',function(){
                    var id = $(this).data("id");
                        $.ajax({
                            url: '/Admin/Order/ajax_order_finish',
                            type: 'POST',
                            typeData: 'json',
                            data: { id: id},
                            success: function(res){
                                if(res>0) {
                                    layer.msg('订单完成');
                                    $('tr td .span').each(function(){
                                        if($(this).find('input').data('id') == id) {
                                            $(this).html('');
                                            $(this).html('已完成');
                                        }

                                    });
                                } 
                                return;
                            },
                            error:function() {
                                layer.msg('异常');
                                return;
                            }
                        });
                    });
            </script>