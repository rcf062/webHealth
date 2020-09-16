-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Jun-2019 às 21:52
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webhealth`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `idbairro` int(11) NOT NULL,
  `descricao` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`idbairro`, `descricao`) VALUES
(4, 'Jorge Atalla'),
(5, 'Pedro Ometto'),
(6, 'Santa Helena');

-- --------------------------------------------------------

--
-- Estrutura da tabela `consulta`
--

CREATE TABLE `consulta` (
  `idconsulta` int(11) NOT NULL,
  `pac_idpaciente` int(11) NOT NULL,
  `posto_idposto` int(11) NOT NULL,
  `espec_idespecialidade` int(11) NOT NULL,
  `data` date NOT NULL,
  `horario` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `consulta`
--

INSERT INTO `consulta` (`idconsulta`, `pac_idpaciente`, `posto_idposto`, `espec_idespecialidade`, `data`, `horario`) VALUES
(1, 7, 4, 6, '2019-06-20', '10:00:00'),
(2, 7, 4, 6, '2019-06-20', '09:00:00'),
(3, 7, 4, 7, '2019-06-20', '09:30:00'),
(4, 7, 4, 6, '2019-06-20', '07:00:00'),
(5, 7, 4, 6, '2019-06-19', '07:00:00'),
(6, 7, 4, 6, '2019-06-18', '07:30:00'),
(7, 8, 4, 7, '2019-06-11', '07:00:00'),
(8, 8, 4, 7, '2019-06-11', '07:00:00'),
(9, 8, 4, 7, '2019-06-11', '10:00:00'),
(10, 8, 4, 8, '2019-06-10', '07:00:00'),
(11, 8, 4, 8, '2019-06-10', '07:30:00'),
(12, 8, 4, 8, '2019-06-10', '08:00:00'),
(13, 8, 4, 6, '2019-06-14', '08:00:00'),
(14, 8, 4, 6, '2019-06-14', '08:30:00'),
(15, 8, 4, 9, '2019-06-12', '10:00:00'),
(16, 8, 4, 9, '2019-06-12', '10:00:00'),
(17, 9, 4, 6, '2019-06-14', '10:00:00'),
(18, 9, 4, 6, '2019-06-14', '09:30:00'),
(19, 9, 4, 6, '2019-06-15', '07:00:00'),
(20, 9, 4, 9, '2019-06-19', '08:00:00'),
(21, 9, 4, 9, '2019-06-19', '09:00:00'),
(22, 9, 4, 9, '2019-06-19', '07:30:00'),
(23, 9, 4, 9, '2019-06-18', '08:00:00'),
(24, 9, 4, 9, '2019-06-18', '07:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidade`
--

