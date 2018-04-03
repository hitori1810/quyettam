//        debugger;
//$("#tour_policy").find("iframe").load(function() {
//    //debugger;
//    //    frame = $("#tour_details").find("iframe");
//    //    var state = frame.contentWindow.document.readyState;
//        checkIframeLoaded();           
//
//});
//
//
//
//function checkIframeLoaded() {
//    try {
//        var detail_height = $("#tour_details").find("iframe").contents().height();
//        $("#tour_details").find("iframe").css('height',detail_height + 'px' );
//        var policy_height = $("#tour_policy").find("iframe").contents().height();
//        $("#tour_policy").find("iframe").css('height', policy_height + 'px' );
//
//        if (detail_height >= 0 && policy_height >= 0) return;
//        window.setTimeout(checkIframeLoaded(), 500);
//    }
//    catch(err) {
//        window.setTimeout(checkIframeLoaded(), 500);
//    }
//
//} 
//
//   