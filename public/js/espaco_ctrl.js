angular.module("espaco").controller("EspacoCtrl", function ($scope, EspacoFactory) {
    $scope.espacos = EspacoFactory.index();
    $scope.atualizar = function(item){
        item.$update();
    };
});
