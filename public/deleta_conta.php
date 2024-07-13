<?php 
require_once dirname(__DIR__) . "/config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

$controllerUsuario = new UsuarioController();

$controllerUsuario->deletar($_SESSION['id_usuario']);

require_once dirname(__DIR__) . "/config/logout.php";