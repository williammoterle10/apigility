<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_status_pessoa") 
 */

class StatusPessoa
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
    protected $cod_pessoa_status;


    /**
    * @ORM\Column(type="string", length=30)
    * 
    * @var string
    */
    protected $des_pessoa_status;
    
    function getCod_pessoa_status()
    {
        return $this->cod_pessoa_status;
    }

    function getDes_pessoa_status()
    {
        return $this->des_pessoa_status;
    }

    function setCod_pessoa_status( $cod_pessoa_status )
    {
        $this->cod_pessoa_status = $cod_pessoa_status;
    }

    function setDes_pessoa_status( $des_pessoa_status )
    {
        $this->des_pessoa_status = $des_pessoa_status;
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
                'name' => 'cod_pessoa_status',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_pessoa_status',
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
                                'message' => 'O campo status da pessoa pode ter no máximo 40',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo status da pessoa não pode estar vazio')
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