<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_hor_atendimento")
 */
class EspacoHorAtendimento
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
    protected $codseq_hor_atendimento;

    /**
     * 
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco",referencedColumnName="cod_espaco")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Espaco
     *
     */
    protected $cod_espaco;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="HorFaixa")
     * @ORM\JoinColumn(name="codseq_horfaixa",referencedColumnName="codseq_horfaixa")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\HorFaixa
     *
     */
    protected $codseq_horfaixa;

    /**
     * @return integer
     */
    public function getCodHorAtendimento()
    {
        return $this->codseq_hor_atendimento;
    }

    /**
     * @param integer $codseq_hor_atendimento
     */
    public function setCodHorAtendimento($codseq_hor_atendimento)
    {
        $this->codseq_hor_atendimento = $codseq_hor_atendimento;
    }
    
    
    /**
     * @return integer
     */
    public function getCodEspaco()
    {
        return $this->cod_espaco;
    }

    /**
     * @param integer $cod_espaco
     */
    public function setCodEspaco($cod_espaco)
    {
        $this->cod_espaco = $cod_espaco;
    }
   
    /**
     * @return integer
     */
    public function getCodHorFaixa()
    {
        return $this->codseq_horfaixa;
    }

    /**
     * @param string $codseq_horfaixa
     */
    public function setCodHorFaixa($codseq_horfaixa)
    {
        $this->codseq_horfaixa = $codseq_horfaixa;
    }
    
    public function getInputFilter()
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'codseq_hor_atendimento',
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
                'name' => 'codseq_horfaixa',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));         
            
            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}

?>
