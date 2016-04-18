<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_hor_periodo_agendado") 
 */

class HorPeriodoAgendado
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
    protected $codseq_periodo;

    /**
     * @ORM\ManyToOne(targetEntity="HorFreq")
     * @ORM\JoinColumn(name="codseq_freq",referencedColumnName="codseq_freq")
     *
     * @var \Teste\V1\Rest\Teste\Entity\HorFreq
     */
    protected $codseq_freq;

    /**
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco",referencedColumnName="cod_espaco")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Espaco
     */
    protected $cod_espaco;

    /**
     * @ORM\ManyToOne(targetEntity="HorFaixa")
     * @ORM\JoinColumn(name="codseq_horfaixa",referencedColumnName="codseq_horfaixa")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Horfaixa
     */
    protected $codseq_horfaixa;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="codpes",referencedColumnName="codpes")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Pessoa
     */
    protected $codpes;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="cod_usuario_agendamento",referencedColumnName="cod_usuario")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Usuario
     */
    protected $cod_usuario_agendamento;

    /**
    *
    * @ORM\Column(type="date")
    *
    * @var date
    *
    */
    protected $data_inicial;
    /**
    *
    * @ORM\Column(type="date")
    *
    * @var date
    *
    */
    protected $data_final;

    /**
    *
    * @ORM\Column(type="date")
    *
    * @var date
    *
    */
    protected $data_agendamento;
    
    function getCodseq_periodo()
    {
        return $this->codseq_periodo;
    }

    function getCodseq_freq()
    {
        return $this->codseq_freq;
    }

    function getCod_espaco()
    {
        return $this->cod_espaco;
    }

    function getCodseq_horfaixa()
    {
        return $this->codseq_horfaixa;
    }

    function getCodpes()
    {
        return $this->codpes;
    }

    function getCod_usuario_agendamento()
    {
        return $this->cod_usuario_agendamento;
    }

    function getData_inicial()
    {
        return $this->data_inicial;
    }

    function getData_final()
    {
        return $this->data_final;
    }

    function getData_agendamento()
    {
        return $this->data_agendamento;
    }

    function setCodseq_periodo( $codseq_periodo )
    {
        $this->codseq_periodo = $codseq_periodo;
    }

    function setCodseq_freq( $codseq_freq )
    {
        $this->codseq_freq = $codseq_freq;
    }

    function setCod_espaco( $cod_espaco )
    {
        $this->cod_espaco = $cod_espaco;
    }

    function setCodseq_horfaixa( $codseq_horfaixa )
    {
        $this->codseq_horfaixa = $codseq_horfaixa;
    }

    function setCodpes( $codpes )
    {
        $this->codpes = $codpes;
    }

    function setCod_usuario_agendamento( $cod_usuario_agendamento )
    {
        $this->cod_usuario_agendamento = $cod_usuario_agendamento;
    }

    function setData_inicial( $data_inicial )
    {
        $this->data_inicial = $data_inicial;
    }

    function setData_final( $data_final )
    {
        $this->data_final = $data_final;
    }

    function setData_agendamento( $data_agendamento )
    {
        $this->data_agendamento = $data_agendamento;
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
                'name' => 'data_inicial',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data Inicial não pode estar vazio'),
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

            $inputFilter->add($factory->createInput(array(
                'name' => 'data_final',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data Final não pode estar vazio'),
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

            $inputFilter->add($factory->createInput(array(
                'name' => 'data_agendamento',
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