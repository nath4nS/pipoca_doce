-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: pipoca
-- ------------------------------------------------------
-- Server version	8.0.19

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `avaliacao`
--

DROP TABLE IF EXISTS `avaliacao`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `avaliacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `avaliacao` int NOT NULL,
  `data_avaliacao` datetime NOT NULL,
  `usuario_id` int NOT NULL,
  `filme_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_avaliacao_usuario_idx` (`usuario_id`),
  KEY `fk_avaliacao_filme_idx` (`filme_id`),
  CONSTRAINT `fk_avaliacao_filme` FOREIGN KEY (`filme_id`) REFERENCES `filme` (`id`),
  CONSTRAINT `fk_avaliacao_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avaliacao`
--

LOCK TABLES `avaliacao` WRITE;
/*!40000 ALTER TABLE `avaliacao` DISABLE KEYS */;
INSERT INTO `avaliacao` VALUES (1,2,'2020-04-21 12:30:00',1,1),(2,3,'2020-04-21 13:30:00',1,3);
/*!40000 ALTER TABLE `avaliacao` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comentario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `data_comentario` datetime NOT NULL,
  `usuario_id` int NOT NULL,
  `filme_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comentario_usuario_idx` (`usuario_id`),
  KEY `fk_comentario_filme_idx` (`filme_id`),
  CONSTRAINT `fk_comentario_filme` FOREIGN KEY (`filme_id`) REFERENCES `filme` (`id`),
  CONSTRAINT `fk_comentario_usuario` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,'Ótimo filme!','2020-04-21 12:30:00',1,1),(10,'Não teve drama e suspense nenhum','2020-05-13 09:15:36',2,14),(11,'Deixou um suspense','2020-06-14 00:41:57',2,10),(12,'Esperando ansiosamente','2020-06-09 17:59:12',3,12),(13,'Amei o filme, do começo ao fim. Há alguns clichês, mas isso não estraga a beleza das personagens principais. Filme tocante e que vale a pena assistir, sim. Recomendo','2020-05-06 19:21:04',4,23);
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diretor`
--

