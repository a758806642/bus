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
        <a class='' href="<?php echo U('Index/index');?>">
            首页
        </a>
        <a class='<?php if($order_type == 0): ?>index<?php endif; ?>' href="<?php echo U('Order/travel');?>">
            在线订车
        </a>
        <a class='<?php if($order_type == 1): ?>index<?php endif; ?>' href="<?php echo U('Order/rent_order');?>">
            日租包车
        </a>
        <a class='<?php if($order_type == 2): ?>index<?php endif; ?>' href="<?php echo U('Order/shuttle_order');?>">
            接机/送机
        </a>
    </div>
</nav>
<script src="/Application/Home/js/jquery-ui.min.js">
</script>
<link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
<script src="/Application/Home/js/dateinput-ch-ZN.js">
</script>
<script src='/Application/Home/js/jquery.base64.js'></script>
<script src="/Application/Home/js/jquery.unobtrusive-ajax.min.js">
</script>
<link href="/Application/Home/css/user.css" rel="stylesheet" />
<script>
    $(function () {
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
    .vo dl dd {
        width: 60px;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
        margin: 10px;
        padding: 10px;
    }

    .title dl dt {
        width: 180px;
    }

    dd a.unlined {
        color: #CCC;
        cursor: none;
        text-decoration: none;
    }

    dd a.unlined:hover {
        color: #CCC;
        cursor: none;
        text-decoration: none;
    }

    dd a.unlined:link {
        color: #CCC;
        cursor: none;
        text-decoration: none;
    }

    dd a.unlined:visited {
        color: #CCC;
        cursor: none;
        text-decoration: none;
    }

    dd a.unlined:active {
        color: #CCC;
        cursor: none;
        text-decoration: none;
    }
    .pay {
        border: 1px solid #009100;
        background: #00A600;
        color: #fff;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        padding: 3px 10px;
        float: right;
        margin-right: 18px;
    }
    .cancel{
        border: 1px solid #a7887b;
        background: #a7887b;
        color: #fff;
        border-radius: 3px;
        cursor: pointer;
        font-size: 16px;
        padding: 3px 10px;
        float: right;
        margin-right: 18px;
        }
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
                <a href="<?php echo U('Order/order_list?type=0');?>" id='<?php if($order_type == 0): ?>myorder<?php endif; ?>'>
                    竞价订单
                </a>
            </li>
            <li>
                <a href="<?php echo U('Order/order_list?type=1');?>" id='<?php if($order_type == 1): ?>myorder<?php endif; ?>'>
                    日租订单
                </a>
            </li>
            <li>
                <a href="<?php echo U('Order/order_list?type=2');?>" id='<?php if($order_type == 2): ?>myorder<?php endif; ?>'>
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
            <li>
                <a href="<?php echo U('User/change_password');?>" id="password">
                    修改密码
                </a>
            </li>
        </ul>
        <div class="line">
        </div>
    </div>

    <div class="right orderinfo">
        <!--订单明细-->
        <div class="order_desc">
            <em>订单编号：<?php echo ($order_data["order_num"]); ?> </em>
            <em>订单状态：
                <span style="color:#0C0" class="span">
                        <?php if($order_data["order_status"] == 1): ?>待报价<input type="button" name="cancel" value="取消订单" class="cancel" data-id="<?php echo ($order_data['id']); ?>">	
                            <?php elseif($order_data["order_status"] == 2): ?>
                                已报价： <?php echo ($order_data["order_price"]); ?> 元
                                <input type="button" name="cancel" value="取消订单" class="cancel" data-id="<?php echo ($order_data['id']); ?>">	
                                <a href="<?php echo U('Order/wxpay',array('p'=>base64_encode($order_data['order_price']),'id'=>$order_data['id'],'type'=>$order_type));?>" id="submit" class="pay">确认用车</a>
                            <?php elseif($order_data["order_status"] == 3): ?>
                                已付款,等待审核
                            <?php elseif($order_data["order_status"] == 4): ?>
                                已确认<input type="button" name="cancel" value="取消订单" class="cancel" data-id="<?php echo ($order_data['id']); ?>">	
                            <?php elseif($order_data["order_status"] == 5): ?>
                                已派车
                            <?php elseif($order_data["order_status"] == 6): ?>
                                已完成
                            <?php elseif($order_data["order_status"] == 7): ?>
                                已取消
                            <?php elseif($order_data["order_status"] == 8): ?>
                                待付款： <?php echo ($order_data["order_price"]); ?> 元
                                <input type="button" name="cancel" value="取消订单" class="cancel" data-id="<?php echo ($order_data['id']); ?>">
                                <a href="<?php echo U('Order/wxpay',array('p'=>base64_encode($order_data['order_price']),'id'=>$order_data['id'],'order_type'=>$order_type));?>" id="submit" class="pay">确认用车</a><?php endif; ?>
                </span>
            </em>
            <!-- <em>付款状态：</em> -->
            <div class="hr"></div>
            <div class="detail" style=" padding:0; margin:0; padding-right:20px;">
                <input type="hidden" id="state" name="state" style="margin-left:20px" value="">
                <div class="per50">

                </div>
                <div style="float:right">
                    <input type="button" name="nothing" id="nothing" onclick="javascript:history.back(-1)" style="float:right;" value="返回">

                </div>
            </div>
        </div>
        <div class="detail">
            <h2>订单信息</h2>
            <?php if($order_type == 0): ?><p>
                    <em>租车类型 ：</em>
                    <?php if($order_data["rental_type"] == 0): ?>单程
                    <?php else: ?>
                        往返<?php endif; ?>
                </p>
            <?php elseif($order_type == 1): ?>
                <p>
                    <em>天数 ：</em>
                    <?php if($order_data["days"] == 999): ?>半天
                    <?php elseif($order_data["days"] == 1): ?>
                        一天
                    <?php elseif($order_data["days"] == 2): ?>
                        两天
                    <?php elseif($order_data["days"] == 3): ?>
                        三天
                    <?php elseif($order_data["days"] == 4): ?>
                        四天
                    <?php elseif($order_data["days"] == 5): ?>
                        五天<?php endif; ?>
                </p>
            <?php elseif($order_type == 1): ?>
                <p>
                    <em>服务类型 ：</em>
                    <?php if($busline["service_type"] == 1): ?>接机
                    <?php elseif($busline["service_type"] == 2): ?>
                        送机
                    <?php elseif($busline["service_type"] == 3): ?>
                        接火车
                    <?php elseif($busline["service_type"] == 4): ?>
                        送火车<?php endif; ?>
                </p><?php endif; ?>
            <div style=" border:1px solid #CCC; padding:1px 10px; border-radius:5px;">
                <p>
                    车型：<?php echo ($car_data["car_name"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 乘坐人数: <?php echo ($car_data["people_num"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 行李数: <?php echo ($car_data["bags_num"]); ?>
                    <?php if($order_type == 0): ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 需求数量: <?php echo ($order_data["car_number"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?>
                </p>
                <p>等同级别: <?php echo ($car_data["equivalent"]); ?></p>
            </div>
            <?php if(is_array($busline)): foreach($busline as $k=>$b): ?><div class="daily" name="daily" day="1">第<?php echo ($k+1); ?>天行车线路 &nbsp; <?php echo ($b["travel_start"]); ?>→<?php echo ($b["travel_end"]); ?>
                    <!--<span style=\"float:right;\">点击打开详细线路信息</span>-->
                </div>
                <div id='divtravel' name='divtravel' show='' style='display:block'>
                    <!--<div class="per50"><em>上车地点：</em>广州</div>
                                <div class="per50"><em>下车地点：</em>广州</div>-->
                    <em>起点：<?php echo ($b["travel_start"]); ?></em>&nbsp;&nbsp;&nbsp;&nbsp;
                    <em>地点：<?php echo ($b["start_address"]); ?>(<?php echo ($b["fromaddr"]); ?>)</em>&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--<em>地址：黄埔区萝岗科学城伴河路192号（植树公园旁）</em>-->
                    <!-- &nbsp;&nbsp;↓&nbsp;&nbsp;121.3公里&nbsp;&nbsp; -->
                    <br />
                    <?php if(is_array($via[$k])): foreach($via[$k] as $key=>$v): ?><p>途经点：<?php echo ($v["path"]); ?>，<?php echo ($v["path_address"]); ?></p><?php endforeach; endif; ?>
                    <!-- <br /> -->
                    <em>终点：<?php echo ($b["travel_end"]); ?></em>&nbsp;&nbsp;&nbsp;&nbsp;
                    <em>地点：<?php echo ($b["end_address"]); ?>(<?php echo ($b["toaddr"]); ?>)</em>&nbsp;&nbsp;&nbsp;&nbsp;
                    <!--<em>地址：黄埔区萝岗科学城伴河路192号（植树公园旁）</em>-->
                    <br />
                    <p>
                        <em>用车时间 ：</em><?php echo (date("Y-m-d H:i",$b["transport_time"])); ?></p>
                </div>
                <?php if($order_type == 0): ?><p>
                        <em>供应商等级 ：
                            <?php if($order_data["order_level"] == 0): ?>不限
                                <?php elseif($order_data["order_level"] == 1): ?>一级
                                <?php elseif($order_data["order_level"] == 2): ?>二级
                                <?php elseif($order_data["order_level"] == 3): ?>三级<?php endif; ?>
                        </em>
                    </p><?php endif; ?>
                <?php if($order_type != 2): ?><p>
                        <em>服务留言 ：<?php echo ($order_data["remark"]); ?></em>
                    </p><?php endif; ?>

                <!-- <p>
                    <em>取消原因 ：目的地发生不安全事件、恶劣天气、自然灾害等</em>
                </p> --><?php endforeach; endif; ?>
        </div>
    </div>
</div>
<!--<button id="test" type="button" class="buttonPrimary" style="margin:20px">Sign out</button>-->
<div id="detail" style="position: relative; display: none; width: 500px; text-align: center; overflow: hidden; z-index: 9999">
    <div style="text-align: center; overflow: hidden;">
        <img src="/Images/dialog-help.png">
        <span style="position: relative; top: -10px;">确定要取消这个订单?</span>
    </div>
    <p></p>
    <div align="center" style="margin-top: 10px; padding: 10px;">
        <form action="/User/OrderCancel" id="updateOrder" method="post" name="updateOrder">
            <input name="__RequestVerificationToken" type="hidden" value="TxYg4TUiUPKzE3DIoTOxPhY2qr2XHOhV0nbv_GfaAYV-Z804YncC6WeK6JXzMK0KvP8B5e7ulRPEjNNFwki4uPQBqks1"
            />
            <input type="hidden" name="orderId" id="orderId" value="182425">
            <button id="action" type="submit" class="buttonPrimary">确定</button>
            <button style="margin-left: 10px;" class="buttonPrimary" id="cancel" type="button">放弃</button>
            <p></p>
            <label style="float: left; margin-left: 20px; margin-top: 10px;">取消订单原因:</label>
            <select style="margin: 5px; width: 300px" name="reason">
                <option value="目的地发生不安全事件、恶劣天气、自然灾害等">目的地发生不安全事件、恶劣天气、自然灾害等</option>
                <option value="自己或者家人有事不能去了">自己或者家人有事不能去了</option>
                <option value="订单重复">订单重复</option>
                <option value="订单写错了">订单写错了</option>
                <option value="车队变价">车队变价</option>
            </select>
        </form>
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

    $('.cancel').click(function(){
        var id = $('.cancel').data('id');
        // console.log(id);
        $.ajax({
            url: '/Home/Order/order_cancel',
            type: 'POST',
            dataType: 'json',
            data: { id: id},
            success:function(res){
                if(res>0){
                    layer.msg('取消成功');
                    $('.span').html('');
                    $('.span').html('已取消');
                } else {
                    layer.msg('取消失败');
                }
                return;
            }
        })
    });
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