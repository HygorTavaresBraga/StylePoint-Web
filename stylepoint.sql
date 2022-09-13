-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Set-2022 às 15:07
-- Versão do servidor: 10.1.39-MariaDB
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stylepoint`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(50) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `telefoneCliente` varchar(10) NOT NULL,
  `emailCliente` varchar(50) NOT NULL,
  `senhaCliente` varchar(50) NOT NULL,
  `fotoCliente` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecocliente`
--

CREATE TABLE `enderecocliente` (
  `idEndereco` int(11) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `cepCliente` varchar(9) NOT NULL,
  `ruaCliente` varchar(100) NOT NULL,
  `bairroCliente` varchar(100) NOT NULL,
  `complementoCliente` varchar(100) NOT NULL,
  `numeroCliente` varchar(10) NOT NULL,
  `ufCliente` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `formapagamento`
--

CREATE TABLE `formapagamento` (
  `idFormaPagamento` int(11) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `numeroCartao` varchar(19) NOT NULL,
  `titularCartao` varchar(50) NOT NULL,
  `dataValidadeCartao` varchar(5) NOT NULL,
  `codigoSegurancaCartao` varchar(3) NOT NULL,
  `tipoPagamento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(11) NOT NULL,
  `nomeFuncionario` varchar(50) NOT NULL,
  `cpfFuncionario` int(14) NOT NULL,
  `cargoFuncionario` varchar(30) NOT NULL,
  `admissaoFuncionario` date NOT NULL,
  `emailFuncionario` varchar(50) NOT NULL,
  `senhaFuncionario` varchar(50) NOT NULL,
  `fotoFuncionario` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nomeFuncionario`, `cpfFuncionario`, `cargoFuncionario`, `admissaoFuncionario`, `emailFuncionario`, `senhaFuncionario`, `fotoFuncionario`) VALUES
(1, 'admin', 0, 'TI', '0000-00-00', 'admin', 'admin', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itemcarrinho`
--

CREATE TABLE `itemcarrinho` (
  `idItemCarrinho` int(11) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `locacao`
--

CREATE TABLE `locacao` (
  `idLocacao` int(11) NOT NULL,
  `cod` int(11) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `idProduto` int(11) NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  `nomeProduto` varchar(100) NOT NULL,
  `fotoProduto` varchar(300) NOT NULL,
  `dataLocacao` varchar(10) NOT NULL,
  `dataDevolucao` varchar(10) NOT NULL,
  `statusLocacao` varchar(50) NOT NULL,
  `observacaoLocacao` varchar(300) NOT NULL,
  `formaPagamento` varchar(10) NOT NULL,
  `numeroCartao` varchar(19) NOT NULL,
  `qtdParcela` int(11) NOT NULL,
  `valorTotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `idPagamento` int(11) NOT NULL,
  `cpfCliente` varchar(14) NOT NULL,
  `codLocacao` int(11) NOT NULL,
  `parcelasRestantes` int(11) NOT NULL,
  `statusPagamento` varchar(30) NOT NULL,
  `dataPagamento` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(50) NOT NULL,
  `descricaoProduto` varchar(100) NOT NULL,
  `generoProduto` varchar(10) NOT NULL,
  `categoriaProduto` varchar(10) NOT NULL,
  `marcaProduto` varchar(20) NOT NULL,
  `corProduto` varchar(20) NOT NULL,
  `tamanhoProduto` varchar(2) NOT NULL,
  `qtdProduto` int(11) NOT NULL,
  `precoProduto` double NOT NULL,
  `fotoProduto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nomeProduto`, `descricaoProduto`, `generoProduto`, `categoriaProduto`, `marcaProduto`, `corProduto`, `tamanhoProduto`, `qtdProduto`, `precoProduto`, `fotoProduto`) VALUES
(1, 'Moletom Flanelado Prada', '', 'Masculino', 'Sueter', 'Dolce & Gabbana', 'Cinza', 'M', 241, 129.99, 'Moletom Flanelado Prada.jpg'),
(2, 'Conjunto XII D&G', '', 'Masculino', 'Conjunto', 'Dolce & Gabbana', 'Branco', 'M', 5, 229.99, 'Conjunto XII D&G.jpg'),
(3, 'Conjunto Savana Prada', '', 'Masculino', 'Conjunto', 'Prada', 'Caramelo', 'M', 8, 199.99, 'Conjunto Savana Prada.jpg'),
(4, 'Conjunto Level UP D&G', '', 'Masculino', 'Conjunto', 'Dolce & Gabbana', 'Branco', 'P', 63, 349.99, 'Conjunto Level UP D&G.jpg'),
(5, 'Conjunto IV Dior', '', 'Masculino', 'Conjunto', 'Dior', 'Preto', 'G', 1, 249.99, 'Conjunto IV Dior.jpg'),
(7, 'Conjunto Gucci VII', '', 'Masculino', 'Conjunto', 'Gucci', 'Preto', 'G', 6, 399.99, 'Conjunto Gucci VII.jpg'),
(8, 'Conjunto Fulgor Gucci', '', 'Masculino', 'Conjunto', 'Gucci', 'Branco', 'P', 8, 249.99, 'Conjunto Fulgor Gucci.jpg'),
(9, 'Conjunto Burberry', '', 'Masculino', 'Conjunto', 'Burberry', 'Branco', 'M', 9, 179.99, 'Conjunto Burberry.jpg'),
(10, 'Camiseta Skull D&G', '', 'Masculino', 'Camiseta', 'Dolce & Gabbana', 'Branco', 'M', 12, 139.99, 'Camiseta Skull D&G.jpg'),
(11, 'Camiseta Dior', '', 'Masculino', 'Camiseta', 'Dior', 'Branco', 'G', 13, 199.99, 'Camiseta Dior.jpg'),
(12, 'Camiseta Cultur-In Burberry', '', 'Masculino', 'Camiseta', 'Burberry', 'Branco', 'M', 7, 250.99, 'Camiseta Cultur-In Burberry.jpg'),
(13, 'Camisa Social Prada', '', 'Masculino', 'Camisa', 'Prada', 'Azul', 'M', 11, 199.99, 'Camisa Social Prada.jpg'),
(14, 'Camisa Polo LV', '', 'Masculino', 'Camisa', 'Louis Vuitton', 'Branco', 'P', 38, 199.99, 'Camisa Polo LV.jpg'),
(16, 'Camisa Florida Burberry', '', 'Masculino', 'Camisa', 'Burberry', 'Branco', 'M', 5, 189.99, 'Camisa Florida Burberry.jpg'),
(17, 'Conjunto Hermes Soft', '', 'Masculino', 'Conjunto', 'Hermes', 'Azul-Marinho', 'G', 68, 199.99, 'Conjunto Hermes Soft.jpg'),
(18, 'Camisa Jeans Hermes', '', 'Masculino', 'Camisa', 'Hermes', 'Azul-Marinho', 'G', 43, 229.99, 'Camisa Jeans Hermes.jpg'),
(19, 'Blusa Cropped D&G', '', 'Feminino', 'Blusa', 'Dolce & Gabbana', 'Branco', 'G', 94, 199.99, 'Blusa Cropped D&G.jpg'),
(20, 'Vestido Black LV', 'Vestido Wings Transpassado', 'Feminino', 'Vestido', 'Louis Vuitton', 'Preto', 'G', 23, 279.99, 'Vestido Transpassado Black Wings LV.jpg'),
(21, 'Conjunto Verona Gucci', 'Conjunto Moderno Verona Collection', 'Feminino', 'Conjunto', 'Gucci', 'Castanho', 'G', 71, 399.99, 'Conjunto Modern Verona Collection Gucci.jpg'),
(22, 'Conjunto Elegy Hermes', '', 'Feminino', 'Conjunto', 'Hermes', 'Preto', 'G', 26, 259.99, 'Conjunto Elegy Hermes.jpg'),
(23, 'Blusa Cropped Animals Gucci', '', 'Feminino', 'Blusa', 'Gucci', 'Verde', 'G', 43, 279.99, 'Blusa Cropped Animals Gucci.jpg'),
(24, 'Blusa Cropped Funnel Burberry', '', 'Feminino', 'Blusa', 'Burberry', 'Azul-Turquesa', 'M', 34, 199.99, 'Blusa Cropped Funnel Burberry.jpg'),
(25, 'Conjunto II AB Collection Gucci', '', 'Feminino', 'Conjunto', 'Gucci', 'Preto', 'M', 14, 349.99, 'Conjunto II AB Collection Gucci.jpg'),
(26, 'Blusa Loyal Black Prada', '', 'Feminino', 'Blusa', 'Prada', 'Preto', 'G', 17, 229.99, 'Blusa Loyal Black Prada.jpg'),
(27, 'Conjunto Monaco Dior', '', 'Feminino', 'Conjunto', 'Dior', 'Preto', 'G', 21, 379.99, 'Conjunto Monaco Dior.jpg'),
(28, 'Conjunto Moletom Burberry', '', 'Feminino', 'Conjunto', 'Burberry', 'Laranja', 'M', 39, 219.99, 'Conjunto Moletom Burberry.jpg'),
(29, 'Blusa Loyal Florida Gucci', '', 'Feminino', 'Blusa', 'Gucci', 'Laranja', 'M', 30, 199.99, 'Blusa Loyal Florida Gucci.jpg'),
(31, 'Camiseta Off-White Prada', 'Camiseta oversized', 'Feminino', 'Camiseta', 'Prada', 'Branco', 'GG', 19, 199.99, 'Camiseta Oversized Off-White Prada.jpg'),
(32, 'Conjunto List D&G', '', 'Feminino', 'Conjunto', 'Dolce & Gabbana', 'Azul-Bebê', 'G', 32, 329.99, 'Conjunto List D&G.jpg'),
(33, 'Conjunto Trendyol Collection Prada', '', 'Feminino', 'Conjunto', 'Prada', 'Azul-Turquesa', 'G', 22, 219.99, 'Conjunto Trendyol Collection Prada.jpg'),
(34, 'Conjunto VII Hermes', '', 'Feminino', 'Conjunto', 'Hermes', 'Verde', 'G', 37, 249.99, 'Conjunto VII Hermes.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indexes for table `enderecocliente`
--
ALTER TABLE `enderecocliente`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Indexes for table `formapagamento`
--
ALTER TABLE `formapagamento`
  ADD PRIMARY KEY (`idFormaPagamento`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `itemcarrinho`
--
ALTER TABLE `itemcarrinho`
  ADD PRIMARY KEY (`idItemCarrinho`);

--
-- Indexes for table `locacao`
--
ALTER TABLE `locacao`
  ADD PRIMARY KEY (`idLocacao`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`idPagamento`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enderecocliente`
--
ALTER TABLE `enderecocliente`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formapagamento`
--
ALTER TABLE `formapagamento`
  MODIFY `idFormaPagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `itemcarrinho`
--
ALTER TABLE `itemcarrinho`
  MODIFY `idItemCarrinho` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locacao`
--
ALTER TABLE `locacao`
  MODIFY `idLocacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `idPagamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
