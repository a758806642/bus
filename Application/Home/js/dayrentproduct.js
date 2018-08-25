document.write("<script src='/Application/Home/js/jquery.base64.js'></script>");
///同时刷新产品、车型、供应商
function InitData() {
    if ($("#cityID").val() == '' || $("#cityName").val() == '') {
        layer.msg("请选择出发城市.");
        return false;
    }

    var date = $("#datepicker4").val(); //用户选择的日期
    if (date == '') {
        layer.msg("请选择用车时间.");
        return false;
    }

    if (ValidateTime()) {
        LoadProduct();
        GetDayRentCarType();
        // GetDayRentCarTeam();
    } else {
        // console.log(123);return false;

        var limiDate = new Date().addHours(window.DayRentLimitHour);
        $(".plist").html('<div class="search-noresult">查询无结果，建议预订' + limiDate.Format("MM") + '月' + limiDate.Format("dd") + '日' + limiDate.Format("hh:mm") + '以后，包车天数为半天到五天的产品</div>');

        layer.msg("预定时间不能小于" + window.DayRentLimitHour + "小时.");
        return false;
    }
}
///只加载产品，不加载车型和供应商
function LoadProduct() {
    //cityID, date, tenancy, carTypes, vendors
    // layer.msg(123);
    var car_id = '';
    var vendors = '';
    $("input[name=\"car_id\"]:checked").each(function () {
        // car_id += "," + $(this).val();
        car_id += $(this).val()+',';
    });

    $("input[name=\"vendor\"]:checked").each(function () {
        vendors += "," + $(this).val();
    });
    var cityID = $("#cityID").val();
    var cityName = $("#cityName").val();
    // console.log(cityName);return false;
    var date = $("#datepicker4").val();
    var tenancy = $("#days").val();
    var list = $(".plist");
    var car_type = 1;

    list.html('<div style="padding: 10px;text-align: center;"><img src="/Application/Home/img/onload.gif" />               加载中...</div>');
    $.ajax({
        type: 'POST',
        url: '/Home/Order/car_list',
        data: {
            car_type: car_type,
            car_id: car_id,
            date: date,
            tenancy: tenancy,
            cityName: cityName,
        },
        async: false,
        dataType: 'json',
        success: function (data) {
            // console.log(data);return false;
            var json = eval(data);
            var html = '';
            var ids = [];
            if (json.length > 0) {
                html = '<ul>';
                for (var i = 0; i < json.length; i++) {
                    var obj = json[i];
                    // console.log(obj);
                    if (ids.indexOf(obj.id) == -1) {

                        ids.push(obj.id);

                        html += '<li class="title"><dl><dt class="carType"><img src="/Application/Admin/Uploads/' + obj.car_pic + '" style="width: 100px" /></dt><dt class="info"><big>' + obj.car_name + '<span><i class="passenger xl"></i><dfn>' + obj.people_num + '</dfn></span><span><i class="baggage xl"></i><dfn>' + obj.bags_num + '</dfn></span></big>' + obj.equivalent + '&nbsp;等同级车</dt><dt class="price"><dfn>'; if(obj.city_price == '') {html +='暂未定价</dfn></dt></dl></li>';}else{ html +='¥<big>' + obj.city_price + '</big></dfn>起</dt></dl></li>';}
                        // html += '<li class="vo"><dl><dd  class="img"><img src="' + GetCarTeamLogo(obj.CarTeamLogoUrl) + '" style="width:100px" /><br/><h3>' + obj.SupplierName + '</h3></dd><dd class="info"><em>市内/跨域包车</em>' + GetTags(obj.Tags) + '</dd><dd class="score"><big>4.5</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + obj.ProductAmount + '</big></dfn><br /><em class="price-desc">' + GetDisplayDistanceAndTimeLength(obj.Tenancy, obj.DistanceLength, obj.TimeLength) + '</em><div class="poTip tip_icon xl points-ltlb" title="' + GetDisplayDistanceAndTimeLength(obj.Tenancy, obj.DistanceLength, obj.TimeLength) + '，超公里' + obj.DistancePrice + '元/公里，超时长' + obj.TimePrice + '元/' + obj.TimePriceUnit + '"></div></span></dd><dd class="dyd"><a href="javascript:void(0);" onclick="Reserve(' + obj.ID + ')" class="yd">点击预定</a></dd></dl></li>';
                        if(obj.city_price == '') {
                            html += '<li class="vo"><dl><dd  class="img"><img src="/Application/Home/img/logo.png" style="width:100px" /><br/><h3>运来出行</h3></dd><dd class="info"><em>市内/跨域包车</em>' + GetTags(obj.Tags) + '</dd><dd class="score"><big>'+ obj.score +'</big>/5分</dd><dd class="price"><span><dfn>暂未定价</dfn><br /><em class="price-desc">含100公里8小时</em><div class="poTip tip_icon xl points-ltlb" title="含100公里8小时，超公里5元/公里，超时长100元/小时"></div></span></dd><dd class="dyd"></dd></dl></li>';
                        } else {
                            html += '<li class="vo"><dl><dd  class="img"><img src="/Application/Home/img/logo.png" style="width:100px" /><br/><h3>运来出行</h3></dd><dd class="info"><em>市内/跨域包车</em>' + GetTags(obj.Tags) + '</dd><dd class="score"><big>'+ obj.score +'</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + obj.city_price + '</big></dfn><br /><em class="price-desc">含100公里8小时</em><div class="poTip tip_icon xl points-ltlb" title="含100公里8小时，超公里5元/公里，超时长100元/小时"></div></span></dd><dd class="dyd"><a href="javascript:void(0);" onclick="Reserve(' + obj.id + ',' + obj.city_price + ')" class="yd">点击预定</a></dd></dl></li>';
                        }
                    } else {
                        // html += '<li class="vo"><dl><dd class="img"><img src="' + GetCarTeamLogo(obj.CarTeamLogoUrl) + '" style="width:100px" /><br/><h3>' + obj.SupplierName + '</h3></dd><dd class="info"><em>市内/跨域包车</em>' + GetTags(obj.Tags) + '</dd><dd class="score"><big>4.5</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + obj.ProductAmount + '</big></dfn><br /><em class="price-desc">' + GetDisplayDistanceAndTimeLength(obj.Tenancy, obj.DistanceLength, obj.TimeLength) + '</em><div class="poTip tip_icon xl points-ltlb" title="' + GetDisplayDistanceAndTimeLength(obj.Tenancy, obj.DistanceLength, obj.TimeLength) + '，超公里' + obj.DistancePrice + '元/公里，超时长' + obj.TimePrice + '元/' + obj.TimePriceUnit + '"></div></span></dd><dd class="dyd"><a href="javascript:void(0);" onclick="Reserve(' + obj.ID + ')" class="yd">点击预定</a></dd></dl></li>';
                        html += '<li class="vo"><dl><dd  class="img"><img src="/Application/Home/img/logo.png" style="width:100px" /><br/><h3>运来出行</h3></dd><dd class="info"><em>市内/跨域包车</em>' + GetTags(obj.Tags) + '</dd><dd class="score"><big>'+ obj.score +'</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + obj.city_price + '</big></dfn><br /><em class="price-desc">含100公里8小时</em><div class="poTip tip_icon xl points-ltlb" title="含100公里8小时，超公里5元/公里，超时长100元/小时"></div></span></dd><dd class="dyd"><a href="javascript:void(0);" onclick="Reserve(' + obj.id + ',' + obj.city_price + ')" class="yd">点击预定</a></dd></dl></li>';

                    }
                }
                html += '</ul>';
            } else { 
                var limiDate = new Date().addHours(window.DayRentLimitHour);
                // console.log(limiDate);
                html += '<div class="search-noresult">查询无结果，建议预订' + limiDate.Format("MM") + '月' + limiDate.Format("dd") + '日' + limiDate.Format("hh:mm") + '以后，包车天数为半天到五天的产品</div>';
            }
            list.html(html);
            $(".poTip").poshytip({ allowTipHover: true });
        },
        error: function () {
            layer.msg("出错了！");
        }
    });
}
function GetCarTeamLogo(carTeamLogoUrl) {
    if (carTeamLogoUrl == null || carTeamLogoUrl == '') {
        return "/Images/logo.png";
    }
    return carTeamLogoUrl;
}
function GetDisplayDistanceAndTimeLength(tenancy, distanceLength, timeLength) {
    if (tenancy == 999 || tenancy == 1) {
        return '含' + distanceLength + '公里' + timeLength + '小时';
    } else {
        return '含(' + distanceLength + '公里' + timeLength + '小时/天)X' + tenancy + '天';
    }
}
function GetTags(tags) {
    var html = '';
    if (tags != null) {
        var isBrand = false;
        var brandTitle = "提供车辆品牌包括：";
        for (var i = 0; i < tags.length; i++) {
            html += '<em class="poTip" title="' + tags[i].TagDescription + '">' + tags[i].TagName + '</em>';
        }
        if (brandTitle.length > 9)
            html = '<em class="poTip" title="' + brandTitle.substr(0, brandTitle.length - 1) + '">' + brandTitle.substring(9, brandTitle.length - 1) + '</em>' + html;

    }
    return html;
}
function Reserve(id,city_price) {
    var date = $("#datepicker4").val(); //用户选择的日期
    var hour = $('#hours').val();
    var minute = $('#minutes').val();
    var cityName = $('#cityName').val();
    var days = $('#days').val();
    var price = $.base64.encode(city_price);


    if (ValidateTime()) {
        if (checkLogin()) {
            window.location.href = "/Home/Order/rent_order_send?id=" + id + "&cityName= " + cityName + "&days=" + days + "&date=" + date + "&hour=" + hour + "&minute=" + minute + "&p=" + price;
        }
    } else {

        var limiDate = new Date().addHours(window.DayRentLimitHour);
        $(".plist").html('<div class="search-noresult">查询无结果，建议预订' + limiDate.Format("MM") + '月' + limiDate.Format("dd") + '日' + limiDate.Format("hh:mm") + '以后，包车天数为半天到五天的产品</div>');

        layer.msg("预定时间不能小于" + window.DayRentLimitHour + "小时.");
        return false;
    }
}

