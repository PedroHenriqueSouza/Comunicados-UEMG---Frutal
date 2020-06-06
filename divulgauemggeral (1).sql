-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21-Fev-2020 às 20:40
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `divulgauemggeral`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `caminho_imagem`
--

CREATE TABLE `caminho_imagem` (
  `id` int(11) NOT NULL,
  `caminho` varchar(255) NOT NULL,
  `nome_imagem` varchar(255) NOT NULL,
  `unidade_id` int(11) NOT NULL,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria_banner`
--

CREATE TABLE `categoria_banner` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `unidade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria_banner`
--

INSERT INTO `categoria_banner` (`id`, `categoria`, `position`, `unidade_id`) VALUES
(6, 'Formação Acadêmica - Anfiteatro', 'Horizontal', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `solicitacadsatro`
--

CREATE TABLE `solicitacadsatro` (
  `id` int(11) NOT NULL,
  `unidade_id` int(11) DEFAULT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `cpf` int(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `setor` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `solicitacadsatro`
--

INSERT INTO `solicitacadsatro` (`id`, `unidade_id`, `nome`, `sobrenome`, `cpf`, `email`, `setor`, `descricao`, `tipo`, `status`, `estado`) VALUES
(1, 4, 'Pedro', 'Henrique', 1234567891, 'pedro@gmail.com', 'nupsi', 'aaa', 'estagiario', 1, 1),
(2, 4, 'Gabriel', 'Querioz', 1111111111, 'gabriel23002@gmail.com', 'nupsi', '', 'estagiario', 1, 0),
(3, 4, 'Ivan ', 'Filho', 1234412333, 'ivan@gmail.com', 'Coordenação', '', 'professor', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `unidade`
--

CREATE TABLE `unidade` (
  `id` int(11) NOT NULL,
  `unidades` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `unidade`
--

INSERT INTO `unidade` (`id`, `unidades`) VALUES
(1, 'REITORIA'),
(2, 'UEMG Frutal'),
(3, 'UEMG Ituiutaba'),
(4, 'UEMG Divinopolis'),
(6, 'UEMG Passos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `unidade_id` int(11) NOT NULL,
  `accessLevel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `user`, `pass`, `unidade_id`, `accessLevel`) VALUES
(1, 'admin', 'admin', 1, 1),
(2, 'nupsi', 'nupsi', 1, 1),
(3, 'pedro', 'pedro', 2, 2),
(4, 'gabriel', '23002', 3, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caminho_imagem`
--
ALTER TABLE `caminho_imagem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unidade_id` (`unidade_id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `categoria_banner`
--
ALTER TABLE `categoria_banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unidade_id` (`unidade_id`);

--
-- Indexes for table `solicitacadsatro`
--
ALTER TABLE `solicitacadsatro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unidade_id` (`unidade_id`);

--
-- Indexes for table `unidade`
--
ALTER TABLE `unidade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `unidade_id` (`unidade_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caminho_imagem`
--
ALTER TABLE `caminho_imagem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoria_banner`
--
ALTER TABLE `categoria_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `solicitacadsatro`
--
ALTER TABLE `solicitacadsatro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `unidade`
--
ALTER TABLE `unidade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `caminho_imagem`
--
ALTER TABLE `caminho_imagem`
  ADD CONSTRAINT `caminho_imagem_ibfk_1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`),
  ADD CONSTRAINT `caminho_imagem_ibfk_2` FOREIGN KEY (`categoria_id`) REFERENCES `categoria_banner` (`id`);

--
-- Limitadores para a tabela `categoria_banner`
--
ALTER TABLE `categoria_banner`
  ADD CONSTRAINT `categoria_banner_ibfk_1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`);

--
-- Limitadores para a tabela `solicitacadsatro`
--
ALTER TABLE `solicitacadsatro`
  ADD CONSTRAINT `solicitacadsatro_ibfk_1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`unidade_id`) REFERENCES `unidade` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
