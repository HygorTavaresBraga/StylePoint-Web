<?php
  require'conexao.php';
  include 'header-admin.php'
?>

<body>

<div class="container" style="background-color: #000000bb; background-image: url('assets/admin/background.jpg'); color:#ebebeb; padding: 70px; border-left:solid black; border-top:solid black; border-radius: 15px; border-width: thin; box-shadow: 0 10px 10px 10px rgba(0, 0, 0, 0.445); margin-top: 25px; width: 70%;">

  <form action="action-create-produto.php" method="post" enctype="multipart/form-data" >
  <h3 style="margin-bottom:25px;">Cadastro de Produtos</h3>

    <!-- NOME, GÊNERO E CATEGORIA -->
    <div class="row">

      <div class="col-md-6">
        <div class="form-group">
          <label for="nomeProduto"><b style="color: red">*</b> Nome</label>
          <input type="text" class="form-control" id="nomeProduto" name="nomeProduto" required="true">
        </div>
      </div>

      <div class="col-md-3">
        <label for="generoProduto"><b style="color: red">*</b> Gênero</label>
        <select class="custom-select" id="generoProduto" name="generoProduto" required="true">
          <option selected hidden>Selecione</option>
          <option value="Masculino">Masculino</option>
          <option value="Feminino">Feminino</option>
        </select>
      </div>

      <div class="col-md-3">
          <label for="categoriaProduto"><b style="color: red">*</b>Categoria</label>
          <select class="custom-select" id="categoriaProduto" name="categoriaProduto" required="true">
            <option selected hidden>Selecione</option>
            <option value="Conjunto">Conjunto</option>
            <option value="Camisa">Camisa</option>
            <option value="Camiseta">Camiseta</option>
            <option value="Blusa">Blusa</option>
            <option value="Suéter">Suéter</option>
            <option value="Cardigan">Cardigan</option>
            <option value="Suéter">Suéter</option>
            <option value="Blazer">Blazer</option>
            <option value="Jaqueta">Jaqueta</option>
            <option value="Casaco">Casaco</option>
            <option value="Colete">Colete</option>
            <option value="Regata">Regata</option>
            <option value="Calça">Calça</option>
            <option value="Bermuda">Bermuda</option>
            <option value="Vestido">Vestido</option>
          </select>
        </div>

    </div>

    <!-- DESCRIÇÃO -->
    <div class="row">
      <div class="col-md-12">
      
        <div class="form-group">
          <label for="descricaoProduto">Descrição</label>
          <textarea type="text" class="form-control" id="descricaoProduto" name="descricaoProduto" style="resize: none"></textarea>
        </div>
   
      </div>
    </div>

    <!-- COR, MARCA, PREÇO E TAMANHO -->
    <div class="row">

      <div class="col-md-3">
        <label for="corProduto"><b style="color: red">*</b>Cor</label>
        <select class="custom-select" id="corProduto" name="corProduto" required="true">
          <option selected hidden>Selecione</option>
          <option value="Amarelo">Amarelo</option>          
          <option value="Azul">Azul</option>
          <option value="Azul-Bebê">Azul-Bebê</option>
          <option value="Azul-Marinho">Azul-Marinho</option>
          <option value="Azul-Turquesa">Azul-Turquesa</option>
          <option value="Bege">Bege</option>          
          <option value="Bordô">Bordô</option>
          <option value="Branco">Branco</option>
          <option value="Caramelo">Caramelo</option>
          <option value="Castanho">Castanho</option>
          <option value="Cinza">Cinza</option>          
          <option value="Creme">Creme</option>          
          <option value="Laranja">Laranja</option>          
          <option value="Lilás">Lilás</option>          
          <option value="Marrom">Marrom</option>          
          <option value="Mostarda">Mostarda</option>          
          <option value="Preto">Preto</option>          
          <option value="Rosa">Rosa</option>          
          <option value="Rosa-Bebê">Rosa-Bebê</option>          
          <option value="Rosa-Choque">Rosa-Choque</option>          
          <option value="Roxo">Roxo</option>          
          <option value="Salmão">Salmão</option>          
          <option value="Verde">Verde</option>          
          <option value="Verde-Água">Verde-Água</option>          
          <option value="Vermelho">Vermelho</option>               
          <option value="Vinho">Vinho</option>          
          <option value="Violeta">Violeta</option>          
        </select>
      </div>

      <div class="col-md-3">
        <label for="marcaProduto"><b style="color: red">*</b>Marca</label>
        <select class="custom-select" id="marcaProduto" name="marcaProduto" required="true">
          <option selected hidden>Selecione</option>
          <option value="Burberry">Burberry</option>          
          <option value="Dior">Dior</option>          
          <option value="Dolce & Gabbana">Dolce & Gabbana</option>
          <option value="Gucci">Gucci</option>
          <option value="Louis Vuitton">Louis Vuitton</option>
          <option value="Prada">Prada</option>
          <option value="Hermes">Hermes</option>
        </select>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <label for="precoProduto"><b style="color: red">*</b> Preço</label>
          <input type="number" step="0.01" class="form-control" placeholder="" id="precoProduto" name="precoProduto" required="true" onkeyup="k(this);" >
        </div>
      </div>

      <div class="col-md-4">
        <label for="tamanhoProduto"><b style="color: red">*</b>Tamanho</label>
          <div>

            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tamanhoProduto" id="tamanhoProduto" value="P">
              <label class="form-check-label" for="tamanhoP">P</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tamanhoProduto" id="tamanhoProduto" value="M">
              <label class="form-check-label" for="tamanhoM">M</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tamanhoProduto" id="tamanhoProduto" value="G">
              <label class="form-check-label" for="tamanhoG">G</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="tamanhoProduto" id="tamanhoProduto" value="GG">
              <label class="form-check-label" for="tamanhoGG">GG</label>
            </div>
          </div>

      </div>

    </div>

    <!-- QUANTIDADE E FOTO -->
    <div class="row">
    
      <div class="col-md-4">
        <div class="form-group">
          <label for="qtdProduto"><b style="color: red">*</b> Quantidade</label>
          <input type="number" class="form-control" placeholder="Somente números" id="qtdProduto" name="qtdProduto" required="true" >
        </div>
      </div>

        <div class="col-md-4">
          <label for="fotoProduto"><b style="color: red">*</b>Foto</label>
            <div class="input-group">
              <div class="input-group-prepend">
            </div>

            <div class="custom-file">
              <input type="file" class="custom-file-input" id="inputGroupFile01"
                aria-describedby="inputGroupFileAddon01" name="fotoProduto">
              <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
            </div>
        </div>

      </div>

      <div class="col-md-12">
        <div style="margin-top:50px;">
          <button style="padding:5px; border-radius:5px; border:0px; font-family:'Catamaran'; font-size:18px;" type="submit">Cadastrar</button>
        </div>
      </div>

  </form>

</div>

<script>
  function k(i) {
  var v = i.value.replace(/\D/g,'');
  v = (v/100).toFixed(2) + '';
  i.value = v;
}

</script>



</body>
</html>



