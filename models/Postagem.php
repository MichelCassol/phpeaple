<?php 

class Postagem
{
    private $db;
    private int $id;
    private int $id_usuario;
    private string $postagem;
    private string $imagem_arquivo;
    private DateTime $data_hora;

    public function __construct($db){
        $this->db = $db;
    }
    
    public function getData_hora()
    {
        return $this->data_hora;
    }

    public function setData_hora($data_hora)
    {
        $this->data_hora = $data_hora;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getPostagem()
    {
        return $this->postagem;
    }

    public function setPostagem($postagem)
    {
        $this->postagem = $postagem;
    }

    public function getImagem_arquivo()
    {
        return $this->imagem_arquivo;
    }

    public function setImagem_arquivo($imagem_arquivo)
    {
        $this->imagem_arquivo = $imagem_arquivo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}
