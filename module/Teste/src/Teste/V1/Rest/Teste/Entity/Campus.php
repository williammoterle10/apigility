<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_campus")
 */
class Campus
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
    protected $cod_campus;
    
     /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $des_campus;
    
    /**
     * @return integer
     */
    public function getCodCampus()
    {
        return $this->cod_campus;
    }

    /**
     * @param integer $cod_campus
     */
    public function setCodCampus($cod_campus)
    {
        $this->cod_campus = $cod_campus;
    }
    
    /**
     * @return string
     */
    public function getDesCampus()
    {
        return $this->des_campus;
    }

    /**
     * @param string $des_campus
     */
    public function setDesCampus($des_campus)
    {
        $this->des_campus = $des_campus;
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
                'name' => 'des_campus',
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
                            'message' => 'O campo descrissao campus nao pode ter mais de 80 caracteres',
                        ),
                    ),),               
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_campus',
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
