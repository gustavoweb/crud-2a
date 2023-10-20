-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/10/2023 às 13:41
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `crud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `usu_id` int(3) NOT NULL,
  `usu_nome` varchar(255) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_senha` varchar(255) NOT NULL,
  `usu_foto_perfil` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`usu_id`, `usu_nome`, `usu_email`, `usu_senha`, `usu_foto_perfil`) VALUES
(1, 'João da SIlva', 'dfdfdf@dffdf.dss', '$2y$10$JBatMOEbVjjG.MCVk9zDY.PHz9NpwDiGOtxmM4zlFkn9ldMiwzEsC', '../assets/img/perfil/1697800785_705c52409d16402b.png'),
(2, 'kkkkk', 'kkkkk@Kkkkkk', '$2y$10$epcALFEiQ9YtqXm6WCZIVObhUjtnHiUS7WBINvBQd5Qr7gxWc3Dj6', '../assets/img/perfil/1697800840_29210229460c1176.jpeg'),
(3, 'Leila Pão Duro', 'leila@crefisa', '$2y$10$KUE512CLpqYFzIt6UvxLHOPfah5lIhWj8g04HXBqJUcZjoJN3SmDG', '../assets/img/perfil/1697800994_c71ea90065817b7b.png'),
(4, 'Roberval', 'rober@bq.com.br', '$2y$10$IYVeJkShbR8dTbQAPwrUXO1pbuMif6GZ8EV8sdKL6RrorO.UWR3lK', '../assets/img/perfil/1697801798_1eff3db4de442b73.jpg');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usu_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usu_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
