<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_usuario") 
 */

class Usuario
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
    protected $cod_usuario;


    /**
    * @ORM\Column(type="string", length=80)
    * 
    * @var string
    */
    protected $nompes;

    /**
    *
    * @ORM\Column(type="integer");
    *
    * @var integer
    *
    */
    protected $status_usuario ;

    /**
     *
     * @ORM\Column(type="string")
     * 
     * @var string
     */
    protected $email;

    function getCod_usuario()
    {
        return $this->cod_usuario;
    }

    function getNompes()
    {
        return $this->nompes;
    }

    function getStatus_usuario()
    {
        return $this->status_usuario;
    }

    function getEmail()
    {
        return $this->email;
    }

    function setCod_usuario( $cod_usuario )
    {
        $this->cod_usuario = $cod_usuario;
    }

    function setNompes( $nompes )
    {
        $this->nompes = $nompes;
    }

    function setStatus_usuario( $status_usuario )
    {
        $this->status_usuario = $status_usuario;
    }

    function setEmail( $email )
    {
        $this->email = $email;
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
                'name' => 'cod_usuario',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'nompes',
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
                                'message' => 'O campo nome da pessoa pode ter no máximo 40',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo nome da pessoa não pode estar vazio')
                        )
                    ),
                )
            ));

            $inputFilter->add($factory->createInput(array(
                'name' => 'status_usuario',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo status do usuario não pode estar vazio'),
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                    'name' => 'email',
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
                                'message' => 'O campo email pode ter no máximo 80',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo email não pode estar vazio')
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