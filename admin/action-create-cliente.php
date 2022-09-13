<?php
    include 'conexao.php';

    $nomeCliente = $_POST['nomeCliente'];
    $cpfCliente = $_POST['cpfCliente'];
    $telefoneCliente = $_POST['telefoneCliente'];
    $emailCliente = $_POST['emailCliente'];
    $senhaCliente = $_POST['senhaCliente'];
    $fotoCliente = $_POST['fotoCliente'];
    $nome_fotoCliente = $_FILES['fotoCliente']['name'];
    
    $local = '../area-cliente/assets/clientes/';
    move_uploaded_file($_FILES['fotoCliente']['tmp_name'], $local.$nome_fotoCliente);
    
    $sqlCliente = "INSERT INTO cliente (nomeCliente, cpfCliente, telefoneCliente, emailCliente, senhaCliente, fotoCliente) VALUES ('$nomeCliente', '$cpfCliente', '$telefoneCliente', '$emailCliente', '$senhaCliente', '$nome_fotoCliente')";
    $inserirCliente = mysqli_query($conexao, $sqlCliente);

    $sqlCarrinho = "INSERT INTO carrinho (cpfCliente) VALUES ('$cpfCliente')";
    $inserirCarrinho = mysqli_query($conexao, $sqlCarrinho);

    $sqlEndereco = "INSERT INTO enderecoCliente (cpfCliente) VALUES ('$cpfCliente')";
    $inserirEndereco = mysqli_query($conexao, $sqlEndereco);
    
    header('Location: create-cliente.php');

?>