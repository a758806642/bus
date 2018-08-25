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
            <a class="index" href="<?php echo U('Order/rent_order');?>">日租包车</a>
            <a href="<?php echo U('Order/shuttle_order');?>">接机/送机</a>
    </nav>
        <link href="/Application/Home/CSS/order.css" rel="stylesheet" />
        <script src="/Application/Home/js/dayrentproduct.js"></script>
        <script>
            window.CityID = '197';
            window.CityName = '广州';
            $(function() {

                $("#startCityId").val(window.CityID);
                $("#travel-start").val(window.CityName);
                $("#endCityID").val(window.CityID);
                $("#travel-end").val(window.CityName);

                window.distance_i = 0;
                window.distance_j = 0;
                $('.agreement').on('click',
                function() {
                    layer.open({
                        type: 2,
                        title: '运来出行协议',
                        skin: 'layui-layer-rim',
                        //加上边框
                        shift: '2',
                        area: ['800px', '560px'],
                        content: "/Home/Common/agreement" //iframe的url
                    });
                });

                $('.drop-down-icon').live('click',
                function(e) {
                    $(".result").hide();
                    e.stopPropagation();
                    $(this).children('.citylist').html(citylist).toggle();
                    $('.citylist .menu li').bind('click',
                    function() {
                        $(this).addClass('hover').siblings().removeClass('hover');
                        $('.citylist .main ul').eq($('.menu li').index(this)).show().siblings().hide();
                        return false;
                    });
                    $('.citylist .main a').bind('click',
                    function() {
                        var city = $(this).html();
                        var cityID = $(this).attr("cid");
                        $(this).parents('.citylist').prev().val(city);
                        $(this).parents('.citylist').prev().prev().val(cityID);
                        //var city = $(this).html();
                        //$(this).parents('.citylist').prev().val(city);
                        $('.citylist').hide();
                        $(this).parents('.select-city').next().find('.input').val('');
                        return false;
                    });
                });
            })</script>
        <style type="text/css">.user-select-show ul li { width: 354px; min-height: 190px; display: block; background-color: #eeeeed; border-radius: 5px; line-height: 25px; padding-bottom: 15px; margin-top: 20px; } .user-select-show ul li dd hr { margin-left: -35px; } .user-select-show ul li .pickup-show { font-size: 14px; margin-left: -10px; } .textarea { border: 1PX solid #eeeeed; background: #eeeeed; margin-left: -30px; border-radius: 5px; height: 100px; width: 500px; padding: 4px; } .comm .user-select-show .daily { width: 300px; margin-left: 35px; padding: 5px; height: 25px; background: #00A600; color: #fff; border: 1px solid #009100; cursor: pointer; border-radius: 4px; margin-bottom: 10px; } .comm .user-select-show .daily:hover { background: #007500; } .coordinate { }</style>
        <div class="comm step mb20">
            <dl>
                <dd>
                    <span>1.</span>选择车型
                    <em></em>
                    <i>
                    </i>
                </dd>
                <dt>
                    <span>2.</span>填写乘车人信息
                    <em></em>
                    <i>
                    </i>
                </dt>
                <dd>
                    <span>3.</span>支付
                    <em></em>
                    <i>
                    </i>
                </dd>
                <dd>
                    <span>4.</span>派车
                    <em></em>
                    <i>
                    </i>
                </dd>
                <dd>
                    <span>5.</span>用车完成
                    <em></em>
                    <i>
                    </i>
                </dd>
            </dl>
        </div>
        <div class="comm">
            <div class="select-car">
                <span>填写行程信息</span></div>
            <div class="arrow-down ml26"></div>
            <form action="<?php echo U('Order/rent_order_pay');?>" id="main_form" method="post" name="main_form">
                <input name="__RequestVerificationToken" type="hidden" value="qL_9umWIX-W3UMhniZsOqVyyG7y9yc5FfhjREgnFIzZjTat7YJAmEJzglA1JzUFwR0-slCNbBqBuL6eBQei6zakzusg1" />
                <!-- <input type="hidden" name="productID" id="productID" value="14674224" />
                <input type="hidden" name="hour" value="08" />
                <input type="hidden" name="minute" value="00" /> -->
                <input type="hidden" name="car_id" value="<?php echo ($product["car"]["id"]); ?>">
                <input type="hidden" name="transport_data" value="<?php echo ($product["transport_data"]); ?>">
                <input type="hidden" name="days" value="<?php echo ($product["days"]); ?>">
                <input type="hidden" name="city_name" value="<?php echo ($product["city_name"]); ?>">
                <input type="hidden" name="price" value="<?php echo ($price); ?>">
                <div class="userinfo-formline">
                    <input type="hidden" name="total" id="total" value="1">
                    <div class="daily" name="daily" day="1" style="display:none">第1天行车线路</div>
                    <div class="travel" id="divtravel" name="divtravel" show="1" style="display: block;">
                        <input type="hidden" name="travel[1][total]" id="total" value="0">
                        <input type="hidden" name="travel[1][Distance]" id="travelDistance" value="">
                        <div class="path" id="path">
                            <dl>
                                <dt>上车地点</dt>
                                <dd class="select-city">
                                    <div class="drop-down-icon">
                                        <input type="hidden" name="travel[1][travel-startid]" id="startCityId" class="id" />
                                        <input onfocus=" this.blur(); " readonly="readonly" type="text" class="txt city" value="" id="travel-start" name="travel[1][travel_start]">
                                        <div class="citylist"></div>
                                    </div>
                                </dd>
                                <dd>
                                    <div class="part">
                                        <input type="text" class="txt place input" id="travel-address" name="travel[1][travel_address]" placeholder="请输入附近的小区/街道/建筑物/商圈" autocomplete="off" value="">
                                        <input type="button" class="add" value="添加途经点">
                                        <input type="hidden" class="hasquery" value="0">
                                        <input type="hidden" class="jw" id="fromjw" name="travel[1][fromjw]" value="">
                                        <input name="travel[1][fromaddr]" class="addr" type="hidden" id="fromaddr" size="57" value="">
                                        <div style="display: none" id="result3" class="result">Loading...</div></div>
                                </dd>
                            </dl>
                        </div>
                        <div class="path">
                            <dl>
                                <dt>下车地点</dt>
                                <dd class="select-city">
                                    <div class="drop-down-icon">
                                        <input type="hidden" name="travel[1][travel-endid]" class="id" id="endCityID" />
                                        <input onfocus=" this.blur(); " readonly="readonly" type="text" class="txt city" id="travel-end" name="travel[1][travel_end]" value="">
                                        <div class="citylist"></div>
                                    </div>
                                </dd>
                                <dd>
                                    <div class="part">
                                        <input type="text" class="txt place input" id="end-address" name="travel[1][end_address]" placeholder="请输入附近的小区/街道/建筑物/商圈" autocomplete="off">
                                        <input type="hidden" class="hasquery" value="0">
                                        <input type="hidden" class="jw" id="tojw" name="travel[1][tojw]" value="">
                                        <input name="travel[1][toaddr]" class="addr" type="hidden" id="toaddr" size="57">
                                        <div style="display: none" id="result2" class="result">Loading...</div></div>
                                </dd>
                            </dl>
                        </div>
                    </div>
                    <ul>
                        <li>
                            <label class="label">行程备注</label>
                            <textarea name="remark" id="remark" class="textarea" placeholder=""></textarea>
                            <span class="c_red2 tips tips2 xs2" id="hirer_phone_tips" style="display:none;">手机号不能为空</span>
                            <div class="clean-status"></div>
                        </li>
                    </ul>
                    <div class="select-car">
                        <span>填写用车人信息</span></div>
                    <div class="arrow-down ml26"></div>
                    <div>
                        <ul>
                            <li>
                                <label class="label">用车人</label>
                                <div class="fill-userinfo">
                                    <div class="drop-down-icon">
                                        <span>
                                            <em>
                                                <input type="text" id="ContactName" name="travel_username" placeholder="请输入用车人姓名" value="<?php echo ($user["user_name"]); ?>" maxlength="20"></em>
                                        </span>
                                    </div>
                                </div>
                                <div class="floatingLeft" style="display:none">
                                    <!--<label><input type="checkbox" name="save_user" id="save_user" checked value="on" class="vm"/> 保存至常用联系人</label>--></div>
                                <span class="c_red2 w98 xs2" id="hirer_name_tips" style="display:none;">用车人姓名不能为空</span>
                                <div class="clean-status"></div>
                            </li>
                            <li>
                                <label class="label">手机号码</label>
                                <div class="fill-userinfo">
                                    <span>
                                        <em>
                                            <input type="text" id="contractPhone" name="travel_mobile" placeholder="请输入用车人手机号码" value="<?php echo ($user["mobile"]); ?>" maxlength="20" style="width:190px"></em>
                                    </span>
                                </div>
                                <div class="floatingLeft" style="display:none">
                                    <!-- <label><input type="checkbox" name="save_user" id="save_user" checked value="on" />租车人免费接收提示短信</label>--></div>
                                <span class="c_red2 tips tips2 xs2" id="hirer_phone_tips" style="display:none;">手机号不能为空</span>
                                <div class="clean-status"></div>
                            </li>
                            <li style="margin-top:20px; margin-left:90px;">
                                <label>
                                    <input type="checkbox" name="save_user" id="save_user" checked="" value="on">同意</label>
                                <a href="javascript:;" class="aLink agreement">《运来出行服务协议》</a></li>
                            <li style="margin-top:40px; margin-left:90px;">
                                <input type="button" class="submit" value="提交订单，去支付"></li>
                        </ul>
                    </div>
                </div>
            </form>
            <!--right-->
            <div class="user-select-show">
                <ul>
                    <li>
                        <dt class="cartype-back">
                            <a href="#" onClick="javaScript:history.go(-1)">返回修改</a></dt>
                        <div class="pickup-show">
                            <span class="travel"></span>
                            <div class="daily" name="daily" days="1">日租包车套餐信息</div>
                            <div id="divtravel" name="divtravel" show="1" style="display: block">
                                
                                <dd>产品：包车套餐（含100公里8小时）</dd>
                                <dd>车型：<?php echo ($product["car"]["car_name"]); ?></dd>
                                <dd>城市：<?php echo ($product["city_name"]); ?></dd>
                                <dd>用车时间：<?php echo ($product["transport_data"]); ?></dd>
                                <dd>用车天数：<?php if($product["days"] == '999'): ?>半<?php else: echo ($product["days"]); endif; ?> 天</dd>
                                <dd>产品套餐价格：<?php echo ($price); ?> 元</dd>
                                <dd>超出套餐范围收费请参考
                                    <a href="javascript:;" class="dayRentHelp aLink">《预定须知》</a></dd>
                            </div>
                        </div>
                    </li>
                    <li style=" width:354px; min-height:80px;display:block; background-color:#eeeeed; border-radius:5px; margin-bottom:30px;  ">
                        <dd style=" position:relative; margin-top:20px; ">
                            <div style="position:absolute; margin-top:20px; margin-left:-20px; ">
                                <div class="icons-phone"></div>
                            </div>
                            <div></div>
                        </dd>
                        <dd style="float:right; width:250px; font-size:16px; margin: 20px 0px 0 10px;">如需帮助请咨询</dd>
                        <dd>
                            <span style="color:#009100; margin-left:60px; font-size:16px">189-2237-8000</span></dd>
                    </li>
                </ul>
            </div>
            <div class="clean-status"></div>
        </div>
        <script src="/Application/Home/js/config.js"></script>
        <script>$(function() {
                $("[name=daily]").eq(0).next("#divtravel").css('display', 'block');

                $("[name=daily]").live('click',
                function() {
                    //$(this).next("#divtravel").slideToggle("fast").siblings("#divtravel:visible").slideUp("fast");
                });

                $(".submit").bind('click',
                function() {
                    var travelValidate = $.DayRentValidate();
                    var flag = true;
                    var contactName = $("#ContactName");
                    var contractPhone = $("#contractPhone");
                    if (contactName.val() == '') {
                        layer.msg("用车人不能为空.");
                        contactName.focus();
                        flag = false;
                    }
                    if (contractPhone.val() == '') {
                        layer.msg("手机号码不能为空.");
                        contractPhone.focus();
                        flag = false;
                    }
                    if (travelValidate && flag) {
                        layer.load();
                        $("#main_form").submit();
                    }
                });
            });

            function InitDistance() {
                var flag = true;
                var total = $("#total").val();
                for (var i = 1; i <= total; i++) {
                    var div = $('div[show="' + i + '"]');
                    var itemTotal = div.find("#total").val();
                    var travelDistance = div.find("#travelDistance");
                    travelDistance.val('');
                    var sJW = div.find("#fromjw").val();
                    var eJW = div.find("#tojw").val();
                    if (sJW == '' || eJW == '') {
                        flag = false;
                    }
                    if (flag) {
                        for (var j = 1; j <= itemTotal; j++) {
                            var jw = div.find("input[name='travel[" + i + "][pathjw" + (j - 1) + "]']").val();
                            if (jw == '') {
                                flag = false;
                                break;
                            }
                        }
                    }
                }

                if (flag) {
                    for (var i = 1; i <= total; i++) {
                        var div = $('div[show="' + i + '"]');
                        var itemTotal = div.find("#total").val();
                        var travelDistance = div.find("#travelDistance");
                        travelDistance.val('');
                        var sJW = div.find("#fromjw").val();
                        var eJW = div.find("#tojw").val();
                        alert(itemTotal);
                        if (itemTotal == 0) {
                            Distance(sJW, eJW, travelDistance);
                        } else {
                            //$("input[name='mobile']")
                            var fjw = sJW;
                            var ejw = '';
                            for (var j = 1; j <= itemTotal; j++) {
                                //重新构建name
                                //if (j != 1) {
                                //    fjw = div.find("input[name='travel[" + i + "][pathjw" + (j - 1) + "]']").val();
                                //}
                                //ejw = div.find("input[name='travel[" + i + "][pathjw" + j + "]']").val();
                                if (j != 1) {
                                    fjw = div.find("input[name='pathjw" + (j - 1) + "']").val();
                                }
                                ejw = div.find("input[name='pathjw" + j + "']").val();

                                Distance(fjw, ejw, travelDistance);

                            }
                            Distance(ejw, eJW, travelDistance);
                        }
                    }
                }
            }

            function Distance(fromjw, tojw, travelDistance) {
                alert(fromjw);
                alert(tojw);
                if (fromjw != '' && fromjw != undefined && tojw != '' && tojw != undefined) {
                    $.ajax({
                        url: 'http://api.map.baidu.com/direction/v1/routematrix',
                        cache: false,
                        dataType: 'jsonp',
                        //这个很重要，跨域问题
                        type: 'get',
                        async: false,
                        data: {
                            mode: 'driving',
                            origins: fromjw,
                            destinations: tojw,
                            tactics: '12',
                            output: "json",
                            ak: window.ak
                        },
                        success: function(data) {
                            try {
                                var txt = data.result.elements[0].distance.text;
                                //alert(obj.val());
                                //var div = $('div[show="' + i + '"]');
                                //var travelDistance = div.find("#travelDistance");
                                //var val = data.result.elements[0].distance.value;
                                travelDistance.val(travelDistance.val() + ',' + txt);
                            } catch(e) {}
                            //$("#distance\\[" + i + "\\]\\[" + j + "\\]").val(txt);
                            //$("#e-distance" + i + j).html(txt);
                        }
                    });
                }
            }</script>
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