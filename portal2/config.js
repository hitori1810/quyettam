(function(app) {
    app.augment("config", {
        "appId": "SupportPortal",
        "appStatus": "offline",
        "env": "dev",
        "platform": "portal",
        "additionalComponents": {
            "header": {
                "target": "#header"
            },
            "footer": {
                "target": "#footer"
            }
        },
        "alertsEl": "#alert",
        "serverUrl": "http://localhost/proj/sugar_license/rest/v10",
        "siteUrl": "http://localhost/proj/sugar_license",
        "unsecureRoutes": ["signup", "error"],
        "loadCss": "url",
        "clientID": "support_portal",
        "maxSearchQueryResult": "5"
    }, false);
})(SUGAR.App);