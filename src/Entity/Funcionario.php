<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Validator as AppAssert;
/**
 * @ORM\Entity(repositoryClass="App\Repository\FuncionarioRepository")
 */
class Funcionario
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $matricula;

    /**
     * @ORM\Column(type="string", length=11, unique=true)
     * @AppAssert\Cpf
     */
    private $cpf;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $endereco;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Secretaria", inversedBy="secretaria")
     * @ORM\JoinColumn(nullable=false)
     */
    private $secretaria;

    /**
     * @ORM\Column(type="integer")
     */
    private $status;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $tipo;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Remuneracao", inversedBy="funcionario", cascade={"persist", "remove"})
     */
    private $remuneracao;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\User", mappedBy="funcionario")     
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Contato", inversedBy="funcionarios", cascade={"persist", "remove"})
     * * @ORM\JoinColumn(nullable=true)
     */
    private $contato;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $admissao;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $exoneracao;

    
    public function getId()
    {
        return $this->id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getMatricula()
    {
        return $this->matricula;
    }

    public function setMatricula(string $matricula): self
    {
        $this->matricula = $matricula;

        return $this;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): self
    {
        $this->cpf = $cpf;

        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco(string $endereco): self
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getSecretaria()
    {
        return $this->secretaria;
    }

    public function setSecretaria(Secretaria $secretaria): self
    {
        $this->secretaria = $secretaria;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(int $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getRemuneracao()
    {
        return $this->remuneracao;
    }

    public function setRemuneracao(Remuneracao $remuneracao): self
    {
        $this->remuneracao = $remuneracao;

        return $this;
    }

    public function __toString() 
    {
        return $this->getNome();
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getContato()
    {
        return $this->contato;
    }

    public function setContato(Contato $contato): self
    {
        $this->contato = $contato;

        return $this;
    }

    public function getAdmissao()
    {
        return $this->admissao;
    }

    public function setAdmissao(?\DateTimeInterface $admissao): self
    {
        $this->admissao = $admissao;

        return $this;
    }

    public function getExoneracao()
    {
        return $this->exoneracao;
    }

    public function setExoneracao(?\DateTimeInterface $exoneracao): self
    {
        $this->exoneracao = $exoneracao;

        return $this;
    }

}
