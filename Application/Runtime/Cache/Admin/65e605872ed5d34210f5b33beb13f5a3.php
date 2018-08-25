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
                    <a href="#"><i class="icon-font">&#xe003;</i>地址管理</a>
                    <ul class="sub-menu">
                        <li><a href="<?php echo U('city/city_price');?>"><i class="icon-font">&#xe032;</i>城市地址价格</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--/sidebar-->

    
    
 
    <!--/main-->


        <div class="main-wrap">

                <div class="crumb-wrap">
                    <div class="crumb-list"><i class="icon-font"></i><a href='<?php echo U("Index/admin_index");?>'>首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">会员列表</span></div>
                </div>
                
                <div class="result-wrap">
                    <form name="myform" id="myform" method="post">
                        <div class="result-title">
                            <div class="result-list">
                                <a href="<?php echo U('User/add');?>"><i class="icon-font"></i>添加新用户</a>
                            </div>
                        </div>
                        <div class="result-content">
                            <table class="result-tab" width="100%" style="text-align:center;">
                                <tr>
                                    <th>会员昵称</th>
                                    <th>登录名</th>
                                    <th>手机号</th>
                                    <th>创建时间</th>
                                    <th>操作</th>
                                </tr>
                                <?php if(is_array($list)): foreach($list as $key=>$list): ?><tr>
                                        <td><?php echo ($list["user_name"]); ?></td>
                                        <td><?php echo ($list["login_name"]); ?></td>
                                        <td><?php echo ($list["mobile"]); ?></td>
                                        <td><?php echo (date("Y-m-d H:i",$list["create_time"])); ?></td>
                                        <td>
                                            <a class="link-update" href="<?php echo U('user/edit',array('id'=>$list['id']));?>">修改</a>
                                            <a class="link-del" href="<?php echo U('user/del/',array('id'=>$list['id']));?>">删除</a>
                                        </td>
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