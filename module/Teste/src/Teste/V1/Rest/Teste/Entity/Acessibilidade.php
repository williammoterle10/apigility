<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_acessibilidade") 
 */

class Acessibilidade
{
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    * 
    * @var integer
    */
    protected $cod_acessibilidade;


    /**
    * @ORM\Column(type="string", length=30)
    * 
    * @var string
    */
    protected $des_acessibilidade;

    /**
    * 
    * @param string $des_acessibilidade
    */
    public function setDesAcessibilidade($des_acessibilidade){
        $this->des_acessibilidade = $des_acessibilidade;
    }

    /**
    * 
    * @return integer
    */
    public function getCodAcessibilidade(){
        return $this->cod_acessibilidade;
    }

    /**
    * 
    * @return string
    */
    public function getDesAcessibilidade(){
        return $this->des_acessibilidade;
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
                'name' => 'cod_acessibilidade',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_acessibilidade',
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
                                'max' => 30,
                                'message' => 'O campo descrição da acessibilidade pode ter no máximo 30',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição da acessibilidade não pode estar vazio')
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