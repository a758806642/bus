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
                    <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('index/admin_index');?>">首页</a><span class="crumb-step">&gt;</span><span>添加新会员</span></div>
                </div>
                <div class="result-wrap">
                    <div class="result-content">
                        <form action="<?php echo U('user/add_send');?>" method="post" id="myform" name="myform" enctype="multipart/form-data">
                            <table class="insert-tab" width="100%">
                                <tbody>
                                    <tr>
                                        <th>登陆名：</th>
                                        <td>
                                            <input class="common-text required" name="login_name" size="50" value="" type="text" placeholder="请输入登陆名">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>会员昵称：</th>
                                        <td>
                                            <input class="common-text" name="user_name" size="50" value="" type="text" placeholder="请输入会员昵称">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>密&nbsp;&nbsp;&nbsp;&nbsp;码：</th>
                                        <td>
                                            <input class="common-text required" name="password" size="50" value="" type="password" placeholder="请输入密码">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>确认密码：</th>
                                        <td>
                                            <input class="common-text required" name="repassword" size="50" value="" type="password" placeholder="请确认密码">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <th>邮&nbsp;&nbsp;&nbsp;&nbsp;箱：</th>
                                        <td>
                                            <input class="common-text" name="email" size="50" value="" type="email" placeholder="请输入邮箱">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <th>手机号：</th>
                                        <td>
                                            <input class="common-text" name="mobile" size="50" value="" type="tel" placeholder="请输入手机号">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>会员类型：</th>
                                        <td>
                                            <!-- <input class="common-text" name="mobile" size="50" value="" type="tel" placeholder="请输入手机号">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i> -->
                                            <input type="radio" name="user_type" value="0">企业　　　
                                            <input type="radio" name="user_type" value="1" checked>个人　　　
                                            <input type="radio" name="user_type" value="2">车队　　　
                                        </td>
                                    </tr>
                                    <tr>
                                        <th></th>
                                        <td>
                                            <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                            <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
        
            </div>