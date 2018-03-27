{{assign var="day" value=$displayParams.key|cat:'_day_dob'}}
{{assign var="month" value=$displayParams.key|cat:'_month_dob'}}
{{assign var="year" value=$displayParams.key|cat:'_year_dob'}}

{if $fields.{{$day}}.value == '00' && $fields.{{$month}}.value == '00'}
<span name="select_birthday">{$fields.{{$year}}.value}</span>
{elseif $fields.{{$month}}.value == '00' && $fields.{{$day}}.value != '00'}
<span name="select_birthday">{$fields.{{$year}}.value}</span>
{elseif $fields.{{$month}}.value != '00' && $fields.{{$day}}.value == '00'}
<span name="select_birthday">{$fields.{{$month}}.value|date_format:"%B"} {$fields.{{$year}}.value}</span>
{else}
<span name="select_birthday">{$fields.{{$day}}.value} {$fields.{{$month}}.value|date_format:"%B"} {$fields.{{$year}}.value}</span>
{/if}