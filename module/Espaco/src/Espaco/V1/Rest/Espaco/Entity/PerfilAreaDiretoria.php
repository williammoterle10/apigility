<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_perfil_area_diretoria") 
 */

class PerfilAreaDiretoria
{
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;
    
    /**
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity="Perfil")
    * @ORM\JoinColumn(name="cod_perfil", referencedColumnName="cod_perfil")
    *
    * @var \Espaco\V1\Rest\Espaco\Entity\Perfil
    */
    protected $cod_perfil;

     /**
    * @ORM\ManyToOne(targetEntity="AreaDiretoria")
    * @ORM\JoinColumn(name="cod_area_diretoria", referencedColumnName="cod_area_diretoria")
    *
    * @var \Espaco\V1\Rest\Espaco\Entity\AreaDiretoria
    */
   protected $cod_area_diretoria;


    /**
    * 
    * @param integer $cod_perfil
    */
    public function setCodPerfil($cod_perfil){
        $this->cod_perfil = $cod_perfil;
    }

    /**
    * 
    * @return $cod_perfil
    */
    public function getCodPerfil(){
        return $this->cod_perfil;
    }    

    
    /**
    * 
    * @param integer $cod_area_diretoria
    */
    public function setCodAreaDiretoria($cod_area_diretoria){
        $this->cod_area_diretoria = $cod_area_diretoria;
    }

    /**
    * 
    * @return $cod_area_diretoria
    */
    public function getCodAreaDiretoria(){
        return $this->cod_area_diretoria;
    }    

    /**
     * 
     * @return \Zend\InputFilter\InputFilter
     */
    public function getInputFilter(){
        
        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_area_diretoria',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_perfil',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

        	$this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
?>