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

    public function deixar_seguir() : bool
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM seguidores WHERE id_usuario = :usuario AND id_seguidor = :seguidor");
            $stmt->bindValue(':usuario', $this->id_usuario);
            $stmt->bindValue(':seguidor', $this->id_seguidor);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }

    public function isSeguidor() : bool
    {
        try {
            $stmt = $this->db->prepare("SELECT id FROM seguidores WHERE id_usuario = :usuario AND id_seguidor = :seguidor");
            $stmt->bindValue(':usuario', $this->id_usuario);
            $stmt->bindValue(':seguidor', $this->id_seguidor);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if (isset($resultado['id']) && $resultado['id'] > 0) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }

    public function totalSeguidores() : int
    {
        try {
            $stmt = $this->db->prepare("SELECT COUNT(id) as total FROM seguidores WHERE id_usuario = :usuario");
            $stmt->bindValue(':usuario', $this->id_usuario);
            $stmt->execute();
            $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($resultado['total'] > 0) {
                return $resultado['total'];
            } else {
                return 0;
            }
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }
}
