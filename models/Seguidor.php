<?php 

class Seguidor 
{
    private PDO $db;
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
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function seguir() : bool
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO seguidores (id_usuario, id_seguidor) VALUES(:usuario, :seguidor)");
            $stmt->bindValue(':usuario', $this->id_usuario);
            $stmt->bindValue(':seguidor', $this->id_seguidor);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }
}
