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
            <a class="index" href="<?php echo U('Index/index');?>">首页</a>
            <a class="order" href="<?php echo U('Order/travel');?>">在线订车</a>
            <a class="day" href="<?php echo U('Order/rent_order');?>">日租包车</a>
            <a class="pickup" href="<?php echo U('Order/shuttle_order');?>">接机/送机</a>
        </div>
    </nav>

    <div class="banner">
        <div class="comm index cur">
            <section style="width:550px; border-radius:8px; margin-left:-80px; margin-top:16px; ">
                <h2 style="color:#009100; line-height:50px;">在线订车</h2>
                <h3 style="margin-left:50px; font-size:15px; color:black; margin-bottom:15px; padding-bottom:8px; border-bottom:1px solid #FFF;">
                    <i style="color:#009100;">热门城市:&nbsp;</i>西安、丽江、成都、珠海、深圳、广州、厦门、杭州、南京、上海</h3>
                <form action="/Order" id="next" method="post">
                    <dl>
                        <dt>租车类型</dt>
                        <dd>
                            <label style="margin-right: 50px;">
                                <input name="car_type" type="radio" value="oneway" checked="checked" style="margin-top: 5px;">单程</label>
                            <label>
                                <input name="car_type" type="radio" value="toandback">往返</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</dd>
                        <div style="clear: both"></div>
                    </dl>
                    <dl>
                        <dt>用车日期</dt>
                        <dd>
                            <input type="text" id="datepicker4" name="datepicker4" value="2018-07-03" class="txt date">
                            <!-- dp hasDatepicker-->
                        </dd>
                        <dt>用车时间</dt>
                        <dd style="margin-top: 5px;">
                            <select class="select hours" name="hours"></select>:
                            <select class="select minutes" name="minutes"></select>
                        </dd>
                    </dl>
                    <div style="clear: both"></div>
                    <dl>
                        <dt>出发地点</dt>
                        <dd class="select-city">
                            <div class="drop-down-icon">
                                <input type="hidden" name="travel-cityid" id="travel-cityid" />
                                <input type="text" class="city" value="哈尔滨" id="travel-start" name="travel-start">
                                <div class="citylist" style="display: none;"></div>
                        </dd>
                        <!-- <dd class="select-city">
                            <select name="travel-start" id="travel-start" class="city" style="width:154px;height:30px;background:#EEEEED;">
                                <option value="哈尔滨">哈尔滨</option>
                                <option value="广州">广州</option>
                                <option value="上海">上海</option>
                            </select>
                        </dd> -->
                        <!-- <div class="container"></div> -->

                        <dd>
                            <div class="part">
                                <input type="text" class="txt place input" id="travel-address" name="travel-address" placeholder="请输入附近的小区/街道/建筑物/商圈" style="width: 200px; margin-left: 36px;"
                                    autocomplete="off">
                                <input type="hidden" class="hasquery" value="0" />
                                <input type="hidden" class="jw" id="fromjw" name="travel[1][fromjw]" value="" />
                                <input name="travel[1][fromaddr]" class="addr" type="hidden" id="fromaddr" size="57" />
                                <div style="display:none" id="result3" class="result">Loading...</div>
                            </div>
                        </dd>
                        <div style="clear: both"></div>
                    </dl>
                    <div style="text-align: center;">
                        <a href="<?php echo U('Order/travel');?>"><input type="button" value="下一步" class="next"></a>
                    </div>
                </form>
            </section>
        </div>
    </div>
    <script src="/Application/Home/js/divselect.js"></script>
    <link href="/Application/Home/css/order.css" rel="stylesheet" />
    <script src="/Application/Home/js/jquery-ui.min.js"></script>
    <link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
    <script src="/Application/Home/js/dateinput-ch-zn.js"></script>
    <script>
        $(function () {
            $(document).click(function () {
                $(".citylist").hide();
            });
            // $.divselect("#select_type", "#rendtype");
            $('.drop-down-icon').click(function (e) {
               
                $(".divselect ul").hide();
                e.stopPropagation();

                var citylist = '';
                $.ajax({
                    type: 'POST',
                    url: '/Home/Index/city',
                    async: false,
                    cache: true,
                    dateType:'json',
                    success: function (data) {
                        var data = JSON.parse(data);
                        citylist = '<ul class="menu"><li class="hover">热门城市</li><li>ABCDEF</li><li>GHJKLM</li><li>NPQRST</li><li>WXYZ</li></ul><div class="main">';

                        var ul1 = '<ul class="block">';
                        var ul2 = '<ul class="cityletter">';
                        var ul3 = '<ul class="cityletter">';
                        var ul4 = '<ul class="cityletter">';
                        var ul5 = '<ul class="cityletter">';

                        var a = '<div class="clearLeft"><div class="alphabet">A</div><div class="subgroup">';
                        var b = '<div class="clearLeft"><div class="alphabet">B</div><div class="subgroup">';
                        var c = '<div class="clearLeft"><div class="alphabet">C</div><div class="subgroup">';
                        var d = '<div class="clearLeft"><div class="alphabet">D</div><div class="subgroup">';
                        var e = '<div class="clearLeft"><div class="alphabet">E</div><div class="subgroup">';
                        var f = '<div class="clearLeft"><div class="alphabet">F</div><div class="subgroup">';
                        var g = '<div class="clearLeft"><div class="alphabet">G</div><div class="subgroup">';
                        var h = '<div class="clearLeft"><div class="alphabet">H</div><div class="subgroup">';
                        var j = '<div class="clearLeft"><div class="alphabet">J</div><div class="subgroup">';
                        var k = '<div class="clearLeft"><div class="alphabet">K</div><div class="subgroup">';
                        var l = '<div class="clearLeft"><div class="alphabet">L</div><div class="subgroup">';
                        var m = '<div class="clearLeft"><div class="alphabet">M</div><div class="subgroup">';
                        var n = '<div class="clearLeft"><div class="alphabet">N</div><div class="subgroup">';
                        var p = '<div class="clearLeft"><div class="alphabet">P</div><div class="subgroup">';
                        var q = '<div class="clearLeft"><div class="alphabet">Q</div><div class="subgroup">';
                        var r = '<div class="clearLeft"><div class="alphabet">R</div><div class="subgroup">';
                        var s = '<div class="clearLeft"><div class="alphabet">S</div><div class="subgroup">';
                        var t = '<div class="clearLeft"><div class="alphabet">T</div><div class="subgroup">';
                        var w = '<div class="clearLeft"><div class="alphabet">W</div><div class="subgroup">';
                        var x = '<div class="clearLeft"><div class="alphabet">X</div><div class="subgroup">';
                        var y = '<div class="clearLeft"><div class="alphabet">Y</div><div class="subgroup">';
                        var z = '<div class="clearLeft"><div class="alphabet">Z</div><div class="subgroup">';
                                // console.log(data);return false;
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].Hot) {
                                ul1 += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            
                            if (data[i].Letter == "A") {
                                a += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "B") {
                                b += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "C") {
                                c += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "D") {
                                d += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "E") {
                                e += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "F") {
                                f += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "G") {
                                g += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "H") {
                                h += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "J") {
                                j += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "K") {
                                k += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "L") {
                                l += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "M") {
                                m += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "N") {
                                n += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "P") {
                                p += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "Q") {
                                q += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "R") {
                                r += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "S") {
                                s += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "T") {
                                t += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "W") {
                                w += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "X") {
                                x += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "Y") {
                                y += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            else if (data[i].Letter == "Z") {
                                z += '<li><a href="#" cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                            }
                            
                        }
                        
                        a += '</div></div>';
                        b += '</div></div>';
                        c += '</div></div>';
                        d += '</div></div>';
                        e += '</div></div>';
                        f += '</div></div>';
                        g += '</div></div>';
                        h += '</div></div>';
                        j += '</div></div>';
                        k += '</div></div>';
                        l += '</div></div>';
                        m += '</div></div>';
                        n += '</div></div>';
                        p += '</div></div>';
                        q += '</div></div>';
                        r += '</div></div>';
                        s += '</div></div>';
                        t += '</div></div>';
                        w += '</div></div>';
                        x += '</div></div>';
                        y += '</div></div>';
                        z += '</div></div>';
                        ul1 += '</ul>';
                        ul2 += a + b + c + d + e + f + '</ul>';
                        ul3 += g + h + j + k + l + m + '</ul>';
                        ul4 += n + p + q + r + s + t + '</ul>';
                        ul5 += w + x + y + z + '</ul>';
                        citylist += ul1 + ul2 + ul3 + ul4 + ul5 + '</div>';
                    },
                    error: function () {
                        //layer.msg("异常！");
                    }
                });
                
                // console.log(citylist);return false;

                $(this).children('.citylist').html(citylist).toggle();
                $('.citylist .menu li').bind('click',
                    function () {
                        $(this).addClass('hover').siblings().removeClass('hover');
                        $('.citylist .main ul').eq($('.menu li').index(this)).show().siblings().hide();
                        return false;
                    });
                $('.citylist .main a').bind('click',
                    function () {
                        var city = $(this).html();
                        var cityID = $(this).attr("cid");
                        $(this).parents('.citylist').prev().val(city);
                        $(this).parents('.citylist').prev().prev().val(cityID);
                        $('.citylist').hide();
                        $(this).parents('.select-city').next().find('.input').val('');
                        return false;
                    });
            });

            $(".dropoff").click(function () {
                $("#dropoffChecked").val('dropoffChecked');
                $(this).submit();
            });

            $(".index").addClass("cur");
            $("footer").css('margin', '0');

            $('.hours').append(hourstxt);
            $('.minutes').append(minutestxt);

            //$( ".dp" ).each(function(){
            //		var d = new Date();
            //		var day=d.getDate()+1;
            //		if(day <10){
            //			day="-0"+day;
            //		}else{
            //			day="-"+day;
            //		}
            //		var str = d.getFullYear()+"-0"+(d.getMonth()+1)+day;
            //		$(this).datepicker({
            //			minDate: str
            //		});
            //	});
            //$(".dp").each(function () {
            //    $(this).datepicker({
            //        minDate: new Date()
            //    });
            //});
            $("#datepicker4").datepicker({
                minDate: new Date()
            });

            $(".next").bind('click',
                function () {
                    var date = $("#datepicker4").val(); //用户选择的日期
                    var hour = $(".hours").val(); //用户选择的小时
                    var minute = $(".minutes").val(); //用户选择的分钟
                    if (date == '') $("#next").submit();
                    var thismon = date.substr(5, 2); //获取用户选择月份
                    var thisday = date.substr(8, 2); //获取用户选择天

                    var now = new Date();
                    var year = now.getFullYear(); //年
                    var month = now.getMonth() + 1; //月
                    var day = now.getDate(); //日
                    var hh = now.getHours(); //时
                    var mm = now.getMinutes(); //分
                    if (month < 10) {
                        month = "0" + month;

                    }

                    if (day < 10) {
                        day = "0" + day;
                    }
                    //if (parseInt(thismon) - parseInt(month) == 0) {
                    //    if (parseInt(thisday) - parseInt(day) == 0) {
                    //        if (parseInt(hour) - parseInt(hh) == 0) {
                    //            if (parseInt(minute) - parseInt(mm) < 0) {
                    //                layer.msg("选择的时间不得小于当前时间");
                    //                return false;
                    //            }
                    //        } else if (parseInt(hour) - parseInt(hh) < 0) {
                    //            layer.msg("选择时间不得小于当前时间");
                    //            return false;
                    //        }
                    //    }
                    //}
                    $("#next").submit();
                });

            var errorMsg = $("#error").val();
            //alert(errorMsg);
            if (errorMsg == '' || typeof (errorMsg) == 'undefined') { } else {
                //$("#error").val('');
                layer.msg(errorMsg, {
                    time: 6000,
                    area: ['200px', '70px'],
                    shift: 4 //动画类型
                });

                $("#error").val('');
            }

        });</script>
    <script type="text/javascript">//图片滚动 调用方法 imgscroll({speed: 30,amount: 1,dir: "up"});
        $.fn.imgscroll = function (o) {
            var defaults = {
                speed: 40,
                amount: 0,
                width: 1,
                dir: "left"
            };
            o = $.extend(defaults, o);

            return this.each(function () {
                var _li = $("li", this);
                _li.parent().parent().css({
                    overflow: "hidden",
                    position: "relative"
                }); //div
                _li.parent().css({
                    margin: "0",
                    padding: "0",
                    overflow: "hidden",
                    position: "relative",
                    "list-style": "none"
                }); //ul
                _li.css({
                    position: "relative",
                    overflow: "hidden"
                }); //li
                if (o.dir == "left") _li.css({
                    float: "left"
                });

                //初始大小
                var _li_size = 0;
                for (var i = 0; i < _li.size(); i++) _li_size += o.dir == "left" ? _li.eq(i).outerWidth(true) : _li.eq(i).outerHeight(true);

                //循环所需要的元素
                if (o.dir == "left") _li.parent().css({
                    width: (_li_size * 3) + "px"
                });
                _li.parent().empty().append(_li.clone()).append(_li.clone()).append(_li.clone());
                _li = $("li", this);

                //滚动
                var _li_scroll = 0;
                function goto() {
                    _li_scroll += o.width;
                    if (_li_scroll > _li_size) {
                        _li_scroll = 0;
                        _li.parent().css(o.dir == "left" ? {
                            left: -_li_scroll
                        } : {
                                top: -_li_scroll
                            });
                        _li_scroll += o.width;
                    }
                    _li.parent().animate(o.dir == "left" ? {
                        left: -_li_scroll
                    } : {
                            top: -_li_scroll
                        },
                        o.amount);
                }

                //开始
                var move = setInterval(function () {
                    goto();
                },
                    o.speed);
                _li.parent().hover(function () {
                    clearInterval(move);
                },
                    function () {
                        clearInterval(move);
                        move = setInterval(function () {
                            goto();
                        },
                            o.speed);
                    });
            });
        };</script>
    <script type="text/javascript">$(document).ready(function () {
            $(".scrollleft").imgscroll({
                speed: 40,
                //图片滚动速度
                amount: 0,
                //图片滚动过渡时间
                width: 1,
                //图片滚动步数
                dir: "left" // "left" 或 "up" 向左或向上滚动
            });
        });</script>
    <div class="comm order-car-flow" style="overflow:hidden">
        <div style="float:left">
            <img src="/Application/Home/img/ad_dingzi.jpg">
        </div>
        <div style="float:right">
            <a href="#" target="_blank">
                <img src="/Application/Home/img/down.jpg">
            </a>
        </div>
    </div>
    <div class="comm ad">
        <a href="#" class="index cur">
            <img src="/Application/Home/img/ad_go.jpg" width="1003" height="182">
        </a>
    </div>
    <div class="comm link">
        <h2>合作伙伴
            <i>PARTNERS</i>
        </h2>
        <div class="guess_rollBox">
            <div class="LeftBotton" onmousedown="ISL_GoUp()" onmouseup="ISL_StopUp()" onmouseout="ISL_StopUp()"></div>
            <div class="Cont" id="ISL_Cont">
                <div class="ScrCont">
                    <div id="List1">
                        <!-- 图片列表 begin -->
                        <div class="pic">
                            <a href="http://www.cctpage.com/" target="_blank" title="康辉旅游">
                                <img src="/Application/Home/img/2015061210182918.png" alt="康辉旅游">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.gdcts.com/" target="_blank" title="广东中旅">
                                <img src="/Application/Home/img/gdzhonglv.png" alt="广东中旅">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://gz.cits.cn/" target="_blank" title="中国国旅广东公司">
                                <img src="/Application/Home/img/3.png" alt="中国国旅广东公司">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.gdcytsgz.com/" target="_blank" title="广东青旅">
                                <img src="/Application/Home/img/4.png" alt="广东青旅">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.hkcts.com/" target="_blank" title="港中旅">
                                <img src="/Application/Home/img/5.jpg" alt="港中旅">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://flight.qunar.com/" target="_blank" title="去哪儿网">
                                <img src="/Application/Home/img/6.png" alt="去哪儿网">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.tuniu.com/" target="_blank" title="途牛旅行网">
                                <img src="/Application/Home/img/7.gif" alt="途牛旅行网">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.lvmama.com/" target="_blank" title="驴妈妈">
                                <img src="/Application/Home/img/8.jpg" alt="驴妈妈">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.gzl.com.cn/b2c-web/index.jsp" target="_blank" title="广之旅">
                                <img src="/Application/Home/img/9.jpg" alt="广之旅">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.ctrip.com/" target="_blank" title="携程旅行网">
                                <img src="/Application/Home/img/10.png" alt="携程旅行网">
                            </a>
                        </div>
                        <div class="pic">
                            <a href="http://www.yaochufa.com/" target="_blank" title="要出发旅行网">
                                <img src="/Application/Home/img/11.png" alt="要出发旅行网">
                            </a>
                        </div>
                        <!-- 图片列表 end -->
                    </div>
                    <div id="List2"></div>
                </div>
            </div>
            <div class="RightBotton" onmousedown="ISL_GoDown()" onmouseup="ISL_StopDown()" onmouseout="ISL_StopDown()"></div>
        </div>
        <div></div>
    </div>
    <script src="/Application/Home/js/scroll.js"></script>


        <div class="container">
            
        </div>
    	<script src="/Application/Home/js/data.js"></script>
        <script src="/Application/Home/js/select-plugin-oop.js"></script>
    
     <script src="/Application/Home/js/all.js"></script>
        <script>
        //     const text = ['选项1','选项二','选项三']
        //     //自定义数据
        // const data = {
        //    'province': ['a1', 'a2', 'a3'],
        //     'city': [
        //               ['a11', 'a12', 'a13'],
        //               ['a21', 'a22'],
        //               ['a31', 'a32']
        //             ],
        //     'county':  [
        //               [['a111', 'a112'], ['a121', 'a122'], ['a131', 'a132']],
        //               [['a211', 'a212'], ['a221', 'a222']],
        //               [['a311'], ['a312']]
        //             ]
        //           };
            // let selector = new Select('.container',default_data);
            // let selector1 = new Select('.container1',data, text)



            var hours = ['00', '01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23'];
            var minutes = ['00', '10', '20', '30', '40', '50'];
            $.hours = function () {
                var htxt = '';
                $.each(hours, function (i, val) {
                    if (val == '08') {
                        htxt += '<option selected="true" value="' + val + '">' + val + '</option>';
                    } else {
                        htxt += '<option value="' + val + '">' + val + '</option>';
                    }
                });
                return htxt;
            };
            $.minutes = function () {
                var mtxt = '';
                $.each(minutes, function (i, val) {
                    mtxt += '<option value="' + val + '">' + val + '</option>';
                });
                return mtxt;
            };
            var hourstxt = $.hours();
            var minutestxt = $.minutes();
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