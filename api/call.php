<script type="text/javascript" src="../include/javascript/jquery.js"></script>
<style type="text/css">
    .main{
        text-align: center;
        padding: 10px;
        background: #f4f4f4;
        border-radius: 5px;
        margin-left: 10%;
        width: 80%;
    }
    #slc_api{
        height: 30px;
        border: #b5b3b3 solid 1px;
        border-radius: 5px;
    }
    #btn_call{
        background: #e6e6e6;
        padding: 10px;
        margin-top: 10px;
        border-radius: 5px;
        box-shadow: none;
    }
    #btn_call:focus{
        outline:none;
    }
    #div_request, #div_response{
    }
    .main_contents{
        text-align: left;
        border: 1px solid #9a9a9a;
        padding: 10px;
        margin: 10px;
    }
    .main_contents_header{
        font-size: 20px;
        font-weight: bold;
        margin-bottom: 15px;
    }
    #input_token{
        margin-left: 10px;
        height: 30px;
        width: 70%;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        border-radius: 5px;
        outline: none;
    }
    .cover{
        width: 100%;
        height: 100%;
        z-index: 999;
        position: fixed;
        background: black;
        opacity: 0.5;
        display: none;
        background-image: url(../custom/include/images/loading-transparent.gif);
        background-repeat: no-repeat;
        background-position: 50% 50%;
        background-size: 10%;
        left: 0;
        top: 0;
    }
</style>
<div class="cover">
</div>
<div class="main">
    <div>
        <h1>APIs</h1>
    </div>
    <div>
        <select name="slc_api" id="slc_api">
            <option value="">Please, choose</option>
            <option value="GetCustomerList">GetCustomerList</option> 
            <option value="GetCustomerInfo">GetCustomerInfo</option> 
            <option value="SaveCustomer">SaveCustomer</option> 
            <option value="GetAppListString">GetAppListString</option> 
        </select>
        </br>
        <input type="button" class="button primary" id="btn_call" value="Show">
    </div>
    <div class="main_contents">
        <div class="main_contents_header">Parameters: <div style="float: right; width: 45%; clear: both;border-left: 4px solid #9a9a9a;padding-left: 10px;">Token:<input id="input_token" style="margin-left: 10px;"/></div></div>
        <hr>
        <div id="div_request">
            <textarea cols="10" rows="10" id="txt_request" style="width:100%"></textarea></div>
    </div>
    <div class="main_contents">
        <div class="main_contents_header">Results:</div>
        <hr>
        <div style="text-align:center"><img id="img_loading" style="display: none;" src="../custom/include/images/loading-transparent.gif" border="0" width="32" height="32">
        </div>
        <div id="div_response"></div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#slc_api').change(function(){
            var api = $('#slc_api option:selected').val();
            token = $('#input_token').val();
            switch(api) {
                case 'GetCustomerList':
                    data = {
                        RequestAction: 'GetCustomerList', 
                    }
                    break; 
                case 'GetCustomerInfo':
                    data = {
                        RequestAction: 'GetCustomerInfo', 
                        Params: '{\"id\":\"de589aa0-c1f6-b6bf-ef2e-5abc58456687\"}', 
                    }
                    break; 
                case 'GetAppListString':
                    data = {
                        RequestAction: 'GetAppListString', 
                    }
                case 'SaveCustomer':
                    data = {
                        RequestAction: 'SaveCustomer', 
                    }
                    break;   
            }  
            $('#txt_request').val(showParameter(data));
            $('#txt_request').html(showParameter(data));
        })

        $('#btn_call').click(function(){ 
            var api = $('#slc_api option:selected').val();    
            flag = false;
            try{
                data = JSON.parse($('#txt_request').val()); 
                flag = true;
            }
            catch(err){
                alert(err); 
            } 
            if(flag){  
                callAPI(api, data);
            }
        })
    })



    function callAPI(api, data){
        $('#img_loading').show();
        $('.cover').show();
        $('#div_response').html('');
        $.ajax({
            type: "POST",
            url: "api.php",
            data: data,
            beforeSend: function(xhr){xhr.setRequestHeader('Token', token);xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');},
            dataType: "json",
            success: function (response) {  
                $('#div_response').html('<pre>' + showParameter(response) +'</pre>');

                $('.cover').hide();
                $('#img_loading').hide();
            },
            error: function(xhr){
                $('#div_response').html('Request Status: ' + xhr.status + ' Status Text: ' + xhr.statusText + ' ' + xhr.responseText);
                $('.cover').hide();
                $('#img_loading').hide();
            }
        });
    }

    function showParameter(data){
        str = JSON.stringify(data, null, 4);
        return str;
    }
</script>