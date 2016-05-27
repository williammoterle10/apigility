angular.module("espaco").factory("TokenFactory", function () {
    var tokens = [];

    var addToken = function(token) {
        tokens.push(token);
    };

    var getToken = function(){
        return tokens;
    };
    
    return {
        addToken: addToken,
        getToken: getToken
    };
});