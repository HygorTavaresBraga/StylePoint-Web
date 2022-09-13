<?php

    include 'conexao.php';
    include 'header.php';

    $cpfCliente = $_SESSION['cpfCliente'];

    $sqlBuscaNome = "SELECT nomeCliente FROM cliente WHERE cpfCliente = '$cpfCliente'";
    $buscaNome = mysqli_query($conexao, $sqlBuscaNome);
    $array = mysqli_fetch_array($buscaNome);

    $nomeCliente = $array['nomeCliente'];

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h3 class="mt-5" style="font-family: 'Catamaran'; text-transform: uppercase;">locação realizada com sucesso!</h3>
                <?php
                    echo'<h5 class="mt-5" style="font-family:\'Catamaran\'; font-weight: bold;">'.$nomeCliente.', se quiser acompanhar suas locações acesse seu perfil ou clique abaixo.</h5>';
                ?>
                <a style="font-family: 'Catamaran'; color: #000; text-decoration: none;" href="locacoes.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
                    </svg> ir para locações
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 text-center">
            <img width="300" src="assets/locacao/locacao-homem.png" alt="" srcset="">
        </div>

        <div class="col-md-6 text-center">
            <img width="300" src="assets/locacao/locacao-mulher.png" alt="" srcset="">
        </div>
    </div>

    <hr style="box-shadow: 1px 1px 1px 1px solid #000;">
    
</div>