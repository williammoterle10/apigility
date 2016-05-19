angular.module("espaco").factory("EspacoFactory", function ($resource) {
    return $resource("/espaco/:id", {id: "@cod_espaco"},
        {
            'index': {method: 'GET', isArray: true},
            'show': {method: 'GET', isArray: false},
            'create': {method: 'POST'},
            'update': {method: 'PUT'},
            'delete': {method: 'DELETE'},
        }
    );
});