<?php 
require_once "session.php";
require_once dirname(__DIR__, 2) . "/autoload.php";
autenticar();

$controllerUsuario = new UsuarioController();

$arquivos = $controllerUsuario->arquivosUsuario($_SESSION['id_usuario']);

foreach ($arquivos as $arquivo) {
    unlink(dirname(__DIR__, 2).$arquivo['arquivo']);
}

$controllerUsuario->deletar($_SESSION['id_usuario']);

require_once "logout.php";