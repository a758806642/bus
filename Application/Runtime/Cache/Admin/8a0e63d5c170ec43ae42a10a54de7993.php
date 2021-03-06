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


<script src="/Application/Home/js/layer/layer.js"></script>
<!--<script src="/Application/Home/js/order.js"></script>-->
<!--<script src="/Application/Home/js/jquery-ui.min.js"></script>-->
<!--<script src="/Application/Home/js/dateinput-ch-zn.js"></script>-->
<!--<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon" />-->
<link href="/Application/Home/css/css.css" rel="stylesheet" />
<link href="/Application/Home/css/order.css" rel="stylesheet" />
<link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
<!--<script src="/Application/Home/js/modernizr-2.6.2.js"></script>-->
<!--<script src="/Application/Home/js/jquery-1.8.2.js"></script>-->
<!--<script src="/Application/Home/js/jquery-ui-1.8.24.js"></script>-->
<!--<script src="/Application/Home/js/config.js"></script>-->

<style>
    #travel-start {
        background: #EEEEED;
        width: 90px;
        margin-top: -15px;
        border: none;
        /*padding: 1px 10px;*/
        height: 22px;
    }
</style>

    <div class="main-wrap">

        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="<?php echo U('index/admin_index');?>">首页</a><span class="crumb-step">&gt;</span><span>城市地址价格</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="#" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>

                        <tr>
                            <th>城市地点：</th>
                            <td>
                                <dd class="select-city">
                                    <div class="drop-down-icon">
                                        <input type="hidden" name="travel-cityid" id="travel-cityid" />
                                        <input type="text" class="txt city tr_city" value="" id="travel-start" name="travel[1][travel_start]" readonly="readonly" >
                                        <div class="citylist" style="display: none;"></div>
                                    </div>
                                </dd>
                            </td>
                        </tr>
                        <tr>
                            <th>车型选择：</th>
                            <td>
                                <select name="car_id" class="car_id" style="width: 130px;">
                                    <option value="">请选择</option>
                                    <?php if(is_array($car)): foreach($car as $key=>$list): ?><option value="<?php echo ($list["id"]); ?>"><?php echo ($list["car_name"]); ?></option><?php endforeach; endif; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th>城市定价：</th>
                            <td>
                                ￥ <input class="common-text required city_price" id="city_price" name="city_price" size="10" value="" type="text" placeholder="城市定价">&nbsp;&nbsp;&nbsp;<i class="require-red">*</i>
                            </td>
                        </tr>

                        <tr>
                            <th></th>
                            <td>
                                <input class="btn btn-primary btn6 " value="提交" type="button">
                                <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </div>

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
                            ul1 += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }

                        if (data[i].Letter == "A") {
                            a += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "B") {
                            b += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "C") {
                            c += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "D") {
                            d += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "E") {
                            e += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "F") {
                            f += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "G") {
                            g += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "H") {
                            h += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "J") {
                            j += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "K") {
                            k += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "L") {
                            l += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "M") {
                            m += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "N") {
                            n += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "P") {
                            p += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "Q") {
                            q += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "R") {
                            r += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "S") {
                            s += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "T") {
                            t += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "W") {
                            w += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "X") {
                            x += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "Y") {
                            y += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
                        }
                        else if (data[i].Letter == "Z") {
                            z += '<li><a href="#"  cid="' + data[i].CityID + '">' + data[i].CityName + '</a></li>';
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
                    var car_id = $('.car_id').val();
                    // console.log(car_id);return false;
                    $(this).parents('.citylist').prev().val(city);
                    $(this).parents('.citylist').prev().prev().val(cityID);
                    $('.citylist').hide();
                    $(this).parents('.select-city').next().find('.input').val('');

                    $.ajax({
                        type: 'post',
                        dataType: 'json',
                        url: '/Admin/City/city_price_list',
                        data: { city: city, car_id: car_id},
                        success: function (res) {
                            if(res) {
                                $('.city_price').val('');
                                $('.city_price').val(res.city_price);
                                return;
                            } else {
                                $('.city_price').val('');
                                return;
                            }
                        },
                        error: function () {
                            layer.msg('异常');
                            return;
                        }
                    });

                    return false;
                });
        });

$('.car_id').bind('change',function(){
    var car_id = $('.car_id').val();
    var city = $('#travel-start').val();

    $.ajax({
        type: 'post',
        dataType: 'json',
        url: '/Admin/City/city_price_list',
        data: { city: city, car_id: car_id},
        success: function (res) {
            if(res) {
                $('.city_price').val('');
                $('.city_price').val(res.city_price);
                return;
            } else {
                $('.city_price').val('');
                return;
            }
        },
        error: function () {
            layer.msg('异常');
            return;
        }
    });

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

    });



    $('.btn-primary').click(function(){
        var city = $('#travel-start').val();
        var city_price = $('#city_price').val();
        var car_id = $('.car_id').val();

        if(city == '' || city_price == '' || car_id == '') {
            layer.msg('信息不能为空');
            return false;
        }

        $.ajax({
            type: 'post',
            dataType: 'json',
            url: '/Admin/City/city_price_info',
            data: { city: city, city_price: city_price, car_id: car_id},
            success: function(res){
                if(res>0) {
                    layer.msg('操作成功');
                } else {
                    layer.msg('操作失败');
                }
                return;
            },
            error: function(res){
                layer.msg('异常');
                return;
            }
        })

    });

</script>