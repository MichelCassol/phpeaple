<?php 

class Usuario 
{
    private $db;
    private int $id;
    private string $nome;
    private string $email;
    private DateTime $nascimento;
    private string $senha;
    private string $caminhoFoto;
    private string $descricao;

    public function __construct($db){
        $this->db = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNascimento()
    {
        return $this->nascimento;
    }

    public function setNascimento($nascimento)
    {
        $this->nascimento = $nascimento;
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getCaminhoFoto()
    {
        return $this->caminhoFoto;
    }

    public function setCaminhoFoto($caminhoFoto)
    {
        $this->caminhoFoto = $caminhoFoto;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }
}
