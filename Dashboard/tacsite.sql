-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 14, 2024 at 08:56 AM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tacsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

DROP TABLE IF EXISTS `adm`;
CREATE TABLE IF NOT EXISTS `adm` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_usuario` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `senha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto_perfil` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id`, `nome_usuario`, `email`, `senha`, `foto_perfil`) VALUES
(1, 'Alex Arcanjo', 'alexarcanjo515@gmail.com', '$2y$10$InTFdDWIT2jBneddGBuI5utwUZAUae1XeJNXeIKDJBM3njn/uZZ9y', 'uploads/IMG_20240805_112927.jpg'),
(2, 'Tac', 'alexarcanjo515@gmail.com', '$2y$10$5rOQJkCk5TI0I9QdV/Fy0Ob3ziqvl3sPcG2q6DfPKEpFip09lKpP2', 'uploads/IMG_20240805_112927.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `aplicacoesesistemas`
--

DROP TABLE IF EXISTS `aplicacoesesistemas`;
CREATE TABLE IF NOT EXISTS `aplicacoesesistemas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `solucoes_personalizadas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `integracao_sistemas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seguranca_confiabilidade` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `automatizacao_processos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `suporte_tecnico` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inovacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aplicacoesesistemas`
--

INSERT INTO `aplicacoesesistemas` (`id`, `solucoes_personalizadas`, `integracao_sistemas`, `seguranca_confiabilidade`, `automatizacao_processos`, `suporte_tecnico`, `inovacao`, `data_criacao`) VALUES
(1, 'Na TAC, sabemos que cada empresa é única. Nossas soluções de desenvolvimento de aplicações são personalizadas para atender às necessidades específicas de cada cliente. Desde sistemas internos de gestão até plataformas voltadas ao consumidor final, desenvolvemos aplicativos escaláveis que crescem junto com o seu negócio. Isso significa que, à medida que sua empresa expande, suas soluções de TI acompanham o ritmo, sem a necessidade de constantes reconfigurações ou substituições.\r\n                        ', 'Em muitas empresas, o maior desafio é fazer com que diferentes sistemas de software \"conversem\" entre si. A TAC oferece serviços especializados de integração de sistemas, conectando todas as suas ferramentas e plataformas em um ecossistema unificado. Isso melhora a produtividade e elimina retrabalhos, pois informações cruciais fluem automaticamente entre departamentos e sistemas, reduzindo falhas e economizando tempo.\r\n                        ', 'Quando se trata de desenvolvimento de sistemas, segurança não é apenas uma vantagem — é uma exigência. Com o aumento das ameaças cibernéticas, a TAC assegura que cada aplicação desenvolvida siga os mais rigorosos padrões de segurança, com proteção contra vulnerabilidades e monitoramento constante para identificar qualquer ameaça em tempo real. Seus dados estarão sempre protegidos, garantindo a confiança de seus clientes e parceiros.\r\n                        ', 'Automatizar processos é essencial para reduzir custos operacionais e minimizar erros humanos. Com as soluções da TAC, automatizamos fluxos de trabalho críticos, permitindo que sua equipe se concentre em tarefas estratégicas, enquanto sistemas automáticos cuidam das operações repetitivas. Isso não só melhora a eficiência, mas também promove maior precisão nas operações diárias.\r\n                        ', 'Entendemos que a implementação de novos sistemas pode trazer dúvidas e desafios. Por isso, a TAC oferece um suporte técnico contínuo, garantindo que seus sistemas estejam sempre operando em plena capacidade. Nossa equipe de especialistas está disponível para realizar ajustes e melhorias conforme necessário, acompanhando de perto as necessidades do seu negócio.\r\n                        ', 'Em um mercado cada vez mais competitivo, inovar é vital. Ao contar com as soluções de Aplicações & Sistemas da TAC, sua empresa estará sempre na vanguarda tecnológica, com acesso a tecnologias de ponta, metodologias ágeis e as melhores práticas do setor. Nossa missão é transformar suas ideias em realidade, impulsionando seu negócio para novos patamares.\r\n                        ', '2024-09-26 09:26:52');

-- --------------------------------------------------------

--
-- Table structure for table `ataques_cibernetico`
--

DROP TABLE IF EXISTS `ataques_cibernetico`;
CREATE TABLE IF NOT EXISTS `ataques_cibernetico` (
  `id` int NOT NULL AUTO_INCREMENT,
  `monitoramento_proativo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `resposta_incidentes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `defesa_camadas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `treinamento_funcionarios` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `auditorias_conformidade` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

DROP TABLE IF EXISTS `background`;
CREATE TABLE IF NOT EXISTS `background` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f531ec24a0a_pexels-carlos-cesar-1203812-2767923.jpg', '2024-09-26 10:05:32'),
(2, 'uploads/66f531ec259b6_pxfuel.jpg', '2024-09-26 10:05:32');

-- --------------------------------------------------------

--
-- Table structure for table `cliques`
--

DROP TABLE IF EXISTS `cliques`;
CREATE TABLE IF NOT EXISTS `cliques` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total_cliques` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `data_hora` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cliques`
--

INSERT INTO `cliques` (`id`, `total_cliques`, `created_at`, `data_hora`) VALUES
(1, 95, '2024-10-29 15:14:42', '2024-11-13 16:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `datacenter`
--

DROP TABLE IF EXISTS `datacenter`;
CREATE TABLE IF NOT EXISTS `datacenter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infrastructure` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `security` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `reliability` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `cost_reduction` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `support` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `compliance` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `innovation` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `datacenter`
--

INSERT INTO `datacenter` (`id`, `infrastructure`, `security`, `reliability`, `cost_reduction`, `support`, `compliance`, `innovation`) VALUES
(1, 'Com os serviços de datacenter da TAC, sua empresa se beneficia de uma infraestrutura tecnológica avançada. Nossos datacenters são projetados para suportar uma grande quantidade de dados e tráfego, oferecendo uma base sólida para o crescimento. Se sua empresa precisa expandir sua capacidade de armazenamento ou aumentar o processamento de dados, nossa infraestrutura escalável permite que você faça isso sem a necessidade de investir em hardware adicional.\r\n                ', 'A segurança é uma prioridade máxima para qualquer empresa, e nossos datacenters são equipados com tecnologia de ponta para garantir a proteção dos seus dados. Desde controles de acesso físicos rigorosos até sistemas de segurança cibernética avançados, protegemos suas informações contra ameaças internas e externas. Além disso, realizamos backups regulares e testes de recuperação para garantir que seus dados estejam sempre seguros e disponíveis.\r\n                ', 'Os serviços de datacenter da TAC são projetados para garantir a máxima disponibilidade e uptime. Nossos datacenters utilizam sistemas de energia redundante, resfriamento avançado e monitoramento contínuo para minimizar qualquer risco de interrupção. Com nossa infraestrutura robusta, você pode confiar que suas operações continuarão funcionando sem problemas, mesmo em situações imprevistas.\r\n                ', 'Investir em infraestrutura de TI interna pode ser caro e oneroso. Utilizando nossos serviços de datacenter, você reduz os custos associados à compra e manutenção de hardware, energia e espaço físico. Nossos serviços são projetados para serem custo-efetivos, permitindo que você concentre seus recursos em áreas mais estratégicas do seu negócio.\r\n                ', 'Na TAC, entendemos que cada empresa tem necessidades únicas. É por isso que oferecemos suporte especializado e atendimento personalizado para garantir que nossos serviços atendam às suas expectativas. Nossa equipe de especialistas está disponível para fornecer assistência contínua e garantir que suas operações sejam sempre otimizadas.\r\n                ', 'Com o aumento das regulamentações e normas de conformidade, é fundamental garantir que seus serviços de TI estejam em conformidade com as melhores práticas e padrões da indústria. Nossos datacenters são certificados e atendem a rigorosos padrões de conformidade, garantindo que sua empresa esteja sempre alinhada com as exigências legais e regulatórias.\r\n                ', 'Ao terceirizar seus serviços de datacenter para a TAC, você libera sua equipe interna para se concentrar na inovação e no desenvolvimento de novos produtos e serviços. Isso não só aumenta a eficiência operacional, mas também permite que sua empresa se mantenha competitiva e relevante no mercado.\r\n                ');

-- --------------------------------------------------------

--
-- Table structure for table `imgaplicacao`
--

DROP TABLE IF EXISTS `imgaplicacao`;
CREATE TABLE IF NOT EXISTS `imgaplicacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgaplicacao`
--

INSERT INTO `imgaplicacao` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f540cb43930_i8yRO0Pd_4x.jpg', '2024-09-26 11:08:59'),
(2, 'uploads/66f540cb473c1_Picture5.png', '2024-09-26 11:08:59'),
(3, 'uploads/66f540e72e728_i8yRO0Pd_4x.jpg', '2024-09-26 11:09:27'),
(4, 'uploads/66f540e732020_Picture4.png', '2024-09-26 11:09:27');

-- --------------------------------------------------------

--
-- Table structure for table `imgdatacenter`
--

DROP TABLE IF EXISTS `imgdatacenter`;
CREATE TABLE IF NOT EXISTS `imgdatacenter` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgdatacenter`
--

INSERT INTO `imgdatacenter` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f536f34ddd4_pxfuel (2).jpg', '2024-09-26 10:26:59'),
(2, 'uploads/66f536f34ef6e_pxfuel (1).jpg', '2024-09-26 10:26:59'),
(3, 'uploads/66f540a6d8835_Picture3.png', '2024-09-26 11:08:22'),
(4, 'uploads/66f540a6dbc05_Picture4.png', '2024-09-26 11:08:22');

-- --------------------------------------------------------

--
-- Table structure for table `imgprojecto`
--

DROP TABLE IF EXISTS `imgprojecto`;
CREATE TABLE IF NOT EXISTS `imgprojecto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `subtitulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgprojecto`
--

INSERT INTO `imgprojecto` (`id`, `titulo`, `subtitulo`, `imagem`, `created_at`) VALUES
(1, 'Proteção de dados', 'FIREWALL', 'uploads/i8yRO0Pd_4x.jpg', '2024-09-26 11:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `imgredes`
--

DROP TABLE IF EXISTS `imgredes`;
CREATE TABLE IF NOT EXISTS `imgredes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgredes`
--

INSERT INTO `imgredes` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f540888e4a8_Picture3.png', '2024-09-26 11:07:52'),
(2, 'uploads/66f54088903ab_Picture4.png', '2024-09-26 11:07:52');

-- --------------------------------------------------------

--
-- Table structure for table `imgsobre`
--

DROP TABLE IF EXISTS `imgsobre`;
CREATE TABLE IF NOT EXISTS `imgsobre` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgsobre`
--

INSERT INTO `imgsobre` (`id`, `imagem`, `created_at`) VALUES
(1, 'uploads/66f53beb6fd1f_i8yRO0Pd_4x.jpg', '2024-09-26 10:48:11'),
(2, 'uploads/66f53beb73602_i8yRO0Pd_4x.jpg', '2024-09-26 10:48:11');

-- --------------------------------------------------------

--
-- Table structure for table `imgsocnoc`
--

DROP TABLE IF EXISTS `imgsocnoc`;
CREATE TABLE IF NOT EXISTS `imgsocnoc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgsocnoc`
--

INSERT INTO `imgsocnoc` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f54103a01c5_Picture3.png', '2024-09-26 11:09:55'),
(2, 'uploads/66f54103a1db4_Picture4.png', '2024-09-26 11:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `imgsustentabilidade`
--

DROP TABLE IF EXISTS `imgsustentabilidade`;
CREATE TABLE IF NOT EXISTS `imgsustentabilidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgsustentabilidade`
--

INSERT INTO `imgsustentabilidade` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f5412423e9c_i8yRO0Pd_4x.jpg', '2024-09-26 11:10:28'),
(2, 'uploads/66f54124265df_Picture3.png', '2024-09-26 11:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `imgxaas`
--

DROP TABLE IF EXISTS `imgxaas`;
CREATE TABLE IF NOT EXISTS `imgxaas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `imgxaas`
--

INSERT INTO `imgxaas` (`id`, `imagem`, `data_envio`) VALUES
(1, 'uploads/66f541133b5fa_i8yRO0Pd_4x.jpg', '2024-09-26 11:10:11'),
(2, 'uploads/66f541133d2cb_i8yRO0Pd_4x.jpg', '2024-09-26 11:10:11');

-- --------------------------------------------------------

--
-- Table structure for table `mensagem`
--

DROP TABLE IF EXISTS `mensagem`;
CREATE TABLE IF NOT EXISTS `mensagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `telefone_cliente` int DEFAULT NULL,
  `projeto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mensagem` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `data_envio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lida` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensagem`
--

INSERT INTO `mensagem` (`id`, `nome`, `email`, `telefone_cliente`, `projeto`, `mensagem`, `data_envio`, `lida`) VALUES
(1, 'Alex Arcanjo', 'alexarcanjo@gmail.com', 939238182, 'Montagem de câmeradddd', 'rtghrthtrgyh', '2024-09-25 15:53:41', 1),
(2, 'Ladislau', 'ladislao@gmail.com', 939238182, 'Montagem de câmera', 'hyqwsjgdhywkjsgdhcsajhxcj,gshxgvcjhdsgj,cyhsvgdjhcvgsjhdcvgkjchkjv', '2024-10-04 15:06:03', 1),
(3, 'wed', 'alex@gmail.com', 123456789, 'bom', 'smlkdflkjlksdjkd', '2024-11-12 19:01:43', 1),
(4, 'João', 'joa@gmail.com', 12333333, 'erver', 'Logi', '2024-11-12 19:08:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
CREATE TABLE IF NOT EXISTS `perfil` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_empresa` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telefone` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `endereco` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sobre` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `Datacriacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `missao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `estrategia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `anosexperiencia` int DEFAULT NULL,
  `totaldeclientes` int DEFAULT NULL,
  `totaldeprojectos` int DEFAULT NULL,
  `logotipo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfil`
--

INSERT INTO `perfil` (`id`, `nome_empresa`, `email`, `telefone`, `endereco`, `sobre`, `Datacriacao`, `missao`, `estrategia`, `anosexperiencia`, `totaldeclientes`, `totaldeprojectos`, `logotipo`, `created_at`) VALUES
(1, 'TACSystem', 'suporte@tac.co.ao', '+244 948-996-080', 'Talatona', 'Uma empresa de Projectos e de Integração de Soluções de Audiovisuais, Domótica, Redes integradas de voz, dados e segurança.', 'A The Audiovisual Company, S.A. é uma empresa LÍDER no mercado português na Área de  Projectos e de Integração de Soluções de Audiovisuais, Domótica, Segurança e Redes.', 'A nossa Missão é proporcionar soluções inovadoras, personalizadas e de excelência na área dos audiovisuais, comunicação e segurança dos equipamentos.', 'A TAC tem como estratégia projectar, conceber e instalar complexos sistemas que integram comunicação e/ou segurança com meios de exposição visual.', 25, 78, 160, 'uploads/background.png', '2024-09-26 09:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `redescomputacao`
--

DROP TABLE IF EXISTS `redescomputacao`;
CREATE TABLE IF NOT EXISTS `redescomputacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `solucoes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `servicos_computacao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `seguranca_cibernetica` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `redescomputacao`
--

INSERT INTO `redescomputacao` (`id`, `solucoes`, `servicos_computacao`, `seguranca_cibernetica`, `data_criacao`) VALUES
(1, 'No mundo atual, onde a conectividade é essencial para o sucesso de qualquer organização, redes sólidas e seguras desempenham um papel crucial. A TAC oferece soluções completas de infraestrutura de redes, tanto físicas quanto virtuais, garantindo que os dados fluam de maneira rápida, eficiente e segura entre os sistemas de sua empresa.\r\n\r\nDesde a instalação de redes estruturadas até a configuração de roteadores, switches e servidores, a TAC assegura que sua rede atenda às demandas de conectividade, escalabilidade e performance. A empresa também se destaca pela implementação de protocolos de segurança de redes, essenciais para proteger contra ameaças externas e garantir que dados confidenciais não sejam comprometidos.\r\n\r\nSegurança de redes vai além da proteção básica de firewall. A TAC utiliza uma combinação de firewalls avançados, VPNs seguras, segmentação de rede e sistemas de detecção de intrusões (IDS) para proteger contra ataques e garantir a integridade dos dados. Oferecemos também monitoramento constante e planos de resposta a incidentes, para que sua empresa esteja sempre preparada para lidar com qualquer ameaça à segurança digital.', 'Além de redes, a TAC oferece um amplo portfólio de serviços de computação, cobrindo desde a manutenção de hardware até o desenvolvimento de sistemas customizados. Nosso objetivo é garantir que as operações de sua empresa fluam sem interrupções, com infraestruturas de TI otimizadas e de alto desempenho.\r\n\r\nTrabalhamos com a manutenção preventiva e corretiva de computadores e servidores, garantindo que seus equipamentos estejam sempre funcionando no máximo de sua capacidade. Oferecemos também soluções de virtualização, permitindo que múltiplos sistemas operacionais rodem em um único hardware, otimizando o uso de recursos e reduzindo custos.\r\n\r\nA computação em nuvem é outra área em que a TAC se destaca, oferecendo migração de sistemas para a nuvem, hospedagem segura e gestão de dados em servidores remotos. Essa abordagem permite maior flexibilidade, escalabilidade e segurança no armazenamento e no acesso às informações da sua empresa.\r\n\r\nAlém disso, a TAC desenvolve sistemas e softwares sob medida, adaptados às necessidades específicas do seu negócio. Nossa equipe de especialistas é capaz de criar soluções que integram suas operações, otimizam processos e garantem uma gestão mais eficiente dos recursos tecnológicos.', 'A TAC oferece soluções de segurança cibernética para proteger dados sensíveis e sistemas críticos, como firewalls e backups automáticos.', '2024-09-26 09:26:31');

-- --------------------------------------------------------

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
CREATE TABLE IF NOT EXISTS `servicos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `servicos_geridos` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iaas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `iot_xaas` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vantagens_tac` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `servicos`
--

INSERT INTO `servicos` (`id`, `servicos_geridos`, `iaas`, `iot_xaas`, `vantagens_tac`) VALUES
(1, 'Manter uma infraestrutura de TI robusta e atualizada pode ser um desafio. Os Serviços Geridos da TAC garantem que sua empresa tenha à disposição uma equipe de especialistas dedicados a monitorar, gerenciar e otimizar sua infraestrutura. Com nossos serviços, você reduz custos operacionais e maximiza a eficiência, permitindo que sua equipe se concentre em atividades estratégicas.\r\n                        ', 'A Infraestrutura como Serviço (IaaS) da TAC oferece uma solução flexível e escalável, permitindo que sua empresa acesse recursos computacionais sob demanda. Com o IaaS, você pode expandir sua infraestrutura de acordo com suas necessidades, pagando apenas pelo que utiliza, sem os altos custos de manutenção de hardware.\r\n                        ', 'A TAC está na vanguarda da inovação com soluções de IoT (Internet das Coisas), conectando dispositivos inteligentes para monitorar e controlar processos em tempo real. Além disso, oferecemos a flexibilidade do XaaS (Anything as a Service), permitindo que qualquer necessidade tecnológica seja acessada como um serviço, desde plataformas IoT até soluções personalizadas sob demanda.\r\n                        ', 'Ao escolher a TAC, sua empresa se beneficia de suporte especializado, escalabilidade, inovações contínuas e soluções que reduzem custos, além de aumentar a eficiência e garantir que sua infraestrutura esteja sempre pronta para o futuro.\r\n                        ');

-- --------------------------------------------------------

--
-- Table structure for table `socnoc`
--

DROP TABLE IF EXISTS `socnoc`;
CREATE TABLE IF NOT EXISTS `socnoc` (
  `id` int NOT NULL AUTO_INCREMENT,
  `soc_protecao` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vantagens_soc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `noc_desempenho` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `vantagens_noc` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `escolher_tac` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socnoc`
--

INSERT INTO `socnoc` (`id`, `soc_protecao`, `vantagens_soc`, `noc_desempenho`, `vantagens_noc`, `escolher_tac`, `data_criacao`) VALUES
(1, 'O SOC da TAC é dedicado a proteger a infraestrutura digital da sua empresa contra ameaças cibernéticas em tempo real. Contamos com uma equipe de especialistas em segurança cibernética que monitora, detecta e responde a incidentes de segurança continuamente.\r\n                        ', '- Monitoramento Proativo 24/7: Estamos sempre atentos a qualquer sinal de vulnerabilidade ou ataque, garantindo que as ameaças sejam detectadas antes de causar danos.\r\n- Respostas Imediatas a Incidentes: Quando um problema é identificado, nossa equipe age rapidamente para conter e mitigar os riscos, minimizando o impacto sobre o seu negócio.\r\n- Análise de Dados e Inteligência de Ameaças: Utilizamos tecnologias avançadas para analisar padrões de comportamento e identificar ameaças emergentes, garantindo uma defesa preventiva e contínua.\r\n- Conformidade e Auditoria: Mantemos sua empresa em conformidade com os regulamentos de segurança mais exigentes.\r\n                        ', 'O NOC da TAC tem como objetivo monitorar e garantir o funcionamento contínuo e otimizado da sua infraestrutura de rede. Nossa equipe supervisiona sua rede 24 horas por dia, identificando e resolvendo problemas de desempenho e interrupções.\r\n                        ', '- Monitoramento Contínuo: Nossa equipe supervisiona sua rede 24/7, garantindo operação contínua.\r\n- Manutenção Preventiva: Aplicamos correções proativas para otimizar o desempenho de rede e evitar falhas inesperadas.\r\n- Gerenciamento de Infraestrutura: Monitoramos todos os componentes críticos da rede, garantindo uma operação sem interrupções.\r\n- Escalabilidade: Nossas soluções de NOC são escaláveis, acompanhando o crescimento do seu negócio.\r\n                        ', 'Com uma equipe altamente qualificada, a TAC oferece monitoramento 24/7, resposta rápida e tecnologias avançadas, garantindo segurança e performance para sua infraestrutura digital.\r\n                        ', '2024-09-26 09:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `sustentabilidade`
--

DROP TABLE IF EXISTS `sustentabilidade`;
CREATE TABLE IF NOT EXISTS `sustentabilidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `infraestruturas_eficientes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `redes_resilientes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `desenvolvimento_agil` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `automacao_ia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sustentabilidade`
--

INSERT INTO `sustentabilidade` (`id`, `infraestruturas_eficientes`, `redes_resilientes`, `desenvolvimento_agil`, `automacao_ia`) VALUES
(1, 'A TAC desenvolve infraestruturas que não apenas suportam as operações atuais, mas também se adaptam ao crescimento futuro. Com soluções em IaaS (Infrastructure as a Service), oferecemos ambientes flexíveis que permitem às empresas escalar recursos conforme necessário.\r\n                        ', 'Nossas soluções de rede garantem conectividade contínua, com monitoramento 24/7 e capacidade de resposta a incidentes em tempo real, melhorando a performance e reduzindo o risco de interrupções que podem impactar os negócios.\r\n                        ', 'Utilizamos metodologias ágeis que permitem desenvolver soluções personalizadas rapidamente, adaptando-nos às necessidades específicas de cada cliente, resultando em aplicativos e sistemas que superam expectativas.\r\n                        ', 'Incorporamos automação e inteligência artificial para melhorar a tomada de decisões com insights baseados em dados, promovendo operações mais inteligentes e ágeis que liberam as equipes para se concentrarem em atividades estratégicas.\r\n                        '),
(2, 'A TAC desenvolve infraestruturas que não apenas suportam as operações atuais, mas também se adaptam ao crescimento futuro. Com soluções em IaaS (Infrastructure as a Service), oferecemos ambientes flexíveis que permitem às empresas escalar recursos conforme necessário.\r\n                        ', 'Nossas soluções de rede garantem conectividade contínua, com monitoramento 24/7 e capacidade de resposta a incidentes em tempo real, melhorando a performance e reduzindo o risco de interrupções que podem impactar os negócios.\r\n                        ', 'Utilizamos metodologias ágeis que permitem desenvolver soluções personalizadas rapidamente, adaptando-nos às necessidades específicas de cada cliente, resultando em aplicativos e sistemas que superam expectativas.\r\n                        ', 'Incorporamos automação e inteligência artificial para melhorar a tomada de decisões com insights baseados em dados, promovendo operações mais inteligentes e ágeis que liberam as equipes para se concentrarem em atividades estratégicas.\r\n                        ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
