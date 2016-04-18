<?php
namespace Teste\V1\Rest\Teste\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco_pessoa")
 */
class EspacoPessoa
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco",referencedColumnName="cod_espaco")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Espaco
     *
     */
    protected $cod_espaco;
    
    /**
     * @ORM\ManyToOne(targetEntity="Pessoa")
     * @ORM\JoinColumn(name="codpes",referencedColumnName="codpes")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Pessoa
     *
     */
    protected $codpes;

    /**
     * @ORM\ManyToOne(targetEntity="StatusPessoa")
     * @ORM\JoinColumn(name="cod_pessoa_status",referencedColumnName="cod_pessoa_status")
     *
     * @var \Teste\V1\Rest\Teste\Entity\StatusPessoa
     *
     */
    protected $cod_pessoa_status;

    /**
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumn(name="cod_usuario",referencedColumnName="cod_usuario")
     *
     * @var \Teste\V1\Rest\Teste\Entity\Usuario
     *
     */
    protected $cod_usuario;

    /**
     * @ORM\Column(type="datetime")
     *
     * @var datetime
     */
    protected $data_vinculo;
        
    
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
    public function getCodPessoa()
    {
        return $this->codpes;
    }

    /**
     * @param string $codpes
     */
    public function setCodPessoa($codpes)
    {
        $this->codpes = $codpes;
    }

    /**
     * @return integer
     */
    public function getCodStatusPessoa()
    {
        return $this->cod_pessoa_status;
    }

    /**
     * @param string $cod_pessoa_status
     */
    public function setCodStatusPessoa($cod_pessoa_status)
    {
        $this->cod_pessoa_status = $cod_pessoa_status;
    }

     /**
     * @return integer
     */
    public function getCodUsuario()
    {
        return $this->cod_usuario;
    }

    /**
     * @param string $cod_usuario
     */
    public function setCodUsuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;
    }

    public function setDataVinculo($data_vinculo){
        $this->data_vinculo = $data_vinculo;
    }

    public function getDataVinculo(){
        return $this->data_vinculo;
    }
    
    public function getInputFilter()
    {

        if (!$this->inputFilter) {
            $inputFilter = new InputFilter();
            $factory = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_usuario',
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
                'name' => 'codpes',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_pessoa_status',
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
