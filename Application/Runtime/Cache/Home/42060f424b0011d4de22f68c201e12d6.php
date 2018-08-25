<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>运来出行</title>
    <link href="/Application/Home/css/css.css" rel="stylesheet" />
    <script src="/Application/Home/js/layer.js"></script>
    <script src="/Application/Home/js/jquery-1.8.2.js"></script>
    <style>
        .payType {
            cursor: pointer;
        }

        .wechat {
            display: inline-block;
            width: 23px;
            height: 16px;
            line-height: 0px;
            font-size: 0px;
            overflow: hidden;
            vertical-align: middle;
            background: url(/images/pay.png) left top no-repeat;
            margin: -4px 5px 0 0;
            background-position: -27px -21px;
        }

        .CreditCard {
            display: inline-block;
            width: 23px;
            height: 16px;
            line-height: 0px;
            font-size: 0px;
            overflow: hidden;
            vertical-align: middle;
            background: url(/images/pay.png) left top no-repeat;
            margin: -4px 5px 0 0;
            background-position: -27px -41px;
        }

        .order_infos {
            background: #e4f3fb;
            padding: 18px 0 12px 30px;
            position: relative;
            margin: 10px;
        }

        .order_briefs {
            font-weight: bold;
            margin-bottom: 4px;
            margin-top: 4px;
            padding-right: 100px;
        }

        .briefs_item {
            display: inline-block;
        }

            .briefs_item.price {
                width: 258px;
                margin-top: -10px;
                color: #424242;
            }

        b {
            font-weight: bold;
        }

        i, em, dfn {
            font-style: normal;
        }

        .briefs_item .title {
            vertical-align: top;
            max-width: 585px;
            _width: 585px;
        }

        .briefs_item .price_aera, .mo .price_aera {
            color: #ff6600;
        }

        .briefs_item .num_b, .mo .num_b {
            font-size: 24px;
        }

        .briefs_item .num_s, .mo .num_s {
            font-size: 18px;
        }

        .price_aera {
            color: #ff6600;
        }

        .briefs_item dfn, .mo dfn {
            margin: 0 3px 0 4px;
        }

        .briefs_item.title em {
            font-weight: normal;
            display: block;
            margin-top: 5px;
        }

        .btn_sub {
            cursor: pointer;
            display: inline-block;
            display: block;
            width: 159px;
            line-height: 40px;
            text-align: center;
            background: #009100;
            color: #fff;
            font-size: 14px;
            border: 0;
            margin-left: 10px;
        }
    </style>
</head>
<body>

    <div class="comm">
        <div class="logo">
            <a href="\"><img src="/Application/Home/img/logo.png" /></a>
        </div>
        <div class="order_infos">
            <div class="order_briefs">
                <span class="briefs_item price">
                    订单金额：
                    <span class="price_aera">
                        <dfn></dfn>
                        <b class="num_b"><?php echo ($price); ?><i class="num_s"></i></b>
                    </span>
                </span>
                <?php if($order_type == 0): ?><span class="briefs_item title">
                        <?php echo ($car["car_name"]); ?> <?php echo ($city_name); ?>(<?php if($days == '999'): ?>半<?php else: echo ($days); endif; ?>天)
                        <em>
                            用车时间: <?php echo ($transport_time); ?>
                        </em>
                        <!-- <em>
                        用车时间：  0001/1/1 0:00:00
                        </em> -->
                    </span>
                <?php elseif($order_type == 1): ?>
                    <span class="briefs_item title">
                        <?php echo ($car["car_name"]); ?> <?php echo ($city_name); ?>(<?php if($days == '999'): ?>半<?php else: echo ($days); endif; ?>天)
                        <em>
                            用车时间: <?php echo ($transport_time); ?>
                        </em>
                        <!-- <em>
                        用车时间：  0001/1/1 0:00:00
                        </em> -->
                    </span>
                <?php elseif($order_type == 2): ?>
                    <span class="briefs_item title">
                            <?php echo ($travel_start); ?> - 专车接送机/火车服务(<?php echo ($car["car_name"]); ?>)
                        <em>
                            到达地点：<?php echo ($travel_end); ?> - <?php echo ($travel_end_address); ?>
                        </em>
                        <em>
                            用车时间: <?php echo ($transport_time); ?>
                        </em>
                        <!-- <em>
                        用车时间：  0001/1/1 0:00:00
                        </em> -->
                    </span><?php endif; ?>
            </div>
        </div>
        <div style="font-size: 16px; margin: 10px; border: 1px solid #e1e1e1;padding: 20px 10px 20px">
            <label class="payType"><input type="radio" name="payType" value="1" checked="checked" /><i class="wechat"></i>微信支付</label>
            <!-- <label class="payType"><input type="radio" name="payType" value="2" /><i class="CreditCard"></i>易宝支付</label> -->
        </div>

        <input type="button" onclick="Pay()" value="下一步" class="btn_sub" />
        <!-- <form name="yeepay" action="https://www.yeepay.com/app-merchant-proxy/node" method="post" accept-charset="gb2312">
            <input type="hidden" name="p0_Cmd" value="Buy" />
            <input type="hidden" name="p1_MerId" value="10012436540" />
            <input type="hidden" name="p2_Order" value="81162942399" />
            <input type="hidden" name="p3_Amt" value="540.00" />
            <input type="hidden" name="p4_Cur" value="CNY" />
            <input type="hidden" name="p5_Pid" value="经济型 广州(1天)" />
            <input type="hidden" name="p6_Pcat" value="" />
            <input type="hidden" name="p7_Pdesc" value="用车时间:2018-07-29 08:00" />
            <input type="hidden" name="p8_Url" value="http://www.5bus.cn/Common/DayRentOrderCallBack" />
            <input type="hidden" name="p9_SAF" value="0" />
            <input type="hidden" name="pa_MP" value="" />
            <input type="hidden" name="pd_FrpId" value="" />
            <input type="hidden" name="pr_NeedResponse" value="1" />
            <input type="hidden" name="hmac" value="9ee9c7009bfd32033a1f8f0fcda01693" />
        </form> -->
<form action="<?php echo U('Order/wxpay');?>" id="wxpay" method="post" name="wxpay"><input name="__RequestVerificationToken" type="hidden" value="CmtVlI0tUQOutMYJggAF4rYL9H10gmOCa_GpLCvqOr6KG1GWRNdDi0hsreTMoYXvYLwDNXX3znHyFxH8hu_FMjgm8K01" />            <input type="hidden" name="orderType" value="1" />
            <!-- <input type="hidden" name="orderNO" value="81162942399" /> -->
            <input type="hidden" name="car_price" value="<?php echo ($car["car_price"]); ?>" />
            <!-- <input type="hidden" name="orderTitle" value="经济型 广州(1天)" /> -->
            <input type="hidden" name="transport_time" value="<?php echo ($transport_time); ?>" />
            <input type="hidden" name="car_name" value="<?php echo ($car["car_name"]); ?>" />
            <input type="hidden" name="city_name" value="<?php echo ($city_name); ?>" />
            <input type="hidden" name="days" value="<?php echo ($days); ?>" />
            <input type="hidden" name="price" value="<?php echo ($price); ?>" />
            <input type="hidden" name="order_type" value="<?php echo ($order_type); ?>" />
           <!-- <input type="hidden" name="orderUseTime" value="0001/1/1 0:00:00" /> -->
</form>        <script>
            function Pay() {
                //layer.load();
                var paytype = $("input[name=payType]:checked").val();
                if (paytype == "2") {
                    document.yeepay.submit();
                } else {
                    document.wxpay.submit();
                }
            }
        </script>
    </div>
</body>