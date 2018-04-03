/*
* MultiDatesPicker v1.6.1
* http://multidatespickr.sourceforge.net/
* 
* Copyright 2011, Luca Lauretta
* Dual licensed under the MIT or GPL version 2 licenses.
*/

var today =  new Date(new Date().getFullYear(),new Date().getMonth(), new Date().getDate());
var js_month_names = SUGAR.language.get('app_list_strings','js_month_names');
var js_day_names = SUGAR.language.get('app_list_strings','js_day_names');
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

        //Trung Nguyen -   2015.02.09 : function load wordlog data of day
        function loadDataOfDate(apply_date) {
            $('table#timesheets tbody').html('');
            jQuery("#result").html('<img src="themes/default/images/loading.gif" width="20" align="absmiddle">&nbsp;Loading data...');
            $.ajax({
                url: 'index.php?module=C_WorkLog&action=ajaxLoadData&sugar_body_only=true',
                type:'POST',
                async : false,
                data: {
                    apply_date:apply_date,
                    date_format:$('input[name=date_format]').val(),
                    type:'getWorkLogData',
                },
                success:function(data){
                    data = jQuery.parseJSON(data);
                    if(data.success){                          
                        index = 0;
                        for(i = 0; i < data.detail; i++){
                            addRow(data[i].id,data[i].project_id,data[i].project_name,data[i].task_id,data[i].task_name, data[i].hour, data[i].minute,data[i].overtime, data[i].description, 0, false);
                        }
                        $('span#total_month').text(data.total_month);                        
                        $('span#total_day').text(data.total_day);                        
                    } else {

                    }
                    jQuery("#result").html(data.msg);             
                }
            }); 
        }
        // end
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
                        is_holiday = $this.multiDatesPicker('gotDate', dateText, 'holiday');
                        is_fullday = $this.multiDatesPicker('gotDate', dateText, 'leave_fulldate');
                        dateObject = $this.multiDatesPicker('dateConvert',dateText,'object',arguments[1].settings.dateFormat);
                        if(is_holiday === false && is_fullday === false && dateObject <= today) {
                            $("#apply_date").val(dateText);                             
                            $("#dis_apply_date").text(js_day_names[dateObject.getDay()] + ', ' + 
                                dateObject.getDate() + ' ' +  js_month_names[dateObject.getMonth()] + ', ' + dateObject.getFullYear());
                            loadDataOfDate.call(this,dateText);
                        }           
                    },
                    beforeShowDay : function(date) {  
                        var $this = $(this);
                        var types = ['picked','overtime_date','logwork_date','holiday','leave_fulldate','leave_halfdate'];
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
                        holiday: [],
                        logwork_date: [],
                        overtime_date:[],  
                        leave_halfdate: [],
                        leave_fulldate: [],
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
    window['DP_jQuery_' + dpuuid] = $;     
})( jQuery );
 


