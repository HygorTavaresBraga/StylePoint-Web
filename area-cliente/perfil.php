<?php
    include 'header.php';
    require 'conexao.php';

    $cpfCliente = $_SESSION['cpfCliente'];

    $sql = "SELECT * FROM enderecoCliente WHERE cpfCliente = '$cpfCliente'";
    $busca = mysqli_query($conexao, $sql);
      
    while($array = mysqli_fetch_array($busca)){

        $cepCliente = $array['cepCliente'];
        $ruaCliente = $array['ruaCliente'];
        $bairroCliente = $array['bairroCliente'];
        $complementoCliente = $array['complementoCliente'];
        $numeroCliente = $array['numeroCliente'];
        $ufCliente = $array['ufCliente'];

        if($cepCliente == "" || $cepCliente == null || $cepCliente == 0){
            $validaEndereco = false;
        }

    }
?>

<script src="js/perfil.js"></script>
<script src="js/cep.js"></script>

<div class="container">

    <div class="row">

        <!-- Perfil -->
        <div id="col-perfil" class="col-md-12">
            <div class=" ml-5 position-relative">
                <?php
                    if(strlen($_SESSION['fotoCliente']) < 1){
                        echo'<svg id="ft-perfil" xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                            </svg>';
                    }else{
                        echo'<img id="ft-perfil" style="border-radius: 50%;" class="ml-2" width="100" height="100" src="assets/clientes/'.$_SESSION['fotoCliente'].'"></img>';
                        
                    }
                    
                    echo '<span id="nome-cliente" style="font-family:\'Catamaran\'; font-size: 35px;" class="ml-4">'.$_SESSION['nomeCliente'].'</span>'; 
                ?>
            </div>
            <div class="position-relative">
                <?php
                    echo '<p id="email-perfil">'.$_SESSION['emailCliente'].'</p>';
                ?>
                    <div id="menu-perfil" class="dropdown">
                        <button class="btn" type="button" data-toggle="dropdown" aria-expanded="false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                            </svg>
                        </button>

                        <div class="dropdown-menu text-center" style="background-color: #e6e6e6;">
                            <div id="btn-form">
                                <a style="color: #000; text-decoration: none; font-family:'Catamaran';" href="locacoes.php">Locações</a>
                            </div>
                            <div id="btn-form">
                                <a style="color: #000; text-decoration: none; font-family:'Catamaran';" href="pagamentos.php">Pagamentos</a>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div>
        
        <!-- Dados a Enviar-->
        <div id="dados-enviar" style="display: none;" class="col-md-4 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Dados</h1>

                <button class="ml-auto mr-2 mt-3" type="button" style="background:none; border:1px ; height:30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                </button>
            </div>

            <form action="action-cad-dados.php" method="post">
                <div class="col-md-12 mb-5 col-dados">
                    <div class="pt-4 pb-4">

                        <div class="col-md-12">

                                <label for="company">Nome</label>
                                <?php
                                    echo'<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['nomeCliente'].'" id="nomeCliente" name="nomeCliente">';
                                ?>          
                           
                                <label for="company">CPF</label>
                                <?php
                                    echo'<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['cpfCliente'].'" id="cpfCliente" name="cpfCliente" >';
                                ?>
                        
                                <label for="company">Telefone</label>
                                <?php
                                    echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['telefoneCliente'].'" id="telefoneCliente" name="telefoneCliente" >';
                                ?>
                        
                                <label for="company">Email</label>
                                <?php
                                    echo '<input disabled type="email" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['emailCliente'].'" id="emailCliente" name="emailCliente">';
                                ?>
                        
                                <label for="company">Senha</label>
                                <?php
                                    echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['senhaCliente'].'" id="senhaCliente" name="senhaCliente" >';
                                ?>

                        </div>

                        <div class="ml-3">
                            <button id="btn-form" type="submit">Atualizar</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>
        
        <!-- Dados Resgatados-->        
        <div id="dados-resgatados" style="display: block;" class="col-md-4 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Dados</h1>

                <button onclick="editaDados(); habilitaCampos();" class="ml-auto mr-2 mt-3" type="button" style="background:none; border:1px ; height:30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                </button>
            </div>

                <div class="col-md-12 mb-5 col-dados">
                    <div class="pt-4 pb-4 text-center">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="company">Nome</label>
                                <?php
                                    echo'<input name="nome" disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['nomeCliente'].'" id="nomeCliente" name="nomeCliente">';
                                ?>          
                            </div>
                        </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="company">CPF</label>
                            <?php
                                echo'<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['cpfCliente'].'" id="cpfCliente" name="cpfCliente" >';
                            ?>
                        </div>
                    </div>   

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="company">Telefone</label>
                            <?php
                                echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$_SESSION['telefoneCliente'].'" id="telefoneCliente" name="telefoneCliente" >';
                            ?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="company">Email</label>
                            <?php
                                echo '<input disabled type="email" class="form-control" autocomplete="false" value="'.$_SESSION['emailCliente'].'" id="emailCliente" name="emailCliente">';
                            ?>
                        </div>
                    </div>


                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="company">Senha</label>
                            <?php
                                echo '<input disabled type="text" class="form-control" autocomplete="false" value="'.$_SESSION['senhaCliente'].'" id="senhaCliente" name="senhaCliente" >';
                            ?>
                        </div>
                    </div>

                    <div class="ml-3">
                        <button id="btn-form" type="submit">Atualizar</button>
                    </div>

                </div>
            </div>
        </div>

        <!-- Endereço -->
        <div class="col-md-4 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Endereço</h1>

                <button onclick="habilitaEndereco()" class="ml-auto mr-2 mt-3" type="button" style="background:none; border:1px ; height:30px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                    </svg>
                </button>
            </div>        
            
            <form action="action-cad-endereco.php" method="POST">

                <div class="col-md-12 mb-5 col-dados">
                    <div class="pt-4 pb-4">
                        <div class="col-md-12">
                       
                            <label for="cep">CEP</label>    
                            <?php
                                if (isset($cepCliente)) {
                                    echo '<input onblur="pesquisacep(this.value)" disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$cepCliente.'" id="cep" name="cep">';
                                }else{
                                    echo'<input onblur="pesquisacep(this.value)" disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" id="cep" name="cep">';
                                }
                            ?>
                    
                            <label for="rua">Rua</label>
                            <?php
                                if (isset($ruaCliente)) {
                                    echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$ruaCliente.'" id="rua" name="rua">';
                                }else{
                                    echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" id="rua" name="rua">';
                                }
                            ?>
                      
                            <label for="bairro">Bairro</label>
                            <?php
                                if (isset($bairroCliente)) {
                                    echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" value="'.$bairroCliente.'" id="bairro" name="bairro">';
                                }else{
                                    echo '<input disabled type="text" class="form-control form-control-md mb-3" autocomplete="false" id="bairro" name="bairro">';
                                }
                            ?>

                            <label for="complemento">Complemento</label>
                            <?php
                                if (isset($complementoCliente)) {
                                    echo '<input disabled type="text" class="form-control" autocomplete="false" value="'.$complementoCliente.'" id="complemento" name="complemento">';
                                }else{
                                    echo '<input disabled type="text" class="form-control" autocomplete="false" id="complemento" name="complemento">';
                                }
                            ?>
                       
                            <label class="mt-3" for="numero">Número</label>
                            <?php
                                if (isset($numeroCliente)) {
                                    echo '<input disabled type="text" class="form-control" autocomplete="false" value="'.$numeroCliente.'" id="numero" name="numero">';
                                }else{
                                    echo '<input disabled type="text" class="form-control" autocomplete="false" id="numero" name="numero">';
                                }
                            ?>

                            <label class="mt-3" for="uf">UF</label>
                            <?php
                                if (isset($ufCliente)) {
                                    echo '<input disabled type="text" class="form-control" autocomplete="false" value="'.$ufCliente.'" id="uf" name="uf">';
                                }else{
                                    echo '<input disabled type="text" class="form-control" autocomplete="false" id="uf" name="uf">';
                                }
                            ?>
                        </div>
                    </div>

                        <div style="padding-bottom:25px;" class="ml-3">
                            <button id="btn-form" type="submit">Atualizar</button>
                        </div>

                </div>
            </form>

        </div>       

        <!-- Formas de Pagamento -->
        <div class="col-md-4 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Formas de Pagamento</h1>

                <button class="ml-auto" style="width:50px; height:50px; background:none; border: 0px;" id="btn-form" data-toggle="modal" data-target="#add-cartao" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-window-plus" viewBox="0 0 16 16">
                    <path d="M2.5 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1ZM4 5a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1Zm2-.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0Z"/>
                    <path d="M0 4a2 2 0 0 1 2-2h11a2 2 0 0 1 2 2v4a.5.5 0 0 1-1 0V7H1v5a1 1 0 0 0 1 1h5.5a.5.5 0 0 1 0 1H2a2 2 0 0 1-2-2V4Zm1 2h13V4a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v2Z"/>
                    <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 0 0 1 0v-1h1a.5.5 0 0 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z"/>
                    </svg>
                </button>
            </div>           
        
            <div class="col-md-12 mb-5 col-dados">
            <div class="pt-4 pb-4">
                <div class="col-md-12">
                    <div class="form-group ">
                        <label style="font-family:'Catamaran';" for="company">Seus Cartões</label>
                            <table class="table mt-4">

                                <thead>
                                    <tr>
                                        <th style="font-family:'Catamaran';" scope="col">Final</th>
                                        <th style="font-family:'Catamaran';" scope="col">Forma</th>
                                        <th style="font-family:'Catamaran';" scope="col">&nbsp;</th>
                                    </tr>
                                </thead>

                                <?php
                                
                                    $sqlCartoes = "SELECT * FROM formapagamento WHERE cpfCliente = '$cpfCliente'";
                                    $buscaCartoes = mysqli_query($conexao, $sqlCartoes);

                                    while($arrayCartoes = mysqli_fetch_array($buscaCartoes)){

                                        $numeroCartaoInteiro = $arrayCartoes['numeroCartao'];
                                        $formaPagamento = $arrayCartoes['tipoPagamento'];

                                        $finalCartao = substr($numeroCartaoInteiro, 15,18);

                                        echo '<tbody>
                                                <tr>
                                                    <form action="action-remove-cartao.php" method="POST">
                                                        <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:50px;" name="finalCartao" readonly type="text" value="'.$finalCartao.'"></td>
                                                        <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:80px;" name="formaPagamento" readonly type="text" value="'.$formaPagamento.'"></td>
                                                        <td>
                                                            <button type="submit" id="btn-form"">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                                                <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                                                </svg>
                                                            </button>
                                                        </td>
                                                    </form>
                                                </tr>
                                            </tbody>';

                                    }
                                ?>

                            </table>
                    </div>
                </div>                
                
                    <!-- Adiconar Cartão -->
                    <div id="add-cartao" class="modal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">                        
                                    <h5 class="modal-title">Adicionar Cartão</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <style>
                                        @import url('https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700|Nova+Mono&display=swap');
                                        @import url('https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700&display=swap');

                                        .modal-wrapper {
                                            display: flex;                                    
                                            justify-content: center;
                                            align-items: center;
                                            width: 80vw;                                
                                            padding: 1rem;
                                            box-sizing: border-box;
                                        }

                                        @media(max-width:992px){
                                            .modal-wrapper {
                                            display: block;
                                            margin-right: 0 auto;
                                            }

                                            .form-wrapper{
                                            margin-right: 0 auto;
                                            }
                                
                                        }

                                        .card-image {
                                            font-family: 'Nova Mono', monospace;
                                            position: relative;
                                            width: 100%;
                                            max-width: 300px;
                                            min-height: 160px;
                                            max-height: 190px;
                                            margin-bottom: 1rem;
                                            z-index: 0;
                                            margin-right: 100px;
                                        }

                                        .card-background {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            max-width: 300px;
                                            box-shadow: 0px 10px 10px -10px black;
                                        }

                                        .card-logo {
                                            position: absolute;
                                            right: 0.5rem;
                                            display: flex;
                                            width: 50px;
                                            height: 30px;
                                        }

                                        .card-front .card-logo {
                                            top: 0.5rem;
                                        }

                                        .card-rear .card-logo {
                                            bottom: 1rem;
                                        }

                                        .logo-circle {
                                            display: inline-block;
                                            width: 30px;
                                            height: 30px;
                                            border-radius: 50%;
                                        }

                                        .logo-circle.left {
                                            background-color: #eb001b;
                                        }

                                        .logo-circle.right {
                                            background-color: #f79e1b;
                                            opacity: 0.8;
                                            margin-left: -10px;
                                        }

                                        .card-front,
                                        .card-rear {
                                            position: absolute;
                                            top: 0;
                                            right: 0;
                                            bottom: 0;
                                            left: 0;
                                            color: #edeef2;
                                            font-size: 14px;
                                            letter-spacing: 1px;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            flex-flow: column wrap;
                                            backface-visibility: hidden;
                                            transition: transform .5s linear 0s;
                                        }

                                        .card-front .card-number {
                                            z-index: 2;
                                        }

                                        .card-front .card-info {
                                            display: flex;
                                            flex-flow: column wrap;
                                            font-size: 12px;
                                        }

                                        .card-front .card-info.left {
                                            text-align: left;
                                            position: absolute;
                                            left: 0.75rem;
                                            bottom: 0.75rem;
                                        }

                                        .card-front .card-info.right {
                                            text-align: right;
                                            position: absolute;
                                            right: 0.75rem;
                                            bottom: 0.75rem;
                                        }

                                        .card-front .card-holder-title,
                                        .card-front .valid-thru-title {
                                            font-size: 10px;
                                            margin-bottom: 5px;
                                        }

                                        .card-rear .black-bar {
                                            position: absolute;
                                            left: 0px;
                                            top: 10%;
                                            width: 100%;
                                            height: 30px;
                                            background-color: black;
                                        }

                                        .card-rear .card-info {
                                            width: 100%;
                                            display: flex;
                                            justify-content: flex-start;
                                            padding-left: 5%;
                                            z-index: 2;
                                        }

                                        .card-rear .card-info .white-bar {
                                            width: 50%;
                                            height: 30px;
                                            background-color: #757575;
                                        }

                                        .card-rear .card-info .security-code {
                                            background: white;
                                            color: #2d2d2d;
                                            border-radius: 5px;
                                            padding: 5px 10px;
                                            margin: 0 10px;
                                        }

                                        /* TRANSITION EFFECT */
                                        .card-front {
                                            transform: perspective(600px) rotateY(0deg);
                                        }
                                        .card-rear {
                                            transform: perspective(600px) rotateY(180deg);
                                        }

                                        .active-border {
                                            display: none;
                                            position: fixed;
                                            border: 1px solid #f79e1b;
                                            border-radius: 5px;
                                            padding: 3px;
                                            transition: left ease-in-out 0.5s, top ease-in-out 0.5s,
                                                width ease-in-out 0.5s, height ease-in-out 0.5s;
                                        }

                                        .card-form {
                                            font-family: 'IBM Plex Sans', sans-serif;
                                            height: 50%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        }

                                        form {
                                            text-align: center;
                                        }

                                        .form-input {
                                            position: relative;
                                            margin: 10px auto 5px auto;
                                        }

                                        .form-input input {
                                            outline: none;
                                            background: transparent;
                                            border: none;
                                            border-radius: 0;
                                            padding: 10px 5px 10px 40px;
                                            border-bottom: 2px solid #757575;
                                            transition: all linear 0.2s;
                                        }

                                        .form-input input:focus {

                                            border: 0;
                                            border-bottom: 2px solid black;
                                            border-radius: 10px 10px 0 0;
                                        }

                                        .form-input i {
                                            color: #2d2d2d;
                                            position: absolute;
                                            top: 10px;
                                            left: 15px;
                                            font-size: 12px;
                                        }

                                        .btn {
                                            background-color: #ebebeb;
                                            color: #030c15;
                                            font-family: 'Catamaran';
                                            font-size: 18px;
                                            border-radius: 5px;
                                            border: 1px solid #ebebeb;
                                            transition: 0.7s ease-out;
                                        }

                                        .btn:hover {
                                            border: 1px solid #929292;
                                            transition: 0.7s ease-out;
                                        }

                                        .btn button {
                                            outline: none;
                                            border: none;
                                            font-size: 14px;
                                            background: transparent;
                                            padding: 0;
                                        }   
                                        
                                        #forma{
                                            width: 230px;
                                            background-color: #ebebeb;
                                            color: #030c15;
                                            font-family: 'Catamaran';
                                            font-size: 16px;
                                            text-align: center;
                                            border-radius: 5px;
                                            border: 1px solid #ebebeb;
                                            transition: 0.7s ease-out;
                                        }

                                    </style>
                                    
                                    <div class="modal-wrapper">

                                        <div class="card-image">
                                            <div class="card-front">
                                                <img class="card-background" src="assets/cartao/card-background.png" alt="Cartão de Crédito">
                                                <div class="card-logo">
                                                <div class="logo-circle left"></div>
                                                <div class="logo-circle right"></div>
                                            </div>

                                                <span class="card-number">XXXX XXXX XXXX XXXX</span>

                                            <div class="card-info left">
                                                <span class="card-holder-title">TITULAR</span>
                                                <span class="card-holder-name">NOME SOBRENOME</span>
                                            </div>

                                            <div class="card-info right">
                                                <span class="valid-thru-title">Data de Validade</span>
                                                <span class="valid-thru-date">MM/AA</span>
                                            </div>
                                        </div>

                                        <div class="card-rear">
                                            <img class="card-background" src="assets/cartao/card-background.png" alt="Cartão de Crédito">
                                            <div class="card-logo">
                                            <div class="logo-circle left"></div>
                                            <div class="logo-circle right"></div>
                                            </div>
                                            <div class="black-bar"></div>
                                            <div class="card-info">
                                            <span class="white-bar"></span>
                                            <span class="security-code">123</span>
                                            </div>
                                        </div>
                                        <span class="active-border"></span>
                                        </div>
                                        <div class="card-form">
                                            <div class="form-wrapper">
                                                <form action="action-cad-formaPagamento.php" method="POST">

                                                    <div class="form-input">
                                                        <input type="text" name="card-number" id="#number" placeholder="Número do Cartão" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceNumberInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <input type="text" name="card-holder-name" id="#name" placeholder="Titular do Cartão" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceNameInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <input type="text" name="valid-thru-date" id="#expiry" placeholder="Data de Validade" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceDateInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <input type="text" name="security-code" id="#code" placeholder="Código de Segurança" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceCodeInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <select type="text" name="tipoPagamento" id="btn-form">
                                                            <option selected hidden>Selecione</option>
                                                            <option value="Crédito">Crédito</option>
                                                            <option value="Débito">Débito</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-input btn">
                                                        <button type="submit">Adicionar</button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script type="text/javascript">    var isFront = true;
                                        var cardContainer = document.querySelector(".card-image");
                                        var creditCard = document.querySelector(".card-background");
                                        var cardFront = document.querySelector(".card-front");
                                        var cardRear = document.querySelector(".card-rear");
                                        var cardLogo = document.querySelector(".card-logo");

                                        function flipCard(e) {
                                        if ((isFront && e.target.name == "security-code") || (!isFront && e.target.name != "security-code")) {
                                            setTimeout(() => {activateBorder(e);}, 500);
                                            if (isFront) {
                                            cardFront.style.transform = "perspective( 600px ) rotateY( -180deg )";
                                            cardRear.style.transform = "perspective( 600px ) rotateY( 0deg )";
                                            }
                                            else {
                                            cardFront.style.transform = "perspective( 600px ) rotateY( 0deg )";
                                            cardRear.style.transform = "perspective( 600px ) rotateY( 180deg )";
                                            }
                                            isFront = !isFront;
                                        }
                                        else activateBorder(e);
                                        }
                                        function activateBorder(e) {
                                        let borderBox = document.querySelector(".active-border");
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        let newRect = focusedInput.getBoundingClientRect();
                                        let removePadding = 4; //PADDING+BORDER OF .active-border

                                        borderBox.style.display = "inline-block";
                                        borderBox.style.opacity = "1";
                                        borderBox.style.height = newRect.height + "px";
                                        borderBox.style.width = newRect.width + "px";
                                        borderBox.style.top = (newRect.top - removePadding) + "px";
                                        borderBox.style.left = (newRect.left - removePadding) + "px";
                                        }
                                        function deactivateBorder(e) {
                                        let borderBox = document.querySelector(".active-border");
                                        borderBox.style.opacity = "0";
                                        }
                                        function traceNumberInput(e) {
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        let newString = "";
                                        let spaceCounter = [4, 9, 14];
                                        let initString = "XXXX XXXX XXXX XXXX";
                                        if (spaceCounter.some((val) => e.target.value.length == val))
                                            e.target.value += " ";
                                        if (e.target.value.length <= 19) {
                                            let userInput = e.target.value;
                                            for (let i = 0; i < 19; i++) {
                                            if (i < userInput.length) {
                                                newString += userInput[i];
                                            }
                                            else {
                                                newString += initString[i];
                                            }
                                            }
                                            focusedInput.innerHTML = newString;
                                        }
                                        else {
                                            e.target.value = e.target.value.substr(0, 19);
                                        }
                                        }
                                        function traceNameInput(e) {
                                        if (e.target.value.length > 11) activateBorder(e);

                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        if (e.target.value == "") focusedInput.innerHTML = "NAME SURNAME";
                                        else focusedInput.innerHTML = e.target.value.toUpperCase();
                                        }
                                        function traceDateInput(e) {
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        let newString = "";
                                        let initString = "MM/YY";
                                        if (e.target.value.length == 2) e.target.value = e.target.value + "/";
                                        if (e.target.value.length < 6) {
                                            for (let i = 0; i < 5; i++) {
                                            if (i < e.target.value.length)
                                                newString += e.target.value[i];
                                            else
                                                newString += initString[i];
                                            }
                                            focusedInput.innerHTML = newString;
                                        }
                                        else {
                                            e.target.value = e.target.value.substr(0, 5);
                                        }
                                        }
                                        function traceCodeInput(e) {
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        if (e.target.value.length <= 3) {
                                            if (e.target.value == "") focusedInput.innerHTML = "123";
                                            else focusedInput.innerHTML = e.target.value;
                                        }
                                        else {
                                            e.target.value = e.target.value.substr(0, 3);
                                        }
                                        }
                                        // window.addEventListener("load", getImageSize);
                                        // window.addEventListener("resize", getImageSize);
                                        function getImageSize () {
                                        var img = document.querySelector('.card-background'); 
                                        cardContainer.style.height = img.clientHeight + "px";
                                        cardContainer.style.width = img.clientWidth + "px";
                                        }
                                    </script>

                                </div>

                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>      
                
                    <!-- Adiconar Cartão -->
                    <div id="add-cartao" class="modal" tabindex="-1">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">                        
                                    <h5 class="modal-title">Adicionar Cartão</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <div class="modal-body">
                                    <style>
                                        @import url('https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700|Nova+Mono&display=swap');
                                        @import url('https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,700&display=swap');

                                        .modal-wrapper {
                                            display: flex;                                    
                                            justify-content: center;
                                            align-items: center;
                                            width: 80vw;                                
                                            padding: 1rem;
                                            box-sizing: border-box;
                                        }

                                        @media(max-width:992px){
                                            .modal-wrapper {
                                            display: block;
                                            margin-right: 0 auto;
                                            }

                                            .form-wrapper{
                                            margin-right: 0 auto;
                                            }
                                
                                        }

                                        .card-image {
                                            font-family: 'Nova Mono', monospace;
                                            position: relative;
                                            width: 100%;
                                            max-width: 300px;
                                            min-height: 160px;
                                            max-height: 190px;
                                            margin-bottom: 1rem;
                                            z-index: 0;
                                            margin-right: 100px;
                                        }

                                        .card-background {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            width: 100%;
                                            max-width: 300px;
                                            box-shadow: 0px 10px 10px -10px black;
                                        }

                                        .card-logo {
                                            position: absolute;
                                            right: 0.5rem;
                                            display: flex;
                                            width: 50px;
                                            height: 30px;
                                        }

                                        .card-front .card-logo {
                                            top: 0.5rem;
                                        }

                                        .card-rear .card-logo {
                                            bottom: 1rem;
                                        }

                                        .logo-circle {
                                            display: inline-block;
                                            width: 30px;
                                            height: 30px;
                                            border-radius: 50%;
                                        }

                                        .logo-circle.left {
                                            background-color: #eb001b;
                                        }

                                        .logo-circle.right {
                                            background-color: #f79e1b;
                                            opacity: 0.8;
                                            margin-left: -10px;
                                        }

                                        .card-front,
                                        .card-rear {
                                            position: absolute;
                                            top: 0;
                                            right: 0;
                                            bottom: 0;
                                            left: 0;
                                            color: #edeef2;
                                            font-size: 14px;
                                            letter-spacing: 1px;
                                            display: flex;
                                            justify-content: center;
                                            align-items: center;
                                            flex-flow: column wrap;
                                            backface-visibility: hidden;
                                            transition: transform .5s linear 0s;
                                        }

                                        .card-front .card-number {
                                            z-index: 2;
                                        }

                                        .card-front .card-info {
                                            display: flex;
                                            flex-flow: column wrap;
                                            font-size: 12px;
                                        }

                                        .card-front .card-info.left {
                                            text-align: left;
                                            position: absolute;
                                            left: 0.75rem;
                                            bottom: 0.75rem;
                                        }

                                        .card-front .card-info.right {
                                            text-align: right;
                                            position: absolute;
                                            right: 0.75rem;
                                            bottom: 0.75rem;
                                        }

                                        .card-front .card-holder-title,
                                        .card-front .valid-thru-title {
                                            font-size: 10px;
                                            margin-bottom: 5px;
                                        }

                                        .card-rear .black-bar {
                                            position: absolute;
                                            left: 0px;
                                            top: 10%;
                                            width: 100%;
                                            height: 30px;
                                            background-color: black;
                                        }

                                        .card-rear .card-info {
                                            width: 100%;
                                            display: flex;
                                            justify-content: flex-start;
                                            padding-left: 5%;
                                            z-index: 2;
                                        }

                                        .card-rear .card-info .white-bar {
                                            width: 50%;
                                            height: 30px;
                                            background-color: #757575;
                                        }

                                        .card-rear .card-info .security-code {
                                            background: white;
                                            color: #2d2d2d;
                                            border-radius: 5px;
                                            padding: 5px 10px;
                                            margin: 0 10px;
                                        }

                                        /* TRANSITION EFFECT */
                                        .card-front {
                                            transform: perspective(600px) rotateY(0deg);
                                        }
                                        .card-rear {
                                            transform: perspective(600px) rotateY(180deg);
                                        }

                                        .active-border {
                                            display: none;
                                            position: fixed;
                                            border: 1px solid #f79e1b;
                                            border-radius: 5px;
                                            padding: 3px;
                                            transition: left ease-in-out 0.5s, top ease-in-out 0.5s,
                                                width ease-in-out 0.5s, height ease-in-out 0.5s;
                                        }

                                        .card-form {
                                            font-family: 'IBM Plex Sans', sans-serif;
                                            height: 50%;
                                            display: flex;
                                            align-items: center;
                                            justify-content: center;
                                        }

                                        form {
                                            text-align: center;
                                        }

                                        .form-input {
                                            position: relative;
                                            margin: 10px auto 5px auto;
                                        }

                                        .form-input input {
                                            outline: none;
                                            background: transparent;
                                            border: none;
                                            border-radius: 0;
                                            padding: 10px 5px 10px 40px;
                                            border-bottom: 2px solid #757575;
                                            transition: all linear 0.2s;
                                        }

                                        .form-input input:focus {

                                            border: 0;
                                            border-bottom: 2px solid black;
                                            border-radius: 10px 10px 0 0;
                                        }

                                        .form-input i {
                                            color: #2d2d2d;
                                            position: absolute;
                                            top: 10px;
                                            left: 15px;
                                            font-size: 12px;
                                        }

                                        .btn {
                                            background-color: #ebebeb;
                                            color: #030c15;
                                            font-family: 'Catamaran';
                                            font-size: 18px;
                                            border-radius: 5px;
                                            border: 1px solid #ebebeb;
                                            transition: 0.7s ease-out;
                                        }

                                        .btn:hover {
                                            border: 1px solid #929292;
                                            transition: 0.7s ease-out;
                                        }

                                        .btn button {
                                            outline: none;
                                            border: none;
                                            font-size: 14px;
                                            background: transparent;
                                            padding: 0;
                                        }   
                                        
                                        #forma{
                                            width: 230px;
                                            background-color: #ebebeb;
                                            color: #030c15;
                                            font-family: 'Catamaran';
                                            font-size: 16px;
                                            text-align: center;
                                            border-radius: 5px;
                                            border: 1px solid #ebebeb;
                                            transition: 0.7s ease-out;
                                        }

                                    </style>
                                    
                                    <div class="modal-wrapper">

                                        <div class="card-image">
                                            <div class="card-front">
                                                <img class="card-background" src="assets/cartao/card-background.png" alt="Cartão de Crédito">
                                                <div class="card-logo">
                                                <div class="logo-circle left"></div>
                                                <div class="logo-circle right"></div>
                                            </div>

                                                <span class="card-number">XXXX XXXX XXXX XXXX</span>

                                            <div class="card-info left">
                                                <span class="card-holder-title">TITULAR</span>
                                                <span class="card-holder-name">NOME SOBRENOME</span>
                                            </div>

                                            <div class="card-info right">
                                                <span class="valid-thru-title">Data de Validade</span>
                                                <span class="valid-thru-date">MM/AA</span>
                                            </div>
                                        </div>

                                        <div class="card-rear">
                                            <img class="card-background" src="assets/cartao/card-background.png" alt="Cartão de Crédito">
                                            <div class="card-logo">
                                            <div class="logo-circle left"></div>
                                            <div class="logo-circle right"></div>
                                            </div>
                                            <div class="black-bar"></div>
                                            <div class="card-info">
                                            <span class="white-bar"></span>
                                            <span class="security-code">123</span>
                                            </div>
                                        </div>
                                        <span class="active-border"></span>
                                        </div>
                                        <div class="card-form">
                                            <div class="form-wrapper">
                                                <form action="action-cad-formaPagamento.php" method="POST">

                                                    <div class="form-input">
                                                        <input type="text" name="card-number" id="#number" placeholder="Número do Cartão" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceNumberInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <input type="text" name="card-holder-name" id="#name" placeholder="Titular do Cartão" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceNameInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <input type="text" name="valid-thru-date" id="#expiry" placeholder="Data de Validade" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceDateInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <input type="text" name="security-code" id="#code" placeholder="Código de Segurança" onfocus="flipCard(event);" onblur="deactivateBorder(event)" onkeyup="traceCodeInput(event)">
                                                    </div>

                                                    <div class="form-input">
                                                        <select type="text" name="tipoPagamento" id="btn-form">
                                                            <option selected hidden>Selecione</option>
                                                            <option value="Crédito">Crédito</option>
                                                            <option value="Débito">Débito</option>
                                                        </select>
                                                    </div>

                                                    <div class="form-input btn">
                                                        <button type="submit">Adicionar</button>
                                                    </div>
                                                    
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <script type="text/javascript">    var isFront = true;
                                        var cardContainer = document.querySelector(".card-image");
                                        var creditCard = document.querySelector(".card-background");
                                        var cardFront = document.querySelector(".card-front");
                                        var cardRear = document.querySelector(".card-rear");
                                        var cardLogo = document.querySelector(".card-logo");

                                        function flipCard(e) {
                                        if ((isFront && e.target.name == "security-code") || (!isFront && e.target.name != "security-code")) {
                                            setTimeout(() => {activateBorder(e);}, 500);
                                            if (isFront) {
                                            cardFront.style.transform = "perspective( 600px ) rotateY( -180deg )";
                                            cardRear.style.transform = "perspective( 600px ) rotateY( 0deg )";
                                            }
                                            else {
                                            cardFront.style.transform = "perspective( 600px ) rotateY( 0deg )";
                                            cardRear.style.transform = "perspective( 600px ) rotateY( 180deg )";
                                            }
                                            isFront = !isFront;
                                        }
                                        else activateBorder(e);
                                        }
                                        function activateBorder(e) {
                                        let borderBox = document.querySelector(".active-border");
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        let newRect = focusedInput.getBoundingClientRect();
                                        let removePadding = 4; //PADDING+BORDER OF .active-border

                                        borderBox.style.display = "inline-block";
                                        borderBox.style.opacity = "1";
                                        borderBox.style.height = newRect.height + "px";
                                        borderBox.style.width = newRect.width + "px";
                                        borderBox.style.top = (newRect.top - removePadding) + "px";
                                        borderBox.style.left = (newRect.left - removePadding) + "px";
                                        }
                                        function deactivateBorder(e) {
                                        let borderBox = document.querySelector(".active-border");
                                        borderBox.style.opacity = "0";
                                        }
                                        function traceNumberInput(e) {
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        let newString = "";
                                        let spaceCounter = [4, 9, 14];
                                        let initString = "XXXX XXXX XXXX XXXX";
                                        if (spaceCounter.some((val) => e.target.value.length == val))
                                            e.target.value += " ";
                                        if (e.target.value.length <= 19) {
                                            let userInput = e.target.value;
                                            for (let i = 0; i < 19; i++) {
                                            if (i < userInput.length) {
                                                newString += userInput[i];
                                            }
                                            else {
                                                newString += initString[i];
                                            }
                                            }
                                            focusedInput.innerHTML = newString;
                                        }
                                        else {
                                            e.target.value = e.target.value.substr(0, 19);
                                        }
                                        }
                                        function traceNameInput(e) {
                                        if (e.target.value.length > 11) activateBorder(e);

                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        if (e.target.value == "") focusedInput.innerHTML = "NAME SURNAME";
                                        else focusedInput.innerHTML = e.target.value.toUpperCase();
                                        }
                                        function traceDateInput(e) {
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        let newString = "";
                                        let initString = "MM/YY";
                                        if (e.target.value.length == 2) e.target.value = e.target.value + "/";
                                        if (e.target.value.length < 6) {
                                            for (let i = 0; i < 5; i++) {
                                            if (i < e.target.value.length)
                                                newString += e.target.value[i];
                                            else
                                                newString += initString[i];
                                            }
                                            focusedInput.innerHTML = newString;
                                        }
                                        else {
                                            e.target.value = e.target.value.substr(0, 5);
                                        }
                                        }
                                        function traceCodeInput(e) {
                                        let focusedInput = document.querySelector(`.${e.target.name}`);
                                        if (e.target.value.length <= 3) {
                                            if (e.target.value == "") focusedInput.innerHTML = "123";
                                            else focusedInput.innerHTML = e.target.value;
                                        }
                                        else {
                                            e.target.value = e.target.value.substr(0, 3);
                                        }
                                        }
                                        // window.addEventListener("load", getImageSize);
                                        // window.addEventListener("resize", getImageSize);
                                        function getImageSize () {
                                        var img = document.querySelector('.card-background'); 
                                        cardContainer.style.height = img.clientHeight + "px";
                                        cardContainer.style.width = img.clientWidth + "px";
                                        }
                                    </script>

                                </div>

                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>

        

    </div>

</div>