-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Out-2023 às 04:43
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_toytable`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `ID_ALUNO` int(11) NOT NULL,
  `COD_TURMA` int(11) DEFAULT NULL,
  `NOME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`ID_ALUNO`, `COD_TURMA`, `NOME`) VALUES
(1, 10, 'altomani'),
(2, 8, 'lorena'),
(3, 10, 'Luisa Helena Silva'),
(4, 1, 'jennifer'),
(5, 1, 'pedro'),
(6, 1, 'jose'),
(7, 1, 'andre'),
(8, 1, 'tiso'),
(9, 1, 'enzo'),
(10, 10, 'thiago'),
(11, 10, 'zé'),
(12, 10, 'ray'),
(13, 10, 'pedrão'),
(14, 1, 'Carlos Martins da Silva'),
(15, 1, 'Elaine dos Santos Silva'),
(22, 1, 'Luisa Helena Silva'),
(23, 2, 'Luisa'),
(24, 8, 'Luisa'),
(25, 10, 'Luisa'),
(26, 11, 'Luisa'),
(29, 1, 'helena'),
(30, 1, 'cordeiro'),
(31, 1, 'ferreira'),
(32, 1, 'pereira'),
(33, 1, 'muniz'),
(34, 1, 'maria'),
(35, 1, 'clara'),
(36, 1, 'pedroso'),
(37, 1, 'lucas'),
(38, 1, 'silva'),
(39, 1, 'santos'),
(40, 1, 'souza'),
(41, 1, 'Raphael Tolfo Lima'),
(42, 1, 'victor'),
(43, 1, 'castro'),
(44, 1, 'leonardo'),
(45, 8, 'Luisa Helena Silva'),
(46, 13, 'jacare'),
(47, 10, 'joao'),
(48, 10, 'lucas'),
(49, 1, 'luli');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno_jogo`
--

CREATE TABLE `tb_aluno_jogo` (
  `COD_ALUNO` int(11) DEFAULT NULL,
  `COD_JOGO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_fase`
--

CREATE TABLE `tb_fase` (
  `ID_FASE` int(11) NOT NULL,
  `COD_JOGO` int(11) DEFAULT NULL,
  `TEMPO` time DEFAULT NULL,
  `QTD_TENTATIVAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_fase`
--

INSERT INTO `tb_fase` (`ID_FASE`, `COD_JOGO`, `TEMPO`, `QTD_TENTATIVAS`) VALUES
(1, 1, '00:00:20', 15);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_jogo`
--

