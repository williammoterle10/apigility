<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_pemissao") 
 */

class Permissao
{
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
    * @ORM\Id
    * @ORM\Column(type="string", length=1)
    * 
    * @var string
    */
    protected $cod_permissao;


    /**
    * @ORM\Column(type="string", length=15)
    * 
    * @var string
    */
    protected $des_permissao;

    function getCod_permissao()
    {
        return $this->cod_permissao;
    }

    function getDes_permissao()
    {
        return $this->des_permissao;
    }

    function setCod_permissao( $cod_permissao )
    {
        $this->cod_permissao = $cod_permissao;
    }

    function setDes_permissao( $des_permissao )
    {
        $this->des_permissao = $des_permissao;
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
                'name' => 'cod_permissao',
                'required' => true,
            )));

        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_permissao',
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
                                'max' => 15,
                                'message' => 'O campo descrição da permissão pode ter no máximo 15',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição da permissão não pode estar vazio')
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