<?php
  require 'conexao.php';
  include 'header-admin.php';
?>

<body>

  <div class="container d-flex" style="background-color: #000000bb; background-image: url('assets/admin/background.jpg'); color:#ebebeb; padding: 70px; border-left:solid black; border-top:solid black; border-radius: 15px; border-width: thin; box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.445); margin-top: 25px; width: 70%;">
    <form action="action-create-cliente.php" method="post" enctype="multipart/form-data" >
    <h3 style="margin-bottom:25px;">Cadastro de Clientes</h3>
      <div class="row">
  
        <div class="col-md-6">
          <div class="form-group ">
            <label for="company">Nome</label>
            <input type="text" class="form-control" autocomplete="false" placeholder="" id="nomeCliente" name="nomeCliente" >
          </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
          <label for="company">Email</label>
          <input type="email" class="form-control" autocomplete="false" placeholder="exemplo@email.com" id="emailCliente" name="emailCliente" >
        </div>
      </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="company">Telefone</label>
            <input type="text" class="form-control" autocomplete="false" placeholder="Somente números" id="telefoneCliente" name="telefoneCliente" >
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="company">Senha</label>
            <input type="password" class="form-control" autocomplete="false" placeholder="" id="senhaCliente" name="senhaCliente" >
            
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="company">CPF</label>
            <input type="text" class="form-control" autocomplete="false" placeholder="Somente números" id="cpfCliente" name="cpfCliente" >
          </div>
        </div>      
      
      <div class="col-md-6">
        <label for="email">Foto</label>
          <div class="input-group">
            <div class="input-group-prepend">
          </div>

          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01"
              aria-describedby="inputGroupFileAddon01" name="fotoCliente">
            <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
          </div>
      </div>
    </div>
  </div>
      <div style="margin: 30px 0 0;">
        <button style="padding:5px; border-radius:5px; border:0px; font-family:'Catamaran'; font-size:18px;" type="submit">Cadastrar</button>
      </div>

    </form>

  </div>
</body>