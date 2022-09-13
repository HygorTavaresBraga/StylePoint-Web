<?php

    include 'conexao.php';
    include 'header.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

?>

    <!-- Locações -->
    <div class="col-md-12 mt-5 col-dados">

        <div class="d-block">
            <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Locações</h1>

                <a class="ml-4 mt-4" style="font-family: \'Catamaran\'; color: #000; text-decoration: none;" href="perfil.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg> voltar para perfil
                </a>
        </div>

        <hr>
    
        <div class="col-md-12 mb-5 col-dados">
        <div class="pt-4 pb-4">
            <div class="col-md-12">
                <div class="form-group">
                    

                        <?php
                        
                        
                            $sqlBuscaLocacoes = "SELECT * FROM locacao WHERE cpfCliente = '$cpfCliente'";
                            $busca = mysqli_query($conexao, $sqlBuscaLocacoes);

                            $codsResgatadosLocacao=[];
                            $codsLocacao=[];

                            while($array = mysqli_fetch_array($busca)){
                                array_push($codsResgatadosLocacao, $array['cod']);
                            }

                            $codsLocacao = array_unique($codsResgatadosLocacao, SORT_NUMERIC);

                            if($codsLocacao == null){
                                echo'<label style="font-family:\'Catamaran\';">Você não possui locações!</label> <br>';
                            }else{
                                echo'<label style="font-family:\'Catamaran\';" for="company">Suas Locações</label> <br>';
                            }

                            // ---------------------------------------------------------------

                            foreach ($codsLocacao as $indice => $valor) {

                                $sqlBuscaLocacoes = "SELECT cod,dataLocacao,formaPagamento,valorTotal FROM locacao WHERE cod = '$valor'";
                                $busca = mysqli_query($conexao, $sqlBuscaLocacoes);

                                $array = mysqli_fetch_array($busca);

                                echo '<table style="border: 1px solid #e6e6e6" class="table mt-4 mb-5 text-center">

                                    <thead>
                                        <tr>
                                            <th style="font-family:\'Catamaran\';" scope="col">Código</th>
                                            <th style="font-family:\'Catamaran\';" scope="col">Data de Locação</th>
                                            <th style="font-family:\'Catamaran\';" scope="col">Forma de Pagamento</th>
                                            <th style="font-family:\'Catamaran\';" scope="col">Total</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>

                                    <form action="detalhes-locacao.php" method="POST">
                                        <tbody>
                                            <tr>
                                                <td><input name="cod" style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:100px; text-align: center;" name="finalCartao" readonly type="text" value="'.$array['cod'].'"></td>
                                                <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:100px; text-align: center;" name="finalCartao" readonly type="text" value="'.$array['dataLocacao'].'"></td>                                                                                   
                                                <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:100px; text-align: center;" name="finalCartao" readonly type="text" value="'.$array['formaPagamento'].'"></td>
                                                <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:80px; text-align: center;" name="finalCartao" readonly type="text" value="R$ '.$array['valorTotal'].'"></td>
                                                <td>
                                                    <button type="submit" id="btn-form"">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-card-text" viewBox="0 0 16 16">
                                                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
                                                    <path d="M3 5.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 8zm0 2.5a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5z"/>
                                                </svg>
                                                        detalhes
                                                    </button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </form>';
                                
                            }

                        ?>
                        
                </div>
            </div>          
