
$(function () {
    var addressType, isShuttle,tabTagA="airport",tabTagT="train";
   function loadSearch(tag) {
       if (tag == "pick_up") {
           celarOther(tag);
            addressType = "接机机场";
            isShuttle = "送达地点";
           html= loadContent(addressType, isShuttle);
           $(".pick_up").html(html);
           setTabTag(tabTagA);//给绑定的地址设置tag 方便后续绑定不同类型的地址
          

       } else if (tag == "drop_off") {
           celarOther(tag);
            addressType = "送机机场";
            isShuttle = "出发地点";
             html = loadContent(addressType, isShuttle);
            $(".drop_off").html(html);
            setTabTag(tabTagA);//给绑定的地址设置tag 方便后续绑定不同类型的地址
       } else if (tag == "pick_train") {
           celarOther(tag);
            addressType = "火车站";
            isShuttle = "送达地点";
             html = loadContent(addressType, isShuttle);
            $(".pick_train").html(html);
            setTabTag(tabTagT);//给绑定的地址设置tag 方便后续绑定不同类型的地址
       } else if (tag == "drop_train") {
           celarOther(tag);
            addressType = "火车站";
            isShuttle = "出发地点";
             html = loadContent(addressType, isShuttle);
            $(".drop_train").html(html);
            setTabTag(tabTagT);//给绑定的地址设置tag 方便后续绑定不同类型的地址
        
       }
       storeClick();//重新注册一下事件
       
      
   }
   $(" .hor_1 li").live("click", function () {
        var tag = $(this).attr("id");
        loadSearch(tag);

    });
    function celarOther(tag) {
        if(tag!="pick_up"){
            $(".pick_up").empty();
        }  if (tag != "drop_off") {
            $(".drop_off").empty();
        } if (tag != "pick_train") {
            $(".pick_train").empty();
        } if (tag != "drop_train") {
            $(".drop_train").empty();
        }
    }

    function loadContent(addressType, isShuttle) {
        //addressType例如接机地点 
        //isShuttle是否送达
        var html = '';
        html = '<dl class="jsj-address"><dt>' + addressType + '</dt><dd class="select-city"><div class="drop-down-icon"><input type="hidden" value="10007" name=cityID id="cityID" cid="197" lonlat="113.349405,23.240716" /><input style="width: 80px; height: 18px" type="text" class="txt cityTransferAddress" value="" name="cityTransferAddress"><div class="citylistAddress"></div></div></dd><dt style="margin-left: 100px;">用车时间</dt><dd class="select-time"><input type="text" id="datepicker4" name="datepicker4" readonly="readonly"  value="" class="txt date"><select class="select hours" name="hours" id="hours" ></select>:<select class="select minutes" name="minutes" id="minutes" ></select></dd><div class="clear"></div></dl><dl class="jsj-city"><dt>' + isShuttle + '</dt><dd class="select-city"><div class="drop-down-icon"><input type="hidden" name="travel-cityid"  value="197" id="travel-cityid" /><input type="text" class="city" value="广州" id="travel-start" name="travel-start"><div class="citylist" style="display: none;"></div></div></dd><dd><div class="part"><input type="text" class="txt place input" id="travel-address" name="travel-address" placeholder="请输入附近的小区/街道/建筑物/商圈" style="width: 300px; margin-left: -10px;" autocomplete="off"><input type="hidden" class="hasquery" value="0" /><input type="hidden" class="jw" id="fromjw" name="travel[1][fromjw]" value="" /><input name="travel[1][fromaddr]" class="addr" type="hidden" id="fromaddr" size="57" /><div style="display: none" id="result3" class="result">Loading...</div></div></dd><div class="cartlist"><input type="button" class="addday" id="searchProduct" onclick=" InitData()" value="搜索" style="float: right"></div><div style="clear: both"></div></dl>';
        return html;
    }
    
});
//给tab设置同的tag
function setTabTag(tag) {
    if (tag == "airport") {
        $(".cityTransferAddress").val("广州机场");
    } else {
        $(".cityTransferAddress").val("广州火车站");
    }

    $(".citylistAddress").attr("name", tag);
}


//获取当前的时间
function getTime() {

    var nowDate = gerNowDate();
    if ($("#datepicker4").val() == "") {
        $("#datepicker4").val(nowDate);
    }
  
}
function gerNowDate() {
    var date = new Date();
    var seperator1 = "-";
    var month = date.getMonth() + 1;
    var strDate = date.getDate()+1;
    if (month >= 1 && month <= 9) {
        month = "0" + month;
    }
    if (strDate >= 0 && strDate <= 9) {
        strDate = "0" + strDate;
    }
    var currentdate = date.getFullYear() + seperator1 + month + seperator1 + strDate;
    return currentdate;
}

//还要设置一个飞机和火车的标识 
//点击不同的 接机 时 就给cityadderss一个 属性然后不同的绑定 不同的值











