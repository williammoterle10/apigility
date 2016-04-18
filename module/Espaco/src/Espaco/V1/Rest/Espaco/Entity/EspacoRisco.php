<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_risco")
 */
class EspacoRisco
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
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
     * @ORM\ManyToOne(targetEntity="Risco")
     * @ORM\JoinColumn(name="cod_risco",referencedColumnName="cod_risco")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Risco
     */
    protected $cod_risco;
    
    
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
    public function getCodRisco()
    {
        return $this->cod_risco;
    }

    /**
     * @param string $cod_risco
     */
    public function setCodRisco($cod_risco)
    {
        $this->cod_risco = $cod_risco;
    }
    
    public function getInputFilter()
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_espaco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_risco',
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
