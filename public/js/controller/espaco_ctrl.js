angular.module("espaco").controller("EspacoCtrl", function ($scope, EspacoFactory, OauthFactory, TokenService) {
    var vm = $scope;
    vm.espaco = new EspacoFactory;

    vm.template = 'views/template.html';
    
    vm.gerarToken = function(credenciais) {

        var params = {
            grant_type: 'client_credentials',
            client_id: credenciais.client_id,
            client_secret: credenciais.client_secret,
        };
        
        vm.oauth = OauthFactory.token(params, function (data){
            var stringToken = data.token_type + ' ' + data.access_token;
            TokenService.addToken(stringToken);
            vm.espacos = EspacoFactory.index();
            alert('Token gerado com Sucesso!');
            delete vm.credenciais;
            $('.botao-gerar-token').click();
        }, function (){
            alert('Erro ao gerar token!');
        });
    }
    
    vm.atualizar = function(espaco){
        espaco.$update(function(){
            alert('Atualizado com Sucesso!');
        }, function(){
            alert('Erro!');
        });
    };
    
    vm.deletar = function(espaco){
        espaco.$delete(function(){
            alert('Deletado com Sucesso!');
            delete vm.espaco;
        }, function(){
            alert('Erro!');
        });
    };
    
    vm.criar = function(espaco){
        espaco.$create(function (){
           vm.espacos = EspacoFactory.index();
           alert('Criado com Sucesso!');
           delete vm.espaco;
           $('.botao-create').click();
        }, function(){
            alert('Erro!')
        });
    };
    
    vm.acessibilidades = {
        'ACESSO': 18,
        'SEM ACESSO': 19
    };
    
    vm.tiposUso = {
        'AULA PRÁTICA': 18,
        'LABORATÓRIO DE INFORMÁTICA': 19,
        'LABORATÓRIO': 20,
        'PESQUISA': 21,
        'AULA TEÓRICA': 22
    };
    
    vm.tiposEspacos = {
        'LABORATÓRIO': 16,
        'SALA DE AULA': 17,
        'LABORATÓRIO DE TECNOLOGIA': 18
    };
    
    vm.blocos = {
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
    
    vm.credenciais = {
        client_id: '',
        client_secret: ''
    };
});
