-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02/02/2025 às 20:59
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `choconuts`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` int(10) NOT NULL,
  `id_produtos` int(10) NOT NULL,
  `qtde` int(10) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `id_cliente` int(10) NOT NULL,
  `preco` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `id_produtos`, `qtde`, `nome`, `id_cliente`, `preco`) VALUES
(10, 15, 1, 'Bolo de milho', 1, 20.00),
(11, 16, 1, 'Bolo Red Velvet', 1, 20.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `senha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome`, `email`, `telefone`, `senha`) VALUES
(1, 'Lavinia Silva Almeida', 'laviniaalmeidah@gmail.com', '5573998419756', 'bonno123'),
(2, 'ADMIN', 'administrador@gmail.com', '5573998455543', 'chocochoco');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `num` varchar(10) NOT NULL,
  `cep` varchar(15) NOT NULL,
  `pagamento` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT 'Pedido Confirmado',
  `nome` varchar(50) NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `qtde` int(10) NOT NULL,
  `data` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `id_cliente`, `endereco`, `bairro`, `num`, `cep`, `pagamento`, `status`, `nome`, `preco`, `qtde`, `data`) VALUES
(11, 1, 'RUA PAU BRASIL', 'Pequi', '539', '45828-207', 'Cartão de Crédito', 'Pedido Confirmado', 'Bolo de chocolate com nutella', 19.00, 4, '2025-01-29 16:42:57'),
(12, 1, 'RUA PAU BRASIL', 'Pequi', '539', '45828-207', 'Cartão de Crédito', 'Pedido saiu para entrega', 'Bolo de laranja', 20.00, 1, '2025-01-29 16:42:57'),
(14, 1, 'RUA PAU BRASIL', 'Pequi', '539', '45828-207', 'Cartão de Crédito', 'Pedido Confirmado', 'Bolo de chocolate com nutella', 19.00, 4, '2025-01-29 16:42:57'),
(15, 1, 'RUA PAU BRASIL', 'Pequi', '539', '45828-207', 'Cartão de Crédito', 'Pedido Confirmado', 'Bolo de laranja', 20.00, 1, '2025-01-29 16:42:57');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id_produtos` int(10) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `preco` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id_produtos`, `nome`, `preco`) VALUES
(3, 'Bolo de chocolate com nutella', 20),
(7, 'Bolo de laranja', 20),
(9, 'Bolo de baunilha com cobertura de chocolate', 20),
(12, 'Bolo de chocolate com bombom', 20),
(13, 'Bolo de chocolate com cobertura de chocolate', 20),
(14, 'Bolo de cenoura com cobertura de chocolate', 20),
(15, 'Bolo de milho', 20),
(16, 'Bolo Red Velvet', 20),
(17, 'Bolo de chocolate com nutella', 20);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `fk_product` (`id_produtos`),
  ADD KEY `fk_cliente` (`id_cliente`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_cliente` (`id_cliente`);

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id_produtos`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id_produtos` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `fk_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `fk_product` FOREIGN KEY (`id_produtos`) REFERENCES `produtos` (`id_produtos`);

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
