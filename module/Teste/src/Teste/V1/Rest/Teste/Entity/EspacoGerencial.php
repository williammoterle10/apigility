<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_gerencial")
 */
class EspacoGerencial
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
     * 
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco",referencedColumnName="cod_espaco")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Espaco
     *
     */
    protected $cod_espaco;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Gerencial")
     * @ORM\JoinColumn(name="cod_conta_gerencial",referencedColumnName="cod_conta_gerencial")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Gerencial
     *
     */
    protected $cod_conta_gerencial;
    
    /**
     * @ORM\Column(type="integer")
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
    public function getCodContaGerencial()
    {
        return $this->cod_conta_gerencial;
    }

    /**
     * @param string $cod_conta_gerencial
     */
    public function setCodContaGerencial($cod_conta_gerencial)
    {
        $this->cod_conta_gerencial = $cod_conta_gerencial;
    }
    
    /**
     * @return integer
     */
    public function getCodusuario()
    {
        return $this->cod_usuario;
    }

    /**
     * @param integer $cod_usuario
     */
    public function setCodUsuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;
    }
    
    /**
     * @return Date
     */
    public function getDataVinculo()
    {
        return $this->data_vinculo;
    }

    /**
     * @param integer $data_vinculo
     */
    public function setDataVinculo($data_vinculo)
    {
        $this->data_vinculo = $data_vinculo;
    }
    
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_espaco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_conta_gerencial',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_usuario',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'data_vinculo',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data Vinculo não pode estar vazio'),
                        ),
                    ),
                    array(
                        'name' => 'Date',
                        'options' => array(
                            'format' => 'dd/mm/YYYY',
                        ),
                    ),
                ),
            )));
           
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}

?>
