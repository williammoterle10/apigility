<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Teste\\V1\\Rest\\Teste\\TesteResource' => 'Teste\\V1\\Rest\\Teste\\TesteResourceFactory',
            'EspacoService' => function($sm){
                $em = $sm->get('Doctrine\ORM\EntityManager');
                
                return new Teste\V1\Rest\Teste\TesteService($em);
            }
        ),
    ),
    'router' => array(
        'routes' => array(
            'teste.rest.teste' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/teste[/:teste_id]',
                    'defaults' => array(
                        'controller' => 'Teste\\V1\\Rest\\Teste\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'teste.rest.teste',
        ),
    ),
    'zf-rest' => array(
        'Teste\\V1\\Rest\\Teste\\Controller' => array(
            'listener' => 'Teste\\V1\\Rest\\Teste\\TesteResource',
            'route_name' => 'teste.rest.teste',
            'route_identifier_name' => 'teste_id',
            'collection_name' => 'teste',
            'entity_http_methods' => array(
                0 => 'GET',
                1 => 'PATCH',
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'POST',
            ),
            'collection_http_methods' => array(
                0 => 'GET',
                1 => 'POST',
                2 => 'PATCH',
                3 => 'PUT',
                4 => 'DELETE',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Teste\\V1\\Rest\\Teste\\Entity\\Espaco',
            'collection_class' => 'Teste\\V1\\Rest\\Teste\\TesteCollection',
            'service_name' => 'Teste',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Teste\\V1\\Rest\\Teste\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Teste\\V1\\Rest\\Teste\\Controller' => array(
                0 => 'application/vnd.teste.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Teste\\V1\\Rest\\Teste\\Controller' => array(
                0 => 'application/vnd.teste.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Teste\\V1\\Rest\\Teste\\Entity\\Espaco' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'teste.rest.teste',
                'route_identifier_name' => 'teste_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Teste\\V1\\Rest\\Teste\\TesteCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'teste.rest.teste',
                'route_identifier_name' => 'teste_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Teste\\V1\\Rest\\Teste\\Controller' => array(
            'input_filter' => 'Teste\\V1\\Rest\\Teste\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Teste\\V1\\Rest\\Teste\\Validator' => array(
            0 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'des_espaco',
            ),
            1 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'area_total',
            ),
            2 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'maximo_pessoas',
            ),
            3 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cod_tipo_espaco',
            ),
            4 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cod_tipo_uso',
            ),
            5 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cod_bloco',
            ),
            6 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'piso',
            ),
            7 => array(
                'required' => true,
                'validators' => array(),
                'filters' => array(),
                'name' => 'cod_acessibilidade',
            ),
        ),
    ),
    'doctrine' => array(
        'driver' => array(
            'teste_entities' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    0 => __DIR__ . '/../src/Teste/V1/Rest/Teste',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Teste\\V1\\Rest\\Teste' => 'teste_entities',
                ),
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Teste\\V1\\Rest\\Teste\\Controller' => array(
                'collection' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
                'entity' => array(
                    'GET' => false,
                    'POST' => false,
                    'PUT' => false,
                    'PATCH' => false,
                    'DELETE' => false,
                ),
            ),
        ),
    ),
    'map' => array(
        'Teste\\V1' => 'oauth'
    )
);
