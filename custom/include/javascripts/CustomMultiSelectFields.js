/*
* Customize Multi Select Fields Effect For All Modules + Report
* Author: Luc Dang
* Date: 06-03-2015
*/
$(document).ready(function () {
    // Init for basic search form
    SUGAR.util.doWhen(function () {
        return ($('input[name="searchFormTab"]').val() == 'basic_search');
    }, function () {
        initMultipleSelectFields();
    });

    // Init for advanced search form
    SUGAR.util.doWhen(function () {
        return ($('input[name="searchFormTab"]').val() == 'advanced_search');
    }, function () {
        initMultipleSelectFields();
    });


});

function initMultipleSelectFields() {
    // Handle Multi Select
    $('.search_form').find('select[multiple]').not($('#display_tabs')).not($('#hide_tabs')).multipleSelect({filter: true});
    // Handle clear button
    $('.search_form').find('input[name="clear"]').live('click', function () {
        $('.search_form').find('select[multiple]').next().find('span').text("");
    });


    // Show Selected options when hover on multipleFields
    $(".search_form select[multiple]").next().find('span').hover(function () {
        var title = $(this).text();
        $(this).attr('title', title);
    }, function () {
    });
    
    // Auto focus on the search field when the multiple fields are clicked
    $('.search_form').find('.ms-parent').live('click', function(){
        $(this).find('.ms-search').find('input').focus();
    });
}
