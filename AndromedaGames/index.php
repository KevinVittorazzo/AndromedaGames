<?php
    session_start();
    if (!isset($_SESSION["usuario"])){
        header("Location: visao/login.php");
        exit;
    }

    include 'visao/menu.php';
    include 'config/conexao.php';
    include 'modelo/produto.php';
    include 'repositorio/ProdutoRepositorio.php';

    $produtosRepositorio = new ProdutoRepositorio($conn);
    $jogos = $produtosRepositorio->listarJogos();

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/AndromedaGames/css/estilos.css">
    <script src="http://localhost/AndromedaGames/js/carrossel.js" defer></script>
    <title>Andrômeda Games - Início</title>
</head>
<body>
    <header id="index">
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
    <div class="principal_sobre">
        <div class="banner"></div>
        <div id="central1">
            <h1>Destaques da semana!</h1>
            <br>
            <div class="container-slider">
                <button id="prev-button"><img src="http://localhost/AndromedaGames/imagens/arrow.png" alt="prev-button"></button>
                <div class="container-images" id="img">
                    <img src="http://localhost/AndromedaGames/imagens/jogo1.png" alt="jogo" class="slider on">
                    <img src="http://localhost/AndromedaGames/imagens/jogo2.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo3.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo4.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo5.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo6.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo7.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo8.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo9.png" alt="jogo" class="slider">
                    <img src="http://localhost/AndromedaGames/imagens/jogo10.png" alt="jogo" class="slider">
                </div>
                <button id="next-button"><img src="http://localhost/AndromedaGames/imagens/arrow.png" alt="next-button"></button>
            </div>
        </div>
        <div class="prod-title"><h1 style="text-align: center;">Veja nossos principais produtos:</h1></div>
        <div id="central2">
            <br>

            <?php 
               
                foreach ($jogos as $jogo):?>
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="imagens/<?= $jogo->getImagem() ?>">
                        </div>
                        <p><?= $jogo->getNome() ?></p>
                        <p><?= $jogo->getPreco() ?></p>
                    </div>
                <?php endforeach; ?>

        </div>

        <div class="prod-title"><h1 style="text-align: center;">Categorias:</h1></div>

        <div id="central3">
            <div class="categoria">
                <h2>Simulação</h2>
            </div>
            <div class="categoria">
                <h2>Player vs Player</h2>
            </div>
            <div class="categoria">
                <h2>Battle Royale</h2>
            </div>
            <div class="categoria">
                <h2>Quebra-cabeça</h2>
            </div>
            <div class="categoria">
                <h2>RPG</h2>
            </div>
            <div class="categoria">
                <h2>Crianças</h2>
            </div>
            <div class="categoria">
                <h2>Mundo aberto</h2>
            </div>
            <div class="categoria">
                <h2>Ação e aventura</h2>
            </div>
        </div>
    </div>
    <footer></footer>
</body>
</html>