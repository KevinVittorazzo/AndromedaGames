<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/AndromedaGames/css/estilos.css">
    <title>Andrômeda Cup - Cadastrar usuário</title>
</head>

<body>
<header>
        <div id="logo_div">
            <img src="http://localhost/AndromedaGames/imagens/logo.png"></img>
        </div>
        <div id="link_div">
            <a href="http://localhost/AndromedaGames/index.php">Início</a>
            <a href="http://localhost/AndromedaGames/index.php#central1">Destaques</a>
            <a href="http://localhost/AndromedaGames/index.php#central2">Jogos</a>
            <a href="http://localhost/AndromedaGames/index.php#central3">Categorias</a>
            <a href="http://localhost/AndromedaGames/visao/login.php">Login</a>
        </div>
    </header>
    <div id="principal_sobre">
        <div class="title">
            <h1 style="text-decoration: underline;">Cadastro em Andrômeda</h1>
            <br>
            <h5>Há um novo planeta se formando...</h5>
        </div>
        <section class="form_container">
            <form method="post" action="../controladora/processar-cadastro.php">
                <div class="form_div">
                    <label for="nome">Nome</label>
                    <input type="text" id="nome" class="row" name="nome" placeholder="Digite seu nome de usuário" required>
                    
                    <label for="email">E-mail</label>
                    <input type="email" id="email" class="row" name="email" placeholder="Digite seu email" required>

                    <label for="senha">Senha</label>
                    <input type="password" id="senha" class="row" name="senha" placeholder="Crie uma senha" required>

                    <label for="confirmarsenha">Confirmar senha</label>
                    <input type="password" id="confirmarsenha" class="row" name="confirmarsenha" placeholder="Digite novamente a sua senha" required>

                    <?php
                        if(isset($_GET["erro"])) { ?><label>Senha e confirmar senha não são iguais</label><?php } 
                    ?>
                
                    <input type="submit" name="cadastro" class="botao_cadastrar" value="Cadastrar"/>
                </div>
            </form>
        </section>
    </div>
</main>
</body>
</html>