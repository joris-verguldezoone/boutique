-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 04 mars 2021 à 12:52
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `boutique`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

DROP TABLE IF EXISTS `adresse`;
CREATE TABLE IF NOT EXISTS `adresse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `nom` varchar(140) NOT NULL,
  `prenom` varchar(140) NOT NULL,
  `batiment` varchar(200) NOT NULL,
  `rue` varchar(200) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `pays` varchar(140) NOT NULL,
  `ville` varchar(140) NOT NULL,
  `info_sup` varchar(200) NOT NULL,
  `tel` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `id_utilisateur`, `nom`, `prenom`, `batiment`, `rue`, `code_postal`, `pays`, `ville`, `info_sup`, `tel`) VALUES
(26, 1, 'Verguldezoone', 'Joris', '7 résidence Le Club', '139 François Mauriac', 13002, 'marseille', 'France', 'faut passer la rue du Dr Riera', 770739000),
(27, 1, 'Verguldezoone', 'Joris', '7 résidence Le Club', '139 François Mauriac', 13002, 'marseille', 'France', 'faut passer la rue du Dr Riera', 770739000),
(65, 1, 'Verguldezoone', 'Verguldezoone', 'Verguldezoone', 'Verguldezoone', 54254354, 'Verguldezoone', 'Verguldezoone', 'Verguldezoone', 654455000);

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(140) NOT NULL,
  `presentation` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `prix` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_gamme` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `id_generation` int(11) NOT NULL,
  `promo` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `vues` varchar(11) NOT NULL DEFAULT '0',
  `likey` varchar(11) DEFAULT NULL,
  `id_editeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `presentation`, `description`, `image`, `image_2`, `image_3`, `note`, `prix`, `id_utilisateur`, `id_type`, `id_gamme`, `id_marque`, `id_generation`, `promo`, `date`, `vues`, `likey`, `id_editeur`) VALUES
(8, '3070 FE', 'Meilleur rapport qualité prix Nvidia', 'La Nvidia GeForce RTX 3070 a été présentée en septembre 2020, il s\'agit d\'un des premières modèles de cartes graphiques conçus avec l\'architecture Ampere. Selon Nvidia, ses performances sont équivalentes à celle d’un RTX 2080 Ti. La RTX 3070 possède 8 Go de Mémoire GDDR6 avec 5888 coeurs Nvidia Cuda.', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://images.itnewsinfo.com/lmi/articles/grande/000000075100.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl8M82Wg0dA45Bj307DUbKsxMtvw7mK3X9xg&amp;usqp=CAU', NULL, 519, 1, 27, 1, 3, 1, NULL, '2021-02-24', '48', NULL, NULL),
(12, 'I-7 10700K', 'La 10ème génération de processeur Intel Core Comet Lake-S propose plus de coeurs et l', 'Le processeur Intel Core i7-10700K propose des performances éblouissantes avec sa fréquence de base à 3.8 GHz et jusqu', 'https://media.ldlc.com/r374/ld/products/00/05/66/87/LD0005668781_1.jpg', 'https://www.universmartphone.com/wp-content/uploads/2020/08/review-intels-core-i7-10700k-is-among-the-best-cpus-for-pc-gaming.jpg', 'https://www.universmartphone.com/wp-content/uploads/2020/08/review-intels-core-i7-10700k-is-among-the-best-cpus-for-pc-gaming.jpg', 0, 380, 2, 29, 2, 12, 2, 0, '2021-03-01', '0', '', 0),
(13, 'I-3 10100', 'La 10ème génération de processeur Intel Core Comet Lake-S propose plus de coeurs et l\'Hyper Threading depuis le Core i3 jusqu\'au Core i9. Performances de haute volée dans les Jeux, réalité virtuelle, multitâche intensif, les processeurs Intel Core de 10ème génération sont ultra polyvalent.', 'Le processeur Intel Core i3-10100 propose des performances éblouissantes avec sa fréquence de base à 3.6 GHz et jusqu\' à 4.3 GHz en mode Turbo, ses 4 Coeurs et 8 threads et ses 6 Mo de cache. Son TDP de 65W lui permet d\'offrir des fréquences de fonctionnement élevées tout en gardant une consommation électrique maitrisée.', 'https://media.ldlc.com/r374/ld/products/00/05/67/33/LD0005673301_1.jpg', 'https://media.ldlc.com/r374/ld/products/00/05/67/33/LD0005673303_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/67/33/LD0005673302_1.jpg', NULL, 138, 2, 29, 2, 14, 2, NULL, '2021-03-01', '1', NULL, NULL),
(14, 'MSI GeForce RTX 3080 SUPRIM X 10G', 'La carte graphique MSI GeForce RTX 3080 SUPRIM X 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'La carte graphique MSI GeForce RTX 3080 SUPRIM X 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme. jouer à vos jeux préférés dans les meilleures conditions, sans lag et sans surchauffe. 3 ventilateurs MSI TORX 4.0 assurent le flux d\'air et l\'évacuation de la chaleur tandis qu\'un backplate aluminium fait office de dissipateur et de plaque rigide pour le dessous du PCB.', 'https://media.ldlc.com/r374/ld/products/00/05/75/25/LD0005752590_1.jpg', 'https://media.ldlc.com/bo/images/fiches/carte_graphique/msi/msi_geforce-rtx-3070-suprim-x-8g_001.jpg', 'https://media.ldlc.com/r374/ld/products/00/05/75/25/LD0005752593_1.jpg', NULL, 1000, 2, 27, 1, 4, 1, NULL, '2021-03-01', '4', NULL, NULL),
(21, 'I-3 10100', 'La 10ème génération de processeur Intel Core Comet Lake-S propose plus de coeurs et l\'Hyper Threading depuis le Core i3 jusqu\'au Core i9. Performances de haute volée dans les Jeux, réalité virtuelle, multitâche intensif, les processeurs Intel Core de 10ème génération sont ultra polyvalent.', 'Le processeur Intel Core i3-10100 propose des performances éblouissantes avec sa fréquence de base à 3.6 GHz et jusqu\' à 4.3 GHz en mode Turbo, ses 4 Coeurs et 8 threads et ses 6 Mo de cache. Son TDP de 65W lui permet d\'offrir des fréquences de fonctionnement élevées tout en gardant une consommation électrique maitrisée.', 'https://media.ldlc.com/r374/ld/products/00/05/67/33/LD0005673301_1.jpg', 'https://media.ldlc.com/r374/ld/products/00/05/67/33/LD0005673303_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/67/33/LD0005673302_1.jpg', NULL, 138, 2, 29, 2, 14, 2, NULL, '2021-03-01', '1', NULL, NULL),
(19, '3070 FE', 'Meilleur rapport qualité prix Nvidia', 'La Nvidia GeForce RTX 3070 a été présentée en septembre 2020, il s\'agit d\'un des premières modèles de cartes graphiques conçus avec l\'architecture Ampere. Selon Nvidia, ses performances sont équivalentes à celle d’un RTX 2080 Ti. La RTX 3070 possède 8 Go de Mémoire GDDR6 avec 5888 coeurs Nvidia Cuda.', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://images.itnewsinfo.com/lmi/articles/grande/000000075100.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl8M82Wg0dA45Bj307DUbKsxMtvw7mK3X9xg&amp;usqp=CAU', NULL, 519, 1, 27, 1, 3, 1, NULL, '2021-02-24', '48', NULL, NULL),
(20, 'I-7 10700K', 'La 10ème génération de processeur Intel Core Comet Lake-S propose plus de coeurs et l', 'Le processeur Intel Core i7-10700K propose des performances éblouissantes avec sa fréquence de base à 3.8 GHz et jusqu', 'https://media.ldlc.com/r374/ld/products/00/05/66/87/LD0005668781_1.jpg', 'https://www.universmartphone.com/wp-content/uploads/2020/08/review-intels-core-i7-10700k-is-among-the-best-cpus-for-pc-gaming.jpg', 'https://www.universmartphone.com/wp-content/uploads/2020/08/review-intels-core-i7-10700k-is-among-the-best-cpus-for-pc-gaming.jpg', 0, 380, 2, 29, 2, 12, 2, 0, '2021-03-01', '0', '', 0),
(22, 'MSI GeForce RTX 3080 SUPRIM X 10G', 'La carte graphique MSI GeForce RTX 3080 SUPRIM X 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'La carte graphique MSI GeForce RTX 3080 SUPRIM X 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme. jouer à vos jeux préférés dans les meilleures conditions, sans lag et sans surchauffe. 3 ventilateurs MSI TORX 4.0 assurent le flux d\'air et l\'évacuation de la chaleur tandis qu\'un backplate aluminium fait office de dissipateur et de plaque rigide pour le dessous du PCB.', 'https://media.ldlc.com/r374/ld/products/00/05/75/25/LD0005752590_1.jpg', 'https://media.ldlc.com/bo/images/fiches/carte_graphique/msi/msi_geforce-rtx-3070-suprim-x-8g_001.jpg', 'https://media.ldlc.com/r374/ld/products/00/05/75/25/LD0005752593_1.jpg', NULL, 1000, 2, 27, 1, 4, 1, NULL, '2021-03-01', '4', NULL, NULL),
(23, 'testtest', 'testtesttesttest', 'testtesttesttest', 'testtesttesttest', 'testtesttesttest', 'testtesttesttest', NULL, 666, 2, 20, 6, 12, 7, NULL, '2021-03-04', '0', NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `carte_bleu`
--

DROP TABLE IF EXISTS `carte_bleu`;
CREATE TABLE IF NOT EXISTS `carte_bleu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type_carte` varchar(140) NOT NULL,
  `nom` varchar(140) NOT NULL,
  `numero` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `date` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gamme` varchar(140) NOT NULL,
  `generation` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_adresse` int(11) NOT NULL,
  `id_carte_bleu` int(11) NOT NULL,
  `id_panier` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id` int(11) NOT NULL,
  `titre` varchar(140) NOT NULL,
  `contenu` varchar(140) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_like` int(11) NOT NULL,
  `id_dislike` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `editeur`
--

DROP TABLE IF EXISTS `editeur`;
CREATE TABLE IF NOT EXISTS `editeur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `nom`, `image`, `description`) VALUES
(1, 'Msi', 'https://www.electroguide.com/images/icones-marques/logo-msi.jpg', 'En tant que marque leader du secteur informatique, MSI continue à placer la barre très haut en termes de design et d\'innovation de ses produits de gamme Gaming. Ces efforts ont d\'ailleurs résulté en un sponsoring de plusieurs équipes de eSport. La collaboration entre les services de recherche et développement et les joueurs professionnels a permis la création de nombre des produits MSI Gaming actuellement sur le marché.');

