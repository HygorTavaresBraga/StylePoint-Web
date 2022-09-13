<?php
  require 'conexao.php';
  include 'header-admin.php';
?>

<body>

<div class="container" style="background-color: #000000bb; background-image: url('assets/admin/background.jpg'); color:#ebebeb; padding: 70px; border-left:solid black; border-top:solid black; border-radius: 15px; border-width: thin; box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.445); margin-top: 25px; width: 70%;">
  <form action="action-create-funcionario.php" method="post" enctype="multipart/form-data" >
    <h3 style="margin-bottom:25px;">Cadastro de Funcionários</h3>

      <div class="row">

        <div class="col-md-6">
          <div class="form-group ">
            <label for="company">Nome</label>
            <input type="text" class="form-control" id="nomeFuncionario" name="nomeFuncionario">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group ">
            <label for="company">CPF</label>
            <input type="text" class="form-control" placeholder="Somente números" id="cpfFuncionario" name="cpfFuncionario">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group ">
            <label for="company">Cargo</label>
            <select class="form-control" name="cargoFuncionario" id="cargoFuncionario">
              <option value="" selected hidden>Selecione</option>
              <option value="Administrador(a)">Administrador(a)</option>
              <option value="Consultor(a) de Moda" >Consultor(a) de Moda</option>
              <option value="Estoquista" >Estoquista</option>
              <option value="TI" >TI</option>
              <option value="Marketing Digital" >Marketing Digital</option>
              <option value="Gestor(a) de Redes Sociais" >Gestor(a) de Redes Sociais</option>
            </select>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group ">
            <label for="company">Data de Admissão</label>
            <input type="date" class="form-control" id="admissaoFuncionario" name="admissaoFuncionario">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group ">
            <label for="company">E-mail</label>
            <input type="email" class="form-control" id="emailFuncionario" name="emailFuncionario">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="company">Senha</label>
            <input type="password" class="form-control" placeholder="••••••" id="senhaFuncionario" name="senhaFuncionario" >
          </div>
        </div>

        <div class="col-md-6">
          <label for="foto">Foto</label>
          <div class="input-group">
            <div class="input-group-prepend">
          </div>

          <div class="custom-file">
            <input type="file" class="custom-file-input" id="inputGroupFile01"
              aria-describedby="inputGroupFileAddon01" name="fotoFuncionario">
            <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
          </div>
        </div>
     
        <div style="margin-top: 30px">
          <button style="padding:5px; border-radius:5px; border: 0px; font-family:'Catamaran'; font-size:18px;" type="submit">Cadastrar</button>
        </div>

      </div>
  </form>
</div>

</body>
</html>



