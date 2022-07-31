-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 31-Jul-2022 às 17:43
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud-php-js`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id` int(11) NOT NULL,
  `logradouro` varchar(200) NOT NULL,
  `numero` varchar(40) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `enderecos`
--

INSERT INTO `enderecos` (`id`, `logradouro`, `numero`, `usuario_id`) VALUES
(1, 'Rua de teste 1', '1', 1),
(2, 'Rua Agamenon', '100', 2),
(3, 'Av Recife', '80', 3),
(4, 'Rua de teste 2', '26', 4),
(5, 'Av Agamenon M', '87', 5),
(6, 'Av Presidente Kennedy', '32', 6),
(7, 'Madalena', '100', 8),
(8, 'Madalena', '100', 9),
(9, 'Rua Vinte e Três', '13', 10),
(10, 'teste', '50', 11),
(11, 'Rua Vinte e Três', '100', 12),
(12, 'Rua Vinte e Três', '80', 13),
(13, 'Rua Vinte e Três', '10', 14),
(14, 'Madalena', '13', 15),
(15, 'Rua Vinte e Três', '13', 16),
(16, 'Rua Vinte e Três', '13', 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`) VALUES
(1, 'Teste', 'teste@gmail.com'),
(2, 'Fulano', 'fulano@gmail.com'),
(3, 'Beltrano', 'beltrano@gmail.com'),
(4, 'Teste 2', 'teste2@gmail.com'),
(5, 'Carla', 'carla@gmail.com'),
(6, 'Carlos', 'carlos@gmail.com'),
(7, 'Esdras Gomes', 'esdrasgoomes@gmail.com'),
(8, 'Teste Novo', 'testenovo@gmail.com'),
(9, 'Teste Novo', 'testenovo@gmail.com'),
(10, 'Esdras', 'esdras@gmail.com'),
(11, 'Teste 123', 'teste123@hotmail.com'),
(12, 'Esdras Gomes', 'esdrasgoomes@gmail.com'),
(13, 'Esdras Gomes', 'esdrasgoomes@gmail.com'),
(14, 'Teste Novo', 'teste123@hotmail.com'),
(15, 'Teste', 'teste@gmail.com'),
(16, 'Esdras Gomes', 'esdrasgoomes@gmail.com'),
(17, 'Esdras Gomes', 'esdrasgoomes@gmail.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
