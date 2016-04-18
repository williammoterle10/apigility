<?php
namespace Teste\V1\Rest\Teste;

use ZF\ApiProblem\ApiProblem;
use Teste\V1\Rest\Teste\Entity\Espaco;

class TesteService
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
        $select = $this->em->createQueryBuilder()
            ->select('espaco','cod_tipo_espaco.des_tipo_espaco', 'cod_tipo_uso.des_tipo_uso', 'cod_bloco.des_bloco', 'cod_acessibilidade.des_acessibilidade')
            ->from('\Teste\V1\Rest\Teste\Entity\Espaco', 'espaco')
            ->join('espaco.cod_tipo_espaco', 'cod_tipo_espaco')
            ->join('espaco.cod_tipo_uso', 'cod_tipo_uso')
            ->join('espaco.cod_bloco', 'cod_bloco')
            ->join('espaco.cod_acessibilidade', 'cod_acessibilidade')
            ->where("espaco.cod_espaco = $id");    
        $espaco = $select->getQuery()->getArrayResult();
        
        return $espaco;
    }
    
    /**
     * Busca dados de todos Espacos
     * 
     * @param array $params
     * @return array
     */
    public function fetchAll($params = array())
    {
        $select = $this->em->createQueryBuilder()
            ->select('espaco','cod_tipo_espaco.des_tipo_espaco', 'cod_tipo_uso.des_tipo_uso', 'cod_bloco.des_bloco', 'cod_acessibilidade.des_acessibilidade')
            ->from('\Teste\V1\Rest\Teste\Entity\Espaco', 'espaco')
            ->join('espaco.cod_tipo_espaco', 'cod_tipo_espaco')
            ->join('espaco.cod_tipo_uso', 'cod_tipo_uso')
            ->join('espaco.cod_bloco', 'cod_bloco')
            ->join('espaco.cod_acessibilidade', 'cod_acessibilidade');
        $espacos = $select->getQuery()->getArrayResult();
        
        return $espacos;
    }
    
    /**
     * Cria um Espaco
     * 
     * @param object $data
     * @return ApiProblem
     */
    public function create($data)
    {   
        $tipoEspacoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\TipoEspaco', (int)$data->cod_tipo_espaco);
        if (!$tipoEspacoEntity) {
            return new ApiProblem(404, 'Tipo Espaço não encontrado!');
        }
        
        $espacoTipoUsoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\EspacoTipoUso', (int)$data->cod_tipo_uso);
        if (!$espacoTipoUsoEntity) {
            return new ApiProblem(404, 'Espaço Tipo Uso não encontrado!');
        }
        
        $blocoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\Bloco', (int)$data->cod_bloco);
        if (!$blocoEntity) {
            return new ApiProblem(404, 'Bloco não encontrado!');
        }
        
        $acessibilidadeEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\Acessibilidade', (int)$data->cod_acessibilidade);
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
        $espacoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\Espaco', (int)$id);
        if (!$espacoEntity) {
            return new ApiProblem(404, 'Espaço não encontrado!');
        }
        
        $tipoEspacoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\TipoEspaco', (int)$data->cod_tipo_espaco);
        if (!$tipoEspacoEntity) {
            return new ApiProblem(404, 'Tipo Espaço não encontrado!');
        }
        
        $espacoTipoUsoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\EspacoTipoUso', (int)$data->cod_tipo_uso);
        if (!$espacoTipoUsoEntity) {
            return new ApiProblem(404, 'Espaço Tipo Uso não encontrado!');
        }
        
        $blocoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\Bloco', (int)$data->cod_bloco);
        if (!$blocoEntity) {
            return new ApiProblem(404, 'Bloco não encontrado!');
        }
        
        $acessibilidadeEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\Acessibilidade', (int)$data->cod_acessibilidade);
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

            return new ApiProblem(200, 'Espaço editado com sucesso!');
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
        $espacoEntity = $this->em->find('\Teste\V1\Rest\Teste\Entity\Espaco', (int)$id);
        if (!$espacoEntity){
            return new ApiProblem(404, 'Espaço não encontrado!');
        }
        
        $this->em->remove($espacoEntity);
        
        try{
            $this->em->flush();

            return new ApiProblem(200, 'Espaço removido com sucesso!');
        }
        catch (\Exception $e){
            return new ApiProblem(404, 'Erro ao remover Espaço!');
        }
    }
    
}

