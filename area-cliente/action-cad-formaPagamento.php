<?php

    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $numeroCartao = $_POST['card-number'];
    $titularCartao = $_POST['card-holder-name'];
    $dataValidadeCartao = $_POST['valid-thru-date'];
    $codigoSegurancaCartao = $_POST['security-code'];
    $tipoPagamento = $_POST['tipoPagamento'];

    $sqlBuscaFormasPagamentos = "SELECT numeroCartao FROM formapagamento WHERE numeroCartao = '$numeroCartao'";
    $busca = mysqli_query($conexao, $sqlBuscaFormasPagamentos);

    $array = mysqli_fetch_array($busca);
    $numeroDB = $array['numeroCartao'];


    if($numeroDB != $numeroCartao){
        
        $sqlFormaPagamento = "INSERT INTO formaPagamento (cpfCliente, numeroCartao, titularCartao, dataValidadeCartao, codigoSegurancaCartao, tipoPagamento) VALUES ('$cpfCliente','$numeroCartao','$titularCartao','$dataValidadeCartao','$codigoSegurancaCartao','$tipoPagamento')";
        $adicao = mysqli_query($conexao, $sqlFormaPagamento);
        header('Location: perfil.php');

    }else{
        header('Location: perfil.php');
    }

    

    


    

?>