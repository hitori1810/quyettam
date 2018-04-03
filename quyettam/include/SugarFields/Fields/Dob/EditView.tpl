{{assign var="day" value=$displayParams.key|cat:'_day_dob'}}
{{assign var="month" value=$displayParams.key|cat:'_month_dob'}}
{{assign var="year" value=$displayParams.key|cat:'_year_dob'}}
{{assign var="generate" value=$displayParams.generate'}}

<select name="{{$day}}" id="{{$day}}" title="{{$vardef.help}}" style="padding: 5px;" tabindex="{{$tabindex}}"> 
    {html_options options=$fields.{{$day}}.options selected=$fields.{{$day}}.value}
</select>
<select name="{{$month}}" id="{{$month}}" title="{{$vardef.help}}" style="padding: 5px;" tabindex="{{$tabindex}}"> 
    {html_options options=$fields.{{$month}}.options selected=$fields.{{$month}}.value}
</select>
<input type="text" name="{{$year}}" id="{{$year}}" style="width:50px;vertical-align: top;" maxlength='4' value='{$fields.{{$year}}.value}'  {{if !empty($tabindex)}} tabindex="{{$tabindex}}" {{/if}}><span id="date_string"> [d/m/Y]</span>
<input type="hidden" name="{{$generate}}" id="{{$generate}}" value="{$fields.{{$generate}}.value}"> 
{literal}
<script type="text/javascript">
    date_format =  cal_date_format;
    
    SUGAR.util.doWhen(
    function() {
    return $('#{{$year}}').length > 0;
    },function() {
    addToValidateRange('EditView','{{$year}}','int',false,SUGAR.language.get('app_strings','LBL_YEAR'),1600,3000);
    //$('#{{$day}}, #{{$month}}, #{{$year}}').live('change',function(){
    //$('#{{$generate}}').val($('#{{$year}}').val()+'-'+$('#{{$month}}').val()+'-'+$('#{{$day}}').val());
     //});
    $('#{{$day}}').live('change',function(){
        date_format = date_format.replace('%d',$('#{{$day}}').val());
        $('#{{$generate}}').val(date_format); 
    });
    
    $('#{{$month}}').live('change',function(){
        date_format = date_format.replace('%m',$('#{{$month}}').val());
        $('#{{$generate}}').val(date_format); 
    });
    $('#{{$year}}').live('blur',function(){
        date_format = date_format.replace('%Y',$('#{{$year}}').val());
        $('#{{$generate}}').val(date_format); 
    });
    
      
   
        removeFromValidate('EditView','{{$generate}}')
    });
</script>
{/literal}
