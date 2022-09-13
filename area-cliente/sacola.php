<?php

  include 'header.php';

  if(!isset($_SESSION)) {
    session_start();
  }

?>

<script src="js/sacola.js"></script>

<body>
 
  <div class="container">
      <div class="row">

          <!-- Sacola -->
          <div id="col-dados" class="col-md-7 mt-5 mx-auto">
            <h1 class="ml-4 mt-4 mb-5" style="font-family: 'Catamaran';">Sacola</h1>

            <table class="table">
              <thead class="">
                <tr class="text-center">

                  <th style="font-family:'Catamaran';" scope="col">Produto</th>
                  <th style="font-family:'Catamaran';" scope="col">Nome</th>
                  <th style="font-family:'Catamaran';" scope="col">Preço</th>
                  <th style="font-family:'Catamaran';" scope="col">Quantidade</th>
                  <th style="font-family:'Catamaran';" scope="col">&nbsp</th>
                </tr>
              </thead>
              
              <?php
                require 'conexao.php';

                $cpfCliente = $_SESSION['cpfCliente'];

                $sqlItemCarrinho = "SELECT * FROM itemCarrinho WHERE cpfCliente = '$cpfCliente'";
                $buscaItemCarrinho = mysqli_query($conexao, $sqlItemCarrinho);
                $todosPrecos=[];

                while($array = mysqli_fetch_array($buscaItemCarrinho)){

                  $codigo = $array['idProduto'];
                  $qtdProdutoCarrinho = $array['qtdProduto'];

                  /*--------------------------------*/
                  $sqlProduto = "SELECT * FROM produto WHERE idProduto = '$codigo'";
                  $buscaProduto = mysqli_query($conexao, $sqlProduto);

                  while($array2 = mysqli_fetch_array($buscaProduto)){

                  $fotoProduto = $array2['fotoProduto'];
                  $nomeProduto = $array2['nomeProduto'];
                  $precoProduto = $array2['precoProduto'];

                  }

                    if(isset($nomeProduto) && isset($precoProduto) && isset($qtdProdutoCarrinho)){

                  echo '<tr class="text-center">';
                    echo '<form action="action-update-carrinho.php" method="POST">';
                      echo '<td style="color:#000;" ><img width="80" height="80" src="../assets/produtos/'.$fotoProduto.'"></td>';
                      echo '<td style="color:#000; font-family:\'Catamaran\';"><input name="nomeProduto" readonly style="border:0px; background:none; text-align:center; color:#000;" value="'.$nomeProduto.'"></td>';
                      echo '<td style="color:#000; font-family:\'Catamaran\';">R$ '.$precoProduto.'</td>';
                      echo '<td class="d-flex" style="color:#000; font-family:\'Catamaran\';">
                      <input name="qtdProduto" class="ml-auto" readonly style="width:50px; text-align:center;" type="number" value="'.$qtdProdutoCarrinho.'">
                        <div class="d-block mr-auto">
                          <div>
                            <button name="btn-adicionar" type="submit" style="border:0px;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
                              </svg>
                            </button>
                          </div>

                          <div>
                            <button name="btn-remover" type="submit" style="border:0px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash" viewBox="0 0 16 16">
                            <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                            </svg>
                            </button>
                          </div>
                        </div>
                      </td>';

                      echo '<td><button class="mt-2" type="submit" id="btn-form" name="btn-excluir"">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                                  <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                                  </svg>
                                </button>
                            </td>';
                    echo '</form>';
                  echo '</tr>';
                  }

                  if(isset($nomeProduto) && isset($precoProduto) && isset($qtdProdutoCarrinho)){
                    global $todosPrecos;
                    array_push($todosPrecos, ($precoProduto*$qtdProdutoCarrinho));
                    $total = array_sum($todosPrecos);

                  }
                }

              ?>

          </table>

          <!-- Subtotal -->
          <div style="border:1px solid #ebebeb;" class="container d-flex mb-5" id="total">
            <div>
              <i style="font-family:'Catamaran';">Subtotal</i>
            </div>
            <div class="ml-auto">

              <?php
                global $total;
                if ($total != "") {
                  echo'<span style="color:#265c34; font-family:\'Catamaran\';">R$ </span> <span style="font-family:\'Catamaran\';">'.$total.'</span>';
                }                
              ?>

            </div>
            
          </div>
          <?php

            if(isset($nomeProduto) && isset($precoProduto) && isset($qtdProdutoCarrinho)){

              echo'<div class="ml-3 mb-3">
                  <button class="ml-auto" id="btn-form" type="submit"><a style="text-decoration:none; color: #030c15;" href="locacao.php">Alugar Itens</a></button>
              </div>';
            }
          ?>

    </div>
  </div>

</body>