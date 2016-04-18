<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_gerencial")
 */

class Gerencial
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
    protected $cod_conta_gerencial;


    /**
    * @ORM\Column(type="string")
    * 
    * @var string
    */
    protected $des_conta_gerencial;

    /**
    *
    * @ORM\Column(type="integer");
    *
    * @var integer
    *
    */
    protected $status_conta_gerencial ;

    function getCod_conta_gerencial()
    {
        return $this->cod_conta_gerencial;
    }

    function getDes_conta_gerencial()
    {
        return $this->des_conta_gerencial;
    }

    function getStatus_conta_gerencial()
    {
        return $this->status_conta_gerencial;
    }

    function setCod_conta_gerencial( $cod_conta_gerencial )
    {
        $this->cod_conta_gerencial = $cod_conta_gerencial;
    }

    function setDes_conta_gerencial( $des_conta_gerencial )
    {
        $this->des_conta_gerencial = $des_conta_gerencial;
    }

    function setStatus_conta_gerencial( $status_conta_gerencial )
    {
        $this->status_conta_gerencial = $status_conta_gerencial;
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
                'name' => 'cod_conta_gerencial',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_conta_gerencial',
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
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição da conta gerencial não pode estar vazio')
                        )
                    ),
                )
            ));

            $inputFilter->add($factory->createInput(array(
                'name' => 'status_conta_gerencial',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo status da conta gerencial não pode estar vazio'),
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