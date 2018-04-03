$( document ).ready(function() {
    debugger;
    displayFitCategory();
    $("select#category").on("change",function(){
        displayFitCategory();   
    })
});

function displayFitCategory(){
    if ($("select#category").val() == "FIT") {
        $("select#fit_category").show();
        $("label[for='fit_category']").show();
    }
    else {
        $("select#fit_category").hide();
        $("label[for='fit_category']").hide();
    } 
} 