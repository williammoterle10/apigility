angular.module("espaco").factory("OauthFactory", function ($resource) {
    return $resource("/oauth",{},
        {
            'token': {method: 'POST', headers: {'Content-Type':'application/json'}}
        }
    );
});