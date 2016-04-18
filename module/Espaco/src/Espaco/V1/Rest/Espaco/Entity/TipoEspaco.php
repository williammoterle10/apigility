<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_tipo_espaco") 
 */

class TipoEspaco
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
    protected $cod_tipo_espaco;


    /**
    * @ORM\Column(type="string", length=30)
    * 
    * @var string
    */
    protected $des_tipo_espaco;

    function getCod_tipo_espaco()
    {
        return $this->cod_tipo_espaco;
    }

    function getDes_tipo_espaco()
    {
        return $this->des_tipo_espaco;
    }

    function setCod_tipo_espaco( $cod_tipo_espaco )
    {
        $this->cod_tipo_espaco = $cod_tipo_espaco;
    }

    function setDes_tipo_espaco( $des_tipo_espaco )
    {
        $this->des_tipo_espaco = $des_tipo_espaco;
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
                'name' => 'cod_tipo_espaco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_tipo_espaco',
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
                                'message' => 'O campo descrição do tipo de espaço pode ter no máximo 30',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição do tipo de espaço não pode estar vazio')
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