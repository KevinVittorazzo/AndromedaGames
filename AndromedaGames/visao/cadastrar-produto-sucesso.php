<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/AndromedaGames/css/estilos.css">
    <title>Andrômeda Games - Cadastro Feito</title>
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
            <h1 style="text-decoration: underline;">Cadastro realizado com sucesso!</h1>
            <br>
            <h5>Nossa galáxia está ainda mais brilhante!</h5>
        </div>
        <section class="form_container">
            <form method="post" action="../index.php">
                <div class="form_div">                
                    <input type="submit" name="voltar" class="botao_cadastrar" value="Voltar ao início"/>
                </div>
            </form>
            <form method="post" action="cadastrar-produto.php">
                <div class="form_div">                
                    <input type="submit" name="voltar" class="botao_cadastrar" value="Novo cadastro"/>
                </div>
            </form>
        </section>
    </div>
</main>
</body>
</html>