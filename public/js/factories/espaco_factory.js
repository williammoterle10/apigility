angular.module("espaco").factory("EspacoFactory", function ($resource, TokenService) {
    return $resource("/espaco/:id", {id: "@cod_espaco"},
        {
            'index': {method: 'GET', isArray: true, headers: {Authorization: TokenService.getToken()}},
            'create': {method: 'POST',  headers: {Authorization: TokenService.getToken()}},
            'delete': {method: 'DELETE', headers: {Authorization: TokenService.getToken()}},
            'update': {method: 'PUT',  headers: {Authorization: TokenService.getToken()}},
        }
    );
});
