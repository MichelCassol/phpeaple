<?php
function autenticar() 
{
    session_start();
    if (!$_SESSION['auth']) {
        header("Location: /");
    }
}
