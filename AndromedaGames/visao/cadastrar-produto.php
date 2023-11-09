<?php

    require "../config/conexao.php";
    require "../modelo/produto.php";
    require "../repositorio/produtoRepositorio.php";

    if (isset($_POST['cadastro'])){
        $produto = new Produto(10,
            $_POST['id'],
            $_POST['nome'],
            $_POST['imagem'],
            $_POST['categoria'],
            $_POST['tipo'],
            $_POST['preco'],
            $_POST['descricao'],

        );

        $produtoRepositorio = new ProdutoRepositorio($conn);
        $produtoRepositorio->cadastrar($produto);

    }

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/AndromedaGames/css/estilos.css">
    <title>Andrômeda Games - Cadastrar Jogo</title>
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
            <h1 style="text-decoration: underline;">Cadastro de jogos</h1>
            <br>
            <h5>Qual será a próxima estrela que brilhará em Andrômeda?</h5>
    </div>
    <section class="container-form">
        <form action="../controladora/processar-produtos.php" method="POST">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>

            <div class="container-radio">
                <div>
                    <label for="plataforma">Plataforma:</label>
                </div>
                <div>
                    <label for="switch">Switch</label>
                    <input type="radio" id="switch" name="plataforma" value="Switch" checked>
                </div>
                <div>
                    <label for="xbox">Xbox</label>
                    <input type="radio" id="xbox" name="plataforma" value="Xbox">
                </div>
                <div>
                    <label for="pc">Pc</label>
                    <input type="radio" id="pc" name="plataforma" value="Pc">
                </div>
                <div>
                    <label for="playstation">PlayStation</label>
                    <input type="radio" id="playstation" name="plataforma" value="PlayStation">
                </div>
            </div>

            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>

            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" required>

            <label for="imagem">Envie o banner</label>
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

            <div class="container-radio">
                <div>
                    <label for="categoria">Categoria:</label>
                </div>
                    <select name="categoria">
                    <option value="" selected disabled placeholder>Escolha uma categoria</option>
                    <option value="Ação/Aventura">Ação/Aventura</option>
                    <option value="Jogo Online">Jogo Online</option>
                    <option value="RPG">RPG</option>
                    <option value="Simulação">Simulaçãp</option>
                    <option value="Terror">Terror</option>
                </datalist>
            </div>

            <input type="submit" name="cadastro" class="botao_cadastrar" value="Cadastrar produto"/>
        </form>
    
    </section>
</main>
</body>
</html>