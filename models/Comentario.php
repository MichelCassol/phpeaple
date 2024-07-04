<?php 

class Comentario 
{
    private $db;
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
		$this->data_hora = $data_hora;
	}
}
