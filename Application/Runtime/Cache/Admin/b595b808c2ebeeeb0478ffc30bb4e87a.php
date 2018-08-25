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


        <div class="main-wrap">
                <div class="crumb-wrap">
                    <div class="crumb-list"><i class="icon-font">&#xe06b;</i><span>欢迎使用</span></div>
                </div>
                <!-- <div class="result-wrap">
                    <div class="result-title">
                        <h1>快捷操作</h1>
                    </div>
                    <div class="result-content">
                        <div class="short-wrap">
                            <a href="insert.html"><i class="icon-font">&#xe001;</i>新增作品</a>
                            <a href="insert.html"><i class="icon-font">&#xe005;</i>新增博文</a>
                            <a href="insert.html"><i class="icon-font">&#xe048;</i>新增作品分类</a>
                            <a href="insert.html"><i class="icon-font">&#xe041;</i>新增博客分类</a>
                            <a href="#"><i class="icon-font">&#xe01e;</i>作品评论</a>
                        </div>
                    </div>
                </div> -->
                <div class="result-wrap">
                    <div class="result-title">
                        <h1>系统基本信息</h1>
                    </div>
                    <div class="result-content">
                        <ul class="sys-info-list">
                            <li>
                                <label class="res-lab">操作系统</label><span class="res-info">WINNT</span>
                            </li>
                            <li>
                                <label class="res-lab">运行环境</label><span class="res-info">Apache/2.2.21 (Win64) PHP/7.2.1</span>
                            </li>
                            <li>
                                <label class="res-lab">PHP运行方式</label><span class="res-info">apache2handler</span>
                            </li>
                            <li>
                                <label class="res-lab">上传附件限制</label><span class="res-info">2M</span>
                            </li>
                            <li>
                                <label class="res-lab">北京时间</label><span class="res-info"><?php echo date('Y-m-d H:i',time())?></span>
                            </li>
                            <li>
                                <label class="res-lab">服务器域名/IP</label><span class="res-info">localhost [ 127.0.0.1 ]</span>
                            </li>
                            <li>
                                <label class="res-lab">Host</label><span class="res-info">127.0.0.1</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="result-wrap">
                    <div class="result-title">
                        <h1>使用帮助</h1>
                    </div>
                    <div class="result-content">
                        <ul class="sys-info-list">
                            <li>
                                <!-- <label class="res-lab">来源：</label><span class="res-info"><a href="http://www.17sucai.com/" target="_blank">17素材网</a></span> -->
                            </li>
                        </ul>
                    </div>
                </div>
            </div>