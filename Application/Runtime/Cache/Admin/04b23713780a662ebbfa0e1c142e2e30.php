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
                    <div class="crumb-list"><i class="icon-font"></i><a href='<?php echo U("Index/admin_index");?>'>首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">车型列表</span></div>
                </div>
                
                <div class="result-wrap">
                    <form name="myform" id="myform" method="post">
                        <div class="result-title">
                            <div class="result-list">
                                <a href="<?php echo U('Car/add');?>"><i class="icon-font"></i>添加新车型</a>
                            </div>
                        </div>
                        <div class="result-content">
                            <table class="result-tab" width="100%">
                                <tr>
                                    <th>缩略图</th>
                                    <th>车型名</th>
                                    <th>人数</th>
                                    <th>行李数</th>
                                    <th>等同级别</th>
                                    <th>分数</th>
                                    <th>价格</th>
                                    <th>车型类型/用途</th>
                                    <th>上架/显示</th>
                                    <th>操作</th>
                                </tr>
                                <?php if(is_array($car_list)): foreach($car_list as $key=>$list): ?><tr>
                                        <td style="text-align: center;"><img src="/Application/Admin/Uploads/<?php echo ($list['car_pic']); ?>" alt="图片加载失败" width="110px;" height="60px;"></td>
                                        <td><?php echo ($list["car_name"]); ?></td>
                                        <td style="text-align:center;"><?php echo ($list["people_num"]); ?></td>
                                        <td style="text-align:center;"><?php echo ($list["bags_num"]); ?></td>
                                        <td><?php echo ($list["equivalent"]); ?></td>
                                        <td><?php echo ($list["score"]); ?></td>
                                        <td>￥<?php echo ($list["car_price"]); ?></td>
                                        <td>
                                            <?php if(strpos($list['car_type'],'0') !== false): ?>在线订车　<?php endif; ?>
                                            <?php if(strpos($list['car_type'],'1') !== false): ?>日租包车　<?php endif; ?>
                                            <?php if(strpos($list['car_type'],'2') !== false): ?>接机送机　<?php endif; ?>
                                            <!-- <?php echo ($list["car_type"]); ?> -->
                                        </td>
                                        <td style="text-align:center;">
                                            <?php if($list["is_show"] == 0): ?>上架
                                            <?php else: ?>
                                            下架<?php endif; ?>
                                        </td>
                                        <!-- <td><?php echo (date("Y-m-d H:i",$list["create_time"])); ?></td> -->
                                        <td>
                                            <a class="link-update" href="<?php echo U('Car/edit',array('id'=>$list['id']));?>">修改</a> | 
                                            <a class="link-del" href="<?php echo U('Car/del/',array('id'=>$list['id']));?>">删除</a>
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