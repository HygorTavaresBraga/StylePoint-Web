<?php

require'conexao.php';

$nomeClienteRecebido = $_POST['nomeCliente'];

    $sql = "SELECT * FROM cliente WHERE nomeCliente = '$nomeClienteRecebido'";
    $busca = mysqli_query($conexao, $sql);

    $array = mysqli_fetch_array($busca);

    $nomeCliente = $array['nomeCliente'];
    $cpfCliente = $array['cpfCliente'];
    $telefoneCliente = $array['telefoneCliente'];
    $emailCliente = $array['emailCliente'];
    $senhaCliente = $array['senhaCliente'];
    $nome_fotoCliente = $array['fotoCliente'];

?>