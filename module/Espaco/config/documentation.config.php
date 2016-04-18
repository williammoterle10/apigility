<?php
return array(
    'Espaco\\V1\\Rest\\Espaco\\Controller' => array(
        'entity' => array(
            'description' => 'Sistema de Gestão de Espaco',
            'GET' => array(
                'description' => 'Seleciona os dados da entidade Espaco',
                'response' => '{
   "_links": {
       "self": {
           "href": "/espaco[/:espaco_id]"
       }
   }
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
            ),
            'PUT' => array(
                'description' => 'Autaliza os dados da entidade Espaco',
                'request' => '{
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/espaco[/:espaco_id]"
       }
   }
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
            ),
            'DELETE' => array(
                'description' => 'Deleta registro da entidade Espaco',
                'request' => '{
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/espaco[/:espaco_id]"
       }
   }
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
            ),
            'POST' => array(
                'description' => 'Cria registro para a entidade Espaco',
                'request' => '{
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
                'response' => '{
   "_links": {
       "self": {
           "href": "/espaco[/:espaco_id]"
       }
   }
   "des_espaco": "",
   "area_total": "",
   "maximo_pessoas": "",
   "cod_tipo_espaco": "",
   "cod_tipo_uso": "",
   "cod_bloco": "",
   "piso": "",
   "cod_acessibilidade": ""
}',
            ),
        ),
    ),
);
