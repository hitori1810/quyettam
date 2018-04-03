//  Add By Trung Nguyen 2015.02.07
$(document).ready(function() { 
    var this_description;
    //trigger when click description
    $('.description').live('click',function(){
        this_description = $(this);
        $('#modal-1').fadeIn( "slow");
        $('.md-overlay').show();
        $('#popupDescription').val(this_description.val());
        $('#popupDescription').focus();
    });

    $('#imgDescription').live('click', function(){
        this_description = $(this).parent().find('#tmp_description');
        $('#modal-1').fadeIn( "slow");
        $('.md-overlay').show();
        $('#popupDescription').val(this_description.val());
        $('#popupDescription').focus();
    });

    $('#btnOKDescription').live('click', function(){
        $('#modal-1').fadeOut( "slow");
        $('.md-overlay').hide();
        this_description.val($('#popupDescription').val());
    });

    $('.md-overlay').live('click', function(){
        $('#modal-1').fadeOut( "slow")
        $('.md-overlay').hide();
    });



    setInterval( tongleAlertImage , 500);

    // add by Trung Nguyen at 2015.02.07 : fill project task when change project
    $('select.project_id').live('change',function(){        
        var thisSelect = $(this);     
        // debugger;       
        var project_id = thisSelect.val();
        thisSelect.closest('tr').find('select.project_task_id').parent().append('<img src="themes/default/images/loading.gif" id="img_loading" align="absmiddle" width="20px">');
        if(project_id == '') {
            thisSelect.closest('tr').find('select.project_task_id').html("<option value='' > - None - </option>");
            thisSelect.closest('tr').find('select.project_task_id').select2('val',''); 
        }  else {
            jQuery.ajax({
                url: 'index.php?module=C_WorkLog&action=ajaxLoadData&sugar_body_only=true',
                type:'POST',
                async : false,
                data: {
                    project_id:project_id,
                    type:'getTask',
                },
                success:function(data){
                    if(data != "null"){
                        thisSelect.closest('tr').find('select.project_task_id').html(data);                     
                    }
                    else{
                        thisSelect.closest('tr').find('select.project_task_id').html("<option value='' > - None - </option>");
                        alert ("No task for this project!");
                    } 
                    thisSelect.closest('tr').find('select.project_task_id').select2('val','');               
                }
            });      
        }    
        thisSelect.parent().find('select.project_task_id').trigger('change');
        jQuery("#img_loading").remove();
    });

    //Trung Nguyen 2015.02.07 :trigger for add row button
    $('.btnAddRow').on('click',function(){
        var project_id = $('select#project_id').val();
        var project_task_id = $('select#project_task_id').val();
        var hour = Number($('select#hour').val());
        var minute = Number($('select#minute').val());
        var description = $('#tmp_description').val();
        if(project_id == '') {
            alert(SUGAR.language.get('C_WorkLog','LBL_PROJECT_WARNING'));
            return false;
        } else if(project_task_id == '') {
            alert(SUGAR.language.get('C_WorkLog','LBL_PROJECT_TASK_WARNING'));
            return false;
        } else if (hour + minute <= 0) {
            alert(SUGAR.language.get('C_WorkLog','LBL_SPENTTIME_WARNING'));
            return false;               
        } else if (description == '') {
            alert(SUGAR.language.get('C_WorkLog','LBL_DESCRIPTION_WARNING'));
            return false; 
        }
        addRow('',project_id,'',project_task_id,'',hour,minute,0,description,'0',true); 
        $('#tmp_description').val('') ;
    });
    //Trung Nguyen 2015.02.07 :trigger for del row button
    $('.delRow').live('click',function(){ 
        var table = $(this).closest('tbody');
        if($(this).closest('tr').find('.worklog_id').val()!='') {
            $(this).closest('tr').find('.deleted').val('1');     
            $(this).closest('tr').hide();
            $(this).closest('tr').attr('class','hiderow');        
        } else {
            $(this).closest('tr').remove();
        } 
        $('#total_day').html(calculatorHour(table));      
    }); 
    //Trung Nguyen 2015.02.07 : when change value of hour,minute, calculator total spend time of this day
    $('table#timesheets .hour, table#timesheets .minute').live('change',function(){
        var table = $(this).closest('tbody');
        $('#total_day').html(calculatorHour(table));  
    });
    //Trung Nguyen 2015.02.09 : trigger when click overtime checkbox
    $('.overtime').live('change',function(){
        var overtime = ($(this).is(':checked')?1:0);
        $(this).parent().find('input[name="overtime[]"]').val(overtime); 
    });
    //Trung Nguyen 2015.02.09 : trigger when click button save
    jQuery('#btnSave').live('click', function() {
        //$('body').prepend(getCleanDeskhopHtml("Saving <br/> data"));
        // $('.timecard-popup').show();      
        if(!checkDataLogwork()){
            // $('.timecard-popup').remove();
            return;       
        } else{   
            var form = jQuery("#EditView");
            jQuery("#result").html('<img src="themes/default/images/loading.gif" align="absmiddle">&nbsp;Saving data...');
            jQuery.ajax({  //Make the Ajax Request
                url: "index.php?module=C_WorkLog&action=Save&sugar_body_only=true",
                type: "POST", 
                async: false, 
                data: form.serialize(),
                error: function(){
                    alert( "AJAX - error()" ); 
                    //$('.timecard-popup').remove();
                },  
                success: function(data){ 
                    data = jQuery.parseJSON(data);
                    if(data.success){  
                        $('table#timesheets tbody').html('');
                        index = 0;
                        for(i = 0; i < data.detail; i++){
                            addRow(data[i].id,data[i].project_id,data[i].project_name,data[i].task_id,data[i].task_name, data[i].hour, data[i].minute,data[i].overtime, data[i].description, 0, false);
                        }
                        $('span#total_month').text(data.total_month);
                        resetWoklLogDayToCalendar();
                    } else {

                    }
                    jQuery("#result").html(data.msg);
                    alert(data.alerts); 
                    // $('.timecard-popup').remove();
                } 
            });
        } 
        return false;
    });

    $('.ui-datepicker-prev, .ui-datepicker-next').live('click',function(){
        // alert(1);
        if($(this).attr('class').indexOf('ui-state-disabled') >= 0){
            return false;
        }
        var click = '+0';
        if($(this).attr('class').indexOf('ui-datepicker-prev') >= 0){
            click = '-1';
        } else {
            click = '+1';
        }
        loadTotalMonth(click) ;
    }) ;
});