DROP TABLE IF EXISTS `diretor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `diretor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diretor`
--

LOCK TABLES `diretor` WRITE;
/*!40000 ALTER TABLE `diretor` DISABLE KEYS */;
INSERT INTO `diretor` VALUES (1,'Anthony Russo'),(2,'Joe Russo'),(3,'Niki Caro'),(4,'Justin Lin'),(5,'Jeff Fowler'),(6,'Cate Shortland'),(7,'Bilall Fallah'),(8,'Adil El Arbi'),(9,'Cathy Yan'),(10,'Todd Phillips'),(11,'Bong Joon-ho'),(12,'Barbara Białowąs'),(13,'Michael Showalter'),(14,'Patty Jenkins'),(15,'Olivier Megaton'),(16,'Leigh Whannell'),(17,'John Krasinski'),(18,'Spike Lee'),(19,'Matthew Vaughn'),(20,'Walt Dohrn'),(21,'Christopher Nolan'),(22,'Tim Miller'),(23,'James Mangold'),(24,'Mehmet Ada Öztekin'),(25,'Tim Burton'),(26,'Alice Wu'),(27,'Jeferson De'),(29,'Dean Wellins'),(30,'Paul Briggs'),(31,'Joseph Kosinski'),(32,'Michael Chaves'),(33,'Tim Hill'),(34,'James Cameron'),(35,'Cary Fukunaga'),(36,'Mauro Lima'),(37,'Steven Spielberg'),(38,'Daniel Espinosa'),(39,'Robert Rodriguez'),(40,'Ron Howard'),(41,'David Yates'),(42,'Ethan Spaulding'),(43,'James Cameron'),(44,'Ang Lee'),(45,'Christopher Nolan'),(46,'Christian Rivers'),(47,'David S. F. Wilson'),(48,'Christina Sotta'),(49,'Matt Peters'),(50,'Peter Berg'),(51,'Stephen Gaghan'),(52,'Ozan Açıktan'),(53,'Sam Liu'),(54,'Dan Scanlon'),(55,'Ivan Silvestrini'),(56,'Sam Hargrave'),(57,'Luis Alfaro'),(58,'Pablo Lejarreta'),(59,'Fajar Bustomi'),(60,'Pidi Baiq'),(62,'Junichi Sato'),(63,'Dee Rees'),(64,'Michael Dowse'),(65,'Oz Perkins'),(66,'Kaare Andrews'),(67,'Chris Sanders'),(68,'Benh Zeitlin'),(69,'Ravi Shankar V.'),(70,'Ravishanakar Venkateswaren'),(71,'Allan Hardy'),(72,'Ted Kotcheff'),(73,'George P. Cosmatos'),(74,'Peter MacDonald');
/*!40000 ALTER TABLE `diretor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme`
--

DROP TABLE IF EXISTS `filme`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filme` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `duracao` varchar(20) NOT NULL,
  `dataLancamento` varchar(50) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `sinopse` text NOT NULL,
  `elenco` varchar(100) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome_UNIQUE` (`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme`
--

LOCK TABLES `filme` WRITE;
/*!40000 ALTER TABLE `filme` DISABLE KEYS */;
INSERT INTO `filme` VALUES (1,'Vingadores: Ultimato','3h 2m','25 de abril de 2019 ','https://www.youtube-nocookie.com/embed/g6ng8iy-l0U?controls=0','Lançado','Após Thanos eliminar metade das criaturas vivas, os Vingadores têm de lidar com a perda de amigos e entes queridos. Com Tony Stark vagando perdido no espaço sem água e comida, Steve Rogers e Natasha Romanov lideram a resistência contra o titã louco.','Robert Downey Jr., Chris Evans, Mark Ruffalo','vigadores-20200619000638-20200626000654.jpg'),(2,'Mulan','1h 55m','23 de julho de 2020 ','https://www.youtube-nocookie.com/embed/LBRJhII2wu8?controls=0','Em Breve','Em Mulan, Hua Mulan (Liu Yifei) é a espirituosa e determinada filha mais velha de um honrado guerreiro. Quando o Imperador da China emite um decreto que um homem de cada família deve servir no exército imperial, Mulan decide tomar o lugar de seu pai, que está doente. Assumindo a identidade de Hua Jun, ela se disfarça de homem para combater os invasores que estão atacando sua nação, provando-se uma grande guerreira.','Yifei Liu, Donnie Yen, Jason Scott Lee','0409486-20200606010614-20200626000654.jpg'),(3,'Velozes e Furiosos 9','2h 15m','20 de maio de 2020','https://www.youtube-nocookie.com/embed/NnDGWyfP7q4?controls=0','Lançado','Nono filme da série Velozes & Furiosos, e segundo da nova trilogia (Velozes 8, 9 e 10), que não conta mais com a presença de Paul Walker, falecido em 2013. O longa vem dando continuidade às corridas eletrizantes da equipe de amigos liderada por Dominic Toretto (Vin Diesel). ','Vin Diesel, Michelle Rodriguez, Jordana Brewster','images-20200619010605.jpg'),(4,'Sonic: O Filme','1h 40m','13 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/zQEjE_M2Esw?controls=0','Lançado','Sonic, o porco-espinho azul mais famoso do mundo, se junta com os seus amigos para derrotar o terrível Doutor Eggman, um cientista louco que planeja dominar o mundo, e o Doutor Robotnik, responsável por aprisionar animais inocentes em robôs.','Jim Carrey, James Marsden, Tika Sumpter','0121118-20200605210647-20200619010608-20200626000656.jpg'),(5,'Viúva Negra','2h','29 de outubro de 2020','https://www.youtube-nocookie.com/embed/Lk7LPTq0_XY?controls=0','Em Breve','Em Viúva Negra, após seu nascimento, Natasha Romanoff (Scarlett Johansson) é dada à KGB, que a prepara para se tornar sua agente definitiva. Quando a URSS rompe, o governo tenta matá-la enquanto a ação se move para a atual Nova York, onde ela trabalha como freelancer. ','Scarlett Johansson, Florence Pugh, David Harbour','images (1)-20200619010616-20200626000657.jpg'),(6,'Bad Boys para Sempre','2h 4m','30 de janeiro de 2020','https://www.youtube-nocookie.com/embed/jCCGGYvFjlw?controls=0','Lançado','Os policiais Mike Lowery e Marcus Burnett se juntam para derrubar o líder de um cartel de drogas em Miami. A recém-criada equipe de elite do departamento de polícia de Miami, ao lado de Mike e Marcus, enfrenta o implacável Armando Armas.','Will Smith, Martin Lawrence, Vanessa Hudgens','bbps_640x940-data-20200606010612-20200619010627-20200626000657.jpg'),(7,'Aves de Rapina','1h 49m','6 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/XS0mcsu8G3I?controls=0','Lançado','Arlequina narra os eventos de sua vida: algum tempo após a derrota da Magia, o Coringa termina com Arlequina, jogando-a nas ruas de Gotham City. Ela é acolhida por Doc, o idoso dono de um restaurante chinês.','Margot Robbie, Mary Elizabeth, Winstead Jurnee, Smollett Bell','5316438-20200619010651-20200626000658.jpg'),(8,'Coringa','2h 2m','3 de outubro de 2019','https://www.youtube-nocookie.com/embed/621pfj0EfIc?controls=0','Lançado','Isolado, intimidado e desconsiderado pela sociedade, o fracassado comediante Arthur Fleck inicia seu caminho como uma mente criminosa após assassinar três homens em pleno metrô. Sua ação inicia um movimento popular contra a elite de Gotham City, da qual Thomas Wayne é seu maior representante.','Joaquin Phoenix, Robert De Niro, Zazie Beetz','images (2)-20200619010654-20200626000658.jpg'),(9,'Parasita','2h 12m','7 de novembro de 2019','https://www.youtube-nocookie.com/embed/yCJPhuwGnws?controls=0','Lançado','Em Parasita, toda a família de Ki-taek está desempregada, vivendo num porão sujo e apertado. Uma obra do acaso faz com que o filho adolescente da família comece a dar aulas de inglês à garota de uma família rica. Fascinados com a vida luxuosa destas pessoas, pai, mãe, filho e filha bolam um plano para se infiltrarem também na família burguesa, um a um. No entanto, os segredos e mentiras necessários à ascensão social custarão caro a todos.','Song Kang-Ho, Woo-sik Choi, Park So-Dam','parasita-20200626000659.jpg'),(10,'365 DNI','1h 54m','7 de fevereiro de 2020 ','https://www.youtube-nocookie.com/embed/gg72UGQ3iGg?controls=0','Lançado','Em 365 Dias (365 DNI, no original), Laura Biel é uma diretora de vendas que tem sua vida virada do avesso quando, em uma viagem a Sicília, Massimo Torricelli, um membro da família da máfia siciliana, a sequestra lhe dando 365 dias para se apaixonar por ele.','Michele Morrone, Anna-Maria Sieklucka, Grazyna Szapolowska','365-20200626000659.jpg'),(11,'Um Crime para Dois','1h 26m','24 de abril de 2020','https://www.youtube-nocookie.com/embed/msvHbCb1cB4?controls=0','Lançado','Em Um Crime para Dois, um casal (Issa Rae e Kumail Nanjiani) está passando por uma crise em seu relacionamento. Quando eles se veem de repente envolvidos em um misterioso assassinato, eles precisam tentar resolver o crime para limpar seus nomes enquanto tentam salvar a relação.','Kumail Nanjiani, Issa Rae, Moses Storm','lovebirds-20200626010600.jpg'),(12,'Mulher-Maravilha 1984','-','13 de agosto de 2020','https://www.youtube-nocookie.com/embed/sfM7_JLk-84?controls=0','Em Breve','A sinopse de Mulher-Maravilha 1984 não foi revelada, então é difícil saber o que esperar em termos de trama. O que foi revelado, no entanto, é que ele será ambientado nos anos 1980 porque a diretora Patty Jenkins quis que o filme se passasse no auge da década. \"Foi pouco antes do mercado ficar com as dificuldades do restante da década. Foi o topo do topo\". ',' Gal Gadot, Chris Pine, Kristen Wiig','MM84-20200626010601.jpg'),(13,'The Last Days of American Crime','2h 29m','5 de junho de 2020','https://www.youtube-nocookie.com/embed/gdWxGwiuhnU?controls=0','Lançado','Um ladrão de bancos participa de um plano para cometer um último grande assalto antes do governo ativar um sinal mental que acabará com todas as atividades criminosas.\r\n','Edgar Ramírez,Michael Pitt,Anna Brewster','The Last Days of American Crime-20200626010602.jpg'),(14,'O Homem Invisível','2h 05m','27 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/Sb-_wbXSuK4?controls=0','Lançado','Depois de forjar o próprio suicídio, um cientista enlouquecido usa seu poder para se tornar invisível e aterrorizar sua ex-namorada. Quando a polícia se recusa a acreditar em sua história, ela decide resolver o assunto por conta própria.','Elisabeth Moss, Oliver Jackson-Cohen, Harriet Dyer','O Homem Inv-20200626010603.jpg'),(15,'Um Lugar Silencioso - Parte II','1h 40m','3 de setembro de 2020','https://www.youtube-nocookie.com/embed/XEMwSdne6UE?controls=0','Em Breve','A família Abbott precisa enfrentar os terrores do mundo exterior enquanto luta pela sobrevivência em silêncio. Forçados a se aventurar no desconhecido, eles percebem que as criaturas que caçam pelo som não são as únicas ameaças no caminho da areia.','Emily Blunt, Cillian Murphy, Millicent Simmonds, Noah Jupe, Djimon Hounsou, John Krasinski','Um Lugar Silencioso - Parte II-20200626010603.jpg'),(16,'Destacamento Blood','2h 35m','12 de junho de 2020','https://www.youtube-nocookie.com/embed/03aoq9yzI9c?controls=0','Lançado','Spike Lee conta a história de quatro veteranos de guerra afro-americanos que voltam ao Vietnã à procura dos restos mortais de seu comandante e de um tesouro enterrado.','Delroy Lindo, Jonathan Majors, Clarke Peters','da 5 bloods-20200626010604.jpg'),(17,'King’s Man: A Origem','-','17 de setembro de 2020','https://www.youtube-nocookie.com/embed/gdt9-ZPk1dk?controls=0','Em Breve','Um grupo formado pelos tiranos e criminosos mais cruéis de todos os tempos arma um plano que ameaça a vida de milhões de inocentes. Agora um homem precisa correr contra o tempo para salvar a vida de todos.','Taron Egerton, Colin Firth','kings_man-20200626010607.jpg'),(18,'Trolls 2','1h 31m','8 de outubro de 2020','https://www.youtube-nocookie.com/embed/V-l30ZS0sFA?controls=0','Em Breve','A rainha Poppy (Anna Kendrick) e Branch (Justin Timberlake) descobrem que há outros mundos Troll além do seu, e suas diferenças criam grandes confrontos entre essas diversas tribos. No entanto, uma ameaça misteriosa faz com que eles tenham que criar harmonia entre os rivais.',' Anna Kendrick, Justin Timberlake, Rachel Bloom','Trolls 2-20200626010608.jpg'),(19,'Tenet','-','13 de agosto de 2020','https://www.youtube-nocookie.com/embed/LdOM0x0XDMo?controls=0','Em Breve','Um épico de ação, que se passa em sete países diferentes, dentro do mundo da espionagem. Sinopse oficial ainda não divulgada.Confira a classificação indicativa no Portal Online da Cultura Digital.','John David Washington, Robert Pattinson, Elizabeth Debicki','Tenet-20200626010608.jpg'),(20,'O Exterminador do Futuro','2h 08m','31 de outubro de 2019','https://www.youtube-nocookie.com/embed/X4niKYEbuLU?controls=0','Lançado','A guerreira Sarah Connor se une a Grace, um híbrido entre ciborgue e humano, e ao T-800 para proteger a jovem Dani Ramos de um novo tipo de exterminador que chega do futuro à Cidade do México.','Linda Hamilton Arnold Schwarzenegger Mackenzie Davis Natalia Reyes Gabriel Luna Diego Boneta','O Exterminador do Futuro-20200626010608.jpg'),(21,'O EXTERMINADOR DO FUTURO 2 ','2h 15m','1 de agosto de 1991 ','https://www.youtube-nocookie.com/embed/0yfpLhW-Xyg?controls=0','Lançado','Uma criança destinada a ser líder (Edward Furlong) já nasceu, mas infeliz por viver com pais adotivos, pois foi privado da companhia da mãe (Linda Hamilton), que foi considerada louca quando falou de um exterminador vindo do futuro. ','Arnold Schwarzenegger, Linda Hamilton, Edward Furlong','1000854766-20200626010614.jpg'),(22,'Ford Vs Ferrari','02h 29m','14 de novembro de 2019','https://www.youtube-nocookie.com/embed/zWQ1WqvxWno?controls=0','Lançado','O projetista Carroll Shelby e o piloto Ken Miles enfrentaram a interferência empresarial, as leis da física e os próprios demônios para construir um carro de corrida para a Ford Motor derrotar a hegemonia de Enzo Ferrari nas 24 horas de Le Mans.','Matt Damon, Christian Bale, Caitriona Balfe, Jon Bernthal, Tracy Letts, Josh Lucas','Ford Vs Ferrari-20200626010615.jpg'),(23,'Milagre da cela 7','2h 12m','10 de outubro de 2019','https://www.youtube-nocookie.com/embed/kipVc36vCTI?controls=0','Lançado','Quando pensamos em um milagre, é comum envolvermos o ar sobrenatural, quase divino, que envolve a expressão. Milagres são quase sinônimos do impossível e muitas vezes consideramos um ato do além para justificá-los quando acontecem. ','Aras Bulut İynemli,Nisa Sofiya Aksongur,Deniz Baysal','Milagre na cela 7-20200626010615.jpg'),(24,'Frankenweenie','1h 27m','2 de novembro de 2012','https://www.youtube-nocookie.com/embed/c0E6qIEqQng?controls=0','Lançado','Victor adora fazer filmes caseiros de terror, quase sempre estrelados por seu cachorro Sparky. Quando o cão morre atropelado, o garoto fica triste e inconformado. Inspirado por uma aula de ciências que teve na escola, onde um professor mostra ser possível estimular os movimentos através da eletricidade, ele constrói uma máquina que permita reviver Sparky.',' Charlie Tahan, Winona Ryder, Atticus Shaffer, Martin Short','frankenweenie-20200626010616.jpg'),(25,'Você Nem Imagina','1h 44m','1 de maio de 2020 ','https://www.youtube-nocookie.com/embed/TVXvxjm6FF8?controls=0','Lançado','Em Você Nem Imagina, Ellie Chu (Leah Lewis) é a típica aluna deslocada que possui o hábito de fazer a lição de casa de seus colegas por dinheiro para contribuir com as contas em casa. Secretamente, ela possui uma paixão pela bela Aster Flores (Alexxis Lemire). Quando Paul, um jogador de futebol, se aproxima de Ellie para pedir ajuda para escrever uma carta de amor para sua amada, ela entra em conflito.','Leah Lewis, Alexxis Lemire, Daniel Diemer','1081365-20200626010617.jpg'),(26,'M8 - Quando a Morte Socorre a Vida','1h 14m','23 de julho de 2020','https://www.youtube-nocookie.com/embed/MfWfoADI84s?controls=0','Em Breve','Em M8 - Quando a Morte Socorre a Vida, Maurício (Juan Paiva) acabou de ingressar na renomada Universidade Federal de Medicina. Na sua primeira aula de anatomia ele conhece M8, o cadáver que servirá de estudo para ele e os amigos. Durante o semestre, o mistério da identidade do corpo só poderá ser solucionado depois que ele enfrentar suas próprias angústias.','Juan Paiva, Raphael Logam, Henri Pagnoncelli','M8 - Quando a Morte Socorre a Vida-20200626010617.jpg'),(27,'Raya and The Last Dragon','-','7 de janeiro de 2021','https://www.youtube-nocookie.com/embed/7bKMUHQ98As?controls=0','Em Breve','Num reino conhecido como Kumandra, uma guerreira chamada Raya está convencida a buscar pelo último dragão, podendo mudar o mundo para sempre.','Cassie Steele, Awkwafina','020_xS9Zsby-20200626010620.png'),(28,'Top Gun: Maverick','-','26 de junho de 2020','https://www.youtube-nocookie.com/embed/g4U4BQW9OEk?controls=0','Em Breve','Depois de mais de 30 anos de serviço como um dos principais aviadores da Marinha, Pete \"Maverick\" Mitchell está de volta, rompendo os limites como um piloto de testes corajoso. No mundo contemporâneo das guerras tecnológicas, Maverick enfrenta drones e prova que o fator humano ainda é essencial.','Tom Cruise, Miles Teller, Jennifer Connelly','Top Gun-20200626010620.jpg'),(29,'Invocação do Mal 3: A Ordem do Demônio','-','10 de setembro de 2020','https://www.youtube-nocookie.com/embed/3Omh-rIoHus?controls=0','Em Breve','Ed (Patrick Wilson) e Lorraine Warren (Vera Farmiga) voltam a investigar um caso que se passa em nos anos 80. A sinopse oficial ainda não foi divulgada. Confira a classificação indicativa no Portal Online da Cultura Digital.','Patrick Wilson, Vera Farmiga, Sterling Jerins','b56c205e9e5a845e7592e72e6ec8c4a1-20200626010623.jpg'),(30,'Bob Esponja: O Incrível Resgate','1h 23m','30 de julho de 2020','https://www.youtube-nocookie.com/embed/TU7D4ap_m0I?controls=0','Em Breve','Onde está Gary? Segundo Bob Esponja, Gary foi caracolstrado pelo temível Rei Poseidon e levado para a cidade perdida de Atlantic City. Com a ajuda do Patrick, ele sai em uma missão de resgate ao querido amigo, e nesta jornada os dois conhecem novos personagens e vivem inimagináveis aventuras.','Awkwafina, Tom Kenny, Clancy Brown','Bob Esponja-20200626010623.jpg'),(31,'Avatar 2','-','18 de dezembro de 2020','https://www.youtube-nocookie.com/embed/yUXd-enstO8?controls=0','Em Breve','Avatar: The Way of Water é a continuação de Avatar, com sua data de lançamento prevista para 17 de dezembro de 2021. O filme é co-escrito, co-editado, co-produzido e dirigido por James Cameron. Será a sequência do blockbuster de 2009 Avatar.','James Cameron, Josh Friedman, Shane Salerno','17aa718c1ab15b482505b8431cf596fc-20200626010625.jpg'),(32,'007 - Sem Tempo Para Morrer','2h 43m','19 de novembro de 2020','https://www.youtube-nocookie.com/embed/FlriFMTIPOg?controls=0','Em Breve','Em 007 - Sem Tempo Para Morrer, Bond deixou o serviço ativo e está desfrutando de uma vida tranquila na Jamaica. Sua paz não dura muito quando seu velho amigo Felix Leiter, da CIA, aparece pedindo ajuda. A missão de resgatar um cientista sequestrado acaba sendo muito mais traiçoeira do que o esperado, levando Bond à trilha de um vilão misterioso armado com nova tecnologia perigosa.','Daniel Craig, Rami Malek, Léa Seydoux','No_Time_to_Die-20200626010628.jpg'),(33,'Detetives do Prédio Azul 3 - Uma Aventura no Fim do Mundo','-','17 de dezembro de 2020','https://www.youtube-nocookie.com/embed/nCEArtHfZJE?controls=0','Em Breve','Severino (Ronaldo Reis) encontra um estranho objeto em meio aos escombros de um avião, sem saber que se trata de uma das faces do Medalhão de Uzur. Ao colocá-lo no pescoço, o porteiro do Prédio Azul é influenciado pelo artefato e passa a se tornar cada vez mais malvado.','Pedro Henriques Motta, Letícia Braga, Anderson Lima','1275610-20200626010629.jpg'),(34,'Amor, Sublime Amor ','-','17 de dezembro de 2020','https://www.youtube-nocookie.com/embed/0SwtseTrXbs?controls=0','Em Breve','No lado oeste da cidade de Nova York, os Jets e os Sharks são gangues polonesas e porto-riquenhas, respectivamente, que se odeiam e lutam entre si para dominar o território em seu bairro. A briga se intensifica quando os dois líderes das gangues rivais se apaixonam, transformando o cenário em uma total tragédia.','Ansel Elgort, Rachel Zegler, Rita Moreno','Amor, Sublime Amor-20200626010629.jpg'),(35,'Morbius','-','30 de julho de 2020','https://www.youtube-nocookie.com/embed/jLMBLuGJTsA?controls=0','Em Breve','Morbius é um futuro filme norte-americano de super-herói de 2021, baseado na personagem de mesmo nome da Marvel Comics, produzido pela Columbia Pictures em associação com a Marvel Entertainment e distribuído pela Sony Pictures. Pretende ser o segundo filme do Universo Marvel da Sony.','Avi Arad, Matthew Tolmach, Lucas Foster','Morbius-20200626010629.jpg'),(36,'Alita: Anjo de Comba','2h 2m','14 de fevereiro de 2019','https://www.youtube-nocookie.com/embed/bF6wNMjPwJY?controls=0','Lançado','Abandonada em um ferro-velho de Iron City, a ciborgue Alita é encontrada pelo cientista Dyson Ido. Revitalizada, ela acorda sem memória e reconhecimento do mundo em que se encontra. Determinada a conhecer seu passado e explorar suas habilidades surpreendentes de luta, Alita se torna uma poderosa caçadora de recompensas, combatendo forças mortais.','Rosa Salazar, Jorge Lendeborg Jr, Casper Van Dien, Christoph Waltz','Alita-20200626010630.jpg'),(37,'Animais Fantásticos: Os Crimes de Grindelwald','2h 13m','15 de novembro de 2018 ','https://www.youtube-nocookie.com/embed/YNskLKO_FzE?controls=0','Lançado','Newt Scamander reencontra os queridos amigos Tina Goldstein, Queenie Goldstein e Jacob Kowalski. Ele é recrutado pelo seu antigo professor em Hogwarts, Alvo Dumbledore, para enfrentar o terrível bruxo das trevas Gellert Grindelwald, que escapou da custódia da Macusa.',' Eddie Redmayne, Katherine Waterston, Dan Fogler','Fantastic_Beasts_The_Crimes_of_Grindelwald-20200626010631.jpg'),(38,'Titanic','3h 30m','16 de janeiro de 1998','https://www.youtube-nocookie.com/embed/2e-eXJ6HgkQ?controls=0','Lançado','Um artista pobre e uma jovem rica se conhecem e se apaixonam na fatídica jornada do Titanic, em 1912. Embora esteja noiva do arrogante herdeiro de uma siderúrgica, a jovem desafia sua família e amigos em busca do verdadeiro amor.','Leonardo Dicaprio,Billy Zane,Kate Winslet,Frances Fisher','Titanic-20200626010631.jpg'),(39,'Projeto Gemini','1h 57m','10 de outubro de 2019','https://www.youtube-nocookie.com/embed/eDXudQXTPuU?controls=0','Lançado','Henry Brogan é um assassino de elite que se torna o alvo de um agente misterioso que aparentemente pode prever todos os seus movimentos. Ele logo descobre que o homem que está tentando matá-lo é uma versão mais jovem, rápida e clonada de si mesmo.',' Will Smith, Mary Elizabeth Winstead, Clive Owen','Projeto Gemini-20200626010632.jpg'),(40,'Jogador Nº 1','2h 19m','29 de março de 2018','https://www.youtube-nocookie.com/embed/q_1OJNcTld0?controls=0','','Em 2044, Wade Watts, assim como o resto da humanidade, prefere a realidade virtual do jogo OASIS ao mundo real. Quando o criador do jogo, o excêntrico James Halliday morre, os jogadores devem descobrir a chave de um quebra-cabeça diabólico para conquistar sua fortuna inestimável.','Tye Sheridan, Olivia Cooke, Ben Mendelsohn, T. J. Miller','Ready_Player_One_(filme)-20200626010633.png'),(41,'Batman Begins','2h 20m','17 de junho de 2005','https://www.youtube-nocookie.com/embed/_D38sEPUXt4?controls=0','Lançado','O jovem Bruce Wayne viaja para o Extremo Oriente, onde recebe treinamento em artes marciais do mestre Henri Ducard, um membro da misteriosa Liga das Sombras. Quando Ducard revela que a verdadeira proposta da Liga é a destruição completa da cidade de Gotham, Wayne retorna à sua cidade com o intuito de livrá-la de criminosos e assassinos.',' Christian Bale, Katie Holmes, Michael Caine','Batman Begins-20200626010633.jpg'),(42,'MÁQUINAS MORTAIS','2h 9m','10 de janeiro de 2019','https://www.youtube-nocookie.com/embed/DRIbfiG8IkY?controls=0','Lançado','A Terra está destruída e para sobreviver as cidades se movem em rodas gigantes, conhecidas como Cidades Tração, e lutam com outras para conseguir mais recursos naturais. Quando Londres se envolve em um ataque, Tom é lançado para fora da cidade junto com uma fora da lei, e os dois juntos precisam lutar para sobreviver e ainda enfrentar uma ameaça que coloca a vida no planeta em risco.','Hera Hilmar, Robert Sheehan, Hugo Weaving','514SVHqi9fL-20200626010634.jpg'),(43,'Bloodshot','1h 49m','12 de março de 2020','https://www.youtube-nocookie.com/embed/J98D-Lglgks?controls=0','Lançado','Depois de ser morto em combate, o soldado Ray Garrison é trazido de volta à vida com um exército de nanotecnologia em suas veias e poderes sobre-humanos: uma incrível força e a habilidade de se curar instantaneamente. Sem memória, ele está decidido a descobrir a verdade sobre quem realmente é.','Vin Diesel, Eiza Gonzalez, Sam Heughan','Bloodshot-20200626010634.jpg'),(44,'Troco em Dobro','1h 51m','6 de março de 2020','https://www.youtube-nocookie.com/embed/7fzTXxx3p28?controls=0','Lançado','Na trama de Troco em Dobro, Spenser (Mark Wahlberg), um ex-policial mais conhecido por causar problemas do que resolvê-los, acabou de sair da prisão. Mas ele se vê obrigado a ajudar seu antigo treinador de boxe Henry (Alan Arkin) e permanece na cidade de Boston mesmo com a intenção de ir embora. Quando dois ex-colegas de Spenser são assassinados, ele recruta Hawk (Winston Duke), um lutador de MMA, para ajudá-lo a investigar e levar os culpados à justiça.','Mark Wahlberg, Alan Arkin, Winston Duke','Troco em Dobro-20200626010635.jpg'),(45,'Dolittle','1h 41m','20 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/15VBlESes-Y?controls=0','Lançado','O Dr. Dolittle vive com uma variedade de animais exóticos e conversa com eles diariamente. Quando a jovem rainha Victoria fica doente, o excêntrico médico e seus amigos peludos embarcam em uma aventura épica em uma ilha mítica para encontrar a cura.','Robert Downey Jr., Antonio Banderas, Jessie Buckley','Dolittle-20200626010635.jpg'),(46,'Superman: Red Son','1h 24m','24 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/gV4km4-lS9A?controls=0','Lançado','Em uma versão alternativa, Superman torna-se um herói soviético depois que seu foguete cai na URSS.','Amy Acker, Sasha Roiz, Diedrich Bader,winter ave zoli','Superman-20200626010635.jpg'),(47,'Dois Irmãos: Uma Jornada Fantástica','1h 42m','5 de março de 2020','https://www.youtube-nocookie.com/embed/iANKV8OyPUI?controls=0','Lançado','Em um mundo transformado, no qual as criaturas não dependiam mais da magia para viver, dois irmãos elfos recebem um cajado de bruxo de seu falecido pai, capaz de trazê-lo de volta à vida. Inexperientes com qualquer tipo de magia, Ian e Barley não conseguem executar o feitiço e acabam gerando uma criatura sem cabeça.','Tom Holland, Chris Pratt, Julia Louis-Dreyfu,s Octavia Spencer','5627382-20200626010636.jpg'),(48,'Dragonheart: Vengeance','1h 37m','4 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/KSonY_SHxqI?controls=0','Lançado','Lukas, um jovem agricultor cuja família é morta por invasores selvagens no campo, embarca em uma busca épica por vingança, formando um trio com uma dragão majestosa e um mercenário espadachim chamado Darius.','Joseph Millson, Jack Kane, Arturo Muselli, Carolina Carlsson','Dragonheart-20200626010636.jpg'),(49,'Resgate','1h 57m','24 de abril de 2020','https://www.youtube-nocookie.com/embed/GMKKq_bYd0E?controls=0','','Resgate é um filme de suspense de ação americano de 2020, dirigido por Sam Hargrave e roteiro de Joe Russo, baseado nos quadrinhos Ciudad de Ande Parks, Joe Russo, Anthony Russo, Fernando Leon Gonzalez e Eric Skillman.','Chris Hemsworth,Rudhraksh Jaiswal,Randeep Hooda','Resgate-20200626010637.jpg'),(50,'La casa de papel: El fenómeno','0h 57m','29 de maio de 2020','https://www.youtube-nocookie.com/embed/uplP9GLl4k8?controls=0','Lançado','O documentário La Casa de Papel: O Fenômeno traz um olhar sobre o por quê e como o famoso seriado da Netflix provocou uma onda de entusiasmo em todo o mundo por um astuto grupo de ladrões e o professor que comandou toda a operação.','Úrsula Corberó, Miguel Herrán, Álvaro Morte','0753344-20200626010638.jpg'),(51,'Milea','1h 42min','13 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/Knu5zKiK5hw?controls=0','Lançado','Milea tomou a decisão de se separar de Dilan como um aviso para Dilan ficar longe da gangue de motociclistas. Mas a despedida que fora apenas um blefe para Milea se tornou uma despedida que durou até se formarem na faculdade e crescerem.\r\n',' Iqbaal Dhiafakhri Ramadhan , Vanesha Prescilla , Ira Wibowo','Milea-20200626010639.jpg'),(52,'Olhos de Gato','1h 44m','18 de junho de 2020','https://www.youtube-nocookie.com/embed/zWugdPLACmQ?controls=0','Lançado','Miyo Sasaki apaixonada por seu colega de classe Kento Hinode e tenta repetidamente chamar a atenção de Kento, transformando-se em um gato, mas em algum momento, a fronteira entre ela e o gato se torna ambígua.','Natsuki Hanae, Kôichi Yamadera, Minako Kotobuki','bTnGFQR1fTFtcdh6capsn2eBAH8yPoA-QUWBWDN0Yl1KF9aZDGSCKe62oe0U9EltRiDyqaVcGEGSgq99XbbqTTWV5MUxDw-20200626010642.png'),(53,'A Última Coisa que Ele Queria','1h 55m','27 de janeiro de 2020','https://www.youtube-nocookie.com/embed/EjMPO0Xyw4w?controls=0','Lançado','Uma repórter consagrada cruza os limites da ética jornalística para ajudar o pai em uma negociação de armas na América Central.','Anne Hathaway,Ben Affleck,Willem Dafoe','2719146-20200626010644.jpg'),(54,'Coffee & Kareem','1h 28m','3 de abril de 2020','https://www.youtube-nocookie.com/embed/aZoF1AmC1Yk?controls=0','Lançado','Em Coffee & Kareem, o policial James Coffee (Ed Helms) está aproveitando seu relacionamento com Vanessa Manning (Taraji P. Henson), mas seu amado filho de 12 anos, Kareem (Terrence Little Gardenhigh), planeja sua separação. Na tentativa de assustar o namorado de sua mãe, o menino procura fugitivos criminosos, mas acaba encontrando uma rede secreta de atividades criminosas e coloca um alvo em sua família. Para proteger a mãe, Kareem se une a Coffee rumo à uma perseguição perigosa por Detroit.',' Ed Helms, Terrence Little Gardenhigh, Taraji P. Henson','Coffee & Kareem-20200626010644.jpg'),(55,'Maria e João: O Conto das Bruxas','1h 27m','20 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/BeayuZfUmbg?controls=0','','Desta vez, as migalhas nos guiam por um caminho muito mais sombrio e perturbador. Durante um período de escassez, Maria e seu irmão mais novo, João, saem de casa e partem para a floresta em busca de comida e sobrevivência. É quando encontram uma senhora, cujas intenções podem não ser tão inocentes quanto parecem, que eles descobrem que nem todo conto de fadas tem final feliz.','Sophia Lillis, Alice Krige, Samuel Leakey','maria_e_joao_poster_oficial-20200626010645.jpg'),(56,'O Chamado da Floresta','1h 40m','20 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/uzRXbnJJCHI?controls=0','','Um cão de estimação vivia confortavelmente na casa de uma família na Califórnia, mas é sequestrado e acaba em um dos lugares mais hostis do mundo, o Alaska. Seu destino se cruza com o de John Thornton, um homem corajoso disposto a explorar as belezas e aventuras da travessia de Yukon.','Harrison Ford, Omar Sy, Dan Stevens','O Chamado da Floresta-20200626010646.jpg'),(57,'Wendy','1h 52m','28 de fevereiro de 2020','https://www.youtube-nocookie.com/embed/SH71Tk8Rpvo?controls=0','Lançado','Wendy vive com seus irmãos gêmeos em um restaurante na propriedade de sua mãe e tem sede de aventura. As três crianças decidem então pular a bordo de um trem, e um jovem espirituoso as leva para uma ilha misteriosa onde ninguém envelhece.',' Devin France, Yashua Mack, Gage Naquin','Wendy-20200626010646.jpg'),(58,'RAMBO - PROGRAMADO PARA MATAR','1h 37m','6 de novembro de 1982 ','https://www.youtube-nocookie.com/embed/IAqLKlxY3Eo?controls=0','Lançado','Rambo (Sylvester Stallone) é um veterano da Guerra do Vietnã que é preso injustamente pelo xerife Teasle (Brian Dennehy), mas consegue fugir e promove uma guerra não só contra o policial mas contra toda uma cidade, causando pânico e destruição, que é o que ele sabe fazer de melhor.','Sylvester Stallone, Richard Crenna, Brian Dennehy','20527154-20200603000631-20200626010649.jpg'),(59,'Punyakoti','1h 25m','25 de março de 2020','https://www.youtube-nocookie.com/embed/w-ofnAGFxoQ?controls=0','Lançado','Uma vaca que fala a verdade encontra um tigre faminto que foi deslocado pela destruição irracional da floresta. Uma seca iminente aguarda sua aldeia. O filme é uma adaptação de uma canção folclórica em Karnataka.',' Revathi, Roger Narayan, Sneha Ravishankar','Punyakoti-20200626000614-20200626010650.jpg'),(60,'Viva the Underdogs','1h 30m','22 de janeiro de 2020','https://www.youtube-nocookie.com/embed/HPNQa0ZH9k8?controls=0','Lançado','VIVA THE UNDERDOGS segue a banda autogerida de metalcore / heavy metal australiana Parkway Drive em sua jornada de 15 anos.','Parkway Drive, Ben Gordon, Luke Kilpatrick','Viva the Underdogs-20200626000619-20200626010650.jpg'),(76,'RAMBO 2 - A MISSÃO','1h 36min','16 de agosto de 1985','https://www.youtube-nocookie.com/embed/bVUCdy36TKE?controls=0','Lançado','John Rambo (Sylvester Stallone) está cumprindo pena em uma penitenciária federal quando recebe uma proposta: se participar de uma missão suicida (que consiste em localizar prisioneiros americanos) no sudeste asiático será perdoado e reintegrado ao exército. ','Sylvester Stallone, Richard Crenna, Charles Napier','d935ae71802233321e99f4ced9539a38_XL-20200626020609.jpg'),(77,'RAMBO 3','1h 40min','19 de agosto de 1988','https://www.youtube-nocookie.com/embed/IQt9bDOGTgg?controls=0','Lançado','Veterano (Sylvester Stallone) da Guerra do Vietnã refugia-se em mosteiro budista, em busca de paz espiritual. O retiro é interrompido quando ele decide libertar seu mentor, que caiu nas mãos dos soviéticos, durante a ocupação do Afeganistão.','Sylvester Stallone, Richard Crenna, Kurtwood Smith','Rambo3poster-20200626020614.jpg');
/*!40000 ALTER TABLE `filme` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme_diretor`
--

