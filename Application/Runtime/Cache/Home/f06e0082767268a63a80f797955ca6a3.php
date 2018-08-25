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
            <a class="index" href="<?php echo U('Order/travel');?>">在线订车</a>
            <a href="<?php echo U('Order/rent_order');?>">日租包车</a>
            <a href="<?php echo U('Order/shuttle_order');?>">接机/送机</a></div>
    </nav>
    <script>
        $(function() {
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
        })
    </script>
    <style type="text/css">.user-select-show ul li { width: 354px; min-height: 190px; display: block; background-color: #eeeeed; border-radius: 5px; line-height: 25px; padding-bottom: 15px; margin-top: 20px; } .user-select-show ul li dd hr { margin-left: -35px; } .user-select-show ul li .pickup-show { font-size: 14px; margin-left: -10px; } .textarea { border: 1PX solid #eeeeed; background: #eeeeed; margin-left: -30px; border-radius: 5px; height: 100px; width: 500px; padding: 4px; } .comm .user-select-show .daily { width: 300px; margin-left: 35px; padding: 5px; height: 25px; background: #00A600; color: #fff; border: 1px solid #009100; cursor: pointer; border-radius: 4px; margin-bottom: 10px; } .comm .user-select-show .daily:hover { background: #007500; } .coordinate{}</style>
    <div class="comm step mb20">
        <dl>
            <dd>
                <span class="ml25">1.</span>选择用车方式
                <em></em>
                <i>
                </i>
            </dd>
            <dd>
                <span>2.</span>选择车型
                <em></em>
                <i>
                </i>
            </dd>
            <dt>
                <span>3.</span>填写租车人信息
                <em></em>
                <f>
                </f>
                <i>
                </i>
            </dt>
        </dl>
    </div>
    <div class="comm">
        <div class="select-car">
            <span>填写信息</span></div>
        <div class="arrow-down ml26"></div>
        <form action="<?php echo U('Order/travel_order_info');?>" id="main_form" method="post" name="main_form">
            <input name="__RequestVerificationToken" type="hidden" value="hUf3vijVWqNkRD0lpHi6BnbURfw9RX04QpRaw2x14Me4Hn6Vz0HWd88XZc8vf9vPqBLFVMqi_uLKbd8UcA-LJOWEq_U1" />
            <input type="hidden" name="CarType" value="oneway" />
            <input type="hidden" name="pickDate" value="2018-07-25" />
            <input type="hidden" name="CarSeatID" value="17" />
            <input type="hidden" name="CarCount" value="6" />
            <input type="hidden" name="fromType" value="" />
            <input type="hidden" name="thirdOrderNO" value="" />
            <input type="hidden" name="DayCount" value="1" />
            <input type="hidden" name="DayCarLine[1]" value="3" />
            <input type="hidden" name="DayDate[1][1]" id="DayDate[1][1]" value="2018-07-25" />
            <input type="hidden" name="Hour[1][1]" id="Hour[1][1]" value="4">
            <input type="hidden" name="Minutes[1][1]" id="Minutes[1][1]" value="40">
            <input type="hidden" name="CityID[1][1]" id="CityID[1][1]" value="199">
            <input type="hidden" name="CityName[1][1]" id="CityName[1][1]" value="深圳">
            <input type="hidden" name="AddressName[1][1]" id="AddressName[1][1]" value="A one大厦">
            <input type="hidden" name="AddressDetail[1][1]" id="AddressDetail[1][1]" value="广东省深圳市龙华区腾龙路隔圳新村Aone商务大厦">
            <input type="hidden" name="distance[1][1]" id="distance[1][1]" value="">
            <input type="hidden" name="DayDate[1][2]" id="DayDate[1][2]" value="2018-07-25" />
            <input type="hidden" name="Hour[1][2]" id="Hour[1][2]" value="4">
            <input type="hidden" name="Minutes[1][2]" id="Minutes[1][2]" value="40">
            <input type="hidden" name="CityID[1][2]" id="CityID[1][2]" value="74">
            <input type="hidden" name="CityName[1][2]" id="CityName[1][2]" value="南京">
            <input type="hidden" name="AddressName[1][2]" id="AddressName[1][2]" value="A3路">
            <input type="hidden" name="AddressDetail[1][2]" id="AddressDetail[1][2]" value="江苏省南京市浦口区">
            <input type="hidden" name="distance[1][2]" id="distance[1][2]" value="">
            <input type="hidden" name="DayDate[1][3]" id="DayDate[1][3]" value="2018-07-25" />
            <input type="hidden" name="Hour[1][3]" id="Hour[1][3]" value="4">
            <input type="hidden" name="Minutes[1][3]" id="Minutes[1][3]" value="40">
            <input type="hidden" name="CityID[1][3]" id="CityID[1][3]" value="2">
            <input type="hidden" name="CityName[1][3]" id="CityName[1][3]" value="天津">
            <input type="hidden" name="AddressName[1][3]" id="AddressName[1][3]" value="万达广场写字楼-A座">
            <input type="hidden" name="AddressDetail[1][3]" id="AddressDetail[1][3]" value="津滨大道36号">
            <input type="hidden" name="distance[1][3]" id="distance[1][3]" value="">
            <input type="hidden" name="AddressJW[1][1]" id="AddressJW[1][1]" class="coordinate" value="22.640439,114.024804">
            <input type="hidden" name="AddressJW[1][2]" id="AddressJW[1][2]" class="coordinate" value="32.185941,118.740337">
            <input type="hidden" name="AddressJW[1][3]" id="AddressJW[1][3]" class="coordinate" value="39.130479,117.260003">
            <input type="hidden" name="AddressJW[1][4]" id="AddressJW[1][4]" class="coordinate" value="">


            <input type="hidden" name="rental_type" value="<?php echo ($rental_type); ?>">
            <input type="hidden" name="order_type" value="<?php echo ($order_type); ?>">
            <input type="hidden" name="car_id" value="<?php echo ($car_id); ?>">
            <input type="hidden" name="car_number" value="<?php echo ($car_number); ?>">
            <input type="hidden" name="transport_data" value="<?php echo ($transport_data); ?>">



            <div class="userinfo-formline">
                <ul>
                    <li>
                        <label class="label">租车人</label>
                        <div class="fill-userinfo">
                            <div class="drop-down-icon">
                                <span>
                                    <em>
                                        <input type="text" id="ContactName" name="travel_username" placeholder="请输入租车人姓名" value="<?php echo ($user["user_name"]); ?>" maxlength="20"></em>
                                </span>
                            </div>
                        </div>
                        <div class="floatingLeft" style="display:none">
                            <!--<label><input type="checkbox" name="save_user" id="save_user" checked value="on" class="vm"/> 保存至常用联系人</label>--></div>
                        <span class="c_red2 w98 xs2" id="hirer_name_tips" style="display:none;">租车人姓名不能为空</span>
                        <div class="clean-status"></div>
                    </li>
                    <li>
                        <label class="label">手机号码</label>
                        <div class="fill-userinfo">
                            <span>
                                <em>
                                    <input type="text" id="contractPhone" name="travel_mobile" placeholder="请输入租车人手机号码" value="<?php echo ($user["mobile"]); ?>" maxlength="20" style="width:190px"></em>
                            </span>
                        </div>
                        <div class="floatingLeft" style="display:none">
                            <!-- <label><input type="checkbox" name="save_user" id="save_user" checked value="on" />租车人免费接收提示短信</label>--></div>
                        <span class="c_red2 tips tips2 xs2" id="hirer_phone_tips" style="display:none;">手机号不能为空</span>
                        <div class="clean-status"></div>
                    </li>
                    <li>
                        <label class="label">通知车队</label>
                        <input style="margin-left: -30px" type="checkbox" name="notifyCarTeam" value="true" checked="checked" />短信通知服务车队报价</li>
                    <li>
                        <label class="label">供应商等级</label>
                        <select id="OrderLevel" name="order_level">
                            <option value="0">不限</option>
                            <option value="1">1级</option>
                            <option value="2">2级</option>
                            <option value="3">3级</option></select>
                        <script></script>
                    </li>
                    <li>
                        <label class="label">服务留言</label>
                        <textarea name="remark" id="remark" class="textarea" placeholder="例：有小孩一同乘坐，请开慢点。"></textarea>
                        <span class="c_red2 tips tips2 xs2" id="hirer_phone_tips" style="display:none;">手机号不能为空</span>
                        <div class="clean-status"></div>
                    </li>
                    <li style="margin-top:20px; margin-left:90px;">
                        <label>
                            <input type="checkbox" name="save_user" id="save_user" checked="" value="on">同意</label>
                        <a href="javascript:;" class="aLink agreement">《运来出行服务协议》</a></li>
                    <li style="display:none">
                        <label class="label">结算方式</label>
                        <label>
                            <input type="radio" name="payment[]" id="payment" value="月结">月结</label>
                        <label>
                            <input type="radio" name="payment[]" id="payment" value="网上支付" checked="checked">网上支付</label></li>
                    <li style="margin-top:40px; margin-left:90px;">
                        <input type="submit" class="submit" value="提交" onclick="layer.load();"></li>
                </ul>
            </div>

        <!--right-->
        <div class="user-select-show">
            <ul>
                <li>
                    <dt class="cartype-back">
                        <a href="#" onClick="javaScript:history.go(-1)">返回修改</a></dt>
                    <div class="pickup-show">
                        <!--<dd>用车方式：</dd>
                        <dd>用车时间：</dd>
                        <dd>结束时间：</dd>-->
                        <dd>用车方式：
                            <?php if($rental_type == 0): ?>单程
                            <?php else: ?>往返<?php endif; ?>
                        </dd>
                        <span class="travel"></span>
                        <?php if(is_array($travel)): foreach($travel as $k=>$list): ?><div class="daily" name="daily" day="1">第<?php echo ($k); ?>天行车线路</div>
                            <div id="divtravel" name="divtravel" show="1" style="display: block;">
                                <dd>时间：<?php echo ($list["date"]["0"]); ?> <?php echo ($list["hours"]["0"]); ?>:<?php echo ($list["minutes"]["0"]); ?>
                                    <!-- <input type="hidden" name="travel[<?php echo ($k); ?>][date][]" value="<?php echo ($list["date"]["0"]); ?> <?php echo ($list["hours"]["0"]); ?>:<?php echo ($list["minutes"]["0"]); ?>" /> -->
                                </dd>
                                <dd>起点：<?php echo ($list["travel_start"]); ?>
                                        <!-- <input type="hidden" value="<?php echo ($list["travel_start"]); ?>" name="travel[<?php echo ($k); ?>][travel_start]"> -->
                                </dd>
                                <dd>地点：<?php echo ($list["travel_address"]); ?>
                                        <!-- <input type="hidden" name="travel[<?php echo ($k); ?>][travel_address]" value="<?php echo ($list["travel_address"]); ?>"> -->
                                </dd>
                                <dd>地址：<?php echo ($list["fromaddr"]); ?></dd>
                                    <dd>↓&nbsp;&nbsp;
                                    <span id="e-distance11" class='distance'></span></dd>
                                <?php $__FOR_START_1706352079__=1;$__FOR_END_1706352079__=$list["total"];for($i=$__FOR_START_1706352079__;$i <= $__FOR_END_1706352079__;$i+=1){ ?><dd>时间：<?php echo ($list["date"]["0"]); ?> <?php echo ($list["hours"]["0"]); ?>:<?php echo ($list["minutes"]["0"]); ?></dd>
                                        <dd>途径：<?php echo ($list["path$i"]); ?></dd>
                                        <dd>地点：<?php echo ($list["pathname$i"]); ?></dd>
                                        <dd>地址：<?php echo ($list["pathaddr$i"]); ?></dd>
                                        <dd>↓&nbsp;&nbsp;
                                            <span id='e-distance12' class='distance'></span></dd><?php } ?>
                                <dd>时间：<?php echo ($list["date"]["0"]); ?> <?php echo ($list["hours"]["0"]); ?>:<?php echo ($list["minutes"]["0"]); ?></dd>
                                <dd>终点：<?php echo ($list["travel_end"]); ?></dd>
                                <dd>地点：<?php echo ($list["end_address"]); ?></dd>
                                <dd>地址：<?php echo ($list["toaddr"]); ?></dd>
                            </div><?php endforeach; endif; ?>
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
</form>
    <script src="/Scripts/CustomJS/config.js"></script>
    <script>$(function() {


            $("[name=daily]").eq(0).next("#divtravel").css('display', 'block');

            $("[name=daily]").live('click',
            function() {
                $(this).next("#divtravel").slideToggle("fast").siblings("#divtravel:visible").slideUp("fast");
            });
            
            $.distance = function(fromjw, tojw, i, j) {
                //var result=2;
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

                        var txt = data.result.elements[0].distance.text;
                        var val = data.result.elements[0].distance.value;
                        //distance[1][1]
                        $("#distance\[" + i + "\]\[" + j + "\]").val(txt);
                        $("#e-distance" + i + j).html(txt);
                    }
                });
                //return result;
            };

            /*var pos = 0;
        $("input[id^='coordinate[1]']").each(function(index, element) {
              if($(this).val() != '') {
                  //alert($(this).attr('id'));
                  window.distance.coordinate[0][pos] = $(this).val();
                  pos++;
              }
        });*/

            $(".coordinate").each(function(i, val) {

                //var fromjw=$.trim($("#coordinate"+(i+1)).val());
                //var tojw=$.trim($("#coordinate"+(i+2)).val());
                var fromjw = $.trim($(this).val());
                if (fromjw != '') {
                    var tojw = $.trim($(this).next(".coordinate").val());
                    //window.distanceindex = i+1;
                    var one = $(this).attr('id').substr(10, 3);
                    var two = $(this).attr('id').substr(13, 3);
                    one = parseInt(one.replace(/[^0-9]/ig, "")); //1
                    two = parseInt(two.replace(/[^0-9]/ig, "")); //1
                    //alert($(this).next(".coordinate").attr('id'));
                    pos = i + 1;
                    //alert(window.distanceindex);
                    //alert($(this).val()+'  '+$(this).next().val());
                    //alert($.trim($("#coordinate"+(i+1)).val()));
                    //return false;
                    if (tojw != '') {
                        $.distance(fromjw, tojw, one, two);
                    } else {
                        //终点到起点
                        //fromjw = $.trim($("#coordinate"+(i+1)).val());
                        //tojw = $.trim($("#coordinate1").val());
                        //$.distance( fromjw, tojw, pos );
                    }
                }
            });

            /*$(".distance").each(function(i) {
            var distance = $(this).attr('id');
            //alert(index);
            var txt = $("#distance"+i).val();
            $(this).html(txt);
            //$(distance).html(txt);
        });*/
        });</script>
    <script type="text/javascript">$(function() {
            if ("False" == "True") {
                var index = layer.load();
                layer.msg("");
                layer.close(index);
            }
        });

        $.ajaxSetup({
            beforeSend: function(xhr) {
                xhr.setRequestHeader("token", 0.461810935038054);
            }
        });</script>
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