function ValidateTime() {
    var date = $("#datepicker4").val(); //用户选择的日期
    var hour = $('#hours').val();
    var minute = $('#minutes').val();
//   console.log(date);return false;
    //当前时间+预定小时数   <  预定日期
    var dd = new Date(date + " " + hour + ":" + minute + ":00");
    // alert(dd);
    var d = new Date(dd.Format("yyyy"), dd.Format("MM"), dd.Format("dd"), hour, minute, 0);
    //alert(new Date().addHours(window.DayRentLimitHour));
    // alert(d);
    if (CompareDate(new Date().addHours(window.DayRentLimitHour), dd)) {
        return true;
    }
    return false;
}

$(function () {
    $('.dayRentHelp').on('click', function () {
        layer.open({
            type: 2,
            title: '用车须知',
            skin: 'layui-layer-rim', //加上边框
            shift: '2',
            area: ['800px', '560px'],
            content: '/Home/Common/attention'
        });
    });

    GetDayRentCarType();

    //GetDayRentCarTeam();

});
function GetDayRentCarType() {
    var cityId = $("#cityID").val();
    var cityName = $("#cityName").val();
    var date = $("#datepicker4").val();
    var tenancy = $("#days").val();
    var car_type = 1;
    $.ajax({
        type: 'POST',
        url: '/Home/Order/car_type_list',
        dataType: "json",
        async: false,
        cache: true,
        data: {car_type: car_type, date: date, tenancy: tenancy},
        success: function(data) {
            // console.log(data);
            if (data != '' && data != undefined) {
                data = eval(data);
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<label><input class="car_id" type="checkbox" name="car_id" value="' + data[i].id + '" />' + data[i].car_name + '</label>';
                }
                $(".vehicle-list").find(".filter_list").html(html);
                $("[name=car_id]:checkbox").each(function () {
                    $(this).attr("onclick", "InitClass(this,1)");
                });
                $(".vehicle-list").find(".all").each(function () {
                   $(this).attr("onclick",function() {
                       $("[name=car_id]:checkbox").each(function () { $(this).parent().removeClass("current"); });
                   });
                });
            }
            // layer.msg("111111！");
        },
        error: function() {
            layer.msg("异常");
        }
        
    });
}

