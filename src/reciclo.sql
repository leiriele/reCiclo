-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 12/06/2023 às 00:05
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `reciclo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `comentario` text NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `nome`, `sobrenome`, `telefone`, `comentario`, `email`) VALUES
(1, 'Leiriele', 'Correa', '34991170325', 'Teste comentario', 'leiricorrea@gmail.com'),
(2, 'Leiriele', 'Correa', '34991170325', 'Teste 2 ', 'leiricorrea@gmail.com'),
(3, 'Leiriele', 'Correa', '34991170325', 'Teste 3', 'leiricorrea@gmail.com'),
(4, 'Leiriele', 'Correa', '34991170325', 'Teste final', 'leiricorrea@gmail.com');

-- --------------------------------------------------------

--
-- Estrutura para tabela `noticias`
--

CREATE TABLE `noticias` (
  `id_new` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `noticias`
--

INSERT INTO `noticias` (`id_new`, `nome`, `email`) VALUES
(1, 'Leiriele', 'leiriele@teste.com'),
(2, 'Jefferson Dias', 'jefferson@teste.br'),
(3, 'nami', 'nami@teste.br'),
(4, 'teste', 'teste@gmail.com'),
(5, 'Teste 2 ', 'teste2@teste.com'),
(6, 'Teste Final', 'teste@teste.br');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `idusuarios` int(11) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `produto` varchar(255) DEFAULT NULL,
  `quantidade` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `midia` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `idusuarios`, `nome`, `endereco`, `produto`, `quantidade`, `descricao`, `telefone`, `midia`) VALUES
(1, 1, 'Leiriele Correa', 'R Guaianazes 225, Planalto', 'metal', 2, 'lata', '34991170325', ''),
(3, 1, 'Leiriele Correa', 'R Guaianazes 225, Planalto', 'papel', 4, '', '34991170325', ''),
(4, 2, 'Jefferson Dias', 'Rua B nº 123, bairro tal', 'papel', 10, 'livros', '3484307811', ''),
(5, 2, 'Jefferson Dias', 'Rua B nº 123, bairro tal', 'papel', 15, 'papel', '3484307811', 0x666f6c68612e706e67);

-- --------------------------------------------------------

--
-- Estrutura para tabela `senha_reset`
--

CREATE TABLE `senha_reset` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `data_expiracao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `senha_reset`
--

INSERT INTO `senha_reset` (`id`, `email`, `token`, `data_expiracao`) VALUES
(1, 'leiriele@teste.com', '051a17151b28c4f96945d3a97e84dae5a96b2e2e75693522a4ab0b71760dbaed', '2023-05-30 03:31:43'),
(2, 'leiriele@teste.com', '759d6efd3fc5402205b806a00bee29a7d5a58a92e8936204ee339889881dc2e3', '2023-05-30 03:32:01'),
(3, 'leiricorrea@gmail.com', 'ca9f9802c0184677e18ca578716bfb24d2ff159fd560546024151240c9e22b9c', '2023-05-30 03:41:41');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `dataNasc` date DEFAULT NULL,
  `cidade` varchar(255) NOT NULL,
  `estado` varchar(255) NOT NULL,
  `logradouro` varchar(255) DEFAULT NULL,
  `numeroN` int(11) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `name`, `email`, `senha`, `cpf`, `dataNasc`, `cidade`, `estado`, `logradouro`, `numeroN`, `bairro`, `cep`) VALUES
(1, 'Leiriele Correa', 'leiriele@teste.com', '123', '10134119606', '1992-09-20', 'Monte Carmelo', 'MG', 'Rua DOIS', 225, 'Planalto', '3850000'),
(2, 'Jefferson Dias', 'jeff@teste.com', '12345', '1478963250', '2000-01-12', 'Tupaciguara', 'MG', 'Rua B', 123, 'tal', '36501024'),
(4, 'Luis F', 'luis@gmail.com', '123', '123', '1995-05-20', 'Monte Carmelo', 'MG', 'Rua A', 229, 'Planalto', '38500'),
(5, 'Camila', 'camila@gmail.com', '123', '111', '2005-05-20', 'Monte Carmelo', 'MG', 'Rua C', 11, 'tal', '38500'),
(6, 'helena lima', 'helena@gmail.com', '123', '1234', '2010-08-20', 'Uberlândia', 'MG', 'Rua B', 23, 'EXEMPLO', '38500'),
(12, 'Nami N', 'nami@teste.br', '1234', '10134119606', '1989-10-06', 'Monte Carmelo', 'MG', 'Rua A', 123, 'A', '38500000');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Índices de tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_new`);

--
-- Índices de tabela `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `idusuarios` (`idusuarios`);

--
-- Índices de tabela `senha_reset`
--
ALTER TABLE `senha_reset`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `senha_reset`
--
ALTER TABLE `senha_reset`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`idusuarios`) REFERENCES `usuarios` (`idusuarios`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
