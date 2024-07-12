<?php 
require_once dirname(__DIR__) . "/autoload.php";

if ($_POST) {
    $controllerUsuario = new UsuarioController();

    $dados_usuario = $_POST;    

    if ($_FILES['foto-perfil']['size'] > 0) {
        $pastaUpload = '/uploads/perfil-';
        $nomeArquivo = $_FILES['foto-perfil']['name'];
        $arquivo = $pastaUpload . $nomeArquivo;
        $tmp = $_FILES['foto-perfil']['tmp_name'];
        if (move_uploaded_file($tmp, dirname(__DIR__).$arquivo)) {
            $dados_usuario['foto-perfil'] = $arquivo;
        }
    } else {
        $dados_usuario['foto-perfil'] = "";
    }

    $controllerUsuario->cadastroUsuario($dados_usuario);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Cadastro</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <form method="post" action="/public/cadastro.php" enctype="multipart/form-data" id="registration-form" class="xl:w-1/3 lg:w-3/5">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-2xl flex">
            <div class="w-3/4 pr-8">
                <h2 class="text-2xl font-bold mb-6 text-center">Cadastro</h2>
                <div class="mb-4">
                    <label for="nome" class="block text-gray-700">Nome:</label>
                    <input type="text" id="nome" name="nome" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="data-nascimento" class="block text-gray-700">Data de Nascimento:</label>
                    <input type="date" id="data-nascimento" name="data-nascimento" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email:</label>
                    <input type="email" id="email" name="email" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="senha" class="block text-gray-700">Senha:</label>
                    <input type="password" id="senha" name="senha" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div class="mb-4">
                    <label for="descricao" class="block text-gray-700">Sobre você:</label>
                    <textarea id="descricao" rows="3" name="descricao" placeholder="Fale um pouco sobre você em no máximo 100 caracteres" maxlength="100" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Cadastrar</button>
                    <button type="button" onclick="window.location.href='/'" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50">Cancelar</button>
                </div>
            </div>
            <div class="w-1/4 flex row items-center justify-center">
                <div class="gap-4 flex flex-col justify-center items-center ">
                    <h2 class="flex text-gray-700 font-bold">Foto de Perfil</h2>
                    <img id="foto-visual" class="rounded-full border border-gray-300 shadow-lg w-32 h-32 object-cover">
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
