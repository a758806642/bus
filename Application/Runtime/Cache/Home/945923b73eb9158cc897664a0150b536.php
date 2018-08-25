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
		<a class="" href="<?php echo U('Index/index');?>">首页</a>
		<a class="" href="<?php echo U('Order/travel');?>">在线订车</a>
		<a class="" href="<?php echo U('Order/rent_order');?>">日租包车</a>
		<a class="index" href="<?php echo U('Order/shuttle_order');?>">接机/送机</a>
	</div>
</nav>

	<script src="/Application/Home/js/easyresponsivetabs.js"></script>
	<link href="/Application/Home/css/easy-responsive-tabs.css" rel="stylesheet" />
	<script src="/Application/Home/js/jquery-ui.min.js"></script>
	<link href="/Application/Home/css/jquery-ui.css" rel="stylesheet" />
	<script src="/Application/Home/js/dateinput-ch-zn.js"></script>
	<script src="/Application/Home/js/transfer.js"></script>
	<link href="/Application/Home/css/transfer.css" rel="stylesheet" />
	<link href="/Application/Home/css/order.css" rel="stylesheet" />
	<script src="/Application/Home/js/commonapi.js"></script>
	<script src="/Application/Home/js/transferhtml.js"></script>
	<style type="text/css" rel="stylesheet">
		body {
			background: #fff;
		}

		#container {
			width: 1000px;
			margin: 0 auto;
		}
	</style>
	<script>


                // if (!ValidateTime()) {
                //     var hh = (parseInt(new Date().Format("hh")) - 11).toString();
                //     if (hh.length < 2) hh = "0" + hh;
                //     $('#hours').val(hh);
                // }

		var storeClick = function () {
			getTime();
			$(".pickup").addClass("cur");
			$(function () {
				$("#dayrent").addClass("cur");

				$("#days").val(1);
				$('.hours').append(hourstxt);
				$('.minutes').append(minutestxt);

				//if (!ValidateTime()) {
				//    var hh = (parseInt(new Date().Format("hh")) - 11).toString();
				//    if (hh.length < 2)
				//        hh = "0" + hh;
				//    $('#hours').val(hh);
				//}



				if ($.browser.msie) {
					$('input:checkbox').click(function () {
						this.blur();
						this.focus();
					});
				}
				$(".date").each(function () {
					$(this).datepicker({
						minDate: new Date()
					});
				});

			});
		}

	</script>


	<link href="/Application/Home/css/tip-yellow.css" rel="stylesheet" />
	<link href="/Application/Home/css/tip-yellowsimple.css" rel="stylesheet" />
	<script src="/Application/Home/js/jquery.poshytip.js"></script>
	<style>
		.dailyhide {
			display: none;
		}

		.dailyextend {
			display: block;
		}
	</style>

	<div class="comm book">
		<div class="" style="width: 1000px; margin: auto" id="divmaincontent">
			<div id='container'>
				<p class="breadCrumbs">
					<a href="/Home/Default" target="_blank">运来出行 </a>&nbsp;&gt;&nbsp;
					<a href="#" target="_blank">
						<span id="cnm-wrap">接送机</span>
					</a>&nbsp;&gt;&nbsp;
					<span id="nested-tabInfo">接机</span>
				</p>
				<!--Horizontal Tab-->
				<div id="parentHorizontalTab">
					<ul class="resp-tabs-list hor_1">
						<li id="pick_up">接机</li>
						<li id="drop_off">送机</li>
						<li id="pick_train">接火车</li>
						<li id="drop_train">送火车</li>
					</ul>
					<div class="resp-tabs-container hor_1">
						<div class="pick_up">
							<dl class="jsj-address">
								<dt>接机机场</dt>
								<dd class="select-city">
									<div class="drop-down-icon">
										<input type="hidden" value="10007" name=cityID id="cityID" cid="197" lonlat="113.349405,23.240716" />
										<input style="width: 80px; height: 18px" type="text" class="txt cityTransferAddress" value="广州机场" name="stravel_start">
										<div class="citylistAddress" name="airport"></div>

									</div>
								</dd>
								<dt style="margin-left: 100px;">用车时间</dt>
								<dd class="select-time">
									<input type="text" id="datepicker4" name="datepicker4" readonly="readonly" class="txt date">
									<select class="select hours" name="hours" id="hours"></select>
									:
									<select class="select minutes" name="minutes" id="minutes"></select>
									<!-- <input type="text" id="datepicker4" name="transport_time" readonly="readonly" onchange="InitData()" value="" class="txt date">
									<select class="select hours" name="hours" id="hours" onchange="InitData()"></select>:
									<select class="select minutes" name="minutes" id="minutes" onchange="InitData()"></select></dd> -->
								</dd>

								<div class="clear"></div>

							</dl>
							<dl class="jsj-city">
								<dt>送达地点</dt>
								<dd class="select-city">
									<div class="drop-down-icon">
										<input type="hidden" name="travel-cityid" value="197" id="travel-cityid" />
										<input type="text" class="city" value="广州" id="travel-start" name="travel_end">
										<div class="citylist" style="display: none;">
										</div>
									</div>
								</dd>
								<dd>
									<div class="part">
										<input type="text" class="txt place input" id="travel-address" name="travel_end_address" placeholder="请输入附近的小区/街道/建筑物/商圈" style="width: 300px; margin-left: -10px;"
										 autocomplete="off">
										<input type="hidden" class="hasquery" value="0" />
										<input type="hidden" class="jw" id="fromjw" name="travel[1][fromjw]" value="" />
										<input name="travel[1][fromaddr]" class="addr" type="hidden" id="fromaddr" size="57" />
										<div style="display: none" id="result3" class="result"> Loading... </div>
									</div>
								</dd>
								<div class="cartlist">
									<input type="button" class="addday" id="searchProduct" value="搜索" style="float: right">
								</div>
								<div style="clear: both"></div>
							</dl>
						</div>
						<div class="drop_off">
						</div>
						<div class="pick_train">
						</div>
						<div class="drop_train">

						</div>
					</div>
				</div>
			</div>

			<div style="display: none">
				<input type="text" waitting="0.5" freeCancel="1" id="userAccount" />
				<input type="text" id="contactPhone" />

			</div>
			<div id="filter" style="display: block; margin-top: 10px; margin-left: -35px">
				<ul class="cl_filter" style="width: 1000px;">
					<li class="clearfix vehicle-list">
						<span class="fl">车型</span>
						<a class="fl all current" href="javascript:void(0);" onclick="AllClick(this, 1)">不限</a>

						<div class="fl filter_list" style="width: 800px">
						</div>
					</li>
					<li class="clearfix bbn vendor-list" style="display: none">
						<span class="fl">服务商</span>
						<a class="fl all current" href="javascript:void(0);" onclick="AllClick(this, 2)">不限</a>

						<div class="fl filter_list">
						</div>
					</li>
				</ul>
			</div>

			<div class="cl_trip clearfix" style="display:none">
				<b id="guessTime"></b>
				<b id="guessMiles"></b>
			</div>
			<div class="plist" style="width: 1000px; margin-left: -1px;">


			</div>
		</div>
		<div class="clear"></div>

	</div>


	<!--Plug-in Initialisation-->
	<script type="text/javascript">

		//$(".date").each(function () {
		//    $(this).datepicker({
		//        minDate: new Date()
		//    });
		//});
		$("#searchProduct").bind('click', function () {
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

		$(function () {
				var hh = (parseInt(new Date().Format("hh")) - 11).toString();
                var date = "<?php echo date('Y-m-d',strtotime('+1 day'));?>";
                // console.log(date);
                $("#dayrent").addClass("cur");
                // $("#cityID").val(60);
                // $("#cityName").val("哈尔滨");
                // $("#days").val(1);
                $('.hours').append(hourstxt);
                $('.minutes').append(minutestxt);
                $('#datepicker4').val(date);

                if (!ValidateTime()) {
                    var hh = (parseInt(new Date().Format("hh")) - 11).toString();
                    if (hh.length < 2) hh = "0" + hh;
                    $('#hours').val(hh);
                }
			storeClick();
		});
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