-- --------------------------------------------------------

--
-- Structure de la table `gamme`
--

DROP TABLE IF EXISTS `gamme`;
CREATE TABLE IF NOT EXISTS `gamme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) CHARACTER SET latin1 NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  `id_editeur` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cette table permet un tri facultatif selon l''article';

--
-- Déchargement des données de la table `gamme`
--

INSERT INTO `gamme` (`id`, `nom`, `id_type`, `id_marque`, `id_editeur`) VALUES
(1, '3090', 1, 1, NULL),
(2, 'I-9', 5, 2, NULL),
(3, '3070', 1, 1, NULL),
(4, '3080', 1, 1, NULL),
(5, '3060', 1, 1, NULL),
(6, '2080', 1, 1, NULL),
(7, '2070', 1, 1, NULL),
(8, '2060', 1, 1, NULL),
(9, '1660', 1, 1, NULL),
(10, '1060', 1, 1, NULL),
(11, '1050', 1, 1, NULL),
(12, 'I-7', 29, 2, NULL),
(13, 'I-5', 29, 2, NULL),
(14, 'I-3', 29, 2, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `generation`
--

DROP TABLE IF EXISTS `generation`;
CREATE TABLE IF NOT EXISTS `generation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `generation`
--

INSERT INTO `generation` (`id`, `nom`, `id_type`, `id_marque`) VALUES
(1, 'RTX 3000', 1, 1),
(2, 'Intel 10th', 5, 2),
(4, 'Intel 8th', 29, 2),
(5, 'Intel 9th', 29, 2),
(6, 'Intel 7th', 29, 2),
(9, 'lkjmlhlkhjgkj', 20, 2);

