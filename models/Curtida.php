<?php 

class Curtida 
{
    private PDO $db;
    private int $id;
    private int $id_usuario;
    private int $id_postagem;

    public function __construct($db){
        $this->db = $db;
    }

	public function getId_postagem()
	{
		return $this->id_postagem;
	}

	public function setId_postagem($id_postagem)
	{
		$this->id_postagem = $id_postagem;
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

	public function inserir()
	{
		try {
			$stmt = $this->db->prepare("INSERT INTO curtidas (id_usuario, id_postagem) VALUES(:id_usuario, :id_postagem)");
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->bindValue(':id_postagem', $this->id_postagem);
			$stmt->execute();
			return $stmt->fetch();
		} catch (PDOException $th) {
			echo "Erro: ".$th;
			return false;
		}
	}

	public function remover()
	{
		try {
			$stmt = $this->db->prepare("DELETE FROM curtidas WHERE id_usuario = :id_usuario AND id_postagem = :id_postagem");
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->bindValue(':id_postagem', $this->id_postagem);
			$stmt->execute();
			return $stmt->fetch();
		} catch (PDOException $th) {
			echo "Erro: ".$th;
			return false;
		}
	}

	public function consultar()
	{
		try {
			$stmt = $this->db->prepare("SELECT id FROM curtidas WHERE id_usuario = :id_usuario AND id_postagem = :id_postagem");
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->bindValue(':id_postagem', $this->id_postagem);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $th) {
			echo "Erro: ".$th;
			return false;
		}
	}

	public function totalCurtidas()
	{
		try {
			$stmt = $this->db->prepare("SELECT COUNT(id) as total FROM curtidas WHERE id_postagem = :id_postagem");
			$stmt->bindValue(':id_postagem', $this->id_postagem);
			$stmt->execute();
			return $stmt->fetch(PDO::FETCH_ASSOC);
		} catch (PDOException $th) {
			echo "Erro: ".$th;
			return false;
		}
	}
}
