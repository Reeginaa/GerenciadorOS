-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17-Set-2020 às 04:27
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetointegrador`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `anexoorcamento`
--

CREATE TABLE `anexoorcamento` (
  `id` int(11) NOT NULL,
  `descricaoAnexo` varchar(150) DEFAULT NULL,
  `arquivo` varchar(500) DEFAULT NULL,
  `codigoOS` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `nomeEquipamento` varchar(45) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `numeroSerie` varchar(50) DEFAULT NULL,
  `observacoesEquipamento` varchar(350) DEFAULT NULL,
  `codigoMarca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca`
--

CREATE TABLE `marca` (
  `id` int(11) NOT NULL,
  `nomeMarca` varchar(20) NOT NULL,
  `observacaoMarca` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ordemservico`
--

CREATE TABLE `ordemservico` (
  `id` int(11) NOT NULL,
  `dataInicio` date NOT NULL,
  `dataTermino` date DEFAULT NULL,
  `defeito` varchar(250) NOT NULL,
  `observacoesOS` varchar(350) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `valorTotal` double DEFAULT NULL,
  `termos` tinyint(1) NOT NULL,
  `assinatura` tinyint(1) NOT NULL,
  `codigoStatusServico` int(11) DEFAULT NULL,
  `codigoPessoa` int(11) DEFAULT NULL,
  `codigoEquipamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ospeca`
--

CREATE TABLE `ospeca` (
  `id` int(11) NOT NULL,
  `codigoOS` int(11) DEFAULT NULL,
  `codigoPeca` int(11) DEFAULT NULL,
  `valorPeca` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `osservico`
--

CREATE TABLE `osservico` (
  `id` int(11) NOT NULL,
  `codigoOS` int(11) DEFAULT NULL,
  `codigoServico` int(11) DEFAULT NULL,
  `valorServico` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `peca`
--

CREATE TABLE `peca` (
  `id` int(11) NOT NULL,
  `item` varchar(100) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `valorCompra` double NOT NULL,
  `valorVenda` double NOT NULL,
  `desconto` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoa`
--

CREATE TABLE `pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(250) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `rg` varchar(10) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `sexo` varchar(10) DEFAULT NULL,
  `logradouro` varchar(300) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `complemento` varchar(350) DEFAULT NULL,
  `bairro` varchar(100) NOT NULL,
  `cidade` varchar(50) NOT NULL,
  `email` varchar(400) DEFAULT NULL,
  `senha` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `codigoTipoPessoa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `servico`
--

CREATE TABLE `servico` (
  `id` int(11) NOT NULL,
  `servico` varchar(200) NOT NULL,
  `valor` double NOT NULL,
  `desconto` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `statusservico`
--

CREATE TABLE `statusservico` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL,
  `descricaoStatus` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipopessoa`
--

CREATE TABLE `tipopessoa` (
  `id` int(11) NOT NULL,
  `tipo` varchar(25) NOT NULL,
  `descricao` varchar(350) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `anexoorcamento`
--
ALTER TABLE `anexoorcamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoOS` (`codigoOS`);

--
-- Índices para tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoMarca` (`codigoMarca`);

--
-- Índices para tabela `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomeMarca` (`nomeMarca`);

--
-- Índices para tabela `ordemservico`
--
ALTER TABLE `ordemservico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoStatusServico` (`codigoStatusServico`),
  ADD KEY `codigoPessoa` (`codigoPessoa`),
  ADD KEY `codigoEquipamento` (`codigoEquipamento`);

--
-- Índices para tabela `ospeca`
--
ALTER TABLE `ospeca`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoOS` (`codigoOS`),
  ADD KEY `codigoPeca` (`codigoPeca`);

--
-- Índices para tabela `osservico`
--
ALTER TABLE `osservico`
  ADD PRIMARY KEY (`id`),
  ADD KEY `codigoOS` (`codigoOS`),
  ADD KEY `codigoServico` (`codigoServico`);

--
-- Índices para tabela `peca`
--
ALTER TABLE `peca`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `rg` (`rg`),
  ADD KEY `codigoTipoPessoa` (`codigoTipoPessoa`);

--
-- Índices para tabela `servico`
--
ALTER TABLE `servico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `servico` (`servico`);

--
-- Índices para tabela `statusservico`
--
ALTER TABLE `statusservico`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status` (`status`);

--
-- Índices para tabela `tipopessoa`
--
ALTER TABLE `tipopessoa`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipo` (`tipo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `anexoorcamento`
--
ALTER TABLE `anexoorcamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca`
--
ALTER TABLE `marca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ordemservico`
--
ALTER TABLE `ordemservico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ospeca`
--
ALTER TABLE `ospeca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `osservico`
--
ALTER TABLE `osservico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `peca`
--
ALTER TABLE `peca`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pessoa`
--
ALTER TABLE `pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `servico`
--
ALTER TABLE `servico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `statusservico`
--
ALTER TABLE `statusservico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tipopessoa`
--
ALTER TABLE `tipopessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `anexoorcamento`
--
ALTER TABLE `anexoorcamento`
  ADD CONSTRAINT `anexoorcamento_ibfk_1` FOREIGN KEY (`codigoOS`) REFERENCES `ordemservico` (`id`);

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`codigoMarca`) REFERENCES `marca` (`id`);

--
-- Limitadores para a tabela `ordemservico`
--
ALTER TABLE `ordemservico`
  ADD CONSTRAINT `ordemservico_ibfk_1` FOREIGN KEY (`codigoStatusServico`) REFERENCES `statusservico` (`id`),
  ADD CONSTRAINT `ordemservico_ibfk_2` FOREIGN KEY (`codigoPessoa`) REFERENCES `pessoa` (`id`),
  ADD CONSTRAINT `ordemservico_ibfk_3` FOREIGN KEY (`codigoEquipamento`) REFERENCES `equipamento` (`id`);

--
-- Limitadores para a tabela `ospeca`
--
ALTER TABLE `ospeca`
  ADD CONSTRAINT `ospeca_ibfk_1` FOREIGN KEY (`codigoOS`) REFERENCES `ordemservico` (`id`),
  ADD CONSTRAINT `ospeca_ibfk_2` FOREIGN KEY (`codigoPeca`) REFERENCES `peca` (`id`);

--
-- Limitadores para a tabela `osservico`
--
ALTER TABLE `osservico`
  ADD CONSTRAINT `osservico_ibfk_1` FOREIGN KEY (`codigoOS`) REFERENCES `ordemservico` (`id`),
  ADD CONSTRAINT `osservico_ibfk_2` FOREIGN KEY (`codigoServico`) REFERENCES `servico` (`id`);

--
-- Limitadores para a tabela `pessoa`
--
ALTER TABLE `pessoa`
  ADD CONSTRAINT `pessoa_ibfk_1` FOREIGN KEY (`codigoTipoPessoa`) REFERENCES `tipopessoa` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
