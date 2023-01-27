-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 05-Jun-2022 às 17:54
-- Versão do servidor: 10.3.27-MariaDB-0+deb10u1
-- PHP Version: 7.3.27-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edfinanceira`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cursos`
--

CREATE TABLE `tb_cursos` (
  `id_curos` int(11) NOT NULL,
  `nome_cursos` varchar(100) NOT NULL,
  `descricao_cursos` varchar(255) NOT NULL,
  `preco_cursos` varchar(50) NOT NULL,
  `link_cursos` varchar(2083) NOT NULL,
  `img_cursos` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_cursos`
--

INSERT INTO `tb_cursos` (`id_curos`, `nome_cursos`, `descricao_cursos`, `preco_cursos`, `link_cursos`, `img_cursos`) VALUES
(3, 'EV.G - Gestão de Finanças Pessoais', 'Público-alvo: Jovens e adultos<br>\r\nCarga horária: 20 horas<br>\r\nFormato: Online<br>\r\nOferece certificado? Sim\r\n                ', 'Grátis', 'https://www.escolavirtual.gov.br/curso/170', 'EV.G.png'),
(4, 'OpenEdu', 'Conteúdos práticos e objetivos, até mesmo pra quem já investe<br><br>', 'Grátis', 'https://goopen.com.br/edu', 'Open.png'),
(5, 'EaD SEST SENAT – Educação Financeira', '                  Público-alvo: Iniciantes<br>\r\n                  Carga horária: 20 horas<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Não informado\r\n                ', 'Grátis', 'https://ead.sestsenat.org.br/cursos/educacao-financeira/', 'SENAT.png'),
(6, 'XPEED – Educação Financeira para Jovens', '                  Público-alvo: Iniciantes<br>\r\n                  Carga horária: 2 horas<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Sim\r\n                ', '68.00', 'https://xpeedschool.com.br/curso/educacao-financeira-para-jovens/?gclid=Cj0KCQiAq7COBhC2ARIsANsPATHhjZ98laZU_XAcdjqgWcHPQdHcNpkhEsV2UBiy2DcLeUJoLEpfr0EaAsywEALw_wcB', 'XPEED.png'),
(7, 'Udemy – Curso Completo de Educação Financeira', '                  Público-alvo: Iniciantes e iniciados no mundo das finanças pessoais e dos investimentos<br>\r\n                  Carga horária: 8 horas<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Sim\r\n               ', '329.90', 'https://www.udemy.com/course/curso-completo-de-educacao-financeira/', 'Udemy.png'),
(8, 'Lúmina/UFRGS – Educação Financeira no Século XXI para a Liberdade Financeira', '                  Público-alvo: Iniciantes<br>\r\n                  Carga horária: 25 horas<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Sim\r\n                ', 'Grátis', 'https://lumina.ufrgs.br/course/view.php?id=152', 'Lumina.png'),
(9, 'Serasa – Trilha Financeira', '                  Público-alvo: Iniciantes<br>\r\n                  Carga horária: Não informado<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Sim\r\n                ', 'Grátis', 'https://www.serasa.com.br/ensina/dicas/curso-trilha-financeira/', 'serasa.png'),
(10, 'Fundação Bradesco – Educação Financeira', '                  Público-alvo: Iniciantes<br>\r\n                  Carga horária: 4 horas<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Não informado\r\n                ', 'Grátis', 'https://www.ev.org.br/cursos/educacao-financeira', 'Bradesco.png'),
(11, 'FGV – Como Gastar Conscientemente', '                  Público-alvo: Iniciantes<br>\r\n                  Carga horária: 8 horas<br>\r\n                  Formato: Online<br>\r\n                  Oferece certificado? Não\r\n                ', 'Grátis', 'https://educacao-executiva.fgv.br/cursos/online/curta-media-duracao-online/como-gastar-conscientemente', 'FGV.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_noticias`
--

CREATE TABLE `tb_noticias` (
  `id_noticias` int(11) NOT NULL,
  `titulo_noticias` varchar(100) NOT NULL,
  `descricao_noticias` varchar(255) NOT NULL,
  `autor_noticias` varchar(100) NOT NULL,
  `link_noticias` varchar(2083) NOT NULL,
  `img_noticias` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `primeironome_usuario` varchar(45) NOT NULL,
  `ultimonome_usuario` varchar(45) NOT NULL,
  `cpf_usuario` varchar(15) DEFAULT NULL,
  `email_usuario` varchar(60) NOT NULL,
  `nascimento_usuario` date DEFAULT NULL,
  `telefone_usuario` varchar(30) DEFAULT NULL,
  `senha_usuario` varchar(60) NOT NULL,
  `tipo` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `primeironome_usuario`, `ultimonome_usuario`, `cpf_usuario`, `email_usuario`, `nascimento_usuario`, `telefone_usuario`, `senha_usuario`, `tipo`) VALUES
(1, 'Lucas', 'Vacari', NULL, 'lucasrvacari9@gmail.com', NULL, NULL, '1234', 'admin'),
(2, 'João', 'Pereira', NULL, 'jao@gmail.com', NULL, NULL, '1234', NULL),
(3, 'Lucas', 'Mendes', NULL, 'lucasM@gmail.com', NULL, NULL, '1234', NULL),
(4, 'Pedro', 'Tester', NULL, 'pedro@gmail.com', NULL, NULL, '1234', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cursos`
--
ALTER TABLE `tb_cursos`
  ADD PRIMARY KEY (`id_curos`);

--
-- Indexes for table `tb_noticias`
--
ALTER TABLE `tb_noticias`
  ADD PRIMARY KEY (`id_noticias`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email_usuario` (`email_usuario`),
  ADD UNIQUE KEY `cpf_usuario` (`cpf_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_cursos`
--
ALTER TABLE `tb_cursos`
  MODIFY `id_curos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tb_noticias`
--
ALTER TABLE `tb_noticias`
  MODIFY `id_noticias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
