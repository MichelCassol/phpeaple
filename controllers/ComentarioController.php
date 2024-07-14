<?php 
require_once dirname(__DIR__) . "/autoload.php";
require_once dirname(__DIR__) . "/database/conexao.php";

class ComentarioController
{
    private PDO $db;
    private Comentario $comentario;

    public function __construct()
    {
        $this->db = conexao();
        $this->comentario = new Comentario($this->db);
    }

    public function inserir(array $comentario)
    {
        $this->comentario->setComentario($comentario['novo-comentario']);
        $this->comentario->setId_postagem($comentario['id_postagem']);
        $this->comentario->setId_usuario($comentario['id_usuario']);
        $this->comentario->setData_hora($comentario['data_hora']);
        $this->comentario->inserir();
    }
}
