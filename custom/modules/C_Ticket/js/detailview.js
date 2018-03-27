
$( document ).ready(function() {
    // remove "_form.submit();" in onclick of custom delete button

    var onclick = $('#delete').attr('onclick').replace('_form.submit();','');
    
    $('#delete').attr('onclick',onclick);
    
    $('#refund').on('click',function(){
         window.location = "index.php?module=C_Ticket&return_module=C_Ticket&action=EditView&record="+$('.quickEdit').attr('data-record')+"&return_action=DetailView&return_id="+$('.quickEdit').attr('data-record')+"&refunded=1";
    }) ;
})