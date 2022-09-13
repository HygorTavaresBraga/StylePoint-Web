<?php

require'conexao.php';

$nomeProdutoRecebido = $_POST['nomeProduto'];

    $sql = "SELECT * FROM produto WHERE nomeProduto = '$nomeProdutoRecebido'";
    $busca = mysqli_query($conexao, $sql);

    $array = mysqli_fetch_array($busca);

    $nomeProduto = $array['nomeProduto'];
    $categoriaProduto = $array['categoriaProduto'];
    $descricaoProduto = $array['descricaoProduto'];
    $marcaProduto = $array['marcaProduto'];
    $generoProduto = $array['generoProduto'];
    $tamanhoProduto = $array['tamanhoProduto'];
    $corProduto = $array['corProduto'];
    $precoProduto = $array['precoProduto'];
    $qtdProduto = $array['qtdProduto'];
    $fotoProduto = $array['fotoProduto'];


?>