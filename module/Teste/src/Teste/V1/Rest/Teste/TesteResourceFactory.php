<?php
namespace Teste\V1\Rest\Teste;

class TesteResourceFactory
{
    public function __invoke($services)
    {
        $service = $services->get('EspacoService');

        return new TesteResource($service);
    }
}