function GetDayRentCarTeam() {
    var cityId = $("#cityID").val();
    var date = $("#datepicker4").val();
    var tenancy = $("#days").val();
    if (cityId != '' && cityId != undefined && date != '' && date != undefined && tenancy != '' && tenancy != undefined) {
        $.ajax({
            type: 'POST',
            url: '/Common/GetDayRentCarTeam',
            data: {
                cityId: cityId,
                date: date,
                tenancy: tenancy
            },
            async: false,
            cache: true,
            success: function (data) {
                if (data != '' && data != undefined) {
                    data = eval(data);
                    var html = '';
                    // for (var i = 0; i < data.length; i++) {
                    //     html += '<label><input type="checkbox" name="vendor" value="' + data[i].ID + '" />' + data[i].SupplierName + '</label>';
                    // }
                    var obj = $(".vendor-list").find(".filter_list");
                    obj.html(html);
                    $("[name=vendor]:checkbox").each(function () {
                        $(this).attr("onclick", "InitClass(this,2)");
                    });
                }
            },
            error: function () {
                //layer.msg("异常！");
            }
        });
    }
}
function InitClass(lbl, type) {
    var obj = $(lbl).parent();
    //if (obj.hasClass("current")) {
    //    obj.removeClass("current");
    //} else {
    //    obj.addClass("current");
    //}
    obj.toggleClass("current");
    if (type == 1) {
        if ($("input[name=\"car_id\"]:checked").length > 0)
            $(".vehicle-list").find(".all").removeClass("current");
        else
            $(".vehicle-list").find(".all").toggleClass("current");

    }
    else if (type == 2) {
        if ($("input[name=\"vendor\"]:checked").length > 0)
            $(".vendor-list").find(".all").removeClass("current");
        else
            $(".vendor-list").find(".all").toggleClass("current");
    }
    //$("#searchProduct").click();
    LoadProduct();
}

