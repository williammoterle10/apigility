<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_hor_freq") 
 */

class HorFreq
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
    protected $codseq_freq;


    /**
    * @ORM\Column(type="string", length=40)
    * 
    * @var string
    */
    protected $des_frequencia;

    function getCodseq_freq()
    {
        return $this->codseq_freq;
    }

    function getDes_frequencia()
    {
        return $this->des_frequencia;
    }

    function setCodseq_freq( $codseq_freq )
    {
        $this->codseq_freq = $codseq_freq;
    }

    function setDes_frequencia( $des_frequencia )
    {
        $this->des_frequencia = $des_frequencia;
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
                'name' => 'codseq_freq',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
        	
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_frequencia',
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
                                'message' => 'O campo descrição da frequência pode ter no máximo 40',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo descrição da frequência não pode estar vazio')
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