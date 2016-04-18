<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_foto")
 */
class Foto
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
    protected $cod_foto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Espaco")
     * @ORM\JoinColumn(name="cod_espaco", referencedColumnName="cod_espaco")
     * 
     * @var \Espaco\V1\Rest\Espaco\Entity\Espaco
     */
    protected $cod_espaco;

    /**
     * 
     * @ORM\Column(type="integer")
     *
     * @var integer
     *
     */
    protected $cod_usuario;
    
    
    /**
     * @ORM\Column(type="datetime")
     * 
     *  @var datetime
     */
    protected $data_vinculo;
    
    /**
     * @ORM\Column(type="string")
     * 
     *  @var string
     */
    protected $url_espaço;
    
    
    /**
     * @ORM\Column(type="string")
     * 
     *  @var string
     */
    protected $arquivo_foto;

    
    /**
     * @return integer
     */
    public function getCodFoto()
    {
        return $this->cod_foto;
    }

    /**
     * @param integer $cod_foto
     */
    public function setCodFoto($cod_foto)
    {
        $this->cod_foto = $cod_foto;
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
     * @return datetime
     */
    public function getDataVinculo()
    {
        return $this->data_vinculo;
    }

    /**
     * @param datetime $data_vinculo
     */
    public function setDataVinculo($data_vinculo)
    {
        $this->data_vinculo = $data_vinculo;
    }

    /**
     * @return string
     */
    public function getUrlEspaco()
    {
        return $this->url_espaço;
    }

    /**
     * @param integer $url_espaço
     */
    public function setUrlEspaco($url_espaço)
    {
        $this->url_espaço = $url_espaço;
    }

    /**
     * @return integer
     */
    public function getCodUsuario()
    {
        return $this->cod_usuario;
    }

    /**
     * @param integer $cod_usuario
     */
    public function setCodUsuario($cod_usuario)
    {
        $this->cod_usuario = $cod_usuario;
    }
    
    /**
     * @return string
     */
    public function getArquivoFoto()
    {
        return $this->arquivo_foto;
    }

    /**
     * @param string $arquivo_foto
     */
    public function setArquivoFoto($arquivo_foto)
    {
        $this->arquivo_foto = $arquivo_foto;
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
                'name' => 'cod_foto',
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
                'name' => 'data_vindulo',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data Vinculo não pode estar vazio'),
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
                'name' => 'url_espaço',
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
                            'max' => 400,
                            'message' => 'O campo descrissao bloco naop pode ter mais de 400 caracteres',
                        ),
                    ),),               
            )));
            
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_usuario',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'arquivo_foto',
                'required' => true,
            )));

            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
}
?>
