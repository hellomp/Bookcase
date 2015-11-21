-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 21-Nov-2015 às 12:51
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bookbox`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE IF NOT EXISTS `livro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `sinopse` text NOT NULL,
  `editora` varchar(25) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_subcategoria` int(11) NOT NULL,
  `pagina` smallint(6) NOT NULL,
  `capa` varchar(64) NOT NULL,
  `data_registro` datetime NOT NULL,
  `data_lancamento` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`titulo`, `autor`, `sinopse`, `editora`, `id_categoria`, `id_subcategoria`, `pagina`, `capa`, `data_registro`, `data_lancamento`) VALUES
('O Código Da Vinci', 'Dan Brown', 'Um assassinato dentro do Museu do Louvre, em Paris, traz à tona uma sinistra conspiração para revelar um segredo que foi protegido por uma sociedade secreta desde os tempos de Jesus Cristo. A vítima é o respeitado curador do museu, Jacques Saunière, um dos líderes dessa antiga fraternidade, o Priorado de Sião, que já teve como membros Leonardo da Vinci, Victor Hugo e Isaac Newton. Momentos antes de morrer, Saunière consegue deixar uma mensagem cifrada na cena do crime que apenas sua neta, a criptógrafa francesa Sophie Neveu, e Robert Langdon, um famoso simbologista de Harvard, podem desvendar. Os dois transformam-se em suspeitos e em detetives enquanto percorrem as ruas de Paris e de Londres tentando decifrar um intricado quebra-cabeças que pode lhes revelar um segredo milenar que envolve a Igreja Católica.\r\nApenas alguns passos à frente das autoridades e do perigoso assassino, Sophie e Robert vão à procura de pistas ocultas nas obras de Da Vinci e se debruçam sobre alguns dos maiores mistérios da cultura ocidental - da natureza do sorriso da Mona Lisa ao significado do Santo Graal. Mesclando com perfeição os ingredientes de uma envolvente história de suspense com informações sobre obras de arte, documentos e rituais secretos, Dan Brown consagrou-se como um dos autores mais brilhantes da atualidade. O Código Da Vinci prende o leitor da primeira à última página.', 'Arqueiro', 1, 2, 540, 'capas/DaVinciCode.jpg', '2015-11-01 06:16:00', '0000-00-00'),
('O Senhor dos Anéis', 'J.R.R.Tolkien', 'NNNNN', 'Martins Fontes', 1, 2, 1000, 'capas/livro.jpg', '2015-11-02 07:18:10', '0000-00-00'),
('Perdido em Marte', 'Andy Weir', 'Há seis dias, o astronauta Mark Watney se tornou a décima sétima pessoa a pisar em Marte. E, provavelmente, será a primeira a morrer no planeta vermelho.\r\nDepois de uma forte tempestade de areia, a missão Ares 3 é abortada e a tripulação vai embora, certa de que Mark morreu em um terrível acidente. \r\nAo despertar, ele se vê completamente sozinho, ferido e sem ter como avisar às pessoas na Terra que está vivo. E, mesmo que conseguisse se comunicar, seus mantimentos terminariam anos antes da chegada de um possível resgate.\r\nAinda assim, Mark não está disposto a desistir. Munido de nada além de curiosidade e de suas habilidades de engenheiro e botânico – e um senso de humor inabalável –, ele embarca numa luta obstinada pela sobrevivência.\r\nPara isso, será o primeiro homem a plantar batatas em Marte e, usando uma genial mistura de cálculos e fita adesiva, vai elaborar um plano para entrar em contato com a Nasa e, quem sabe, sair vivo de lá.\r\nCom um forte embasamento científico real e moderno, Perdido em Marte é um suspense memorável e divertido, impulsionado por uma trama que não para de surpreender o leitor.', 'Arqueiro', 6, 71, 336, 'capas/the-martian.jpg', '2015-11-20 22:56:40', '2014-10-17');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
