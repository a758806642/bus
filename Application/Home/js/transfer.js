

///同时刷新产品、车型、供应商

function InitData() {
    //只有时间和其他必填信息都选择才能加载 车辆信息

    if (validateOther()) {
        if (ValidateTime()) {
            guessTimeMiles();
            GetTransferCarType();
            //GetTransferCarTeam();
        }
    }
}
//出发地点的必填的验证

function validateOther() {
    var productId = JudgeHAdress();//获取产品类别

    if ($("#cityTransferAddress").val() == '') {
        if (productId == 1) {
            layer.msg("请选择接机机场");
        } else if (productId == 2) {
            layer.msg("请选择送机机场");
        } else {
            layer.msg("请选择火车站");
        }
        return false;
    }
    if ($("#travel-start").val() == '' || $("#travel-address").val() == '') {
        if (productId == 1 || productId == 3) {
            layer.msg("请选择送达地点");
        } else {
            layer.msg("请选择出发地点");
        }
        return false;
    }
    //用户时间还有一种情况 用户选择的时间上能小于多久上能大于多久

    var date = $("#datepicker4").val(); //用户选择的日期
// console.log(date);
    if (date == '') {
        layer.msg("请选择用车时间.");
        return false;
    }
    return true;
}
function guessTimeMiles() {

    var oLonLat = $("#cityID").attr("lonLat");
    var elonLat = $("#fromjw").attr("value");

    $.ajax({
        type: 'POST',
        dataType: 'jsonp', //这个很重要，跨域问题

        async: false,
        url: 'http://restapi.amap.com/v3/distance?origins=' + oLonLat + '&destination=' + elonLat + '&output=json&key=3dcc5867a06e11425b2f699d7d3e4025',

        success: function (data) {
            var guessTime = data.results[0].duration / 60; //获取分钟数

            var guessMiles = Math.floor(data.results[0].distance / 1000); //获得公里数

            $("#guessTime").html(guessTime);
            $("#guessMiles").html(guessMiles);
            LoadTransferProduct();
            $(".guessTime").html(guessTime);
            $(".guessMiles").html(guessMiles);
            //获取 预估路程和时间后  调用路程


        }
    });
}

///获取显示的产品

