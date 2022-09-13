<?php

    include 'conexao.php';

    if (isset($_POST['btn-salvar'])) {
        $btnSalvar = $_POST['btn-salvar'];

    }else if(isset($_POST['btn-excluir'])){
        $btnExcluir = $_POST['btn-excluir'];
    }

    $nomeCliente = $_POST['nomeCliente'];
    $nomeClienteDB = $_POST['nomeClienteDB'];

    $cpfCliente = $_POST['cpfCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $emailCliente = $_POST['emailCliente'];
    $senhaCliente = $_POST['senhaCliente'];

    $fotoCliente = $_FILES['fotoCliente'];
    $nome_fotoCliente = $_FILES['fotoCliente']['name'];

    if(isset($btnSalvar)){

        $local = '../area-cliente/assets/clientes/';
        move_uploaded_file($_FILES['fotoCliente']['tmp_name'], $local.$nome_fotoCliente);

        $sqlCliente = "UPDATE cliente SET nomeCliente = '$nomeCliente', cpfCliente = '$cpfCliente', telefoneCliente = '$telefoneCliente', emailCliente = '$emailCliente', senhaCliente = '$senhaCliente' WHERE nomeCliente = '$nomeClienteDB'";
        $atualizar = mysqli_query($conexao, $sqlCliente);

        if(isset($nome_fotoCliente) && $nome_fotoCliente != "" && $nome_fotoCliente != null){
            $sqlFotoCliente = "UPDATE cliente SET fotoCliente = '$nome_fotoCliente' WHERE nomeCliente = '$nomeClienteDB'";
            $atualizar = mysqli_query($conexao, $sqlFotoCliente);
        }

        header("Location: update-clientes.php");

    }else if(isset($btnExcluir)){

        $sqlDeleteCliente = "DELETE FROM cliente WHERE nomeCliente = '$nomeClienteDB'";
        $excluir = mysqli_query($conexao, $sqlDeleteCliente);

        header("Location: update-clientes.php");

    }
?>


