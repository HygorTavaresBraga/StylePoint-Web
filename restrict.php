<?php   

    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['nomeCliente'])) {
        die (header("location: ../entrar.php"));
    }

?>