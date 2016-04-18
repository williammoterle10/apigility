<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_area_diretoria") 
 */

class AreaDiretoria
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
    protected $cod_area_diretoria;


    /**
    * @ORM\Column(type="text", length=30)
    * 
    * @var string
    */
    protected $des_area_diretoria;

    /**
    * 
    * @param string $des_area_diretoria
    */
    public function setDesAreaDiretoria($des_area_diretoria){
        $this->des_area_diretoria = $des_area_diretoria;
    }

    /**
    * 
    * @return integer
    */
    public function getCodAreaDiretoria(){
        return $this->cod_area_diretoria;
    }

    /**
    * 
    * @return string
    */
    public function getDesAreaDiretoria(){
        return $this->des_area_diretoria;
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
                    'name' => 'des_area_diretoria',
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
                                'message' => 'O campo descrição da area da diretoria pode ter no máximo 80',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição area da diretoria não pode estar vazio')
                        )
                    ),
                )
            ));

        	$this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
?>