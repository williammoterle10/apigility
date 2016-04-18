<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_planta") 
 */

class Planta
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
    * @var integer
    */
    protected $cod_planta;
    
    /**
    * @ORM\ManyToOne(targetEntity="Espaco")
    * @ORM\JoinColumn(name="cod_espaco", referencedColumnName="cod_espaco")
    *
    * @var \Espaco\V1\Rest\Espaco\Entity\Espaco
    */
    protected $cod_espaco;
    
    /**
    * @ORM\Column(type="datetime") 
    *  
    * @var datetime
    */
    protected $data_vinculo;
    
    /**
    * @ORM\Column(type="string") 
    *  
    * @var string
    */
    protected $url_planta;
    
    /**
    * @ORM\Column(type="integer") 
    *  
    * @var integer
    */
    protected $cod_usuario;
    
    /**
    * @ORM\Column(type="string") 
    *  
    * @var string
    */
    protected $arquivo_planta;
    
    /**
    * 
    * @return $cod_planta
    */
    public function getCodPlanta(){
        return $this->cod_planta;
    }  
    
    /**
    * 
    * @param integer $cod_planta
    */
    public function setCodPlanta($cod_planta){
        $this->cod_planta = $cod_planta;
    }
    
    /**
    * 
    * @return $cod_espaco
    */
    public function getCodEspaco(){
        return $this->cod_espaco;
    }  
    
    /**
    * 
    * @param integer $cod_espaco
    */
    public function setCodEspaco($cod_espaco){
        $this->cod_espaco = $cod_espaco;
    }
    
    /**
    * 
    * @return $data_vinculo
    */
    public function getDataVinculo(){
        return $this->data_vinculo;
    }  
    
    /**
    * 
    * @param datetime $data_vinculo
    */
    public function setDataVinculo($data_vinculo){
        $this-> data_vinculo = $data_vinculo;
    }
    
    /**
    * 
    * @return $url_planta
    */
    public function getUrlPlanta(){
        return $this->url_planta;
    }  
    
    /**
    * 
    * @param string $url_planta
    */
    public function setUrlPlanta($url_planta){
        $this-> url_planta = $url_planta;
    }
    
     /**
    * 
    * @return $cod_usuario
    */
    public function getCodUsuario(){
        return $this->cod_usuario;
    }  
    
    /**
    * 
    * @param integer $cod_usuario
    */
    public function setCodUsuario($cod_usuario){
        $this-> cod_usuario = $cod_usuario;
    }
    
     /**
    * 
    * @return $arquivo_planta
    */
    public function getArquivoPlanta(){
        return $this->arquivo_planta;
    }  
    
    /**
    * 
    * @param string $arquivo_planta
    */
    public function setArquivoPlanta($arquivo_planta){
        $this-> arquivo_planta = $arquivo_planta;
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
                'name' => 'cod_planta',
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
                'name' => 'data_vinculo',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data vinculo não pode estar vazio'),
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
                    'name' => 'url_planta',
                    'required' => true,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                        array('name' => 'StringToDown',
                            'options' => array('encoding' => 'UTF-8')
                        ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'max' => 400,
                                'message' => 'O campo Url planta pode ter no máximo 400',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo Url Planta não pode estar vazio')
                        )
                    ),
                )
            ));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_usuario',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
           
           $inputFilter->add($factory->createInput(array(
                    'name' => 'arquivo_planta',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim',
                            'options' => array('encoding' => 'UTF-8')
                        ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'encoding' => 'UTF-8',
                                'max' => 400,
                                'message' => 'O campo Arquivo Planta pode ter no máximo 400',
                            ),
                        ),
                        
                    ),
                )
            ));

        	$this->inputFilter = $inputFilter;
        }
        
        return $this->inputFilter;
    }
}
?>