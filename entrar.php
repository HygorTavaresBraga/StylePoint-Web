<?php

include 'conexao.php';
        
        // CLIENTE
        if(isset($_POST['email']) || isset($_POST['senha'])) {

            if(strlen($_POST['email']) == 0) {
                $erro = "Preencha seu e-mail";
            } else if(strlen($_POST['senha']) == 0) {
                $erro = "Preencha sua senha";
            } else {
        
                $email = $conexao->real_escape_string($_POST['email']);
                $senha = $conexao->real_escape_string($_POST['senha']);
        
                $sql_code = "SELECT * FROM cliente WHERE emailCliente = '$email' AND senhaCliente = '$senha'";
                $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
        
                $quantidade = $sql_query->num_rows;
        
                if($quantidade == 1) {
                    
                    $usuario = $sql_query->fetch_assoc();

                    header("Location: area-cliente/index.php");
        
                    if(!isset($_SESSION)) {
                        session_start();
                    }
        
                    $_SESSION['idCliente'] = $usuario['idCliente'];
                    $_SESSION['nomeCliente'] = $usuario['nomeCliente'];
                    $_SESSION['cpfCliente'] = $usuario['cpfCliente'];
                    $_SESSION['telefoneCliente'] = $usuario['telefoneCliente'];
                    $_SESSION['emailCliente'] = $usuario['emailCliente'];
                    $_SESSION['senhaCliente'] = $usuario['senhaCliente'];
                    $_SESSION['fotoCliente'] = $usuario['fotoCliente'];

                } else {
                    $erro = "E-mail e/ou senha incorretos";
                }
        
            }
        
        }

        // FUNCIONÁRIO (TI)
        if(isset($_POST['email']) || isset($_POST['senha'])) {

            if(strlen($_POST['email']) == 0) {
                $erro = "Preencha seu e-mail";
            } else if(strlen($_POST['senha']) == 0) {
                $erro = "Preencha sua senha";
            } else {
        
                $email = $conexao->real_escape_string($_POST['email']);
                $senha = $conexao->real_escape_string($_POST['senha']);
        
                $sql_code = "SELECT * FROM funcionario WHERE emailFuncionario = '$email' AND senhaFuncionario = '$senha'";
                $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
        
                $quantidade = $sql_query->num_rows;

                $sqlBusca = mysqli_query($conexao, $sql_code);
                $arrayFuncionario = mysqli_fetch_array($sqlBusca);

                if(isset($arrayFuncionario['cargoFuncionario'])){
                    $cargo = $arrayFuncionario['cargoFuncionario'];
            
                    if($quantidade == 1 && $cargo == "TI") {
                        
                        $usuario = $sql_query->fetch_assoc();

                        header("Location: admin/index.php");
            
                        if(!isset($_SESSION)) {
                            session_start();
                        }

                        $_SESSION['idFuncionario'] = $usuario['idFuncionario'];
                        $_SESSION['nomeFuncionario'] = $usuario['nomeFuncionario'];
                        $_SESSION['cpfFuncionario'] = $usuario['cpfFuncionario'];
                        $_SESSION['cargoFuncionario'] = $usuario['cargoFuncionario'];
                        $_SESSION['admissaoFuncionario'] = $usuario['admissaoFuncionario'];
                        $_SESSION['emailFuncionario'] = $usuario['emailFuncionario'];
                        $_SESSION['senhaFuncionario'] = $usuario['senhaFuncionario'];
                        $_SESSION['fotoFuncionario'] = $usuario['fotoFuncionario'];

                    } else {
                        $erro = "E-mail e/ou senha incorretos";
                    }
                }
            }
        
        }
?>

<?php include 'header-login.php'?>

<div class="container-fluid d-flex">
    <div class="row w-100">

        <div id="img-login" class="col-md-6 text-right">
            <img width="500" height="350" src="assets/login/login.png" alt="Imagem Login">
        </div>

        <div id="area-login" class="col-md-6 d-flex mx-auto mt-5 vh-50">
            <form method="POST" class="mx-auto">
                <h1>Acesso</h1>
                <div class="form-group d-block">
                    <label for="" class="mt-3">E-mail</label>
                    <input name="email" type="text" class="form-control form-control-md mb-3">

                    <label for="">Senha</label>
                    <input name="senha" type="password" class="form-control form-control-md mb-4">

                    <button id="btn-form" type="submit" class="mb-3">Entrar</button>

                    <?php
                        global $erro;
                        if($erro == "E-mail e/ou senha incorretos"){
                    ?>
                        <div class="msg-fail">
                            Email e/ou senha incorreto(s)
                        </div>
                    <?php
                        }else if($erro == "Preencha seu e-mail"){
                    ?>
                        <div class="msg-fail">
                            Preencha seu e-mail
                        </div>
                    <?php
                        }else if($erro == "Preencha sua senha"){
                    ?>
                        <div class="msg-fail">
                            Preencha sua senha
                        </div>
                    <?php
                        }
                    ?>

                    
                    <div class="mt-5">
                        <a href="cadastro.php">não possuo cadastro</a>
                    </div>
                </div>
            </form>
        </div>        

    </div>
</div>
