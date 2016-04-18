<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/** 
 * @ORM\Entity 
 * @ORM\Table(name="schema_sge.sge_pessoa") 
 */

class Pessoa
{
    /**
     *
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

   /**
    * @ORM\Id
    * @ORM\Column(type="integer") 
    * @var integer
    */
    protected $codpes;
    
    /**
    * @ORM\Column(type="string") 
    *  
    * @var string
    */
    protected $nompes;
    
    /**
    * @ORM\Column(type="boolean") 
    *  
    * @var boolean
    */
    protected $flag_professor;
    
    /**
    * @ORM\Column(type="boolean") 
    *  
    * @var boolean
    */
    protected $flag_aluno;
    
    /**
    * @ORM\Column(type="boolean") 
    *  
    * @var boolean
    */
    protected $flag_estagiario;
    
    /**
    * @ORM\Column(type="datetime") 
    *  
    * @var datetime
    */
    protected $data_ultima_atualizacao;
    
    /**
    * @ORM\Column(type="string") 
    *  
    * @var string
    */
    protected $lotacao;
    
    /**
    * @ORM\Column(type="text") 
    *  
    * @var string
    */
    protected $foto;
    
    /**
    * @ORM\Column(type="integer") 
    *  
    * @var integer
    */
    protected $status_pessoa;
    
    /**
    * @ORM\Column(type="boolean") 
    *  
    * @var boolean
    */
    protected $flag_funcionario;
    
    /**
    * 
    * @param integer $codpes
    */
    public function setCodPessoa($codpes){
        $this->codpes = $codpes;
    }

    /**
    * 
    * @return $codpes
    */
    public function getCodPessoa(){
        return $this->codpes;
    }
    
    /**
    * 
    * @param string $nompes
    */
    public function setNomPessoa($nompes){
        $this->nompes = $nompes;
    }

    /**
    * 
    * @return $nompes
    */
    public function getNomPessoa(){
        return $this->nompes;
    }    

    /**
    * 
    * @param boolean $flag_professor
    */
    public function setFlagProfessor($flag_professor){
        $this->flag_professor = $flag_professor;
    }

    /**
    * 
    * @return $flag_professor
    */
    public function getFlagProfessor(){
        return $this->flag_professor;
    }   

    /**
    * 
    * @return $flag_aluno
    */
    public function getFlagAluno(){
        return $this->flag_aluno;
    }  
    
    /**
    * 
    * @param boolean $flag_aluno
    */
    public function setFlagAluno($flag_aluno){
        $this->flag_aluno = $flag_aluno;
    }
    
    /**
    * 
    * @return $flag_funcionario
    */
    public function getFlagFuncionario(){
        return $this->flag_funcionario;
    }  
    
    /**
    * 
    * @param boolean $flag_funcionario
    */
    public function setFlagFuncionario($flag_funcionario){
        $this->flag_funcionario = $flag_funcionario;
    }
    
    /**
    * 
    * @return $data_ultima_atualizacao
    */
    public function getDataUltimaAtualizacao(){
        return $this->data_ultima_atualizacao;
    }  
    
    /**
    * 
    * @param datetime $data_ultima_atualizacao
    */
    public function setDataUltimaAtualizacao($data_ultima_atualizacao){
        $this->data_ultima_atualizacao = $data_ultima_atualizacao;
    }
    
    /**
    * 
    * @return $lotacao
    */
    public function getLotacao(){
        return $this->lotacao;
    }  
    
    /**
    * 
    * @param string $lotacao
    */
    public function setLotacao($lotacao){
        $this->lotacao = $lotacao;
    }
    
    /**
    * 
    * @return $foto
    */
    public function getFoto(){
        return $this->foto;
    }  
    
    /**
    * 
    * @param string $foto
    */
    public function setFoto($foto){
        $this->foto = $foto;
    }
    
    /**
    * 
    * @return $status_pessoa
    */
    public function getStatusPessoa(){
        return $this->status_pessoa;
    }  
    
    /**
    * 
    * @param integer $status_pessoa
    */
    public function setStatusPessoa($status_pessoa){
        $this->status_pessoa = $status_pessoa;
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
                'name' => 'codpes',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                    'name' => 'nompes',
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
                                'max' => 100,
                                'message' => 'O campo nome Pessoa pode ter no máximo 100',
                            ),
                        ),
                        array(
                            'name' => 'NotEmpty',
                            'options' => array('message' => 'O campo nome pessoa não pode estar vazio')
                        )
                    ),
                )
            ));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'flag_professor',
                'required' => true,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'flag_aluno',
                'required' => true,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'flag_estagiario',
                'required' => true,
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'flag_funcionario',
                'required' => true,
            )));

           $inputFilter->add($factory->createInput(array(
                'name' => 'data_ultima_atualizacao',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'NoEmpty',
                        'options' => array(
                            'messages' => array('isEmpty' => 'O campo Data ultima atualizacao não pode estar vazio'),
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
                    'name' => 'lotacao',
                    'required' => false,
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
                                'max' => 200,
                                'message' => 'O campo Lotacao pode ter no máximo 200',
                            ),
                        ),
                        
                    ),
                )
            ));
           
           $inputFilter->add($factory->createInput(array(
                    'name' => 'foto',
                    'required' => false,
                    'filters' => array(
                        array('name' => 'StripTags'),
                        array('name' => 'StringTrim'),
                        array('name' => 'StringToUpper',
                            'options' => array('encoding' => 'UTF-8')
                        ),
                    ),
                    
                )
            ));
           
           $inputFilter->add($factory->createInput(array(
                'name' => 'status_pessoa',
                'required' => false,
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