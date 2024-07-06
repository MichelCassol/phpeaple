<?php 

class Usuario 
{
    private $db;
    private int $id;
    private string $nome;
    private string $email;
    private DateTime $nascimento;
    private string $senha;
    private string $caminhoFoto;
    private string $descricao;

    public function __construct(PDO $db){
        $this->db = $db;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNascimento()
    {
        return $this->nascimento;
    }

    public function setNascimento($nascimento)
    {
        $this->nascimento = DateTime::createFromFormat('Y-m-d', $nascimento);
    }

    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = $senha;
    }

    public function getCaminhoFoto()
    {
        return $this->caminhoFoto;
    }

    public function setCaminhoFoto($caminhoFoto)
    {
        $this->caminhoFoto = $caminhoFoto;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;
    }

    public function cadastro() 
    {
        try {
            $stmt = $this->db->prepare("INSERT INTO usuario(nome, senha, email, nascimento, foto_arquivo, descricao) VALUES(:nome, :senha, :email, :nascimento, :foto_arquivo, :descricao)");
            $stmt->bindValue(':nome', $this->nome);
            $stmt->bindValue(':senha', $this->senha);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':nascimento', $this->nascimento->format('Y-m-d'));
            $stmt->bindValue(':foto_arquivo', $this->caminhoFoto);
            $stmt->bindValue(':descricao', $this->descricao);
            $stmt->execute();
        } catch (PDOException $th) {
            echo "Erro: ".$th;
        }       
    }
    
    public function login()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM usuario WHERE email = :email");
            $stmt->bindValue(":email", $this->email);
            $stmt->execute();
            $result = $stmt->fetch();
            if (isset($result['id']) && password_verify($this->senha, $result['senha'])) {
                return $result;
            } else {
                return [];
            }
        } catch (PDOException $th) {
            echo "Erro: ".$th;
            return false;
        }
    }
}
