-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04-Dez-2023 às 12:44
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `teste`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tutorial`
--

CREATE TABLE `tutorial` (
  `idtutorial` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `texto` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tutorial`
--

INSERT INTO `tutorial` (`idtutorial`, `titulo`, `texto`) VALUES
(3, 'Como faz para diminuir o brilho do celular', 'Olá pessoal, hoje vou falar pra vocês como faz para diminuir o brilho do celular, basta puxar do topo até o fim do seu celular, assim vocês irão achar uma barra no topo da tela, se vocês arrastarem para a esquerda, o brilho diminui, se vocês puxarem pra direita, o brilho aumenta.'),
(6, 'Como logar a sua intenet com o celular', 'Boa tarde meu povo, hoje vou ensinar vocês a logar a sua intenet com o celular de vocês, basta puxar do topo até o fim do seu celular e você encontrará um ícone de Wi-Fi no topo da tela, ai é só você colocar o nome e a senha da rede, e pronto, seu Wi-Fi estará funcionando.'),
(8, 'Como trocar a senha do celular', 'Para trocar a senha do seu celular, basta acessar as configurações do seu celular e pesquisar por segurança.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(80) NOT NULL,
  `foto` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nome`, `sobrenome`, `foto`, `email`, `senha`, `tipo`) VALUES
(1, 'Pedro', 'Domingos', 'pedro.jpg', 'pedro@gmail', 'c6cc8094c2dc07b700ffcc36d64e2138', 'ADM'),
(2, 'Lucas ', 'Andriotti', 'lucas.jpg', 'lucas@gmail.com', '1308dfed71297a652cc42a390e211489', 'ADM'),
(3, 'Maria', 'Silva', 'profile.png', 'maria@gmail.com', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(4, 'bruno', 'rodrigues', '', 'bruno.aprodrigues76@fatev.sp.gov.br', '202cb962ac59075b964b07152d234b70', 'Cliente'),
(7, 'derek', 'nunes', 'profile.png', 'derek@nunes.com', '202cb962ac59075b964b07152d234b70', 'Cliente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `videos`
--

CREATE TABLE `videos` (
  `idvideo` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `video` varchar(80) NOT NULL,
  `descricao` varchar(10000) NOT NULL,
  `capa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `videos`
--

INSERT INTO `videos` (`idvideo`, `titulo`, `video`, `descricao`, `capa`) VALUES
(1, 'Como Criar Uma Conta na Shopee', '', 'Como Criar Uma Conta na Shopee', 'shopee.png'),
(2, 'Como Baixar o WhatsApp', '', 'Acesse a loja de aplicativos do seu dispositivo:\r\n\r\nSe estiver usando um dispositivo Android, abra a \"Google Play Store\".\r\nSe estiver usando um dispositivo iOS (iPhone), abra a \"App Store\".\r\nPesquise pelo WhatsApp:\r\n\r\nNa barra de pesquisa da loja de aplicativos, digite \"WhatsApp\" e pressione \"Buscar\" ou \"Procurar\".\r\nSelecione o WhatsApp Messenger:\r\n\r\nO aplicativo oficial do WhatsApp Messenger deve aparecer nos resultados da pesquisa. Toque nele para abrir a página do aplicativo.\r\nToque em \"Baixar\" ou \"Instalar\":\r\n\r\nNa página do WhatsApp, você verá um botão que geralmente diz \"Baixar\" para Android ou \"Instalar\" para iOS. Toque nesse botão.\r\nAguarde o download e instalação:\r\n\r\nO dispositivo começará a baixar o WhatsApp e, em seguida, instalá-lo automaticamente. Aguarde até que o processo seja concluído.\r\nAbra o WhatsApp:\r\n\r\nApós a instalação, você pode abrir o WhatsApp a partir da tela inicial do seu dispositivo ou do menu de aplicativos.\r\nConfiguração inicial:\r\n\r\nAo abrir o WhatsApp pela primeira vez, siga as instruções na tela para configurar sua conta. Isso geralmente envolve verificar seu número de telefone.\r\nPronto para usar:\r\n\r\nDepois de concluir a configuração, você estará pronto para usar o WhatsApp. Adicione seus contatos e comece a enviar mensagens, fotos e vídeos.', 'what.png'),
(3, 'Como Fazer uma video chamda com o Google Meet', '', '', 'meet.png'),
(6, 'Como abrir as configurações do celular', 'videoplayback.mp4', 'Como abrir as configurações do celular', 'exem.jpeg'),
(7, 'Como entrar num site passo a passo', 'google.mp4', 'Como entrar num site passo a passo', 'WhatsApp Image 2023-12-03 at 13.24.37.jpeg');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`idtutorial`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices para tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`idvideo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `idtutorial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `idvideo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
