/*
* MultiDatesPicker v1.6.1
* http://multidatespickr.sourceforge.net/
* 
* Copyright 2011, Luca Lauretta
* Dual licensed under the MIT or GPL version 2 licenses.
*/
var index = 0;
var today =  new Date(new Date().getFullYear(),new Date().getMonth(), new Date().getDate());
(function( $ ){
    $.extend($.ui, { multiDatesPicker: { version: "1.6.1" } });

    $.fn.multiDatesPicker = function(method) {
        var mdp_arguments = arguments;
        var ret = this;
        var today_date = new Date();
        var day_zero = new Date(0);

        var mdp_events = {};
        var month_names = new Array ( ); 
        month_names[0] = 'Jan';
        month_names[1] = 'Feb';
        month_names[2] = 'Mar';
        month_names[3] = 'Apr';
        month_names[4] = 'May';
        month_names[5] = 'Jun';
        month_names[6] = 'Jul';
        month_names[7] = 'Aug';
        month_names[8] = 'Sep';
        month_names[9] = 'Oct';
        month_names[10] = 'Nov';
        month_names[11] = 'Dec';

        function removeDate(date, type) {
            datetmp  = date;
            if(!type) type = 'picked';           
            for(var i in this.multiDatesPicker.dates[type])
                if(!methods.compareDates(this.multiDatesPicker.dates[type][i], date))
                    return this.multiDatesPicker.dates[type].splice(i, 1).pop(); 
        }
        function removeIndex(index, type) {
            if(!type) type = 'picked';
            return this.multiDatesPicker.dates[type].splice(index, 1).pop();
        }
        function addDate(date, type, no_sort) {
            datetmp = date;
            if(!type) type = 'picked';             
            //alert(type + ' : ' + date + ' : ' + no_sort);
            if (methods.gotDate.call(this, date, type) === false) {
                this.multiDatesPicker.dates[type].push(date);
                if(!no_sort) this.multiDatesPicker.dates[type].sort(methods.compareDates);               
            }
        }

        function sortDates(type) {
            if(!type) type = 'picked';
            this.multiDatesPicker.dates[type].sort(methods.compareDates);
        }
        function dateConvert(date, desired_type, date_format) {
            if(!desired_type) desired_type = 'object';
            return methods.dateConvert.call(this, date, desired_type, date_format);
        }

        var methods = {
            init : function( options ) {
                var $this = $(this);
                this.multiDatesPicker.changed = false;  
                var mdp_events = {
                    beforeShow: function(input, inst) {
                        this.multiDatesPicker.changed = false;
                        if(this.multiDatesPicker.originalBeforeShow) 
                            this.multiDatesPicker.originalBeforeShow.call(this, input, inst);
                    },
                    onSelect : function(dateText, inst) {
                        if(status=='pending' && $('#is_plan').val() == 0) {
                            // debugger;
                            if($('input[name=leaving_type]').val() == 'fullleaving'){
                                addRow2($('#leaving2 tbody'),dateText); 
                            } else if($('input[name=leaving_type]').val() == 'createForUser'){
                                addRow3($('#leaving tbody'),dateText,$('#type_leave_of_date').val()); 
                            }  else {  
                                var ds = dateText.split('/');                                 
                                var d = new Date(ds[2],ds[0]-1,ds[1]);
                                if( d < allow_date){
                                    return false;
                                }                                                
                                addRow($('#leaving tbody'),dateText,$('#type_leave_of_date').val()); 
                            }                                                                             
                            var $this = $(this);
                            this.multiDatesPicker.changed = true;
                            if (dateText) {
                                $this.multiDatesPicker('toggleDate', dateText);                            
                            }
                            if (this.multiDatesPicker.mode == 'normal' && this.multiDatesPicker.dates.picked.length > 0 && this.multiDatesPicker.pickableRange) {
                                var min_date = this.multiDatesPicker.dates.picked[0],
                                max_date = new Date(min_date.getTime()); 
                                methods.sumDays(max_date, this.multiDatesPicker.pickableRange-1);  

                                if(this.multiDatesPicker.adjustRangeToDisabled) {
                                    var c_disabled, 
                                    disabled = this.multiDatesPicker.dates.disabled.slice(0);
                                    do {
                                        c_disabled = 0;
                                        for(var i = 0; i < disabled.length; i++) {
                                            if(disabled[i].getTime() <= max_date.getTime()) {
                                                if((min_date.getTime() <= disabled[i].getTime()) && (disabled[i].getTime() <= max_date.getTime()) ) {
                                                    c_disabled++;
                                                }
                                                disabled.splice(i, 1);
                                                i--;
                                            }
                                        }
                                        max_date.setDate(max_date.getDate() + c_disabled);
                                    } while(c_disabled != 0);
                                }

                                if(this.multiDatesPicker.maxDate && (max_date > this.multiDatesPicker.maxDate)) max_date = this.multiDatesPicker.maxDate;

                                $this.datepicker("option", "minDate", min_date).datepicker("option", "maxDate", max_date);
                            } else {
                                $this.datepicker("option", "minDate", this.multiDatesPicker.minDate).datepicker("option", "maxDate", this.multiDatesPicker.maxDate);
                            } 
                            if(this.tagName == 'INPUT') { // for inputs
                                $this.val($this.multiDatesPicker('getDates', 'string'));
                            }

                            if(this.multiDatesPicker.originalOnSelect && dateText){
                                this.multiDatesPicker.originalOnSelect.call(this, dateText, inst);
                            }  
                            // thanks to bibendus83 -> http://sourceforge.net/tracker/?func=detail&atid=1495384&aid=3403159&group_id=358205
                            if ($this.datepicker('option', 'altField') != undefined && $this.datepicker('option', 'altField') != "") {
                                $($this.datepicker('option', 'altField')).val(
                                    $this.multiDatesPicker('getDates', 'string')
                                );
                            }  
                        }  
                    },
                    beforeShowDay : function(date) {  
                        var $this = $(this);
                        var types = ['picked','approval','cancel','notapproval','publicday','other_approval','other_pending'];
                        var type = '';
                        var i = 0;
                        for (i = 0; i < types.length; i++) {
                            if($this.multiDatesPicker('gotDate', date, types[i]) !== false) {
                                type = types[i];
                                break;
                            }
                        }                          
                        isDisabledCalendar = $this.datepicker('option', 'disabled'),
                        isDisabledDate = $this.multiDatesPicker('gotDate', date, 'disabled') !== false, 
                        areAllSelected = this.multiDatesPicker.maxPicks == this.multiDatesPicker.dates.picked.length;    
                        var custom = [true, ''];
                        if(this.multiDatesPicker.originalBeforeShowDay)
                            custom = this.multiDatesPicker.originalBeforeShowDay.call(this, date);
                        if(type) {
                            var current_class = 'ui-state-'+type;                   
                        }else {
                            var current_class = custom[1];
                        }
                        var selectable_date = !(isDisabledCalendar || isDisabledDate || (areAllSelected && !current_class));
                        return [selectable_date && custom[0], current_class];
                    },
                    onClose: function(dateText, inst) { 
                        if(this.tagName == 'INPUT' && this.multiDatesPicker.changed){
                            $(inst.dpDiv[0]).stop(false,true);
                            setTimeout('$("#'+inst.id+'").datepicker("show")',50);
                        }
                        if(this.multiDatesPicker.originalOnClose) this.multiDatesPicker.originalOnClose.call(this, dateText, inst);
                    }
                };

                if(options) {  
                    this.multiDatesPicker.originalBeforeShow = options.beforeShow;
                    this.multiDatesPicker.originalOnSelect = options.onSelect;
                    this.multiDatesPicker.originalBeforeShowDay = options.beforeShowDay;
                    this.multiDatesPicker.originalOnClose = options.onClose; 
                    $this.datepicker(options);      
                    this.multiDatesPicker.minDate = $.datepicker._determineDate(this, options.minDate, null);
                    this.multiDatesPicker.maxDate = $.datepicker._determineDate(this, options.maxDate, null); 
                    if(options.addDates) methods.addDates.call(this, options.addDates);
                    if(options.addDisabledDates)
                        methods.addDates.call(this, options.addDisabledDates, 'disabled'); 
                    methods.setMode.call(this, options);
                } else { 
                    $this.datepicker();
                } 
                $this.datepicker('option', mdp_events);
                if(this.tagName == 'INPUT') $this.val($this.multiDatesPicker('getDates', 'string'));  
                // Fixes the altField filled with defaultDate by default
                var altFieldOption = $this.datepicker('option', 'altField');
                if (altFieldOption) $(altFieldOption).val($this.multiDatesPicker('getDates', 'string'));
            },
            compareDates : function(date1, date2) {
                date1 = dateConvert.call(this, date1);
                date2 = dateConvert.call(this, date2);                 
                var diff = date1.getFullYear() - date2.getFullYear();
                if(!diff) {
                    diff = date1.getMonth() - date2.getMonth();
                    if(!diff) 
                        diff = date1.getDate() - date2.getDate();
                }
                return diff;
            },
            sumDays : function( date, n_days ) {
                var origDateType = typeof date;
                obj_date = dateConvert.call(this, date);
                obj_date.setDate(obj_date.getDate() + n_days);
                return dateConvert.call(this, obj_date, origDateType);
            },
            dateConvert : function( date, desired_format, dateFormat ) {
                var from_format = typeof date;

                if(from_format == desired_format) {
                    if(from_format == 'object') {
                        try {
                            date.getTime();
                        } catch (e) {
                            $.error('Received date is in a non supported format!');
                            return false;
                        }
                    }
                    return date;
                } 
                var $this = $(this);
                if(typeof date == 'undefined') date = new Date(0);

                if(desired_format != 'string' && desired_format != 'object' && desired_format != 'number')
                    $.error('Date format "'+ desired_format +'" not supported!');

                if(!dateFormat) {
                    dateFormat = $.datepicker._defaults.dateFormat;  
                    // thanks to bibendus83 -> http://sourceforge.net/tracker/index.php?func=detail&aid=3213174&group_id=358205&atid=1495382
                    var dp_dateFormat = $this.datepicker('option', 'dateFormat');
                    if (dp_dateFormat) {
                        dateFormat = dp_dateFormat;
                    }
                }  
                // converts to object as a neutral format
                switch(from_format) {
                    case 'object': break;
                    case 'string': date = $.datepicker.parseDate(dateFormat, date); break;
                    case 'number': date = new Date(date); break;
                    default: $.error('Conversion from "'+ desired_format +'" format not allowed on jQuery.multiDatesPicker');
                }
                // then converts to the desired format
                switch(desired_format) {
                    case 'object': return date;
                    case 'string': return $.datepicker.formatDate(dateFormat, date);
                    case 'number': return date.getTime();
                    default: $.error('Conversion to "'+ desired_format +'" format not allowed on jQuery.multiDatesPicker');
                }
                return false;
            },
            gotDate : function( date, type ) {   
                if(!type) type = 'picked';
                for(var i = 0; i < this.multiDatesPicker.dates[type].length; i++) {
                    if(methods.compareDates.call(this, this.multiDatesPicker.dates[type][i], date) === 0) {
                        return i;
                    }
                }
                return false;
            },
            //hoc 
            getChanged: function (){
                return this.multiDatesPicker.changed;
            },
            getDates : function( format, type ) {
                if(!format) format = 'string';
                if(!type) type = 'picked';
                switch (format) {
                    case 'object':
                        return this.multiDatesPicker.dates[type];
                    case 'string':
                    case 'number':
                        var o_dates = new Array();
                        for(var i in this.multiDatesPicker.dates[type])
                            o_dates.push(
                                dateConvert.call(
                                    this, 
                                    this.multiDatesPicker.dates[type][i], 
                                    format
                                )
                            );
                        return o_dates;

                    default: $.error('Format "'+format+'" not supported!');
                }
            },
            addDates : function( dates, type ) { 
                if(dates.length > 0) {
                    if(!type) type = 'picked';
                    if(type == 'pending') type = 'picked';
                    switch(typeof dates) {
                        case 'object':
                        case 'array':
                            if(dates.length) {
                                for(var i in dates)
                                    addDate.call(this, dates[i], type, true);
                                sortDates.call(this, type);
                                break;
                            } // else does the same as 'string'
                        case 'string':
                        case 'number':
                            addDate.call(this, dates, type);
                            break;
                        default: 
                            $.error('Date format "'+ typeof dates +'" not allowed on jQuery.multiDatesPicker');
                    } 
                    $(this).datepicker('refresh');                   
                } else {
                    $.error('Empty array of dates received.');
                }
            },
            removeDates : function( dates, type ) {  
                if(!type) type = 'picked';
                var removed = [];
                if (Object.prototype.toString.call(dates) === '[object Array]') {
                    for(var i in dates.sort(function(a,b){return b-a})) {
                        removed.push(removeDate.call(this, dates[i], type));
                    }
                } else {
                    removed.push(removeDate.call(this, dates, type));
                }
                $(this).datepicker('refresh');
                return removed;
            },
            removeIndexes : function( indexes, type ) { 
                if(!type) type = 'picked';
                var removed = [];
                if (Object.prototype.toString.call(indexes) === '[object Array]') {
                    for(var i in indexes.sort(function(a,b){return b-a})) {
                        removed.push(removeIndex.call(this, indexes[i], type));
                    }
                } else {
                    removed.push(removeIndex.call(this, indexes, type));
                }
                $(this).datepicker('refresh');
                return removed;
            },
            resetDates : function ( type ) {
                if(!type) type = 'picked';
                this.multiDatesPicker.dates[type] = [];
                $(this).datepicker('refresh');

            },
            toggleDate : function( date, type ) { 
                if(!type) type = 'picked';    
                switch(this.multiDatesPicker.mode) {
                    case 'daysRange':
                        this.multiDatesPicker.dates[type] = []; // deletes all picked/disabled dates
                        var end = this.multiDatesPicker.autoselectRange[1];
                        var begin = this.multiDatesPicker.autoselectRange[0];
                        if(end < begin) { // switch
                            end = this.multiDatesPicker.autoselectRange[0];
                            begin = this.multiDatesPicker.autoselectRange[1];
                        }
                        for(var i = begin; i < end; i++) 
                            methods.addDates.call(this, methods.sumDays(date, i), type);
                        break;
                    default:
                        if(methods.gotDate.call(this, date) === false) // adds dates
                            methods.addDates.call(this, date, type);                         
                        break;
                }
            }, 
            setMode : function( options ) {

                var $this = $(this);
                if(options.mode) this.multiDatesPicker.mode = options.mode;

                switch(this.multiDatesPicker.mode) {
                    case 'normal':
                    for(option in options)
                    switch(option) {
                        case 'maxPicks':
                        case 'minPicks':
                        case 'pickableRange':
                            case 'adjustRangeToDisabled':
                                this.multiDatesPicker[option] = options[option];
                                break;
                            //default: $.error('Option ' + option + ' ignored for mode "'.options.mode.'".');
                        }
                        break;
                    case 'daysRange':
                    case 'weeksRange':
                    var mandatory = 1;
                    for(option in options)
                    switch(option) {
                        case 'autoselectRange':
                            mandatory--;
                        case 'pickableRange':
                            case 'adjustRangeToDisabled':
                                this.multiDatesPicker[option] = options[option];
                                break;
                            //default: $.error('Option ' + option + ' does not exist for setMode on jQuery.multiDatesPicker');
                        }
                        if(mandatory > 0) $.error('Some mandatory options not specified!');
                        break;
                }                 
                if(mdp_events.onSelect)
                    mdp_events.onSelect();
                $this.datepicker('refresh'); 
            }
        };

        this.each(function() {  
            if (!this.multiDatesPicker) {
                this.multiDatesPicker = {
                    dates: {                        
                        picked: [],
                        approval: [],//hoc bui 
                        notapproval: [],//hoc bui 
                        cancel:[], // hai duc 

                        publicday: [],// Trung Nguyen
                        other_approval: [],// Trung Nguyen
                        other_pending: [],// Trung Nguyen  

                        disabled: [],
                    },
                    mode: 'normal',
                    adjustRangeToDisabled: true
                };
            }

            if(methods[method]) {
                var exec_result = methods[method].apply(this, Array.prototype.slice.call(mdp_arguments, 1));
                switch(method) {
                    case 'getDates':
                    case 'removeDates':
                    case 'gotDate':
                    case 'sumDays':
                    case 'compareDates':
                    case 'dateConvert':
                        ret = exec_result;
                }
                return exec_result;
            } else if( typeof method === 'object' || ! method ) {
                return methods.init.apply(this, mdp_arguments);
            } else {
                $.error('Method ' +  method + ' does not exist on jQuery.multiDatesPicker');
            }
            return false;
        });

        if(method != 'gotDate' && method != 'getDates') {
            aaaa = 1;
        }

        return ret;
    };

    var PROP_NAME = 'multiDatesPicker';
    var dpuuid = new Date().getTime();
    var instActive;

    $.multiDatesPicker = {version: false};
    //$.multiDatesPicker = new MultiDatesPicker(); // singleton instance
    $.multiDatesPicker.initialized = false;
    $.multiDatesPicker.uuid = new Date().getTime();
    $.multiDatesPicker.version = $.ui.multiDatesPicker.version;

    // Workaround for #4055
    // Add another global to avoid noConflict issues with inline event handlers
    window['DP_jQuery_' + dpuuid] = $;

    //alert("end");

})( jQuery );
function addRow2(object,date){
    index ++;
    var ds = date.split('/');  
    var date = cal_date_format.replace('%d', ds[1]);
    date = date.replace('%m', ds[0]);
    date = date.replace('%Y', ds[2]);
    var row = "";
    row += "<tr class='displayrow' id='tr"+index+"'> ";
    row += "<td class='center'><input id = 'date_leaving"+index+"' class='center datePicker dateLeavingPicker' name='date_leaving[]' type='text' readonly = 'true' value = '"+date+"' oval = '"+date+"' />";
    row += "<input type = 'hidden' name = 'id_leaving[]' value = '' class = 'id_leaving' /></td> ";
    row += "<td class='center'><input type='button' class = 'delRow' value = 'Del' />";
    object.append(row);
}
function addRow(object,date,type_detail,sts,idLeving,editDate){ 
    // debugger;
    var is_plan = $('#is_plan').val() != '0';
    index ++;
    if (!idLeving) {
        idLeving = '';
    }
    if (!sts) {
        sts = 'pending';
    }
    if(editDate === false){} 
    else if(!editDate) {
        editDate = true;
    }
    var ds = date.split('/');  
    var date = cal_date_format.replace('%d', ds[1]);
    date = date.replace('%m', ds[0]);
    date = date.replace('%Y', ds[2]);


    //var d3 = new Date(new Date().getFullYear(),new Date().getMonth(), new Date().getDate());
    var d = new Date(ds[2],ds[0]-1,ds[1]);
    var tdd = "";
    //alert(d3<=d);
    if(sts == 'pending' || sts == 'cancel' || sts == 'notapproval' || today > d){
        tdd = "<input type='hidden' name ='status[]' class='status' value = '"+sts+"'/>" +
        "<span><b>"+SUGAR.language.get('app_list_strings','leaving_status_dom')[sts]+"</b></span>";
    } else {
        tdd = "<select id = 'status"+index+"' name ='status[]' class='status' style ='width:100px'>"+getOption(SUGAR.language.get('app_list_strings','leaving_status_dom'),sts) +" </select>"       
    } 
    var dur = 0;  
    switch (type_detail) {
        case "fullday": dur = 8;break;  
        case "AM": 
        case "PM": dur = 4; break;  
        case "AM1":   
        case "AM2":   
        case "PM1":  
        case "PM2": dur = 2; break; 
    }  
    if(is_plan){
        var row2="";
        row2+="<select name='type_leaving[]' class = 'type_leaving' style ='width:150px'>"+ ($('#type_leave_of_date').html()) + "</select> ";
        var row = "";
        row += "<tr class='displayrow' id='tr"+index+"'> ";  
        row += "<td class='center'><input id = 'date_leaving"+index+"' class='center' name='date_leaving[]' type='hidden' readonly = 'true' value = '"+date+"' />";
        row += "<span><b>"+date+"</b></span>";     
        row += "<input type = 'hidden' name = 'id_leaving[]' value = '"+idLeving+"' class = 'id_leaving' /></td> ";
        row += "<td class='center'>"+row2+"</td> ";
        row += "<td class='center'><b><span class = 'duration'>"+dur+" h</span></b></td> ";   
        row += "<td class='center'><select id = 'status"+index+"' name ='status[]' class='status' style ='width:100px'>"+getOption(SUGAR.language.get('app_list_strings','leaving_status_dom_for_plan'),sts) +" </select></td> ";
        row += "<td class='center'><input type = 'hidden' value = '0' class = 'deleled' name = 'deleted[]' /></td> ";
        row +="</tr>";        
        object.append(row);
        $('#leaving tbody tr#tr'+index).find('.type_leaving').each(function(){
            $(this).val(type_detail);
        });         
        $('#leaving tbody tr#tr'+index+' select').select2(); 
    } else if(status == 'pending'){
        var row2="";
        row2+="<select name='type_leaving[]' class = 'type_leaving' style ='width:150px'>"+ ($('#type_leave_of_date').html()) + "</select> ";
        var row = "";
        row += "<tr class='displayrow' id='tr"+index+"'> ";
        if(is_plan){
            row += "<td class='center'><input id = 'date_leaving"+index+"' class='center' name='date_leaving[]' type='hidden' readonly = 'true' value = '"+date+"' />";
            row += "<span><b>"+date+"</b></span>";
        } else {
            row += "<td class='center'><input id = 'date_leaving"+index+"' class='center datePicker dateLeavingPicker' name='date_leaving[]' type='text' readonly = 'true' value = '"+date+"' oval = '"+date+"' />";
        }
        row += "<input type = 'hidden' name = 'id_leaving[]' value = '"+idLeving+"' class = 'id_leaving' /></td> ";
        row += "<td class='center'>"+row2+"</td> ";
        row += "<td class='center'><b><span class = 'duration'>"+dur+" h</span></b></td> ";

        row += "<td class='center'>"+tdd+"</td> ";
        if(today > d ) {
            row += "<td class='center'><input type = 'hidden' value = '0' class = 'deleled' name = 'deleted[]' /></td> ";
        }else {
            row += "<td class='center'><input type='button' class = 'delRow' value = 'Delete' />";
            row += "<input type = 'hidden' value = '0' class = 'deleled' name = 'deleted[]' /></td> ";
        }  
        row +="</tr>";        
        object.append(row);
        $('#leaving tbody tr#tr'+index).find('.type_leaving').each(function(){
            $(this).val(type_detail);
        });         
        $('#leaving tbody tr#tr'+index+' select').select2(); 
    } else { 
        var row2="";
        row2+="<select name='type_leaving[]' class = 'type_leaving' style ='width:150px;display:none;'>"+ ($('#type_leave_of_date').html()) + "</select> ";
        row2+="<b><span class ='stype_leaving center'>"+SUGAR.language.get('app_list_strings','type_leave_of_date')[type_detail]+" </span></b>";                  

        var row = "";
        row += "<tr class='displayrow' id='tr"+index+"'> ";
        row += "<td class='center'><input id = 'date_leaving"+index+"' class='center datePicker dateLeavingPicker' name='date_leaving[]' type='text' readonly = 'true' value = '"+date+"' oval = '"+date+"' />";
        row += "<input type = 'hidden' name = 'id_leaving[]' value = '"+idLeving+"' class = 'id_leaving' /></td> ";
        row += "<td class='center'>"+row2+"</td> ";
        row += "<td class='center'><b><span class = 'duration'>"+dur+" h</span></b></td> ";
        row += "<td class='center'>"+tdd+"</td> ";
        if(today  >d || sts != 'pending') {
            row += "<td class='center'></td> ";
        }else {
            row += "<td class='center'><input type='button' class = 'delRow' value = 'Delete' /><input type = 'hidden' value = '0' class = 'deleled' name = 'deleted[]' /></td> ";
        }
        row +="</tr>";
        object.append(row); 
        $('#leaving tbody tr#tr'+index).find('.type_leaving').each(function(){
            $(this).val(type_detail);
        });         
    }
    $('#leaving tfoot').find('#totalHour').html(getTotalHourAllDay() + ' h');
    if (editDate && !is_plan) {
        $('#date_leaving'+index).each(generateCalendar);
    }
    if(!is_plan)
        $('#status'+index).find('option').each(function(){
            if($(this).val()== 'pending' || $(this).val()=='notapproval'){
                $(this).remove();
            }
        });
    $('#status'+index).select2();
}
function addRow3(object,date,type_detail){   
    index ++;       
    var ds = date.split('/');  
    var date = cal_date_format.replace('%d', ds[1]);
    date = date.replace('%m', ds[0]);
    date = date.replace('%Y', ds[2]);         
    var dur = 0;  
    switch (type_detail) {
        case "fullday": dur = 8;break;  
        case "AM": 
        case "PM": dur = 4; break;  
        case "AM1":   
        case "AM2":   
        case "PM1":  
        case "PM2": dur = 2; break; 
    }    
    var row = "";
    row += "<tr class='displayrow' id='tr"+index+"'> ";     
    row += "<td class='center'><input id = 'date_leaving"+index+"' class='center datePicker dateLeavingPicker' name='date_leaving[]' type='text' readonly = 'true' value = '"+date+"' oval = '"+date+"' />";
    row += "<input type = 'hidden' name = 'id_leaving[]' value = '' class = 'id_leaving' /></td> ";
    row += "<td class='center'><select name='type_leaving[]' class = 'type_leaving' style ='width:150px'>"+ ($('#type_leave_of_date').html()) + "</select> </td> ";
    row += "<td class='center'><b><span class = 'duration'>"+dur+" h</span></b></td> ";           
    row += "<td class='center'><input type='button' class = 'delRow' value = 'Delete' />";
    row += "<input type = 'hidden' value = '0' class = 'deleled' name = 'deleted[]' /></td> ";

    row +="</tr>";        
    object.append(row);
    $('#leaving tbody tr#tr'+index).find('.type_leaving').each(function(){
        $(this).val(type_detail);
    });         
    $('#leaving tbody tr#tr'+index+' select').select2();
    $('#leaving tfoot').find('#totalHour').html(getTotalHourAllDay() + ' h'); 
    $('#date_leaving'+index).each(generateCalendar);      
}
function getOption(list_data,lab,no_option){
    array = [];
    array = list_data;
    if(!no_option){
        no_option = 'no_option';
    }
    var option = "";      
    for(key in array){ 
        if (key == no_option) continue;
        if (key==lab) option += "<option value = '"+key+"' selected>"+array[key]+"</option>"; 
        else option += "<option value = '"+key+"' >"+array[key]+"</option>";   
    }
    return option;
}

