$( document ).ready(function() {        
    var star = parseInt($('input#star').val());
    
    for(var i= 0; i < star; i++ ){
        $('.starrr').find('i:nth('+i+')').removeClass("icon-star-empty").addClass("icon-star");   
    }
})