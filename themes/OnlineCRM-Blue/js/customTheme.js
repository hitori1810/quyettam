$(document).ready(function(){

    //Collapse and expand panel detailview and editview - Add by MTN: 09/02/2015
    $('.detail.view h4, .edit.view h4').click(function(event){
        event.stopPropagation();
        if($(this).parent().hasClass("expanded")){
            $(this).find('a.collapseLink').trigger( "onclick" );
        } else {
            $(this).find('a.expandLink').trigger( "onclick" );
        }
    });
    $('.detail.view h4 a, .edit.view h4 a').click(function(event){
        event.stopPropagation();
    });
    //END:Collapse and expand panel detailview and editview - Add by MTN: 09/02/2015

    //Collapse and expand supanel - Add by MTN: 09/02/2015
    $('#subpanel_list h3 span').click(function(){
        $(this).find('span').find('a:visible').trigger('onclick');
    })
    //END: Collapse and expand supanel - Add by MTN: 09/02/2015

    //Change color icon search advance in top menu - add by MTN: 09/02/2015
    $('#sugar_spot_search').focus(function(){
        $('#glblSearchBtn .btn-group .searchIconLink').addClass('focusIn');
        $('#glblSearchBtn .btn-group .searchIconLink').removeClass('focusOut');
    })

    $('#sugar_spot_search').focusout(function(){
        $('#glblSearchBtn .btn-group .searchIconLink').addClass('focusOut');
        $('#glblSearchBtn .btn-group .searchIconLink').removeClass('focusIn');
    })
    //END: Change color icon search advance in top menu - add by MTN: 09/02/2015

});