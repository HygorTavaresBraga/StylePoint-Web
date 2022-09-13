<?php

if (!isset($_SESSION)) {
    session_start();
}

include 'conexao.php';

$cpfCliente = $_SESSION['cpfCliente'];

$idProduto = $_POST['idProdutoSelecionado'];

$sqlBuscaProduto = "SELECT * FROM produto WHERE idProduto = '$idProduto'";
$sqlBusca = mysqli_query($conexao, $sqlBuscaProduto);
$array = mysqli_fetch_array($sqlBusca);

$nomeProduto = $array['nomeProduto'];
$descricaoProduto = $array['descricaoProduto'];
$marcaProduto = $array['marcaProduto'];
$corProduto = $array['corProduto'];
$tamanhoProduto = $array['tamanhoProduto'];
$qtdProduto = $array['qtdProduto'];
$precoProduto = $array['precoProduto'];

$nome_fotoProduto = $array['fotoProduto'];

$local = "../assets/produtos/";

$fotoProduto = $local.$nome_fotoProduto;

$sqlItemCarrinho = "SELECT * FROM itemCarrinho WHERE idProduto = $idProduto AND cpfCliente = '$cpfCliente'";
$buscaItemCarrinho = mysqli_query($conexao, $sqlItemCarrinho);

while($array2 = mysqli_fetch_array($buscaItemCarrinho)){
    $idProdutoDB = $array2['idProduto'];
    $qtdCarrinho = $array2['qtdProduto'];
}

?>

<?php
    include 'header.php';
?>

<div class="container">
    <div class="row d-flex">
        <div class="col-md-6 mt-5 text-center">
            <?php
                echo'<img style="border-radius: 15px;" width="300" src="'.$fotoProduto.'" alt="" srcset="">';
            ?>
        </div>

        <div class="col-md-6 mt-5 d-flex">
            <div class="col-md-6">
                <?php
                    echo'<h4 style="font-family:\'Canter\'; font-size:38px;" class="mb-4">'.$nomeProduto.'</h4>';

                    echo'<span style="font-family:\'Catamaran\'; font-size:17px; font-weight: bold;">Descrição</span>';
                    echo'<h6 style="font-family:\'Catamaran\'; font-size:18px;" class="mt-1 mb-4">'.$descricaoProduto.'</h6>';

                    echo'<span style="font-family:\'Catamaran\'; font-size:17px; font-weight: bold;">Marca</span>';
                    echo'<h6 style="font-family:\'Catamaran\'; font-size:20px;" class="mt-1 mb-4">'.$marcaProduto.'</h6>';

                    echo'<div class="d-block">
                            <span style="font-family:\'Catamaran\'; font-size:17px; font-weight: bold;">Cor</span> <br>
                            <button style="font-family:\'Catamaran\'; color:#000; font-size:20px; border-width: thin; padding:3px; border-radius: 5px;" class="mt-1 mb-4" disabled>'.$corProduto.'</button>
                    </div>';

                    echo'<div class="d-block">
                            <span style="font-family:\'Catamaran\'; font-size:17px; font-weight: bold;">Tamanho</span> <br>
                            <button style="font-family:\'Catamaran\'; color:#000; font-size:20px; border-width: thin; padding:3px 10px 3px 10px; border-radius: 5px;" class="mt-1 mb-4" disabled>'.$tamanhoProduto.'</button>
                    </div>';
                ?>
            </div>
            <div class="col-md-6 text-left">
                <?php
                    echo'<h4 style="font-family:\'Catamaran\'; font-size:15px;" class="mb-5 mt-3">'.$qtdProduto.' unidades disponíveis</h4>';

                    echo'<h6 style="font-family:\'Catamaran\'; font-size:30px; padding-top:175px;" class="mt-auto mb-4"><font color="#003300">R$ </font>'.$precoProduto.'</h6>';

                    echo'<div class="mt-5">
                            <form action="add-carrinho-detalhe.php" method="POST">
                            <input id="idProdutoSelecionado" name="idProdutoSelecionado" type="number" hidden value="'.$idProduto.'">
                            <div style="padding-top:15px;">
                                <button id="btn-form" class="mr-4">
                                        <a style="color:#6b6b6b; text-decoration:none;" href="locacao.php">
                                            Locar
                                        </a>
                                    </button>'; 
                                echo'<button class="mr-2" type="submit" style="border: none; background:none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-handbag" viewBox="0 0 16 16">
                                        <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"/>
                                        </svg>
                                    </button>';
                                    if(isset($qtdCarrinho) && $idProdutoDB == $idProduto){
                                    echo '<input id="qtdProdutoCarrinho" disabled style="width: 10px; border:0px;" value="'.$qtdCarrinho.'">';
                                    }else{
                                    echo '<input id="qtdProdutoCarrinho" disabled style="width: 10px; border:0px;" value="0">';
                                    }
                    echo'</div>
                            </form>
                            </div>';
                ?>
            </div>
        </div>
    </div>
</div>