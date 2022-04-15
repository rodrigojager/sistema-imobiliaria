-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Abr-2022 às 15:41
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imobiliaria`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

CREATE TABLE `imovel` (
  `idImovel` int(11) NOT NULL,
  `venda` tinyint(1) NOT NULL,
  `valorImovel` decimal(10,0) NOT NULL,
  `bairro` varchar(35) NOT NULL,
  `cidade` varchar(25) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `area` decimal(6,0) NOT NULL,
  `quartos` int(2) NOT NULL,
  `banheiros` int(2) NOT NULL,
  `vagas` int(2) NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`idImovel`, `venda`, `valorImovel`, `bairro`, `cidade`, `estado`, `area`, `quartos`, `banheiros`, `vagas`, `descricao`) VALUES
(1, 1, '180000', 'TOMATE FRITO', 'VERDURA COZIDA', 'ES', '300', 3, 2, 2, '&lt;font face=&quot;Roboto&quot;&gt;&lt;font face=&quot;Roboto&quot;&gt;Insira aqui a descrição do imóvel&lt;/font&gt;&lt;/font&gt;'),
(2, 1, '1750000', 'Jardim Camburi', 'VITÓRIA', 'ES', '250', 2, 2, 1, 'Compra logo essa bosta!'),
(3, 0, '980000', 'Mata da Praia ', 'VITÓRIA', 'ES', '600', 5, 4, 4, 'Vendo linda mansão no melhor bairro de Vitoria'),
(4, 1, '1234567', '8910', 'ABCD', 'EF', '11', 12, 13, 14, '&lt;font face=&quot;Roboto&quot;&gt;&lt;font face=&quot;Roboto&quot;&gt;I15nsira aqui a de&lt;b&gt;scrição do imóvel&lt;/b&gt;&lt;div&gt;&lt;ul&gt;&lt;li&gt;&lt;b&gt;rftg&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;fghjk&lt;/b&gt;&lt;/li&gt;&lt;li&gt;&lt;b&gt;rftgh&lt;/b&gt;&lt;/li&gt;&lt;/ul&gt;&lt;b&gt;rfgh&lt;i&gt;&lt;u&gt;&lt;font color=&quot;#99ff00&quot;&gt;bjk&lt;/font&gt;&lt;/u&gt;&lt;/i&gt;&lt;/b&gt;&lt;/div&gt;&lt;/font&gt;&lt;/font&gt;'),
(5, 0, '1100', 'Enseada do Suá', 'VITÓRIA', 'ES', '10', 1, 2, 3, '&lt;font face=&quot;Roboto&quot;&gt;iMOV&lt;b&gt;EL TESTE&lt;/b&gt;&lt;/font&gt;'),
(6, 1, '180000', 'TOMATE', 'VERDURA', 'AS', '300', 3, 2, 2, '&lt;font face=&quot;Roboto&quot;&gt;Insira aqui a descrição do imóvel&lt;/font&gt;'),
(7, 1, '180000', 'COLINA DE LARANJEIRAS', 'SERRA', 'ES', '300', 3, 2, 2, '&lt;font face=&quot;Roboto&quot;&gt;Insira aqui a descrição do imóvel&lt;/font&gt;');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(35) NOT NULL,
  `senha` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `senha`) VALUES
('teste', '$2y$10$W2d..d9LMN.bcXU5Zi5bNulvMaa0v6EVsGvAJjMtSNJ/jJTOwX7Ti');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`idImovel`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD UNIQUE KEY `usuario` (`usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
