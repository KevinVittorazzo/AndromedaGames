-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Nov-2023 às 22:45
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `andromeda_games`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(75) NOT NULL,
  `plataforma` varchar(45) DEFAULT NULL,
  `descricao` varchar(250) NOT NULL,
  `preco` varchar(15) NOT NULL,
  `imagem` varchar(80) NOT NULL,
  `categoria` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `plataforma`, `descricao`, `preco`, `imagem`, `categoria`) VALUES
(12, 'Resident Evil 4', 'PlayStation', 'Jogo horripilante', 'R$ 100,00', 'prod2.png', 'Terror'),
(13, 'SimCity', 'PlayStation', 'Use sua criatividade', 'R$ 50,00', 'prod8.png', 'Simulação'),
(14, 'The Sims 4', 'pc', 'O melhor jogo de simulação', 'R$ 99.90', 'prod5.png', 'Simulação'),
(16, 'Undertale', 'Switch', 'Um jogo fofo e criativo', 'R$ 109.90', 'prod4.png', 'RPG'),
(17, 'Poly Bridge', 'Xbox', 'Um jogo legal de pontes', 'R$ 89.90', 'prod7.png', 'Simulação'),
(18, 'FortiNite', 'pc', 'Jogo Legal', 'R$ 80,00', 'prod1.png', 'Jogo Online'),
(19, 'GTA V', 'Switch', 'Tiro, porrada e bomba...', 'R$ 120.90', 'prod3.png', 'Ação/Aventura'),
(20, 'Grounded', 'PlayStation', 'Jogo muito legal', 'R$ 99.99', 'prod6.png', 'Ação/Aventura');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `nome` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`nome`, `email`, `senha`) VALUES
('a', 'a@a', '$2y$10$NxzrOkrLokuCLmvZMr1qQOO.2rZSk.gNJhWXHlJXKo5tm/VXpBKUm');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
