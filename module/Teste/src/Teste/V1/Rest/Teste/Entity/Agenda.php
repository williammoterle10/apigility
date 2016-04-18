<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_agenda") 
 */

class Agenda
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
    protected $cod_agenda;

    /**
    *
    * @ORM\Column(type="integer");
    *
    * @var integer
    *
    */
    protected $cod_horario ;

    /**
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="codpes",referencedColumnName="codpes")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Pessoa
     */
    protected $codpes;

    /**
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco",referencedColumnName="cod_espaco")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Espaco
     */
    protected $cod_espaco;

    /**
    * @ORM\Column(type="string", length=200)
    * 
    * @var string
    */
    protected $observacao;

    /**
    *
    * @ORM\Column(type="date")
    *
    * @var date
    *
    */
    protected $data_agenda;
    
    function getCod_agenda()
    {
        return $this->cod_agenda;
    }

    function getCod_horario()
    {
        return $this->cod_horario;
    }

    function getCodpes()
    {
        return $this->codpes;
    }

    function getCod_espaco()
    {
        return $this->cod_espaco;
    }

    function getObservacao()
    {
        return $this->observacao;
    }

    function getData_agenda()
    {
        return $this->data_agenda;
    }

    function setCod_agenda( $cod_agenda )
    {
        $this->cod_agenda = $cod_agenda;
    }

    function setCod_horario( $cod_horario )
    {
        $this->cod_horario = $cod_horario;
    }

    function setCodpes( $codpes )
    {
        $this->codpes = $codpes;
    }

    function setCod_espaco( $cod_espaco )
    {
        $this->cod_espaco = $cod_espaco;
    }

    function setObservacao( $observacao )
    {
        $this->observacao = $observacao;
    }

    function setData_agenda( $data_agenda )
    {
        $this->data_agenda = $data_agenda;
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
                'name' => 'cod_agenda',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_espaco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_horario',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'data_agenda',
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
                    'name' => 'observacao',
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
                                'max' => 200,
                                'message' => 'O campo observação pode ter no máximo 30',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo observação não pode estar vazio')
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