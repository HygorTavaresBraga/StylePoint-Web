<?php

include 'header.php';

if(!isset($_SESSION)) {
    session_start();
}

?>

<div class="container-fluid">
    <div class="row w-100">
        <div style="margin-left: 83px;" class="col-md-4">
            <div class="input-group mt-4 ml-4">
                <input style="border-radius: 0px;" id="btn-form" style="margin-left: 80px;" placeholder="O que você procura?" aria-label="Search" aria-describedby="search-addon" />
                <button style="border-radius: 0px;" type="submit" id="btn-form">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <?php
            require'conexao.php';
            $sql = "SELECT * FROM produto WHERE generoProduto = 'Feminino'";
            $busca = mysqli_query($conexao, $sql);

            while($array = mysqli_fetch_array($busca)){
                $codigo = $array['idProduto'];
                $foto = $array['fotoProduto'];
                $nome = $array['nomeProduto'];
                $descricao = $array['descricaoProduto'];
                $preco = $array['precoProduto'];

                $cpfCliente = $_SESSION['cpfCliente'];

                $sqlItemCarrinho = "SELECT * FROM itemCarrinho WHERE idProduto = $codigo AND cpfCliente = '$cpfCliente'";
                $buscaItemCarrinho = mysqli_query($conexao, $sqlItemCarrinho);

                while($array2 = mysqli_fetch_array($buscaItemCarrinho)){
                    $idProduto = $array2['idProduto'];
                    $qtdCarrinho = $array2['qtdProduto'];
                }

                echo'<div class="card ml-5 mt-5 mr-5" style="width: 13rem; border: 0px;">';
                    echo '<form action="detalhes-produto.php" method="POST">';
                        echo' <button style="border:0px; background:none; width:208px;" type="submit"><img class="card-img-top" height="250" src="../assets/produtos/'.$foto.'"></button>
                            <input id="idProdutoSelecionado" name="idProdutoSelecionado" type="number" hidden value="'.$codigo.'">';
                        echo'<div class="card-body">';
                            echo'<h5 class="card-title">'.$nome.'</h5>';
                    echo '</form>';
                        echo'<p class="card-text"><font color="#003300">R$</font> '.$preco.'</p>';

                        echo'<div class="d-flex">';
                            echo'<div>
                                <button style="border: none; background:none;">
                                    <a style="color:#6b6b6b; text-decoration:none;" href="locacao.php">
                                        Locar
                                    </a>
                                </button>           
                            </div>';
                        echo'<div class="ml-auto">
                            <form action="action-add-carrinho.php" method="POST">
                            <input id="idProdutoSelecionado" name="idProdutoSelecionado" type="number" hidden value="'.$codigo.'">';
                        echo'    <button class="mr-2" type="submit" style="border: none; background:none;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-handbag" viewBox="0 0 16 16">
                                    <path d="M8 1a2 2 0 0 1 2 2v2H6V3a2 2 0 0 1 2-2zm3 4V3a3 3 0 1 0-6 0v2H3.36a1.5 1.5 0 0 0-1.483 1.277L.85 13.13A2.5 2.5 0 0 0 3.322 16h9.355a2.5 2.5 0 0 0 2.473-2.87l-1.028-6.853A1.5 1.5 0 0 0 12.64 5H11zm-1 1v1.5a.5.5 0 0 0 1 0V6h1.639a.5.5 0 0 1 .494.426l1.028 6.851A1.5 1.5 0 0 1 12.678 15H3.322a1.5 1.5 0 0 1-1.483-1.723l1.028-6.851A.5.5 0 0 1 3.36 6H5v1.5a.5.5 0 1 0 1 0V6h4z"/>
                                    </svg>
                                </button>';
                                if(isset($qtdCarrinho) && $codigo == $idProduto){
                                echo '<input id="qtdProdutoCarrinho" disabled style="width: 10px; border:0px;" value="'.$qtdCarrinho.'">';
                                }else{
                                echo '<input id="qtdProdutoCarrinho" disabled style="width: 10px; border:0px;" value="0">';
                                }
                    echo '</form>
                            </div>
                        </div>
                    </div>';
            
                echo '</div>';
            }
        ?>   
    </div>
</div>
