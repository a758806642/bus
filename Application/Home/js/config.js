window.ak = '6Rnig8eeGfch9rM8fGTPtelK';

window.DayRentLimitHour = 12;

//将指定的毫秒数加到此实例的值上 
Date.prototype.addMilliseconds = function (value) {
    var millisecond = this.getMilliseconds();
    this.setMilliseconds(millisecond + value);
    return this;
};
//将指定的秒数加到此实例的值上 
Date.prototype.addSeconds = function (value) {
    var second = this.getSeconds();
    this.setSeconds(second + value);
    return this;
};
//将指定的分钟数加到此实例的值上 
Date.prototype.addMinutes = function (value) {
    var minute = this.addMinutes();
    this.setMinutes(minute + value);
    return this;
};
//将指定的小时数加到此实例的值上 
Date.prototype.addHours = function (value) {
    var hour = this.getHours();
    this.setHours(hour + value);
    return this;
};
//将指定的天数加到此实例的值上 
Date.prototype.addDays = function (value) {
    var date = this.getDate();
    this.setDate(date + value);
    return this;
};
//将指定的星期数加到此实例的值上 
Date.prototype.addWeeks = function (value) {
    return this.addDays(value * 7);
};
//将指定的月份数加到此实例的值上 
Date.prototype.addMonths = function (value) {
    var month = this.getMonth();
    this.setMonth(month + value);
    return this;
};
//将指定的年份数加到此实例的值上 
Date.prototype.addYears = function (value) {
    var year = this.getFullYear();
    this.setFullYear(year + value);
    return this;
};
//格式化日期显示 format="yyyy-MM-dd hh:mm:ss"; 
Date.prototype.Format = function(format) {
    var o = {
        "M+": this.getMonth() + 1, //month 
        "d+": this.getDate(), //day 
        "h+": this.getHours(), //hour 
        "m+": this.getMinutes(), //minute 
        "s+": this.getSeconds(), //second 
        "q+": Math.floor((this.getMonth() + 3) / 3), //quarter 
        "S": this.getMilliseconds() //millisecond 
    }
    if (/(y+)/.test(format)) {
        format = format.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
    }
    for (var k in o) {
        if (new RegExp("(" + k + ")").test(format)) {
            format = format.replace(RegExp.$1, RegExp.$1.length == 1 ? o[k] : ("00" + o[k]).substr(("" + o[k]).length));
        }
    }
    return format;
};

//比较日期大小，如果date

function CompareDate(littleDate, bigDate) {
    var d1Year = new Date(littleDate).Format("yyyy");
    var d1Month = new Date(littleDate).Format("MM");
    var d1Day = new Date(littleDate).Format("dd");
    var d1Hour = new Date(littleDate).Format("hh");
    var d1Minu = new Date(littleDate).Format("mm");
    var d1Second = new Date(littleDate).Format("ss");
    var d2Year = new Date(bigDate).Format("yyyy");
    var d2Month = new Date(bigDate).Format("MM");
    var d2Day = new Date(bigDate).Format("dd");
    var d2Hour = new Date(bigDate).Format("hh");
    var d2Minu = new Date(bigDate).Format("mm");
    var d2Second = new Date(bigDate).Format("ss");
    //alert(d1Year);
    //alert(d1Month);
    //alert(d1Day);
    //alert(d1Hour);
    //alert(d1Minu);
    //alert(d1Second);
    //alert(d2Year);
    //alert(d2Month);
    //alert(d2Day);
    //alert(d2Hour);
    //alert(d2Minu);
    //alert(d2Second);


    if (d2Year > d1Year || (d2Year == d1Year && d2Month > d1Month) || (d2Year == d1Year && d2Month == d1Month && d2Day > d1Day) || (d2Year == d1Year && d2Month == d1Month && d2Day == d1Day && d2Hour > d1Hour) || (d2Year == d1Year && d2Month == d1Month && d2Day == d1Day && d2Hour == d1Hour && d2Minu > d1Minu) || (d2Year == d1Year && d2Month == d1Month && d2Day == d1Day && d2Hour == d1Hour && d2Minu == d1Minu && d2Second > d1Second)) {
        return true;
    } else
        return false;
}

function sleep(numberMillis) {
    var now = new Date();
    var exitTime = now.getTime() + numberMillis;
    while (true) {
        now = new Date();
        if (now.getTime() > exitTime) return;
    }
}

