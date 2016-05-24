<?php
namespace Espaco\V1\Rest\Espaco\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Factory as InputFactory;

/**
 * @ORM\Entity
 * @ORM\Table (name = "schema_sge.sge_espaco")
 */
class Espaco
{
    /**
     * @var \Zend\InputFilter\InputFilter
     */
    protected $inputFilter;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type = "integer")
     *
     * @var integer
     */
    protected $cod_espaco;
    
    /**
     * @ORM\Column(type="float")
     *
     * @var float
     */
    protected $area_total;
    
    /**
     * @ORM\Column(type="integer")
     *
     * @var integer
     */
    protected $maximo_pessoas;
    
    /**
     * @ORM\ManyToOne(targetEntity="TipoEspaco")
     * @ORM\JoinColumn(name="cod_tipo_espaco",referencedColumnName="cod_tipo_espaco")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\TipoEspaco
     */
    protected $cod_tipo_espaco;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="EspacoTipoUso")
     * @ORM\JoinColumn(name="cod_tipo_uso",referencedColumnName="cod_tipo_uso")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\EspacoTipoUso
     */
    protected $cod_tipo_uso;
    
    
    /**
     * @ORM\ManyToOne(targetEntity="Bloco")
     * @ORM\JoinColumn(name="cod_bloco",referencedColumnName="cod_bloco")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Bloco
     */
    protected $cod_bloco;
    
    
    /**
     * @ORM\Column(type="string")
     *
     * @var string
     */
    protected $piso;

    /**
    *@ORM\OneToMany(targetEntity="EspacoAreaDiretoria", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_area_diretoria;

    /**
    *@ORM\OneToMany(targetEntity="EspacoCurso", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_curso;

    /**
    *@ORM\OneToMany(targetEntity="EspacoEspecificidade", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_especificidade;
    
    /**
    *@ORM\OneToMany(targetEntity="EspacoGerencial", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_gerencial;

    /**
    *@ORM\OneToMany(targetEntity="EspacoPerfil", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_perfil;

    /**
    *@ORM\OneToMany(targetEntity="EspacoPessoa", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_pessoa;

    /**
    *@ORM\OneToMany(targetEntity="EspacoRisco", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $espaco_risco;

    /**
    *@ORM\OneToMany(targetEntity="Planta", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $planta;

    /**
    *@ORM\OneToMany(targetEntity="Foto", mappedBy="cod_espaco", cascade={"all"})
    *
    */
    protected $foto;
    
    /**
     * @ORM\ManyToOne(targetEntity="Acessibilidade")
     * @ORM\JoinColumn(name="cod_acessibilidade",referencedColumnName="cod_acessibilidade")
     *
     * @var \Espaco\V1\Rest\Espaco\Entity\Acessibilidade
     */
    protected $cod_acessibilidade;

    /**
    * @ORM\Column(type="string")
    * 
    * @var string
    */
    protected $des_espaco;
    
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
     * @return string
     */
    public function getDesEspaco()
    {
        return $this->des_espaco;
    }

    /**
     * @param string $des_espaco
     */
    public function setDesEspaco($des_espaco)
    {
        $this->des_espaco = $des_espaco;
    }
    
    /**
     * @return float
     */
    public function getAreaTotal()
    {
        return $this->area_total;
    }

    /**
     * @param float $area_total
     */
    public function setAreaTotal($area_total)
    {
        $this->area_total = $area_total;
    }
    
    /**
     * @return integer
     */
    public function getMaximoPessoas()
    {
        return $this->maximo_pessoas;
    }

    /**
     * @param integer $maximo_pessoas
     */
    public function setMaximoPessoas($maximo_pessoas)
    {
        $this->maximo_pessoas = $maximo_pessoas;
    }
    
    /**
     * @return integer
     */
    public function getCodTipoEspaco()
    {
        return $this->cod_tipo_espaco;
    }

    /**
     * @param integer $cod_tipo_espaco
     */
    public function setCodTipoEspaco($cod_tipo_espaco)
    {
        $this->cod_tipo_espaco = $cod_tipo_espaco;
    }
    
    /**
     * @return integer
     */
    public function getCodTipoUso()
    {
        return $this->cod_tipo_uso;
    }

    /**
     * @param integer $cod_tipo_uso
     */
    public function setCodTipoUso($cod_tipo_uso)
    {
        $this->cod_tipo_uso = $cod_tipo_uso;
    }
    
    /**
     * @return integer
     */
    public function getCodBloco()
    {
        return $this->cod_bloco;
    }

    /**
     * @param integer $cod_bloco
     */
    public function setCodBloco($cod_bloco)
    {
        $this->cod_bloco = $cod_bloco;
    }
    
    /**
     * @return string
     */
    public function getPiso()
    {
        return $this->piso;
    }

    /**
     * @param sting $piso
     */
    public function setPiso($piso)
    {
        $this->piso = $piso;
    }
    
    /**
     * @return integer
     */
    public function getCodAcessibilidade()
    {
        return $this->cod_acessibilidade;
    }

    /**
     * @param integer $cod_acessibilidade
     */
    public function setCodAcessibilidade($cod_acessibilidade)
    {
        $this->cod_acessibilidade = $cod_acessibilidade;
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
                'name' => 'cod_espaco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'des_espaco',
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
                            'min' => 2,
                            'max' => 80,
                            'message' => 'O campo descrição do espaco nao pode ter mais de 80 caracteres',
                        ),
                    ),
                ),             
            )));
            
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'area_total',
                'required' => false,
                'filters' => array(
                    array('name' => 'Digits'),
                    ),
            ))); 
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'maximo_pessoas',
                'required' => true,
                'validators' => array(
                        array(
                            'name' => 'NotEmpty',
                            'options' => array(
                                'messages' => array(
                                    'isEmpty' => 'O campo Maximo de pessoas não pode estar vazio'
                                )
                            )
                        ),
                    ),   
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_tipo_espaco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));    
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_tipo_uso',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_bloco',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));
            
            $inputFilter->add($factory->createInput(array(
                'name' => 'piso',
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
                            'message' => 'O campo Codigo Bloco nao pode ter mais de 30 caracteres',
                        ),
                    ),),               
            )));

            $inputFilter->add($factory->createInput(array(
                'name' => 'cod_acessibilidade',
                'required' => true,
                'filters' => array(
                    array('name' => 'Int'),
                ),
            )));


            $this->inputFilter = $inputFilter;
        }

        return $this->inputFilter;
    }
    
    public function getArrayCopy()
    {
        return [
            'cod_espaco' => $this->cod_espaco,
            'des_espaco' => $this->des_espaco,
            'area_total' => $this->area_total,
            'maximo_pessoas' => $this->maximo_pessoas,
            'cod_tipo_espaco' => $this->cod_tipo_espaco->getCod_tipo_espaco(),
            'cod_tipo_uso' => $this->cod_tipo_uso->getCodTipoUso(),
            'cod_bloco' => $this->cod_bloco->getCodBloco(),
            'piso' => $this->piso,
            'cod_acessibilidade' => $this->cod_acessibilidade->getCodAcessibilidade()
        ];
    }
}

?>