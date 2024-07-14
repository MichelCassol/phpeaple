<?php 

class Comentario 
{
    private PDO $db;
    private int $id;
    private int $id_usuario;
    private int $id_postagem;
    private string $comentario;
    private DateTime $data_hora;

    public function __construct($db){
        $this->db = $db;
    }

	public function getComentario()
	{
		return $this->comentario;
	}

	public function setComentario($comentario)
	{
		$this->comentario = $comentario;
	}

	public function getId_usuario()
	{
		return $this->id_usuario;
	}

	public function setId_usuario($id_usuario)
	{
		$this->id_usuario = $id_usuario;
	}

	public function getId_postagem()
	{
		return $this->id_postagem;
	}

	public function setId_postagem($id_postagem)
	{
		$this->id_postagem = $id_postagem;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getData_hora()
	{
		return $this->data_hora;
	}

	public function setData_hora($data_hora)
	{
		$this->data_hora = DateTime::createFromFormat('Y-m-d H:i:s', $data_hora);
	}

	public function inserir() : bool
	{
		try {
			$stmt = $this->db->prepare("INSERT INTO comentarios (id_usuario, id_postagem, comentario, data_hora) VALUES(:id_usuario, :id_postagem, :comentario, :data_hora)");
			$stmt->bindValue(':id_usuario', $this->id_usuario);
			$stmt->bindValue(':id_postagem', $this->id_postagem);
			$stmt->bindValue(':comentario', $this->comentario);
			$stmt->bindValue(':data_hora', $this->data_hora->format('Y-m-d H:i:s'));
			$stmt->execute();
			return true;
		} catch (PDOException $th) {
			echo 'Erro: '.$th;
			return false;
		}
	}

	public function deletar() : bool
	{
		try {
			$stmt = $this->db->prepare("DELETE FROM comentarios WHERE id = :id");
			$stmt->bindValue(':id', $this->id);
			$stmt->execute();
			return true;
		} catch (PDOException $th) {
			echo 'Erro: '.$th;
			return false;
		}
	}

	public function consultaPost() : array
	{
		try {
			$stmt = $this->db->prepare("SELECT * FROM comentarios WHERE id = :id");
			$stmt->bindValue(':id', $this->id);
			$stmt->execute();
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		} catch (PDOException $th) {
			echo 'Erro: '.$th;
			return [];
		}
	}
}
