/**
* Cach goi ham: autoLoad(options,selected_value,{0:'areas_loading'},'country_loading',{0:'areas'});
* options : mang du lieu duoc luu tru vao 1 bien js
* selected_value: gia tri duoc chon cua options
* select_source: mang cac id cua option nguon(option ma nguoi dung change)
* select_des: id cua option can thay doi
* key: mang cac key can kiem tra (key la attribute cua option can kiem tra voi option nguon)
*/
function autoLoad(options,selected_value,select_source,select_des,key){

    // Xoa toan bo option hien tai cua option destination
    jQuery("select#"+select_des).html('');
    options_news = '<option value = ""></option>';
    // Lay gia tri option source duoc chon
    var value = new Array();
    for(index_key in select_source){
        value[index_key] = jQuery("select#"+select_source[index_key]).val();
    }
    // Voi moi option tu danh sach option nguon ban dau ta lay ra nhung option thoa yeu cau
    for(index in options){
        var check = 1;
        var selected = '';
        for(index_key in key){
            if(options[index][key[index_key]] != value[index_key]) check = 0; 
        }
        if(check == 1){
            if(options[index]['id'] == selected_value){
                selected = 'selected';
            }
            options_new = '<option label="'+options[index]['name']+'" value="'+options[index]['id']+'" ';
            for(index_key in key){
                options_new += key[index_key]+'="'+options[index][key[index_key]]+'" ';
            }
            options_new += selected + '>' + options[index]['name'] + '</option>';
            options_news += options_new; 
        }
    }
    jQuery("select#"+select_des).html(options_news);
}