function getTotalHourAllDay(){
    //total hour 
    var totalhour = 0;
    //var minutes = 0;
    jQuery('#leaving tr.displayrow').each(function(){
        var type = $(this).find("select[name='type_leaving[]']").val();
        switch (type) {
            case "fullday": totalhour += 8;break;  
            case "AM": 
            case "PM": totalhour += 4; break;  
            case "AM1":   
            case "AM2":   
            case "PM1":  
            case "PM2": totalhour += 2; break; 
        }   
    });   

    return totalhour;  
}

function generateCalendar(){
    var $this = $(this);
    var thisID = $this.attr('id'); 
    $('<span class="dateFormat" style="margin-left: 3px;"><img id="'+thisID+'_trigger" align="absmiddle" border="0" alt="Enter Date" src="themes/Sugar5/images/jscalendar.gif" ></span>').insertAfter($this);
    Calendar.setup ({  inputField : thisID, ifFormat : cal_date_format, showsTime : false, button : thisID+'_trigger', singleClick : true, step : 1  });    
}
function checkDate(date){
    var flag = false;
    var ojc = 'leaving';
    if($('input[name=leaving_type]').length>0){
        ojc = 'leaving2';
    }
    //alert(ojc);
    jQuery('#'+ojc+' tr.displayrow').each(function(){
        var val = $(this).find('input[name="date_leaving[]"]').val();
        if(val==date){
            flag= true;
        }
    });
    return flag;
}
$(document).ready(function(){      
    $('.delRow').live('click',function(){ 
        var date = $(this).closest('tr').find('input[name="date_leaving[]"]').val();  
        if($(this).closest('tr').find('.id_leaving').val()!='') {
            $(this).closest('tr').find('.deleted').val('1');     
            $(this).closest('tr').hide();
            $(this).closest('tr').attr('class','hiderow');        
        } else {
            $(this).closest('tr').remove();
        }
        $('#leaving tfoot').find('#totalHour').html(getTotalHourAllDay() + ' h');
        if(!checkDate(date)) {
            var from = cal_date_format.replace('%d','d').replace('%Y','y').replace('%m','m');
            var des = from.substring(1,2);
            var fs = from.split(des);            
            var ds = date.split(des);
            var remDate = new Date();
            remDate.setYear(ds[fs.indexOf('y')]);
            remDate.setMonth(ds[fs.indexOf('m')]-1);
            remDate.setDate(ds[fs.indexOf('d')]);
            var dateApproval = (remDate.getMonth()+1)+'/'+remDate.getDate()+'/'+ remDate.getFullYear();
            //alert(dateApproval);
            jQuery('#datepicker').multiDatesPicker('removeDates', dateApproval, 'picked');
        }
    }); 
    $('.type_leaving').live('change',function(){ 
        var dur = 0;    
        var type = $(this).val(); 
        switch (type) {
            case "fullday": dur = 8;break;  
            case "AM": 
            case "PM": dur = 4; break;  
            case "AM1":   
            case "AM2":   
            case "PM1":  
            case "PM2": dur = 2; break; 
        }       
        $(this).closest('tr').find('.duration').html(dur + ' h') ;
        $('#leaving tfoot').find('#totalHour').html(getTotalHourAllDay() + ' h');
    }); 

    $(".dateLeavingPicker").live('change',function(){         
        var oldDate = $(this).attr('oval');
        var newDate = $(this).val();

        var from = cal_date_format.replace('%d','d').replace('%Y','y').replace('%m','m');
        var des = from.substring(1,2);
        var fs = from.split(des);       

        if(!checkDate(oldDate)) {
            var ds = oldDate.split(des);
            var remDate = new Date();
            remDate.setYear(ds[fs.indexOf('y')]);
            remDate.setMonth(ds[fs.indexOf('m')]-1);
            remDate.setDate(ds[fs.indexOf('d')]);
            var dateApproval = (remDate.getMonth()+1)+'/'+remDate.getDate()+'/'+ remDate.getFullYear();
            jQuery('#datepicker').multiDatesPicker('removeDates', dateApproval, 'picked');
        }
        var ds = newDate.split(des);
        var addDate = new Date();
        addDate.setYear(ds[fs.indexOf('y')]);
        addDate.setMonth(ds[fs.indexOf('m')]-1);
        addDate.setDate(ds[fs.indexOf('d')]);
        dateApproval = (addDate.getMonth()+1)+'/'+addDate.getDate()+'/'+ addDate.getFullYear();
        jQuery('#datepicker').multiDatesPicker('addDates', dateApproval, 'picked');
        $(this).attr('oval',newDate);
    }) ;

    $('.selector').live('click',function(){
        var tid = $(this).closest('table').attr('id');        
        tid = tid.split('_');
        var thisId = tid[0]+'_'+tid[1];
        $('#'+thisId).trigger('change'); 
    });   
});
