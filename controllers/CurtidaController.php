<?php 
require_once dirname(__DIR__) . "/autoload.php";
require_once dirname(__DIR__) . "/database/conexao.php";

class CurtidaController 
{
    private PDO $db;
    private Curtida $curtida;
    function __construct()
    {
        $this->db = conexao();
        $this->curtida = new Curtida($this->db);
    }

    function inserir(int $id_post, int $id_usuario)
    {
        $this->curtida->setId_postagem($id_post);
        $this->curtida->setId_usuario($id_usuario);
        return $this->curtida->inserir();
    }

    function remover(int $id_post, int $id_usuario)
    {
        $this->curtida->setId_postagem($id_post);
        $this->curtida->setId_usuario($id_usuario);
        return $this->curtida->remover();
    }

    function consultar(int $id_post, int $id_usuario)
    {
        $this->curtida->setId_postagem($id_post);
        $this->curtida->setId_usuario($id_usuario);
        $resultado = $this->curtida->consultar();
        if ($resultado['id'] > 0) {
            return true;
        } else {
            return false;
        }
    }

    function totalCurtidas(int $id_postagem)
    {
        $this->curtida->setId_postagem($id_postagem);
        $resultado = $this->curtida->totalCurtidas();
        return $resultado['total'];
    }
}