//Trung Nguyen 2015.02.10 function load ajax when click button prev, next
function loadTotalMonth(click) { 
    $('#total_month').html('<img src="themes/default/images/loading.gif" width = "17px" align="absmiddle">'); 

    jQuery.ajax({  //Make the Ajax Request
        url: "index.php?module=C_WorkLog&action=ajaxLoadData&sugar_body_only=true",
        type: "POST", 
        async: false, 
        data: {
            type:'getMonthTotal',
            click:click,
            month:$('#apply_date_month').val(),
            year:$('#apply_date_year').val()
        },                 
        success: function(data){ 
            data = jQuery.parseJSON(data);
            if(data.success){  
                $('#total_month').html(data.total_month);
                $('#apply_date_month').val(data.month);
                $('#apply_date_year').val(data.year);
            } 
        } 
    });
}

function tongleAlertImage()
{
    if($('#imgAlert').css( "visibility" ) == "visible"){
        $('#imgAlert').css( 'visibility', 'hidden' );
    } else {
        $('#imgAlert').css( 'visibility', 'visible' );
    }
}

//Trung Nguyen 2015.02.07 : add row for detail
function addRow(id,project_id,project_name,task_id,task_name, hour, minute,overtime, description, deleted, is_new) {
    var tabel = $('table#timesheets tbody');
    index++;
    overtime = Number(overtime);
    if(is_new) {
        var row = "";
        row += "<tr class='displayrow' id='tr"+index+"'> ";     
        row += "<td class='center'><select id = 'project_id_"+index+"' name = 'project_id[]' class = 'project_id' style ='width:90%'> " + $('select#project_id').html() + " </select> </td>";
        row += "<td class='center'><select id = 'project_task_id_"+index+"' name='project_task_id[]' class = 'project_task_id' style ='width:90%'>"+ ($('select#project_task_id').html()) + "</select> </td> ";
        row += "<td class='center' nowrap><select id='hour_"+index+"'' name='hour[]' class = 'hour' style='width:50px'>"+$('select#hour').html()+"</select>"+
        "<select id='minute_"+index+"'' name='minute[]' class = 'minute' style='width:60px'>"+$('select#minute').html()+"</select></td> ";           
        row += "<td class='center'><input type='checkbox' class = 'overtime' value = '1' id = 'checkbox_"+index+"' "+(overtime?"checked":"") +" />"+
        "<input type='hidden' name='overtime[]' value = '"+overtime+"'/> </td>";
        row += "<td class='center'><input type='text' style = 'width:180px;' class = 'description' name = 'description[]' id = 'description_"+index+"' value = '"+description+"' /></td>";
        row += "<td class='center'><input type='button' class = 'delRow' value = 'Delete' />";
        row += "<input type = 'hidden' value = '"+deleted+"' class = 'deleted' name = 'deleted[]' /> ";
        row += "<input type = 'hidden' value = '"+id+"' class = 'worklog_id' name = 'worklog_id[]' /></td> ";
        row +="</tr>";        
        tabel.append(row);
        $("select#project_id_"+index).val(project_id);
        $("select#project_task_id_"+index).val(task_id);
        $("select#hour_"+index).val(hour);
        $("select#minute_"+index).val(minute);
        tabel.find('tr#tr'+index+' select').select2();
    } else {
        var row = "";
        row += "<tr class='displayrow' id='tr"+index+"'> ";     
        row += "<td class='center'><input type='hidden' id = 'project_id_"+index+"' name = 'project_id[]'  value = '"+project_id+"' class = 'project_id' style ='width:1px' /> " +
        " <span id='project_name_"+index+"' class = 'project_name' >"+project_name+"</span> </td>";
        row += "<td class='center'><input type='hidden' id = 'project_task_id_"+index+"' name = 'project_task_id[]'  value = '"+task_id+"' class = 'project_task_id' style ='width:1px' /> " +
        " <span id='project_task_name_"+index+"' class = 'project_task_name' >"+task_name+"</span> </td>";
        row += "<td class='center' nowrap><select id='hour_"+index+"'' name='hour[]' class = 'hour' style='width:50px'>"+$('select#hour').html()+"</select>"+
        "<select id='minute_"+index+"'' name='minute[]' class = 'minute' style='width:60px'>"+$('select#minute').html()+"</select></td> ";           
        row += "<td class='center'><input type='checkbox' class = 'overtime' value = '1' id = 'checkbox_"+index+"' "+(overtime?"checked":"") +" />"+
        "<input type='hidden' name='overtime[]' value = '"+overtime+"'/> </td>";
        row += "<td class='center'><input type='text' style = 'width:180px;' class = 'description' name = 'description[]' id = 'description_"+index+"' value = '"+description+"' /></td>";
        row += "<td class='center'><input type='button' class = 'delRow' value = 'Delete' />";
        row += "<input type = 'hidden' value = '"+deleted+"' class = 'deleted' name = 'deleted[]' /> ";
        row += "<input type = 'hidden' value = '"+id+"' class = 'worklog_id' name = 'worklog_id[]' /></td> ";
        row +="</tr>";        
        tabel.append(row);       
        $("select#hour_"+index).val(hour);
        $("select#minute_"+index).val(minute);
        tabel.find('tr#tr'+index+' select').select2(); 
    } 

    $('#total_day').html(calculatorHour(tabel));      
}


