<?php
  include 'header-admin.php';
?>

<body>
  <div class="container" style="background-color: #000000bb; background-image: url('assets/admin/background.jpg'); color:#ebebeb; padding: 70px; border-left:solid black; border-top:solid black; border-radius: 15px; border-width: thin; box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.445); margin-top: 25px;">
    <h3>Lista de Produtos</h3>

    <table class="table table-striped">
      <thead class="thead-dark">
        <tr class="text-center">
          <th scope="col">Foto</th>
          <th scope="col">Nome</th>
          <th scope="col">Categoria</th>
          <th scope="col">Descrição</th>
          <th scope="col">Marca</th>
          <th scope="col">Gênero</th>
          <th scope="col">Tamanho</th>
          <th scope="col">Cor</th>
          <th scope="col">Preço</th>
          <th scope="col">Estoque</th>
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

          echo '<tr class="text-center">';
            echo '<td><img width="100" height="120" src="../assets/produtos/'.$fotoProduto.'"></img></td>';
            echo '<td>'.$nomeProduto.'</td>';
            echo '<td>'.$categoriaProduto.'</td>';
            echo '<td>'.$descricaoProduto.'</td>';
            echo '<td>'.$marcaProduto.'</td>';
            echo '<td>'.$generoProduto.'</td>';
            echo '<td>'.$tamanhoProduto.'</td>';
            echo '<td>'.$corProduto.'</td>';
            echo '<td>'.$precoProduto.'</td>';
            echo '<td>'.$qtdProduto.'</td>';
          echo '</tr>';
        }

      ?>

    </table>
  </div>

</body>