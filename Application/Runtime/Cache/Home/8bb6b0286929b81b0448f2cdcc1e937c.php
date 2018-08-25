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
        <a href="<?php echo U('Index/index');?>">首页</a>
        <a href="<?php echo U('Order/travel');?>">在线订车</a>
        <a href="#">日租包车</a>
        <a href="#">接机/送机</a>
    </div>
</nav>

        <link href="/Application/Home/css/user.css" rel="stylesheet" />
        <link href="/Application/Home/css/style.css" rel="stylesheet" />
        <script src="/Application/Home/js/validform_v5.3.2.js"></script>
        <script>
            var pattern = /(17d|13d|14[57]|15[^4,D]|18d)d{8}/; //0?(13|14|15|17|18)[0-9]{9}
            //pattern = /(13d|14[57]|15[^4,D]|17[0678]|18d)d{8}|170[059]d{7}/;
            //$(".index").addClass("cur");
            $(function() {
                $('.agreement').on('click',
                function() {
                    layer.open({
                        type: 2,
                        title: '运来出行协议',
                        skin: 'layui-layer-rim',
                        //加上边框
                        shift: '2',
                        area: ['800px', '560px'],
                        content: '/Reg/RegHelp' //iframe的url
                    });
                });

                $(".utype li").click(function() {
                    $(this).addClass("cur").siblings().removeClass("cur");
                    $(".left>div").eq($(".utype li").index(this)).show().siblings("div").hide();
                });

            });

            function getcity(provinceId, cityId) {
                var selValue = $("#" + provinceId + " option:selected").val();
                var url = "/Common/LoadCityByProvince";
                $.post(url, {
                    provinceID: selValue
                },
                function(data) {
                    var length = data.length;
                    var a = '';

                    for (var i = 0; i < length; i++) {
                        a += '<option value="' + data[i].CityID + '">';
                        a += data[i].CityName;
                        a += '</option>';
                    }
                    $("#" + cityId).html(a);
                });
            }
        </script>
        <div class="comm reg">
            <div class="left">
                <h2>新用户注册
                    <em></em></h2>
                <ul class="utype">
                    <li class="cur">企业用户</li>
                    <li>个人用户</li>
                    <li>车队用户</li></ul>
                <div id="company">
                    <form action="<?php echo U('Index/reg_send');?>" class="companyForm" id="companyForm" method="post" name="companyForm">
                        <input name="__RequestVerificationToken" type="hidden" value="_q7ZqdGDh8MyoiIQrtiHKnkdbyasw0rbQjETqnIK0TcNwq_0ej7UHK-5oHYstcj4cCu1OS-ALsI-_mXoZw0wPPyEFD01" />
                        <input type="hidden" id="tverifycode" name="tverifycode" class="txt" value="">
                        <input type="hidden" name="user_type" class="txt" value="0">
                        <ul class="info">
                            <li>
                                <!-- <em>登录名：</em>
                                <input type="text" name="cname" id="cqiyeyonghu" class="txt" ajaxurl="/Common/CheckUserAccount" placeholder="请输入6-20位用户名" datatype="*6-16" nullmsg="请输入用户名！" errormsg="用户名长度在6-20位之间">
                                <span class="Validform_checktip"></span> -->
                                <em>登录名：</em>
                                <input type="text" name="login_name" id="qiyeyonghu" class="txt" placeholder="请输入6-20位用户名" datatype="*6-16" nullmsg="请输入用户名！" errormsg="用户名长度在6-20位之间">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>手机号码：</em>
                                <input type="text" name="mobile" id="mobile" class="txt" placeholder="请输入11位手机号码" datatype="" nullmsg="请输入手机号码！" errormsg="请输入正确的手机号码">
                                <span class="Validform_checktip"></span>
                                <!-- <img width="130px" class="left15" height="50" alt="验证码" src="<?php echo U('Index/verify_c',array());?>" title="点击刷新" onclick='this.src=this.src+"?c="+Math.random()'>  -->
                            </li>
                            <!-- <li>
                                <em>手机验证码：</em>
                                <input type="text" name="ttelephoneCode" id="ttelephoneCode" class="txt" ajaxurl="/Common/getPhoneVerify" datatype="n6-6" nullmsg="请输入手机验证码" errormsg="请输入6位数字手机验证码" placeholder="6位数字">&nbsp;
                                <input type="button" name="get" id="tcompGetCode" class="getcode" value="获取手机验证码">
                                <span id="tsuccess" class="success"></span>
                                <span class="Validform_checktip"></span>
                            </li> -->
                            <li>
                                <em>密码：</em>
                                <input type="password" name="password" id="tcpass" class="txt" placeholder="6-20位字母、数字和符号" datatype="*6-20" nullmsg="请输入密码！" errormsg="密码范围在6~16位之间！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>确认密码：</em>
                                <input type="password" name="repassword" class="txt" placeholder="请输入确认密码" datatype="*" recheck="password" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！">
                                <span class="Validform_checktip"></span>
                            </li>
                        </ul>
                        <ul class="info" style="border-top: 1px dashed #ccc; padding-top: 10px;">
                            <li>
                                <em>企业名称：</em>
                                <input type="text" name="company_name" class="txt" value="" datatype="*" nullmsg="请输入企业名称！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>所在地：</em>
                                <select name="province" id="tselect1" onchange=" getcity('tselect1', 'tselect2') " datatype="*" nullmsg="请选择省份！">
                                    <option value="">请选择省份</option>
                                    <option value="1">北京市</option>
                                    <option value="2">天津市</option>
                                    <option value="3">河北省</option>
                                    <option value="4">山西省</option>
                                    <option value="5">内蒙古自治区</option>
                                    <option value="6">辽宁省</option>
                                    <option value="7">吉林省</option>
                                    <option value="8">黑龙江省</option>
                                    <option value="9">上海市</option>
                                    <option value="10">江苏省</option>
                                    <option value="11">浙江省</option>
                                    <option value="12">安徽省</option>
                                    <option value="13">福建省</option>
                                    <option value="14">江西省</option>
                                    <option value="15">山东省</option>
                                    <option value="16">河南省</option>
                                    <option value="17">湖北省</option>
                                    <option value="18">湖南省</option>
                                    <option value="19">广东省</option>
                                    <option value="20">广西壮族自治区</option>
                                    <option value="21">海南省</option>
                                    <option value="22">重庆市</option>
                                    <option value="23">四川省</option>
                                    <option value="24">贵州省</option>
                                    <option value="25">云南省</option>
                                    <option value="26">西藏自治区</option>
                                    <option value="27">陕西省</option>
                                    <option value="28">甘肃省</option>
                                    <option value="29">青海省</option>
                                    <option value="30">宁夏回族自治区</option>
                                    <option value="31">新疆维吾尔自治区</option>
                                    <option value="32">香港特别行政区</option>
                                    <option value="33">澳门特别行政区</option>
                                    <option value="34">台湾省</option>
                                    <option value="35">东京直辖市</option>
                                    <option value="36">大阪直辖市</option>
                                    <option value="37">北海道</option>
                                    <option value="38">京都直辖市</option>
                                    <option value="39">首尔直辖市</option>
                                    <option value="40">釜山直辖市</option>
                                    <option value="41">巴黎直辖市</option>
                                    <option value="42">新南威尔士州</option>
                                    <option value="43">维多利亚州</option>
                                    <option value="44">奥克兰省</option>
                                    <option value="45">纽约州</option>
                                    <option value="46">新泽西州</option>
                                    <option value="47">加利福尼亚州</option>
                                    <option value="48">不列颠哥伦比亚省</option>
                                    <option value="49">黑森州</option>
                                    <option value="50">荷兰省</option>
                                    <option value="51">拉齐奥</option>
                                    <option value="52">新加坡直辖市</option>
                                    <option value="53">吉隆坡直辖市</option>
                                    <option value="54">普吉府</option></select>
                                <!-- <select name="tcity" id="tselect2" datatype="*" nullmsg="请选择城市！">
                                    <option value="">请选择城市...</option></select>
                                <span class="Validform_checktip"></span> -->
                            </li>
                            <li>
                                <em>详细地址：</em>
                                <input type="text" name="address" class="txt" value="" datatype="*" nullmsg="请输入详细地址！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>固定电话：</em>
                                <input type="text" name="tel" class="txt" value="" datatype="/^((0d{2,3})-)?(d{7,8})(-(d{3,}))?$/" nullmsg="请填写固定电话！" errormsg="电话格式不正确！" placeholder="如：020-45674523">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>联系人：</em>
                                <input class="txt" name="user_name" nullmsg="请填写联系人！" errormsg="请填写2-6位姓名！" datatype="*2-6" placeholder="联系人">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>验证码：</em>
                                <!-- <input type="text" name="verify" id="verify" class="txt code" ajaxurl="/Common/VerifyCode" nullmsg="请输入验证码" errormsg="请填写4位数字" datatype="n4-4">&nbsp; -->
                                <input type="text" name="code" id="verify" class="txt code" nullmsg="请输入验证码" errormsg="请填写4位数字" datatype="n4-4">&nbsp;
                                <img width="130px" class="left15" height="60" alt="验证码" src="<?php echo U('Index/verify_c',array());?>" title="点击刷新" onclick='this.src=this.src+"?c="+Math.random()'> 
                                <span id="codeSuccess" class="success"></span>
                                <span class="Validform_checktip"></span>
                            </li>
                            <!-- <script>//验证码点击刷新
                                $(".verifyImage").click(function() {
                                    $(this).attr("src", "/Common/CheckCode?r=" + Math.random());
                                });</script> -->
                            <li>
                                <em></em>
                                <input name="qiye" type="checkbox" id="agreement2" datatype="*" nullmsg="请认真阅读运来出行协议">
                                <label for="agreement2">同意</label>
                                <a href="#" class="agreement">《运来出行协议》</a>
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em></em>
                                <input type="submit" value="注册" id="company" name="company" class="submit"></li>
                        </ul>
                    </form>
                </div>
                <div id="person" style="display:none">
                    <form action="<?php echo U('Index/reg_send');?>" class="registerform" method="post" name="userForm">
                        <input name="__RequestVerificationToken" type="hidden" value="zNUwvHGeftqQpAoBs9ksE9FtLiwgMRAKywvLmWc2RB3ezQ_NxoVau1ce61HEg0WHf5UKQE7rsMhd5_nEiE-F3EQxAfM1" />
                        <input type="hidden" id="pverifycode" name="pverifycode" class="txt" value="">
                        <input type="hidden" name="user_type" class="txt" value="1">
                        <ul class="info">
                            <li>
                                <em>登录名：</em>
                                <!-- <input type="text" name="pname" id="pname" class="txt" ajaxurl="/Common/CheckUserAccount" maxlength="20" placeholder="请输入6-20位用户名" datatype="*6-16" nullmsg="请输入用户名！" errormsg="用户名长度在6-20位之间"> -->
                                <input type="text" name="login_name" id="pname" class="txt" maxlength="20" placeholder="请输入6-20位用户名" datatype="*6-16" nullmsg="请输入用户名！" errormsg="用户名长度在6-20位之间">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>手机号码：</em>
                                <input type="text" name="mobile" id="pphone" class="txt" maxlength="11" placeholder="请输入11位手机号码" datatype="" nullmsg="请输入手机号码！" errormsg="请输入正确的手机号码">
                                <span class="Validform_checktip"></span>
                                <!-- <img width="130px" class="left15" height="60" alt="验证码" src="<?php echo U('Index/verify_c',array());?>" title="点击刷新" onclick='this.src=this.src+"?c="+Math.random()'>  -->
                                <!-- <script>//验证码点击刷新
                                    $(".verifyImageSendMsg").click(function() {
                                        $(this).attr("src", "/Common/CheckSendMsgCode?r=" + Math.random());
                                    });</script> -->
                            </li>
                            <!-- <li>
                                <em>手机验证码：</em>
                                <input type="text" name="pphoneCode" id="pphoneCode" class="txt" ajaxurl="/Common/getPhoneVerify" datatype="n6-6" nullmsg="请输入手机验证码" errormsg="请输入6位数字手机验证码" placeholder="6位数字">&nbsp;
                                <input type="button" name="pgetVerify" id="pgetVerify" class="getcode" value="获取手机验证码">
                                <span id="psuccess" class="success"></span>
                                <span class="Validform_checktip"></span>
                            </li> -->
                            <li>
                                <em>密码：</em>
                                <input type="password" name="password" id="ppassword" class="txt" placeholder="6-20位字母、数字和符号" datatype="*6-20" nullmsg="请输入密码！" errormsg="密码范围在6~16位之间！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>确认密码：</em>
                                <input type="password" name="repassword" id="pconfirm" class="txt" placeholder="请输入确认密码" datatype="*" recheck="password" nullmsg="请再输入一次密码！" errormsg="您两次输入的账号密码不一致！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>联系人：</em>
                                <input class="txt" name="user_name" nullmsg="请填写联系人！" errormsg="请填写2-6位姓名！" datatype="*2-6" placeholder="联系人">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>验证码：</em>
                                <!-- <input type="text" name="code" id="verify" class="txt code" ajaxurl="/Common/VerifyCode" nullmsg="请输入验证码" errormsg="请填写4位数字" datatype="n4-4">&nbsp; -->
                                <input type="text" name="code" id="verify" class="txt code" nullmsg="请输入验证码" errormsg="请填写4位数字" datatype="n4-4">&nbsp;
                                <img width="130px" class="left15" height="60" alt="验证码" src="<?php echo U('Index/verify_c',array());?>" title="点击刷新" onclick='this.src=this.src+"?c="+Math.random()'>
                                <span id="codeSuccess" class="success"></span>
                                <span class="Validform_checktip"></span>
                            </li>
                            <!-- <script>//验证码点击刷新
                                $(".verifyImage").click(function() {
                                    $(this).attr("src", "/Common/CheckCode?r=" + Math.random());
                                });</script> -->
                            <li>
                                <em></em>
                                <input type="checkbox" name="checkbox" id="agreement1" datatype="*" nullmsg="请认真阅读运来出行协议">
                                <label for="agreement1">同意</label>
                                <a href="javascript:;" class="agreement">《运来出行协议》</a>
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em></em>
                                <input type="submit" id="person" name="person" value="注册" class="submit"></li>
                        </ul>
                    </form>
                </div>
                <div id="carteam" style="display:none">
                    <form action="<?php echo U('Index/reg_send');?>" class="carteamForm" id="carteamForm" method="post" name="carteamForm">
                        <input name="__RequestVerificationToken" type="hidden" value="a1izGT_L220GTDoVS4Olmj6cf010ery34Dqwl29FpIZrCfYtq8lKtMcW6f6W03pO7_u4hew-CYm8pUuDj3xiPHhdcGo1" />
                        <input type="hidden" id="cverifycode" name="cverifycode" class="txt" value="">
                        <ul class="info">
                            <li>
                                <em>登录名：</em>
                                <!-- <input type="text" name="login_name" id="cqiyeyonghu" class="txt" ajaxurl="/Common/CheckUserAccount" placeholder="请输入6-20位用户名" datatype="*6-16" nullmsg="请输入用户名！" errormsg="用户名长度在6-20位之间"> -->
                                <input type="text" name="login_name" id="cqiyeyonghu" class="txt" placeholder="请输入6-20位用户名" datatype="*6-16" nullmsg="请输入用户名！" errormsg="用户名长度在6-20位之间">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>手机号码：</em>
                                <input type="text" name="mobile" id="ccompphone" class="txt" placeholder="请输入11位手机号码" datatype="" nullmsg="请输入手机号码！" errormsg="请输入正确的手机号码">
                                <span class="Validform_checktip"></span>
                                <!-- <script>//验证码点击刷新
                                    $(".verifyImageSendMsg").click(function() {
                                        $(this).attr("src", "/Common/CheckSendMsgCode?r=" + Math.random());
                                    });</script> -->
                            </li>
                            <!-- <li>
                                <em>手机验证码：</em>
                                <input type="text" name="ctelephoneCode" id="ctelephoneCode" class="txt" ajaxurl="/Common/getPhoneVerify" datatype="n6-6" nullmsg="请输入手机验证码" errormsg="请输入6位数字手机验证码" placeholder="6位数字">&nbsp;
                                <input type="button" name="get" id="ccompGetCode" class="getcode" value="获取手机验证码">
                                <span id="csuccess" class="success"></span>
                                <span class="Validform_checktip"></span>
                            </li> -->
                            <li>
                                <em>密码：</em>
                                <input type="password" name="password" id="cpass" class="txt" placeholder="6-20位字母、数字和符号" datatype="*6-20" nullmsg="请输入密码！" errormsg="密码范围在6~16位之间！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>确认密码：</em>
                                <input type="password" name="repassword" class="txt" placeholder="请输入确认密码" datatype="*" recheck="password" nullmsg="请再输入一次密码！" errormsg="您两次输入的密码不一致！">
                                <span class="Validform_checktip"></span>
                            </li>
                        </ul>
                        <ul class="info" style="border-top:1px dashed #ccc; padding-top:10px;">
                            <li>
                                <em>企业名称：</em>
                                <input type="text" name="company_name" class="txt" datatype="*" nullmsg="请输入企业名称！">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>所在地：</em>
                                <select name="province" id="cselect1" onchange="getcity('cselect1', 'cselect2')" datatype="*" nullmsg="请选择省份！">
                                    <option value="">请选择省份</option>
                                    <option value="1">北京市</option>
                                    <option value="2">天津市</option>
                                    <option value="3">河北省</option>
                                    <option value="4">山西省</option>
                                    <option value="5">内蒙古自治区</option>
                                    <option value="6">辽宁省</option>
                                    <option value="7">吉林省</option>
                                    <option value="8">黑龙江省</option>
                                    <option value="9">上海市</option>
                                    <option value="10">江苏省</option>
                                    <option value="11">浙江省</option>
                                    <option value="12">安徽省</option>
                                    <option value="13">福建省</option>
                                    <option value="14">江西省</option>
                                    <option value="15">山东省</option>
                                    <option value="16">河南省</option>
                                    <option value="17">湖北省</option>
                                    <option value="18">湖南省</option>
                                    <option value="19">广东省</option>
                                    <option value="20">广西壮族自治区</option>
                                    <option value="21">海南省</option>
                                    <option value="22">重庆市</option>
                                    <option value="23">四川省</option>
                                    <option value="24">贵州省</option>
                                    <option value="25">云南省</option>
                                    <option value="26">西藏自治区</option>
                                    <option value="27">陕西省</option>
                                    <option value="28">甘肃省</option>
                                    <option value="29">青海省</option>
                                    <option value="30">宁夏回族自治区</option>
                                    <option value="31">新疆维吾尔自治区</option>
                                    <option value="32">香港特别行政区</option>
                                    <option value="33">澳门特别行政区</option>
                                    <option value="34">台湾省</option>
                                    <option value="35">东京直辖市</option>
                                    <option value="36">大阪直辖市</option>
                                    <option value="37">北海道</option>
                                    <option value="38">京都直辖市</option>
                                    <option value="39">首尔直辖市</option>
                                    <option value="40">釜山直辖市</option>
                                    <option value="41">巴黎直辖市</option>
                                    <option value="42">新南威尔士州</option>
                                    <option value="43">维多利亚州</option>
                                    <option value="44">奥克兰省</option>
                                    <option value="45">纽约州</option>
                                    <option value="46">新泽西州</option>
                                    <option value="47">加利福尼亚州</option>
                                    <option value="48">不列颠哥伦比亚省</option>
                                    <option value="49">黑森州</option>
                                    <option value="50">荷兰省</option>
                                    <option value="51">拉齐奥</option>
                                    <option value="52">新加坡直辖市</option>
                                    <option value="53">吉隆坡直辖市</option>
                                    <option value="54">普吉府</option></select>
                                <!-- <select name="ccity" id="cselect2" datatype="*" nullmsg="请选择城市！">
                                    <option value="">请选择城市</option></select>
                                <span class="Validform_checktip"></span> -->
                            </li>
                            <li>
                                <em>详细地址：</em>
                                <input name="address" type="text" class="txt" datatype="*" nullmsg="请输入详细地址！" style="width:400px;">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>固定电话：</em>
                                <input type="text" name="tel" class="txt" datatype="/^((0d{2,3})-)?(d{7,8})(-(d{3,}))?$/" nullmsg="请填写固定电话！如：020-45674523" errormsg="电话格式不正确！" placeholder="如：020-45674523">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>联系人：</em>
                                <input class="txt" name="user_name" nullmsg="请填写联系人！" errormsg="请填写2-6位姓名！" datatype="*2-6" placeholder="联系人">
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em>验证码：</em>
                                <!-- <input type="text" name="code" id="verify" class="txt code" ajaxurl="/Common/VerifyCode" nullmsg="请输入验证码" errormsg="请填写4位数字" datatype="n4-4">&nbsp; -->
                                <input type="text" name="code" id="verify" class="txt code" nullmsg="请输入验证码" errormsg="请填写4位数字" datatype="n4-4">&nbsp;
                                <img width="130px" class="left15" height="60" alt="验证码" src="<?php echo U('Index/verify_c',array());?>" title="点击刷新" onclick='this.src=this.src+"?c="+Math.random()'>
                                <span id="codeSuccess" class="success"></span>
                                <span class="Validform_checktip"></span>
                            </li>
                            <!-- <script>//验证码点击刷新
                                $(".verifyImage").click(function() {
                                    $(this).attr("src", "/Common/CheckCode?r=" + Math.random());
                                });</script> -->
                            <li>
                                <em></em>
                                <input name="qiye" type="checkbox" id="agreement3" datatype="*" nullmsg="请认真阅读运来出行协议">
                                <label for="agreement3">同意</label>
                                <a href="#" class="agreement">《运来出行协议》</a>
                                <span class="Validform_checktip"></span>
                            </li>
                            <li>
                                <em></em>
                                <input type="submit" value="注册" id="company" name="company" class="submit"></li>
                        </ul>
                    </form>
                </div>
            </div>
            <div class="right">
                <h3>已有运来出行帐号？</h3>
                <p>直接 &nbsp;
                    <a class="btn_login" href="<?php echo U('Index/login');?>">登录</a></p>
                <!--使用第3方帐号登录<br>
                <a href="http://5bus.cn/Qq/land"><img src="img/connect_logo_7.png" width="63" height="24"></a> &nbsp;&nbsp;<!--<a href=""><img src="img/loginbutton_24.png" title="点击进入授权页面" alt="点击进入授权页面" border="0" /></a>-->
                <!--<br>-->
                <span style="color:#009100">
                    <strong>企业客户</strong>注册，均可授信当月1万元的网站消费额度。根据月度购买金额及优良还款记录，可申请提高额度。</span></div>
        </div>
        <script>
            var demo = $(".registerform").Validform({
                tiptype: 3,
                label: ".label",
                datatype: {
                    "zh1-6": /^[u4E00-u9FA5uf900-ufa2d]{1,6}$/
                },
            });

            var regcom = $(".companyForm").Validform({
                tiptype: 3,
                label: ".label",
                datatype: {
                    "zh1-6": /^[u4E00-u9FA5uf900-ufa2d]{1,6}$/
                }
            });
            var demo = $(".carteamForm").Validform({
                tiptype: 3,
                label: ".label",
                datatype: {
                    "zh1-6": /^[u4E00-u9FA5uf900-ufa2d]{1,6}$/
                },
            });
        </script>


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