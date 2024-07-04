<?php 

class Seguidor 
{
    private $db;
    private int $id;
    private int $id_usuario;
    private int $id_seguidor;

    public function __construct($db){
        $this->db = $db;
    }
    
    public function getId_seguidor()
    {
        return $this->id_seguidor;
    }

    public function setId_seguidor($id_seguidor)
    {
        $this->id_seguidor = $id_seguidor;

        return $this;
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}