function LoadTransferProduct() {
    //cityID, date, tenancy, carTypes, vendors
    var car_id = '', vendors = '';
    $("input[name=\"car_id\"]:checked").each(function () {
        // carTypes += "," + $(this).val();
        car_id += $(this).val()+',';

    });
    $("input[name=\"vendor\"]:checked").each(function () {
        vendors += "," + $(this).val();
    });
    var cityID = $("#cityID").attr("cid");
    var list = $(".plist");
    var productId = JudgeHAdress();//获取产品类别

    var guessTime = $("#guessTime").html();
    // console.log(guessTime);
    var guessMiles = $("#guessMiles").html();
    // console.log(guessMiles);
    var data = $("#datepicker4").val();
    var hour = $("#hour").val();
    var minute = $("#minute").val();
    var car_type = 2;
    list.html('<div style="padding: 10px;text-align: center;"><img src="/Application/Home/img/onLoad.gif" />加载中...</div>');
    $.ajax({
        type: 'POST',
        url: '/Home/Order/car_list',
        data: {
            car_type: car_type,
            car_id: car_id,
            cityID: cityID,
            guessTime: guessTime,
            guessMiles: guessMiles,
            productId: productId,
            // carTypes: carTypes,
            // vendors: 54012,//vendors,
            data: data,
            hour: hour,
            minute: minute,
            // tenancy: tenancy,   
        },
        async: false,
        dataType: 'json',
        success: function (data) {
            // console.log(data);return false;
            // var json = eval(data.content);
            var html = '';
            var ids = [];
    //   console.log(data);
            if (data != null) {
                html = ' <div class="cl_trip clearfix">预计时长<b class="guessTime"></b>分钟,行驶<b class="guessMiles"></b>公里<span ft="14">(行驶里程与时间仅供参考，具体以实际行驶为准)</span></div><ul>';
                for (var i in data) {
                    var obj = data[i];
                    //var totalfee = Math.floor(obj.TotalFee);
                    var totalfee = Math.round(obj.TotalFee * 100 / 100);
                    if (ids.indexOf(obj.id) == -1) {
                        ids.push(obj.id);
                        html += '<li class="title"><dl><dt class="carType"><img src="/Application/Admin/Uploads/' + obj.car_pic + '" style="width: 100px" /></dt><dt class="info"><big>' + obj.car_name + '<span><i class="passenger xl"></i><dfn>' + obj.people_num + '</dfn></span><span><i class="baggage xl"></i><dfn>' + obj.bags_num + '</dfn></span></big>' + obj.equivalent + '&nbsp;等同级车</dt><dt class="price"><dfn>¥<big>' + obj.car_price + '</big></dfn>起</dt></dl></li>';
                        html += '<li class="vo"><dl  id=' + obj.id + '><dd  class="img"><img src="/Application/Home/img/logo.png" style="width:100px" /><br/><h3>运来出行</h3></dd><dd class="info">' + GetTags(obj.Tags) + '</dd><dd class="score"><big>'+ obj.score +'</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + obj.car_price + '</big></dfn><br /></span></dd><dd class="dyd"><a href="javascript:void(0);"  onclick="payfor(' + obj.id + ',' + obj.car_price + ')" class="yd">点击预定</a></dd><div class="fill_popup" style="display:none"></div></dl></li>';
                        //<em>市内/跨域包车</em>
                    } else {
                        // html += '<li class="vo"><dl><dd class="img"><img src="/Application/Home/img/logo.png" style="width:100px" /><br/><h3>运来出行</h3></dd><dd class="info"></dd><dd class="score"><big>4.5</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + totalfee + '</big></dfn><br /></span></dd><dd class="dyd"><a href="javascript:void(0);"   onclick="payfor(' + obj.ID + ',' + totalfee + ')" class="yd">点击预定</a></dd></dl></li>';
                        html += '<li class="vo"><dl  id=' + obj.id + '><dd  class="img"><img src="/Application/Home/img/logo.png" style="width:100px" /><br/><h3>运来出行</h3></dd><dd class="info">' + GetTags(obj.Tags) + '</dd><dd class="score"><big>'+ obj.score +'</big>/5分</dd><dd class="price"><span><dfn>¥<big>' + obj.car_price + '</big></dfn><br /></span></dd><dd class="dyd"><a href="javascript:void(0);"  onclick="payfor(' + obj.id + ',' + obj.car_price + ')" class="yd">点击预定</a></dd><div class="fill_popup" style="display:none"></div></dl></li>';

                    }

                }
                html += '</ul>';
            } else {
                //var limiDate = new Date().addHours(window.DayRentLimitHour);
                //html += '<div class="search-noresult">抱歉，现在最早可以预订' + limiDate.Format("MM") + '月' + limiDate.Format("dd") + '日' + limiDate.Format("hh:mm") + '之后的用车朊务</div>';
                html += '<div class="search-noresult">对上起，暂无符合要求的车型。您可以修改用车时间或地点后重新搜索，获取更多车型。</div>';
            }
            list.html(html);
            $(".poTip").poshytip({ allowTipHover: true });
        },
        error: function () {
            layer.msg("出错了！");
        }
    });



}


function Reserve(id) {
    var date = $("#datepicker4").val(); //用户选择的日期
    var hour = $('#hours').val();
    var minute = $('#minutes').val();
    var travel_start = $('.cityTransferAddress').val();
    var travel_end = $('#travel-start').val();
    var travel_end_address = $('#travel-address').val();

    if (ValidateTime()) {
        if (checkLogin()) {
            window.location.href = "/Home/Order/shuttle_order_send?id=" + id + "&travel_start= " + travel_start + "&travel_end=" + travel_end + "&travel_end_address=" + travel_end_address + "&date=" + date + "&hour=" + hour + "&minute=" + minute;
        }
    } else {

        var limiDate = new Date().addHours(window.DayRentLimitHour);
        $(".plist").html('<div class="search-noresult">查询无结果，建议预订' + limiDate.Format("MM") + '月' + limiDate.Format("dd") + '日' + limiDate.Format("hh:mm") + '以后，包车天数为半天到五天的产品</div>');

        layer.msg("预定时间不能小于" + window.DayRentLimitHour + "小时.");
        return false;
    }
}

