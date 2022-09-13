<?php

    include 'conexao.php';
    include 'header.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $cod = $_POST['cod'];

    $sqlBuscaLocao = "SELECT * FROM locacao WHERE cod = '$cod' AND cpfCliente = '$cpfCliente'";
    $busca = mysqli_query($conexao, $sqlBuscaLocao);

    $nomeProdutos = [];
    $nomeFotoProdutos = [];

    while($array = mysqli_fetch_array($busca)){

        array_push($nomeFotoProdutos, $array['fotoProduto']);
        array_push($nomeProdutos, $array['nomeProduto']);

        if(isset($array['dataDevolucao']) && isset($array['statusLocacao']) && isset($array['qtdParcela'])){

            $dataDevolucao = $array['dataDevolucao'];
            $status = $array['statusLocacao'];
            $qtdParcela = $array['qtdParcela'];

        }

    }

    $local = "../assets/produtos/";   

?>

<div class="col-md-12 mt-5 mb-5 col-dados">
    <div class="pt-4 pb-4">
        <div class="col-md-12">
            <div class="form-group ">

                <?php
                    echo'<label style="font-family:\'Catamaran\'; font-weight: bold;">Detalhes da locação nº '.$_POST['cod'].'</label> <br>
                    <a style="font-family: \'Catamaran\'; color: #000; text-decoration: none;" href="locacoes.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg> voltar para locações
                </a> <br>';
            
                    echo '<table style="border: 1px solid #e6e6e6" class="table mt-4 mb-5 text-center">

                        <thead>
                            <tr>
                                <th style="font-family:\'Catamaran\';" scope="col">Produtos</th>
                                <th style="font-family:\'Catamaran\';" scope="col">Data de Devolução</th>';
                                if(isset($qtdParcela)){
                                    if($qtdParcela != 0){
                                        echo'<th style="font-family:\'Catamaran\';" scope="col">Parcelas</th>';
                                    }
                                }
                                echo'<th style="font-family:\'Catamaran\';" scope="col">Status</th>';
                                echo'<th>&nbsp;</th>
                            </tr>
                        </thead>

                        <form action="detalhes-locacao.php" method="POST">
                            <tbody>
                                <tr>';
                                echo'<td>';
                                    foreach ($nomeFotoProdutos as $indice => $valor) {
                                        echo'<img class="mb-4 mr-2" width="40" height="40" src="'.$local.$valor.'">';
                                    }
                                    foreach ($nomeProdutos as $indice => $valor) {
                                        echo'<p style="color:#000; font-family: \'Catamaran\'; text-align:center; ">'.$valor.'</p>';
                                    }
                                echo'</td>';
                                        if(isset($dataDevolucao)){
                                            echo'<td><p style="color:#000; font-family: \'Catamaran\'; text-align:center; ">'.$dataDevolucao.'</p></td>';
                                        }  

                                        if(isset($qtdParcela)){
                                            if($qtdParcela != 0){
                                            echo'<td><p style="color:#000; font-family: \'Catamaran\'; text-align:center; ">'.$qtdParcela.'</p></td>';
                                            }
                                        }

                                        if(isset($status)){
                                            echo'<td><p style="color:#000; font-family: \'Catamaran\'; text-align:center; ">'.$status.'</p></td>';
                                        }
                                        
                                        
                                echo'</tr>
                            </tbody>
                        </form>';
                    ?>
                
            </div>
        </div>
    </div>
</div>