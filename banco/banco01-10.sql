-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 02-Out-2023 às 04:11
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
-- Banco de dados: `bdescola`
--
CREATE DATABASE IF NOT EXISTS `bdescola` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdescola`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbaluno`
--

CREATE TABLE `tbaluno` (
  `ID` int(11) NOT NULL,
  `RM` varchar(40) NOT NULL,
  `NOME` varchar(40) NOT NULL,
  `CPF` varchar(13) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tbaluno`
--

INSERT INTO `tbaluno` (`ID`, `RM`, `NOME`, `CPF`, `TELEFONE`) VALUES
(1, '123412', 'lorena', '123123112', '172876822'),
(2, '231321', 'sdsd', '3213121', '2323121');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tbaluno`
--
ALTER TABLE `tbaluno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Banco de dados: `bd_cinema_luisa`
--
CREATE DATABASE IF NOT EXISTS `bd_cinema_luisa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_cinema_luisa`;

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `cineminhas`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `cineminhas` (
`Nome_Fantasia_L` varchar(40)
,`Cidade_L` varchar(40)
,`Estado_L` char(2)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ator`
--

CREATE TABLE `tb_ator` (
  `ID_ATOR` int(11) NOT NULL,
  `NOME` varchar(40) DEFAULT NULL,
  `QTD_PREMIOS` int(11) DEFAULT NULL,
  `NACIONALIDADE` varchar(35) DEFAULT NULL,
  `DIRETOR` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_ator`
--

INSERT INTO `tb_ator` (`ID_ATOR`, `NOME`, `QTD_PREMIOS`, `NACIONALIDADE`, `DIRETOR`) VALUES
(1, 'Jennie', 12, 'estadunidense', 1),
(2, 'Sofia Carson', 5, 'australiana', 1),
(3, 'Paola Oliveira', 8, 'brasileiro', 0),
(21, 'Lorena', 1, 'brasileira', 0),
(22, 'Leonardo', 22, 'cubano', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cinema`
--

CREATE TABLE `tb_cinema` (
  `ID_CINEMA` int(11) NOT NULL,
  `NOME_FANTASIA` varchar(40) DEFAULT NULL,
  `LOGRADOURO` varchar(40) DEFAULT NULL,
  `CIDADE` varchar(40) DEFAULT NULL,
  `ESTADO` char(2) DEFAULT NULL,
  `LOTACAO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cinema`
--

INSERT INTO `tb_cinema` (`ID_CINEMA`, `NOME_FANTASIA`, `LOGRADOURO`, `CIDADE`, `ESTADO`, `LOTACAO`) VALUES
(4, 'CinePipoco', 'Rua São João, 393', 'São Paulo', 'SP', 500),
(5, 'CineSonho', 'Rua Alberto Andalo,6687', 'São José do rio preto', 'SP', 300),
(6, 'Centerplex', 'Rua Alfredo Antônio,1200', 'São Paulo', 'SP', 450);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cinema_filme`
--

CREATE TABLE `tb_cinema_filme` (
  `COD_CINEMA` int(11) DEFAULT NULL,
  `COD_FILME` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cinema_filme`
--

INSERT INTO `tb_cinema_filme` (`COD_CINEMA`, `COD_FILME`) VALUES
(6, 7),
(5, 12),
(4, 8),
(6, 17),
(4, 17),
(5, 17),
(6, 7),
(5, 12),
(4, 8),
(6, 17),
(4, 17),
(5, 17);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_filme`
--

CREATE TABLE `tb_filme` (
  `ID_FILME` int(11) NOT NULL,
  `COD_GENERO` int(11) DEFAULT NULL,
  `TITULO` varchar(40) DEFAULT NULL,
  `DURACAO` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_filme`
--

INSERT INTO `tb_filme` (`ID_FILME`, `COD_GENERO`, `TITULO`, `DURACAO`) VALUES
(7, 11, 'Poeira em alto mar', '02:00:00'),
(8, 9, 'It a coisa', '02:00:00'),
(12, 10, 'A proposta', '02:00:00'),
(17, 19, 'Bates Motel', '02:15:00'),
(18, 19, 'A freira', '03:00:00'),
(20, 9, 'Corra', '02:10:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_filme_ator`
--

CREATE TABLE `tb_filme_ator` (
  `COD_FILME` int(11) DEFAULT NULL,
  `COD_ATOR` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_filme_ator`
--

INSERT INTO `tb_filme_ator` (`COD_FILME`, `COD_ATOR`) VALUES
(20, 1),
(20, 21),
(20, 22),
(7, 3),
(12, 1),
(8, 2),
(20, 1),
(20, 21),
(20, 22),
(7, 3),
(12, 1),
(8, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_genero`
--

CREATE TABLE `tb_genero` (
  `ID_GENERO` int(11) NOT NULL,
  `DESCRICAO` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_genero`
--

INSERT INTO `tb_genero` (`ID_GENERO`, `DESCRICAO`) VALUES
(9, 'Terror'),
(10, 'Romance'),
(11, 'Comédia'),
(19, 'Suspense');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_sessao`
--

CREATE TABLE `tb_sessao` (
  `ID_SESSAO` int(11) NOT NULL,
  `COD_CINEMA` int(11) DEFAULT NULL,
  `COD_FILME` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `HORA` time DEFAULT NULL,
  `QTD_PUBLICO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_sessao`
--

INSERT INTO `tb_sessao` (`ID_SESSAO`, `COD_CINEMA`, `COD_FILME`, `DATA`, `HORA`, `QTD_PUBLICO`) VALUES
(13, 5, 7, '2022-05-16', '20:00:00', 300),
(14, 4, 8, '2021-12-23', '16:10:00', 150),
(15, 6, 12, '2019-11-30', '22:30:00', 400),
(16, 6, 8, '2019-10-24', '15:15:00', 250);

-- --------------------------------------------------------

--
-- Estrutura para vista `cineminhas`
--
DROP TABLE IF EXISTS `cineminhas`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cineminhas`  AS SELECT `tb_cinema`.`NOME_FANTASIA` AS `Nome_Fantasia_L`, `tb_cinema`.`CIDADE` AS `Cidade_L`, `tb_cinema`.`ESTADO` AS `Estado_L` FROM `tb_cinema` WHERE `tb_cinema`.`ESTADO` = 'SP\'SP''SP\'SP'  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_ator`
--
ALTER TABLE `tb_ator`
  ADD PRIMARY KEY (`ID_ATOR`);

--
-- Índices para tabela `tb_cinema`
--
ALTER TABLE `tb_cinema`
  ADD PRIMARY KEY (`ID_CINEMA`);

--
-- Índices para tabela `tb_cinema_filme`
--
ALTER TABLE `tb_cinema_filme`
  ADD KEY `COD_CINEMA` (`COD_CINEMA`),
  ADD KEY `COD_FILME` (`COD_FILME`);

--
-- Índices para tabela `tb_filme`
--
ALTER TABLE `tb_filme`
  ADD PRIMARY KEY (`ID_FILME`),
  ADD KEY `COD_GENERO` (`COD_GENERO`);

--
-- Índices para tabela `tb_filme_ator`
--
ALTER TABLE `tb_filme_ator`
  ADD KEY `COD_FILME` (`COD_FILME`),
  ADD KEY `COD_ATOR` (`COD_ATOR`);

--
-- Índices para tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  ADD PRIMARY KEY (`ID_GENERO`);

--
-- Índices para tabela `tb_sessao`
--
ALTER TABLE `tb_sessao`
  ADD PRIMARY KEY (`ID_SESSAO`),
  ADD KEY `COD_CINEMA` (`COD_CINEMA`),
  ADD KEY `COD_FILME` (`COD_FILME`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_ator`
--
ALTER TABLE `tb_ator`
  MODIFY `ID_ATOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_cinema`
--
ALTER TABLE `tb_cinema`
  MODIFY `ID_CINEMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_filme`
--
ALTER TABLE `tb_filme`
  MODIFY `ID_FILME` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `tb_genero`
--
ALTER TABLE `tb_genero`
  MODIFY `ID_GENERO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `tb_sessao`
--
ALTER TABLE `tb_sessao`
  MODIFY `ID_SESSAO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_cinema_filme`
--
ALTER TABLE `tb_cinema_filme`
  ADD CONSTRAINT `tb_cinema_filme_ibfk_1` FOREIGN KEY (`COD_CINEMA`) REFERENCES `tb_cinema` (`ID_CINEMA`),
  ADD CONSTRAINT `tb_cinema_filme_ibfk_2` FOREIGN KEY (`COD_FILME`) REFERENCES `tb_filme` (`ID_FILME`);

--
-- Limitadores para a tabela `tb_filme`
--
ALTER TABLE `tb_filme`
  ADD CONSTRAINT `tb_filme_ibfk_1` FOREIGN KEY (`COD_GENERO`) REFERENCES `tb_genero` (`ID_GENERO`);

--
-- Limitadores para a tabela `tb_filme_ator`
--
ALTER TABLE `tb_filme_ator`
  ADD CONSTRAINT `tb_filme_ator_ibfk_1` FOREIGN KEY (`COD_FILME`) REFERENCES `tb_filme` (`ID_FILME`),
  ADD CONSTRAINT `tb_filme_ator_ibfk_2` FOREIGN KEY (`COD_ATOR`) REFERENCES `tb_ator` (`ID_ATOR`);

--
-- Limitadores para a tabela `tb_sessao`
--
ALTER TABLE `tb_sessao`
  ADD CONSTRAINT `tb_sessao_ibfk_1` FOREIGN KEY (`COD_CINEMA`) REFERENCES `tb_cinema` (`ID_CINEMA`),
  ADD CONSTRAINT `tb_sessao_ibfk_2` FOREIGN KEY (`COD_FILME`) REFERENCES `tb_filme` (`ID_FILME`);
--
-- Banco de dados: `bd_esporte`
--
CREATE DATABASE IF NOT EXISTS `bd_esporte` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_esporte`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_administrador`
--

CREATE TABLE `tb_administrador` (
  `ID_ADMINISTRADOR` int(11) NOT NULL,
  `NOME_USUARIO` varchar(50) NOT NULL,
  `SENHA_USUARIO` varchar(50) NOT NULL,
  `CPF` char(11) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NOME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_administrador`
--

INSERT INTO `tb_administrador` (`ID_ADMINISTRADOR`, `NOME_USUARIO`, `SENHA_USUARIO`, `CPF`, `TELEFONE`, `EMAIL`, `NOME`) VALUES
(1, 'Roberta', 'roro123', '17444333222', '17981090909', 'roberta@gmail.com', 'Roberta dos Santos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `ID_ALUNO` int(11) NOT NULL,
  `COD_PROFESSOR` int(11) NOT NULL,
  `COD_ESPORTE` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `CPF` char(11) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `DATA_NASC` varchar(10) NOT NULL,
  `ENDERECO` varchar(100) NOT NULL,
  `NOME_USUARIO` varchar(50) NOT NULL,
  `SENHA_USUARIO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`ID_ALUNO`, `COD_PROFESSOR`, `COD_ESPORTE`, `NOME`, `CPF`, `TELEFONE`, `EMAIL`, `DATA_NASC`, `ENDERECO`, `NOME_USUARIO`, `SENHA_USUARIO`) VALUES
(1, 1, 2, 'Luisa', '12345678990', '1799990000', 'luisa@gmail.com', '23/12/2005', 'rua Geová Nogueira- SJRP', 'lulu', 'luisa123'),
(2, 1, 2, 'Lorena', '98067589076', '1701928374', 'lorena@gmail.com', '30/08/2004', 'rua São Paulo- SJRP', 'lorena', '123456'),
(3, 2, 1, 'Rayanne', '43243243243', '1712121212', 'rayanne@gmail.com', '25/02/2006', 'Rua Cristovão Colombo- SJRP', 'RayRay', 'Ray1234'),
(4, 2, 1, 'Thiago', '67887654334', '1700001111', 'thiago@etec.sp.gov.com', '09/07/2005', 'Avenida dos Estudantes- SJRP', 'Thiago', '09072005'),
(5, 3, 3, 'Laura', '47474747498', '1710203040', 'laura@gmail.com', '20/12/1995', 'Rua Alberto Andaló-SJRP', 'Lala', 'Laura2012');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_esporte`
--

CREATE TABLE `tb_esporte` (
  `ID_ESPORTE` int(11) NOT NULL,
  `COD_PROFESSOR` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `QTD_ALUNOS` int(11) NOT NULL,
  `HORARIO` varchar(10) NOT NULL,
  `IDADE_MINIMA` int(11) NOT NULL,
  `QTD_DIAS` int(11) NOT NULL,
  `DURACAO` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_esporte`
--

INSERT INTO `tb_esporte` (`ID_ESPORTE`, `COD_PROFESSOR`, `NOME`, `QTD_ALUNOS`, `HORARIO`, `IDADE_MINIMA`, `QTD_DIAS`, `DURACAO`) VALUES
(1, 2, 'Volei', 30, '18:00', 10, 3, '120'),
(2, 1, 'Futebol', 25, '20:00', 6, 2, '120'),
(3, 3, 'Capoeira', 15, '19:00', 10, 3, '60');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_professor`
--

CREATE TABLE `tb_professor` (
  `ID_PROFESSOR` int(11) NOT NULL,
  `NOME` varchar(50) NOT NULL,
  `CPF` char(11) NOT NULL,
  `TELEFONE` varchar(20) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `NOME_USUARIO` varchar(50) NOT NULL,
  `SENHA_USUARIO` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`ID_PROFESSOR`, `NOME`, `CPF`, `TELEFONE`, `EMAIL`, `NOME_USUARIO`, `SENHA_USUARIO`) VALUES
(1, 'Altomani', '56565656756', '1712341234', 'alto@gmail.com', 'Altomani', '1234'),
(2, 'Rosa', '99900099988', '1766667777', 'rosamaria@gmail.com', 'Rosa', '090807'),
(3, 'Pedro', '44445555666', '1798765409', 'Pedrinho@gmail.com', 'Pedro', 'pedrinho123');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_administrador`
--
ALTER TABLE `tb_administrador`
  ADD PRIMARY KEY (`ID_ADMINISTRADOR`);

--
-- Índices para tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`ID_ALUNO`),
  ADD KEY `COD_PROFESSOR` (`COD_PROFESSOR`),
  ADD KEY `COD_ESPORTE` (`COD_ESPORTE`);

--
-- Índices para tabela `tb_esporte`
--
ALTER TABLE `tb_esporte`
  ADD PRIMARY KEY (`ID_ESPORTE`),
  ADD KEY `COD_PROFESSOR` (`COD_PROFESSOR`);

--
-- Índices para tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  ADD PRIMARY KEY (`ID_PROFESSOR`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_administrador`
--
ALTER TABLE `tb_administrador`
  MODIFY `ID_ADMINISTRADOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_esporte`
--
ALTER TABLE `tb_esporte`
  MODIFY `ID_ESPORTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_professor`
--
ALTER TABLE `tb_professor`
  MODIFY `ID_PROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD CONSTRAINT `tb_aluno_ibfk_1` FOREIGN KEY (`COD_PROFESSOR`) REFERENCES `tb_professor` (`ID_PROFESSOR`),
  ADD CONSTRAINT `tb_aluno_ibfk_2` FOREIGN KEY (`COD_ESPORTE`) REFERENCES `tb_esporte` (`ID_ESPORTE`);

--
-- Limitadores para a tabela `tb_esporte`
--
ALTER TABLE `tb_esporte`
  ADD CONSTRAINT `tb_esporte_ibfk_1` FOREIGN KEY (`COD_PROFESSOR`) REFERENCES `tb_professor` (`ID_PROFESSOR`);
--
-- Banco de dados: `bd_pedido_luisa`
--
CREATE DATABASE IF NOT EXISTS `bd_pedido_luisa` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_pedido_luisa`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `ID_CLIENTE` int(11) NOT NULL,
  `NOME` varchar(40) DEFAULT NULL,
  `ENDERECO` varchar(60) DEFAULT NULL,
  `CIDADE` varchar(40) DEFAULT NULL,
  `CEP` char(9) DEFAULT NULL,
  `UF` char(2) DEFAULT NULL,
  `CNPJ` char(12) DEFAULT NULL,
  `IE` char(14) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`ID_CLIENTE`, `NOME`, `ENDERECO`, `CIDADE`, `CEP`, `UF`, `CNPJ`, `IE`) VALUES
(20, 'Beth', 'Av. Climerio n. 45', 'Sao Paulo', '25679-300', 'SP', '32.485.126/7', '9280'),
(110, 'Jorge', 'Rua Caiapo 13', 'Curitiba', '30078-500', 'PR', '14.512.764/9', NULL),
(130, 'Edmar', 'Rua da Praia sn/', 'Salvador', '30079-300', 'BA', '23.463.284/0', '7121'),
(157, 'Paulo', 'Tv. Moraes c/3', 'Londrina', NULL, 'PR', '32.848.223/0', '1923'),
(180, 'Livio', 'Av. Beira Mar n. 1256', 'Florianopolis', '30077-500', 'SC', '12.736.571/2', NULL),
(222, 'Lucia', 'Rua Itabira 123 Loja 9', 'Belo Horizonte', '22124-391', 'MG', '28.315.213/9', '2985'),
(234, 'Jose', 'Quadra 3 bl. 3 sl. 1003', 'Brasilia', '22841-650', 'DF', '21.763.576/1', '2931'),
(260, 'Susana', 'Rua Lopes Mendes 12', 'Niteroi', '30046-500', 'RJ', '21.763.571/0', '2530'),
(290, 'Renato', 'Rua Meireles n. 123 bl. 2 sl. 345', 'Sao Paulo', '30225-900', 'SP', '13.276.571/1', '1820'),
(390, 'Sebastiao', 'Rua da Igreja n. 10', 'Uberaba', '30438-700', 'MG', '32.176.547/0', '9071'),
(410, 'Rodolfo', 'Largo da Lapa 27 sobrado', 'Rio de Janeiro', '30078-900', 'RJ', '12.835.128/2', '7431'),
(720, 'Ana', 'Rua 17, n. 19', 'Niteroi', '24358-310', 'RJ', '12.113.231/0', '2134'),
(830, 'Mauricio', 'Av. Paulista 1236 sl/2345', 'Sao Paulo', '30012-683', 'SP', '32.816.985/7', '9343'),
(870, 'Flavio', 'Av. Pres. Vargas 10', 'Sao Paulo', '22763-931', 'SP', '22.534.126/9', '4631'),
(1111, 'Luisa', 'Rua Geova Nogueira 393', 'Rio de Janeiro', '52525-589', 'rj', '98.546.123/9', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_item_pedido`
--

CREATE TABLE `tb_item_pedido` (
  `COD_PEDIDO` int(11) DEFAULT NULL,
  `COD_PRODUTO` int(11) DEFAULT NULL,
  `QUANTIDADE` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_item_pedido`
--

INSERT INTO `tb_item_pedido` (`COD_PEDIDO`, `COD_PRODUTO`, `QUANTIDADE`) VALUES
(121, 25, 10),
(121, 31, 35),
(97, 77, 20),
(101, 31, 9),
(101, 78, 18),
(101, 13, 5),
(98, 77, 5),
(148, 45, 8),
(148, 31, 7),
(148, 77, 3),
(148, 25, 10),
(148, 78, 30),
(104, 53, 32),
(203, 31, 6),
(189, 78, 45),
(143, 31, 20),
(143, 78, 10),
(105, 78, 10),
(111, 25, 10),
(111, 78, 70),
(103, 53, 37),
(91, 77, 40),
(138, 22, 10),
(138, 77, 35),
(138, 53, 18),
(108, 13, 17),
(119, 77, 40),
(119, 13, 6),
(119, 22, 10),
(119, 53, 43),
(137, 13, 8),
(101, 53, 3),
(121, 22, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_pedido`
--

CREATE TABLE `tb_pedido` (
  `ID_PEDIDO` int(11) NOT NULL,
  `COD_CLIENTE` int(11) DEFAULT NULL,
  `COD_VENDEDOR` int(11) DEFAULT NULL,
  `PRAZO_ENTREGA` int(11) DEFAULT NULL,
  `DATA` date DEFAULT NULL,
  `TOTAL` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_pedido`
--

INSERT INTO `tb_pedido` (`ID_PEDIDO`, `COD_CLIENTE`, `COD_VENDEDOR`, `PRAZO_ENTREGA`, `DATA`, `TOTAL`) VALUES
(91, 260, 11, 20, '2022-04-10', NULL),
(95, 260, 11, 10, '2022-04-01', NULL),
(97, 720, 101, 20, '2022-01-25', NULL),
(98, 410, 209, 20, '2022-03-10', NULL),
(100, 260, 101, 15, '2022-04-01', NULL),
(101, 720, 101, 15, '2022-01-28', NULL),
(103, 260, 11, 20, '2022-04-04', NULL),
(104, 110, 101, 30, '2020-03-01', NULL),
(105, 180, 240, 15, '2022-03-18', NULL),
(108, 290, 310, 15, '2022-05-20', NULL),
(111, 260, 240, 20, '2022-04-02', NULL),
(119, 390, 250, 30, '2022-05-25', NULL),
(121, 410, 209, 20, '2022-01-20', NULL),
(127, 410, 11, 10, '2020-05-30', NULL),
(137, 720, 720, 20, '2022-02-10', NULL),
(138, 260, 11, 20, '2022-04-20', NULL),
(143, 20, 111, 30, '2022-03-15', NULL),
(148, 720, 101, 20, '2022-02-20', NULL),
(189, 870, 213, 15, '2022-02-28', NULL),
(203, 830, 250, 30, '2022-03-05', NULL),
(444, 410, 11, 29, '2022-05-03', NULL),
(555, 410, 11, 10, '2022-05-19', NULL),
(654, 390, 11, 22, '2023-10-08', NULL),
(666, 720, 209, 22, '2022-04-20', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_produto`
--

CREATE TABLE `tb_produto` (
  `ID_PRODUTO` int(11) NOT NULL,
  `DESCRICAO` varchar(40) DEFAULT NULL,
  `UNIDADE` varchar(5) DEFAULT NULL,
  `VALOR_UNITARIO` decimal(7,2) DEFAULT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_produto`
--

INSERT INTO `tb_produto` (`ID_PRODUTO`, `DESCRICAO`, `UNIDADE`, `VALOR_UNITARIO`, `estoque`) VALUES
(13, 'Ouro', 'G', '6.18', 15),
(22, 'Linho', 'M', '10.00', 200),
(25, 'Queijo', 'Kg', '5.00', 100),
(30, 'Acucar', 'SAC', '9.00', 350),
(31, 'Chocolate', 'BAR', '8.00', 50),
(45, 'Madeira', 'M', '0.25', 10),
(53, 'Linha', 'M', '1.80', 300),
(77, 'Papel', 'M', '1.05', 40),
(78, 'Vinho', 'L', '2.00', 150),
(87, 'Cano', 'M', '1.97', 30),
(999, 'Luisa', 'Kg', '120.00', 80);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vendedor`
--

CREATE TABLE `tb_vendedor` (
  `ID_VENDEDOR` int(11) NOT NULL,
  `NOME` varchar(40) DEFAULT NULL,
  `SALARIO_FIXO` decimal(7,2) DEFAULT NULL,
  `FAIXA_COMISSAO` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_vendedor`
--

INSERT INTO `tb_vendedor` (`ID_VENDEDOR`, `NOME`, `SALARIO_FIXO`, `FAIXA_COMISSAO`) VALUES
(11, 'Joao', '2780.00', 'C'),
(101, 'Joao', '2650.00', 'C'),
(111, 'Carlos', '2490.00', 'A'),
(209, 'Jose', '1800.00', 'C'),
(213, 'Jonas', '2300.00', 'A'),
(240, 'Antonio', '9500.00', 'C'),
(250, 'Mauricio', '2930.00', 'B'),
(310, 'Josias', '870.00', 'B'),
(720, 'Felipe', '4600.00', 'A'),
(1002, 'Luisa', '3560.00', 'A');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`ID_CLIENTE`);

--
-- Índices para tabela `tb_item_pedido`
--
ALTER TABLE `tb_item_pedido`
  ADD KEY `COD_PEDIDO` (`COD_PEDIDO`),
  ADD KEY `COD_PRODUTO` (`COD_PRODUTO`);

--
-- Índices para tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD PRIMARY KEY (`ID_PEDIDO`),
  ADD KEY `COD_CLIENTE` (`COD_CLIENTE`),
  ADD KEY `COD_VENDEDOR` (`COD_VENDEDOR`);

--
-- Índices para tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  ADD PRIMARY KEY (`ID_PRODUTO`);

--
-- Índices para tabela `tb_vendedor`
--
ALTER TABLE `tb_vendedor`
  ADD PRIMARY KEY (`ID_VENDEDOR`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `ID_CLIENTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1112;

--
-- AUTO_INCREMENT de tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  MODIFY `ID_PEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=667;

--
-- AUTO_INCREMENT de tabela `tb_produto`
--
ALTER TABLE `tb_produto`
  MODIFY `ID_PRODUTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT de tabela `tb_vendedor`
--
ALTER TABLE `tb_vendedor`
  MODIFY `ID_VENDEDOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_item_pedido`
--
ALTER TABLE `tb_item_pedido`
  ADD CONSTRAINT `tb_item_pedido_ibfk_1` FOREIGN KEY (`COD_PEDIDO`) REFERENCES `tb_pedido` (`ID_PEDIDO`),
  ADD CONSTRAINT `tb_item_pedido_ibfk_2` FOREIGN KEY (`COD_PRODUTO`) REFERENCES `tb_produto` (`ID_PRODUTO`);

--
-- Limitadores para a tabela `tb_pedido`
--
ALTER TABLE `tb_pedido`
  ADD CONSTRAINT `tb_pedido_ibfk_1` FOREIGN KEY (`COD_CLIENTE`) REFERENCES `tb_cliente` (`ID_CLIENTE`),
  ADD CONSTRAINT `tb_pedido_ibfk_2` FOREIGN KEY (`COD_VENDEDOR`) REFERENCES `tb_vendedor` (`ID_VENDEDOR`);
--
-- Banco de dados: `bd_projeto`
--
CREATE DATABASE IF NOT EXISTS `bd_projeto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_projeto`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cliente`
--

CREATE TABLE `tb_cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(40) NOT NULL,
  `rg_cliente` varchar(14) NOT NULL,
  `cpf_cliente` char(11) NOT NULL,
  `email_cliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cliente`
--

INSERT INTO `tb_cliente` (`id_cliente`, `nome_cliente`, `rg_cliente`, `cpf_cliente`, `email_cliente`) VALUES
(1, 'luisa', '7878787', '45646545646', 'lulu@gmail.com'),
(2, 'lorena', '322233232', '68797987', 'lolo@gmail'),
(3, 'rayanne', '789669', '321321', 'rayray@gmail.com'),
(4, 'Gabriel', '21234432', '11111111', 'gabriel@gmail.com'),
(5, 'Pedro Paulo', '79633148', '1230505', 'pedro@gmail');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_esporte`
--

CREATE TABLE `tb_esporte` (
  `id_esporte` int(11) NOT NULL,
  `nome_esporte` varchar(40) NOT NULL,
  `qtd_aluno` int(11) NOT NULL,
  `idade_minima` int(11) NOT NULL,
  `nome_professor` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_esporte`
--

INSERT INTO `tb_esporte` (`id_esporte`, `nome_esporte`, `qtd_aluno`, `idade_minima`, `nome_professor`) VALUES
(1, '', 20, 5, 'Lorena'),
(2, '', 20, 5, 'Lorena'),
(3, '', 20, 5, 'Lorena'),
(4, '', 20, 5, 'Lorena'),
(5, 'volei', 20, 5, 'Lorena'),
(6, 'futebol', 20, 6, 'Luisa ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_veiculo`
--

CREATE TABLE `tb_veiculo` (
  `id_veiculo` int(11) NOT NULL,
  `placa_veiculo` varchar(8) NOT NULL,
  `nome_veiculo` varchar(20) NOT NULL,
  `cod_cliente` int(11) NOT NULL,
  `cod_esporte` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_veiculo`
--

INSERT INTO `tb_veiculo` (`id_veiculo`, `placa_veiculo`, `nome_veiculo`, `cod_cliente`, `cod_esporte`) VALUES
(6, 'ugr563', 'Caminhonete', 4, 6),
(7, '293LDKF', 'Fusca', 1, 5);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `tb_esporte`
--
ALTER TABLE `tb_esporte`
  ADD PRIMARY KEY (`id_esporte`);

--
-- Índices para tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD PRIMARY KEY (`id_veiculo`),
  ADD KEY `cod_cliente` (`cod_cliente`),
  ADD KEY `cod_esporte` (`cod_esporte`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_cliente`
--
ALTER TABLE `tb_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_esporte`
--
ALTER TABLE `tb_esporte`
  MODIFY `id_esporte` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  MODIFY `id_veiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_veiculo`
--
ALTER TABLE `tb_veiculo`
  ADD CONSTRAINT `tb_veiculo_ibfk_1` FOREIGN KEY (`cod_cliente`) REFERENCES `tb_cliente` (`id_cliente`),
  ADD CONSTRAINT `tb_veiculo_ibfk_2` FOREIGN KEY (`cod_esporte`) REFERENCES `tb_esporte` (`id_esporte`);
--
-- Banco de dados: `bd_toytable`
--
CREATE DATABASE IF NOT EXISTS `bd_toytable` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bd_toytable`;

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
(1, 1, 'altomani'),
(2, 1, 'lorena'),
(3, 1, 'luisa'),
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
(15, 1, 'Elaine dos Santos Silva');

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
  `SENHA` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_professor`
--

INSERT INTO `tb_professor` (`ID_PROFESSOR`, `NOME`, `CPF`, `EMAIL`, `TELEFONE`, `SENHA`) VALUES
(1, 'camila', '23123123132', 'camila@gmail.com', '12336544', 'camilove'),
(2, 'lorena', '1233333', 'lorena@gmail.com', '12336544', '645987978'),
(3, 'Luisa', '523.891.258', 'helluisachub@gmail.com', '17981496584', 'carioca'),
(4, 'carlos', '13213213213', 'carlos@gmail.com', '17991112373', 'carlos123'),
(5, 'mor', '13213131313', 'mor@gmail.com', '12132132132', 'mor123'),
(6, 'elaine', '9889', 'elaine@gmail.com', '00000', 'elaine123'),
(7, 'loli', '12132132', 'loli@gmail.com', '12131', 'loli123'),
(8, 'gab', '1111', 'gab@gmail.com', '111111', 'gabriell'),
(9, 'teste', '888', 'teste@gmail.com', '222222', 'teste123'),
(10, 'teste01', '555555', 'teste01@gmail.com', '33333', 'teste01123'),
(11, 'Luisa', '11111111', 'helluisachub@gmail.com', '17981496584', 'cami'),
(12, 'Luisa', '11111111', 'helluisachub@gmail.com', '17981496584', 'cami'),
(13, 'Luisa Helena Silva', '523.891.258', 'Luisa.silva46@etec.sp.gov.br', '17981496584', 'cami'),
(14, 'Luisa Helena Silva', '523.891.258', 'lllll@gmail.com', '17981496584', '1414'),
(15, 'Luisa Helena Silva', '523.891.258', 'asasda2@gamil', '17981496584', '111'),
(24, 'izabel', '654987987', 'izabel@gmail.com', '3131313131', 'caso'),
(25, 'waldomiro', '65656565', 'wal@gmail.com', '1321321', 'waldinho'),
(26, 'laura', '878979845', 'laura@gmail.com', '41526363', 'laura123'),
(27, 'jardel', '741885269', 'jardel@gmail.com', '454651', '$2y$10$zl26EVaPQ2/S9I5.3U38KuWw8vYjwzVl4BDr897gZbV'),
(28, 'jojo', '7913136', 'jojo@gmail.com', '7893635', '$2y$10$ybQTDMaj3HIWUH7pWTjaEuXhEh0LIrrAM3OdVsl0FcX'),
(29, 'luli', '8795465', 'luli@gmail.com', '589444646', '$2y$10$jx1xoCIXxlQb9DdkBRz1iOljAGoZAM9jFerhSVbfPRp'),
(30, 'mordaminhavida', '8090909', 'mordaminhavida@gmail.com', '80912809', 'mormor123');

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
  `COD_ALUNO` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_relatorio`
--

INSERT INTO `tb_relatorio` (`ID_RELATORIO`, `COD_PROFESSOR`, `COD_FASE`, `DESCRICAO`, `DATA`, `COD_ALUNO`) VALUES
(17, 1, 1, 'adsadasdasdasdas', '2023-12-23', 1);

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
(1, 1, 25, 'a', '2-A'),
(2, 4, 45, 'b', '2-b'),
(8, 1, 35, 'c', '3 a'),
(10, 1, 19, 'a', '4 c'),
(11, 3, 40, 'a', '3 f');

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
  MODIFY `ID_ALUNO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `ID_PROFESSOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_relatorio`
--
ALTER TABLE `tb_relatorio`
  MODIFY `ID_RELATORIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_token`
--
ALTER TABLE `tb_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `tb_turma`
--
ALTER TABLE `tb_turma`
  MODIFY `ID_TURMA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
--
-- Banco de dados: `beckup_bd_projeto`
--
CREATE DATABASE IF NOT EXISTS `beckup_bd_projeto` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `beckup_bd_projeto`;
--
-- Banco de dados: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int(10) UNSIGNED NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_length` text COLLATE utf8_bin DEFAULT NULL,
  `col_collation` varchar(64) COLLATE utf8_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) COLLATE utf8_bin DEFAULT '',
  `col_default` text COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `settings_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `export_type` varchar(10) COLLATE utf8_bin NOT NULL,
  `template_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `template_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp(),
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Extraindo dados da tabela `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"bd_toytable\",\"table\":\"tb_aluno\"},{\"db\":\"bd_toytable\",\"table\":\"tb_relatorio\"},{\"db\":\"bd_toytable\",\"table\":\"tb_fase\"},{\"db\":\"bd_toytable\",\"table\":\"tb_jogo\"},{\"db\":\"bd_toytable\",\"table\":\"tb_turma\"},{\"db\":\"bd_toytable\",\"table\":\"tb_professor\"},{\"db\":\"bd_toytable\",\"table\":\"tb_token\"},{\"db\":\"bd_toytable\",\"table\":\"token\"},{\"db\":\"bd_toytable\",\"table\":\"tb_aluno_jogo\"},{\"db\":\"bd_projeto\",\"table\":\"tb_veiculo\"}]');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT 0,
  `x` float UNSIGNED NOT NULL DEFAULT 0,
  `y` float UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin DEFAULT NULL,
  `data_sql` longtext COLLATE utf8_bin DEFAULT NULL,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Extraindo dados da tabela `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2023-10-02 01:38:56', '{\"Console\\/Mode\":\"collapse\",\"lang\":\"pt\"}');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Estrutura da tabela `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Índices para tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Índices para tabela `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Índices para tabela `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Índices para tabela `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Índices para tabela `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Índices para tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Índices para tabela `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Índices para tabela `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Índices para tabela `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Índices para tabela `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Índices para tabela `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Índices para tabela `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Índices para tabela `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Banco de dados: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `test`;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
