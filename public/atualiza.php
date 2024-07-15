<?php 
require_once "config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

function uploadArquivo(array $arquivoUpload, string $fotoAntiga)
{
    if ($arquivoUpload['foto-perfil']['size'] > 0) {
        $pastaUpload = "/uploads/".date('YmdHis')."-perfil-";
        $nomeArquivo = $arquivoUpload['foto-perfil']['name'];
        $arquivo = $pastaUpload . $nomeArquivo;
        $tmp = $arquivoUpload['foto-perfil']['tmp_name'];
        if (move_uploaded_file($tmp, dirname(__DIR__).$arquivo)) {
            unlink('..'.$fotoAntiga);
            return $arquivo;
        }
    } else {
        return $fotoAntiga;
    }
}

$controllerUsuario = new UsuarioController();

$login = true;
$senhaInvalida = true;

if ($_POST) {
    $dados_usuario = $_POST;  
    $dados_usuario['id'] = $_SESSION['id_usuario'];

    $senha = $dados_usuario['senha'];
    $novaSenha = $dados_usuario['nova-senha'];
    $novaSenhaRep = $dados_usuario['nova-senha-rep'];

    if (($senha && $novaSenha && $novaSenhaRep) && ($novaSenha == $novaSenhaRep)) {
        $login = $controllerUsuario->validaSenha($_SESSION['id_usuario'], $senha);
        if ($login) {
            $dados_usuario['foto-perfil'] = uploadArquivo($_FILES, $dados_usuario['foto-antiga']);
            $_SESSION['foto-perfil'] = $dados_usuario['foto-perfil'];
            $dados_usuario = $controllerUsuario->atualizaCadastro($dados_usuario);
        }
    } elseif(!$senha && !$novaSenha && !$novaSenhaRep) {
        $dados_usuario['foto-perfil'] = uploadArquivo($_FILES, $dados_usuario['foto-antiga']);
        $_SESSION['foto-perfil'] = $dados_usuario['foto-perfil'];
        $dados_usuario = $controllerUsuario->atualizaCadastro($dados_usuario);
    } else {
        $senhaInvalida = false;
    }
    $dados_usuario = $controllerUsuario->consultar($_SESSION['id_usuario']);
} else {
    $dados_usuario = $controllerUsuario->consultar($_SESSION['id_usuario']);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title><?=$dados_usuario['nome']?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <nav class="bg-gradient-to-r from-cyan-500 to-blue-500 fixed w-full h-16 top-0 z-10">
        <div class="container mx-auto px-6 py-3 grid grid-cols-3 justify-between items-center">
            <div class="flex flex-row gap-4 items-center"></div>
            <div class="flex flex-row justify-center items-center">
                <h2 class="text-white text-2xl"><span class="font-bold italic text-4xl">PHP</span>eople</h2>
            </div>
            <div class="flex flex-row justify-end items-center">
                <button class="bg-red-500 text-white px-2 py-1 w-16 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50 mr-4" onclick="window.location.href='/public/config/logout.php'">Sair</button>
            </div>
        </div>
    </nav>
    <form method="post" action="/public/atualiza.php" enctype="multipart/form-data" id="registration-form" class="flex justify-center mt-20 w-[90%]">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl flex">
            <div class="w-[70%] pr-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Atualizar perfil</h2>
                <div class="mb-4">
                    <label for="nome" class="block text-gray-700">Nome:</label>
                    <input type="text" id="nome" name="nome" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?=$dados_usuario['nome']?>" required>
                </div>
                <div class="mb-4">
                    <label for="data-nascimento" class="block text-gray-700">Data de Nascimento:</label>
                    <input type="date" id="data-nascimento" name="data-nascimento" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?=$dados_usuario['nascimento']?>" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="<?=$dados_usuario['email']?>" required>
                </div>
                <div class="mb-4">
                    <label for="descricao" class="block text-gray-700">Sobre você:</label>
                    <textarea id="descricao" rows="3" name="descricao" placeholder="Fale um pouco sobre você em no máximo 100 caracteres" maxlength="100" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"><?=$dados_usuario['descricao']?></textarea>
                </div>
                <div class="mb-4">
                    <label for="nova-senha" class="block text-gray-700">Nova senha:</label>
                    <input type="password" id="nova-senha" name="nova-senha" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="nova-senha-rep" class="block text-gray-700">Repita a nova senha:</label>
                    <input type="password" id="nova-senha-rep" name="nova-senha-rep" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="senha" class="block text-gray-700">Senha:</label>
                    <input type="password" id="senha" name="senha" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Atualizar</button>
                    <button type="button" onclick="window.location.href='/public/perfil.php'" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Cancelar</button>
                    <button type="button" onclick="window.location.href='/public/deleta_conta.php'" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Excluir conta</button>
                </div>
                <?php if (!$login) : ?>
                    <h2 class='text-2md font-bold mt-6 text-center'>E-mail ou senha incorreto!</h2>
                <?php elseif (!$senhaInvalida) : ?>
                    <h2 class='text-2md font-bold mt-6 text-center'>As senhas não conferem!</h2>
                <?php endif ?>
            </div>
            <div class="w-[30%] flex row items-center justify-center">
                <div class="gap-4 flex flex-col justify-center items-center ">
                    <h2 class="flex text-gray-700 font-bold">Foto de Perfil</h2>
                    <input type="hidden" name="foto-antiga" value="<?=$dados_usuario['foto_arquivo']?>">
                    <img id="foto-visual" class="rounded-full border border-gray-300 shadow-lg w-32 h-32 object-cover" src="<?='..'.$dados_usuario['foto_arquivo']?>">
                    <label for="foto-perfil" class="custom-file-upload">
                        Carregar Imagem
                    </label>
                    <input type="file" id="foto-perfil" name="foto-perfil" class="hidden" onchange="previewImage(event)">
                </div>
            </div>
        </div>
    </form>
</body>
</html>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const preview = document.getElementById('foto-visual');
            preview.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
