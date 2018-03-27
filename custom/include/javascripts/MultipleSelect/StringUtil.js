/*
StringUtil
Author: Hieu Nguyen
Date: 15/04/2013
Purpose: to manipulate string
*/

// parse unicode string to un-unicode string
function unUnicode(fullString){
    fullString= fullString.toLowerCase();
    fullString= fullString.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
    /// fullString= fullString.replace(/à|á|ạ|ả|ã/g,"a");
    // fullString= fullString.replace(/ầ|ấ|ậ|ẩ|ẫ/g,"â");
    //fullString= fullString.replace(/ă|ằ|ắ|ặ|ẳ|ẵ/g,"ă");
    fullString= fullString.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
    fullString= fullString.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    fullString= fullString.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
    fullString= fullString.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
    fullString= fullString.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
    fullString= fullString.replace(/đ/g,"d");
    return fullString;
}

function unUnicodeVietnamese(fullString){
    fullString= fullString.toLowerCase();
    fullString= fullString.replace(/â|ầ|ấ|ậ|ẩ|ẫ/g,"â");
    fullString= fullString.replace(/ă|ằ|ắ|ặ|ẳ|ẵ/g,"ă");
    fullString= fullString.replace(/è|é|ẹ|ẻ|ẽ/g,"e");
    fullString= fullString.replace(/ê|ề|ế|ệ|ể|ễ/g,"ê");
    fullString= fullString.replace(/ì|í|ị|ỉ|ĩ/g,"i");
    fullString= fullString.replace(/ô|ồ|ố|ộ|ổ|ỗ|/g,"ô");
    fullString= fullString.replace(/ờ|ớ|ợ|ở|ỡ/g,"ơ");
    fullString= fullString.replace(/ư|ừ|ứ|ự|ử|ữ/g,"ư");
    return fullString;
}

// match un-unicode lookup string in unicode full string
function unUnicodeMatch(fullString, lookupString) {
    fullString= unUnicode(fullString);
    lookupString= unUnicode(lookupString);
    return (fullString.match(lookupString)) ? true : false;
}

// Check if a string contains any unicode chacracters
function isUnicode(fullString) {
    for(var i = 0; i < fullString.length; i++){
        if(fullString.charCodeAt(i) >= 192){
            return true; 
        }
    }
    return false;
}