<?php
    include 'conexao.php';

    if(!isset($_SESSION)) {
        session_start();
    }

    $cpfCliente = $_SESSION['cpfCliente'];

    $idProduto = $_POST['idProdutoSelecionado'];
    $qtdCarrinho = intval($_POST['qtdProdutoCarrinho']);

    $pegaIdItem = "SELECT idItemCarrinho FROM itemCarrinho WHERE cpfCliente = '$cpfCliente' AND idProduto = '$idProduto'";
    $busca = mysqli_query($conexao, $pegaIdItem);

    $idItemBD = mysqli_fetch_array($busca);

   if ($idItemBD == null){
        $adicionaItem = "INSERT INTO itemCarrinho (cpfCliente, idProduto, qtdProduto) VALUES ('$cpfCliente', '$idProduto', 1)";
        $adicao = mysqli_query($conexao, $adicionaItem);
   }    

    header("Location: sacola.php");

?>
