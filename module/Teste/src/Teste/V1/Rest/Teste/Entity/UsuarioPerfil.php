<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_usuario_perfil") 
 */

class UsuarioPerfil
{
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

   /**
    * @ORM\Id
    *
    * @ORM\ManyToOne(targetEntity="Usuario")
    * @ORM\JoinColumn(name="cod_usuario", referencedColumnName="cod_usuario")
    *
    * @var \Teste\V1\Rest\Teste\Entity\Usuario
    */
    protected $cod_usuario;
    
    /**
    * @ORM\ManyToOne(targetEntity="Perfil")
    * @ORM\JoinColumn(name="cod_perfil", referencedColumnName="cod_perfil")
    *
    * @var \Teste\V1\Rest\Teste\Entity\Perfil
    */
    protected $cod_perfil;
   

    /**
    * 
    * @return $cod_usuario
    */
    public function getCodUsuario(){
        return $this->cod_usuario;
    }  
    
    /**
    * 
    * @param integer $cod_usuario
    */
    public function setCodUsuario($cod_usuario){
        $this->cod_usuario = $cod_usuario;
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
    * @param integer $cod_perfil
    */
    public function setCodPerfil($cod_perfil){
        $this->cod_perfil = $cod_perfil;
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
                'name' => 'cod_usuario',
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