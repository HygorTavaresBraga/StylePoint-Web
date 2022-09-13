<?php

require'conexao.php';
include 'header-admin.php';
include 'selecao-produto.php';

?>

<link rel="stylesheet" href="../area-cliente/css/style.css">

<div class="container d-flex">

    <div class="row mx-auto">

        <div id="dados-enviar" class="col-md-6 mt-5 col-dados text-center">
        <?php
            echo'<img class="mt-5" style="border-radius:15px;" width="350" height="550" src="../assets/produtos/'.$fotoProduto.'" alt="Foto do Produto">';
        ?>
        </div>

        <div id="dados-enviar" class="col-md-6 mt-5 col-dados">

            <div class="d-flex">
                <h1 class="ml-4 mt-4 mb-4" style="font-family: 'Catamaran';">Editar</h1>
            </div>

            <form action="action-editar-produto.php" method="POST" enctype="multipart/form-data">
                <div class="col-md-12 mb-5 col-dados">
                    <div class="pt-4 pb-4 mx-auto">

                        <div class="col-md-12">

                                <label for="nome">Nome</label>
                                <input type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $nomeProduto ?>" id="nomeProduto" name="nomeProduto">
                                <input hidden type="text" class="form-control form-control-md mb-3" autocomplete="false" value="<?php echo $nomeProduto ?>" id="nomeProdutoDB" name="nomeProdutoDB">
                           
                                <label for="descricao">Descrição</label>
                                <textarea style="resize:none;" type="text" class="form-control form-control-md mb-3" autocomplete="false" id="descricaoProduto" name="descricaoProduto"><?php echo $descricaoProduto ?></textarea>
                        
                                <label for="genero">Gênero</label>
                                <select class="custom-select" id="generoProduto" name="generoProduto">
                                    <option selected hidden><?php echo $generoProduto ?></option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                        
                                <label class="mt-3" for="categoria">Categoria</label>
                                <select class="custom-select" id="categoriaProduto" name="categoriaProduto">
                                    <option selected hidden><?php echo $categoriaProduto ?></option>
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
                        
                                <label class="mt-3" for="marca">Marca</label>
                                <select class="custom-select" id="marcaProduto" name="marcaProduto">
                                    <option selected hidden><?php echo $marcaProduto ?></option>
                                    <option value="Burberry">Burberry</option>
                                    <option value="Dior">Dior</option>
                                    <option value="Dolce & Gabbana">Dolce & Gabbana</option>
                                    <option value="Gucci">Gucci</option>
                                    <option value="Louis Vuitton">Louis Vuitton</option>
                                    <option value="Prada">Prada</option>
                                    <option value="Hermés">Hermés</option>
                                </select>
                                
                                <label class="mt-3" for="cor">Cor</label>
                                <select class="custom-select" id="corProduto" name="corProduto">
                                    <option selected hidden><?php echo $corProduto ?></option>
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

                                <label class="mt-3" for="tamanho">Tamanho</label>
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

                                <label class="mt-3" for="estoque">Estoque</label>
                                <input type="number" class="form-control" value="<?php echo $qtdProduto ?>" id="qtdProduto" name="qtdProduto">
                                

                                <label class="mt-3" for="preco">Preço</label>
                                <input type="number" step="0.01" class="form-control" value="<?php echo $precoProduto ?>" id="precoProduto" name="precoProduto" onkeyup="k(this);">
                                

                                <label class="mt-3" for="foto">Foto</label>                              
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                </div>

                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="inputGroupFile01"
                                        aria-describedby="inputGroupFileAddon01" name="fotoProduto">
                                    <label class="custom-file-label" for="inputGroupFile01">Selecione uma foto</label>
                                </div>           

                        </div>

                        <div class="mt-5 mb-4">
                            <button id="btn-save" name="btn-salvar" type="submit">Salvar</button>
                            <button id="btn-warn" name="btn-excluir" type="submit">Excluir</button>
                            
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    
</div>