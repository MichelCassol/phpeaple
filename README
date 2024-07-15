PHPeople
===
<h1 align="center">
    <img src="https://img.shields.io/gitlab/last-commit/MichelCassol/projeto-devevolutionphp-2024" alt="last-commit">&nbsp;&nbsp;&nbsp;
</h1>

O PHPeople é projeto de rede social simples, desenvolvido em PHP ao fim do curso DevEvolution da [IXC Soft](https://www.ixcsoft.com.br) a fim de aplicar os conhecimento adquiridos.

# :rocket: Tecnologias
    - PHP
    - SQLite
    - HTML
    - Tailwindcss

# :boom: Start

Para iniciar clone o projeto para a máquina utilizando Git ou realize o download do arquivo zip:

~~~ 
git clone https://gitlab.com/MichelCassol/projeto-devevolutionphp-2024.git
~~~

Após o download concluído, utilizando o terminal navegue até a pasta raiz do projeto e inicie o servidor web integrado do PHP:

~~~
php -S localhost:8000
~~~

Em seguida será necessário criar o banco de dados da aplicação, para isso acesse [localhost:8000/database/create_database.php](http://localhost:8000/database/create_database.php).

Assim que o servidor iniciar e o banco de dados for criado, acesse a [localhost:8000](http://localhost:8000/).

Obs: Por padrão o PHP só permite upload de arquivos com até 2Mb. Caso ocorra algum erro ao realizar o upload de uma foto de perfil ou de uma imagem em uma postagem, será necessário alterar essa configuração no arquivo php.ini, para corrigir isso acesse com o usuário root o arquivo:

~~~
sudo nano /etc/php/php.ini
~~~

E edite a variável ´´´upload_max_filesize´´´, o valor de 10 Mb será suficiente.

##  Estrutura do projeto
```
|—— .gitignore
|—— DevEvolution.gaphor
|—— README
|—— autoload.php
|—— index.php
|—— controllers
|    |—— ComentarioController.php
|    |—— CurtidaController.php
|    |—— PostagemController.php
|    |—— SeguidorController.php
|    |—— UsuarioController.php
|—— database
|    |—— conexao.php
|    |—— create_database.php
|    |—— database.sqlite
|—— models
|    |—— Comentario.php
|    |—— Curtida.php
|    |—— Postagem.php
|    |—— Seguidor.php
|    |—— Usuario.php
|—— public
|    |—— atualiza.php
|    |—— cadastro.php
|    |—— config
|        |—— deleta_conta.php
|        |—— logout.php
|        |—— session.php
|    |—— css
|        |—— style.css
|    |—— feed.php
|    |—— login.php
|    |—— perfil.php
|    |—— postagem.php
|    |—— visualizar_post.php
|—— uploads
|    |—— .gitkeep
```

## Referências
- [PHP](https://www.php.net/manual/pt_BR/)
- [Tailwindcss](https://tailwindcss.com/docs/installation)
- [HTML](https://developer.mozilla.org/pt-BR/docs/Web/HTML)
- [SQLite](https://www.sqlite.org/docs.html)