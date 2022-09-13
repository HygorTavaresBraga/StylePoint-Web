<?php
    require 'conexao.php';
    include 'header-login.php';

    if(isset($_POST['cpfCliente']) || isset($_POST['emailCliente'])) {

        if(strlen($_POST['nomeCliente']) == 0) {
            $erro = "Digite seu nome";

        } else if(strlen($_POST['emailCliente']) == 0) {
            $erro = "Digite seu e-mail";

        } else if(strlen($_POST['cpfCliente']) != 14) {
            $erro = "Digite um CPF válido";
            
            
        }else if(strlen($_POST['senhaCliente']) <= 5) {
            $erro = "Digite uma senha com no mínimo 6 caracteres";
            
            
        }else if(strlen($_POST['telefoneCliente']) != 10) {
            $erro = "Digite um número de telefone válido";
            
        } else {
    
            $cpf = $conexao->real_escape_string($_POST['cpfCliente']);
            $email = $conexao->real_escape_string($_POST['emailCliente']);
    
            $sql = "SELECT * FROM cliente WHERE emailCliente = '$email' OR cpfCliente = '$cpf'";    
            $busca = mysqli_query($conexao, $sql);
            $array = mysqli_fetch_array($busca);

            if(isset($array['cpfCliente'])){
                $cpfEncontrado = $array['cpfCliente'];
            }else{
                $cpfEncontrado = 0;
            }

            if(isset($array['emailCliente'])){
                $emailEncontrado = $array['emailCliente'];
            }else{
                $emailEncontrado = "a";
            }


            if($cpfEncontrado == $cpf) {
                

                $erro = "CPF já cadastrado";

            }else if($emailEncontrado == $email) {
                

                $erro = "E-mail já cadastrado";

            } else {
                
                $nomeCliente = $_POST['nomeCliente'];
                $cpfCliente = $_POST['cpfCliente'];
                $telefoneCliente = $_POST['telefoneCliente'];
                $emailCliente = $_POST['emailCliente'];
                $senhaCliente = $_POST['senhaCliente'];

                if(isset($_POST['fotoCliente'])){
                    $fotoCliente = $_POST['fotoCliente'];
                }
                $nome_fotoCliente = $_FILES['fotoCliente']['name'];
                
                $local = 'area-cliente/assets/clientes/';
                move_uploaded_file($_FILES['fotoCliente']['tmp_name'], $local.$nome_fotoCliente);
            
                $sqlCliente = "insert into cliente (nomeCliente, cpfCliente, telefoneCliente, emailCliente, senhaCliente, fotoCliente) values ('$nomeCliente', '$cpfCliente', '$telefoneCliente', '$emailCliente', '$senhaCliente', '$nome_fotoCliente')";
                $inserir = mysqli_query($conexao, $sqlCliente);
            
                $sqlItemCarrinho = "INSERT INTO itemCarrinho (cpfCliente) VALUES ('$cpfCliente')";
                $inserirItemCarrinho = mysqli_query($conexao, $sqlItemCarrinho);
            
                $sqlEnderecoCliente = "INSERT INTO enderecoCliente (cpfCliente) VALUES ('$cpfCliente')";
                $inserirEnderecoCliente = mysqli_query($conexao, $sqlEnderecoCliente);

                 header("Location: entrar.php");             

            }
    
        }
    
    }

   
?>

<div class="container-fluid d-flex">
    <div class="row w-100">

        <div id="img-login" class="col-md-6 text-center">
            <img class="mt-5" src="assets/login/registro.png" alt="Imagem Login">
        </div>

        <div id="area-login" class="col-md-6 mt-5 vh-50">
            <form action="" method="POST" enctype="multipart/form-data">
                
                <h1>Registro</h1>

                <div class="form-group d-block">

                    <div class="d-flex">
                        
                        <div class="mx-auto">
                            <label for="nome" class="mt-3">Nome</label>
                            <input name="nomeCliente" type="text" class="form-control form-control-md mb-3">
                            <?php  
                                if(isset($erro)){
                            
                                    if($erro == "Digite seu nome"){
                                
                                        echo'<div class="msg-fail">
                                                Digite seu nome
                                            </div>';
                                    }
                                }
                            ?>

                            <label for="cpf" class="mt-3">CPF</label>
                            <input name="cpfCliente" type="text" class="form-control form-control-md mb-3">
                            <?php  
                                if(isset($erro)){
                            
                                    if($erro == "Digite um CPF válido"){
                                
                                        echo'<div class="msg-fail">
                                                Digite um CPF válido
                                            </div>';

                                    }else if($erro == "CPF já cadastrado"){
                                
                                        echo'<div class="msg-fail">
                                                CPF já cadastrado
                                            </div>';

                                    }        
                                }
                            ?>


                            <label for="telefone" class="mt-3">Telefone</label>
                            <input name="telefoneCliente" type="text" class="form-control form-control-md mb-3">               
                            <?php  
                                if(isset($erro)){
                            
                                    if($erro == "Digite um número de telefone válido"){
                                
                                        echo'<div class="msg-fail">
                                                Digite um número de telefone válido
                                            </div>';
                                    }        
                                }
                            ?>

                            <div class="d-block">
                                <div class="mt-4">
                                    <button id="btn-form" type="submit">Cadastrar</button>
                                </div>

                                <div class="mt-4">
                                    <a href="entrar.php">já possuo cadastro</a>
                                </div>
                            </div>  

                        </div>

                        <div class="mx-auto">

                            <label for="email" class="mt-3">E-mail</label>
                            <input name="emailCliente" type="text" class="form-control form-control-md mb-3">
                            <?php  
                                if(isset($erro)){
                            
                                    if($erro == "Digite seu e-mail"){
                                
                                        echo'<div class="msg-fail">
                                                Digite seu e-mail
                                            </div>';

                                    }else if ($erro == "E-mail já cadastrado"){

                                        echo'<div class="msg-fail">
                                                E-mail já cadastrado
                                            </div>';
                                    }
                                }
                            ?>

                            <label for="senha" class="mt-3">Senha</label>
                            <input name="senhaCliente" type="password" class="form-control form-control-md mb-3">
                            <?php  
                                if(isset($erro)){
                            
                                    if($erro == "Digite uma senha com no mínimo 6 caracteres"){
                                
                                        echo'<div class="msg-fail">
                                                Digite uma senha com no mínimo 6 caracteres
                                            </div>';
                                    }        
                                }
                            ?>
                            
                            <label for="foto" class="mt-3">Foto</label>      
                              
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile01"
                                aria-describedby="inputGroupFileAddon01" name="fotoCliente">
                                <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
                            </div>                            
                        
                        </div>
                    </div>

                                      
                    
                </div>
            </form>
        </div>
        

    </div>
</div>
