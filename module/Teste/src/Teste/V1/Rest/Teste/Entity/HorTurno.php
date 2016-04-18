<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_hor_turno") 
 */

class HorTurno
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
    protected $codseq_turno;


    /**
    * @ORM\Column(type="string", length=50)
    * 
    * @var string
    */
    protected $des_turno;

    function getCodseq_turno()
    {
        return $this->codseq_turno;
    }

    function getDes_turno()
    {
        return $this->des_turno;
    }

    function setCodseq_turno( $codseq_turno )
    {
        $this->codseq_turno = $codseq_turno;
    }

    function setDes_turno( $des_turno )
    {
        $this->des_turno = $des_turno;
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
                'name' => 'codseq_turno',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_turno',
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
                                'message' => 'O campo descrição do turno pode ter no máximo 50',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição do turno não pode estar vazio')
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