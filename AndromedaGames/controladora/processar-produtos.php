<?php
    require "../config/conexao.php";
    require "../modelo/produto.php";
    require "../repositorio/ProdutoRepositorio.php";

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $id = rand(1, 999);        
        $nome = $_POST["nome"];
        $plataforma = $_POST["plataforma"];
        $descricao = $_POST["descricao"];
        $preco = $_POST["preco"];
        $imagem = $_POST["imagem"];
        $categoria = $_POST["categoria"];

        $produto = new Produto($id, $nome, $plataforma, $descricao, $preco, $imagem, $categoria);


        $produtoRepositorio = new ProdutoRepositorio($conn);
        $produtoRepositorio->cadastrar($produto);
        header("Location: ../visao/cadastrar-produto-sucesso.php");
    }