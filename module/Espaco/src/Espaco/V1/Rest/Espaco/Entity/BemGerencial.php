<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_bem_gerencial") 
 */

class BemGerencial
{

    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;
    
    /**
    * @ORM\Id
    * @ORM\Column(type="string")
    * @var string
    */
   protected $cod_bem_patrimonial;
   
   /**
     * @ORM\ManyToOne(targetEntity="Gerencial")
     * @ORM\JoinColumn(name="cod_conta_gerencial",referencedColumnName="cod_conta_gerencial")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Gerencial
     */
   protected $cod_conta_gerencial;
   
   /**
    * @ORM\Column(type="string")
    * @var integer
    */
   protected $des_conta_gerencial;
   
   /**
    * @ORM\Column(type="integer")
    * @var integer
    */
   protected $plaqueta;
   
   /**
    * @ORM\Column(type="integer")
    * @var integer
    */
   protected $filial;
   
   /**
    * @ORM\Column(type="string")
    * @var string
    */
   protected $cod_conta_contabil;

   /**
    * @ORM\Column(type="string")
    * @var string
    */
   protected $des_conta_contabil;
   
   /**
    * @ORM\Column(type="string")
    * @var string
    */
   protected $local_fisico;
   
   /**
    * @ORM\Column(type="string")
    * @var string
    */
   protected $nom_responsavel_bem;
   
   /**
    * @ORM\Column(type="string")
    * @var string
    */
   protected $des_bem_patrimonial;
   
   /**
    * @ORM\Column(type="string")
    * @var string
    */
   protected $data_aquisicao;
  
    /**
    * 
    * @param string $cod_bem_patrimonial
    */
    public function setCodBenPatrimonial($cod_bem_patrimonial){
        $this->cod_bem_patrimonial =  $cod_bem_patrimonial;
    }
    
    /**
    * 
    * @return $cod_bem_patrimonial
    */
    public function getCodBenPatrimonial(){
        return $this->cod_bem_patrimonial;
    }

    /**
    * 
    * @param string $cod_conta_gerencial
    */
    public function setCodContaGerencial($cod_conta_gerencial){
        $this->cod_conta_gerencial =  $cod_conta_gerencial;
    }
    
    /**
    * 
    * @return $cod_conta_gerencial
    */
    public function getCodContaGerencial(){
        return $this->cod_conta_gerencial;
    }
    
    /**
    * 
    * @param integer $des_conta_gerencial
    */
    public function setDesContaGerencial($des_conta_gerencial){
        $this->des_conta_gerencial =  $des_conta_gerencial;
    }
    
    /**
    * 
    * @return $des_conta_gerencial
    */
    public function getDesContaGerencial(){
        return $this->des_conta_gerencial;
    }
    
    /**
    * 
    * @param integer $plaqueta
    */
    public function setPlaqueta($plaqueta){
        $this->plaqueta =  $plaqueta;
    }
    
    /**
    * 
    * @return $plaqueta
    */
    public function getPlaqueta(){
        return $this->plaqueta;
    }
    
    /**
    * 
    * @param integer $filial
    */
    public function setFilial($filial){
        $this->filial =  $filial;
    }
    
    /**
    * 
    * @return $filial
    */
    public function getFilial(){
        return $this->filial;
    }
    
    /**
    * 
    * @param string $cod_conta_contabil
    */
    public function setCodContaContabil($cod_conta_contabil){
        $this->cod_conta_contabil =  $cod_conta_contabil;
    }
    
    /**
    * 
    * @return $cod_conta_contabil
    */
    public function getCodContaContabil(){
        return $this->cod_conta_contabil;
    }
    
    /**
    * 
    * @param string $des_conta_contabil
    */
    public function setDesContaContabil($des_conta_contabil){
        $this->des_conta_contabil =  $des_conta_contabil;
    }
    
    /**
    * 
    * @return $des_conta_contabil
    */
    public function getDesContaContabil(){
        return $this->des_bem_contabil;
    }

    /**
    * 
    * @param string $local_fisico
    */
    public function setLocalFisico($local_fisico){
        $this->local_fisico =  $local_fisico;
    }
    