-- --------------------------------------------------------

--
-- Structure de la table `likedislike`
--

DROP TABLE IF EXISTS `likedislike`;
CREATE TABLE IF NOT EXISTS `likedislike` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) DEFAULT NULL,
  `id_commentaire` int(11) DEFAULT NULL,
  `likey` tinyint(1) DEFAULT NULL,
  `dislike` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `likey`
--

DROP TABLE IF EXISTS `likey`;
CREATE TABLE IF NOT EXISTS `likey` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) DEFAULT NULL,
  `id_commentaire` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likey`
--

INSERT INTO `likey` (`id`, `id_utilisateur`, `id_article`, `id_commentaire`) VALUES
(9, 2, 8, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `liste_de_souhait`
--

DROP TABLE IF EXISTS `liste_de_souhait`;
CREATE TABLE IF NOT EXISTS `liste_de_souhait` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `marque`
--

DROP TABLE IF EXISTS `marque`;
CREATE TABLE IF NOT EXISTS `marque` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) DEFAULT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`, `image`, `description`) VALUES
(1, 'NVIDIA', 'https://www.ginjfo.com/wp-content/uploads/2015/12/Nvidia-1200x720.jpg', 'jkhfgjhfgj'),
(2, 'Intel', 'https://www.presse-citron.net/app/uploads/2020/09/intel-core-11e-gen.jpg', 'intel c bien'),
(3, 'AMD', 'https://www.netcost-security.fr/wp-content/uploads/2020/12/amd-logo.jpg', 'concurrent intel nvidia'),
(7, 'Corsair', 'https://ih1.redbubble.net/image.509899309.3494/fpp,small,lustre,wall_texture,product,750x1000.u8.jpg', 'Corsair est un intégrateur de mémoire vive : le fabricant intègre sur ses circuits imprimés des séries de modules mémoires issues de constructeurs tels que Siemens et Samsung. Corsair produit également des claviers dédiés pour le gaming (Corsair K55 par ex.), des boitiers de PC fixe pour le gaming (Corsair Carbide par ex.) etc...'),
(8, 'Noctua', 'https://upload.wikimedia.org/wikipedia/fr/6/6e/Noctua_logo.jpg', 'Noctua est une entreprise spécialisée dans la conception et la production de matériel de refroidissement pour PC.\r\n\r\nC\'est une coentreprise entre Rascom Computer Distribution GmbH et Kolink International Corporation.\r\n\r\nLe logo de la société représente une chouette, une chevêche d\'Athéna, dont le nom scientifique est Athene Noctua.');

