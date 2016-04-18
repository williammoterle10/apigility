<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_curso")
 */
class Curso
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $cod_curso;
    
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $des_curso;
    
    /**
     * @return integer
     */
    public function getCodCurso()
    {
        return $this->cod_curso;
    }

    /**
     * @param integer $cod_curso
     */
    public function setCodCurso($cod_curso)
    {
        $this->cod_curso = $cod_curso;
    }
    
    /**
     * @return string
     */
    public function getDesCurso()
    {
        return $this->des_curso;
    }

    /**
     * @param string $des_curso
     */
    public function setDesCurso($des_curso)
    {
        $this->des_curso = $des_curso;
    }
    
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    public function getInputFilter()
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'des_curso',
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
                            'max' => 80,
                            'message' => 'O campo descrissao curso nao pode ter mais de 80 caracteres',
                        ),
                    ),),               
            )));
            
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_curso',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_campus',
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
