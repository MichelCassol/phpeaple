<?php 
require_once dirname(__DIR__) . "/autoload.php";
require_once dirname(__DIR__) . "/database/conexao.php";

class SeguidorController 
{
    private PDO $db;
    private Seguidor $seguidor;
    function __construct()
    {
        $this->db = conexao();
        $this->seguidor = new Seguidor($this->db);
    }

    public function seguir(int $seguidor, int $usuario)
    {
        $this->seguidor->setId_seguidor($seguidor);
        $this->seguidor->setId_usuario($usuario);
        return $this->seguidor->seguir();
    }
}
