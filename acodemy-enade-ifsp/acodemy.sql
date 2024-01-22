-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/12/2023 às 00:58
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `acodemy`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id_disciplina` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `disciplina`
--

INSERT INTO `disciplina` (`id_disciplina`, `nome`) VALUES
(1, 'Programação de Computadores'),
(2, 'Banco de dados'),
(3, 'Sistemas operacionais'),
(4, 'Redes de computadores'),
(5, 'Engenharia de software'),
(6, 'Desenvolvimento Web'),
(7, 'Desenvolvimento mobile'),
(8, 'inteligencia artificial e Machine Learning'),
(9, 'Segurança da informação'),
(10, 'Gestão de projetos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pergunta`
--

CREATE TABLE `pergunta` (
  `id_pergunta` int(11) NOT NULL,
  `enunciado_pergunta` text NOT NULL,
  `alternativa_a` text NOT NULL,
  `alternativa_b` text NOT NULL,
  `alternativa_c` text NOT NULL,
  `alternativa_d` text NOT NULL,
  `alternativa_e` text NOT NULL,
  `resposta_pergunta` varchar(1) NOT NULL,
  `fk_id_disciplina` int(11) DEFAULT NULL,
  `resposta_usario` varchar(1) DEFAULT NULL,
  `fk_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pergunta`
--

INSERT INTO `pergunta` (`id_pergunta`, `enunciado_pergunta`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`, `alternativa_e`, `resposta_pergunta`, `fk_id_disciplina`, `resposta_usario`, `fk_usuario`) VALUES
(43, 'Quanto é 1+1?', '1', '2', '3', '4', '5', 'B', 1, '', 11),
(49, 'Quanto é  2+2', '1', '2', '3', '4', '5', 'D', 1, '', 11),
(50, 'quanto 3+2', '1', '2', '3', '4', '5', 'E', 4, '', 11),
(52, 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeehhhhhhhh  hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 'aaaaaaaaaaaaaaaaaa', 'aaaaaaaaaaa', 'aaaaaa', 'aaaaaaaaa', 'aaaaaaaaaaa', 'B', 5, '', 23);

-- --------------------------------------------------------

--
-- Estrutura para tabela `responde`
--

CREATE TABLE `responde` (
  `acerto` int(11) DEFAULT NULL,
  `fk_prontuario_aluno` int(50) DEFAULT NULL,
  `fk_id_pergunta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `responde`
--

INSERT INTO `responde` (`acerto`, `fk_prontuario_aluno`, `fk_id_pergunta`) VALUES
(15, 19, NULL),
(15, 19, NULL),
(30, 22, NULL),
(50, 20, NULL),
(50, 20, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `tipo_acesso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `email`, `senha`, `nome`, `tipo_acesso`) VALUES
(11, 'Admin@professor.ifsp.edu.br', '', 'ADM', 1),
(19, 'henrique@gmail.com', 'MTIz', 'henrique', 2),
(20, 'Edu@professor.ifsp.edu.br', 'MTIzNDU=', 'Edu', 1),
(22, 'Edu@gmail.com', 'MTIzNDU=', 'Edu', 2),
(23, 'd@professor.ifsp.edu.br', 'MTIz', 'Thomas', 1),
(24, 'hm@gmail.com', 'MTIz', 'Henrique', 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id_disciplina`);

--
-- Índices de tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id_pergunta`),
  ADD KEY `fk_id_disciplina` (`fk_id_disciplina`),
  ADD KEY `fk_usuario` (`fk_usuario`);

--
-- Índices de tabela `responde`
--
ALTER TABLE `responde`
  ADD KEY `fk_id_pergunta` (`fk_id_pergunta`),
  ADD KEY `fk_id_estudante` (`fk_prontuario_aluno`) USING BTREE;

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id_disciplina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id_pergunta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `pergunta_ibfk_2` FOREIGN KEY (`fk_id_disciplina`) REFERENCES `disciplina` (`id_disciplina`),
  ADD CONSTRAINT `pergunta_ibfk_3` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Restrições para tabelas `responde`
--
ALTER TABLE `responde`
  ADD CONSTRAINT `responde_ibfk_2` FOREIGN KEY (`fk_id_pergunta`) REFERENCES `usuarios` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
