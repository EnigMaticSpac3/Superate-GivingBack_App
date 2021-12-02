
$(function () {
    if (document.cookie.indexOf("visited") >= 0) {
        //Don't open any pop up here... You can do something here
        
        $("#SecondTimeDiv").show();
    }
    else {
        // set a new cookie..
        var cookieExpiry = new Date();
        cookieExpiry.setTime(cookieExpiry.getTime() + (6*3600*1000)); // 6 hours
        document.cookie = "visited=yes; expires=" + cookieExpiry.toGMTString();
        //Do here something...
        $("#WelcomeDiv").show();
    }
});
  