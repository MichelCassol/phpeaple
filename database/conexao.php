<?php 
function conexao()
{
    try {
        $path = __DIR__ . '/database.sqlite';
        $pdo = new PDO('sqlite:'.$path);
        $pdo->query('PRAGMA foreign_keys = ON');
        return $pdo;
    } catch (PDOException $th) {
        die("Erro: ". $th->getMessage());
    }
}
