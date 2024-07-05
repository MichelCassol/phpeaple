<?php 

require_once dirname(__DIR__) . "/autoload.php";
require_once dirname(__DIR__) . "/database/conexao.php";
class UsuarioController
{
    private PDO $db;

    function __construct()
    {
        $this->db = conexao();
    }

    function cadastroUsuario($array_usuario)
    {
        $usuario = new Usuario($this->db);
        $usuario->setNome($array_usuario['nome']);
        $usuario->setEmail($array_usuario['email']);
        $usuario->setSenha(password_hash($array_usuario['senha'], PASSWORD_BCRYPT));
        $usuario->setNascimento($array_usuario['data-nascimento']);
        $usuario->setCaminhoFoto($array_usuario['foto-perfil']);
        $usuario->setDescricao($array_usuario['descricao']);
        $usuario->cadastro();
    }
}
