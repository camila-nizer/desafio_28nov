-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Nov-2022 às 20:36
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `desafio_28nov`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id_funcionario` int(11) NOT NULL,
  `nome` text NOT NULL,
  `cpf` text NOT NULL,
  `nascimento` date NOT NULL,
  `sexo` text NOT NULL,
  `titulo_eleitor` text NOT NULL,
  `carteira_trabalho` text NOT NULL,
  `cep` text NOT NULL,
  `rua` text NOT NULL,
  `numero` text NOT NULL,
  `bairro` text NOT NULL,
  `cidade` text NOT NULL,
  `uf` text NOT NULL,
  `telefone` text NOT NULL,
  `email` text NOT NULL,
  `banco` text NOT NULL,
  `agencia` text NOT NULL,
  `conta` text NOT NULL,
  `tipo_conta` text NOT NULL,
  `salario` text NOT NULL,
  `ingresso` date NOT NULL,
  `status` text NOT NULL,
  `data_exclusao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id_funcionario`, `nome`, `cpf`, `nascimento`, `sexo`, `titulo_eleitor`, `carteira_trabalho`, `cep`, `rua`, `numero`, `bairro`, `cidade`, `uf`, `telefone`, `email`, `banco`, `agencia`, `conta`, `tipo_conta`, `salario`, `ingresso`, `status`, `data_exclusao`) VALUES
(1, 'camila', '23145678945', '1995-07-04', 'poupança', '1231456874', '1546513', '88132149', 'Avenida Atílio Pedro Pagani', 's/n', 'Pagani', 'Palhoça', 'SC', '48912344321', 'camila@gmail.com', 'teste', '1231', '1925475', 'poupança', '2,500', '2002-01-01', 'ativo', '2022-11-28 09:37:01'),
(2, 'Paula', '12312345691', '1994-07-18', 'poupança', '0000000', '000000', '88132159', 'Rua Bertoldo Rufino Beling', '1245', 'Passa Vinte', 'Palhoça', 'SC', '48991273745', 'paula@gmail.com', 'BB', '000', '111', 'poupança', '1200,00', '2022-11-01', 'ativo', '0000-00-00 00:00:00'),
(3, 'William', '12345895674', '2001-11-28', 'corrente', '456458755', '455555', '88132560', 'Rua Marina Emília dos Santos', '253', 'Caminho Novo', 'Palhoça', 'SC', '489912354875', 'william@gmail.com', 'caixa', '12345', '12254', 'poupança', '1000', '2020-02-28', 'ativo', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `id_vendas` int(11) NOT NULL,
  `descricao` text NOT NULL,
  `valor` text NOT NULL,
  `id_funcionario_fk` int(11) NOT NULL,
  `status_venda` text NOT NULL,
  `exclusao_venda` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `vendas`
--

INSERT INTO `vendas` (`id_vendas`, `descricao`, `valor`, `id_funcionario_fk`, `status_venda`, `exclusao_venda`) VALUES
(1, 'shampoo', '150', 3, 'ativo', '0000-00-00 00:00:00'),
(2, 'Condicionador', '170', 1, 'ativo', '0000-00-00 00:00:00'),
(3, 'edição_teste', '100', 1, 'ativo', '0000-00-00 00:00:00'),
(4, 'rímel', '150,26', 2, 'ativo', '0000-00-00 00:00:00'),
(5, 'óleo capilar', '50', 2, 'ativo', '0000-00-00 00:00:00');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id_funcionario`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id_vendas`),
  ADD KEY `id_funcionario_fk` (`id_funcionario_fk`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id_funcionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id_vendas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_ibfk_1` FOREIGN KEY (`id_funcionario_fk`) REFERENCES `funcionarios` (`id_funcionario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
