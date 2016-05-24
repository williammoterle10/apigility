angular.module("espaco").controller("EspacoCtrl", function ($scope, EspacoFactory) {
    var vm = $scope;
    vm.espacos = EspacoFactory.index();
    
    $scope.atualizar = function(item){
        item.$update(function(){
            alert('Atualizado com Sucesso!');
        }, function(){
            alert('Erro!');
        });
    };
    
    $scope.deletar = function(item){
        item.$delete(function(){
            vm.espacos = EspacoFactory.index();
            alert('Deletado com Sucesso!');
        }, function(){
            alert('Erro!');
        });
    };
    
    $scope.criar = function(item){
        EspacoFactory.create(item, function(){
            vm.espacos = EspacoFactory.index();
            alert('Criado com Sucesso!');
        }, function(){
            alert('Erro!');
        });
    };
    
    $scope.acessibilidades = {
        'ACESSO': 18,
        'SEM ACESSO': 19
    };
    
    $scope.tiposUso = {
        'AULA PRÁTICA': 18,
        'LABORATÓRIO DE INFORMÁTICA': 19,
        'LABORATÓRIO': 20,
        'PESQUISA': 21,
        'AULA TEÓRICA': 22
    };
    
    $scope.tiposEspacos = {
        'LABORATÓRIO': 16,
        'SALA DE AULA': 17,
        'LABORATÓRIO DE TECNOLOGIA': 18
    };
    
    $scope.blocos = {
        'BLOCO F': 37,
        'BLOCO H': 38,
        'BLOCO G 1': 39,
        'BLOCO R1': 40,
        'BLOCO G 2': 41,
        'BLOCO G 3': 42,
        'BLOCO R 2': 44,
        'BLOCO R 3': 45,
        'BLOCO M': 46,
        'BLOCO L': 47,
        'BLOCO E': 48,
        'BLOCO P': 49,
        'BLOCO N': 50,
        'SLO': 51,
        'XAXIM': 52,
        'CENTRAL DE SERVIÇOS': 53,
        'GINÁSIO': 54,
        'BIOTERIO': 57,
        'CAMPUS': 58,
        'ESPAÇO ALUGADO': 59,
        'CHAPECÓ': 60,
        'BLOCO K': 61,
        'BLOCO D': 62,
        'BLOCO C': 63,
        'BLOCO K2': 64,
        'BLOCO T': 65
    };
});
