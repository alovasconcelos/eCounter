-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 28-Fev-2023 às 17:45
-- Versão do servidor: 5.7.41
-- versão do PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ecounter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `ContadorEvento`
--
CREATE DATABASE ecounter;
USE ecounter;

CREATE TABLE `ContadorEvento` (
  `id` int(11) NOT NULL,
  `hora` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `evento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Evento`
--

CREATE TABLE `Evento` (
  `id` int(11) NOT NULL,
  `descricao` varchar(45) NOT NULL,
  `cor` varchar(666666) NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario`
--

CREATE TABLE `Usuario` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `ContadorEvento`
--
ALTER TABLE `ContadorEvento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ContadorEvento_Evento1_idx` (`evento_id`);

--
-- Índices para tabela `Evento`
--
ALTER TABLE `Evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Evento_Usuario_idx` (`usuario_id`);

--
-- Índices para tabela `Usuario`
--
ALTER TABLE `Usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email_UNIQUE` (`login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `ContadorEvento`
--
ALTER TABLE `ContadorEvento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Evento`
--
ALTER TABLE `Evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `Usuario`
--
ALTER TABLE `Usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ContadorEvento`
--
ALTER TABLE `ContadorEvento`
  ADD CONSTRAINT `fk_ContadorEvento_Evento1` FOREIGN KEY (`evento_id`) REFERENCES `Evento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `Evento`
--
ALTER TABLE `Evento`
  ADD CONSTRAINT `fk_Evento_Usuario` FOREIGN KEY (`usuario_id`) REFERENCES `Usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
