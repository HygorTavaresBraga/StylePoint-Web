<?php

    include 'conexao.php';

    $btnSalvar = $_POST['btn-salvar'];
    $btnExcluir = $_POST['btn-excluir'];

    $nomeProduto = $_POST['nomeProduto'];
    $nomeProdutoDB = $_POST['nomeProdutoDB'];

    $descricaoProduto = $_POST['descricaoProduto'];
    $categoriaProduto = $_POST['categoriaProduto'];
    $marcaProduto = $_POST['marcaProduto'];
    $generoProduto = $_POST['generoProduto'];

    $tamanhoProduto = $_POST['tamanhoProduto'];    
    $tipoTamanhoProduto = gettype($tamanhoProduto);

    $corProduto = $_POST['corProduto'];
    $precoProduto = $_POST['precoProduto'];
    $qtdProduto = $_POST['qtdProduto'];
    $fotoProduto = $_FILES['fotoProduto'];
    $nome_fotoProduto = $_FILES['fotoProduto']['name'];

    if(isset($btnSalvar)){

        $local = '../assets/produtos/';
        move_uploaded_file($_FILES['fotoProduto']['tmp_name'], $local.$nome_fotoProduto);

        $sqlProduto = "UPDATE produto SET nomeProduto = '$nomeProduto', descricaoProduto = '$descricaoProduto', categoriaProduto = '$categoriaProduto', marcaProduto = '$marcaProduto', generoProduto = '$generoProduto', corProduto = '$corProduto', precoProduto = '$precoProduto', qtdProduto = '$qtdProduto' WHERE nomeProduto = '$nomeProdutoDB'";
        $atualizar = mysqli_query($conexao, $sqlProduto);

        if(isset($nome_fotoProduto) && $nome_fotoProduto != "" && $nome_fotoProduto != null){
            $sqlFotoProduto = "UPDATE produto SET fotoProduto = '$nome_fotoProduto' WHERE nomeProduto = '$nomeProdutoDB'";
            $atualizar = mysqli_query($conexao, $sqlFotoProduto);
        }
        if($tipoTamanhoProduto == "string"){
            $sqlTamanhoProduto = "UPDATE produto SET tamanhoProduto = '$tamanhoProduto' WHERE nomeProduto = '$nomeProdutoDB'";
            $atualizar = mysqli_query($conexao, $sqlTamanhoProduto);
            
        }

        header("Location: update-produtos.php");

    }else if(isset($btnExcluir)){

        $sqlDeleteProduto = "DELETE FROM produto WHERE nomeProduto = '$nomeProdutoDB'";
        $excluir = mysqli_query($conexao, $sqlDeleteProduto);

        header("Location: update-produtos.php");

    }
?>


