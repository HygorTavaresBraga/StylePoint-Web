<?php

  include 'header.php';

  if(!isset($_SESSION)) {
    session_start();
  }

?>

<script src="js/formaPagamento.js"></script>

<body>
 
  <div class="container">
      <div class="row">

          <!-- Sacola -->
          <div id="col-dados" class="col-md-6 mt-5 mx-auto">
            <a class="ml-4" style="text-decoration: none; color:#000; font-size:13px;" href="sacola.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/>
              </svg>
              sacola
            </a>
            <h1 class="ml-4 mt-4 mb-5" style="font-family: 'Catamaran';">Locação</h1>

            <table class="table">
              <thead class="">
                <tr class="text-center">

                  <th style="font-family:'Catamaran';" scope="col">Produto</th>
                  <th style="font-family:'Catamaran';" scope="col">Nome</th>
                  <th style="font-family:'Catamaran';" scope="col">Preço</th>
                  <th style="font-family:'Catamaran';" scope="col">Quantidade</th>
                </tr>
              </thead>
              
              <?php
                require 'conexao.php';

                $cpfCliente = $_SESSION['cpfCliente'];

                $sqlItemCarrinho = "SELECT * FROM itemCarrinho WHERE cpfCliente = '$cpfCliente'";
                $buscaItemCarrinho = mysqli_query($conexao, $sqlItemCarrinho);
                $todosPrecos=[];

                $nomesProdutos=[];
                $precoProdutos=[];
                $qtdProdutos=[];
                

                while($array = mysqli_fetch_array($buscaItemCarrinho)){

                  $codigo = $array['idProduto'];
                  $qtdProdutoCarrinho = $array['qtdProduto'];

                  /*-----------------------------------------*/

                  $sqlProduto = "SELECT * FROM produto WHERE idProduto = '$codigo'";
                  $buscaProduto = mysqli_query($conexao, $sqlProduto);

                  while($array2 = mysqli_fetch_array($buscaProduto)){

                  $idProduto = $array2['idProduto'];
                  $fotoProduto = $array2['fotoProduto'];
                  $nomeProduto = $array2['nomeProduto'];
                  $precoProduto = $array2['precoProduto'];
                  $qtdProduto = $array2['qtdProduto'];

                  if(isset($nomeProduto) && isset($precoProduto) && isset($qtdProdutoCarrinho)){

                    echo '<tr class="text-center">';
                    echo '<form action="action-locacao.php" method="POST">';
                      echo '<td style="color:#000;" ><img width="80" height="80" src="../assets/produtos/'.$fotoProduto.'"></td>';
                      echo '<td style="color:#000; font-family:\'Catamaran\';">'.$nomeProduto.'</td>';
                      echo '<td style="color:#000; font-family:\'Catamaran\';">R$ '.$precoProduto.'</td>';
                      echo '<td style="color:#000; font-family:\'Catamaran\';">'.$qtdProdutoCarrinho.'</td>';     
                    echo '</form>';
                    echo '</tr>';

                  }

                }

                  if(isset($nomeProduto) && isset($precoProduto) && isset($qtdProdutoCarrinho)){

                    global $todosPrecos;
                    array_push($todosPrecos, ($precoProduto*$qtdProdutoCarrinho));
                    $total = array_sum($todosPrecos);
                    
                  }
                }

              ?>
          </table>
        </div>

        <div style=" border: 1px solid #e6e6e6; margin-top: 50px;" id="col-dados" class="d-block col-md-5">
         <!-- SubTotal -->
         <div class="container d-block mb-2" id="total">
            <div class="pt-3" id="total">
              <div class="d-flex mb-3">
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
            </div>

            <hr>

            <?php
              if(isset($_POST['cep'])){
                  $cep = $_POST['cep'];
                }
            ?>

            <!-- CÁLCULO DO FRETE -->
            <div class="d-block">
              <form class="d-flex" action="" method="POST">

                <div>
                  <input name="cep" id="btn-form" type="text" placeholder="CEP">
                  <button type="submit" id="btn-form" return false>Calcular</button>
                </div>

                <div class="ml-auto">
                  <?php
                    if(isset($cep)){
                      $frete = "R$ 50,00";                    
                      echo '<input style="border:0px; background:none; width: 60px; margin-left: 10px; font-family:\'Catamaran\';" type="text" readonly value="'.$frete.'">';
                    }  
                  ?>
               </div>

              </form>
            </div>

            <hr>

          <form action="action-locacao.php" method="POST">

            <!-- TEMPO DE LOCAÇÃO -->
            <div>
              <div class="d-flex align-items-center mt-2 mb-2">
                <div>
                  <i style="font-family:'Catamaran';">Tempo de Locação</i>
                </div>

                    <select name="tempoLocacao" id="btn-form" class="ml-auto">
                      <option selected hidden>Selecione</option>
                      <option value=1>1 dia</option>
                      <option value=2>2 dias</option>
                      <option value=3>3 dias</option>
                    </select>
    
                </div>
              </div>
           
            
            <hr>
            
            <!-- FORMA DE PAGAMENTO -->
              <div class="d-flex align-items-center mt-2 mb-3">
                <div>
                  <i style="font-family:'Catamaran';">Forma de Pagamento</i>
                </div>

                <div class=" d-flex ml-auto ">
                  <div class="form-check pr-4">
                  <input onclick="ocultaSelect()" type="radio" value="Boleto" class="form-check-input" name="formaPagamento">
                  <label style="font-family: 'Catamaran';" class="form-check-label" for="formaPagamento">
                      Boleto
                    </label>
                  </div>

                  <div class="form-check">
                  <input onclick="mostraSelect()" type="radio" value="Cartao" class="form-check-input" name="formaPagamento">
                    <label style="font-family: 'Catamaran';" class="form-check-label" for="formaPagamento">
                      Cartão
                    </label>
                  </div>

                </div>
              </div>

            <!-- CARTÃO -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <div id="selectCartao" style="display: none" class="align-items-center mt-2 mb-3">

                <div class="d-block">
                  <span style="font-family:'Catamaran';">Cartão</span><br>

                  <select onchange="MostraOcultaParcela()" id="btn-form" name="numeroCartao" class="mb-2" >
                    <option selected hidden>Selecione</option>
                     <?php
                        $sqlBuscaCartoes = "SELECT * FROM formapagamento WHERE cpfCliente = '$cpfCliente'";
                        $buscaCartoes = mysqli_query($conexao, $sqlBuscaCartoes);

                        while($arrayCartao = mysqli_fetch_array($buscaCartoes)){

                          echo'<option id="opt-cartao" data-tipo="'.$arrayCartao['tipoPagamento'].'" value="'.$arrayCartao['numeroCartao'].'">'.$arrayCartao['numeroCartao']." - ".$arrayCartao['tipoPagamento'].'</option>';

                        }
                      ?>
                  </select>
              </div>
            </div>

            

            <!-- Parcela -->
            <div id="selectParcela" style="display: none;" class="align-items-center mt-2 mb-2">
                
              <div class="d-block">
                <span style="font-family:'Catamaran';">Parcela</span><br>
                  <select id="btn-form" name="qtdParcela">
                    <option selected hidden>Selecione</option>
                    <option value=2>2x</option>
                    <option value=3>3x</option>
                    <option value=4>4x</option>
                    <option value=5>5x</option>
                    <option value=6>6x</option>
                  </select>
              </div>
            </div>

            <hr>

             <!-- Total -->
            <div class="pb-3" id="total">
              <div class="d-flex">
                <div>
                  <i style="font-family:'Catamaran';">Total</i>
                </div>
                
                <div class="ml-auto">
  
                  <?php
                    global $total,$todosProdutos;
                    if ($total != "") {

                      if(isset($cep)){
                        echo'<span style="color:#265c34; font-family:\'Catamaran\';">R$ </span>
                        <input name="precoProduto" style="font-family:\'Catamaran\'; border:0px; background: none; width:55px;" readonly value="'.($total+50).'">';
                      }else{
                        echo'<span style="color:#265c34; font-family:\'Catamaran\';">R$ </span>
                        <input name="precoProduto" style="font-family:\'Catamaran\'; border: 0px; background: none; width:55px;" readonly value="'.$total.'">';
                      }
                      
                    }

                  ?>
                  
                </div>
                
                <hr>

              </div>
              <button class="mt-4 mb-3" id="btn-form" type="submit">Alugar</button>
            </div>
            

          </div>
        </div>
      </div>
      </div>

</body>