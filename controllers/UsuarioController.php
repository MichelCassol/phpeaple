<?php 
session_start();
require_once dirname(__DIR__) . "/autoload.php";
require_once dirname(__DIR__) . "/database/conexao.php";
class UsuarioController
{
    private PDO $db;
    private Usuario $usuario;

    function __construct()
    {
        $this->db = conexao();
        $this->usuario = new Usuario($this->db);
    }

    function cadastroUsuario($array_usuario)
    {
        $this->usuario->setNome($array_usuario['nome']);
        $this->usuario->setEmail($array_usuario['email']);
        $this->usuario->setSenha(password_hash($array_usuario['senha'], PASSWORD_BCRYPT));
        $this->usuario->setNascimento($array_usuario['data-nascimento']);
        $this->usuario->setCaminhoFoto($array_usuario['foto-perfil']);
        $this->usuario->setDescricao($array_usuario['descricao']);
        $this->usuario->cadastro();
    }

    function login($array_usuario)
    {
        $this->usuario->setEmail($array_usuario['email']);
        $this->usuario->setSenha($array_usuario['senha']);
        $login = $this->usuario->login();
        if (isset($login['id'])) {
            $_SESSION['id_usuario'] = $login['id'];
            $_SESSION['usuario'] = $login['nome'];
            $_SESSION['foto-perfil'] = $login['foto_arquivo'];
            $_SESSION['auth'] = true;
            return true;
        } else {
            return false;
        }
    }

    function consultar($id)
    {
        $this->usuario->setId($id);
        return $this->usuario->consultar();
    }

    function atualizaCadastro($array_usuario)
    {
        $this->usuario->setEmail($array_usuario['email']);
        $this->usuario->setSenha($array_usuario['senha']);
        $resultado = $this->usuario->login();
        if (isset($resultado['id'])) {
            $this->usuario->setNome($array_usuario['nome']);
            $this->usuario->setEmail($array_usuario['email']);
            $this->usuario->setSenha(password_hash($array_usuario['novasenha'], PASSWORD_BCRYPT));
            $this->usuario->setNascimento($array_usuario['data-nascimento']);
            $this->usuario->setCaminhoFoto($array_usuario['foto-perfil']);
            $this->usuario->setDescricao($array_usuario['descricao']);
            return $this->usuario->cadastro();
        }
    }
}