    /**
    * 
    * @return $local_fisico
    */
    public function getLocalFisico(){
        return $this->local_fisico;
    }
    
    /**
    * 
    * @param string $nom_responsavel_bem
    */
    public function setNomResponsavelBem($nom_responsavel_bem){
        $this->nom_responsavel_bem =  $nom_responsavel_bem;
    }
    
    /**
    * 
    * @return $nom_responsavel_bem
    */
    public function getNomResponsavelBem(){
        return $this->nom_responsavel_bem;
    }
    
    /**
    * 
    * @param string $des_bem_patrimonial
    */
    public function setDesBemPatrimonial($des_bem_patrimonial){
        $this->des_bem_patrimonial =  $des_bem_patrimonial;
    }
    
    /**
    * 
    * @return $des_bem_patrimonial
    */
    public function getDesBemPatrimonial(){
        return $this->des_bem_patrimonial;
    }
    
    /**
    * 
    * @param string $data_aquisicao
    */
    public function setDataAquisicao($data_aquisicao){
        $this->data_aquisicao =  $data_aquisicao;
    }
    
    /**
    * 
    * @return $data_aquisicao
    */
    public function getDataAquisicao(){
        return $this->data_aquisicao;
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
                    'name' => 'cod_bem_patrimonial',
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
                                'max' => 30,
                                'message' => 'O campo codigo bem patrimonial pode ter no máximo 30 caracteres',
                            ),
                        ),
                    ),
                )
            ));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_conta_gerencial',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                    'name' => 'des_conta_gerencial',
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
                                'max' => 120,
                                'message' => 'O campo Descrissao conta gerencial pode ter no máximo 120 caracteres',
                            ),
                        ),
                    ),
                )
            ));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'plaqueta',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'filial',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_conta_contabil',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('ecoding' => 'UTF-8')
                     ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'ecoding' => 'UTF-8',
                                'max' => 30,
                                'message' => 'O campo Codigo Conta Contabil pode ter no maximo 30 caracteres',
                            ),
                        ),
                    ),
                )
               ));

            $inputFilter->add($factory->createInput(array(
                'name' => 'des_conta_contabil',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('ecoding' => 'UTF-8')
                     ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'ecoding' => 'UTF-8',
                                'max' => 150,
                                'message' => 'O campo Descrissao Conta Contabil pode ter no maximo 150 caracteres',
                            ),
                        ),
                    ),
                )
               ));
            
              $inputFilter->add($factory->createInput(array(
                'name' => 'local_fisico',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('ecoding' => 'UTF-8')
                     ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'ecoding' => 'UTF-8',
                                'max' => 150,
                                'message' => 'O campo Local Fisico pode ter no maximo 150 caracteres',
                            ),
                        ),
                    ),
                )
               ));
              
              $inputFilter->add($factory->createInput(array(
                'name' => 'nom_responsavel_bem',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('ecoding' => 'UTF-8')
                     ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'ecoding' => 'UTF-8',
                                'max' => 80,
                                'message' => 'O campo Nome Responsavel Bem pode ter no maximo 80 caracteres',
                            ),
                        ),
                    ),
                )
               ));
              
              
              $inputFilter->add($factory->createInput(array(
                'name' => 'des_bem_patrimonial',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('ecoding' => 'UTF-8')
                     ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'ecoding' => 'UTF-8',
                                'max' => 200,
                                'message' => 'O campo Descrissao bem Patrimonial pode ter no maximo 200 caracteres',
                            ),
                        ),
                    ),
                )
               ));
              
            $inputFilter->add($factory->createInput(array(
                'name' => 'data_aquisicao',
                'required' => true,
                'filters' => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                    array('name' => 'StringToUpper',
                        'options' => array('ecoding' => 'UTF-8')
                     ),
                    ),
                    'validators' => array(
                        array(
                            'name' => 'StringLength',
                            'options' => array(
                                'ecoding' => 'UTF-8',
                                'max' => 11,
                                'message' => 'O campo Data Aquisicao pode ter no maximo 11 caracteres',
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