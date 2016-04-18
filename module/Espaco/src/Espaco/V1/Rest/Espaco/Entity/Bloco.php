<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_bloco")
 */
class Bloco
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
    protected $cod_bloco;
    
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $des_bloco;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Campus")
     * @ORM\JoinColumn(name="cod_campus", referencedColumnName="cod_campus")
     * 
     * @var \Espaco\V1\Rest\Espaco\Entity\Campus
     */
    protected $cod_campus;
    
    /**
     * @return integer
     */
    public function getCodBloco()
    {
        return $this->cod_bloco;
    }

    /**
     * @param integer $cod_bloco
     */
    public function setCodBloco($cod_bloco)
    {
        $this->cod_bloco = $cod_bloco;
    }
    
    /**
     * @return string
     */
    public function getDesBloco()
    {
        return $this->des_bloco;
    }

    /**
     * @param string $des_bloco
     */
    public function setDesBloco($des_bloco)
    {
        $this->des_bloco = $des_bloco;
    }
    
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
     *
     * @var \Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'des_bloco',
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
                            'max' => 20,
                            'message' => 'O campo descrissao bloco naop pode ter mais de 20 caracteres',
                        ),
                    ),),               
            )));
            
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_bloco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
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
