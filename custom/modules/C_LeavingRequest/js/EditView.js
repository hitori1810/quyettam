
// kiem tra thu 7, cn, pulicday
//alert(1);
function checkEndWenk(){ 
    var flag = false;    
    var date = '';
    var from = cal_date_format.replace('%d','d').replace('%Y','y').replace('%m','m');
    var des = from.substring(1,2);
    var fs = from.split(des);

    jQuery('#leaving tr.displayrow').each(function(){ 
        date = $(this).find("input.dateLeavingPicker").val();
        var ds = date.split(des);
        var remDate = new Date();
        remDate.setYear(ds[fs.indexOf('y')]);
        remDate.setMonth(ds[fs.indexOf('m')]-1);
        remDate.setDate(ds[fs.indexOf('d')]);
        //console.log(remDate) ;
        if (remDate.getDay() == 0 || remDate.getDay() == 6) {
            flag = true;
            return false;
        } else if(jQuery('#datepicker').multiDatesPicker('gotDate',(remDate.getMonth()+1)+"/"+(remDate.getDate())+"/"+(remDate.getFullYear()),'publicday') !== false) {
            flag = true;
            return false;
        }
    }); 
    //alert(flag);
    return flag;
}
//check 8h per day
function check8hour(){
    var flag = false;
    var dates = [];
    var hours = [];
    var j;
    jQuery('#leaving tr.displayrow').each(function(){ 
        var date = $(this).find("input.dateLeavingPicker").val();
        var type = $(this).find("select[name='type_leaving[]']").val();
        var totalhour =  0;
        switch (type) {
            case "fullday": totalhour = 8;break;  
            case "AM": 
            case "PM": totalhour = 4; break;  
            case "AM1":   
            case "AM2":   
            case "PM1":  
            case "PM2": totalhour = 2; break; 
        }               
        j = dates.indexOf(date);
        if(j == -1){
            dates.push(date);           
            hours.push(totalhour);
        } else {
            hours[j] = hours[j] + totalhour;
        }
        if(hours[j] > 8) {
            flag = true;
            return false;
        }
    });   
    return flag;
}

