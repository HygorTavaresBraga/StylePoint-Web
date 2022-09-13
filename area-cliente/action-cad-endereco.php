<?php

    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $cepCliente = $_POST['cep'];
    $ruaCliente = $_POST['rua'];
    $bairroCliente = $_POST['bairro'];
    $complementoCliente = $_POST['complemento'];
    $numeroCliente = $_POST['numero'];
    $ufCliente = $_POST['uf'];

    $sqlEndereco = "UPDATE enderecocliente SET cepCliente = '$cepCliente', ruaCliente = '$ruaCliente', bairroCliente = '$bairroCliente', complementoCliente = '$complementoCliente', numeroCliente = '$numeroCliente', ufCliente = '$ufCliente' WHERE cpfCliente = '$cpfCliente'";
                    
    $atualizar = mysqli_query($conexao, $sqlEndereco);

    header('Location: perfil.php');

?>