<?php
  include 'header-admin.php';
?>

<body>

<div class="container" style="background-color: #000000bb; background-image: url('assets/admin/background.jpg'); color:#ebebeb; padding: 70px; border-left:solid black; border-top:solid black; border-radius: 15px; border-width: thin; box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.445); margin-top: 25px;">
  <h3>Lista de Clientes</h3>

  <table class="table table-striped">
    <thead class="thead-dark">
      <tr class="text-center">
        <th scope="col">Código</th>
        <th scope="col">Perfil</th>
        <th scope="col">Nome</th>
        <th scope="col">CPF</th>
        <th scope="col">Telefone</th>
        <th scope="col">E-mail</th>
        <th scope="col">Senha</th>
        <th scope="col">
        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
        </svg>
        </th>
      </tr>
    </thead>
  
    
    <?php
      require'conexao.php';
      $sql = "select * from cliente";
      $busca = mysqli_query($conexao, $sql);
      
      while($array = mysqli_fetch_array($busca)){
        $codigo = $array['idCliente'];
        $nomeCliente = $array['nomeCliente'];
        $cpf = $array['cpfCliente'];
        $telefone = $array['telefoneCliente'];
        $email = $array['emailCliente'];
        $senha = $array['senhaCliente'];
        $foto = $array['fotoCliente'];

        echo '<tr class="text-center">';
          echo '<td>'.$codigo.'</td>';
          echo '<td><img style="border-radius:50%; text-align:center;" width="80" height="80" src="../area-cliente/assets/clientes/'.$foto.'"></img></td>';
          echo '<td>'.$nomeCliente.'</td>';
          echo '<td>'.$cpf.'</td>';
          echo '<td>'.$telefone.'</td>';
          echo '<td>'.$email.'</td>';
          echo '<td>'.$senha.'</td>';
          echo '<td>
                    <div">
                      <button id="btn-adm">Endereço</button>
                    </div>

                    <div>
                      <button id="btn-adm">Carrinho</button>
                    </div>

                    <div>
                      <button id="btn-adm">Locações</button>
                    </div>                  
                  
                </td>';
        echo '</tr>';
      }

    ?>

  </table>
</div>

</script>
</body>
</html>