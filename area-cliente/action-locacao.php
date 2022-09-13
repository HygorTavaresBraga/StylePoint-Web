<?php

    include 'conexao.php';

    if(!isset($_SESSION)){
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $tempoLocacao = $_POST['tempoLocacao'];
    $formaPagamento = $_POST['formaPagamento'];
    $qtdParcela = $_POST['qtdParcela'];
    $parcelasRestantes = intval($qtdParcela)-1;

    if(isset($_POST['numeroCartao'])){
        $numeroCartao = $_POST['numeroCartao'];
    }

    $total = $_POST['precoProduto'];

    $data = Date('d/m/Y');

    $dia = Date('d');
    $mes = Date('m')+1;
    $ano = Date('Y');

    $idRand = rand();

    $sqlVerificaIdsLocacoes = "SELECT idLocacao FROM locacao WHERE idlocacao = '$idRand'";
    $buscaIds = mysqli_query($conexao, $sqlVerificaIdsLocacoes);
    $arrayIds = mysqli_fetch_array($buscaIds);

    if(isset($arrayIds['idLocacao'])){
        $idBuscado = $arrayIds['idLocacao'];
    }

    global $idBuscado;
    if($idBuscado == $idRand){
        
    }else{
        $cod = $idRand;
    }

    // Resgata itens do carrinho

    $sqlBuscaItensCarrinho = "SELECT * FROM itemcarrinho WHERE cpfCliente = '$cpfCliente'";
    $buscaItens = mysqli_query($conexao, $sqlBuscaItensCarrinho);

    while($array = mysqli_fetch_array($buscaItens)){        

        global $cod,$dia,$mes,$ano,$tempoLocacao;

        $dataLocacao = (intval($dia)-1)."/"."0".(intval($mes)-1)."/".$ano;
        $dataDevolucao = ((intval($dia)-1)+intval($tempoLocacao)).'/'."0".(intval($mes)-1).'/'.$ano;

        $idProduto = $array['idProduto'];
        $qtdProduto = $array['qtdProduto'];

        // Insere dados resgatados em locacao

        if(isset($_POST['numeroCartao']) && $_POST['numeroCartao'] != "Selecione"){
            $sqlCadLocacao = "INSERT INTO locacao (cod, cpfCliente, idProduto, dataLocacao, dataDevolucao, statusLocacao, formaPagamento, numeroCartao, qtdProduto, qtdParcela, valorTotal) VALUES ('$cod', '$cpfCliente', '$idProduto','$dataLocacao', '$dataDevolucao', 'Pago', '$formaPagamento', '$numeroCartao', '$qtdProduto', '$qtdParcela', '$total')";
            $sqlCadPagamento = "INSERT INTO pagamento (codLocacao, cpfCliente, statusPagamento, parcelasRestantes, dataPagamento) VALUES ('$cod', '$cpfCliente', 'Pago', '$parcelasRestantes', '$dataLocacao')";
        }else{
            $sqlCadLocacao = "INSERT INTO locacao (cod, cpfCliente, idProduto, dataLocacao, dataDevolucao, statusLocacao, formaPagamento, qtdProduto, qtdParcela, valorTotal) VALUES ('$cod', '$cpfCliente', '$idProduto','$dataLocacao', '$dataDevolucao', 'Aguardando Pagamento', '$formaPagamento', '$qtdProduto', '$qtdParcela', '$total')";
            $sqlCadPagamento = "INSERT INTO pagamento (codLocacao, cpfCliente, statusPagamento, dataPagamento) VALUES ('$cod', '$cpfCliente', 'Aguardando Pagamento', '$dataLocacao')";
        }

        $insereDadosLocacao = mysqli_query($conexao, $sqlCadLocacao);
        $insereDadosPagamento = mysqli_query($conexao, $sqlCadPagamento);
    

        // Adiciona dados dos produtos locados.

        $sqlBuscaProduto = "SELECT * FROM produto WHERE idProduto = '$idProduto'";
        $buscaProduto = mysqli_query($conexao, $sqlBuscaProduto);

        $array2 = mysqli_fetch_array($buscaProduto);

        $idProdutoDB = $array2['idProduto'];
        $nomeProduto = $array2['nomeProduto'];
        $fotoProduto = $array2['fotoProduto'];

        $sqlAddDadosProduto = "UPDATE locacao SET nomeProduto = '$nomeProduto', fotoProduto = '$fotoProduto' WHERE idProduto = '$idProdutoDB'";
        $atualizaProduto = mysqli_query($conexao, $sqlAddDadosProduto);

        // Exclui itens do carrinho

        $sqlExcluiCarrinho = "DELETE FROM itemcarrinho WHERE cpfCliente = '$cpfCliente'";
        $ExcluiCarrinho = mysqli_query($conexao, $sqlExcluiCarrinho);

        header("Location: action-cad-locacao.php");

    }

        

    
?>