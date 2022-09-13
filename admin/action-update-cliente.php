<?php

require'conexao.php';
include 'header-admin.php';
include 'selecao-cliente.php';



?>

<link rel="stylesheet" href="../area-cliente/css/style.css">

<div class="container d-flex">

    <div class="row mx-auto">

        <div id="dados-enviar" class="col-md-12 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Editar</h1>
                <?php
                    echo'<img class="ml-auto mt-4 mr-4" style="border-radius:100%;" width="50" height="50" src="../area-cliente/assets/clientes/'.$nome_fotoCliente.'" alt="Foto do Cliente">';
                ?>
            </div>

            <form action="action-editar-cliente.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-12 mb-5 col-dados">
                    <div class="pt-4 pb-4 mx-auto">

                        <div class="col-md-12">

                                <label for="nome">Nome</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $nomeCliente ?>" id="nomeCliente" name="nomeCliente">
                                <input hidden type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $nomeCliente ?>" id="nomeClienteDB" name="nomeClienteDB">
                           
                                <label for="cpf">CPF</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $cpfCliente ?>" id="cpfCliente" name="cpfCliente">
                        
                                <label for="telefone">Telefone</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $telefoneCliente ?>" id="telefoneCliente" name="telefoneCliente">

                                <label for="email">E-mail</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $emailCliente ?>" id="emailCliente" name="emailCliente">
                        
                                <label for="senha">Senha</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $senhaCliente ?>" id="senhaCliente" name="senhaCliente">

                                <label for="foto">Foto</label>                              
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                </div>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="fotoCliente">
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