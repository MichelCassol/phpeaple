<?php 
require_once "config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

$controllerUsuario = new UsuarioController();

$arquivos = $controllerUsuario->arquivosUsuario($_SESSION['id_usuario']);

foreach ($arquivos as $arquivo) {
    unlink('..'.$arquivo['arquivo']);
}

$controllerUsuario->deletar($_SESSION['id_usuario']);

require_once "/config/logout.php";