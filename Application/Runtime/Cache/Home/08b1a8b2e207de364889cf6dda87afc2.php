<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="keywords" content="巴士   运来出行， 大巴，客车，租车，企业用车，旅游用车，用巴士，旅游大巴，旅游包车，接机，送机">
    <meta name="description" content="巴士   运来出行， 大巴，客车，租车，企业用车，旅游用车，用巴士，旅游大巴，旅游包车，接机，送机">
    <meta name="viewport" content="width=device-width" />
    <title>运来出行</title>
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    <link href="/Application/Home/css/css.css" rel="stylesheet" />
    <link href="/Application/Home/css/order.css" rel="stylesheet" />
    <link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
    <script src="/Application/Home/js/modernizr-2.6.2.js"></script>
    <script src="/Application/Home/js/jquery-1.8.2.js"></script>
    <script src="/Application/Home/js/jquery-ui-1.8.24.js"></script>
    <script src="/Application/Home/js/layer/layer.js"></script>
    <!-- <script src="/Application/Home/js/dayrentproduct.js"></script> -->
    <script src="/Application/Home/js/config.js"></script>
    <!-- <script src="/Application/Home/js/commonapi.js"></script> -->
    <style>
        .index {
            position: relative;
        }

        .banner .comm dl {
            line-height: 20px;
        }

        .banner .comm dl dt {
            width: 100px;
            text-align: right;
            padding: 10px 10px 10px 0;
            line-height: 30px;
            font-size: 16px;
        }

        .banner .comm dl dd {
            margin: 0;
            padding: 10px 0;
        }

        .banner .comm dl dd label {
            font-size: 16px;
        }

        .banner .comm dl dd .txt {
            background: #EEEEED;
            border-radius: 5px;
            border: 1px #CCCCCC solid;
            padding: 6px 10px;
            height: 20px;
        }

        .banner .comm dl dd.select-city {
            margin-top: 10px;
            padding: 0;
            border: 1px solid #ccc;
            height: 30px;
            border-radius: 5px;
            background: #EEEEED url(images/zoom-tblr.png) no-repeat right -86px;
            width: 153px;
        }

        .banner .comm section .result {
            left: 36px;
        }

        .banner .comm section .result .page {
            padding: 0 49px;
        }

        .banner .comm section .result .next {
            background: none;
            lineheight: none;
            color: black;
            font-size: 13px;
        }

        .banner .comm section .result a:hover {
            background: #D5D5D5;
        }

        .banner .comm section .result a {
            height: 34px;
        }

        .banner .comm section .drop-down-icon input {
            background: #EEEEED;
            width: 104px;
            border: none;
            padding: 6px 10px;
            height: 18px;
        }

        /* scrollleft */

        .scrollleft {
            width: 1000px;
            margin: 20px auto;
            background-color: #009100;
            padding: 10px 0;
            color: #fff;
            line-height: 2em;
        }

        .scrollleft li {
            float: left;
            margin-right: 7px;
            display: inline;
            width: 220px;
            border-right: 1px solid #fff;
            height: 170px;
            padding: 0 18px;
        }

        .scrollleft li h6 {
            font-weight: normal;
            border-bottom: 1px solid #fff;
            margin: 0;
            line-height: 40px;
            margin-bottom: 6px;
        }

        .scrollleft li p {
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        
        footer {
            background: #f4f4f3 url(/Application/Home/img/logo.png) no-repeat center 40px;
            height: 229px;
            padding-top: 40px;
            margin-top: 30px;
            min-width: 1003px;
        }
        /*#demo {color:#fff; width: 1000px; background-color:#009100;height: 170px; padding:10px 0;margin: 0 auto;margin-top:25px;overflow: hidden;} #demo a+i{display: block;height: 1px;background:white;width: 190px;} #demo p{width:240px;} .demo ul{ height:200px;} .demo ul .line{padding-left:18px; height:170px;border-right:1px solid #fff; float:left; width:220px; overflow:hidden;}*/
    </style>
</head>

<body>
    <header>
        <div class="comm top">
            <div class="logo">
                <a href="<?php echo U('Index/index');?>" title="运来出行">
                    <img src="/Application/Home/img/logo.png" alt="运来出行">
                </a>
                <span style="left:280px;top:53px;font-size:18px; color:#006000;">全国旅游用车一站式服务平台</span>
            </div>
            <span>
                <?php if($_SESSION['user_id']): ?>你好，<?php echo ($_SESSION['user_name']); ?>&nbsp;&nbsp;<?php endif; ?>   
                <a href="<?php echo U('Order/order_list?type=0');?>">我的订单</a>&nbsp;
                <a href="<?php echo U('User/personal');?>">我的账户</a>
            </span>
            <?php if($_SESSION['user_id']): ?><div class="login_reg">
                    <a href="<?php echo U('Index/layout');?>">退出/注销</a>
                </div>
            <?php else: ?>
                <div class="login_reg">
                    <a href="<?php echo U('Index/login');?>">登录</a>/
                    <a href="<?php echo U('Index/reg');?>">注册</a>
                </div><?php endif; ?>

        </div>
    </header>
    
    <script>$(function () {
            $(".index").addClass("cur");
        });</script>
    <!-- <script src="/Application/Home/js/order.js"></script> -->
    
    
    
<nav>
    <div class="comm">
        <a class="" href="<?php echo U('Index/index');?>">
            首页
        </a>
        <a class="" href="<?php echo U('Order/travel');?>">
            在线订车
        </a>
        <a class="" href="<?php echo U('Order/rent_order');?>">
            日租包车
        </a>
        <a class="index" href="<?php echo U('Order/shuttle_order');?>">
            接机/送机
        </a>
    </div>
</nav>
<script src="/Application/Home/js/jquery-ui.min.js">
</script>
<link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
<script src="/Application/Home/js/dateinput-ch-ZN.js">
</script>
<script src="/Application/Home/js/jquery.unobtrusive-ajax.min.js">
</script>
<link href="/Application/Home/css/user.css" rel="stylesheet" />
<script>
    $(function() {
    $(".index").addClass("cur");
    $("#startTime").datepicker();
    $("#endTime").datepicker();

    var status = "0";
    if (status == '') {
        status = 1;
    }
    //if (status != 0) {
    $("dd[name='" + status + "']").find('a').addClass('cur');
    //$("dd[name=0]").find('a').attr('class', '');
    //}

});
</script>
<style type="text/css">
    .vo dl dd { width: 60px; overflow: hidden; white-space: nowrap; text-overflow:
    ellipsis; margin: 10px; padding: 10px; } .title dl dt { width: 180px; }
    dd a.unlined { color: #CCC; cursor: none; text-decoration: none; } dd a.unlined:hover
    { color: #CCC; cursor: none; text-decoration: none; } dd a.unlined:link
    { color: #CCC; cursor: none; text-decoration: none; } dd a.unlined:visited
    { color: #CCC; cursor: none; text-decoration: none; } dd a.unlined:active
    { color: #CCC; cursor: none; text-decoration: none; }
</style>
<div class="comm uc">
    <div class="left">
        <h3>
            我的运来出行
        </h3>
        <h2>
            个人帐号
        </h2>
        <div class="line">
        </div>
        <ul>
            <li>
                <a href="<?php echo U('Order/order_list?type=0');?>" id="">
                    竞价订单
                </a>
            </li>
            <li>
                <a href="<?php echo U('Order/order_list?type=1');?>" id="">
                    日租订单
                </a>
            </li>
            <li>
                <a href="<?php echo U('Order/order_list?type=2');?>" id="myorder">
                    接送机订单
                </a>
            </li>
        </ul>
        <div class="line">
        </div>
        <ul>
            <li>
                <a href="<?php echo U('User/personal');?>" id="myinfo">
                    个人资料
                </a>
            </li>
            <!-- <li>
                <a display="none" href="/User/Travels" id="travels">
                    子公司/部门管理
                </a>
            </li> -->
            <li>
                <a href="<?php echo U('User/change_password');?>" id="password">
                    修改密码
                </a>
            </li>
        </ul>
        <div class="line">
        </div>
    </div>
    <div class="right">
        <div class="query">
            <!-- <form action="/User/AjaxSearchPost/1?status=0" data-ajax="true" data-ajax-begin="layer.load();"
            data-ajax-complete="layer.closeAll(&#39;loading&#39;);" data-ajax-method="Post"
            data-ajax-mode="replace" data-ajax-update="#orderList" id="searchForm"
            method="post"> -->
            <form action="<?php echo U('Order/order_list?type=2');?>" id="searchForm" method="get">
                <dl>
                    <dt>
                        预定时间：
                    </dt>
                    <dd>
                        <input type="text" name="start_time" id="startTime" value="<?php echo ($start_time); ?>">
                        --
                        <input type="text" name="end_time" id="endTime" value="<?php echo ($end_time); ?>">
                    </dd>
                    <dd>
                        <input type="submit" value="查询">
                    </dd>
                </dl>
                <dl>
                    <dt>
                        订单状态：
                    </dt>
                    <dd>
                        <select name="status" id="state" style="width:120px;">
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
                            <option value="6" <?php if($status == 7): ?>selected<?php endif; ?>>
                                已取消
                            </option>   
                        </select>
                    </dd>
                    <script>
                        $("#state option[value=" + "0" + "]").attr('selected', true);
//alert($("#state").val());
                    </script>
                    <dd>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;订单号查询&nbsp;&nbsp;
                    </dd>
                    <input type="text" id="orderNo" name="order_num" value="<?php echo ($order_num); ?>">
                </dl>
            </form>
        </div>
        <div id="orderList">
            <!--最新订单-->
            <h3>
                最新订单
            </h3>
            <div class="ostate">
                <dl>
                    <dd name="<?php if($status == 1): ?>0<?php endif; ?>">
                        <a href="<?php echo U('Order/order_list?type=2&status=1');?>">
                            待报价
                        </a>
                    </dd>
                    <dd name='<?php if($status == 2): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2&status=2');?>">
                            已报价
                        </a>
                    </dd>
                    <dd name='<?php if($status == 3): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2&status=3');?>">
                            已付款
                        </a>
                    </dd>
                    <dd name='<?php if($status == 4): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2&status=4');?>">
                            已确认
                        </a>
                    </dd>
                    <dd name='<?php if($status == 5): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2&status=5');?>">
                            已派车
                        </a>
                    </dd>
                    <dd name='<?php if($status == 6): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2&status=6');?>">
                            已完成
                        </a>
                    </dd>
                    <dd name='<?php if($status == 7): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2&status=7');?>">
                            已取消
                        </a>
                    </dd>
                    <dd name='<?php if($status == ''): ?>0<?php endif; ?>'>
                        <a href="<?php echo U('Order/order_list?type=2');?>">
                            全部
                        </a>
                    </dd>
                </dl>
            </div>
            <div class="ulist">
                <ul>
                    <li class="title">
                        <dl>
                            <dt class="orderno">
                                订单号
                            </dt>
                            <!--<dt>姓名</dt>-->
                            <dt class="time">
                                预订日期
                            </dt>
                            <dt class="time">
                                出发地址
                            </dt>
                            <dt>
                                目地地址
                            </dt>
                            <dt>
                                服务类型
                            </dt>
                            <dt>
                                车型
                            </dt>
                            <dt class="opera">
                                订单状态
                            </dt>
                        </dl>
                    </li>
                    
                    <li class="vo">
                        <dl>
                            <?php if(is_array($order_list)): foreach($order_list as $key=>$list): ?><dd class="orderno">
                                        <a class="aLink" href="<?php echo U('Order/order_detail',array('id'=>$list['id'],'type'=>2));?>">
                                        <?php echo ($list["order_num"]); ?>
                                    </a>
                                </dd>
                                <dd class="time">
                                    <?php echo (date("Y-m-d H:i",$list["transport_time"])); ?>
                                </dd>
                                <dd class="time">
                                    <?php echo ($list["travel_start"]); ?> <?php echo ($list["start_address"]); ?>
                                </dd>
                                <dd>
                                    <?php echo ($list["travel_end"]); ?> <?php echo ($list["start_address"]); ?>
                                </dd>
                                <dd>
                                    <?php if($list["service_type"] == 1): ?>接机
                                    <?php elseif($list["service_type"] == 2): ?>
                                        送机
                                    <?php elseif($list["service_type"] == 3): ?>
                                        接火车
                                    <?php elseif($list["service_type"] == 4): ?>
                                        送火车<?php endif; ?>
                                </dd>
                                <dd>
                                    <?php echo ($list["car_name"]); ?>
                                </dd>
                                <dd class="opera">
                                    <span style="color:#009100">
                                        <?php if($list["order_status"] == 1): ?>待报价
                                        <?php elseif($list["order_status"] == 2): ?>
                                            已报价
                                        <?php elseif($list["order_status"] == 3): ?>
                                            已付款
                                        <?php elseif($list["order_status"] == 4): ?>
                                            已确认	
                                        <?php elseif($list["order_status"] == 5): ?>
                                            已派车
                                        <?php elseif($list["order_status"] == 6): ?>
                                            已完成
                                        <?php elseif($list["order_status"] == 7): ?>
                                            已取消<?php endif; ?>
                                    </span>
                                </dd><?php endforeach; endif; ?>
                        </dl>
                    </li>
                </ul>
            </div>
            <link href="/Application/Home/css/pagerstyles.css" rel="stylesheet" />
            <div class="text-center pager">
                <div style="float:left;">
                    <?php if($order_list): ?>总数量：<?php echo ($count); ?>条<?php endif; ?>
                </div>
                <?php echo ($page); ?>
            </div>
            
            <script>
                var status = "0";
