<?php
function autenticar() 
{
    session_start();
    var_export($_SESSION);
    echo PHP_EOL;
    if (!isset($_SESSION['auth'])) {
        header("Location: /");
    }
}
