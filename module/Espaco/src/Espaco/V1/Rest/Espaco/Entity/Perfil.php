<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_perfil") 
 */

class Perfil
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
    protected $cod_perfil;


    /**
    * @ORM\Column(type="text", length=40)
    * 
    * @var string
    */
    protected $des_perfil;

    function getCod_perfil()
    {
        return $this->cod_perfil;
    }

    function getDes_perfil()
    {
        return $this->des_perfil;
    }

    function setCod_perfil( $cod_perfil )
    {
        $this->cod_perfil = $cod_perfil;
    }

    function setDes_perfil( $des_perfil )
    {
        $this->des_perfil = $des_perfil;
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
                'name' => 'cod_perfil',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_perfil',
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
                                'max' => 40,
                                'message' => 'O campo descrição do perfil pode ter no máximo 40',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição do perfil não pode estar vazio')
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