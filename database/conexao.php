<?php 
function conexao()
{
    try {
        $path = __DIR__ . '/database.sqlite';
        $pdo = new PDO('sqlite:'.$path);
        return $pdo;
    } catch (PDOException $th) {
        die("Erro: ". $th->getMessage());
    }
}
