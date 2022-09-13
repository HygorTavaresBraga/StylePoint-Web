<?php

    include 'conexao.php';
    include 'header.php';

    if(!isset($_SESSION['cpfCliente'])){
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $sqlResgataLocacoes = "SELECT * FROM locacao WHERE cpfCliente = '$cpfCliente'";
    $resgataLocacoes = mysqli_query($conexao, $sqlResgataLocacoes);

    $codsResgatadosLocacao=[];
    $codsLocacao=[];

    while($array = mysqli_fetch_array($resgataLocacoes)){
        array_push($codsResgatadosLocacao, $array['cod']);
    }

    $codsLocacao = array_unique($codsResgatadosLocacao, SORT_NUMERIC);
    
?>

<div class="col-md-12 mt-5 col-dados">

<div class="d-block">
    <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Pagamentos</h1>

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
        <div class="form-group ">
            
            <div class="row text-center">
            
                <div class="col-md-12">

                <table style="border: 1px solid #e6e6e6" class="table mt-4 mb-5 text-center">
                    <thead>
                        <th style="font-family:Catamaran;">Código</th>
                        <th style="font-family:Catamaran;">Forma Pagamento</th>
                        <th style="font-family:Catamaran;">Status</th>
                        <th style="font-family:Catamaran;">&nbsp;</th>
                        <?php

                            foreach ($codsLocacao as $indice => $valor) {
                                $sqlBuscaLocacoes = "SELECT * FROM locacao WHERE cod = '$valor'";
                                $busca = mysqli_query($conexao, $sqlBuscaLocacoes);
 
                                $arrayLocacoes = mysqli_fetch_array($busca);

                                echo'</thead>

                                <tbody>';

                                    echo'<td style="color:#000; font-family: \'Nova Mono\', monospace;">'.$arrayLocacoes['cod'].'</td>';
                                    echo'<td style="color:#000; font-family: \'Nova Mono\', monospace;">'.$arrayLocacoes['formaPagamento'].'</td>';

                                    $sqlBuscaPagamentos = "SELECT * FROM pagamento WHERE codLocacao = '$valor'";
                                    $buscaPagamentos = mysqli_query($conexao, $sqlBuscaPagamentos);
                                    $pagamento = mysqli_fetch_array($buscaPagamentos);

                                    echo'<td style="color:#000; font-family: \'Nova Mono\', monospace;">'.$pagamento['statusPagamento'].'</td>';

                                    if($arrayLocacoes['formaPagamento'] == "Boleto"){
                                        echo'<td style="color:#000; font-family: \'Nova Mono\', monospace;"><button id="btn-form">Gerar PDF</button></td>';
                                    }else{

                                        echo'<td style="color:#000; font-family: \'Nova Mono\', monospace;">&nbsp;</button></td>';
                                    }

                                    
                            }
                    
                        ?>
                    </tbody>

                </table>
                </div>
                
            </div>

        </div>
    </div>          
