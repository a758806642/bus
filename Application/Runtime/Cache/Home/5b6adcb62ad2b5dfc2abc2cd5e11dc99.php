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
    
    
    
<link href="/Application/Home/css/7b9256e54a0541c0937ce98ffb4b3d7c.css" rel="stylesheet" />

<style>
        .comm a:hover{
            background-color: #009100;
        }
        
            nav {
                background: #93D400;
                height: 45px;
                line-height: 45px;
                border-bottom: 1px solid #93D400;
                border-top: 1px solid #93D400;
                min-width: 1003px;
                display: block;
            }

            nav a:hover, nav a.cur {
                background: #009100;
            }


            footer .foot li.center p {
                font-size: 24px;
                color: black;
                font-weight: bold;
                float: left;
                margin: 120px 10px 0 10px;
            }

            footer .foot li.center span {
                background: #009100;
                border-radius: 4px;
                font-weight: normal;
                line-height: 14px;
                padding: 4px;
                font-size: 15px;
                color: #fff;
                display: inline-block;
                vertical-align: -3px;
                margin-right: 4px;
            }

            header .top .login_reg {
                border-radius: 3px;
                background: #00A600;
                width: 120px;
                height: 30px;
                position: absolute;
                top: 75px;
                right: 0;
                text-align: center;
                line-height: 30px;
                color: #fff;
            }
        </style>
        <nav>
            <div class="comm">
                <a href="<?php echo U('Index/index');?>">首页</a>
                <a class=""  href="<?php echo U('Order/travel');?>">在线订车</a>
                <a href="<?php echo U('Order/rent_travel');?>">日租包车</a>
                <a href="<?php echo U('Order/shuttle_travel');?>">接机/送机</a>
            </div>
        </nav>
        
            <body>
                <div class="comm login">
                    <div>
                        <h2>会员登录</h2>
                        <span name="hid1" id="hid1" style="color: #009100; height: 20px; display: block; font-size: 12px"></span>
                        <form action="<?php echo U('Index/login_send');?>" id="login_form" method="post" name="login_form">
                            <input name="__RequestVerificationToken" type="hidden" value="okGfHtIyyCOvi99w--nrZ0ilnGtJ6Rp73T_-2xCmcZKVdoonNHFkNnB23WAtUyCnmLjoAdB3hlZgP1aWeRjeiLZPRHE1" />
                            <input class="txt" data-val="true" data-val-required="请输入用户名" id="UserName" name="login_name" placeholder="输入登录名/注册手机" type="text" value="" />
                            <span class="field-validation-valid" data-valmsg-for="UserName" data-valmsg-replace="false"></span>
                            <input class="txt" data-val="true" data-val-required="请输入密码" id="Password" name="password" placeholder="输入密码" type="password" />
                            <span class="field-validation-valid" data-valmsg-for="Password" data-valmsg-replace="false"></span>
                            <p>
                                <input type="checkbox" name="auto" id="auto">
                                <label for="auto">自动登录</label>
                                <a class="forget" href="http://www.5bus.cn/Reg/Forget">忘记密码？</a></p>
                            <button style="cursor: pointer" class="submit" id="loginSystem" value="登录">登录</button>
                            <p style="border-bottom: 1px dashed #ccc;">还不是运来出行用户？
                                <a class="reg" href="<?php echo U('Index/reg');?>">免费注册</a></p>
                            <p style="font-size: 14px; text-align: center; padding-top: 10px; line-height: 200%">&nbsp;&nbsp;
                                <!--<a href=""><img src="img/loginbutton_24.png" title="点击进入授权页面" alt="点击进入授权页面" border="0"/></a>--></p></form>
                    </div>
                </div>
            </body>
        
        </html>
        <br/>
        <script type="text/javascript">document.createElement("footer");</script>
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