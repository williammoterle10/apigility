<?php
namespace Teste\V1\Rest\Teste;

use ZF\ApiProblem\ApiProblem;
use ZF\Rest\AbstractResourceListener;

class TesteResource extends AbstractResourceListener
{
    protected $service_espaco;

    public function __construct($service_espaco)
    {
        $this->service_espaco = $service_espaco;
    }

    /**
     * Create a resource
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {   
        $espaco = $this->service_espaco->create($data);
        
        return $espaco;
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function delete($id)
    {
        $espaco = $this->service_espaco->delete($id);
        
        return $espaco;
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return ApiProblem|mixed
     */
    public function fetch($id)
    {         
       $espaco = $this->service_espaco->fetch($id);
        
        if(!$espaco) {
            return new ApiProblem(404, 'Não existem dados para identificador informado!');
        }
        
        return $espaco;
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return ApiProblem|mixed
     */
    public function fetchAll($params = array())
    {
        $espacos = $this->service_espaco->fetchAll();
        
        if(!$espacos) {
            return new ApiProblem(404, 'Não existem dados para serem mostrados!');
        }
        
        return $espacos;
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $espaco = $this->service_espaco->update($id, $data);
        
        return $espaco;
    }
}
