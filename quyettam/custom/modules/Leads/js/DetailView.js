$(document).ready(function(){
   var isCreate = $('#create_opportunity').is(':checked'); 
   if(isCreate == false){
       $("#LBL_FIRST_OPPORTUNITY").parent(".detail.view").hide();
   }    
});
    