<?php

include 'conexao.php';

if(!isset($_SESSION)){
    session_start();
}

$cpfCliente = $_SESSION['cpfCliente'];

$finalCartao = $_POST['finalCartao'];
$formaPagamento = $_POST['formaPagamento'];

$sqlCartao = "SELECT * FROM formapagamento WHERE cpfCliente = '$cpfCliente'";
$sqlBusca = mysqli_query($conexao, $sqlCartao);

while($array = mysqli_fetch_array($sqlBusca)){

    if(substr($array['numeroCartao'], 15,18) == $finalCartao){
        $CartaoDB = $array['numeroCartao'];
    }

        $sqlRemoveCartao = "DELETE FROM formapagamento WHERE numeroCartao = '$CartaoDB'";
        $sqlRemove = mysqli_query($conexao, $sqlRemoveCartao);

        header('Location: perfil.php');

}

?>