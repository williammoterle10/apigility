<?php
namespace Espaco\V1\Rest\Espaco;

class EspacoResourceFactory
{
    public function __invoke($services)
    {
        $service = $services->get('EspacoService');

        return new EspacoResource($service);
    }
}