-- --------------------------------------------------------

--
-- Structure de la table `notation`
--

DROP TABLE IF EXISTS `notation`;
CREATE TABLE IF NOT EXISTS `notation` (
  `id` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_image_article` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) NOT NULL,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`, `image`) VALUES
(27, 'Carte Graphique', 'http://www.laflecheinformatique.fr/catalogue/92-large_default/carte-video-gtx-1080ti-11go.jpg'),
(17, 'Stockage', 'https://hardzone.es/app/uploads-hardzone.es/2019/01/Magnetic-Hard-Drive-vs-SATA-SSD-vs-M2-NVMe.jpg'),
(18, 'RAM', 'https://www.gamertech.fr/wp-content/uploads/2020/03/ram-memoire-pc-gamer.png'),
(19, 'Ecran', 'https://images-na.ssl-images-amazon.com/images/I/71KS5M77puL._AC_SX425_.jpg'),
(20, 'PC portable', 'https://image.jeuxvideo.com/medias-md/160647/1606471034-1133-card.jpg'),
(21, 'PC fixe', 'https://www.hebergementwebs.com/image/d2/d20d03a174ae5af65c42ade1133329d1.jpg/obtenez-un-pc-de-jeu-pre-construit-rtx-3070-ou-rtx-3080-chez-newegg-13.jpg'),
(22, 'Alimentation', 'https://www.alternate.fr/p/600x600/t/Corsair_CX_Series_CX750F_RGB_unit__d_alimentation_d__nergie_750_W_20_pin_ATX_ATX_Noir__Alimentation_PC@@tn7v6c04.jpg'),
(23, 'Carte mère', 'https://www.rueducommerce.fr/media/images/web/produit/3211627/20210201072202/z590_vision_g_4_1140x1140.png'),
(29, 'Processeur', 'https://geeko.lesoir.be/wp-content/uploads/sites/58/2018/05/processeur.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) DEFAULT NULL,
  `prenom` varchar(140) DEFAULT NULL,
  `login` varchar(140) NOT NULL,
  `email` varchar(140) NOT NULL,
  `password` varchar(140) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `id_droits` int(140) NOT NULL,
  `anniversaire` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `email`, `password`, `image`, `id_droits`, `anniversaire`) VALUES
