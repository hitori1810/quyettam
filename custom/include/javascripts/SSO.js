var TCSSO = function(url){
    this.url = url;
}	

TCSSO.methods = {
    login : {
        normal  : "normal",
        google : "googlelogin",
        facebook : "signin"	,
        IsLoggedIn : "IsLoggedIn"
    },
    forgotpassword : "forgotpassword",			
    signup : "signup",
    getprofile : "GetProfile",
    signout : "signout",
    updateDetails : "updateDetails",
    getcustomercategory: "getcustomercategory"
};

TCSSO.prototype.airsearch = function(callBack){
    var url = this.url;
    this.invokeAjax({
        httpMethod : "GET",
        url: url,
        formData : new FormData()//new FormData(document.querySelector("#form1"))		
        },function(err,res){
            callBack(err,res);
    });	
}	

TCSSO.prototype.parseForm = function(params) {
    var formData = new FormData();
    var keys = Object.keys(params);

    for(var pos in keys) {
        formData.append(keys[pos],params[keys[pos]]);
    }
    return formData;
};

TCSSO.prototype._login = function(params,callBack) {
    var url = this.url;		
    var formData = this.parseForm({
        "username" : params.username,
        "password" : params.password
    });
    this.invokeAjax({
        httpMethod : "POST",
        formData : formData,
        methodName : TCSSO.methods.login.normal,
        url : url
        },function(err,res){
            callBack(err,res);
    });
}

TCSSO.prototype._fblogin = function(response,callBack){		

    var formData = this.parseForm({
        "access_token" : response.authResponse.accessToken,
        "expires" : response.authResponse.expiresIn,
        "uid" : response.authResponse.userID ,
        "sig": response.authResponse.signedRequest,
        "restype" : "JSON"
    });
    var url = this.url;			
    this.invokeAjax({
        httpMethod : "POST",
        formData : formData,
        methodName : TCSSO.methods.login.facebook,
        url : url
        },function(err,res){
            callBack(err,res);
    });	
}


TCSSO.prototype._isloggedin = function(callBack) {
    var url = this.url;
    this.invokeAjax({
        httpMethod: "POST",
        formData: new FormData(),
        methodName: TCSSO.methods.login.IsLoggedIn,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}
TCSSO.prototype._gplogin = function(googleUser, callBack) {
    var profile = googleUser.getBasicProfile();
    var formData = this.parseForm({
        "Googleid": profile.getId(),
        "Name": profile.getGivenName(),
        "Surname": profile.getFamilyName(),
        "ProfileImage": profile.getImageUrl(),
        "Email": profile.getEmail(),
        "DisplayName": profile.getName(),
        "access_token": googleUser.hg.access_token
    });

    var url = this.url;
    this.invokeAjax({
        httpMethod: "POST",
        formData: formData,
        methodName: TCSSO.methods.login.google,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}

TCSSO.prototype.Login = function(params, callBack) {
    switch (params.type) {
        case TCSSO.methods.login.normal:
            this._login(params, callBack);
            break;
        case TCSSO.methods.login.facebook:
            this._fblogin(params.response, callBack);
            break;
        case TCSSO.methods.login.google:
            this._gplogin(params.response, callBack);
            break;
        case TCSSO.methods.login.IsLoggedIn:
            this._isloggedin(callBack);
        default:
            //callBack({
            //status : "failure",
            //message : "no such login method"
            //},null);
            break;

    }
};

TCSSO.prototype.ForgotPassword = function(params, callBack) {
    var url = this.url;
    var formData = this.parseForm({
        "username": params.username
    });

    this.invokeAjax({
        httpMethod: "POST",
        formData: formData,
        methodName: TCSSO.methods.forgotpassword,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}

TCSSO.prototype.Signup = function(callBack, redirectURL) {
    var url = this.url;
    formData = this.parseForm({
        "redirectURL": redirectURL
    });
    this.invokeAjax({
        httpMethod: "POST",
        formData: formData,
        methodName: TCSSO.methods.signup,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}

TCSSO.prototype.updateDetails = function(params,callBack) {
    var url = this.url;
    var formData = this.parseForm({
        "customerid" : params.customerid,
        "customerclassid" : params.customerclassid
    });
    var test = JSON.stringify(params);
    $("#req").text(test);
    this.invokeAjax({
        httpMethod: "POST",
        formData: formData,
        methodName: TCSSO.methods.updateDetails,
        url : url		    
        },function(err,res){
            callBack(err,res);
    });
}

TCSSO.prototype.GetCustomerCategory = function(params, callBack) {
    var url = this.url;
    var formData = this.parseForm({
        "portalurl": params.URL
    });
    var param = JSON.stringify(params);
    $("#req").text(param);
    this.invokeAjax({
        httpMethod: "POST",
        formData: formData,
        methodName: TCSSO.methods.getcustomercategory,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}

TCSSO.prototype.signout = function(callBack) {
    var url = this.url;
    this.invokeAjax({
        httpMethod: "POST",
        formData: new FormData(),
        methodName: TCSSO.methods.signout,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}

TCSSO.prototype.GetProfileInfo = function(callBack) {
    var url = this.url;
    this.invokeAjax({
        httpMethod: "POST",
        formData: new FormData(),
        methodName: TCSSO.methods.getprofile,
        url: url
        }, function(err, res) {
            callBack(err, res);
    });
}

TCSSO.prototype.invokeAjax = function(params, callBack) {
    if (!params.formData) {
        params.formData = new FormData();
    }
    var url = this.url;
    var request = new XMLHttpRequest();
    request.open((params.httpMethod) ? params.httpMethod : "POST", params.url);
    request.withCredentials = true;
    request.onreadystatechange = function() {
        if (request.readyState == 4 && request.status == 200) {
            console.log(request.responseText);
            var jsondata = JSON.parse(request.responseText);
            callBack(null, jsondata);
        }
        else if (request.readyState == 4 && request.status !== 200) {
            callBack({
                status: request.status,
                response: request.response
                }, null);
        }
    };
    params.formData.append("Method", params.methodName);
    if (params.methodName == TCSSO.methods.signup)
        location.href = params.url;
    else
        request.send(params.formData);
}