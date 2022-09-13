<?php   

    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    }

    if(!isset($_SESSION['nomeFuncionario'])) {
        die (header("location: ../entrar.php"));
    }

?>