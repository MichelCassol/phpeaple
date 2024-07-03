<?php 

require_once "conexao.php";

$db = conexao();

$create_table_usuario = "CREATE TABLE IF NOT EXISTS usuario (
    id INTEGER PRIMARY KEY AUTOINCREMENT
    ,nome VARCHAR NOT NULL
    ,idade DATE
    ,senha VARCHAR NOT NULL
    ,email VARCHAR NOT NULL
    ,foto_arquivo VARCHAR
    ,descricao TEXT
)";

$create_table_postagem = "CREATE TABLE IF NOT EXISTS postagem (
    id INTEGER PRIMARY KEY AUTOINCREMENT
    ,id_usuario INTEGER NOT NULL
    ,texto TEXT NOT NULL
    ,imagem_arquivo VARCHAR
    ,data_hora_postagem DATE
    ,FOREIGN KEY (id_usuario) REFERENCES usuario (id)
)";

$create_table_curtidas = "CREATE TABLE IF NOT EXISTS curtidas (
    id INTEGER PRIMARY KEY AUTOINCREMENT
    ,id_usuario INTEGER NOT NULL
    ,id_postagem INTEGER NOT NULL
    ,FOREIGN KEY (id_usuario) REFERENCES usuario (id)
    ,FOREIGN KEY (id_postagem) REFERENCES postagem (id)
)";

$create_table_comentarios = "CREATE TABLE IF NOT EXISTS comentarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT
    ,id_usuario INTEGER NOT NULL
    ,id_postagem INTEGER NOT NULL
    ,comentario TEXT NOT NULL
    ,data_hora DATE NOT NULL
    ,FOREIGN KEY (id_usuario) REFERENCES usuario (id)
    ,FOREIGN KEY (id_postagem) REFERENCES postagem (id)
)";

$create_table_seguidor = "CREATE TABLE IF NOT EXISTS seguidores (
    id INTEGER PRIMARY KEY AUTOINCREMENT
    ,id_usuario INTEGER NOT NULL
    ,id_seguidor INTEGER NOT NULL
    ,FOREIGN KEY (id_usuario) REFERENCES usuario (id)
    ,FOREIGN KEY (id_seguidor) REFERENCES usuario (id)
)";

try {
    $db->beginTransaction();
    $db->exec($create_table_usuario);
    $db->exec($create_table_postagem);
    $db->exec($create_table_curtidas);
    $db->exec($create_table_comentarios);
    $db->exec($create_table_seguidor);
    $db->commit();
    echo "Banco de dados criado com sucesso";
} catch (PDOException $th) {
    $db->rollBack();
    echo "Erro ao criar o banco de dados: " . $th->getMessage();
}
