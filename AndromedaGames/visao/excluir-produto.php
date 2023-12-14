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
include '..\visao\menu.php';
include '..\config\conexao.php';
include '..\modelo\produto.php';
include '..\repositorio\ProdutoRepositorio.php';

$produtosRepositorio = new ProdutoRepositorio($conn);
$excluiProduto = $produtosRepositorio->excluirProdutoPorId($_POST['id']);
 if(isset($_SESSION["nomeusuario"])) {
    $_SESSION["nomeusuario"];
} else {
    $_SESSION['nomeusuario'] = '';
}

 if(isset($_SESSION["usuario"])) {
    $_SESSION["usuario"];
} else {
    $_SESSION['usuario'] = '';
}
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
    <title>IFSP - Exclusão de Produto</title>
</head>


<body>
    <main>
        <section class="container-admin-banner">
            <img src="../img/logo-ifsp-removebg.png" class="logo-admin" alt="logo-serenatto">
            <?php
            if ($excluiProduto) {


            ?>
                <h1>Produto excluído com sucesso</h1>
                <img class="ornaments" src="../img/ornaments-coffee.png" alt="ornaments">
        </section>
        <section class="container-form">
            <form action="admin.php" method="post">
                <input type="submit" name="voltar" class="botao-cadastrar" value="voltar" />
                <input type='hidden' name='nomeusuario' value="<?= $_SESSION['nomeusuario']; ?>">
                <input type='hidden' name='usuario' value="<?= $_SESSION['usuario']; ?>">


            </form>
        <?php } else {
                echo "erro ao excluir produto";
            } ?>


        </section>
    </main>
</body>


</html>
