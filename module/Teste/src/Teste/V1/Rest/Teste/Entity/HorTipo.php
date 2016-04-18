<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_hor_tipo") 
 */

class HorTipo
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
    protected $codseq_tipo;


    /**
    * @ORM\Column(type="string", length=50)
    * 
    * @var string
    */
    protected $des_tipo;

    function getCodseq_tipo()
    {
        return $this->codseq_tipo;
    }

    function getDes_tipo()
    {
        return $this->des_tipo;
    }

    function setCodseq_tipo( $codseq_tipo )
    {
        $this->codseq_tipo = $codseq_tipo;
    }

    function setDes_tipo( $des_tipo )
    {
        $this->des_tipo = $des_tipo;
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
                'name' => 'codseq_tipo',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_tipo',
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
                                'max' => 50,
                                'message' => 'O campo descrição do tipo pode ter no máximo 50',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição do tipo não pode estar vazio')
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