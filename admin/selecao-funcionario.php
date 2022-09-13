<?php

require 'conexao.php';

$cpfFuncionarioRecebido = $_POST['cpfFuncionario'];

    $sql = "SELECT * FROM funcionario WHERE cpfFuncionario = '$cpfFuncionarioRecebido'";
    $busca = mysqli_query($conexao, $sql);

    $array = mysqli_fetch_array($busca);

    $nomeFuncionario = $array['nomeFuncionario'];
    $cpfFuncionario = $array['cpfFuncionario'];
    $cargoFuncionario = $array['cargoFuncionario'];
    $admissaoFuncionario = $array['admissaoFuncionario'];
    $emailFuncionario = $array['emailFuncionario'];
    $senhaFuncionario = $array['senhaFuncionario'];
    $nome_fotoFuncionario = $array['fotoFuncionario'];

?>