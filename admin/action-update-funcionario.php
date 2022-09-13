<?php

require 'conexao.php';
include 'header-admin.php';
include 'selecao-funcionario.php';

?>

<link rel="stylesheet" href="../area-cliente/css/style.css">

<div class="container d-flex">

    <div class="row mx-auto">

        <div id="dados-enviar" class="col-md-12 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Editar</h1>
                <?php
                    echo'<img class="ml-auto mt-4 mr-4" style="border-radius:100%;" width="50" height="50" src="../assets/funcionarios/'.$nome_fotoFuncionario.'" alt="Foto do Funcionario">';
                ?>
            </div>

            <form action="action-editar-funcionario.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-12 mb-5 col-dados">
                    <div class="pt-4 pb-4 mx-auto">

                        <div class="col-md-12">

                                <label for="nome">Nome</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $nomeFuncionario ?>" id="nomeFuncionario" name="nomeFuncionario">
                                <input hidden type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $nomeFuncionario ?>" id="nomeFuncionarioDB" name="nomeFuncionarioDB">
                           
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $cpfFuncionario ?>" id="cpfFuncionario" name="cpfFuncionario">
                        
                                <label for="cargo">Cargo</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $cargoFuncionario ?>" id="cargoFuncionario" name="cargoFuncionario">
                                
                                <label for="cargo">Data de Admissao</label>
                                <input type="date" class="form-control form-control-md mb-3" autocomplete="false" id="admissaoFuncionario" name="admissaoFuncionario">

                                <label for="email">E-mail</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $emailFuncionario ?>" id="emailFuncionario" name="emailFuncionario">
                        
                                <label for="senha">Senha</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $senhaFuncionario ?>" id="senhaFuncionario" name="senhaFuncionario">

                                <label for="foto">Foto</label> 
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                </div>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="fotoFuncionario">
                                    <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
                                </div>           

                        </div>

                        <div class="mt-5 mb-4">
                            <button id="btn-save" name="btn-salvar" type="submit">Salvar</button>
                            <button id="btn-warn" name="btn-excluir" type="submit">Excluir</button>
                            
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    
</div>