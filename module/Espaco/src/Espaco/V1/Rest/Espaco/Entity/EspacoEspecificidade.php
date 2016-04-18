<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;
/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_especificidade")
 */
class EspacoEspecificidade
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

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
     * @ORM\Id
     * 
     * @ORM\ManyToOne(targetEntity="Especificidade")
     * @ORM\JoinColumn(name="cod_especificidade",referencedColumnName="cod_especificidade")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Especificidade
     *
     */
    protected $cod_especificidade;
    
    
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
    public function getCodEspecificidade()
    {
        return $this->cod_especificidade;
    }

    /**
     * @param string $cod_especificidade
     */
    public function setCodEspecificidade($cod_especificidade)
    {
        $this->cod_especificidade = $cod_especificidade;
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
                'name' => 'cod_especificidade',
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
