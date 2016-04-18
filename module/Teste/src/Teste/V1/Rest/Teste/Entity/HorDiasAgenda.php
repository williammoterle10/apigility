<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_hor_dias_agenda") 
 */

class HorDiasAgenda
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
    protected $codseq_dia_agenda;

    /**
     * @ORM\ManyToOne(targetEntity="HorPeriodoAgendado")
     * @ORM\JoinColumn(name="codseq_periodo",referencedColumnName="codseq_periodo")
     *
     * @var \Teste\V1\Rest\Teste\Entity\HorPeriodoAgendado
     */
    protected $codseq_periodo;

    /**
    *
    * @ORM\Column(type="datetime")
    *
    * @var datetime
    *
    */
    protected $dia_agendado;
    
    function getCodseq_dia_agenda()
    {
        return $this->codseq_dia_agenda;
    }

    function getCodseq_periodo()
    {
        return $this->codseq_periodo;
    }

    function getDia_agendado()
    {
        return $this->dia_agendado;
    }

    function setCodseq_dia_agenda( $codseq_dia_agenda )
    {
        $this->codseq_dia_agenda = $codseq_dia_agenda;
    }

    function setCodseq_periodo( $codseq_periodo )
    {
        $this->codseq_periodo = $codseq_periodo;
    }

    function setDia_agendado( $dia_agendado )
    {
        $this->dia_agendado = $dia_agendado;
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
                'name' => 'codseq_periodo',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'codseq_dia_agenda',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'data_agendado',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data Agendamento não pode estar vazio'),
                        ),
                    ),
                    array(
                        'name' => 'Date',
                        'options' => array(
                            'format' => 'dd/mm/YYYY',
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