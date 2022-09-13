<?php

    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $nomeCliente = $_POST['nomeCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $emailCliente = $_POST['emailCliente'];
    $senhaCliente = $_POST['senhaCliente'];

    $sqlCliente = "UPDATE cliente SET nomeCliente = '$nomeCliente', telefoneCliente = '$telefoneCliente', emailCliente = '$emailCliente', senhaCliente = '$senhaCliente' WHERE cpfCliente = '$cpfCliente'";
                    
    $atualizar = mysqli_query($conexao, $sqlCliente);

    header('Location: perfil.php');

?>