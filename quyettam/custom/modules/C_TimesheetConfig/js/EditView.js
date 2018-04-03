$(document).ready(function(){
    $('select').select2();
    $('.start_time').live('change',function(){
        var val = $(this).val();

    }) ;
});