jQuery(document).ready(function(){ 
    //save button process 
    jQuery('#btnSave').live('click', function() {
        $('body').prepend(getCleanDeskhopHtml("Saving <br/> data"));
        // alert(1);
        $('.timecard-popup').show();      
        //leaving_type    = jQuery('.leaving_type:checked').val();
        reson_leaving   = jQuery('#reasons_for_leave').val();
        //date_leaving    = jQuery('#leaving_date').val();/// $('#lbltext').text();  
        count_date  =  jQuery('input[name="date_leaving[]"]').length;
        description     = jQuery('#description').val();

        if(!count_date){
            alert(SUGAR.language.get('Leaving','LBL_LEAVING_DATE_WARNING'));
            $('.timecard-popup').remove();
            return;
        }            
        else if(reson_leaving == ''){
            alert(SUGAR.language.get('Leaving','LBL_LEAVING_REASON_FOR_LEAVE_WARNING'));
            jQuery("#reasons_for_leave").focus();
            $('.timecard-popup').remove();
            return; 
        } else if (checkEndWenk() && !($('#reasons_for_leave').val() == 'Training' || $('#reasons_for_leave').val() == 'BusinessTrip')) {
            alert(SUGAR.language.get('Leaving','LBL_LEAVING_SATURDAY_SUNDAY'));
            $('.timecard-popup').remove();                 
            return;
        } else if (check8hour()) {
            alert(SUGAR.language.get('Leaving','LBL_LEAVING_ERROR_2'));   
            $('.timecard-popup').remove();              
            return;
        } else{   
            //return;              
            var form = jQuery("#EditView");
            jQuery("#result").html('<img src="custom/themes/default/images/loading.gif" align="absmiddle">&nbsp;Saving data...');
            jQuery.ajax({  //Make the Ajax Request
                url: "index.php?module=Leaving&entryPoint=leavingsave&sugar_body_only=true",
                type: "POST", 
                async: false, 
                data: form.serialize(),
                error: function(){
                    alert( "AJAX - error()" ); 
                    $('.timecard-popup').remove();
                },  
                success: function(data){ 
                    data = jQuery.parseJSON(data);
                    if(data.success){  
                        jQuery("#result").html(data.msg);                        
                        jQuery("#record").val(data.id);
                        alert(SUGAR.language.get('Leaving','LBL_LEAVING_REGISTER_SUCCESS'));                            
                        var isEnabled = false;  
                        window.onbeforeunload = function (e) {  
                            if(isEnabled){  
                                var e = e || window.event; 
                                if (e) {  
                                    e.returnValue = 'WHY?';  
                                }  
                                else{  
                                    return 'WHY?';  
                                }  
                            }  
                        } 
                        window.location="index.php?module=Leaving&action=EditView&record="+data.id;
                    } else {
                        jQuery("#result").html(data.msg);
                        alert(data.alerts); 
                    }
                    $('.timecard-popup').remove();
                } 
            });
        } 
        return false;
    });
    $('#btnSaveFull').live('click', function() {
        $('body').prepend(getCleanDeskhopHtml("Saving <br/> data"));
        // alert(1);
        $('.timecard-popup').show();  
        if($('input[name="date_leaving[]"]').length < 1){
            alert('Please chose date for this request!');
            $('.timecard-popup').remove();
            return false;
        }else if (confirm("After save, this recored can not delete or edit.Are you sure to save this record?")) {
            var form = jQuery("#EditView");
            //ajaxStatus.showStatus('Saving...');
            jQuery("#result").html('<img src="custom/themes/default/images/loading.gif" align="absmiddle">&nbsp;Saving data...');
            jQuery.ajax({  //Make the Ajax Request
                url: "index.php?module=Leaving&entryPoint=leavingsave&sugar_body_only=true",
                type: "POST", 
                async: false, 
                data: form.serialize(),
                error: function(){
                    alert( "AJAX - error()" ); 
                    $('.timecard-popup').remove();
                },  
                success: function(data){
                    //  ajaxStatus.hideStatus(); 
                    data = jQuery.parseJSON(data);
                    if(data.success){    
                        alert("Saved successfully! \n\t Total of selected users: " + data.total_request +". \n\t Total of succeded saving users: " + data.total_success + ".");                 
                        // alert(SUGAR.language.get('Leaving','LBL_LEAVING_REGISTER_SUCCESS_2'));                       
                        window.location="index.php?module=Leaving&action=index";
                    } else {
                        jQuery("#result").html(data.msg);
                        alert(data.alerts); 
                    }
                    $('.timecard-popup').remove();
                } 
            });  
            return false;
        }
    });
    $('#btnSaveForUser').live('click', function() {
        $('body').prepend(getCleanDeskhopHtml("Saving <br/> data"));         
        $('.timecard-popup').show();  
        if($('input[name="date_leaving[]"]').length < 1){
            alert('Please chose date for this request!');
            $('.timecard-popup').remove();
            return false;
        }else if (confirm("After save, this recored can not delete or edit.Are you sure to save this record?")) {
            var form = jQuery("#EditView");                     
            jQuery("#result").html('<img src="custom/themes/default/images/loading.gif" align="absmiddle">&nbsp;Saving data...');
            jQuery.ajax({  //Make the Ajax Request
                url: "index.php?module=Leaving&entryPoint=leavingsave&sugar_body_only=true",
                type: "POST", 
                async: false, 
                data: form.serialize(),
                error: function(){
                    alert( "AJAX - error()" ); 
                    $('.timecard-popup').remove();
                },  
                success: function(data){                     
                    data = jQuery.parseJSON(data);
                    if(data.success){    
                        alert("Saved successfully! ");     
                        location.reload();
                    } else {
                        jQuery("#result").html(data.msg);
                        alert(data.alerts); 
                    }
                    $('.timecard-popup').remove();
                } 
            });  
            return false;
        }
    });

    $('#checkall,.company,.department').change(function(){
        var val = $(this).is(':checked');
        var id = $(this).attr('id');
        $('#list .'+id).each(function(){
            $(this).attr('checked',val);
            $(this).trigger('change');
        });
    });
    $('#checkall').attr('checked',true);
    $('#checkall').trigger('change'); 
    $('.hide_show').live('click',function(){
        if($(this).attr('val') == '1'){
            $(this).html('Show   ');
            $(this).closest('tr').next().next().hide(); 
            $(this).parent().find('img').attr('src','custom/themes/default/images/advanced_search.gif');
            $(this).attr('val','0');
        }
        else {
            $(this).html('Hide   ');
            $(this).closest('tr').next().next().show(); 
            $(this).parent().find('img').attr('src','custom/themes/default/images/basic_search.gif');
            $(this).attr('val','1');
        }
    }); 

    $('#user_id').on('change',function(){
        jQuery("#result").html('<img height="19px" src="custom/themes/default/images/loading.gif" align="absmiddle">&nbsp;Loading data...');
        jQuery.ajax({  //Make the Ajax Request
            url: "index.php?module=Leaving&action=process_data&sugar_body_only=true",
            type: "POST", 
            async: true, 
            data: {
                id: $('#user_id').val(),
                type: 'get_remaing',
            },                      
            success: function(data){
                $('#success_message').html(data);   
                jQuery("#result").html('');            
            } 
        });            
    });    
});  

function CheckTableClone(table_id){
    if(table_id == ""){
        table_id = "leaving_line";
    }
    var tables = jQuery("#"+ table_id); 
    tables.each(function(){    
        var chiso = 0;
        jQuery(this).find(" tbody tr").each(function(i) {
            chiso++;
            jQuery(this).find("select,input,span,textarea,button").each(function(){
                var eID = $(this).attr('id');
                var digit = null;
                if(eID != "" && eID != undefined){
                    digit = eID.match(/\d+$/);  
                }

                if(digit != null && !isNaN(digit)){
                    eID_After = eID.replace(digit,chiso); 
                }
                else{
                    eID_After = eID+chiso;
                } 
                jQuery(this).attr('id',eID_After);  
            }); 

        });

    });
}

  
