-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Ago-2020 às 02:00
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `easyenglish`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_agenda`
--

CREATE TABLE `tb_agenda` (
  `idagenda` int(11) NOT NULL,
  `fkidusuario` int(11) DEFAULT NULL,
  `professor` varchar(40) DEFAULT NULL,
  `dia` date DEFAULT NULL,
  `horainicio` tinyint(2) DEFAULT NULL,
  `horafim` tinyint(2) DEFAULT NULL,
  `materia` varchar(80) DEFAULT NULL,
  `fala` char(1) DEFAULT NULL,
  `audicao` char(1) DEFAULT NULL,
  `leitura` char(1) DEFAULT NULL,
  `escrita` char(1) DEFAULT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = marcado / 1 = confirmado / 2 = concluído / 3 = cancelado',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_agenda`
--

INSERT INTO `tb_agenda` (`idagenda`, `fkidusuario`, `professor`, `dia`, `horainicio`, `horafim`, `materia`, `fala`, `audicao`, `leitura`, `escrita`, `situacao`, `criado_em`, `atualizado_em`) VALUES
(1, 2, 'Igor Dutra', '2020-06-26', 8, 9, NULL, NULL, NULL, NULL, NULL, 3, '2020-06-25 00:33:12', NULL),
(2, 3, 'Isaque Lima', '2020-07-13', 13, 14, NULL, NULL, NULL, NULL, NULL, 3, '2020-07-10 15:04:49', NULL),
(3, NULL, 'Isaque Lima', '2020-07-30', 6, 7, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(4, NULL, 'Isaque Lima', '2020-07-30', 7, 8, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(5, NULL, 'Isaque Lima', '2020-07-30', 8, 9, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(6, NULL, 'Isaque Lima', '2020-07-30', 9, 10, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(7, NULL, 'Isaque Lima', '2020-07-30', 10, 11, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(8, NULL, 'Isaque Lima', '2020-07-30', 11, 12, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(9, NULL, 'Isaque Lima', '2020-07-30', 12, 13, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(10, NULL, 'Isaque Lima', '2020-07-30', 13, 14, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(11, NULL, 'Isaque Lima', '2020-07-30', 14, 15, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(12, NULL, 'Isaque Lima', '2020-07-30', 15, 16, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(13, NULL, 'Isaque Lima', '2020-07-30', 16, 17, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(14, NULL, 'Isaque Lima', '2020-07-30', 17, 18, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(15, NULL, 'Isaque Lima', '2020-07-30', 18, 19, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(16, NULL, 'Isaque Lima', '2020-07-30', 19, 20, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(17, NULL, 'Isaque Lima', '2020-07-30', 20, 21, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(18, NULL, 'Isaque Lima', '2020-07-30', 21, 22, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(19, NULL, 'Isaque Lima', '2020-07-30', 22, 23, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(20, NULL, 'Isaque Lima', '2020-07-30', 23, 0, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:04', NULL),
(21, NULL, 'Isaque Lima', '2020-07-31', 7, 8, NULL, NULL, NULL, NULL, NULL, 4, '2020-07-15 00:13:51', NULL),
(22, 2, 'Isaque Lima', '2020-07-31', 9, 10, NULL, NULL, NULL, NULL, NULL, 3, '2020-07-15 12:00:01', '2020-07-25 07:18:51'),
(23, 2, 'Isaque Lima', '2020-07-21', 19, 20, NULL, NULL, NULL, NULL, NULL, 3, '2020-07-21 22:00:18', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alunos`
--

CREATE TABLE `tb_alunos` (
  `idaluno` int(11) NOT NULL,
  `fkidusuario` int(11) NOT NULL,
  `cpf` varchar(15) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `nivel` tinyint(1) DEFAULT 1,
  `datanascimento` date DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cidade` varchar(40) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `tipologradouro` varchar(15) DEFAULT NULL,
  `logradouro` varchar(280) DEFAULT NULL,
  `numero` varchar(10) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alunos`
--

INSERT INTO `tb_alunos` (`idaluno`, `fkidusuario`, `cpf`, `celular`, `nivel`, `datanascimento`, `cep`, `uf`, `cidade`, `bairro`, `tipologradouro`, `logradouro`, `numero`, `criado_em`, `atualizado_em`) VALUES
(1, 1, '', '21964092597', 3, '1986-01-16', '22733000', 'RJ', 'Rio de Janeiro', 'Praça Seca', 'Rua', 'Candido Benício', '', '2020-06-24 20:54:21', NULL),
(2, 2, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2020-06-24 20:55:14', NULL),
(3, 3, '', '21979115262', 1, '1983-01-29', '23529286', 'RJ', 'Rio de Janeiro', 'Santa Cruz', 'Rua', 'Rua Tasso Blaso 930, bloco 2 apt 304', '', '2020-07-10 15:02:31', '2020-07-27 11:36:53'),
(4, 5, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2020-08-05 23:42:39', NULL),
(5, 6, '', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2020-08-05 23:42:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_alunos_pacote`
--

CREATE TABLE `tb_alunos_pacote` (
  `idalunopacote` int(11) NOT NULL,
  `fkidusuario` int(11) NOT NULL,
  `creditohoras` tinyint(2) NOT NULL,
  `horasconsumidas` tinyint(2) NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = marcado / 1 = confirmado / 2 = concluído / 3 = cancelado',
  `validade` date NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_alunos_pacote`
--

INSERT INTO `tb_alunos_pacote` (`idalunopacote`, `fkidusuario`, `creditohoras`, `horasconsumidas`, `situacao`, `validade`, `criado_em`, `atualizado_em`) VALUES
(1, 2, 4, 0, 3, '2020-07-25', '2020-06-25 00:32:07', NULL),
(2, 2, 4, 0, 3, '2020-07-25', '2020-06-25 00:32:23', NULL),
(3, 2, 8, 0, 3, '2020-07-25', '2020-06-25 00:40:21', NULL),
(4, 2, 4, 0, 3, '2020-07-26', '2020-06-25 22:25:37', NULL),
(5, 2, 8, 0, 3, '2020-07-27', '2020-06-26 12:18:17', NULL),
(6, 2, 4, 0, 3, '2020-07-27', '2020-06-26 12:19:12', NULL),
(7, 2, 8, 0, 2, '2020-08-15', '2020-07-15 11:53:48', NULL),
(8, 2, 4, 0, 0, '2020-08-15', '2020-07-15 12:00:22', NULL),
(9, 2, 12, 0, 0, '2020-08-25', '2020-07-25 10:35:36', NULL),
(10, 2, 20, 0, 2, '2020-08-27', '2020-07-27 14:14:06', '2020-07-27 21:08:03'),
(11, 2, 4, 0, 2, '2020-08-27', '2020-07-27 14:14:40', '2020-07-27 11:39:19'),
(12, 2, 24, 0, 0, '2020-08-27', '2020-07-27 14:43:04', NULL),
(13, 1, 1, 0, 0, '2020-08-27', '2020-07-27 15:54:49', NULL),
(14, 2, 21, 0, 0, '2020-08-27', '2020-07-27 15:57:57', NULL),
(15, 2, 21, 0, 0, '2020-08-27', '2020-07-27 19:04:29', NULL),
(16, 2, 21, 0, 0, '2020-08-27', '2020-07-27 19:05:53', NULL),
(17, 2, 21, 0, 2, '2020-08-27', '2020-07-27 19:06:23', '2020-07-27 21:09:47'),
(18, 2, 22, 22, 2, '2020-08-27', '2020-07-27 19:09:47', '2020-07-27 21:11:35'),
(19, 2, 23, 23, 2, '2020-08-27', '2020-07-27 19:11:35', '2020-07-27 21:16:27'),
(20, 2, 24, 0, 0, '2020-08-27', '2020-07-27 19:16:27', NULL),
(21, 2, 1, 1, 2, '2020-08-27', '2020-07-27 19:18:17', '2020-07-27 21:18:35'),
(22, 2, 2, 1, 2, '2020-08-27', '2020-07-27 19:18:35', '2020-07-27 21:19:51'),
(23, 2, 3, 3, 2, '2020-08-27', '2020-07-27 19:19:51', '2020-07-27 21:21:30'),
(24, 2, 4, 4, 2, '2020-08-27', '2020-07-27 19:21:30', '2020-07-27 21:23:33'),
(25, 2, 5, 5, 2, '2020-08-27', '2020-07-27 19:23:33', '2020-07-27 21:26:07'),
(26, 2, 6, 0, 1, '2020-08-27', '2020-07-27 19:26:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_horario_professor`
--

CREATE TABLE `tb_horario_professor` (
  `idhorarioprofessor` int(11) NOT NULL,
  `horainicio` tinyint(2) NOT NULL,
  `horafim` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_horario_professor`
--

INSERT INTO `tb_horario_professor` (`idhorarioprofessor`, `horainicio`, `horafim`) VALUES
(1, 6, 7),
(2, 7, 8),
(3, 8, 9),
(4, 9, 10),
(5, 10, 11),
(6, 11, 12),
(7, 12, 13),
(8, 13, 14),
(9, 14, 15),
(10, 15, 16),
(11, 16, 17),
(12, 17, 18),
(13, 18, 19),
(14, 19, 20),
(15, 20, 21),
(16, 21, 22),
(17, 22, 23),
(18, 23, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_notificacoes`
--

CREATE TABLE `tb_notificacoes` (
  `idnotificacao` int(11) NOT NULL,
  `fkidusuario` int(11) NOT NULL,
  `assunto` varchar(30) NOT NULL,
  `mensagem` text NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = não lida / 1 = lida / 2 = cancelada',
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_permissoes`
--

CREATE TABLE `tb_permissoes` (
  `idpermissao` int(11) NOT NULL,
  `nome` varchar(30) CHARACTER SET latin1 NOT NULL,
  `permissoes` text CHARACTER SET latin1 NOT NULL,
  `situacao` tinyint(1) NOT NULL DEFAULT 0,
  `cadatrado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_permissoes`
--

INSERT INTO `tb_permissoes` (`idpermissao`, `nome`, `permissoes`, `situacao`, `cadatrado_em`, `atualizado_em`) VALUES
(1, 'Administrador', 'a:29:{s:7:\"vAgenda\";s:1:\"1\";s:7:\"aAgenda\";s:1:\"1\";s:7:\"eAgenda\";s:1:\"1\";s:7:\"dAgenda\";s:1:\"1\";s:7:\"vAlunos\";s:1:\"1\";s:7:\"aAlunos\";s:1:\"1\";s:7:\"eAlunos\";s:1:\"1\";s:7:\"dAlunos\";s:1:\"1\";s:13:\"vBloqueioAula\";s:1:\"1\";s:13:\"aBloqueioAula\";s:1:\"1\";s:13:\"eBloqueioAula\";s:1:\"1\";s:13:\"dBloqueioAula\";s:1:\"1\";s:8:\"vPacotes\";s:1:\"1\";s:8:\"aPacotes\";s:1:\"1\";s:8:\"ePacotes\";s:1:\"1\";s:8:\"dPacotes\";s:1:\"1\";s:13:\"vNotificacoes\";s:1:\"1\";s:13:\"aNotificacoes\";s:1:\"1\";s:13:\"eNotificacoes\";s:1:\"1\";s:13:\"dNotificacoes\";s:1:\"1\";s:11:\"vRelatorios\";s:1:\"1\";s:15:\"vConfigUsuarios\";s:1:\"1\";s:15:\"aConfigUsuarios\";s:1:\"1\";s:15:\"eConfigUsuarios\";s:1:\"1\";s:15:\"dConfigUsuarios\";s:1:\"1\";s:17:\"vConfigPermissoes\";s:1:\"1\";s:17:\"aConfigPermissoes\";s:1:\"1\";s:17:\"eConfigPermissoes\";s:1:\"1\";s:17:\"dConfigPermissoes\";s:1:\"1\";}', 1, '2020-05-05 01:42:53', NULL),
(2, 'Professores', 'a:29:{s:7:\"vAgenda\";s:1:\"1\";s:7:\"aAgenda\";s:1:\"1\";s:7:\"eAgenda\";s:1:\"1\";s:7:\"dAgenda\";s:1:\"1\";s:7:\"vAlunos\";s:1:\"1\";s:7:\"aAlunos\";s:1:\"1\";s:7:\"eAlunos\";s:1:\"1\";s:7:\"dAlunos\";s:1:\"1\";s:13:\"vBloqueioAula\";s:1:\"1\";s:13:\"aBloqueioAula\";s:1:\"1\";s:13:\"eBloqueioAula\";s:1:\"1\";s:13:\"dBloqueioAula\";s:1:\"1\";s:8:\"vPacotes\";s:1:\"1\";s:8:\"aPacotes\";s:1:\"1\";s:8:\"ePacotes\";s:1:\"1\";s:8:\"dPacotes\";s:1:\"1\";s:13:\"vNotificacoes\";s:1:\"1\";s:13:\"aNotificacoes\";s:1:\"1\";s:13:\"eNotificacoes\";s:1:\"1\";s:13:\"dNotificacoes\";s:1:\"1\";s:11:\"vRelatorios\";s:1:\"1\";s:15:\"vConfigUsuarios\";s:1:\"1\";s:15:\"aConfigUsuarios\";s:1:\"1\";s:15:\"eConfigUsuarios\";s:1:\"1\";s:15:\"dConfigUsuarios\";s:1:\"1\";s:17:\"vConfigPermissoes\";s:1:\"1\";s:17:\"aConfigPermissoes\";s:1:\"1\";s:17:\"eConfigPermissoes\";s:1:\"1\";s:17:\"dConfigPermissoes\";s:1:\"1\";}', 1, '2020-05-05 01:42:53', NULL),
(3, 'Alunos', '', 1, '2020-05-05 01:42:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sessoes`
--

CREATE TABLE `tb_sessoes` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_sessoes`
--

INSERT INTO `tb_sessoes` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('59pkaek3u4ifipbpr7e0l3camjtcbbkm', '::1', 1595876771, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353837363737313b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('2496g5ng57101ruv085bpnsg90nnsn86', '::1', 1595877084, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353837373038343b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('5uif122ruoccq3kb1gh9q819i4h1hsvc', '::1', 1595877387, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353837373338373b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('a41k2e290c228gt36j7r7l5lc9fc3jaf', '::1', 1595877690, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353837373639303b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('7lf8v4qj98cbrb43p8h6hdk98p6q2ir8', '127.0.0.1', 1595879618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353837393631383b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('q9fegrsf8gjt82va9oriefplgr9g83go', '127.0.0.1', 1595880303, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353838303330333b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('p3h5f32k78mlnpu7sjp57sbdv3q455qp', '127.0.0.1', 1595880815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353838303831353b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('702u6jq0v66mvjl43r4jotpb5ga8uo40', '127.0.0.1', 1595880944, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539353838303934343b),
('7u84e55ajpork3k0rbnhv8gup6ogdlce', '::1', 1596330065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539363333303036353b),
('hip1esi1sm8ursg5tas12bjf9giufgn4', '::1', 1596331781, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539363333313738313b64616e6765727c733a32353a22557375c3a172696f2f53656e686120696e636f727265746f21223b5f5f63695f766172737c613a313a7b733a363a2264616e676572223b733a333a226f6c64223b7d),
('0tpd81sbavpscrgqojh3ltgo1ond3hvk', '::1', 1596332180, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539363333323138303b69647573756172696f7c733a313a2231223b7065726d697373616f7c733a313a2231223b6e6f6d657c733a31333a2241646d696e6973747261646f72223b656d61696c7c733a31373a226772617765623140676d61696c2e636f6d223b6d756461725f73656e68617c733a313a2230223b6c6f6761646f7c623a313b),
('jbols9s0gr5boumd6ulv0r62revkhbtu', '::1', 1596332200, 0x5f5f63695f6c6173745f726567656e65726174657c693a313539363333323230303b);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `idusuario` int(11) NOT NULL,
  `fkidpermissao` int(11) NOT NULL DEFAULT 3,
  `nome` varchar(40) NOT NULL,
  `usuario` varchar(80) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL DEFAULT '40bd001563085fc35165329ea1ff5c5ecbdbbeef',
  `tipo` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1 = admin / 2 = professor / 3 = aluno',
  `situacao` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 - inativo / 1 = ativo',
  `mudar_senha` tinyint(1) NOT NULL DEFAULT 1,
  `ultimo_acesso` datetime DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`idusuario`, `fkidpermissao`, `nome`, `usuario`, `email`, `senha`, `tipo`, `situacao`, `mudar_senha`, `ultimo_acesso`, `criado_em`, `atualizado_em`) VALUES
(1, 1, 'Administrador', 'admin', 'graweb1@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 0, '2020-08-06 01:37:04', '2020-06-24 20:52:42', NULL),
(2, 3, 'Gustavo Grativol', NULL, 'gustavo_grativol@hotmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1, 0, '2020-07-21 18:59:51', '2020-06-24 20:55:14', NULL),
(3, 1, 'Isaque Gomes Lima', 'Isaque', 'isaquegomes@yahoo.com.br', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 0, '2020-07-10 12:03:19', '2020-07-10 15:02:31', '2020-07-14 21:15:37'),
(4, 2, 'Professor', 'Professor', 'progessor@professor.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 2, 1, 0, NULL, '2020-07-27 19:54:29', NULL),
(5, 3, 'Usuario', NULL, 'usuario@usuario.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1, 1, NULL, '2020-08-05 23:42:39', NULL),
(6, 3, 'Usuario', NULL, 'usuario@usuario.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, 1, 1, NULL, '2020-08-05 23:42:48', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuarios_autenticados`
--

CREATE TABLE `tb_usuarios_autenticados` (
  `id_usuario_autenticado` int(11) NOT NULL,
  `fkidusuario` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expira_em` datetime NOT NULL,
  `criado_em` datetime NOT NULL DEFAULT current_timestamp(),
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuarios_autenticados`
--

INSERT INTO `tb_usuarios_autenticados` (`id_usuario_autenticado`, `fkidusuario`, `token`, `expira_em`, `criado_em`, `atualizado_em`) VALUES
(10, 1, '975391d4463c2e61cfdcadc590b0fe39904cb0790743d0e1924052f5ea5e10f58ada553425af9d5122f59b8e6af77232a7ebf1727f586c63f570aeee3abb530b', '2020-08-06 13:37:04', '2020-08-05 20:37:04', NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_agenda`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_agenda` (
`idagenda` int(11)
,`fkidusuario` int(11)
,`nome_aluno` varchar(40)
,`professor` varchar(40)
,`dia` varchar(10)
,`horainicio` tinyint(2)
,`horafim` tinyint(2)
,`materia` varchar(80)
,`fala` char(1)
,`audicao` char(1)
,`leitura` char(1)
,`escrita` char(1)
,`situacao` tinyint(1)
,`criado_em` timestamp
,`atualizado_em` datetime
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_alunos`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_alunos` (
`idaluno` int(11)
,`fkidusuario` int(11)
,`cpf` varchar(15)
,`nome_aluno` varchar(40)
,`usuario_aluno` varchar(80)
,`email_aluno` varchar(50)
,`senha_aluno` varchar(100)
,`celular` varchar(15)
,`nivel` tinyint(1)
,`datanascimento` varchar(10)
,`cep` varchar(10)
,`uf` char(2)
,`cidade` varchar(40)
,`bairro` varchar(50)
,`tipologradouro` varchar(15)
,`logradouro` varchar(280)
,`numero` varchar(10)
,`criado_em` timestamp
,`atualizado_em` datetime
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_alunos_pacote`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_alunos_pacote` (
`idalunopacote` int(11)
,`fkidusuario` int(11)
,`nome_aluno_pacote` varchar(40)
,`email_aluno_pacote` varchar(50)
,`creditohoras` tinyint(2)
,`horasconsumidas` tinyint(2)
,`situacao` tinyint(1)
,`validade` varchar(10)
,`criado_em` timestamp
,`atualizado_em` datetime
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_bloqueio_aulas`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_bloqueio_aulas` (
`idagenda` int(11)
,`fkidusuario` int(11)
,`professor` varchar(40)
,`dia` varchar(10)
,`horainicio` tinyint(2)
,`horafim` tinyint(2)
,`materia` varchar(80)
,`fala` char(1)
,`audicao` char(1)
,`leitura` char(1)
,`escrita` char(1)
,`situacao` tinyint(1)
,`criado_em` timestamp
,`atualizado_em` datetime
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_notificacoes`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_notificacoes` (
`idnotificacao` int(11)
,`fkidusuario` int(11)
,`nome_aluno_notificacao` varchar(40)
,`assunto` varchar(30)
,`mensagem` text
,`situacao` tinyint(1)
,`criado_em` timestamp
,`atualizado_em` datetime
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_usuarios`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_usuarios` (
`idusuario` int(11)
,`nome` varchar(40)
,`email` varchar(50)
,`senha` varchar(100)
,`tipo` tinyint(1)
,`situacao` tinyint(1)
,`fkidusuario` int(11)
,`celular` varchar(15)
,`nivel` tinyint(1)
,`datanascimento` date
,`cep` varchar(10)
,`uf` char(2)
,`cidade` varchar(40)
,`bairro` varchar(50)
,`tipologradouro` varchar(15)
,`logradouro` varchar(280)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `vw_usuarios_autenticados`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `vw_usuarios_autenticados` (
`idusuario` int(11)
,`nome` varchar(40)
,`usuario` varchar(80)
,`email` varchar(50)
,`senha` varchar(100)
,`token` varchar(255)
);

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_agenda`
--
DROP TABLE IF EXISTS `vw_agenda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_agenda`  AS  select `tb_agenda`.`idagenda` AS `idagenda`,`tb_agenda`.`fkidusuario` AS `fkidusuario`,`tb_usuarios`.`nome` AS `nome_aluno`,`tb_agenda`.`professor` AS `professor`,date_format(`tb_agenda`.`dia`,'%d/%m/%Y') AS `dia`,`tb_agenda`.`horainicio` AS `horainicio`,`tb_agenda`.`horafim` AS `horafim`,`tb_agenda`.`materia` AS `materia`,`tb_agenda`.`fala` AS `fala`,`tb_agenda`.`audicao` AS `audicao`,`tb_agenda`.`leitura` AS `leitura`,`tb_agenda`.`escrita` AS `escrita`,`tb_agenda`.`situacao` AS `situacao`,`tb_agenda`.`criado_em` AS `criado_em`,`tb_agenda`.`atualizado_em` AS `atualizado_em` from (`tb_agenda` left join `tb_usuarios` on(`tb_agenda`.`fkidusuario` = `tb_usuarios`.`idusuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_alunos`
--
DROP TABLE IF EXISTS `vw_alunos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_alunos`  AS  select `tb_alunos`.`idaluno` AS `idaluno`,`tb_alunos`.`fkidusuario` AS `fkidusuario`,`tb_alunos`.`cpf` AS `cpf`,`tb_usuarios`.`nome` AS `nome_aluno`,`tb_usuarios`.`usuario` AS `usuario_aluno`,`tb_usuarios`.`email` AS `email_aluno`,`tb_usuarios`.`senha` AS `senha_aluno`,`tb_alunos`.`celular` AS `celular`,`tb_alunos`.`nivel` AS `nivel`,date_format(`tb_alunos`.`datanascimento`,'%d/%m/%Y') AS `datanascimento`,`tb_alunos`.`cep` AS `cep`,`tb_alunos`.`uf` AS `uf`,`tb_alunos`.`cidade` AS `cidade`,`tb_alunos`.`bairro` AS `bairro`,`tb_alunos`.`tipologradouro` AS `tipologradouro`,`tb_alunos`.`logradouro` AS `logradouro`,`tb_alunos`.`numero` AS `numero`,`tb_alunos`.`criado_em` AS `criado_em`,`tb_alunos`.`atualizado_em` AS `atualizado_em` from (`tb_alunos` left join `tb_usuarios` on(`tb_alunos`.`fkidusuario` = `tb_usuarios`.`idusuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_alunos_pacote`
--
DROP TABLE IF EXISTS `vw_alunos_pacote`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_alunos_pacote`  AS  select `tb_alunos_pacote`.`idalunopacote` AS `idalunopacote`,`tb_alunos_pacote`.`fkidusuario` AS `fkidusuario`,`tb_usuarios`.`nome` AS `nome_aluno_pacote`,`tb_usuarios`.`email` AS `email_aluno_pacote`,`tb_alunos_pacote`.`creditohoras` AS `creditohoras`,`tb_alunos_pacote`.`horasconsumidas` AS `horasconsumidas`,`tb_alunos_pacote`.`situacao` AS `situacao`,date_format(`tb_alunos_pacote`.`validade`,'%d/%m/%Y') AS `validade`,`tb_alunos_pacote`.`criado_em` AS `criado_em`,`tb_alunos_pacote`.`atualizado_em` AS `atualizado_em` from (`tb_alunos_pacote` left join `tb_usuarios` on(`tb_alunos_pacote`.`fkidusuario` = `tb_usuarios`.`idusuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_bloqueio_aulas`
--
DROP TABLE IF EXISTS `vw_bloqueio_aulas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_bloqueio_aulas`  AS  select `tb_agenda`.`idagenda` AS `idagenda`,`tb_agenda`.`fkidusuario` AS `fkidusuario`,`tb_agenda`.`professor` AS `professor`,date_format(`tb_agenda`.`dia`,'%d/%m/%Y') AS `dia`,`tb_agenda`.`horainicio` AS `horainicio`,`tb_agenda`.`horafim` AS `horafim`,`tb_agenda`.`materia` AS `materia`,`tb_agenda`.`fala` AS `fala`,`tb_agenda`.`audicao` AS `audicao`,`tb_agenda`.`leitura` AS `leitura`,`tb_agenda`.`escrita` AS `escrita`,`tb_agenda`.`situacao` AS `situacao`,`tb_agenda`.`criado_em` AS `criado_em`,`tb_agenda`.`atualizado_em` AS `atualizado_em` from `tb_agenda` where `tb_agenda`.`situacao` = 4 ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_notificacoes`
--
DROP TABLE IF EXISTS `vw_notificacoes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_notificacoes`  AS  select `tb_notificacoes`.`idnotificacao` AS `idnotificacao`,`tb_notificacoes`.`fkidusuario` AS `fkidusuario`,`tb_usuarios`.`nome` AS `nome_aluno_notificacao`,`tb_notificacoes`.`assunto` AS `assunto`,`tb_notificacoes`.`mensagem` AS `mensagem`,`tb_notificacoes`.`situacao` AS `situacao`,`tb_notificacoes`.`criado_em` AS `criado_em`,`tb_notificacoes`.`atualizado_em` AS `atualizado_em` from (`tb_notificacoes` left join `tb_usuarios` on(`tb_notificacoes`.`fkidusuario` = `tb_usuarios`.`idusuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_usuarios`
--
DROP TABLE IF EXISTS `vw_usuarios`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios`  AS  select `tb_usuarios`.`idusuario` AS `idusuario`,`tb_usuarios`.`nome` AS `nome`,`tb_usuarios`.`email` AS `email`,`tb_usuarios`.`senha` AS `senha`,`tb_usuarios`.`tipo` AS `tipo`,`tb_usuarios`.`situacao` AS `situacao`,`tb_alunos`.`fkidusuario` AS `fkidusuario`,`tb_alunos`.`celular` AS `celular`,`tb_alunos`.`nivel` AS `nivel`,`tb_alunos`.`datanascimento` AS `datanascimento`,`tb_alunos`.`cep` AS `cep`,`tb_alunos`.`uf` AS `uf`,`tb_alunos`.`cidade` AS `cidade`,`tb_alunos`.`bairro` AS `bairro`,`tb_alunos`.`tipologradouro` AS `tipologradouro`,`tb_alunos`.`logradouro` AS `logradouro` from (`tb_usuarios` left join `tb_alunos` on(`tb_usuarios`.`idusuario` = `tb_alunos`.`fkidusuario`)) ;

-- --------------------------------------------------------

--
-- Estrutura para vista `vw_usuarios_autenticados`
--
DROP TABLE IF EXISTS `vw_usuarios_autenticados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_usuarios_autenticados`  AS  select `tb_usuarios`.`idusuario` AS `idusuario`,`tb_usuarios`.`nome` AS `nome`,`tb_usuarios`.`usuario` AS `usuario`,`tb_usuarios`.`email` AS `email`,`tb_usuarios`.`senha` AS `senha`,`tb_usuarios_autenticados`.`token` AS `token` from (`tb_usuarios` left join `tb_usuarios_autenticados` on(`tb_usuarios`.`idusuario` = `tb_usuarios_autenticados`.`fkidusuario`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD PRIMARY KEY (`idagenda`),
  ADD KEY `fk_id_usuario_agenda_idx` (`fkidusuario`);

--
-- Índices para tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD PRIMARY KEY (`idaluno`),
  ADD KEY `fk_id_usuario_aluno_idx` (`fkidusuario`);

--
-- Índices para tabela `tb_alunos_pacote`
--
ALTER TABLE `tb_alunos_pacote`
  ADD PRIMARY KEY (`idalunopacote`),
  ADD KEY `fk_id_usuario_controle_idx` (`fkidusuario`);

--
-- Índices para tabela `tb_horario_professor`
--
ALTER TABLE `tb_horario_professor`
  ADD PRIMARY KEY (`idhorarioprofessor`);

--
-- Índices para tabela `tb_notificacoes`
--
ALTER TABLE `tb_notificacoes`
  ADD PRIMARY KEY (`idnotificacao`),
  ADD KEY `fk_id_usuario_not_idx` (`fkidusuario`);

--
-- Índices para tabela `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  ADD PRIMARY KEY (`idpermissao`);

--
-- Índices para tabela `tb_sessoes`
--
ALTER TABLE `tb_sessoes`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Índices para tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `fk_id_permissao_idx` (`fkidpermissao`);

--
-- Índices para tabela `tb_usuarios_autenticados`
--
ALTER TABLE `tb_usuarios_autenticados`
  ADD PRIMARY KEY (`id_usuario_autenticado`),
  ADD UNIQUE KEY `token_UNIQUE` (`token`),
  ADD KEY `fk_id_usuario_idx` (`fkidusuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_agenda`
--
ALTER TABLE `tb_agenda`
  MODIFY `idagenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  MODIFY `idaluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_alunos_pacote`
--
ALTER TABLE `tb_alunos_pacote`
  MODIFY `idalunopacote` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `tb_horario_professor`
--
ALTER TABLE `tb_horario_professor`
  MODIFY `idhorarioprofessor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_notificacoes`
--
ALTER TABLE `tb_notificacoes`
  MODIFY `idnotificacao` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_permissoes`
--
ALTER TABLE `tb_permissoes`
  MODIFY `idpermissao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_usuarios_autenticados`
--
ALTER TABLE `tb_usuarios_autenticados`
  MODIFY `id_usuario_autenticado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_agenda`
--
ALTER TABLE `tb_agenda`
  ADD CONSTRAINT `fk_id_usuario_agenda` FOREIGN KEY (`fkidusuario`) REFERENCES `tb_usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_alunos`
--
ALTER TABLE `tb_alunos`
  ADD CONSTRAINT `fk_id_usuario_aluno` FOREIGN KEY (`fkidusuario`) REFERENCES `tb_usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_alunos_pacote`
--
ALTER TABLE `tb_alunos_pacote`
  ADD CONSTRAINT `fk_id_usuario_controle` FOREIGN KEY (`fkidusuario`) REFERENCES `tb_usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_notificacoes`
--
ALTER TABLE `tb_notificacoes`
  ADD CONSTRAINT `fk_id_usuario_not` FOREIGN KEY (`fkidusuario`) REFERENCES `tb_usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `fk_id_permissao` FOREIGN KEY (`fkidpermissao`) REFERENCES `tb_permissoes` (`idpermissao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuarios_autenticados`
--
ALTER TABLE `tb_usuarios_autenticados`
  ADD CONSTRAINT `fk_id_usuario` FOREIGN KEY (`fkidusuario`) REFERENCES `tb_usuarios` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
