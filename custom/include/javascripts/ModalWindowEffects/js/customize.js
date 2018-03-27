$(document).ready(function() {
    $('#imgDescription').live('click', function(){
        $('#modal-1').fadeIn( "slow");
        $('.md-overlay').show();
        $('#popupDescription').val($('#tmp_description').val());
    });

    $('#btnOKDescription').live('click', function(){
        $('#modal-1').fadeOut( "slow");
        $('.md-overlay').hide();
        $('#tmp_description').val($('#popupDescription').val());
    });

    $('.md-overlay').live('click', function(){
        $('#modal-1').fadeOut( "slow")
        $('.md-overlay').hide();
    });

    setInterval( tongleAlertImage , 500);
});

function tongleAlertImage()
{
    if($('#imgAlert').css( "visibility" ) == "visible"){
        $('#imgAlert').css( 'visibility', 'hidden' );
    } else {
        $('#imgAlert').css( 'visibility', 'visible' );
    }
}