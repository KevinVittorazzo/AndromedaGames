<?php
session_start();
?>

<!DOCTYPE html>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' ) {
  // Obtém os dados enviados
  $usuario = $_POST['usuario'];
  $nomeusuario = $_POST['nome'];

  // Configura as variáveis de sessão, se necessário
  $_SESSION['usuario'] = $usuario;
  $_SESSION['nomeusuario'] = $nomeusuario;
}else{
header("Location: login.php");
exit;
}

require "..\modelo\autenticacao.php";
include 'menu.php';

require_once('../config/conexao.php');
require_once('../modelo/produto.php');
require_once('../repositorio/ProdutoRepositorio.php');

$produtoRepositorio = new ProdutoRepositorio($conn);
$produtos = $produtoRepositorio->buscarTodos();

?>


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
<body>
  <div class="title">
      <h1>Lista de Jogos</h2>
    </div>
  <main id="principal">
    
    <div class="">
      <table>
        <thead>
          <tr>
            <th>Produto</th>
            <th>Plataforma</th>
            <th>Descricão</th>
            <th>Valor</th>
            <th>Categoria</th>
            <th colspan="2">Ação</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($produtos as $produto) : ?>
            <tr>
              <td><?= $produto->getNome();  ?></td>
              <td><?= $produto->getPlataforma();  ?></td>
              <td><?= $produto->getDescricao();  ?></td>
              <td><?= $produto->getPreco();  ?></td>
              <td><?= $produto->getCategoria();  ?></td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nome" value="<?= $_SESSION["nomeusuario"]; ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION["usuario"]; ?>">
                  <input type="submit" class="botao-editar" value="Editar">
                </form>
                
              </td>
              <td>
                <form action="editar-produto.php" method="POST">
                  <input type="hidden" name="id" value="<?= $produto->getId(); ?>">
                  <input type="hidden" name="nome" value="<?= $_SESSION["nomeusuario"]; ?>">
                  <input type="hidden" name="usuario" value="<?= $_SESSION["usuario"]; ?>">
                  <input type="button" class="botao-excluir" value="Excluir">
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
      <div class="flex">
        <a class="botao_cadastrar" href="cadastrar-produto.html">Cadastrar produto</a>
        <input type="submit" class="botao_cadastrar" value="Baixar Relatório" />
      </div>
    </div>
  </main>
</body>

</html>