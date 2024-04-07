-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 31/01/2024 às 13:47
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `equipamentos`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `chamados`
--

CREATE TABLE `chamados` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `equipamento_id` int(11) NOT NULL,
  `data_abertura` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `chamados`
--

INSERT INTO `chamados` (`id`, `titulo`, `descricao`, `equipamento_id`, `data_abertura`) VALUES
(4, 'Defeito1', 'muito defeitos 1', 7, '2024-01-30'),
(5, 'Defeitoqqqq', 'aaaaaaaaaaaaa', 10, '1999-11-02');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipamentos`
--

CREATE TABLE `equipamentos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `preco_aquisicao` varchar(20) NOT NULL,
  `numero_serie` varchar(20) NOT NULL,
  `data_fabricacao` date NOT NULL,
  `fabricante` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `equipamentos`
--

INSERT INTO `equipamentos` (`id`, `nome`, `preco_aquisicao`, `numero_serie`, `data_fabricacao`, `fabricante`) VALUES
(7, 'Teste Equipamento 1', '2.222.222,00', '222222222222', '2022-11-02', 'Fabricante 1'),
(10, 'Equipamento2', '1.200,00', '666666666666', '2023-11-02', 'Fabricante 2');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `chamados`
--
ALTER TABLE `chamados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `equipamento_id` (`equipamento_id`);

--
-- Índices de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chamados`
--
ALTER TABLE `chamados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `equipamentos`
--
ALTER TABLE `equipamentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `chamados`
--
ALTER TABLE `chamados`
  ADD CONSTRAINT `chamados_ibfk_1` FOREIGN KEY (`equipamento_id`) REFERENCES `equipamentos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
