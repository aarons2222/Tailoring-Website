
(function ( $ ) {
 
    $.fn.edwardCookie = function( options ) {
 
        // Options
        var settings = $.extend({
            style: "dark",
            btnText: "Got it!",
            policyText: "Privacy policy",
            text: "Edward & Ive use cookies to ensure you get the best experience on our website, if you continue to browse you'll be acconsent with our",
            scroll: false,
            expireDays: 30,
            link: "privacy.php"
        }, options );
        
        // Html
        var edwardHtml = "<div class='edwardCookieConsent edwardIn'><p>"+settings.text+" "+"<a alt='"+settings.policyText+"' href='"+settings.link+"' target='_blank'>"+settings.policyText+"</a>.</p><a alt='"+settings.btnText+"' class='edwardBtn'>"+settings.btnText+"</a></div>";
        
        // Different style set up
        if(settings.style == "light"){
            var color = "#424242";
            var bg = "#f6f6f6"
        } else {
            var color = "#fff"
            var bg = "rgba(96, 96, 96, 0.8);"
        };
        
        //CSS
        var edwardCss = "<!-- edward Cookie Consent CSS -->"+'<style>@-webkit-keyframes edwardIn{from{-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0);visibility:visible}to{-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}}@keyframes edwardIn{from{-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0);visibility:visible}to{-webkit-transform:translate3d(0, 0, 0);transform:translate3d(0, 0, 0)}}.edwardIn{-webkit-animation-name:edwardIn;animation-name:edwardIn}@-webkit-keyframes edwardOut{from{opacity:1}to{opacity:0;-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0)}}@keyframes edwardOut{from{opacity:1}to{opacity:0;-webkit-transform:translate3d(0, 100%, 0);transform:translate3d(0, 100%, 0)}}.edwardOut{-webkit-animation-name:edwardOut;animation-name:edwardOut}.edwardCookieConsent{position:fixed;left:0;right:0;bottom:0;overflow:hidden;width:100%;background:'+bg+' none repeat scroll 0 0;color:'+color+';box-sizing:border-box;padding:15px 20px;vertical-align:middle;z-index:999;display:inline-block;-webkit-animation-duration:1s;animation-duration:1s;-webkit-animation-fill-mode:both;animation-fill-mode:both}.edwardCookieConsent p{display:inline-block;vertical-align:middle;font-size:1em;width:80%;float:left; margin-top:.7em}.edwardCookieConsent p a{color:#f85c37;vertical-align:middle;font-size:1em}.edwardCookieConsent .edwardBtn{float:right;font-size:0.8em;text-decoration:none;border:1px solid #f85c37;text-align:center;padding:10px 8px 9px 8px;cursor:pointer;cursor:hand;line-height:21px !important;position:relative;border-radius:5px;overflow:hidden;display:inline-block;word-wrap:break-word;background-color:transparent;color:#fff;border-color:#f85c37;font-size:0.8em;padding-left:10px;padding-right:10px;width:auto;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;vertical-align:middle;-webkit-tap-highlight-color:rgba(255,255,255,0);tap-highlight-color:rgba(255,255,255,0)}.edwardCookieConsent .edwardBtn:hover{background-color:transparent;border-color:#ffffff;color:#f85c37;text-decoration:none;outline:none}.edwardCookieConsent .edwardBtn:focus{text-decoration:none;outline:none}.edwardCookieConsent .edwardBtn:active{background-color:transparent;border-color:#f85c37;color:#fff;padding-top:13px;padding-bottom:6px}@media all and (max-width:1000px){.edwardCookieConsent p{width:66%;font-size:0.8em}.edwardCookieConsent .edwardBtn{padding:9px 8px 8px 8px}.edwardCookieConsent .edwardBtn:active{padding-top:12px;padding-bottom:5px}}@media all and (max-width:500px){.edwardCookieConsent{text-align:center}.edwardCookieConsent p{width:100%;float:none;text-align:left;font-size:0.8em}.edwardCookieConsent .edwardBtn{float:none;margin-top:10px;padding:6px 8px 5px 8px}.edwardCookieConsent .edwardBtn:active{padding-top:9px;padding-bottom:2px}}</style>';
        
        // Set localStorage
        var edwardName = "edwardCookie"+"_"+window.location.hostname;
        var edwardStorage = JSON.parse(localStorage.getItem(edwardName));
        var edwardActualDate = Math.floor((new Date()).getTime() / 1000);
        
        // Open functions
        if(edwardStorage == null || edwardStorage.consens != true || edwardStorage.expireTime < edwardActualDate){
            $("body").append(edwardHtml), $("html").append(edwardCss);
        }
        
        
        // Close functions
        $(".edwardBtn").click(closeedward);
        if(settings.scroll == true) {
            $(window).scroll(closeedward);
        }
        
        function closeedward() {
            // Set localStorage
            var edwardExpireDate = (edwardActualDate+(settings.expireDays*86400));
            var edwardJson = {consens : true, expireTime : edwardExpireDate};
            localStorage.setItem(edwardName, JSON.stringify(edwardJson));
            
            // Remove the Obj
            $(".edwardCookieConsent").removeClass("edwardIn").addClass("edwardOut");
            setTimeout(
                function() {
                    $(".edwardCookieConsent").remove();
                },
            1001);
        }
        
        // Set console error
        if(settings.style != "dark" && settings.style != "light") {
            console.error('edwardCookie: Invalid "style" option. Use "dark" or "light".');
        }
        if(typeof settings.scroll != "boolean") {
            console.error('edwardCookie: Invalid "scroll" option. Use a boolean value.');
        }
        if(isNaN(settings.expireDays)) {
            console.error('edwardCookie: Invalid "expireDays" option. Use a number.');
        }
        
    };
    
}(jQuery));
