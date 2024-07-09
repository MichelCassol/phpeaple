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
        // die(var_dump(date("Y-m-d H:i:s")));
        $this->postagem->setId_usuario($array_postagem['id_usuario']);
        $this->postagem->setPostagem($array_postagem['texto-postagem']);
        $this->postagem->setImagem_arquivo($array_postagem['caminho-arquivo']);
        $this->postagem->setData_hora(date("Y-m-d H:i:s"));
        return $this->postagem->inserir();
    }

    public function postsUsuario(int $id_usuario) : array
    {
        $this->postagem->setId_usuario($id_usuario);
        return $this->postagem->postagensUsuario();
    }

    public function todasPostagens() : array
    {
        return $this->postagem->todasPostagens();
    }
}
