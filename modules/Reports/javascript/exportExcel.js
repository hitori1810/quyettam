/**
* HB
* 21-10-2014
* Xu ly Export phia Client, su dung JQuery Library
* 
*/
function exportExcel(){
	console.log('Export Excel !')
    $("#report_results").btechco_excelexport({
        containerid		: "report_results",
        datatype		: $datatype.Table,
        worksheetName	: jQuery("div.moduleTitle h2:first-child").text(),
        filename		: 'report',
    });    
}
/**
* HB 
* 21-10-2014
* Xu ly Export tren phia Server + sử dụng PHP Excel
*/
function exportExcel2(){

    var htmltable = $("#report_results").clone();
    htmltable.find("script,noscript,style").remove();
    htmltable.find("input#expandAllState").remove();
    htmltable.find("input#expandCollapse").remove();
    htmltable.find("br,p").remove(); 
    jQuery.ajax({  //Make the Ajax Request
        type: "POST",
        //async: false,  
        url: "index.php?module=Reports&action=exportExcel&sugar_body_only=true",
        data: {
            htmltable: htmltable.html(),
        } ,

        success: function(data){  
            alert("OK")
        }  

    });//end Ajax

}




