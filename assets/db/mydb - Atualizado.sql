-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 24-Ago-2017 às 23:27
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_ativ_simu`
--

CREATE TABLE `tb_ativ_simu` (
  `id_asm` int(11) NOT NULL,
  `nome_asm` varchar(45) DEFAULT NULL,
  `tempo_asm` time(4) DEFAULT NULL,
  `pontuacao_asm` int(11) DEFAULT NULL,
  `imagem_asm` varchar(45) DEFAULT NULL,
  `TB_CICL_SIMU_id_csm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_ativ_simu`
--

INSERT INTO `tb_ativ_simu` (`id_asm`, `nome_asm`, `tempo_asm`, `pontuacao_asm`, `imagem_asm`, `TB_CICL_SIMU_id_csm`) VALUES
(2, 'Atividade 1', '00:00:45.0000', 654, NULL, 1),
(3, 'Atividade 2', '00:00:45.0000', 654, NULL, 1),
(7, '04:45', NULL, 45456, '', 1),
(8, '06:59', NULL, 123123, '', 71),
(9, 'd1sa23', '00:00:23.0000', 123, '', 1),
(10, 'd1sad1as3', '00:00:04.0000', 45645465, '', 69),
(11, 'd4sa5d4as56', '04:45:00.0000', 12123, '', 1),
(12, '9999', '00:05:00.0000', 123, '', 70);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_cicl_simu`
--