//加工经纬度

function processing(lonLat) {
    var obj;
    obj = lonLat.split(",");
    return obj;

}

function payfor(id, price, cartypeID, carTeamId) {
    if (checkLogin()) {
        var monthDay, week, time, departAddress, arriveAddress, departCityId, arriveCityId, data
        , useTime, dataHtml, productType, currentPay, html, dObj, aObj, travel_end;
        departCityId = $("#cityID").attr("cid");
        arriveCityId = $("#travel-cityid").val();

        //目的地点的经纬度

        dObj = processing($("#fromjw").attr("value"));//出发地经纬度


        aObj = processing($("#cityID").attr("lonLat"));//目的地经纬度

        html = payHtml();
        currentPay = $("#" + id + " .fill_popup");
        currentPay.html(html);
        currentPay.show();
        productType = judgeTransfer();
        time = $("#hours").val() + ':' + $("#minutes").val();
        departAddress = $(".cityTransferAddress").val();
        arriveAddress = $("#travel-address").val();
        travel_end = $("#travel-start").val();

        //  订单消息摘要

        data = $("#datepicker4").val();
        monthDay = getDetail(data);//获取月份和天数

        useTime = data + " " + time;
        week = geWeek(new Date(data));//获取星期;
        dataHtml = monthDay + week + time + '用车  <br>';
        var productID = JudgeHAdress();
        // console.log(productID);return false;
        if (productID == 2 || productID == 4) {
            dataHtml += '<span>' + arriveAddress + '</span><i></i><em></em><i></i><span>' + departAddress + '</span>';
        } else {
            dataHtml += '<span>' + departAddress + '</span><i></i><em></em><i></i><span>' + arriveAddress + '</span>';
        }
        // console.log(dataHtml);
       
        dataHtml += '<input type="hidden" name="detailTime" value="' + monthDay + week + time + '" />' +
            '<input type="hidden" name="departAddress" value="' + departAddress + '" />' +
            '<input type="hidden" name="arriveAddress" value="' + arriveAddress + '" />' +
            '<input type="hidden" name="useTime" value="' + useTime + '" />' +
            '<input type="hidden" name="userCustomerId" id="userCustomerId" value=' + carTeamId + ' />' +//提供朊务车队

            '<input type="hidden" name="productType" id="productType" value=' + productType + ' />' +
            '<input type="hidden" name="estimatePrice" id="estimatePrice" value=' + price + ' />' +
            '<input type="hidden" name="carTypeId" id="carTypeId" value=' + cartypeID + ' />' +
            '<input type="hidden" name="departCityId" id="departCityId" value=' + departCityId + ' />' +
            '<input type="hidden" name="departLongitude" id="departLongitude" value=' + dObj[0] + ' />' +
            '<input type="hidden" name="departLatitude" id="departLatitude" value=' + dObj[1] + ' />' +
            '<input type="hidden" name="arriveCityId" id="arriveCityId" value=' + arriveCityId + ' />' +
            '<input type="hidden" name="arriveLongitude" id="arriveLongitude" value=' + aObj[0] + ' />' +
            '<input type="hidden" name="arriveLatitude" id="arriveLatitude" value=' + aObj[1] + ' />' +
            '<input type="hidden" name="productID" value="' + productID + '" />' + 
            '<input type="hidden" name="car_id" id="" value="' + id + '" />' + 
            '<input type="hidden" name="travel_end" id="travel-start" value="' + travel_end + '" />';
            
    
        $("#BookerFirstName").val($("#userAccount").val());
        $("#BookerTelephone").val($("#contactPhone").val()); 
        $(".place_time").html(dataHtml);
        $(".detail dfn").html(price);

        $(".price-amount .amount dfn").html(price);
        $("#" + id + " .dyd a").css("background", "gray");

    } else {
        return false;
    }
}



//返回验证信息

