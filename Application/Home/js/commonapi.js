
$(function () {
    //左边点击事件
    var key = '3dcc5867a06e11425b2f699d7d3e4025';
    $("#side ul li").click(function () {
        $(this).siblings().children().removeClass('cur');
        $(this).children().addClass('cur');
        var index = $("#side ul li").index(this);
        $("#divmaincontent > div").hide().eq(index).show();
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
                url: 'http://restapi.amap.com/v3/place/text',
                cache: false,
                dataType: 'jsonp',//这个很重要，跨域问题
                type: 'get',
                async: false,
                data: {
                    offset: 6,
                    page: 1,
                    //scope: 2,
                    keywords: s,
                    city: c,
                    output: "json",
                    key:key
                },
                success: function (data) {
                    if (data) {
                        guessTimeMiles();
                        //$("#odata").html(JSON.stringify(data));
                        f.find(".hasquery").val(1); //设置为已查询
                        var json = data.pois; //结果
                        total = data.count; //返回的数量
                        var txt = '<ul>';
                        var xtotal = 0;
                        if (total > 0) {
                            for (var i = 0; i < json.length; i++) {
                                //alert(typeof(json[i].address));
                                if (typeof (json[i].location) == 'undefined' || json[i].location == undefined || typeof (json[i].address) == 'undefined' || json[i].address == undefined) {
                                } else {
                                    txt += '<li><a href="javascript:;" location="' + json[i].location + '" ><span class="name">' + json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                    xtotal++;
                                }
                            }
                            if (data.count > 6) {
                                txt += '<div class="page"><a href="javascript:;" class="next" page=1>下一页</a></div>';
                            }
                            //绑定事件，这里不起作用

                            $(".result ul li a").live('click', function () {
                                var location = $(this).attr("location");
                                var name = $(this).find("span").html(); //地名
                                var addr = $(this).find("p").html(); //地址
                                $(this).parents(".part").find(".input").val(name);
                                $(this).parents(".part").find(".addr").val(addr);
                                $(this).parents(".part").find(".jw").val(location);
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
                                url: 'http://restapi.amap.com/v3/place/text',
                                cache: false,
                                dataType: 'jsonp',//这个很重要，跨域问题
                                type: 'get',
                                async: false,
                                data: {
                                    offset: 6,
                                    page: page,
                                    //scope: 2,
                                    keywords: s,
                                    city: c,
                                    output: "json",
                                    key: key
                                },
                                success: function (data) {
                                    if (data) {
                                        guessTimeMiles();
                                        f.find(".hasquery").val(1); //设置为已查询
                                        var json = data.pois; //结果
                                        total = data.count; //返回的数量
                                        var text = '';
                                        text = '<ul>';
                                        var xtotal = 0;
                                        if (total > 0) {
                                            for (var i = 0; i < json.length; i++) {
                                                //alert(typeof(json[i].address));
                                                if (typeof (json[i].location) == 'undefined' || json[i].location == undefined || typeof (json[i].address) == 'undefined' || json[i].address == undefined) {
                                                } else {
                                                    text += '<li><a href="javascript:;"location="' + json[i].location + '"><span class="name">' + json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                                    xtotal++;
                                                }
                                            }
                                            if (data.count > 6) {
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
            url: 'http://restapi.amap.com/v3/place/text',
            cache: false,
            dataType: 'jsonp',//这个很重要，跨域问题
            type: 'get',
            async: false,
            data: {
                offset: 6,
                //scope: 2,
                keywords: s,
                city: c,
                output: "json",
                key: key
            },
            success: function (data) {
                if (data) {
                        guessTimeMiles();
                   
                    f.find(".hasquery").val(1); //设置为已查询
                    var json = data.pois; //结果
                    total = data.count; //返回的数量
                    var txt = '<ul>';
                    var xtotal = 0;
                    if (total > 0) {
                        for (var i = 0; i < json.length; i++) {
                            if (json[i].location == undefined || json[i].address == undefined) {
                            }//过滤不合格的数据
                            else {
                                txt += '<li><a href="javascript:;" location="' + json[i].location + '"><span class="name">' +
                                    json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                xtotal++;
                            }
                        }

                        if (data.count > 6) {
                            txt += '<div class="page"><a href="javascript:;" class="next" page=1>下一页</a></div>';
                        }

                        $(".result ul li a").live('click', function () {
                            var location = $(this).attr("location");
                            var name = $(this).find("span").html(); //地名
                            var addr = $(this).find("p").html(); //地址
                            $(this).parents(".part").find(".input").val(name);
                            $(this).parents(".part").find(".addr").val(addr);
                            $(this).parents(".part").find(".jw").val(location);
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
                            url: 'http://restapi.amap.com/v3/place/text',
                            cache: false,
                            dataType: 'jsonp',//这个很重要，跨域问题
                            type: 'get',
                            async: false,
                            data: {
                                offset: 6,
                                page: page,
                                //scope: 2,
                                keywords: s,
                                city: c,
                                output: "json",
                                key: key
                            },
                            success: function (data) {
                                if (data) {
                                    guessTimeMiles();
                                    f.find(".hasquery").val(1); //设置为已查询
                                    var json = data.pois; //结果
                                    total = data.count; //返回的数量
                                    var text = '';
                                    text = '<ul>';
                                    var xtotal = 0;
                                    if (total > 0) {
                                        for (var i = 0; i < json.length; i++) {
                                            //alert(typeof(json[i].address));
                                            if (typeof (json[i].location) == 'undefined' || json[i].location == undefined || typeof (json[i].address) == 'undefined' || json[i].address == undefined) {
                                            } else {
                                                text += '<li><a href="javascript:;" location="' + json[i].location + '"><span class="name">' + json[i].name + "</span><p>" + json[i].address + '</p></a></li>';
                                                xtotal++;
                                            }
                                        }
                                        if (data.count > 6) {
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
$("#result3 li a").live('click', function() {
    $("#result3").hide();

});
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
    error: function () {
        //layer.msg("异常！");
    }
});
