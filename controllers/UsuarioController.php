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
            $_SESSION['auth'] = true;
            header('Location: /public/feed.php');
        } else {
            return false;
        }
    }
}
