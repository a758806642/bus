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
        <link href="/Application/Home/css/order.css" rel="stylesheet" />
        <script src="/Application/Home/js/jquery-ui.min.js"></script>
        <link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
        <script src="/Application/Home/js/dateinput-ch-zn.js"></script>
        <script src="/Application/Home/js/dayrentproduct.js"></script>
        <script>$(".day").addClass("cur");

            $(function() {
                var hh = (parseInt(new Date().Format("hh")) - 11).toString();
                var date = "<?php echo date('Y-m-d',strtotime('+1 day'));?>";
                // console.log(date);
                $("#dayrent").addClass("cur");
                $("#cityID").val(60);
                $("#cityName").val("哈尔滨");
                $("#days").val(1);
                $('.hours').append(hourstxt);
                $('.minutes').append(minutestxt);
                $('#datepicker4').val(date);

                if (!ValidateTime()) {
                    var hh = (parseInt(new Date().Format("hh")) - 11).toString();
                    if (hh.length < 2) hh = "0" + hh;
                    $('#hours').val(hh);
                }

                InitData();

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
                        InitData();
                        $('.citylist').hide();
                        $(this).parents('.select-city').next().find('.input').val('');

                        return false;
                    });

                });
                
                

                if ($.browser.msie) {
                    $('input:checkbox').click(function() {
                        this.blur();
                        this.focus();
                    });
                }
                // $("#filter ul.cl_filter li.clearfix label input").off().on('click',function(){
                //     if($(this).hasClass('unlimit')){
                //         var label = $(this).parent();
                //         if($(this).is(':checked')){
                //             $("#filter ul.cl_filter li.clearfix label input").each(function(){
                //                 if(!$(this).hasClass('unlimit')){
                //                     $(this).parent().removeClass('active');
                //                     $(this).prop('checked',false);
                //                 }
                //             });
                //             label.addClass('active');
                //         }else{
                //             label.removeClass('active');
                //         }
                //     }else{
                //         $('.unlimit').prop('checked',false).parent().removeClass('active');
                //         var label = $(this).parent();
                //         if($(this).is(':checked')){

                //             label.addClass('active');
                //         }else{
                //             label.removeClass('active');
                //         }
                //     }
                // });
            });
            </script>
        <link href="/Application/Home/css/tip-yellow.css" rel="stylesheet" />
        <link href="/Application/Home/css/tip-yellowsimple.css" rel="stylesheet" />
        <script src="/Application/Home/js/jquery.poshytip.js"></script>
        <!-- <style>
            .dailyhide { display: none; }
            .dailyextend { display: block; }
            #filter ul li label.active{background: #009100;}
        </style> -->
        <div class="comm step">
            <dl>
                <dt>
                    <span>1.</span>选择车型
                    <em></em>
                    <i>
                    </i>
                </dt>
                <dd>
                    <span>2.</span>填写乘车人信息
                    <em></em>
                    <i>
                    </i>
                </dd>
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
        <div class="comm book">
            <div class="left" id="side">
                <ul>
                    <li id="lefttravel">
                        <a href="<?php echo U('Order/travel');?>" id="jj">旅游包车</a></li>
                    <li id="lefttravel">
                        <a href="<?php echo U('Order/rent_order');?>" id="dayrent">日租包车</a></li>
                </ul>
            </div>
            <div class="right" style="width:760px" id="divmaincontent">
                <dl>
                    <dt>出发城市</dt>
                    <dd class="select-city">
                        <div class="drop-down-icon">
                            <input type="hidden" name=cityID id="cityID" />
                            <input onfocus=" this.blur(); " style="width:80px;height:18px" readonly="readonly" type="text" class="txt city" value="" id="cityName" name="travel_start">
                            <div class="citylist"></div>
                        </div>
                    </dd>
                    <dt>用车时间</dt>
                    <dd>
                        <input type="text" id="datepicker4" name="transport_time" readonly="readonly" onchange="InitData()" value="" class="txt date">
                        <select class="select hours" name="hours" id="hours" onchange="InitData()"></select>:
                        <select class="select minutes" name="minutes" id="minutes" onchange="InitData()"></select></dd>
                    <div class="cartlist">
                        <ul id="condition" class="condition">
                            <li>
                                <label style="padding-left: 25px;">天数</label>
                                <select class="select" name="days" id="days" style="width:130px" onchange="InitData()">
                                    <option onfocus=" this.blur(); " value="999">半天</option>
                                    <option onfocus=" this.blur(); " value="1">一天</option>
                                    <option onfocus=" this.blur(); " value="2">两天</option>
                                    <option onfocus=" this.blur(); " value="3">三天</option>
                                    <option onfocus=" this.blur(); " value="4">四天</option>
                                    <option onfocus=" this.blur(); " value="5">五天</option></select>
                                <input type="button" class="addday" id="searchProduct" value="搜索" style="float: right"></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                </dl>
                <div id="filter" style="display: block;">
                    <ul class="cl_filter">
                        <li class="clearfix vehicle-list">
                            <span class="fl">车型</span>
                            <a class="fl all current" href="javascript:void(0);" onclick="AllClick(this, 1)">不限</a>
                            <div class="fl filter_list"></div>
                            <!-- <a class="fl all current" href="javascript:void(0);" >不限</a> -->
                            <!-- <label ><input type="checkbox" name="carType" value="" class="unlimit">不限</label>
                            <label ><input type="checkbox" name="carType" value="" >1座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >2座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >3座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >4座小巴</label>
                            <label ><input type="checkbox" name="carType" value="" >5座小巴</label> -->
                            <!-- <input type="checkbox" name="car_id[]" value="经济型" onmouseover="this.style.cursor='hand'">经济型 -->
                        </li>
                    </ul>
                </div>
                <!-- <script>
                    $('.checkbox').focus(function(){
                        // $('.checkbox').css("background:#f60","border:1px solid #fe8101","color:#fff");
                        $(".checkbox").addClass("fl all current");
                    });
                </script> -->
                <!-- <style>
                    input:checked + label {
                        background:#f60;
                        border:1px solid #fe8101;
                        color:#fff;
                    }

                </style> -->
                <div class="plist">
                    <div style="padding: 10px; text-align: center;">
                        <img src="/Application/Home/img/onload.gif" />加载中...
                    </div>
                    <!-- <ul>
                        <li class="title">
                            <dl>
                                <dt class="carType">
                                    <img src="' + obj.CarPic + '" style="width: 100px" />
                                </dt>
                                <dt class="info">
                                    <big>经济型
                                        <span>
                                            <i class="passenger xl"></i><dfn>人数</dfn>
                                        </span>
                                        <span>
                                            <i class="baggage xl"></i><dfn>行李数</dfn>
                                        </span>
                                    </big>等级名称&nbsp;等同级车
                                </dt>
                                <dt class="price">
                                    <dfn>¥<big>555 </big></dfn>起
                                </dt>
                            </dl>
                        </li>
                        <li class="vo">
                            <dl>
                                <dd class="img">
                                    <img src="/Application/Home/img/logo.png" style="width:100px" /><br/>
                                    <h3>运来出行</h3>
                                </dd>
                                <dd class="info">
                                    <em>市内/跨域包车</em>
                                </dd>
                                <dd class="score">
                                    <big>4.5</big>/5分
                                </dd>
                                <dd class="price">
                                    <span>
                                        <dfn>¥<big>555</big></dfn><br />
                                        <em class="price-desc">含100公里8小时</em><div class="poTip tip_icon xl points-ltlb" title="含100公里8小时，超公里2.5元/公里，超时长30元/小时"></div>
                                    </span>
                                </dd>
                                <dd class="dyd">
                                    <a href="javascript:void(0);" onclick="Reserve(' + obj.ID + ')" class="yd">点击预定</a>
                                </dd>
                            </dl>
                        </li>
                    </ul> -->


                </div>
            </div>
            <div class="clear"></div>
        </div>
        <script>
        
        // $(function(){
        //     // var a = $('#cityName').attr('value');
        //     $('.drop-down-icon').click(function(){
        //         // console.log(123);
		//         // var url = $("form[name='jd_screenForm']").attr('action');
        //     });
        // });
        
        

        
        $(".date").each(function() {
                $(this).datepicker({
                    minDate: new Date()
                });
            });

            $("#searchProduct").bind('click',
            function() {
                InitData();
            });

            function checkLogin() {

                var user_id = "<?php echo ($_SESSION['user_id']); ?>";
                if(!user_id) {
                    layer.msg('请先登录');
                    return false;
                }
                return true;

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