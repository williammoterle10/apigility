<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'Espaco\\V1\\Rest\\Espaco\\EspacoResource' => 'Espaco\\V1\\Rest\\Espaco\\EspacoResourceFactory',
            'EspacoService' => function($sm){
                $em = $sm->get('Doctrine\ORM\EntityManager');
                
                return new Espaco\V1\Rest\Espaco\EspacoService($em);
            }
        ),
    ),
    'router' => array(
        'routes' => array(
            'espaco.rest.espaco' => array(
                'type' => 'Segment',
                'options' => array(
                    'route' => '/espaco[/:espaco_id]',
                    'defaults' => array(
                        'controller' => 'Espaco\\V1\\Rest\\Espaco\\Controller',
                    ),
                ),
            ),
        ),
    ),
    'zf-versioning' => array(
        'uri' => array(
            0 => 'espaco.rest.espaco',
        ),
    ),
    'zf-rest' => array(
        'Espaco\\V1\\Rest\\Espaco\\Controller' => array(
            'listener' => 'Espaco\\V1\\Rest\\Espaco\\EspacoResource',
            'route_name' => 'espaco.rest.espaco',
            'route_identifier_name' => 'espaco_id',
            'collection_name' => 'espaco',
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
                2 => 'PUT',
                3 => 'DELETE',
                4 => 'PATCH',
            ),
            'collection_query_whitelist' => array(),
            'page_size' => 25,
            'page_size_param' => null,
            'entity_class' => 'Espaco\\V1\\Rest\\Espaco\\EspacoEntity',
            'collection_class' => 'Espaco\\V1\\Rest\\Espaco\\EspacoCollection',
            'service_name' => 'Espaco',
        ),
    ),
    'zf-content-negotiation' => array(
        'controllers' => array(
            'Espaco\\V1\\Rest\\Espaco\\Controller' => 'Json',
        ),
        'accept_whitelist' => array(
            'Espaco\\V1\\Rest\\Espaco\\Controller' => array(
                0 => 'application/vnd.espaco.v1+json',
                1 => 'application/hal+json',
                2 => 'application/json',
            ),
        ),
        'content_type_whitelist' => array(
            'Espaco\\V1\\Rest\\Espaco\\Controller' => array(
                0 => 'application/vnd.espaco.v1+json',
                1 => 'application/json',
            ),
        ),
    ),
    'zf-hal' => array(
        'metadata_map' => array(
            'Espaco\\V1\\Rest\\Espaco\\EspacoEntity' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'espaco.rest.espaco',
                'route_identifier_name' => 'espaco_id',
                'hydrator' => 'Zend\\Hydrator\\ArraySerializable',
            ),
            'Espaco\\V1\\Rest\\Espaco\\EspacoCollection' => array(
                'entity_identifier_name' => 'id',
                'route_name' => 'espaco.rest.espaco',
                'route_identifier_name' => 'espaco_id',
                'is_collection' => true,
            ),
        ),
    ),
    'zf-content-validation' => array(
        'Espaco\\V1\\Rest\\Espaco\\Controller' => array(
            'input_filter' => 'Espaco\\V1\\Rest\\Espaco\\Validator',
        ),
    ),
    'input_filter_specs' => array(
        'Espaco\\V1\\Rest\\Espaco\\Validator' => array(
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
            'espaco_entities' => array(
                'class' => 'Doctrine\\ORM\\Mapping\\Driver\\AnnotationDriver',
                'cache' => 'array',
                'paths' => array(
                    0 => __DIR__ . '/../src/Espaco/V1/Rest/Espaco',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Espaco\\V1\\Rest\\Espaco' => 'espaco_entities',
                ),
            ),
        ),
    ),
    'zf-mvc-auth' => array(
        'authorization' => array(
            'Espaco\\V1\\Rest\\Espaco\\Controller' => array(
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
        'Espaco\\V1' => 'oauth'
    )
);
