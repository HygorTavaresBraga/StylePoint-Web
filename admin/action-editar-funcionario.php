<?php

    include 'conexao.php';

    if (isset($_POST['btn-salvar'])) {
        $btnSalvar = $_POST['btn-salvar'];

    }else if(isset($_POST['btn-excluir'])){
        $btnExcluir = $_POST['btn-excluir'];
    }

    $nomeFuncionario = $_POST['nomeFuncionario'];
    $nomeFuncionarioDB = $_POST['nomeFuncionarioDB'];

    $cpfFuncionario = $_POST['cpfFuncionario'];
    $cargoFuncionario = $_POST['cargoFuncionario'];
    $admissaoFuncionario = $_POST['admissaoFuncionario'];
    $emailFuncionario = $_POST['emailFuncionario'];
    $senhaFuncionario = $_POST['senhaFuncionario'];

    $fotoFuncionario = $_FILES['fotoFuncionario'];
    $nome_fotoFuncionario = $_FILES['fotoFuncionario']['name'];

    if(isset($btnSalvar)){

        $local = '../assets/funcionarios/';
        move_uploaded_file($_FILES['fotoFuncionario']['tmp_name'], $local.$nome_fotoFuncionario);

        $sqlFuncionario = "UPDATE funcionario SET nomeFuncionario = '$nomeFuncionario', cpfFuncionario = '$cpfFuncionario', cargoFuncionario = '$cargoFuncionario', emailFuncionario = '$emailFuncionario', senhaFuncionario = '$senhaFuncionario' WHERE nomeFuncionario = '$nomeFuncionarioDB'";
        $atualizar = mysqli_query($conexao, $sqlFuncionario);

        if(isset($nome_fotoFuncionario) && $nome_fotoFuncionario != "" && $nome_fotoFuncionario != null){
            $sqlFotoFuncionario = "UPDATE funcionario SET fotoFuncionario = '$nome_fotoFuncionario' WHERE nomeFuncionario = '$nomeFuncionarioDB'";
            $atualizar = mysqli_query($conexao, $sqlFotoFuncionario);
        }

        if(isset($admissaoFuncionario) && $admissaoFuncionario != "" && $admissaoFuncionario != null){
            $sqlDataAdmissao = "UPDATE funcionario SET admissaoFuncionario = '$admissaoFuncionario' WHERE nomeFuncionario = '$nomeFuncionarioDB'";
            $atualizar = mysqli_query($conexao, $sqlDataAdmissao);
        }

        header("Location: update-funcionarios.php");

    }else if(isset($btnExcluir)){

        $sqlDeleteFuncionario = "DELETE FROM Funcionario WHERE nomeFuncionario = '$nomeFuncionarioDB'";
        $excluir = mysqli_query($conexao, $sqlDeleteFuncionario);

        header("Location: update-funcionarios.php");

    }
?>


