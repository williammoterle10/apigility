<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_hor_faixa") 
 */

class HorFaixa
{
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

   /**
    * @ORM\Id
    * @ORM\ManyToOne(targetEntity="HorFaixa")
    * @ORM\JoinColumn(name="codseq_horfaixa", referencedColumnName="codseq_horfaixa")
    * @var \Espaco\V1\Rest\Espaco\Entity\HorFaixa
    */
    protected $codseq_horfaixa;
    
    /**
    * @ORM\ManyToOne(targetEntity="HorTipo")
    * @ORM\JoinColumn(name="codseq_tipo", referencedColumnName="codseq_tipo")
    *
    * @var \Espaco\V1\Rest\Espaco\Entity\HorTipo
    */
    protected $codseq_tipo;
    
    /**
    * @ORM\ManyToOne(targetEntity="HorTurno")
    * @ORM\JoinColumn(name="codseq_turno", referencedColumnName="codseq_turno")
    *
    * @var \Espaco\V1\Rest\Espaco\Entity\HorTurno
    */
    protected $codseq_turno;
    
    /**
    * @ORM\Column(type="integer") 
    *  
    * @var integer
    */
    protected $hora_inicial;
    
    /**
    * @ORM\Column(type="integer") 
    *  
    * @var integer
    */
    protected $hora_final;
    
    /**
    * @ORM\Column(type="float") 
    *  
    * @var float
    */
    protected $carga_horaria;
    
    
    /**
    * 
    * @return  $codseq_horfaixa
    */
    public function getCodseqHorfaixa(){
        return $this-> codseq_horfaixa;
    }  
    
    /**
    * 
    * @param integer $codseq_horfaixa
    */
    public function setCodseqHorfaixa($codseq_horfaixa){
        $this->codseq_horfaixa =  $codseq_horfaixa;
    }
    /**
    * 
    * @return  $codseq_tipo
    */
    public function getCodseqTipo(){
        return $this->codseq_tipo;
    }  
    
    /**
    * 
    * @param integer $codseq_tipo
    */
    public function setCodseqTipo($codseq_tipo){
        $this->codseq_tipo =  $codseq_tipo;
    }
    
    /**
    * 
    * @return  $codseq_turno
    */
    public function getCodseqTurno(){
        return $this->codseq_turno;
    }  
    
    /**
    * 
    * @param integer $codseq_turno
    */
    public function setCodseqTurno($codseq_turno){
        $this->codseq_turno =  $codseq_turno;
    }
    
    /**
    * 
    * @return  $hora_inicial
    */
    public function getHoraInicial(){
        return $this->hora_inicial;
    }  
    
    /**
    * 
    * @param integertime $hora_inicial
    */
    public function setHoraFnicial($hora_inicial){
        $this->hora_inicial =  $hora_inicial;
    }
    
    /**
    * 
    * @return  $hora_final
    */
    public function getHoraFinal(){
        return $this->hora_inicial;
    }  
    
    /**
    * 
    * @param integertime $hora_final
    */
    public function setHoraFinal($hora_final){
        $this-> hora_final =  $hora_final;
    }
    
    /**
    * 
    * @return  $carga_horaria
    */
    public function getCargaHoraria(){
        return $this->carga_horaria;
    }  
    
    /**
    * 
    * @param double $carga_horaria
    */
    public function setCargaHoraria($carga_horaria){
        $this->carga_horaria =  $carga_horaria;
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
                'name' => 'codseq_horfaixa',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'codseq_hortipo',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'codseq_turno',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'hora_inicial',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'hora_final',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'hora_final',
                'required' => true,
                'filters' => array(
                    array('name' => 'Float'),
                ),
            )));
         
        	$this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
?>