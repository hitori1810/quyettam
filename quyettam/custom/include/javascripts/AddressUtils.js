function loadProvinceByCountry(country_value, html_province_element_id, province_value ){
    if(country_value == ''){
        $('#'+html_province_element_id).html('');
    }
    else{
        $.ajax({
            type : 'post',
            url : 'index.php?entryPoint=getProvinceByCountry',
            async : true,
            data : {
                country_value: country_value,
                province_value : province_value,
            },
            success: function(response){
                $('#'+html_province_element_id).html(response); 
            }
        });
    }
}

function loadDistrictByProvince(province_value, html_district_element_id,district_value){
    if(province_value == ''){
        $('#'+html_district_element_id).html('');
    }
    else{
        $.ajax({
            type : 'post',
            url : 'index.php?entryPoint=getDistrictByProvince',
            async : true,
            data : {
                province_value: province_value,
                district_value : district_value,
            },
            success: function(response){
                $('#'+html_district_element_id).html(response); 
            }
        }); 
    }
}

function loadWardByDistrict(district_value, html_ward_element_id,ward_value){
    if(district_value == ''){
        $('#'+html_ward_element_id).html('');
    }
    else{
        $.ajax({
            type : 'post',
            url : 'index.php?entryPoint=getWardByDistrict',
            async : true,
            data : {
                district_value: district_value,
                ward_value : ward_value
            },
            success: function(response){
                $('#'+html_ward_element_id).html(response); 
            }
        });
    }
}

$(document).ready(function(){ 
    if($('input[name="record"]').val() == ''){
        $('select[id *="'+addressFromKey+'"],select[id *="'+addressToKey+'"]').not('select[id *= "country"]').html('');
    }
    else{
        // init address when edit record
        loadProvinceByCountry($('#'+addressFromKey+'_country').val(),addressFromKey+'_city',$('#'+addressFromKey+'_city').val());
        loadDistrictByProvince($('#'+addressFromKey+'_city').val(),addressFromKey+'_district',$('#'+addressFromKey+'_district').val());
        loadWardByDistrict($('#'+addressFromKey+'_district').val(),addressFromKey+'_state',$('#'+addressFromKey+'_state').val());
        if($('#'+addressToKey+'_checkbox').is(':checked')==true){
            loadProvinceByCountry($('#'+addressToKey+'_country').val(),addressToKey+'_city',$('#'+addressToKey+'_city').val());
            loadDistrictByProvince($('#'+addressToKey+'_city').val(),addressToKey+'_district',$('#'+addressToKey+'_district').val());
            loadWardByDistrict($('#'+addressToKey+'_district').val(),addressToKey+'_state',$('#'+addressToKey+'_state').val());  
        }
    } 


    // primary
    $('#'+addressFromKey+'_country').live('change',function(){
        loadProvinceByCountry($(this).val(),addressFromKey+'_city',$('#'+addressFromKey+'_city').val());
        loadDistrictByProvince($(this).val(),addressFromKey+'_district',$('#'+addressFromKey+'_district').val());
        loadWardByDistrict($(this).val(),addressFromKey+'_state',$('#'+addressFromKey+'_state').val());
        copyBillingToShipping(addressFromKey,addressToKey);
    });
    $('#'+addressFromKey+'_city').live('change',function(){
        loadDistrictByProvince($(this).val(),addressFromKey+'_district',$('#'+addressFromKey+'_district').val());
        loadWardByDistrict($(this).val(),addressFromKey+'_state',$('#'+addressFromKey+'_state').val());
        copyBillingToShipping(addressFromKey,addressToKey);
    });
    $('#'+addressFromKey+'_district').live('change',function(){
        loadWardByDistrict($(this).val(),addressFromKey+'_state',$('#'+addressFromKey+'_state').val());
        copyBillingToShipping(addressFromKey,addressToKey);
    });

    // alt
    $('#'+addressToKey+'_country').live('change',function(){
        loadProvinceByCountry($(this).val(),addressToKey+'_city',$('#'+addressToKey+'_city').val());
        loadDistrictByProvince($(this).val(),addressToKey+'_district',$('#'+addressToKey+'_district').val());
        loadWardByDistrict($(this).val(),addressToKey+'_state',$('#'+addressToKey+'_state').val());
    });
    $('#'+addressToKey+'_city').live('change',function(){
        loadDistrictByProvince($(this).val(),addressToKey+'_district',$('#'+addressToKey+'_district').val());
        loadWardByDistrict($(this).val(),addressToKey+'_state',$('#'+addressToKey+'_state').val());
    });
    $('#'+addressToKey+'_district').live('change',function(){
        loadWardByDistrict($(this).val(),addressToKey+'_state',$('#'+addressToKey+'_state').val());
    });
    $('#'+addressFromKey+'_street').live('blur',function(){
        checkboxAddressFromkey = addressToKey.replace('_address','');
        if($('#'+checkboxAddressFromkey+'_checkbox').is(':checked'))
            $('#'+addressToKey+'_street').val($('#'+addressFromKey+'_street').val()) 
    });
});    
