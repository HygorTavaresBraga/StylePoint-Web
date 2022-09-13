<?php
    include 'conexao.php';

    $nomeFuncionario = $_POST['nomeFuncionario'];
    $cpfFuncionario = $_POST['cpfFuncionario'];
    $cargoFuncionario = $_POST['cargoFuncionario'];
    $admissaoFuncionario = $_POST['admissaoFuncionario'];
    $emailFuncionario = $_POST['emailFuncionario'];
    $senhaFuncionario = $_POST['senhaFuncionario'];
    $fotoFuncionario = $_FILES['fotoFuncionario'];
    $nome_fotoFuncionario = $_FILES['fotoFuncionario']['name'];

    $local = '../assets/funcionarios/';
    move_uploaded_file($_FILES['fotoFuncionario']['tmp_name'], $local.$nome_fotoFuncionario);

    $sql = "INSERT INTO funcionario (nomeFuncionario, cpfFuncionario, cargoFuncionario, admissaoFuncionario, emailFuncionario, senhaFuncionario, fotoFuncionario) VALUES ('$nomeFuncionario', '$cpfFuncionario','$cargoFuncionario','$admissaoFuncionario', '$emailFuncionario', '$senhaFuncionario', '$nome_fotoFuncionario')";

    $inserir = mysqli_query($conexao, $sql);

    header('Location: create-funcionario.php');

  ?>

