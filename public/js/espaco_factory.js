angular.module("espaco").factory("EspacoFactory", function ($resource, TokenFactory) {
    return $resource("/espaco/:id", {id: "@cod_espaco"},
        {
            'index': {method: 'GET', isArray: true, headers: {Authorization: TokenFactory.getToken()}},
            'show': {method: 'GET', isArray: false},
            'create': {method: 'POST',  headers: { Authorization: TokenFactory.getToken()}},
            'delete': {method: 'DELETE', headers: {Authorization: TokenFactory.getToken()}},
            'update': {method: 'PUT',  headers: { Authorization: TokenFactory.getToken()}},
        }
    );
});