CREATE TABLE `especialidade` (
  `idespecialidade` int(11) NOT NULL,
  `descricao` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `especialidade`
--

INSERT INTO `especialidade` (`idespecialidade`, `descricao`) VALUES
(5, 'Pediatra'),
(6, 'Cardiologista'),
(7, 'Clínico Geral'),
(8, 'Ginecologista'),
(9, 'Geriatra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `medico`
--

CREATE TABLE `medico` (
  `idmedico` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `telefone` char(10) NOT NULL,
  `celular` char(9) NOT NULL,
  `crm` char(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `status` char(1) DEFAULT NULL,
  `espec_idespecialidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `medico`
--

INSERT INTO `medico` (`idmedico`, `nome`, `telefone`, `celular`, `crm`, `email`, `status`, `espec_idespecialidade`) VALUES
(4, 'Milena', '1434161059', '149815424', '1234569', 'milenamarqs@outlook.com', NULL, 6),
(5, 'Roberto', '1434158596', '149815769', '142536', 'roberto@gmail.com', NULL, 5),
(6, 'Roberta', '1434165240', '981547898', '64544', 'robertageriatra@gmail.com', NULL, 9),
(7, 'Roberta', '1434165240', '981547898', '64544', 'robertageriatra@gmail.com', NULL, 9),
(8, 'Roberta', '1434165240', '981547898', '64544', 'milena@gmail.com', NULL, 8),
(9, 'Roberta', '1434165240', '981547898', '64544', 'milena@gmail.com', 'A', 8),
(10, 'Roberta', '1434165240', '981547898', '64544', 'robertageriatra@gmail.com', 'A', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `paciente`
--

CREATE TABLE `paciente` (
  `idpaciente` int(11) NOT NULL,
  `bairro_idbairro` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `cpf` char(11) NOT NULL,
  `rg` char(10) NOT NULL,
  `telefone` char(10) NOT NULL,
  `celular` char(9) NOT NULL,
  `num_sus` char(15) NOT NULL,
  `datanasc` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `senha` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `paciente`
--

INSERT INTO `paciente` (`idpaciente`, `bairro_idbairro`, `nome`, `endereco`, `cpf`, `rg`, `telefone`, `celular`, `num_sus`, `datanasc`, `email`, `senha`) VALUES
(7, 4, 'Milena', 'xxxxxxx', '123456713', '435678765', '1434161059', '149815424', '142536', '1998-06-26', 'milenamarqs8@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 4, 'Milena M S', 'Rua Sidney Beloni', '45269835715', '142583691', '1434161059', '149815424', '148903025', '1998-06-26', 'milenamarqs8@gmail.com', '202cb962ac59075b964b07152d234b70'),
(9, 4, 'Vinicius', 'Rua Sidney Beloni', '45269835715', '3515151515', '1434161059', '149815424', '151515151', '1999-05-18', 'vinibn18@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `posto`
--

CREATE TABLE `posto` (
  `idposto` int(11) NOT NULL,
  `endereco` varchar(30) NOT NULL,
  `telefone` char(10) NOT NULL,
  `bairro_idbairro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `posto`
--

INSERT INTO `posto` (`idposto`, `endereco`, `telefone`, `bairro_idbairro`) VALUES
(4, 'xxxxx', '1425253636', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`idbairro`);

--
-- Indexes for table `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`idconsulta`),
  ADD KEY `pac_idpaciente` (`pac_idpaciente`),
  ADD KEY `posto_idposto` (`posto_idposto`),
  ADD KEY `espec_idespecialidade` (`espec_idespecialidade`);

--
-- Indexes for table `especialidade`
--
ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`idespecialidade`);

--
-- Indexes for table `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`idmedico`),
  ADD KEY `espec_idespecialidade` (`espec_idespecialidade`);

--
-- Indexes for table `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`idpaciente`),
  ADD KEY `bairro_idbairro` (`bairro_idbairro`);

--
-- Indexes for table `posto`
--
ALTER TABLE `posto`
  ADD PRIMARY KEY (`idposto`),
  ADD KEY `bairro_idbairro` (`bairro_idbairro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bairro`
--
ALTER TABLE `bairro`
  MODIFY `idbairro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `consulta`
--
ALTER TABLE `consulta`
  MODIFY `idconsulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `especialidade`
--
ALTER TABLE `especialidade`
  MODIFY `idespecialidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `medico`
--
ALTER TABLE `medico`
  MODIFY `idmedico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `paciente`
--
ALTER TABLE `paciente`
  MODIFY `idpaciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `posto`
--
ALTER TABLE `posto`
  MODIFY `idposto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`posto_idposto`) REFERENCES `posto` (`idposto`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`pac_idpaciente`) REFERENCES `paciente` (`idpaciente`),
  ADD CONSTRAINT `consulta_ibfk_3` FOREIGN KEY (`espec_idespecialidade`) REFERENCES `especialidade` (`idespecialidade`);

--
-- Limitadores para a tabela `medico`
--
ALTER TABLE `medico`
  ADD CONSTRAINT `medico_ibfk_1` FOREIGN KEY (`espec_idespecialidade`) REFERENCES `especialidade` (`idespecialidade`);

--
-- Limitadores para a tabela `paciente`
--
ALTER TABLE `paciente`
  ADD CONSTRAINT `paciente_ibfk_1` FOREIGN KEY (`bairro_idbairro`) REFERENCES `bairro` (`idbairro`);

--
-- Limitadores para a tabela `posto`
--
ALTER TABLE `posto`
  ADD CONSTRAINT `posto_ibfk_1` FOREIGN KEY (`bairro_idbairro`) REFERENCES `bairro` (`idbairro`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
