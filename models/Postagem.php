<?php 

class Postagem
{
    private PDO $db;
    private int $id;
    private int $id_usuario;
    private string $postagem;
    private string $imagem_arquivo;
    private DateTime $data_hora;

    public function __construct($db){
        $this->db = $db;
    }
    
    public function getData_hora()
    {
        return $this->data_hora;
    }

    public function setData_hora($data_hora)
    {
        $this->data_hora = DateTime::createFromFormat('Y-m-d H:m:s', $data_hora);
    }

    public function getId_usuario()
    {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    public function getPostagem()
    {
        return $this->postagem;
    }

    public function setPostagem($postagem)
    {
        $this->postagem = $postagem;
    }

    public function getImagem_arquivo()
    {
        return $this->imagem_arquivo;
    }

    public function setImagem_arquivo($imagem_arquivo)
    {
        $this->imagem_arquivo = $imagem_arquivo;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function inserir() : bool
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO postagem (id_usuario, texto, imagem_arquivo, data_hora_postagem) VALUES(:id_usuario, :texto, :imagem_arquivo, :data_hora)");
            $stmt->bindValue(':id_usuario', $this->id_usuario);
            $stmt->bindValue(':texto', $this->postagem);
            $stmt->bindValue(':imagem_arquivo', $this->imagem_arquivo);
            $stmt->bindValue(':data_hora', $this->data_hora->format('Y-m-d H:m:s'));
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }

    public function deletar() : bool
    {
        try {
            $stmt = $this->db->prepare("DELETE FROM postagem WHERE id = :id");
            $stmt->bindValue(':id', $this->id);
            $stmt->execute();
            return true;
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }

    public function postagensUsuario() : array
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM postagem WHERE id_usuario = :id_usuario ORDER BY id DESC");
            $stmt->bindValue(':id_usuario', $this->id_usuario);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return [];
        }
    }
}
