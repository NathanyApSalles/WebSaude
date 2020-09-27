-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 10-Jan-2018 às 21:57
-- Versão do servidor: 10.1.28-MariaDB
-- PHP Version: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lamantequilla`
--
CREATE DATABASE lamantequilla;
USE lamantequilla;
-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedor`
--

CREATE TABLE `fornecedor` (
  `idFornecedor` int(10) UNSIGNED NOT NULL,
  `nomeEmpresa` varchar(45) NOT NULL,
  `nomeRepresentante` varchar(45) NOT NULL,
  `cnpj` varchar(14) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `telefoneEmpresa` int(11) NOT NULL,
  `telefoneRepresentante` int(11) NOT NULL,
  `emailEmpresa` varchar(100) NOT NULL,
  `emailRepresentante` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `fornecedor` (`idFornecedor`, `nomeEmpresa`, `nomeRepresentante`, `cnpj`, `endereco`, `telefoneEmpresa`, `telefoneRepresentante`, `emailEmpresa`, `emailRepresentante`) VALUES
(1, 'Farinhas Vilma', 'Vilma', '2344556789002', 'Rua Brasília, Centro', 38516666, 98076543, 'farinhasvilma@gmail.com', 'vilma@gmail.com'),
(2, 'Leite Itambé', 'João', '43561903927831', 'Rua Maranhão ,Morro', 889021341, 900213432, 'leiteitambe@gmail.com', 'joao@gmail.com'),
(3, 'Pó Royal', 'Maria', '78263910743092', 'Rua Novo Horizonte ,Bela Vista', 897493112, 265675140, 'poroyal@gmail.com', 'maria@gmail.com'),
(4, 'Parmalate', 'Lucia', '90128945893209', 'Rua Amazonas,Antônio Carlos', 485419440, 424906639, 'parmalate@gmail.com', 'lucia@gmail.com'),
(5, 'Alfa', 'Talita', '56718930291834', 'Rua Nova Lima, Belo Horizonte', 760716262, 451016655, 'alfa@gmail.com', 'talita@gmail.com'),
(6, 'Cotochés', 'Sander', '90184390219034', 'Rua Olinda,São Paulo', 189630872, 141683589, 'cotcohes@gmail.com', 'sander@gmail.com'),
(7, 'Ovos Dacodorna', 'Nicole', '90023891203321', 'Rua Alvinopolis,Rio de Janeiro', 118223063, 885095792, 'dacodorna@gmail.com', 'nicole@gmail.com'),
(8, 'Dona Benda', 'Benta', '89012317843902', 'Rua Monte Negro,Rio Grande do Sul', 971842588, 491401175, 'donabenta@gmail.com', 'benta@gmail.com'),
(9, 'Maizena', 'Victor', '78290189332145', 'Rua Beija Flot, São Paulo', 743584688, 429614391, 'maizena@gmail.com', 'victor@gmail.com'),
(10, 'Piracanjubá', 'Bruna', '45902389012312', 'Rua Mato Grosso,João Monlevade', 146303994, 450542479, 'piracanjuba@gmail.com', 'bruna@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(10) UNSIGNED NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `endereco` varchar(100) NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `cpf`, `nome`, `endereco`, `cargo`) VALUES
(1, '90328919543', 'Alice', 'Rua Maranhão,Satélite', 'Gerente'),
(2, '21904328954', 'Talita', 'Rua Monte Sinai,Centro', 'Diretora'),
(3, '90319093901', 'Sander', 'Rua José de Alencar,Alvorada', 'Presidente'),
(4, '89301290221', 'Nicole', 'Rua 11 de Setembro,Vale do Sol', 'Funcionária'),
(5, '90321893424', 'Thiago', 'Rua Santa Luzia,Santa Barbára', 'Diretor'),
(6, '90217843290', 'João', 'Rua Amazonas, Vila Tanque', 'Funcionário'),
(7, '12390218943', 'Maria', 'Rua Nova Lima, Novo Horizonte', 'Diretora Administrativo Finaceira'),
(8, '91290213284', 'Diana', 'Rua Beija Flor,Rosário', 'Assessora'),
(9, '91239154356', 'Juliana', 'Rua 13 de Março,Lucília', 'Funcionária'),
(10, '23190432894', 'André', 'Rua Mato Grosso,Loanda', 'Funcionário');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `idLogin` int(10) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `tipo` tinyint(4) NOT NULL,
  `Funcionario_idFuncionario` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`idLogin`, `email`, `senha`, `tipo`, `Funcionario_idFuncionario`) VALUES
(1, 'lamantequilla@alfa.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 3),
(2, 'funcionario@alfa.com', '3802bbe7c14128ebd50dbfdd4db95c1ffdc8425b', 2, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `idProduto` int(10) UNSIGNED NOT NULL,
  `nome` varchar(45) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `descricao` longtext NOT NULL,
  `precoCusto` varchar(5) NOT NULL,
  `precoVenda` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`idProduto`, `nome`, `quantidade`, `descricao`, `precoCusto`, `precoVenda`) VALUES
(1, 'Farinha de Trigo', 7, 'Farinha Dona Benta para fabricar pães', 1, 3),
(2, 'Ovos', 3, 'Ovos para a fabricação', 0.5, 1),
(3, 'Pó Royal', 9, 'Fermento químico para bolos', 1, 2),
(4, 'Amido de Milho', 7, 'Utilizar a marca maizena para fabricação', 2, 4),
(5, 'Leite', 1, 'Leite Desnatado', 0.6, 2),
(6, 'Manteiga', 6, 'Utilizada para untar a massa', 2, 5),
(7, 'Sal', 4, 'Inserir sal nos ingredientes dos pães', 1.5, 4),
(8, 'Açúcar', 8, 'Utilizar açúcar refinado', 2, 3),
(9, 'Queijo', 6, 'Utilizar para fazer pão de queijo', 0.6, 2),
(10, 'Aveia', 4, 'Ingrediente para pão integral', 0.9, 2.5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fornecedor`
--
ALTER TABLE `fornecedor`
  ADD PRIMARY KEY (`idFornecedor`);

--
-- Indexes for table `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`idLogin`),
  ADD KEY `fk_Login_Funcionario_idx` (`Funcionario_idFuncionario`);

--
-- Indexes for table `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idProduto`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedor`
--
ALTER TABLE `fornecedor`
  MODIFY `idFornecedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `idLogin` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produto`
--
ALTER TABLE `produto`
  MODIFY `idProduto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `fk_Login_Funcionario` FOREIGN KEY (`Funcionario_idFuncionario`) REFERENCES `funcionario` (`idFuncionario`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