if (status == '') {
    status = 1;
}
//if (status != 0) {
$("dd[name='" + status + "']").find('a').addClass('cur');
//$("dd[name=0]").find('a').attr('class', '');
//}
            </script>
        </div>
    </div>
</div>
<script>
    $("#myorder").addClass('cur');
var theorder = $("#theOrder").val();
var theorderNo = $("#theOrderNo").val();
//alert(theorder);
if (theorder == 'completed') {
    $("#theOrder").val('');
    $("#theOrderNo").val('');
    layer.msg("<span style='overflow:hidden'>订单已成功<br />订单编号:" + theorderNo + "</span>", {
        time: 6000,
        area: ['240px', '70px'],
        shift: 4 //动画类型
    });
}
</script>
<br />
<br />
<footer style="margin: 0px;">
    <ul class="foot">
        <li>
            <b>运来出行</b>
        </li>
        <li class="second">
            <b>支付说明</b>
        </li>
        <li class="center">
            <p>
                <span>客户
                    <br>专线</span>599970999</p>
            <p>
                <span>企业
                    <br>客户</span>‭130-3229-8400‬</p>
        </li>
        <li class="third">
            <b>特色服务</b>
            <a href="#">其他服务</a>
            <a href="#">企业用户</a>
        </li>
        <li>
            <b>用车帮助</b>
            <a href="#">车辆服务</a>
            <a href="#">预定用车</a>
        </li>
    </ul>
    <p>版权所有&nbsp;&nbsp;© 2018 运来出行有限公司 &nbsp;&nbsp;
        <span style="display:none">技术支持：
            <a href="http://www.gzqihui.com/" target="_blank" title="广州企辉网络科技有限公司">企辉网络</a>&nbsp;&nbsp;</span>
        <!-- <a href="http://www.miitbeian.gov.cn/" target="_blank">粤ICP备14039641号</a>&nbsp;&nbsp; -->
        <script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
            document.write(unescape("%3Cspan id='cnzz_stat_icon_1255292701'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1255292701%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
    </p>
</footer>
<script type="text/javascript">$(function () {
        if ("False" == "True") {
            var index = layer.load();
            layer.msg("");
            layer.close(index);
        }
    });

    $.ajaxSetup({
        beforeSend: function (xhr) {
            xhr.setRequestHeader("token", 0.246089429243509);
        }
    });</script>
</body>
</html>