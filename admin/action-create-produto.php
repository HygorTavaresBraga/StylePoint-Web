<?php
    include 'conexao.php';

    $nomeProduto = $_POST['nomeProduto'];
    $descricaoProduto = $_POST['descricaoProduto'];
    $categoriaProduto = $_POST['categoriaProduto'];
    $marcaProduto = $_POST['marcaProduto'];
    $generoProduto = $_POST['generoProduto'];
    $tamanhoProduto = $_POST['tamanhoProduto'];
    $corProduto = $_POST['corProduto'];
    $precoProduto = $_POST['precoProduto'];
    $qtdProduto = $_POST['qtdProduto'];
    $fotoProduto = $_FILES['fotoProduto'];
    $nome_fotoProduto = $_FILES['fotoProduto']['name'];

    $local = '../assets/produtos/';
    move_uploaded_file($_FILES['fotoProduto']['tmp_name'], $local.$nome_fotoProduto);

    $sql = "INSERT INTO produto (nomeProduto, descricaoProduto, categoriaProduto, marcaProduto, generoProduto, tamanhoProduto, corProduto, precoProduto, qtdProduto, fotoProduto)
            VALUES              ('$nomeProduto','$descricaoProduto','$categoriaProduto', '$marcaProduto', '$generoProduto','$tamanhoProduto','$corProduto', '$precoProduto', '$qtdProduto' ,'$nome_fotoProduto')";

    $inserir = mysqli_query($conexao, $sql);
    header('Location: create-produto.php');

  ?>