(2, NULL, NULL, '', 'HARDJOJO@gmail.com', '', 'https://i.pinimg.com/originals/4b/73/66/4b7366b13494b6d442a4aa41c189a2da.png', 1, NULL),
(3, NULL, NULL, 'TestTest', 'TestTest@ok.fr', '$2y$10$487VcE6QPmC6u633DBKvV.phhbze9NYdZAw6dJIz96gxYMUsam/Ou', 'https://drone-geofencing.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `vues`
--

DROP TABLE IF EXISTS `vues`;
CREATE TABLE IF NOT EXISTS `vues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `vues`
--

INSERT INTO `vues` (`id`, `id_article`, `id_utilisateur`) VALUES
(1, 8, 2),
(2, 8, 2),
(3, 9, 2),
(4, 9, 2),
(5, 9, 2),
(6, 9, 2),
(7, 9, 2),
(8, 9, 2),
(9, 9, 2),
(10, 9, 2),
(11, 9, 2),
(12, 9, 2),
(13, 9, 2),
(14, 9, 2),
(15, 9, 2),
(16, 9, 2),
(17, 9, 2),
(18, 9, 2),
(19, 8, 2),
(20, 10, 2),
(21, 8, 5),
(22, 9, 5),
(23, 8, 2),
(24, 8, 2),
(25, 9, 2),
(26, 8, 2),
(27, 9, 2),
(28, 8, 2),
(29, 8, 2),
(30, 8, 2),
(31, 8, 2),
(32, 8, 2),
(33, 8, 2),
(34, 8, 2),
(35, 8, 2),
(36, 8, 2),
(37, 8, 2),
(38, 8, 2),
(39, 8, 2),
(40, 8, 2),
(41, 8, 2),
(42, 8, 2),
(43, 8, 2),
(44, 8, 2),
(45, 8, 2),
(46, 8, 2),
(47, 8, 2),
(48, 8, 2),
(49, 8, 2),
(50, 8, 2),
(51, 8, 2),
(52, 8, 2),
(53, 8, 2),
(54, 8, 2),
(55, 8, 2),
(56, 8, 2),
(57, 8, 2),
(58, 8, 2),
(59, 8, 2),
(60, 8, 2),
(61, 8, 2),
(62, 8, 2),
(63, 8, 2),
(64, 8, 2),
(65, 8, 2),
(66, 8, 2),
(67, 8, 2),
(68, 8, 2),
(69, 16, 2),
(70, 16, 2),
(71, 16, 2),
(72, 17, 2),
(73, 14, 2),
(74, 13, 2),
(75, 14, 2),
(76, 14, 2),
(77, 14, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