function JudgeHAdress() {
    var tag = $("#nested-tabInfo").text(), productId;
    if (tag == "接机") {
        return productId = 1;
    }
    if (tag == "送机") {
        return productId = 2;
    }
    if (tag == "接火车") {
        return productId = 3;
    }
    if (tag == "送火车") {
        return productId = 4;
    }
}
//判断是否接送

//function JudgeIsSend() {
//    var tag = $("#nested-tabInfo").val(), message = '';

//}

//获取时间payfor
function getDetail(dataFull) {
    var monthDay = '', data = [];
    data = dataFull.split("-");
    monthDay = data[1] + "-" + data[2];
    return monthDay;
}
//根据日期判断星期

function geWeek(date) {
    var week = '';
    if (date.getDay() == 0) week = "周日";
    if (date.getDay() == 1) week = "周一";
    if (date.getDay() == 2) week = "周二";
    if (date.getDay() == 3) week = "周三";
    if (date.getDay() == 4) week = "周四";
    if (date.getDay() == 5) week = "周五";
    if (date.getDay() == 6) week = "周六";
    return week;
}


//页面支付的html代码

function payHtml() {
    var waitting =$("#userAccount").attr("waitting")+"小时";
    var times = new Date($("#datepicker4").val()).Format("yyyy-MM-dd");
    var timeArry = times.split("-");
    var year = timeArry[0];
    var month = timeArry[1];
    var datas = timeArry[2];
    var mathFlow = $("#userAccount").attr("freeCancel");
    //var cancelTime = year + "-" + month + "-" + (datas - mathFlow);
    //var hoursMunits = $('.hours').val() + ":" + $('.minutes').val();
    var freeCancelTime = new Date(year, month, datas, $('.hours').val(), $('.minutes').val(), 0).addMonths(-1).addHours(-mathFlow).Format("yyyy-MM-dd hh:mm");
var html = '<form action ="/Home/Order/shuttle_order_pay"  id="formOrder" method = "post"   >' +
        '<b class="b1"></b><a href="javascript:void(0);"class="popup_close" onclick="payClose(this)">×</a><div class="place_time"></div><ul class="book_info"><li class="clearfix mt20"><span class="zd fl">订车人</span><div id="BookerBox"class="fl linkman"><input type="text"id="BookerFirstName"class="person fl w1 drop-list ui-placeholder" name="BookerName" placeholder="请输入订车人姓吊" maxlength="20"><div class="pop_box person_box personList"style="display: none"></div></div></li><li class="mt10 clearfix"><span class="zd fl">订车人手机</span><div id="PhoneBox"class="fl phone_num"><input id="BookerTelephoneHead" class="fl c phone_head" type="text" value="+86" readonly="readonly"><input id="BookerTelephone"type="text"class="fl p phone ui-placeholder" placeholder="请填写正确的手机号码" data-placeholder="必填"name="BookerTelephone" maxlength="20"></div><span class="ts fl">接收通知短信</span></li><li class="mt10 clearfix"><span class="zd fl">帮人订车</span><label>' +
        '<input id="assist" type="checkbox" name="isAssistOthBooking" class="ml100" value="false" onclick="agentInfo()" />车辆安排成功后通知乘车人</label></li><li class="mt10 clearfix dii"style="display: none;"><span class="zd fl">乘车人</span><div id="BookerOthBox"class="fl linkman"style="z-index: 995;">' +
        '<input type="text"id="BookerOthFirstName" name="BookerOthName" class="person fl w1 drop-list ui-placeholder" placeholder="请输入乘车人姓吊"maxlength="20">' +
        '<div class="pop_box person_box personList"style="display: none"></div></div></li><li class="mt10 clearfix dii"style="display: none;"><span class="zd fl">乘车人手机</span><div id="PhoneOthBox"class="fl phone_num"><input id="BookerOthTelephoneHead"class="fl c phone_head"type="text" value="+86"readonly="readonly"><input id="BookerOthTelephone"name="BookerOthTelephone" type="text"class="fl p phone othphone ui-placeholder" placeholder="请填写正确的手机号码" maxlength="20"></div></li><div id="addsvcsBox"style="display: none"><li class="border_b mt5">&nbsp;</li><div class="addsvcs_wrap"></div></div><li class="border_b mt5">&nbsp;</li></ul><div id="BookingRulesBox"><div><ul class="book_info"><li class="clearfix mt10"><span class="zd fl">发票信息</span><div class="fl"style="line-height: 30px;">下单后至订单页提交。</div></li><li class="border_b">&nbsp;</li></ul><div class="note_item"><p><b>用车须知</b><span class="can-span">1.一口价已包含高速费、停车费等所有费用，无需额外付费给司机。若收取，多收费用将双倊赔偿。<br>2.若您提供了航班号，司机将按照航班实际抵达时间提供朊务，<span style="color: #009100;">航班抵达后司机最长免费等候<span class="waitting">' + waitting + '</span></span>。若您未提供航班号，司机将会按照约定时间免费等待<span style="color: #009100;">' + waitting + '</span>。超过免费等候时间您仍未到达或无法联系，司机将无法继续等待，订单费用无法退还；</span></p><p><b>取消规则</b><span class="can-span"><strong>' + freeCancelTime + '</strong>前可免费取消，超时取消将收取订单全额费用。订单上支持修改。</span></p><div id="note_item_ins"><p><b>预订须知</b><a id="ClauseBtn">详细预订须知</a>、<a class="jnt_ins"data-id="2">到场无车险+意外险条款</a>、<a class="jnt_ins_pay">到场无车险代理赔协议</a></p></div></div></div></div><div class="pay_wrap clearfix"id="BookingPriceBox"><p class="detail fl">用车费：<dfn>¥100</dfn></p><p class="price-amount fl"><span class="amount">订单总额：<em>¥</em><dfn>105</dfn></span><span class="opa fr">' +
        ' <input type="button" value="下一步，去支付"  class="p_btn" id="PayBtn" onclick="generationOrder()"/>  ' +
        ' </span></p></div> ' +
        '</form>';
    return html;
}

