<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/AndromedaGames/css/estilos.css">
    <title>Andrômeda Cup - Login</title>
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
            <h1 style="text-decoration: underline;">Login Andrômeda</h1>
            <br>
            <h5>Realize seu login para entrar em Andrômeda</h5>
        </div>
        <!--<section class="container-form">-->
        <div class="form_container">
        <form method="post" action="../controladora/processar-login.php">
            <div class="form_div">
                <label for="email">E-mail</label>
                <input type="email" id="email" class="row" name="email" placeholder="Digite o seu e-mail" required>
                <br>
                <label for="senha">Senha</label>
                <input type="password" id="senha" name="senha" class="row"  placeholder="Digite a sua senha" required>
                <div class="flex">
                    <input type="submit" class="botao_cadastrar" name="entrar" value="Entrar" />
                    <a href="cadastrar-usuario.php" class="botao_cadastrar">Cadastrar</a>
                </div>
                <?php
                if(isset($_GET["erro"])){{ ?><label>Usuario ou senha invalidos</label><?php }}
                ?>
                </form>
                <div class="flex">
                    <a href="cadastrar-produto.php" class="botao_cadastrar">Cadastrar produto</a>
                </div>
                
            </div>
        </div>

</body>

</html>