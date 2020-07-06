-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 22-Jun-2020 às 18:06
-- Versão do servidor: 5.7.23
-- versão do PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetologistica`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `cnpj` varchar(13) NOT NULL,
  `razao_social` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(11) NOT NULL,
  `endereco` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`cnpj`, `razao_social`, `email`, `telefone`, `endereco`) VALUES
('1754892665888', 'Vivo', 'vivo@gmail.com', '21996865472', '2'),
('1546894875123', 'TIM', 'matheusmbc13@gmail.com', '2433623289', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `id_Funcionario` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id_Funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`nome`, `cpf`, `id_Funcionario`, `endereco`, `email`, `telefone`) VALUES
('Roberto', '15424516859', 1, 'Rua 1', 'roberto@gmail.com', '21996845721');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

DROP TABLE IF EXISTS `gerente`;
CREATE TABLE IF NOT EXISTS `gerente` (
  `nome` varchar(255) NOT NULL,
  `cpf` varchar(255) NOT NULL,
  `endereco` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  PRIMARY KEY (`cpf`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_usuario`
--

DROP TABLE IF EXISTS `login_usuario`;
CREATE TABLE IF NOT EXISTS `login_usuario` (
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `nome_comp` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `login_usuario`
--

INSERT INTO `login_usuario` (`usuario`, `senha`, `nome_comp`, `tipo`) VALUES
('matheus.siqueira', 'b7a0e33bb8c65c66d12273a13e3cb774', 'Matheus Silva Santos de Siqueira', 'Gerente'),
('allan.sabino', '81dc9bdb52d04dc20036dbd8313ed055', 'Allan Santos Sabino', 'Gerente'),
('jonathan.ferreira', '827ccb0eea8a706c4c34a16891f84e7b', 'Jonathan ferreira Monteiro', 'Funcionario'),
('Fernando.Neves', '01cfcd4f6b8770febfb40cb906715822', 'Fernando Neves da Silva', 'Funcionario'),
('erick.oliveira', '674f3c2c1a8a6f90461e8a66fb5550ba', 'Erick da silva de oliveira', 'Gerente'),
('thomas.verdam', '68053af2923e00204c3ca7c6a3150cf7', 'Thomas de Oliveira Verdam', 'Funcionario'),
('jadson.carmo', '148684480cc5f7ee1318d8cfdd93285e', 'Jadson do Carmo Moreira', 'Funcionario'),
('Claudio.Gimenez', 'bec66a50c11bba876a4afc895c28f003', 'Claudio Gimenez', 'Gerente'),
('Luciana.Santos', '81dc9bdb52d04dc20036dbd8313ed055', 'Luciana Silva Santos de Siqueira', 'Funcionario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `num_nota` varchar(20) NOT NULL,
  `status_ped` varchar(255) NOT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_Funcionario` int(11) DEFAULT NULL,
  `localidade` varchar(255) NOT NULL,
  `endereco_coleta` varchar(255) NOT NULL,
  `endereco_entrega` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_cliente` (`id_cliente`),
  KEY `id_Funcionario` (`id_Funcionario`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