CREATE TABLE `tb_cicl_simu` (
  `id_csm` int(11) NOT NULL,
  `descricao_csm` varchar(45) DEFAULT NULL,
  `imagem_csm` varchar(45) DEFAULT NULL,
  `TB_COMP_CURC_id_ccr` int(11) NOT NULL,
  `TB_SIMULADOR_id_sml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_cicl_simu`
--

INSERT INTO `tb_cicl_simu` (`id_csm`, `descricao_csm`, `imagem_csm`, `TB_COMP_CURC_id_ccr`, `TB_SIMULADOR_id_sml`) VALUES
(1, 'dlpasdlasp', NULL, 1, 2),
(2, 'kkk', NULL, 1, 2),
(69, '', 'kkkk', 1, 3),
(70, 'TESTE', '', 1, 1),
(71, 'TESTE3', '', 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comp_curc`
--

CREATE TABLE `tb_comp_curc` (
  `id_ccr` int(11) NOT NULL,
  `nome_ccr` varchar(45) DEFAULT NULL,
  `cargaHoraria_ccr` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_comp_curc`
--

INSERT INTO `tb_comp_curc` (`id_ccr`, `nome_ccr`, `cargaHoraria_ccr`) VALUES
(1, 'Armazenamento de Controle de Estoque', 45),
(2, 'Estogem', 5),
(3, 'Transporte', NULL),
(4, 'Custos', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comp_nort`
--

CREATE TABLE `tb_comp_nort` (
  `id_cnr` int(11) NOT NULL,
  `nome_cnr` varchar(45) DEFAULT NULL,
  `TB_SIMULADOR_id_sml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_comp_nort`
--

INSERT INTO `tb_comp_nort` (`id_cnr`, `nome_cnr`, `TB_SIMULADOR_id_sml`) VALUES
(1, 'ldapsldaps', 2),
(2, NULL, 2),
(3, NULL, 2),
(4, 'dlaspdlasp', 2),
(5, 'dlsapdlasps', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_curso`
--

CREATE TABLE `tb_curso` (
  `id_cur` int(11) NOT NULL,
  `nome_cur` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_curso`
--

INSERT INTO `tb_curso` (`id_cur`, `nome_cur`) VALUES
(1, 'Teeste'),
(3, 'teste45456'),
(4, 'TESTE');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_etg_ccr_cnt`
--

CREATE TABLE `tb_etg_ccr_cnt` (
  `id_ccr_cnt` int(11) NOT NULL,
  `TB_COMP_CURC_id_ccr` int(11) NOT NULL,
  `TB_COMP_NOTE_id_cnt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_etg_cur_ccr`
--

CREATE TABLE `tb_etg_cur_ccr` (
  `id_cur_ccr` int(11) NOT NULL,
  `TB_CURSO_id_cur` int(11) NOT NULL,
  `TB_COMP_CURC_id_ccr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_iten_atv_sml`
--

CREATE TABLE `tb_iten_atv_sml` (
  `id_ias` int(11) NOT NULL,
  `nome_ias` varchar(45) DEFAULT NULL,
  `sequencia_ias` int(11) DEFAULT NULL,
  `TB_ATIV_SIMU_id_asm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_iten_atv_sml`
--

INSERT INTO `tb_iten_atv_sml` (`id_ias`, `nome_ias`, `sequencia_ias`, `TB_ATIV_SIMU_id_asm`) VALUES
(1, 'Teste 1', 1, 2),
(2, 'Teste 2', 2, 2),
(3, 'Teste 3', 3, 2),
(4, 'Teste 4', 4, 2),
(5, 'Teste 5', 5, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_perfil`
--

CREATE TABLE `tb_perfil` (
  `id_per` int(11) NOT NULL,
  `desc_per` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_perfil`
--

INSERT INTO `tb_perfil` (`id_per`, `desc_per`) VALUES
(1, 'aluno'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relz_cicl`
--

CREATE TABLE `tb_relz_cicl` (
  `id_rcc` int(11) NOT NULL,
  `pontuacaoAlcancada_rcc` int(11) DEFAULT NULL,
  `TB_CICL_SIMU_id_csm` int(11) NOT NULL,
  `TB_USUARIO_id_usu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_simulador`
--

CREATE TABLE `tb_simulador` (
  `id_sml` int(11) NOT NULL,
  `nome_sml` varchar(45) DEFAULT NULL,
  `descricao_sml` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_simulador`
--

INSERT INTO `tb_simulador` (`id_sml`, `nome_sml`, `descricao_sml`) VALUES
(1, 'Comprar', '---'),
(2, 'Vender', '---'),
(3, 'Organizar', '----');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usu` int(11) NOT NULL,
  `nome_usu` varchar(45) DEFAULT NULL,
  `email_usu` varchar(45) DEFAULT NULL,
  `cpf_usu` varchar(11) DEFAULT NULL,
  `sexo_usu` varchar(10) DEFAULT NULL,
  `TB_PERFIL_id_per` int(11) NOT NULL,
  `senha_usu` varchar(255) NOT NULL,
  `avatar_usu` varchar(50) DEFAULT NULL,
  `sobrenome_usu` varchar(30) NOT NULL,
  `username_usu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usu`, `nome_usu`, `email_usu`, `cpf_usu`, `sexo_usu`, `TB_PERFIL_id_per`, `senha_usu`, `avatar_usu`, `sobrenome_usu`, `username_usu`) VALUES
(10, 'pablo', 'admin@admin.com', '04646456', 'M', 1, 'admin', NULL, 'Soares Papalardo', 'admin'),
(11, 'pablo', 'dlasp@dsaldpas.com', '045', 'M', 2, '123', NULL, 'Soares Papalardo', 'papa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_ativ_simu`
--
ALTER TABLE `tb_ativ_simu`
  ADD PRIMARY KEY (`id_asm`),
  ADD KEY `INXCSM` (`TB_CICL_SIMU_id_csm`);

--
-- Indexes for table `tb_cicl_simu`
--
ALTER TABLE `tb_cicl_simu`
  ADD PRIMARY KEY (`id_csm`),
  ADD KEY `INXCCR` (`TB_COMP_CURC_id_ccr`),
  ADD KEY `INXSML` (`TB_SIMULADOR_id_sml`);

--
-- Indexes for table `tb_comp_curc`
--
ALTER TABLE `tb_comp_curc`
  ADD PRIMARY KEY (`id_ccr`);

--
-- Indexes for table `tb_comp_nort`
--
ALTER TABLE `tb_comp_nort`
  ADD PRIMARY KEY (`id_cnr`),
  ADD KEY `INXSML` (`TB_SIMULADOR_id_sml`);

--
-- Indexes for table `tb_curso`
--
ALTER TABLE `tb_curso`
  ADD PRIMARY KEY (`id_cur`);

--
-- Indexes for table `tb_etg_ccr_cnt`
--
ALTER TABLE `tb_etg_ccr_cnt`
  ADD PRIMARY KEY (`id_ccr_cnt`),
  ADD KEY `INXCNR` (`TB_COMP_NOTE_id_cnt`),
  ADD KEY `INXCCR` (`TB_COMP_CURC_id_ccr`);

--
-- Indexes for table `tb_etg_cur_ccr`
--
ALTER TABLE `tb_etg_cur_ccr`
  ADD PRIMARY KEY (`id_cur_ccr`),
  ADD KEY `INXCCR` (`TB_COMP_CURC_id_ccr`),
  ADD KEY `INXCUR` (`TB_CURSO_id_cur`);

--
-- Indexes for table `tb_iten_atv_sml`
--
ALTER TABLE `tb_iten_atv_sml`
  ADD PRIMARY KEY (`id_ias`),
  ADD KEY `INXASM` (`TB_ATIV_SIMU_id_asm`);

--
-- Indexes for table `tb_perfil`
--
ALTER TABLE `tb_perfil`
  ADD PRIMARY KEY (`id_per`);

--
-- Indexes for table `tb_relz_cicl`
--
ALTER TABLE `tb_relz_cicl`
  ADD PRIMARY KEY (`id_rcc`),
  ADD KEY `INXCSM` (`TB_CICL_SIMU_id_csm`),
  ADD KEY `INXUSU` (`TB_USUARIO_id_usu`);

--
-- Indexes for table `tb_simulador`
--
ALTER TABLE `tb_simulador`
  ADD PRIMARY KEY (`id_sml`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usu`),
  ADD KEY `INXPER` (`TB_PERFIL_id_per`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ativ_simu`
--
ALTER TABLE `tb_ativ_simu`
  MODIFY `id_asm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_cicl_simu`
--
ALTER TABLE `tb_cicl_simu`
  MODIFY `id_csm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `tb_comp_curc`
--
ALTER TABLE `tb_comp_curc`
  MODIFY `id_ccr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_comp_nort`
--
ALTER TABLE `tb_comp_nort`
  MODIFY `id_cnr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_curso`
--
ALTER TABLE `tb_curso`
  MODIFY `id_cur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_etg_cur_ccr`
--
ALTER TABLE `tb_etg_cur_ccr`
  MODIFY `id_cur_ccr` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_iten_atv_sml`
--
ALTER TABLE `tb_iten_atv_sml`
  MODIFY `id_ias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_perfil`
--
ALTER TABLE `tb_perfil`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_relz_cicl`
--
ALTER TABLE `tb_relz_cicl`
  MODIFY `id_rcc` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_simulador`
--
ALTER TABLE `tb_simulador`
  MODIFY `id_sml` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `tb_ativ_simu`
--
ALTER TABLE `tb_ativ_simu`
  ADD CONSTRAINT `fk_TB_ATIV_SIMU_TB_CICL_SIMU1` FOREIGN KEY (`TB_CICL_SIMU_id_csm`) REFERENCES `tb_cicl_simu` (`id_csm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_cicl_simu`
--
ALTER TABLE `tb_cicl_simu`
  ADD CONSTRAINT `fk_CicloSimulador_ComponenteCurricular1` FOREIGN KEY (`TB_COMP_CURC_id_ccr`) REFERENCES `tb_comp_curc` (`id_ccr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_CICL_SIMU_TB_SIMULADOR1` FOREIGN KEY (`TB_SIMULADOR_id_sml`) REFERENCES `tb_simulador` (`id_sml`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_comp_nort`
--
ALTER TABLE `tb_comp_nort`
  ADD CONSTRAINT `fk_CompetenciasNoteadoras_Simulador1` FOREIGN KEY (`TB_SIMULADOR_id_sml`) REFERENCES `tb_simulador` (`id_sml`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_etg_ccr_cnt`
--
ALTER TABLE `tb_etg_ccr_cnt`
  ADD CONSTRAINT `fk_ComponenteCurricular_has_CompetenciasNoteadoras_Competenci1` FOREIGN KEY (`TB_COMP_NOTE_id_cnt`) REFERENCES `tb_comp_nort` (`id_cnr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ComponenteCurricular_has_CompetenciasNoteadoras_Componente1` FOREIGN KEY (`TB_COMP_CURC_id_ccr`) REFERENCES `tb_comp_curc` (`id_ccr`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_etg_cur_ccr`
--
ALTER TABLE `tb_etg_cur_ccr`
  ADD CONSTRAINT `fk_Curso_has_ComponenteCurricular_ComponenteCurricular1` FOREIGN KEY (`TB_COMP_CURC_id_ccr`) REFERENCES `tb_comp_curc` (`id_ccr`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Curso_has_ComponenteCurricular_Curso1` FOREIGN KEY (`TB_CURSO_id_cur`) REFERENCES `tb_curso` (`id_cur`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_iten_atv_sml`
--
ALTER TABLE `tb_iten_atv_sml`
  ADD CONSTRAINT `fk_ItensAtividadeSimulador_AtividadeSimulador1` FOREIGN KEY (`TB_ATIV_SIMU_id_asm`) REFERENCES `tb_ativ_simu` (`id_asm`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_relz_cicl`
--
ALTER TABLE `tb_relz_cicl`
  ADD CONSTRAINT `fk_RealizarCiclo_CicloSimulador1` FOREIGN KEY (`TB_CICL_SIMU_id_csm`) REFERENCES `tb_cicl_simu` (`id_csm`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_TB_RELZ_CICL_TB_USUARIO1` FOREIGN KEY (`TB_USUARIO_id_usu`) REFERENCES `tb_usuario` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_TB_USUARIO_TB_PERFIL1` FOREIGN KEY (`TB_PERFIL_id_per`) REFERENCES `tb_perfil` (`id_per`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
