<?php
  require 'conexao.php';
  include 'header-admin.php';
?>

<body>
  
<div class="container" style="background-color: #000000bb; background-image: url('assets/admin/background.jpg'); color:#ebebeb; padding: 70px; border-left:solid black; border-top:solid black; border-radius: 15px; border-width: thin; box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.445); margin-top: 25px;">
<h3>Edição de Produtos</h3>
<table class="table table-striped">
  <thead class="thead-dark">
    <tr class="text-center">
      <th scope="col">Foto</th>
      <th scope="col">Nome</th>
      <th class="text-center" scope="col">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
        <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
        </svg>
      </th>      
    </tr>
  </thead>
  
    
      <?php
    require'conexao.php';
    $sql = "SELECT * FROM produto";
    $busca = mysqli_query($conexao, $sql);
    
    while($array = mysqli_fetch_array($busca)){
      $fotoProduto = $array['fotoProduto'];
      $nomeProduto  = $array['nomeProduto'];
      $categoriaProduto  = $array['categoriaProduto'];
      $descricaoProduto  = $array['descricaoProduto'];
      $marcaProduto  = $array['marcaProduto'];
      $generoProduto = $array['generoProduto'];
      $tamanhoProduto  = $array['tamanhoProduto'];
      $corProduto  = $array['corProduto'];
      $precoProduto  = $array['precoProduto'];
      $qtdProduto = $array['qtdProduto'];

       echo '<form action="action-update-produto.php" method="post">';
        echo '<tr class="text-center">';
        echo '<td><img width="100" height="120" src="../assets/produtos/'.$fotoProduto.'"></img></td>';
        echo '<td><input readonly style="background:none; border:0px; width:100%; color:#ebebeb; text-align:center" name="nomeProduto" type="text" value="'.$nomeProduto.'"></td>';
        echo '<td>
                <button name="btn-editar" type="submit" id="btn-adm">Editar</button>';
        echo '</tr>';
     echo'</form>';
    }

 ?>



</table>

</body>

