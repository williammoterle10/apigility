<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_tipo_uso")
 */
class EspacoTipoUso
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
    protected $cod_tipo_uso;
    
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $des_tipo_uso;

    /**
     * @return integer
     */
    public function getCodTipoUso()
    {
        return $this->cod_TipoUso;
    }

    /**
     * @param integer $cod_tipo_uso
     */
    public function setCodTipoUso($cod_tipo_uso)
    {
        $this->cod_tipo_uso = $cod_tipo_uso;
    }
    
    /**
     * @return string
     */
    public function getDesTipoUso()
    {
        return $this->des_tipo_uso;
    }

    /**
     * @param string $des_tipo_uso
     */
    public function setDesTipoUso($des_tipo_uso)
    {
        $this->des_tipo_uso = $des_tipo_uso;
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
                'name' => 'cod_tipo_uso',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'des_tipo_uso',
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
                        ),
                    ),),               
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}

?>
