<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_area_diretoria")
 */
class EspacoAreaDiretoria
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
     * @ORM\ManyToOne(targetEntity="AreaDiretoria")
     * @ORM\JoinColumn(name="cod_area_diretoria",referencedColumnName="cod_area_diretoria")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\AreaDiretoria
     *
     */
    protected $cod_area_diretoria;

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
    public function getCodAreaDiretoria()
    {
        return $this->cod_area_diretoria;
    }

    /**
     * @param integer $cod_area_diretoria
     */
    public function setCodAreaDiretoria($cod_area_diretoria)
    {
        $this->cod_area_diretoria = $cod_area_diretoria;
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
                'name' => 'cod_area_diretoria',
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