DROP TABLE IF EXISTS `filme_diretor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filme_diretor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_filme` int NOT NULL,
  `id_diretor` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_filme_genero_diretor_idx` (`id_diretor`),
  KEY `fk_filme_diretor_filme_idx` (`id_filme`),
  CONSTRAINT `fk_filme_diretor_filme` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id`),
  CONSTRAINT `fk_filme_genero_diretor` FOREIGN KEY (`id_diretor`) REFERENCES `diretor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=205 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme_diretor`
--

LOCK TABLES `filme_diretor` WRITE;
/*!40000 ALTER TABLE `filme_diretor` DISABLE KEYS */;
INSERT INTO `filme_diretor` VALUES (23,3,4),(117,1,1),(118,1,2),(119,2,3),(120,4,5),(121,5,6),(122,6,7),(123,6,8),(124,7,9),(125,8,10),(126,9,11),(127,10,12),(128,11,13),(129,12,14),(130,13,15),(131,14,16),(132,15,17),(133,16,18),(136,17,19),(137,18,20),(138,19,21),(139,20,22),(142,21,34),(143,22,23),(144,23,24),(145,24,25),(147,25,26),(148,26,27),(151,28,31),(152,27,29),(153,27,30),(156,29,32),(157,30,33),(158,31,34),(159,32,35),(161,33,36),(162,34,37),(163,35,38),(164,36,39),(166,37,41),(167,38,43),(168,39,44),(170,40,37),(171,41,45),(173,42,46),(174,43,47),(175,44,50),(176,45,51),(177,46,53),(179,47,54),(180,48,55),(181,49,56),(184,50,57),(185,50,58),(186,51,59),(187,51,60),(188,52,62),(190,53,63),(191,54,64),(193,55,65),(194,56,67),(195,57,68),(197,58,72),(198,59,69),(199,59,70),(200,60,71),(202,76,73),(204,77,74);
/*!40000 ALTER TABLE `filme_diretor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filme_genero`
--

DROP TABLE IF EXISTS `filme_genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filme_genero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_filme` int NOT NULL,
  `id_genero` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_genero_idx` (`id_genero`),
  KEY `fk_filme_genero_filme_idx` (`id_filme`),
  CONSTRAINT `fk_filme_genero_filme` FOREIGN KEY (`id_filme`) REFERENCES `filme` (`id`),
  CONSTRAINT `fk_filme_genero_genero` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=376 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filme_genero`
--

LOCK TABLES `filme_genero` WRITE;
/*!40000 ALTER TABLE `filme_genero` DISABLE KEYS */;
INSERT INTO `filme_genero` VALUES (32,3,1),(33,3,3),(218,1,1),(219,1,16),(220,2,1),(221,2,3),(222,4,5),(223,5,1),(224,5,3),(225,5,13),(226,6,1),(227,6,5),(228,7,1),(229,8,12),(230,9,22),(231,10,12),(232,10,32),(233,11,5),(234,11,20),(235,12,1),(236,12,3),(237,12,15),(238,13,12),(239,14,15),(240,14,22),(241,14,23),(242,15,23),(243,16,1),(244,16,3),(251,17,1),(252,17,5),(253,17,13),(254,18,2),(255,18,5),(256,18,18),(257,19,1),(258,19,13),(259,19,22),(260,20,34),(263,21,34),(264,22,1),(265,22,3),(266,22,12),(267,23,12),(268,24,2),(269,24,5),(270,24,16),(273,25,5),(274,25,20),(275,26,12),(276,26,22),(279,28,1),(280,28,12),(281,28,3),(282,27,2),(283,27,33),(286,29,23),(287,30,2),(288,30,5),(289,31,16),(290,32,1),(291,32,13),(292,32,22),(295,33,3),(296,33,38),(297,34,5),(298,34,18),(299,34,20),(300,35,1),(301,35,23),(302,36,1),(303,36,16),(306,37,3),(307,37,33),(308,38,12),(309,38,20),(310,39,1),(311,39,16),(314,40,1),(315,40,16),(316,41,1),(317,41,33),(320,42,1),(321,42,16),(322,43,1),(323,43,3),(324,44,1),(325,44,5),(326,44,12),(327,44,19),(328,45,3),(329,45,38),(330,46,1),(331,46,16),(334,47,5),(335,47,38),(336,48,1),(337,48,3),(338,48,12),(339,49,1),(341,50,10),(342,51,12),(343,51,20),(344,52,2),(345,52,16),(346,52,20),(347,52,33),(350,53,40),(351,53,41),(352,54,1),(353,54,5),(354,54,19),(357,55,23),(358,55,33),(359,56,3),(360,56,12),(361,56,38),(362,57,12),(363,57,33),(366,58,12),(367,58,1),(368,59,2),(369,60,10),(371,76,1),(374,77,1),(375,77,3);
/*!40000 ALTER TABLE `filme_genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genero` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Ação'),(2,'Animação'),(3,'Aventura'),(4,'Cinema de arte'),(5,'Comédia'),(6,'Comédia romântica'),(7,'Comédia dramática'),(8,'Comédia de ação'),(9,'Dança'),(10,'Documentário'),(11,'Docuficção'),(12,'Drama'),(13,'Espionagem'),(14,'Faroeste'),(15,'Fantasia científica'),(16,'Ficção científica'),(17,'Filmes de guerra'),(18,'Musical'),(19,'Filme policial'),(20,'Romance'),(21,'Seriado'),(22,'Suspense'),(23,'Terror'),(28,'Teste'),(32,'Erótico'),(33,'Fantasia'),(34,'Ação Com Ficção-Científica'),(35,'Esporte'),(38,'Família'),(40,'Thriller político'),(41,'Mistério');
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dataNascimento` date DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Nathan Sousa','2000-06-15','nathan@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','19059715_1189472924498462_4082649541936361331_n-20200619000604.jpg'),(2,'Thiago Sousa','2000-01-14','thiago@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','ghgfhgf-20200626020611.png'),(3,'Rodrigo Nunes','1999-05-17','rodrigo@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','hffg-20200626020611.jpg'),(4,'Daniel Lopes','2000-04-01','daniel@gmail.com','81dc9bdb52d04dc20036dbd8313ed055','hfghgf-20200626020611.png');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-06-25 23:56:18
