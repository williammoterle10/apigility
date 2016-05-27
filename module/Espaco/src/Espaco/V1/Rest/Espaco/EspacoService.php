<?php
namespace Espaco\V1\Rest\Espaco;

use ZF\ApiProblem\ApiProblem;
use Espaco\V1\Rest\Espaco\Entity\Espaco;

class EspacoService
{
    
    protected $em;
    
    public function __construct($em)
    {
        $this->em = $em;
    }
    
    /**
     * Busca dados do Espaco
     * 
     * @param integer $id
     * @return array
     */
    public function fetch($id)
    {
        $espacoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Espaco', (int)$id);

        return $espacoEntity->getArrayCopy();
    }
    
    /**
     * Busca dados de todos Espacos
     * 
     * @param array $params
     * @return array
     */
    public function fetchAll($params = array())
    {
        $espacosEntity = $this->em->getRepository('\Espaco\V1\Rest\Espaco\Entity\Espaco')->findAll();
        
        $result = [];
        foreach ($espacosEntity as $i  => $espaco){
            $result[$i] = $espaco->getArrayCopy();
        }

        return $result;
    }
    
    /**
     * Cria um Espaco
     * 
     * @param object $data
     * @return ApiProblem
     */
    public function create($data)
    {   
        $tipoEspacoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\TipoEspaco', (int)$data->cod_tipo_espaco);
        if (!$tipoEspacoEntity) {
            return new ApiProblem(404, 'Tipo Espaço não encontrado!');
        }
        
        $espacoTipoUsoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\EspacoTipoUso', (int)$data->cod_tipo_uso);
        if (!$espacoTipoUsoEntity) {
            return new ApiProblem(404, 'Espaço Tipo Uso não encontrado!');
        }
        
        $blocoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Bloco', (int)$data->cod_bloco);
        if (!$blocoEntity) {
            return new ApiProblem(404, 'Bloco não encontrado!');
        }
        
        $acessibilidadeEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Acessibilidade', (int)$data->cod_acessibilidade);
        if (!$acessibilidadeEntity) {
            return new ApiProblem(404, 'Acessibilidade não encontrada!');
        }
        
        $espacoEntity = new Espaco();
        $espacoEntity->setDesEspaco($data->des_espaco);
        $espacoEntity->setPiso($data->piso);
        $espacoEntity->setMaximoPessoas((int)$data->maximo_pessoas);
        $espacoEntity->setAreaTotal((double)$data->area_total);
        $espacoEntity->setCodTipoEspaco($tipoEspacoEntity);
        $espacoEntity->setCodTipoUso($espacoTipoUsoEntity);
        $espacoEntity->setCodBloco($blocoEntity);
        $espacoEntity->setCodAcessibilidade($acessibilidadeEntity);
        
        $this->em->persist($espacoEntity);
        
        try{
            $this->em->flush();

            return new ApiProblem(200, 'Espaço criado com sucesso!');
        }
        catch (\Exception $e){
            return new ApiProblem(404, 'Erro ao criar Espaço!');
        }
    }
    
    /**
     * Atualiza um Espaco
     * 
     * @param integer $id
     * @param json $data
     * @return ApiProblem
     */
    public function update($id, $data)
    {
        $espacoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Espaco', (int)$id);
        if (!$espacoEntity) {
            return new ApiProblem(404, 'Espaço não encontrado!');
        }
        
        $tipoEspacoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\TipoEspaco', (int)$data->cod_tipo_espaco);
        if (!$tipoEspacoEntity) {
            return new ApiProblem(404, 'Tipo Espaço não encontrado!');
        }
        
        $espacoTipoUsoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\EspacoTipoUso', (int)$data->cod_tipo_uso);
        if (!$espacoTipoUsoEntity) {
            return new ApiProblem(404, 'Espaço Tipo Uso não encontrado!');
        }
        
        $blocoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Bloco', (int)$data->cod_bloco);
        if (!$blocoEntity) {
            return new ApiProblem(404, 'Bloco não encontrado!');
        }
        
        $acessibilidadeEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Acessibilidade', (int)$data->cod_acessibilidade);
        if (!$acessibilidadeEntity) {
            return new ApiProblem(404, 'Acessibilidade não encontrada!');
        }

        $espacoEntity->setDesEspaco($data->des_espaco);
        $espacoEntity->setPiso($data->piso);
        $espacoEntity->setMaximoPessoas((int)$data->maximo_pessoas);
        $espacoEntity->setAreaTotal((double)$data->area_total);
        $espacoEntity->setCodTipoEspaco($tipoEspacoEntity);
        $espacoEntity->setCodTipoUso($espacoTipoUsoEntity);
        $espacoEntity->setCodBloco($blocoEntity);
        $espacoEntity->setCodAcessibilidade($acessibilidadeEntity);
        
        $this->em->persist($espacoEntity);
        
        try{
            $this->em->flush();

            return $espacoEntity->getArrayCopy();
        }
        catch (\Exception $e){
            return new ApiProblem(404, 'Erro ao editar Espaço!');
        }
    }
    
    /**
     * Deleta um Espaco
     * 
     * @param integer $id
     * @return ApiProblem
     */
    public function delete($id)
    {
        $espacoEntity = $this->em->find('\Espaco\V1\Rest\Espaco\Entity\Espaco', (int)$id);
        if (!$espacoEntity){
            return new ApiProblem(404, 'Espaço não encontrado!');
        }
        $this->em->remove($espacoEntity);
        
        try{
            $this->em->flush();

            return new ApiProblem(200, 'Espaço criado com sucesso!');
        }
        catch (\Exception $e){
            return new ApiProblem(404, 'Espaço criado com sucesso!');
        }
    }
    
}

