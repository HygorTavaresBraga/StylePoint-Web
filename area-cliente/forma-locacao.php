<?php

include 'conexao.php';
include 'header.php';

?>

<div class=" d-block mt-4">
                <i style="font-family:'Catamaran';">Cartão</i>
                <table class="table">

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
                                    <td>
                                      <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                      </div>
                                    </td>
                                    <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:50px;" name="finalCartao" readonly type="text" value="'.$finalCartao.'"></td>
                                    <td><input style="color:#000; font-family: \'Nova Mono\', monospace; border:0px; width:80px;" name="formaPagamento" readonly type="text" value="'.$formaPagamento.'"></td>
                                  </tr>
                              </tbody>';

                      }
                  ?>



                  </table>

                </div>