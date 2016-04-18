<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_especificidade")
 */
class Especificidade
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $cod_especificidade;
    
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $des_especificidade;

    /**
     * @return integer
     */
    public function getCodEspecificidade()
    {
        return $this->cod_especificidade;
    }

    /**
     * @param integer $cod_especificidade
     */
    public function setCodEspecificidade($cod_especificidade)
    {
        $this->cod_especificidade = $cod_especificidade;
    }
    
    /**
     * @return string
     */
    public function getDesEspecificidade()
    {
        return $this->des_especificidade;
    }

    /**
     * @param string $des_especificidade
     */
    public function setDesEspecificidade($des_especificidade)
    {
        $this->des_especificidade = $des_especificidade;
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
                'name' => 'cod_especificidade',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'des_especificidade',
                'required' => true,
                 'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('encoding' => 'UTF-8')
                    ),
                ),
                  'validators' => array(
                    array(

                        'name' => 'StringLength',
                        	'options' => array(
                            'encoding' => 'UTF-8',
                            'max' => 80,
                            'message' => 'O campo Especificidade bloco nao pode ter mais de 80 caracteres',
                        ),
                    ),),               
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}

?>