//订单详细详细的验证

function validationPay() {
    var bookerTelephone = $("#BookerTelephone").val();
    var bookerOthTelephone = $("#BookerOthTelephone").val();

    var contractPerson = $("#BookerFirstName"), contractPhone = $("#BookerTelephone"), cFlag = $("#assist"), contractOthPerson = $("#BookerOthFirstName"), contractOthPhone = $("#BookerOthTelephone");
    if (contractPerson.val() == "") {
   
        layer.msg("订车人姓吊上能为空.");
        contractPerson.focus();
        return false;

    } if (contractPhone.val() == "") {
        layer.msg("订车人手机上能为空.");
        contractPhone.focus();
        return false;

    } if (contractPhone.val() != "") {
        if (!checkMobile(bookerTelephone)) {
            layer.msg("请填写正确的手机格式.");
            contractPhone.focus();
            return false;
        }

    }
    if (cFlag.attr("checked") == "checked") {
        if (contractOthPerson.val() == "") {
            layer.msg("乘车人姓吊上能为空.");
            contractOthPerson.focus();
            return false;

        }
        else if (contractOthPhone.val() == "") {
            layer.msg("乘车人手机号上能为空.");
            contractOthPhone.focus();
            return false;
        }
        else if (contractOthPhone.val() != "") {
            if (!checkMobile(bookerOthTelephone)) {
                layer.msg("请填写正确的手机格式.");
                contractOthPhone.focus();
                return false;
            }
        }
    }
    return true;

}
//订单表单支付

function generationOrder() {
    var tag = $("input[name='isAssistOthBooking']").attr('checked');
    if (tag == undefined) {
        $("#assist").attr("value", "false");
    } if (tag == "checked") {
        $("#assist").attr("value", "true");
    }
    if (validationPay()) {
        $("#formOrder").submit();
    }
}

function payClose(dd) {
    var fatherid = $(dd).parent().parent().parent().attr("id");
    $("#" + fatherid + " .dyd a").css("background", "#007500");
    $(".fill_popup").hide();
}