function AllClick(obj, type) {
    $(obj).addClass("current");
    if (type == 1) {
        $("[name=car_id]:checkbox").each(function () {
            $(this).parent().removeClass("current");
            $(this).removeAttr("checked");
        });
    }
    else if (type == 2) {
        $("[name=vendor]:checkbox").each(function () {
            $(this).parent().removeClass("current");
            $(this).removeAttr("checked");
        });
    }
    //$("#searchProduct").click();
    LoadProduct();
}

// JavaScript Document

var citylist = '';
$.ajax({
    type: 'POST',
    url: '/Home/Index/city',
    async: false,
    cache: true,
    dataType: 'json',
    success: function (data) {
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
    error: function() {
        //layer.msg("异常！");
    }
});



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


$(function () {
    //左边点击事件
    $("#side ul li").click(function () {
        $(this).siblings().children().removeClass('cur');
        $(this).children().addClass('cur');
        var index = $("#side ul li").index(this);
        $("#divmaincontent > div").hide().eq(index).show();
    });
    $(document).click(function () {
        $(".result").hide();
        $(".citylist").hide();
    });
    $(".add").live('click', function () {
        var total = parseInt($(this).parent().parent().parent().parent().parent().find("#total").val()) + 1;
        var length = $(this).parent().parent().parent().parent().find('dl').length;
        if (length > 5) {
            layer.msg('最多只能添加五个途经点');
            return false;
        }
        var html = '<dl class="via" style="height:50px;">' +
	        '<dt>途经地点</dt>' +
	        '<dd class="select-city">' +
	        '<div class="drop-down-icon">' +
	        '<input type="hidden" name="path{0}id" class="id" value="' + window.CityID + '" />' +
	        ' <input type="text"  onfocus="this.blur();" readonly="readonly"  name="path{0}" class="txt city" id="travel-start" value="' + window.CityName + '" />' +
	        '<div class="citylist"></div>' +
	        '</div>' +
	        '</dd>' +
	        '<dd>' +
	        '<div class="part">' +
	        '<input type="text" name="pathname{0}" class="txt place input" placeholder="请输入附近的小区/街道/建筑物/商圈" autocomplete="off"/><input type="button" class="del" value="移除" />' +
	        '<input type="hidden" class="hasquery" value="0" />' +
	        '<input type="hidden" name="pathjw{0}" class="jw" id="fromjw" value=""/>' +
	        '<input name="pathaddr{0}" class="addr" type="hidden" id="pathaddr" size="57" />' +
	        '<div style="display:none" id="result1" class="result"> Loading... </div>' +
	        '</div>' +
	        '</dd>' +
	        '</dl>';
        html = html.replace(/\{0\}/g, total);

        $(this).parent().parent().parent().parent().append(html);

        $(this).parent().parent().parent().parent().parent().find("#total").val(total);

        $(".del").live('click', function () {
            var totalObj = $(this).parent().parent().parent().parent().parent().find("#total");

            totalObj.val(parseInt(totalObj.val()) - 1);

            $(this).parents("dl").remove();

            e.stopPropagation();
        });


        $('.via .drop-down-icon').unbind('click').bind('click', function (e) {
            e.stopPropagation();
            $(this).children('.citylist').html(citylist).toggle();

            $('.citylist .menu li').bind('click', function () {
                $(this).addClass('hover').siblings().removeClass('hover');
                $('.citylist .main ul').eq($('.menu li').index(this)).show().siblings().hide();
                return false;
            });
            $('.citylist .main a').bind('click', function () {
                var city = $(this).html();
                var cityID = $(this).attr("cid");
                $(this).parents('.citylist').prev().val(city);
                $(this).parents('.citylist').prev().prev().val(cityID);
                $('.citylist').hide();
                $(this).parents('.select-city').next().find('.input').val('');
                LoadProduct();
                return false;
            });
        });

        //自动弹出地名
        $(".input").live('click', function (e) {
            var v = $.trim($(this).val());
            var hasquery = $(this).parent().find(".hasquery").val();
            if (hasquery == 1 && v != '') {
                $(".result").hide();
                $(this).parent().find(".result").show();
            }
            e.stopPropagation();
        });

        $(".input").live('keyup', function (e) {
            $(this).parent().find(".jw").val(' ');
            $(this).parent().find(".addr").val(' ');
            var s = $.trim($(this).val());
            var f = $(this).parent().parent(); //当前input所在的div
            var c = $.trim(f.prev().find(".city").val()); //所在城市
            if (s == '') {
                f.find('.result').html("").hide();
                return false;
            }
            $.ajax({
                url: 'http://api.map.baidu.com/place/v2/search',
                cache: false,
                dataType: 'jsonp',//这个很重要，跨域问题
                type: 'get',
                async: false,
                data: {
                    page_size: 6,
                    page_num: 0,
                    scope: 2,
                    query: s,
                    region: c,
                    output: "json",
                    ak: window.ak
                },
                success: function (data) {
                    if (data) {
                        //$("#odata").html(JSON.stringify(data));
                        f.find(".hasquery").val(1); //设置为已查询
                        var json = data.results; //结果
                        total = data.total; //返回的数量
                        var txt = '<ul>';
                        var xtotal = 0;
                        if (total > 0) {
                            for (var i = 0; i < json.length; i++) {
                                //alert(typeof(json[i].address));
                                if (typeof (json[i].location) == 'undefined' || json[i].location == undefined || typeof (json[i].address) == 'undefined' || json[i].address == undefined) {
                                } else {
                                    txt += '<li><a href="javascript:;" lat="' + json[i].location.lat + '" lng="' + json[i].location.lng + '"><span class="name">' + json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                    xtotal++;
                                }
                            }
                            if (data.total > 6) {
                                txt += '<div class="page"><a href="javascript:;" class="next" page=1>下一页</a></div>';
                            }
                            //绑定事件，这里不起作用

                            $(".result ul li a").live('click', function () {
                                var lat = $(this).attr("lat");
                                var lng = $(this).attr("lng");
                                var name = $(this).find("span").html(); //地名
                                var addr = $(this).find("p").html(); //地址
                                $(this).parents(".part").find(".input").val(name);
                                $(this).parents(".part").find(".addr").val(addr);
                                $(this).parents(".part").find(".jw").val(lat + "," + lng);
                                try {
                                    //InitDistance();
                                }
                                catch (e) { }
                            });

                            if (xtotal == 0) {
                                txt += '<li class="no">没有匹配的地址，请重新输入</li>';
                            }
                        } else {
                            txt += '<li class="no">没有匹配的地址，请重新输入</li>';
                        }


                        $('.page a').live('click', function () {
                            var page = $(this).attr('page');
                            s = $(this).parent().parent().parent().parent().find('.input').val();
                            var g = $(this).parent().parent().parent();
                            c = g.parent().parent().prev().find('.city').val();
                            $.ajax({
                                url: 'http://api.map.baidu.com/place/v2/search',
                                cache: false,
                                dataType: 'jsonp',//这个很重要，跨域问题
                                type: 'get',
                                async: false,
                                data: {
                                    page_size: 6,
                                    page_num: page,
                                    scope: 2,
                                    query: s,
                                    region: c,
                                    output: "json",
                                    ak: window.ak
                                },
                                success: function (data) {
                                    if (data) {
                                        f.find(".hasquery").val(1); //设置为已查询
                                        var json = data.results; //结果
                                        total = data.total; //返回的数量
                                        var text = '';
                                        text = '<ul>';
                                        var xtotal = 0;
                                        if (total > 0) {
                                            for (var i = 0; i < json.length; i++) {
                                                //alert(typeof(json[i].address));
                                                if (typeof (json[i].location) == 'undefined' || json[i].location == undefined || typeof (json[i].address) == 'undefined' || json[i].address == undefined) {
                                                } else {
                                                    text += '<li><a href="javascript:;" lat="' + json[i].location.lat + '" lng="' + json[i].location.lng + '"><span class="name">' + json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                                    xtotal++;
                                                }
                                            }
                                            if (data.total > 6) {
                                                text += '<div class="page"><a href="javascript:;" class="next" page=1>下一页</a></div>';
                                            }
                                            if (xtotal == 0) {
                                                text += '<li class="no">没有匹配的地址，请重新输入</li>';
                                            }
                                        } else {
                                            text += '<li class="no">没有匹配的地址，请重新输入</li>';
                                        }
                                        var prev = parseInt(page) - 1 > 0 ? parseInt(page) - 1 : 0;
                                        if (page > 0) {
                                            text += '<div class="page"><a href="javascript:;" class="prev" page="' + prev + '">上一页</a></div>';
                                        }
                                        text += '</ul>';
                                        g.html(text).show();
                                        f.find(".hasquery").val(1);

                                    }
                                    page = parseInt(page) + 1;
                                    $('.next').attr('page', page);
                                }
                            });

                        });


                        txt += '</ul>';
                        f.find('.result').html(txt).show();
                        f.find(".hasquery").val(1); //设置是不是查询，如果查过，则直接显示
                    }
                }
            });
        });
    });

    //点击输入地点
    $(".input").live('click', function (e) {
        $(".citylist").hide();
        var v = $.trim($(this).val());
        var hasquery = $(this).parent().find(".hasquery").val();
        if (hasquery == 1 && v != '') {
            $(".result").hide();
            $(this).parent().find(".result").show();
        }
        e.stopPropagation();
    });

    //自动提示地点
    $(".input").live('keyup', function (e) {
        $(this).parent().find(".jw").val(' ');
        $(this).parent().find(".addr").val(' ');
        var s = $.trim($(this).val());
        var f = $(this).parent().parent(); //当前input所在的div
        var c = $.trim(f.prev().find(".city").val()); //所在城市
        if (s == '') {
            f.find('.result').html("").hide();
            return false;
        }
        $.ajax({
            url: 'http://api.map.baidu.com/place/v2/search',
            cache: false,
            dataType: 'jsonp',//这个很重要，跨域问题
            type: 'get',
            async: false,
            data: {
                page_size: 6,
                scope: 2,
                query: s,
                region: c,
                output: "json",
                ak: window.ak
            },
            success: function (data) {
                if (data) {
                    f.find(".hasquery").val(1); //设置为已查询
                    var json = data.results; //结果
                    total = data.total; //返回的数量
                    var txt = '<ul>';
                    var xtotal = 0;
                    if (total > 0) {
                        for (var i = 0; i < json.length; i++) {
                            if (json[i].location == undefined || json[i].address == undefined) {
                            }//过滤不合格的数据
                            else {
                                txt += '<li><a href="javascript:;" lat="' + json[i].location.lat + '" lng="' + json[i].location.lng + '"><span class="name">' +
                                    json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                xtotal++;
                            }
                        }

                        if (data.total > 6) {
                            txt += '<div class="page"><a href="javascript:;" class="next" page=1>下一页</a></div>';
                        }

                        $(".result ul li a").live('click', function () {
                            var lat = $(this).attr("lat");
                            var lng = $(this).attr("lng");
                            var name = $(this).find("span").html(); //地名
                            var addr = $(this).find("p").html(); //地址
                            $(this).parents(".part").find(".input").val(name);
                            $(this).parents(".part").find(".addr").val(addr);
                            $(this).parents(".part").find(".jw").val(lat + "," + lng);
                            try {
                                //InitDistance();
                            }
                            catch (e) { }
                        });

                        if (xtotal == 0) {
                            txt += '<li class="no">没有匹配的地址，请重新输入</li>';
                        }
                    } else {
                        txt += '<li class="no">没有匹配的地址，请重新输入</li>';
                    }

                    $('.page a').live('click', function () {
                        var page = $(this).attr('page');
                        s = $(this).parent().parent().parent().parent().find('.input').val();
                        var g = $(this).parent().parent().parent();
                        c = g.parent().parent().prev().find('.city').val();
                        $.ajax({
                            url: 'http://api.map.baidu.com/place/v2/search',
                            cache: false,
                            dataType: 'jsonp',//这个很重要，跨域问题
                            type: 'get',
                            async: false,
                            data: {
                                page_size: 6,
                                page_num: page,
                                scope: 2,
                                query: s,
                                region: c,
                                output: "json",
                                ak: window.ak
                            },
                            success: function (data) {
                                if (data) {
                                    f.find(".hasquery").val(1); //设置为已查询
                                    var json = data.results; //结果
                                    total = data.total; //返回的数量
                                    var text = '';
                                    text = '<ul>';
                                    var xtotal = 0;
                                    if (total > 0) {
                                        for (var i = 0; i < json.length; i++) {
                                            //alert(typeof(json[i].address));
                                            if (typeof (json[i].location) == 'undefined' || json[i].location == undefined || typeof (json[i].address) == 'undefined' || json[i].address == undefined) {
                                            } else {
                                                text += '<li><a href="javascript:;" lat="' + json[i].location.lat + '" lng="' + json[i].location.lng + '"><span class="name">' + json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                                xtotal++;
                                            }
                                        }
                                        if (data.total > 6) {
                                            text += '<div class="page"><a href="javascript:;" class="next" page="' + page + '">下一页</a></div>';
                                        }
                                        if (xtotal == 0) {
                                            text += '<li class="no">没有匹配的地址，请重新输入</li>';
                                        }
                                    } else {
                                        text += '<li class="no">没有匹配的地址，请重新输入</li>';
                                    }
                                    var prev = parseInt(page) - 1;
                                    if (page > 0) {
                                        text += '<div class="page"><a href="javascript:;" class="prev" page="' + prev + '">上一页</a></div>';
                                    }
                                    text += '</ul>';
                                    g.html(text).show();
                                    f.find(".hasquery").val(1);

                                }
                                page = parseInt(page) + 1;
                                $('.next').attr('page', page);
                            }
                        });

                    });

                    txt += '</ul>';
                    f.find('.result').html(txt).show();
                    f.find(".hasquery").val(1); //设置是不是查询，如果查过，则直接显示
                }
            }
        });
    });

    $.keyup = function () {

    };

    $.DayRentValidate = function () {
        var len = $('div[day]').length;
        for (var i = 1; i < (parseInt(len) + 1) ; i++) {
            var via = $('div[day="' + i + '"]').next().find('.path .via');
            var vialen = $(via).length;
            if (vialen > 0) {
                for (var l = 1; l < (parseInt(vialen) + 1) ; l++) {
                    var idname = $(via).eq(l - 1).find('dd.select-city div input.id').attr('name');
                    var name = $(via).eq(l - 1).find('dd.select-city div input.city').attr('name');
                    var paname = $(via).eq(l - 1).find('dd div.part input').eq(0).attr('name'); //获取pathname
                    var jwname = $(via).eq(l - 1).find('dd div.part input').eq(3).attr('name'); //获取pathjw
                    var adname = $(via).eq(l - 1).find('dd div.part input').eq(4).attr('name'); //获取pathaddr
                    //对名称进行处理
                    if (name.length == 5 && paname.length == 9 && jwname.length == 7 && adname.length == 9) {
                        $(via).eq(l - 1).find('dd.select-city div input.id').attr('name', "travel[" + i + "][" + idname + "]");
                        $(via).eq(l - 1).find('dd.select-city div input.city').attr('name', "travel[" + i + "][" + name + "]");
                        $(via).eq(l - 1).find('dd div.part input').eq(0).attr('name', "travel[" + i + "][" + paname + "]");
                        $(via).eq(l - 1).find('dd div.part input').eq(3).attr('name', "travel[" + i + "][" + jwname + "]");
                        $(via).eq(l - 1).find('dd div.part input').eq(4).attr('name', "travel[" + i + "][" + adname + "]");
                    }

                    //alert($(via).eq(l - 1).find('dd.select-city div input.id').attr("name"));
                }
            }
        }
        //循环天数 验证
        for (i = 1; i < (parseInt(len) + 1) ; i++) {
            var div = $("div[day=" + i + "]").next();

            var fromjw = $(div).find("#fromjw").val();
            var fromaddr = $(div).find("#fromaddr").val();
            if (fromjw == '' || fromaddr == '') {
                layer.msg('请重新输入并选择上车地址');
                $("#travel-address").focus();
                return false;
            }
            var tojw = $(div).find("#tojw").val();
            var toaddr = $(div).find("#toaddr").val();
            if (tojw == '' || toaddr == '') {
                layer.msg("请重新输入并选择下车地址");
                $("#end-address").focus();
                return false;
            }

            var midway = $('div[day="' + i + '"]').next().find('.path .via');
            var midlen = $(via).length;
            //var starthour = $(div).find('dl select.hours').val();
            //var startminute = $(div).find('dl select.minutes').val();
            //var h = starthour.match(/^(\d{2})$/);
            //var m = startminute.match(/^(\d{2})$/);
            //if (h == null) {
            //    layer.msg('请选择正确的用车小时,如:02', { time: 1500 }, function () {
            //        $("div[day=" + i + "]").next().find('#travel-hour').focus();
            //    });
            //    return false;
            //    break;
            //} else if (m == null) {
            //    layer.msg('请选择正确的用车分钟,如:03', { time: 1500 }, function () {
            //        $("div[day=" + i + "]").next().find('#travel-minute').focus();
            //    });
            //    return false;
            //    break;
            //}

            //出发城市验证
            var startcity = $(div).find('.drop-down-icon #travel-start').val();
            if (startcity == '') {
                layer.msg("请选择您的上车地点城市", { time: 1500 }, function () {
                    $(div).find('.drop-down-icon #travel-start').focus();

                });
                return false;
                break;
            }
            ;

            //出发地址验证
            var startaddress = $(div).find(".part #travel-address").val();
            if (startaddress == '') {
                layer.msg("请输入并选择您的上车地址", { time: 1500 }, function () {
                    $(div).find(".part #travel-address").focus();
                });
                return false;
                break;
            }

            //目的城市验证
            var endcity = $(div).find('.drop-down-icon #travel-end').val();
            if (endcity == '') {
                layer.msg('请选择您的下车城市', { time: 1500 }, function () {
                    $(div).find('.drop-down-icon #travel-end').focus();
                });
                return false;
                break;
            }

            //目的地址验证
            var endaddress = $(div).find(".part #end-address").val();
            if (endaddress == '') {
                layer.msg("请输入并选择您的下车地址", { time: 1500 }, function () {
                    $(div).find(".part #end-address").focus();
                });
                return false;
                break;
            }

            var city = {};
            var place = {};
            var vi = true;
            if (!vi) {
                pass = false;
                return false;
            }
            var start = $(div).find("#result3 ul .no").html(); //当百度没有匹配输入的起点地址时的内容
            var travelstart = $(div).find("#travel-address").val(); //出发地点输入地址
            var travelend = $(div).find("#end-address").val(); //目的地点输入地址
            var startlength = $(div).find("#result3 ul li").length; //起点匹配地址时li的长度
            var endlength = $(div).find("#result2 ul li").length;
            var endi = endlength;
            var starti = startlength;

            //循环输出百度接口匹配用户输入数据，并与用户输入数据作比对
            for (var b = 0; b < (parseInt(startlength) + 1) ; b++) {
                var startid = $(div).find('#result3 ul li');
                var startobj = $(startid).eq(b).find("a span.name").html();
                //console.log("startobj" + startobj);
                //console.log("travelstart" + travelstart);
                if (startobj != travelstart) {
                    if (starti == 0 && startobj != travelstart) {
                        layer.msg('请重新输入并选择您的上车地址');
                        $(div).find("#travel-address").focus();
                        return false;
                    }
                } else if (startobj == travelstart) {
                    break;
                }
            }

            for (var a = 0; a < (parseInt(endlength) + 1) ; a++) {
                var endid = $(div).find('#result2 ul li');
                var endobj = $(endid).eq(a).find("a span.name").html();
                if (endobj != travelend) {
                    endi--;
                    if (endi == 0 && endobj != travelend) {
                        layer.msg('请重新输入并选择您的下车地址');
                        $(div).find("#end-address").focus();
                        return false;
                    }
                } else if (endobj == travelend) {
                    break;
                }
            }

            var mid = $("#result1 ul .no").html(); //当百度没有匹配输入的途径点地址时的内容
            var end = $("#result2 ul .no").html(); //当百度没有匹配输入的终点地址时的内容
            if (start) {
                layer.msg('请重新输入并选择您的上车地址');
                return false;
            } else if (end) {
                layer.msg('请重新输入并选择您的下车地址');
                return false;
            } else if (mid) {
                layer.msg('请重新输入并选择您的途径点地址');
                return false;
            }

            for (var c = 0; c < midlen; c++) {
                var midcity = $(midway).eq(c).find('.city');
                var midplace = $(midway).eq(c).find('.place');
                var midfromjw = $(midway).eq(c).find("#fromjw").val();
                var midpathaddr = $(midway).eq(c).find("pathaddr").val();
                if (midfromjw == ' ' || midpathaddr == ' ') {
                    layer.msg("请重新输入并选择途径城市地址");
                    $(midway).eq(c).find("#fromjw").parent().find(".input").focus();
                    return false;
                }
                if (midcity.val() == '') {
                    layer.msg("请选择您的途径地点城市", { time: 1500 }, function () {
                        midcity.focus();
                    });
                    return false;
                }

                if (midplace.val() == '') {
                    layer.msg("请输入并选择您的途径地点地址", { time: 1500 }, function () {
                        midplace.focus();
                    });
                    return false;
                }


                var travelmid = $(midway).eq(c).find('.place').val();
                var midlength = $(midway).eq(c).find('#result1 ul li').length;
                var midi = midlength;
                for (var m = 0; m < midlength; m++) {
                    var midid = $(midway).eq(c).find('#result1 ul li');
                    var midobj = $(midid).eq(m).find("a span.name").html();
                    if (midobj != travelmid) {
                        midi--;
                        if (midi == 0 && midobj != travelmid) {
                            layer.msg('请重新输入并选择您的途径地点地址');
                            midplace.focus();
                            return false;
                        }
                    } else {
                        break;
                    }
                }
            }

        }

        return true;
    };
})


