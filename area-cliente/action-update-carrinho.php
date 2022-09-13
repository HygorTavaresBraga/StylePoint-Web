<?php
    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    } 

    if(isset($_POST['btn-adicionar'])){
        $btnAdicionar = $_POST['btn-adicionar'];

    }else if(isset($_POST['btn-remover'])){
        $btnRemover = $_POST['btn-remover'];

    }else if(isset($_POST['btn-excluir'])){
        $btnExcluir = $_POST['btn-excluir'];
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $nomeProduto = $_POST['nomeProduto'];
    $qtdProduto = intval($_POST['qtdProduto']);

    $sqlIdProduto = "SELECT idProduto from produto WHERE nomeProduto = '$nomeProduto'";
    $buscaId = mysqli_query($conexao, $sqlIdProduto);

    $buscas = mysqli_fetch_array($buscaId);
    $idProduto = $buscas['idProduto'];

    if(isset($btnAdicionar)){

        $qtdProduto+=1;

        $sqlItemCarrinho = "UPDATE itemCarrinho SET qtdProduto = '$qtdProduto' WHERE cpfCliente = '$cpfCliente' AND idProduto = '$idProduto'";
        $adicao = mysqli_query($conexao, $sqlItemCarrinho);
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

    }else if(isset($btnRemover)){

        if($qtdProduto == 1){
          
            $sqlItemCarrinho = "UPDATE itemCarrinho SET qtdProduto = 1 WHERE cpfCliente = '$cpfCliente' AND idProduto = '$idProduto'";
            $remocao = mysqli_query($conexao, $sqlItemCarrinho);
            header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

        }else{

            $qtdProduto-=1;

            $sqlItemCarrinho = "UPDATE itemCarrinho SET qtdProduto = '$qtdProduto' WHERE cpfCliente = '$cpfCliente' AND idProduto = '$idProduto'";
            $remocao = mysqli_query($conexao, $sqlItemCarrinho);
            header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
        }

    }else if (isset($btnExcluir)){
        $sqlItemCarrinho = "DELETE FROM itemCarrinho WHERE cpfCliente = '$cpfCliente' AND idProduto = '$idProduto'";
        $exclusao = mysqli_query($conexao, $sqlItemCarrinho);
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
    }

?>