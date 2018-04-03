
function ajaxPostOnLoadingPage() {
    var url = "https://booking.gotadi.com/booking/AirBooking/AirSearch.aspx";
    var sso = new TCSSO(url);
    //IBE Team Comment : Need to remove below line
    //IsLoggedIn();
    sso.airsearch(function (err, res) {
      //  IsLoggedIn();
    });
}

ajaxPostOnLoadingPage();

