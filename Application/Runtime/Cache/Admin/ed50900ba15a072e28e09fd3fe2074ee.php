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
                    <div class="crumb-list"><i class="icon-font"></i><a href='<?php echo U("Index/admin_index");?>'>首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">日租包车订单列表</span></div>
                </div>
                <div class="result-wrap">
                    <form name="myform" id="myform" method="post">
                        <div class="result-title">
                            <div class="result-list">
                                <input type="button" name="nothing" id="back" onclick="javascript:history.back(-1)" style="float:right;" value="返回">
                            </div>
                        </div>
                        <div class="result-content">
                            <table class="result-tab t_1" >
                                <tr>
                                    <th>订单号</th><td><?php echo ($order_data["order_num"]); ?></td>
                                    <th>车型logo</th><td><img src="/Application/Admin/Uploads/<?php echo ($car_data["car_pic"]); ?>" alt="加载失败" width="80px" height="40px" onclick="javascript:window.open(this.src);"></td>
                                </tr>
                                <tr>
                                    <th>用车人</th><td><?php echo ($order_data["travel_username"]); ?></td>
                                    <th>车型名</th><td><?php echo ($car_data["car_name"]); ?></td>
                                </tr>
                                <tr>
                                    <th>联系方式</th><td><?php echo ($order_data["travel_mobile"]); ?></td>
                                    <th>座位数</th><td><?php echo ($car_data["people_num"]); ?></td>
                                </tr>
                                <tr>
                                    <th>用车天数</th><td>
                                        <?php if($order_data["days"] == 999): ?>半天
                                            <?php elseif($order_data["days"] == 1): ?>一天
                                            <?php elseif($order_data["days"] == 2): ?>两天
                                            <?php elseif($order_data["days"] == 3): ?>三天
                                            <?php elseif($order_data["days"] == 4): ?>四天
                                            <?php elseif($order_data["days"] == 5): ?>五天<?php endif; ?>
                                    </td>
                                    <th>可放行李数</th><td><?php echo ($car_data["bags_num"]); ?></td>
                                </tr>
                                <tr>
                                    <th>用车时间</th><td><?php echo (date("Y-m-d H:i",$order_data["transport_time"])); ?></td>
                                    <th>等同级别</th><td><?php echo ($car_data["equivalent"]); ?></td>
                                </tr>
                                <tr>
                                        <th>订单状态</th>
                                        <td>
                                            <span style="color:#009100">
                                                <?php if($order_data["order_status"] == 1): ?>待报价
                                                    <?php elseif($order_data["order_status"] == 2): ?>
                                                        已报价： ￥<?php echo ($order_data["order_price"]); ?>
                                                    <?php elseif($order_data["order_status"] == 3): ?>
                                                        已付款，应付：￥<?php echo ($order_data["order_price"]); ?>
                                                    <?php elseif($order_data["order_status"] == 4): ?>
                                                        已确认	
                                                    <?php elseif($order_data["order_status"] == 5): ?>
                                                        已派车
                                                    <?php elseif($order_data["order_status"] == 6): ?>
                                                        已完成
                                                    <?php elseif($order_data["order_status"] == 7): ?>
                                                        已取消<?php endif; ?>
                                            </span>
                                        </td>
                                    <th>车价(元)</th><td><?php echo ($car_data["car_price"]); ?></td>
                                </tr>
                                <tr>
                                    <th>下单时间</th><td><?php echo (date("Y-m-d H:i",$order_data["create_time"])); ?></td>
                                    <th>车型评分</th><td><?php echo ($car_data["score"]); ?></td>
                                        
                                </tr>
                                <tr>
                                    <th>备注留言</th><td ><?php echo ($order_data["remark"]); ?></td>
                                </tr>
                            </table>

                        </div>
                    </form>
                </div>
                <div class="result-wrap">
                    <table class="result-tab t_1" >
                        <tr>
                            <th>行车路线</th>
                            <td >
                                <?php if(is_array($busline)): foreach($busline as $k=>$b): ?><p><span style="color: #009100">第<?php echo ($k+1); ?>天路线&nbsp;&nbsp;&nbsp;<?php echo ($b["travel_start"]); ?> - <?php echo ($b["travel_end"]); ?></span></p>
                                    <p style="text-align:left;"><span><b>出发时间：</b><?php echo (date("Y-m-d H:i",$b["transport_time"])); ?></span></p>
                                    <p style="text-align:left;"><span><b>起点：</b><?php echo ($b["travel_start"]); ?>，<?php echo ($b["start_address"]); ?></span></p>
                                    <?php if(is_array($via[$k])): foreach($via[$k] as $key=>$v): ?><p style="text-align:left;"><span><b>途经点：</b><?php echo ($v["path"]); ?>，<?php echo ($v["path_address"]); ?></span></p><?php endforeach; endif; ?>
                                    <p style="text-align:left;"><span><b>终点：</b><?php echo ($b["travel_end"]); ?>，<?php echo ($b["end_address"]); ?></span></p><?php endforeach; endif; ?>
                            </td>
                        </tr>
                        
                    </table>
                </div>
            </div>
            <style>
                .t_1 {
                    margin-left: 150px;
                    /* width: 500px; */
                    /* float: left; */
                }

                .t_1 th {
                    text-align: center;
                    width: 150px;
                }

                .t_1 td {
                    text-align: center;
                    width: 500px;
                }
                #back{
                    border: 1px solid #dfd9d9;
                    background: #ebe6e6;
                    border-radius: 3px;
                    cursor: pointer;
                    font-size: 18px;
                    padding: 3px 10px;
                    margin-right: 18px;
                    
                }
                
            </style>