CREATE TABLE `tb_jogo` (
  `ID_JOGO` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_jogo`
--

INSERT INTO `tb_jogo` (`ID_JOGO`, `NOME`) VALUES
(1, 'gato');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE `tb_professor` (
  `ID_PROFESSOR` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `CPF` char(11) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `TELEFONE` varchar(12) NOT NULL,
  `SENHA` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`ID_PROFESSOR`, `NOME`, `CPF`, `EMAIL`, `TELEFONE`, `SENHA`, `status`) VALUES
(1, 'camila', '52389125875', 'camila@gmail.com', '555555555555', 'camilove', 0),
(2, 'lorena', '1233333', 'lorena@gmail.com', '12336544', '645987978', 1),
(3, 'Luisa', '523.891.258', 'helluisachub@gmail.com', '17981496584', 'luisa123', 1),
(4, 'carlos', '13213213213', 'carlos@gmail.com', '17991112373', 'carlos123', 1),
(5, 'mor', '13213131313', 'mor@gmail.com', '12132132132', 'mor123', 1),
(6, 'elaine', '9889', 'elaine@gmail.com', '00000', 'elaine123', 1),
(7, 'loli', '12132132', 'loli@gmail.com', '12131', 'loli123', 1),
(8, 'gab', '1111', 'gab@gmail.com', '111111', 'gabriell', 1),
(9, 'teste', '888', 'teste@gmail.com', '222222', 'teste123', 1),
(10, 'teste01', '555555', 'teste01@gmail.com', '33333', 'teste01123', 1),
(11, 'Luisa', '11111111', 'helluisachub@gmail.com', '17981496584', 'cami', 1),
(12, 'Luisa', '11111111', 'helluisachub@gmail.com', '17981496584', 'cami', 1),
(13, 'Luisa Helena Silva', '523.891.258', 'Luisa.silva46@etec.sp.gov.br', '17981496584', 'cami', 1),
(14, 'Luisa Helena Silva', '523.891.258', 'lllll@gmail.com', '17981496584', '1414', 1),
(15, 'Luisa Helena Silva', '523.891.258', 'asasda2@gamil', '17981496584', '111', 1),
(24, 'izabel', '654987987', 'izabel@gmail.com', '3131313131', 'caso', 1),
(25, 'waldomiro', '65656565', 'wal@gmail.com', '1321321', 'waldinho', 1),
(26, 'laura', '878979845', 'laura@gmail.com', '41526363', 'laura123', 1),
(27, 'jardel', '741885269', 'jardel@gmail.com', '454651', '$2y$10$zl26EVaPQ2/S9I5.3U38KuWw8vYjwzVl4BDr897gZbV', 1),
(28, 'jojo', '7913136', 'jojo@gmail.com', '7893635', '$2y$10$ybQTDMaj3HIWUH7pWTjaEuXhEh0LIrrAM3OdVsl0FcX', 1),
(29, 'luli', '8795465', 'luli@gmail.com', '589444646', '$2y$10$jx1xoCIXxlQb9DdkBRz1iOljAGoZAM9jFerhSVbfPRp', 1),
(30, 'mordaminhavida', '8090909', 'mordaminhavida@gmail.com', '80912809', 'mormor123', 1),
(31, 'Luisa Helena Silva', '523.891.258', 'Luisa.silva406@etec.sp.gov.br', '179814965084', 'luisaaa', 1),
(32, 'Luisa Helena Silva', '523.891.258', 'Luisa.silva1212146@etec.sp.gov.br', '17981496114', 'luisa', 1),
(33, 'gustavo', '523.891.258', 'gusavo@gmail.com', '1796589685', 'gugu', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorio`
--

CREATE TABLE `tb_relatorio` (
  `ID_RELATORIO` int(11) NOT NULL,
  `COD_PROFESSOR` int(11) DEFAULT NULL,
  `COD_FASE` int(11) DEFAULT NULL,
  `DESCRICAO` varchar(300) NOT NULL,
  `DATA` date NOT NULL,
  `COD_ALUNO` int(11) DEFAULT NULL,
  `TITULO` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_relatorio`
--

INSERT INTO `tb_relatorio` (`ID_RELATORIO`, `COD_PROFESSOR`, `COD_FASE`, `DESCRICAO`, `DATA`, `COD_ALUNO`, `TITULO`) VALUES
(17, 1, 1, 'adsadasdasdasdas', '2023-12-23', 1, NULL),
(18, 1, 1, 'fkjkdjshgkjfdhgkjfdhkjghkjdhgkjhfdkjghkjdhgkjhgd', '2023-12-23', 2, NULL),
(19, 1, 1, 'tmty uyirtiuruyyyutiyuiyui', '2023-10-10', 4, 'ONE LAST TIME'),
(20, 1, 1, 'ooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '2023-10-10', 4, 'ONE LAST TIME');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_token`
--

CREATE TABLE `tb_token` (
  `id_token` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(6) NOT NULL,
  `expiration_time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_token`
--

INSERT INTO `tb_token` (`id_token`, `user_id`, `token`, `expiration_time`) VALUES
(1, 3, '3cb67e', '2023-09-02 04:19:24'),
(2, 3, '20654a', '2023-09-02 04:19:48'),
(4, 3, 'f0b3bd', '2023-09-02 04:25:54'),
(5, 3, '86a51d', '2023-09-02 04:25:59'),
(6, 3, '2b07bd', '2023-09-01 23:37:43'),
(7, 1, 'f4041d', '2023-09-02 02:26:08'),
(8, 1, '25aeef', '2023-09-02 02:28:37'),
(9, 3, '142f79', '2023-09-07 14:50:13'),
(10, 3, '9da83e', '2023-09-07 14:52:17'),
(11, 3, '813466', '2023-09-07 15:03:09'),
(12, 3, '9f30bc', '2023-09-07 15:04:49'),
(15, 3, 'bb98ae', '2023-09-07 15:12:24'),
(20, 3, '86fba1', '2023-09-07 15:56:57'),
(25, 3, '04c7f0', '2023-09-12 21:25:54'),
(26, 3, 'e91d3b', '2023-09-12 21:29:32'),
(27, 3, '5c3715', '2023-09-12 21:38:28'),
(28, 3, '7e17b4', '2023-09-12 21:39:17'),
(29, 3, 'd40b00', '2023-09-12 21:49:38'),
(30, 3, 'd9252e', '2023-09-12 21:49:42'),
(31, 3, 'd701be', '2023-09-12 21:54:56'),
(33, 3, '6d17a1', '2023-09-30 16:03:25'),
(34, 3, 'bb9b0c', '2023-09-30 16:03:29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_turma`
--

CREATE TABLE `tb_turma` (
  `ID_TURMA` int(11) NOT NULL,
  `COD_PROFESSOR` int(11) NOT NULL,
  `QTD_ALUNO` int(11) NOT NULL,
  `FAIXA_ETARIA` varchar(10) NOT NULL,
  `NOME` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_turma`
--

INSERT INTO `tb_turma` (`ID_TURMA`, `COD_PROFESSOR`, `QTD_ALUNO`, `FAIXA_ETARIA`, `NOME`) VALUES
(1, 1, 25, '4-5 anos', '2-A'),
(2, 4, 45, 'b', '2-b'),
(8, 1, 35, '6 anos', '3 a'),
(10, 1, 19, '4-5 anos', '4 c'),
(11, 3, 40, 'a', '3 f'),
(13, 32, 20, 'selected', '5b'),
(14, 1, 20, '6 anos', '9-e'),
(15, 1, 35, '6 anos', '8-r');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`ID_ALUNO`),
  ADD KEY `COD_TURMA` (`COD_TURMA`);

--
-- Índices para tabela `tb_aluno_jogo`
--
ALTER TABLE `tb_aluno_jogo`
  ADD KEY `COD_ALUNO` (`COD_ALUNO`),
  ADD KEY `COD_JOGO` (`COD_JOGO`);

--
-- Índices para tabela `tb_fase`
--
ALTER TABLE `tb_fase`
  ADD PRIMARY KEY (`ID_FASE`),
  ADD KEY `COD_JOGO` (`COD_JOGO`);

--
-- Índices para tabela `tb_jogo`
--
ALTER TABLE `tb_jogo`
  ADD PRIMARY KEY (`ID_JOGO`);

--
-- Índices para tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`ID_PROFESSOR`);

--
-- Índices para tabela `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  ADD PRIMARY KEY (`ID_RELATORIO`),
  ADD KEY `COD_PROFESSOR` (`COD_PROFESSOR`),
  ADD KEY `COD_FASE` (`COD_FASE`),
  ADD KEY `COD_ALUNO` (`COD_ALUNO`);

--
-- Índices para tabela `tb_token`
--
ALTER TABLE `tb_token`
  ADD PRIMARY KEY (`id_token`),
  ADD UNIQUE KEY `token` (`token`);

--
-- Índices para tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  ADD PRIMARY KEY (`ID_TURMA`),
  ADD KEY `COD_PROFESSOR` (`COD_PROFESSOR`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `tb_fase`
--
ALTER TABLE `tb_fase`
  MODIFY `ID_FASE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_jogo`
--
ALTER TABLE `tb_jogo`
  MODIFY `ID_JOGO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `ID_PROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  MODIFY `ID_RELATORIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  MODIFY `ID_TURMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `tb_aluno_ibfk_1` FOREIGN KEY (`COD_TURMA`) REFERENCES `tb_turma` (`ID_TURMA`);

--
-- Limitadores para a tabela `tb_aluno_jogo`
--
ALTER TABLE `tb_aluno_jogo`
  ADD CONSTRAINT `tb_aluno_jogo_ibfk_1` FOREIGN KEY (`COD_ALUNO`) REFERENCES `tb_aluno` (`ID_ALUNO`),
  ADD CONSTRAINT `tb_aluno_jogo_ibfk_2` FOREIGN KEY (`COD_JOGO`) REFERENCES `tb_jogo` (`ID_JOGO`);

--
-- Limitadores para a tabela `tb_fase`
--
ALTER TABLE `tb_fase`
  ADD CONSTRAINT `tb_fase_ibfk_1` FOREIGN KEY (`COD_JOGO`) REFERENCES `tb_jogo` (`ID_JOGO`);

--
-- Limitadores para a tabela `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  ADD CONSTRAINT `tb_relatorio_ibfk_1` FOREIGN KEY (`COD_PROFESSOR`) REFERENCES `tb_professor` (`ID_PROFESSOR`),
  ADD CONSTRAINT `tb_relatorio_ibfk_2` FOREIGN KEY (`COD_FASE`) REFERENCES `tb_fase` (`ID_FASE`),
  ADD CONSTRAINT `tb_relatorio_ibfk_3` FOREIGN KEY (`COD_ALUNO`) REFERENCES `tb_aluno` (`ID_ALUNO`);

--
-- Limitadores para a tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  ADD CONSTRAINT `tb_turma_ibfk_1` FOREIGN KEY (`COD_PROFESSOR`) REFERENCES `tb_professor` (`ID_PROFESSOR`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
