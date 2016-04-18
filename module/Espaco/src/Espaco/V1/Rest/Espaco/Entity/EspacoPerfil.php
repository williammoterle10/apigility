<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_perfil")
 */
class EspacoPerfil
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco",referencedColumnName="cod_espaco")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Espaco
     */
    protected $cod_espaco;
    
    /**
     * @ORM\ManyToOne(targetEntity="Perfil")
     * @ORM\JoinColumn(name="cod_perfil",referencedColumnName="cod_perfil")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Perfil
     *
     */
    protected $cod_perfil;

    /**
     * @ORM\ManyToOne(targetEntity="Permissao")
     * @ORM\JoinColumn(name="cod_permissao",referencedColumnName="cod_permissao")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Permissao
     *
     * @var string
     */
    protected $cod_permissao;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="cod_usuario",referencedColumnName="cod_usuario")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Usuario
     *
     * @var integer
     */
    protected $cod_usuario;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var datetime
     */
    protected $data_vinculo;
        
    
    /**
     * @return integer
     */
    public function getCodEspaco()
    {
        return $this->cod_espaco;
    }

    /**
     * @param integer $cod_espaco
     */
    public function setCodEspaco($cod_espaco)
    {
        $this->cod_espaco = $cod_espaco;
    }
   
    /**
     * @return integer
     */
    public function getCodPerfil()
    {
        return $this->cod_perfil;
    }

    /**
     * @param string $cod_perfil
     */
    public function setCodPerfil($cod_perfil)
    {
        $this->cod_perfil = $cod_perfil;
    }


    /**
     * @return string
     */
    public function getCodPermissao()
    {
        return $this->cod_permissao;
    }

    /**
     * @param string $cod_permissao
     */
    public function setCodPermissao($cod_permissao)
    {
        $this->cod_permissao = $cod_permissao;
    }

     /**
     * @return integer
     */
    public function getCodUsuario()
    {
        return $this->cod_usuario;
    }

    /**
     * @param string $cod_usuario
     */
    public function setCodUsuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;
    }

    public function setDataVinculo($data_vinculo){
        $this->data_vinculo = $data_vinculo;
    }

    /**
    *
    * @return \DateTime
    *
    */
    public function getDataVinculo(){
        return $this->data_vinculo;
    }
    
    public function getInputFilter()
    {

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
                'name' => 'cod_espaco',
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

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_permissao',
                'required' => true,

                
            )));           
            
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}

?>