function agentInfo() {

    $("#BookerOthName").val("");
    $("#BookerOthTelephone").val("");
    $(".dii").toggle();

}
$(document).ready(function () {
    $(".yd").click(function () {
        $(".fill_popup").show();
        return false;
    });
    $("#assist").bind('click', function () {
        return false;
    });


});
function GetCarTeamLogo(carTeamLogoUrl) {
    if (carTeamLogoUrl == null || carTeamLogoUrl == '') {
        return "/Application/Home/img/logo.png";
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


function ValidateTime() {
    var date = $("#datepicker4").val(); //用户选择的日期
    // console.log(date);return false;
    var hour = $('#hours').val();
    var minute = $('#minutes').val();

    //当前时间+预定小时数   <  预定日期

    var dd = new Date(date + " " + hour + ":" + minute + ":00");

    if (CompareDate(new Date().addHours(window.DayRentLimitHour), dd)) {
        return true;
    }
    else {
        var limiDate = new Date().addHours(window.DayRentLimitHour);
        $(".plist").html('<div class="search-noresult">抱歉，现在最早可以预订' + limiDate.Format("MM") + '月' + limiDate.Format("dd") + '日' + limiDate.Format("hh:mm") + '之后的用车朊务</div>');
        layer.msg("预定时间上能小于" + window.DayRentLimitHour + "小时.");
        return false;
    }


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

    GetTransferCarType();
    //GetTransferCarTeam();

});
//找到接送机产品的车型

function GetTransferCarType() {
    var cityId = $("#cityID").attr("cid");
    var date = $("#datepicker4").val();
    var tenancy = $("#days").val();
    var car_type = 2;
    if (cityId != '' && cityId != undefined) {
        $.ajax({
            type: 'POST',
            url: '/Home/Order/car_type_list',
            dataType: "json",
            async: false,
            cache: true,
            data: { car_type: car_type, date: date, tenancy: tenancy},
            success: function(data) {
                // console.log(data);
                if (data != '' && data != undefined) {
                    data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<label><input type="checkbox" name="car_id" value="' + data[i].id + '" />' + data[i].car_name + '</label>';
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
}
//绑定朊务商的数据

function GetTransferCarTeam() {
    var cityId = $("#cityID").attr("cid");
    //var date = $("#datepicker4").val();
    //var tenancy = $("#days").val();
    if (cityId != '' && cityId != undefined) {
        $.ajax({
            type: 'POST',
            url: '/Common/GetTransferCarTeam',
            data: {
                cityId: cityId
                //date: date,
                //tenancy: tenancy
            },
            async: false,
            cache: true,
            success: function (data) {
                if (data != '' && data != undefined) {
                    data = eval(data);
                    var html = '';
                    for (var i = 0; i < data.length; i++) {
                        html += '<label><input type="checkbox" name="vendor" value="' + data[i].ID + '" />' + data[i].SupplierName + '</label>';
                    }
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
//判断手机 TODO 待封装

function checkMobile(mobile) {
    if (!(/^1[3|4|5|8][0-9]\d{4,8}$/.test(mobile))) {
        return false;
    }
    return true;
}
function InitClass(lbl, type) {

    var obj = $(lbl).parent();
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
    if (validateOther()) {
        if (ValidateTime()) {
            guessTimeMiles();

        }
    }

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

    if (validateOther()) {
        if (ValidateTime()) {
            guessTimeMiles();

        }
    }
}



$(document).ready(function () {
    resetAjax();
    //Horizontal Tab
    $('#parentHorizontalTab').easyResponsiveTabs({
        type: 'default', //Types: default, vertical, accordion
        width: '600px', //auto or any width like 600px
        fit: true, // 100% fit in a container
        tabidentify: 'hor_1', // The tab groups identifier
        activate: function (event) { // Callback function if tab is switched
            //TO DO 下面更新代码是可以优化 这样实现很浪费http资源的！！！   console.log(type);
            resetAjax($(this).attr("id"));
            var $tab = $(this);
            var $info = $('#nested-tabInfo');
            $info.text($tab.text());
            $info.show();
        }
    });


});

//高德地图

var citylistAddress = '',
    sublistAddress = '';


function resetAjax(tag) {
    $.ajax({
        type: 'POST',
        url: '/Home/Index/city',
        async: false,
        cache: true,
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            var type = judgeTransfer(tag);
            var hothtml = getDetailAddress("true", true, type);

            citylistAddress = '<div class="information" style="display:none">支持输入英文／中文／拼音／三字码</div>' +
                '<ul class="menu"><li class="hover" onclick="a()" >热门机场</li><li  onclick="a()">ABCDEF</li><li  onclick="a()">GHJKLM</li><li  onclick="a()">NPQRST</li><li  onclick="a()">WXYZ</li></ul><div class="main">';
            var total = '<div class="sublistF" style="display:block" >';
            var ul1 = '<ul class="list"><div class="suplist">' + hothtml;
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
            var sublist = '<div class="sublistS"  style="display:none"></div>';//城市下面所对应的飞机或者火车场


            for (var i = 0; i < data.length; i++) {
                if (data[i].Letter == "A") {
                    //下面的为今天方法
                    a += '<li><a href="#"  cid="' + data[i].CityID + '" >' + data[i].CityName + '</a></li>';
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
            ul1 += '</div></ul>';
            ul2 += a + b + c + d + e + f + ' </ul>';
            ul3 += g + h + j + k + l + m + '</ul>';
            ul4 += n + p + q + r + s + t + '</ul>';
            ul5 += w + x + y + z + '</ul>';
            total += ul1 + ul2 + ul3 + ul4 + ul5 + '</div>';

            citylistAddress += total + sublist + '</div>';
        },
        error: function () {
            //layer.msg("异常！");
        }
    });
}


//城市的点击事件


var a = function () {

    $(".sublistF").css("display", "block");
    $(".sublistS").css("display", "none");
}
//获取价格

function guessTransferPrice() {
    //获得当前的车型 ，车队，productID，预估时间，预估距离


}

//点击事件 
//getDetailAddress :传入两个参数 hot和城市吊字 hot当两种类型的载体一种是是否是热门一种是城市吊字

function getDetailAddress(cityID, hot, type) {
    // console.log(type);
    var li = '', b, objs = {}, htmls = '', objid;
    $.ajax({
        type: 'POST',
        url: '/Home/Index/detail_address',
        // data: "hot=" + hot + "&&cityID=" + cityID + "&&type=" + type,
        data: {hot: hot, cityID: cityID, type: type},
        async: false,
        cache: true,
        dataType: 'json',
        success: function (data) {
            // console.log(data);
            for (var i = 0; i < data.length; i++) {
                //var obj = objs[data[i].CityName] = {}
                var objid = objs[data[i].CityID] = {}
                var obj = objid[data[i].CityName] = {}
                if (hot == true) {
                    for (var j = 0; j < data.length; j++) {
                        if (data[i].CityID == data[j].CityID) {
                            obj[data[j].ID] = [data[j].StationName, data[i].Longitude, data[i].Latitude];
                        }
                    }
                }
                else {
                    b = '<b data-tag="title">' + data[i].CityName + '</b>';
                    li += '<li><a  href="#" class="listA" onclick="addreesClick(this)" cid="' + data[i].ID + '"lonLat = "' + data[i].Longitude + ',' + data[i].Latitude + '"><i class="ui-icon icon-location airport fn-left"></i>' +
                        '<span class="subtext">' + data[i].StationName + '</span> <span class="subcity">' + data[i].CityName + '</span></a></li>';
                }
            }
            if (hot == true) {

                //{1:{"北京":{"1":[北京机场,经度，纬度],"10002":[北京二号机场,经度，纬度]}} 依次为cityID  cityname adressID adressNAME 经度 纬度

                for (var c in objs) {
                    var cityobj = objs[c];
                    for (var cn in cityobj) {

                        var adrobj = cityobj[cn];
                        for (var cA in adrobj) {
                            li += '<a style="width:138px;" href="####;" id="' + cA + '"  lonLat="' + adrobj[cA][1] + ',' + adrobj[cA][2] + '">' + adrobj[cA][0] + '</a>';
                        }
                        htmls += '<div style="padding-left:45px;float:left;width:330px;display: inline-block;"><span style="margin-left:-40px;" class="cityName" cid="' + c + '">' + cn + '</span><div class="subgroup" >' + li + '</div></div>';
                        li = '';
                    }
                }

            } else {
                if(typeof(b) == 'undefined') {
                    b = '暂时找到';
                }

                var html = '<div class="sublist-title"  onclick="a() ;return false"><span style="float:right;color:#1060c9">点击返回城市列表</span>' + b + '</div><ul class="sublist-list">' + li + '</ul>';
                $(".sublistS").html(html);
            }
        }
    });

    return htmls;

}





//获取时间的 代码块

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
//点击获取到城市具体的接送机地址

function addreesClick(e) {
    var address = $(e).children('.subtext').html();
    var addressID = $(e).attr("cid");//这个就写这个地址的ID 
    var lonlat = $(e).attr("lonlat");
    $(e).parents('.citylistAddress').prev().val(address);
    $(e).parents('.citylistAddress').prev().prev().val(addressID);
    $(e).parents('.citylistAddress').prev().prev().attr("lonlat", lonlat);
    //$(e).parents('.citylistAddress').hide();
    ; return false;


    //$(e).parents('.select-city').next().find('.input').val('');

}

$(document).click(function () {
    $(".result").hide();
    $(".citylistAddress").hide();
});
//判断是接还是送

function pick_drop(tag) {
    if (tag != "") {
        var tags = tag.split('-');
        if (tags[0] == 'pick') {
            return 'pick';
        }
    }
}

//判断是火车还是飞机

function judgeTransfer(tag) {
 
  
    if (tag == "drop_train" || tag == "pick_train") {
        return 2;
    } else {
        return 1;
    }
}
//$('.listA').bind('click', function () {
//    var address = $(this).children('.subtext').html();
//    var addressID = $(this).children('.subtext').attr("cid");//这个就写这个地址的ID 
//    $(this).parents('.citylistAddress').prev().val(address);
//    $(this).parents('.citylistAddress').prev().prev().val(addressID);
//    InitData();
//    $('.citylistAddress').hide();
//    $(this).parents('.select-city').next().find('.input').val('');
//    return false;
//});
$('.drop-down-icon').live('click', function (e) {
    $(".result").hide();
    $(".citylist").hide();
    e.stopPropagation();
    $(this).children('.citylistAddress').html(citylistAddress).toggle();
    $('.citylistAddress .menu li').bind('click', function () {
        $(this).addClass('hover').siblings().removeClass('hover');
        $('.citylistAddress .main ul').eq($('.menu li').index(this)).show().siblings().hide();
        return false;
    });

    //赋值 经纬度的地方 热门地址点击

    $('.list a').bind('click', function () {
        var address = $(this).html();
        var addressID = $(this).attr("id");//这个就写这个地址的ID 
        var lonLat = $(this).attr("lonLat");//获取地址的经度

        var cityID = $(this).parent().siblings(".cityName").attr("cid");
        //cid城市的id value是 地址的详细信息

        //获取地址的纬度

        $(this).parents('.citylistAddress').prev().val(address);
        $(this).parents('.citylistAddress').prev().prev().val(addressID);
        $(this).parents('.citylistAddress').prev().prev().attr("lonLat", lonLat);//保存经度

        $(this).parents('.citylistAddress').prev().prev().attr("cid", cityID);//保存热门交通所属城市

        $('.citylistAddress').hide();
        $(this).parents('.select-city').next().find('.input').val('');
        return false;
    });
    //$('.citylistAddress').bind('click', function () {
    //    $('.citylistAddress').show();
    //    return false;
    //});


    $('.citylist').bind('click', function () {

        $('.citylist').show();
        return false;
    });

    $('.citylistAddress .main .cityletter a').bind('click', function (e) {
        var cityID = $(e.target).attr("cid");//获取当前点击元素的cityID
        $("#cityID").attr("cid", cityID);
        var type = judgeTransfer();
        getDetailAddress(cityID, "", type);
        $(".sublistF").css("display", "none");
        $(".sublistS").css("display", "block");

        return false;
    });

    $('.drop-down-icon').live('click', function (e) {
        $(".result").hide();
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
            //var city = $(this).html();
            //$(this).parents('.citylist').prev().val(city);
            $('.citylist').hide();
            $(this).parents('.select-city').next().find('.input').val('');
            return false;
        });


    });

});


