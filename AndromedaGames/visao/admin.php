<!doctype html>
<?php

require "..\modelo\autenticacao.php";
include 'menu.php';

require_once('../config/conexao.php');
require_once('../Modelo/produto.php');
require_once('../Repositorio/ProdutoRepositorio.php');

$produtoRepositorio = new ProdutoRepositorio($conn);
$produtos = $produtoRepositorio->buscarTodos();


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
<body>
  <main>
    <section class="container-admin-banner">
      <!--<img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto"> -->

      <!--<img class= "ornaments" src="../img/ornaments-coffee.png" alt="ornaments">-->
    </section>
    <h2>Lista de Jogos</h2>

    <section class="container-table">
      <table>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Tipo</th>
            <th>Descricão</th>
            <th>Valor</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto) : ?>
            <tr>
              <td><?= $produto->getNome();  ?></td>
              <td><?= $produto->getTipo();  ?></td>
              <td><?= $produto->getDescricao();  ?></td>
              <td>R$ <?= $produto->getPreco();  ?></td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nome" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="submit" class="botao-editar" value="Editar">
                </form>
                
              </td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nome" value="<?= $_SESSION['nomeusuario']; ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION['usuario']; ?>">
                  <input type="button" class="botao-excluir" value="Excluir">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>

        </tbody>
      </table>
      <a class="botao-cadastrar" href="cadastrar-produto.html">Cadastrar produto</a>
      <form action="#" method="post">
        <input type="submit" class="botao-cadastrar" value="Baixar Relatório" />
      </form>
    </section>
  </main>
</body>

</html>