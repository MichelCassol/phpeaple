<?php 
require_once dirname(__DIR__) . "/autoload.php";
require_once dirname(__DIR__) . "/database/conexao.php";

class PostagemController
{
    private PDO $db;
    private Postagem $postagem;
    function __construct()
    {
        $this->db = conexao();
        $this->postagem = new Postagem($this->db);
    }

    public function inserir($array_postagem)
    {
        $data_postagem = new DateTime('now');
        $this->postagem->setId_usuario($array_postagem['id_usuario']);
        $this->postagem->setPostagem($array_postagem['texto-postagem']);
        $this->postagem->setImagem_arquivo($array_postagem['caminho-arquivo']);
        $this->postagem->setData_hora($data_postagem->format('Y-m-d H:m:s'));
        return $this->postagem->inserir();
    }
}
