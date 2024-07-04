<?php 

class Curtida 
{
    private $db;
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
}
