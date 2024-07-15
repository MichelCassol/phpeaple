<?php 
require_once "config/session.php";
require_once dirname(__DIR__) . "/autoload.php";
autenticar();

if (isset($_POST['texto-postagem'])) {
    $postagemController = new PostagemController();

    $postagem = $_POST;
    $postagem['id_usuario'] = $_SESSION['id_usuario'];

    if ($_FILES['arquivo-postagem']['size'] > 0) {
        $pastaUpload = "/uploads/".date('YmdHis')."-post-";
        $nomeArquivo = $_FILES['arquivo-postagem']['name'];
        $arquivo = $pastaUpload . $nomeArquivo;
        $tmp = $_FILES['arquivo-postagem']['tmp_name'];
        if (move_uploaded_file($tmp, dirname(__DIR__).$arquivo)) {
            $postagem['caminho-arquivo'] = $arquivo;
        }
    } else {
        $postagem['caminho-arquivo'] = "";
    }

    $postagemController->inserir($postagem);

    header('Location: /public/perfil.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Nova Postagem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <nav class="bg-gradient-to-r from-cyan-500 to-blue-500 fixed w-full top-0 z-10">
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
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-4xl">
        <h2 class="text-2xl font-bold mb-6 text-center">Nova Postagem</h2>
        <form action="#" method="post" enctype="multipart/form-data" >
            <div class="flex">
                <div class="w-1/2 pr-4">
                    <label for="texto-postagem" class="block text-gray-700 mb-2">Texto da Postagem:</label>
                    <textarea id="texto-postagem" name="texto-postagem" rows="10" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <div class="w-1/2 pl-4 flex flex-col items-center">
                    <label for="arquivo-postagem" class="block text-gray-700 mb-2">Foto da Postagem:</label>
                    <img id="visualizacao-arquivo" src="" class=" rounded-lg border border-gray-300 shadow-lg w-full h-auto object-cover">
                    <label for="arquivo-postagem" class="custom-file-upload">
                        Carregar Imagem
                    </label>
                    <input type="file" id="arquivo-postagem" name="arquivo-postagem" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div>
            </div>
            <div class="flex justify-end mt-6">
                <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-opacity-50 mr-4" onclick="window.location.href='/public/perfil.php'">Cancelar</button>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">Postar</button>
            </div>
        </form>
    </div>

</body>
</html>

<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const preview = document.getElementById('visualizacao-arquivo');
            preview.src = reader.result;
            preview.classList.remove('hidden');
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>