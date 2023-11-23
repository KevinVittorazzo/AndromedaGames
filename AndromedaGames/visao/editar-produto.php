<?php

session_start();
 ?>


<!doctype html>


<?php
// Verifica se os dados foram recebidos via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Obtém os dados enviados
  $usuario = $_POST['usuario'];
  $nomeusuario = $_POST['nomeusuario'];


  // Faz alguma coisa com os dados recebidos, se necessário
  // ...


  // Configura as variáveis de sessão, se necessário
  $_SESSION['usuario'] = $usuario;
  $_SESSION['nomeusuario'] = $nomeusuario;


} else {
  header("Location: login.php");
  exit;
}
include 'menu.php';
include '..\config\conexao.php';
include '..\modelo\produto.php';
include '..\repositorio\ProdutoRepositorio.php';


$produtosRepositorio = new ProdutoRepositorio($conn);

$produto = $produtosRepositorio->ListarJogoPorId($_POST['id']);
?>
<html lang="pt-br">


<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/index.css">
  <link rel="stylesheet" href="../css/admin.css">
  <link rel="stylesheet" href="../css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="../img/icone-serenatto.png" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>IFSP - Editar Produto</title>
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
    <h1 style="text-decoration: underline;">Editar Produto</h1>
  </div>
  <main id="principal">
    <section class="form_container">
      <form method="POST" action="../controladora/processar-editar-produto.php" id="editarForm" enctype="multipart/form-data">


        <label for="nome">Nome</label>
        <input type="text" id="nome" name="nome" value="<?php echo $produto->getNome(); ?>" required>

        <div class="container-radio">
          <div>
            <label for="plataforma">Plataforma:</label>
          </div>
          <div>
            <label for="switch">Switch</label>
            <input type="radio" id="switch" name="plataforma" value="Switch" <?php if ($produto->getPlataforma()=="Switch"){?>checked<?php} else {?> > <?php } ?>
          </div>
          <div>
            <label for="xbox">Xbox</label>
            <input type="radio" id="xbox" name="plataforma" value="Xbox" <?php if ($produto->getPlataforma()=="Xbox"){?>checked<?php} else {?> > <?php } ?>
          </div>
          <div>
           <label for="pc">Pc</label>
           <input type="radio" id="pc" name="plataforma" value="Pc" <?php if ($produto->getPlataforma()=="Pc"){?>checked<?php} else {?> > <?php } ?>
          </div>
          <div>
            <label for="playstation">PlayStation</label>
            <input type="radio" id="playstation" name="plataforma" value="PlayStation" <?php if ($produto->getPlataforma()=="PlayStation"){?>checked<?php} else {?> > <?php } ?>
          </div>
        </div>


        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" value="<?= $produto->getDescricao(); ?>" required>


        <label for="preco">Preço</label>
        <input type="text" id="preco" name="preco" value="<?= $produto->getPreco(); ?>" required>


        <?php $imagemfake = $produto->getImagem();




        // Remove a parte "C:\fakepath\" do valor (apenas no caso de navegadores baseados em Windows)
        $imagem = basename($imagemfake);


        // Agora, $imagem conterá apenas o nome do arquivo, sem a parte "C:\fakepath\"
        ?>
        <label for="imagem">Envie uma nova imagem do produto ou mantenha a imagem atual:
          <div class="container-foto">
            <img src="<?= $produto->getImagem(); ?>" alt="<?php echo $imagem; ?>" width="200">
          </div><?php echo $imagem; ?>
        </label>
        <input type="file" name="imagem" accept="image/*" id="imagem" value="<?php echo $imagem; ?>">
        <input type='hidden' name='nomeusuario' value=<?php echo $_SESSION['nomeusuario'];?>>
        <input type='hidden' name='usuario' value=<?php echo $_SESSION['usuario'];?>>
        <input type="hidden" name="id" id="id" value="<?= $produto->getId(); ?>">
        <input type="submit" name="editar" class="botao_cadastrar" value="Editar-produto" />
      </form>


    </section>
  </main>
</body>

</html>