//Trung Nguyen 2015.02.07 function calculator hour of timesheet.
function calculatorHour(table){      
    var total_sendtime = 0;          
    table.find('tr.displayrow').each(function(){
        total_sendtime += Number($(this).find('select.hour').val() );
        total_sendtime += Number($(this).find('select.minute').val())/60;
    });    
    return total_sendtime.toFixed(2);
}

//Trung Nguyen 2015.02.09 function check data work log before save
function checkDataLogwork() {
    var tabel = $('table#timesheets tbody');
    var flag = 1;
    var spent_time = 0;
    tabel.find('tr.displayrow').each(function(){
        if(!flag) return false;
        var thisRow = $(this);
        var project_id = thisRow.find('[name="project_id[]"]').val();
        var project_task_id = thisRow.find('[name="project_task_id[]"]').val();
        var hour = Number(thisRow.find('[name="hour[]"]').val());
        var minute = Number(thisRow.find('[name="minute[]"]').val());
        var description = thisRow.find('[name="description[]"]').val();
        if(project_id == '') {
            alert(SUGAR.language.get('C_WorkLog','LBL_PROJECT_WARNING'));
            flag = 0;
        } else if(project_task_id == '') {
            alert(SUGAR.language.get('C_WorkLog','LBL_PROJECT_TASK_WARNING'));
            flag = 0;
        } else if (hour + minute <= 0) {
            alert(SUGAR.language.get('C_WorkLog','LBL_SPENTTIME_WARNING'));
            flag = 0;               
        } else if (description == '') {
            alert(SUGAR.language.get('C_WorkLog','LBL_DESCRIPTION_WARNING'));
            flag = 0;
        }
        spent_time += hour + minute/60;
        if( spent_time>24 ) {
            alert(SUGAR.language.get('C_WorkLog','LBL_SPENTTIME_24H_WARNING'));
            flag = 0;
        }
    });

    return flag;
}
// Trung Nguyen 2015.02.09 check type of worklog day for add to calendar.
function resetWoklLogDayToCalendar() {
    var tabel = $('table#timesheets tbody');
    var date =  $("#apply_date").val();
    var row = tabel.find('tr.displayrow').length;
    var flag = tabel.find('tr.displayrow .overtime:checked').length;
    if(row) {
        if(flag) {
            jQuery('#datepicker').multiDatesPicker('removeDates', date, 'logwork_date');
            jQuery('#datepicker').multiDatesPicker('addDates', date, 'overtime_date');
        } else {
            jQuery('#datepicker').multiDatesPicker('removeDates', date, 'overtime_date');
            jQuery('#datepicker').multiDatesPicker('addDates', date, 'logwork_date');
        }
    }  else {
        jQuery('#datepicker').multiDatesPicker('removeDates', date, 'logwork_date');
        jQuery('#datepicker').multiDatesPicker('removeDates', date, 'overtime_date');
    } 
}