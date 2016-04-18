<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_curso")
 */
class EspacoCurso
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
     * @var \Teste\V1\Rest\Teste\Entity\Espaco
     *
     */
    protected $cod_espaco;
    
    /**
     * 
     * @ORM\ManyToOne(targetEntity="Curso")
     * @ORM\JoinColumn(name="cod_curso",referencedColumnName="cod_curso")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Curso
     *
     */
    protected $cod_curso;
    
    
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
    public function getCodCurso()
    {
        return $this->cod_curso;
    }

    /**
     * @param string $cod_curso
     */
    public function setCodCurso($cod_curso)
    {
        $this->cod_curso = $cod_curso;
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
                'name' => 'cod_curso',
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
