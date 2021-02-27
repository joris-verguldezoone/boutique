-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 27 fév. 2021 à 11:13
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
  `tel` char(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(140) NOT NULL,
  `presentation` varchar(255) NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `presentation`, `description`, `image`, `image_2`, `image_3`, `note`, `prix`, `id_utilisateur`, `id_type`, `id_gamme`, `id_marque`, `id_generation`, `promo`, `date`) VALUES
(8, '3070 FE', 'Meilleur rapport qualité prix Nvidia', 'La Nvidia GeForce RTX 3070 a été présentée en septembre 2020, il s\'agit d\'un des premières modèles de cartes graphiques conçus avec l\'architecture Ampere. Selon Nvidia, ses performances sont équivalentes à celle d’un RTX 2080 Ti. La RTX 3070 possède 8 Go de Mémoire GDDR6 avec 5888 coeurs Nvidia Cuda.', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://images.itnewsinfo.com/lmi/articles/grande/000000075100.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTl8M82Wg0dA45Bj307DUbKsxMtvw7mK3X9xg&amp;usqp=CAU', NULL, 519, 1, 27, 1, 3, 1, NULL, '2021-02-24'),
(9, '3070 FE', 'Meilleur rapport qualité prix Nvidia', 'La Nvidia GeForce RTX 3070 a été présentée en septembre 2020, il s\'agit d\'un des premières modèles de cartes graphiques conçus avec l\'architecture Ampere. Selon Nvidia, ses performances sont équivalentes à celle d’un RTX 2080 Ti. La RTX 3070 possède 8 Go de Mémoire GDDR6 avec 5888 coeurs Nvidia Cuda.', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', NULL, 519, 1, 27, 1, 3, 1, NULL, '2021-02-24'),
(10, '3070 FE', 'Meilleur rapport qualité prix Nvidia', 'La Nvidia GeForce RTX 3070 a été présentée en septembre 2020, il s\'agit d\'un des premières modèles de cartes graphiques conçus avec l\'architecture Ampere. Selon Nvidia, ses performances sont équivalentes à celle d’un RTX 2080 Ti. La RTX 3070 possède 8 Go de Mémoire GDDR6 avec 5888 coeurs Nvidia Cuda.', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', 'https://www.nvidia.com/content/dam/en-zz/Solutions/geforce/ampere/rtx-3090/geforce-rtx-3090-shop-300-t.png', NULL, 519, 1, 27, 1, 3, 1, NULL, '2021-02-24');

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
-- Structure de la table `gamme`
--

DROP TABLE IF EXISTS `gamme`;
CREATE TABLE IF NOT EXISTS `gamme` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(140) CHARACTER SET latin1 NOT NULL,
  `id_type` int(11) NOT NULL,
  `id_marque` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cette table permet un tri facultatif selon l''article';

--
-- Déchargement des données de la table `gamme`
--

INSERT INTO `gamme` (`id`, `nom`, `id_type`, `id_marque`) VALUES
(1, '3090', 1, 1),
(2, 'I-9', 5, 2),
(3, '3070', 1, 1),
(4, '3080', 1, 1),
(5, '3060', 1, 1),
(6, '2080', 1, 1),
(7, '2070', 1, 1),
(8, '2060', 1, 1),
(9, '1660', 1, 1),
(10, '1060', 1, 1),
(11, '1050', 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `generation`
--

INSERT INTO `generation` (`id`, `nom`, `id_type`, `id_marque`) VALUES
(1, 'RTX 3000', 1, 1),
(2, 'Intel 10th', 5, 2);

-- --------------------------------------------------------

--
-- Structure de la table `likedislike`
--

DROP TABLE IF EXISTS `likedislike`;
CREATE TABLE IF NOT EXISTS `likedislike` (
  `id` int(11) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `id_commentaire` int(11) NOT NULL,
  `likey` int(11) NOT NULL,
  `dislike` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  `nom` varchar(140) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(140) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`, `image`, `description`) VALUES
(1, 'NVIDIA', 'https://www.ginjfo.com/wp-content/uploads/2015/12/Nvidia-1200x720.jpg', 'jkhfgjhfgj'),
(2, 'Intel', 'https://www.presse-citron.net/app/uploads/2020/09/intel-core-11e-gen.jpg', 'intel c bien'),
(3, 'AMD', 'https://www.netcost-security.fr/wp-content/uploads/2020/12/amd-logo.jpg', 'concurrent intel nvidia');

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
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `nom`, `image`) VALUES
(28, 'Carte Graphique', 'http://www.laflecheinformatique.fr/catalogue/92-large_default/carte-video-gtx-1080ti-11go.jpg'),
(27, 'Carte Graphique', 'http://www.laflecheinformatique.fr/catalogue/92-large_default/carte-video-gtx-1080ti-11go.jpg'),
(17, 'Stockage', 'https://hardzone.es/app/uploads-hardzone.es/2019/01/Magnetic-Hard-Drive-vs-SATA-SSD-vs-M2-NVMe.jpg'),
(18, 'RAM', 'https://www.gamertech.fr/wp-content/uploads/2020/03/ram-memoire-pc-gamer.png'),
(19, 'Ecran', 'https://images-na.ssl-images-amazon.com/images/I/71KS5M77puL._AC_SX425_.jpg'),
(20, 'PC portable', 'https://image.jeuxvideo.com/medias-md/160647/1606471034-1133-card.jpg'),
(21, 'PC fixe', 'https://www.hebergementwebs.com/image/d2/d20d03a174ae5af65c42ade1133329d1.jpg/obtenez-un-pc-de-jeu-pre-construit-rtx-3070-ou-rtx-3080-chez-newegg-13.jpg'),
(22, 'Alimentation', 'https://www.alternate.fr/p/600x600/t/Corsair_CX_Series_CX750F_RGB_unit__d_alimentation_d__nergie_750_W_20_pin_ATX_ATX_Noir__Alimentation_PC@@tn7v6c04.jpg'),
(23, 'Carte mère', 'https://www.rueducommerce.fr/media/images/web/produit/3211627/20210201072202/z590_vision_g_4_1140x1140.png');

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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `email`, `password`, `image`, `id_droits`, `anniversaire`) VALUES
(2, NULL, NULL, 'HARDJOJO', 'HARDJOJO@gmail.com', '$2y$10$TfG7tt8ZDc./v.zAXTZMZe6rXx8XXR7VmwooddV.dDBl0Ln4i8wHq', NULL, 1, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
