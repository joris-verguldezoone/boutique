-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 23 mars 2021 à 10:26
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
  `description` varchar(3000) NOT NULL,
  `image` varchar(255) NOT NULL,
  `image_2` varchar(255) DEFAULT NULL,
  `image_3` varchar(255) DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `prix` float NOT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `presentation`, `description`, `image`, `image_2`, `image_3`, `note`, `prix`, `id_utilisateur`, `id_type`, `id_gamme`, `id_marque`, `id_generation`, `promo`, `date`, `vues`, `likey`, `id_editeur`) VALUES
(48, 'MSI Radeon RX 5700 XT MECH OC', 'La carte graphique MSI Radeon RX 5700 XT MECH OC est doté du GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA. Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. La MSI Radeon RX 5700 XT MECH OC se dote d\'un backplate robuste et profite du refroidissement MSI Torx 3.0 à deux ventilateurs pour un refroidissement optimal, un bruit contenu pour des performances optimales.', 'https://media.materiel.net/r900/products/MN0005418294_1.jpg', 'https://media.materiel.net/r900/products/MN0005418296_1.jpg', 'https://media.materiel.net/r900/products/MN0005418299_1.jpg', NULL, 619, 4, 27, 21, 3, 0, NULL, '2021-03-05', '0', NULL, 1),
(45, 'ASRock Radeon RX 5700 XT Taichi X OC+', 'Reposant sur la nouvelle architecture AMD RDNA, la carte graphique ASRock Radeon RX 5700 XT Taichi X OC+ est pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. La ASRock Radeon RX 5700 XT Taichi X se dote d\'un look massif, d\'une backplate robuste et profite du refroidissement triple ventilateurs Taichi pour un refroidissement optimal, un bruit contenu pour des performances optimales.', 'https://media.materiel.net/r900/products/MN0005688570_1.jpg', 'https://media.materiel.net/r900/products/MN0005688571_1.jpg', 'https://media.materiel.net/r900/products/MN0005688575_1.jpg', NULL, 584, 4, 27, 21, 3, 0, NULL, '2021-03-05', '1', NULL, 4),
(46, 'Asus Radeon RX 5700 XT ROG STRIX OC', 'Avec la carte graphique Asus Radeon RX 5700 XT ROG STRIX OC, faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA ! Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Carénage renforcé, triple ventilateurs STRIX, dissipateur élargi avec une large surface couvrant le GPU, Asus Aura Sync : pas de doute, Asus vous propose ici un modèle haut de gamme pensé pour un refroidissement et un silence optimal.', 'https://media.materiel.net/r900/products/MN0005421579_1.jpg', 'https://media.materiel.net/r900/products/MN0005421582_1.jpg', 'https://media.materiel.net/r900/products/MN0005421584_1.jpg', NULL, 589, 4, 27, 21, 3, 0, NULL, '2021-03-05', '0', NULL, 2),
(47, 'Gigabyte Radeon RX 5700 XT GAMING OC', 'Faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA avec la carte graphique customisé Gigabyte Radeon RX 5700 XT Gaming OC (GV-R57XTGAMING OC-8GD)! Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Pour ce modèle, Gigabyte mise sur sa technologie de refroidissement WindForce 3X, 3 ventilateurs de 82 mm permettant de tempérer efficacement les composants les plus sensibles de votre carte graphique (GPU, VRAM et MOSFET) pour une stabilité totale et des performances débridées. Côté esthétique, backplate en métal au design soigné et personnalisation RGB via RGB Fusion 2.0 font de cette carte un modèle haut de gamme.', 'https://media.materiel.net/r900/products/MN0005421312_1.jpg', 'https://media.materiel.net/r900/products/MN0005421314_1.jpg', 'https://media.materiel.net/r900/products/MN0005421316_1.jpg', NULL, 479, 4, 27, 21, 3, 0, NULL, '2021-03-05', '0', NULL, 3),
(44, 'Gigabyte Radeon RX 5500 XT OC 4 Go', 'Avec la Gigabyte Radeon RX 5500 XT OC (GV-R55XTOC-4GD), faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA ! Pensée pour atteindre des performances exceptionnelles en 1080p et une efficacité énergétique excellente, la RX 5500 XT compte également sur 4 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5500 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Pour ce modèle, Gigabyte mise sur sa technologie de refroidissement WindForce 2X, 2 ventilateurs de 90 mm permettant de tempérer efficacement les composants les plus sensibles de votre carte graphique (GPU, VRAM et MOSFET) pour une stabilité totale et des performances débridées. Côté esthétique, backplate en métal au design soigné pour un modèle haut de gamme.', 'https://media.materiel.net/r900/products/MN0005548063_1.jpg', 'https://media.materiel.net/r900/products/MN0005548064_1.jpg', 'https://media.materiel.net/r900/products/MN0005548067_1.jpg', NULL, 269, 4, 27, 20, 3, 0, NULL, '2021-03-05', '1', NULL, 3),
(42, 'Asus ROG Strix 1000G - Gold', 'Asus renforce encore son offre sur le marché de l\'informatique et du gaming avec deux nouvelles alimentations PC conçues pour les PC gamer. La série ROG Strix sont des alimentations puissantes en 650 et 1000 Watts offeant une connectique très complète à l\'utilisateur afin de s\'adapter aux besoins en énergie des machines actuelles. De plus, elles obtiennent la certification 80 PLUS Gold qui récompense les alimentations performantes et économes en énergies.', 'La nouvelle alimentation Asus ROG Strix se veut très qualitative, et c\'est pluôt un pari réussi de la part de la marque. L\'alimentation dégage une puissance de 1000watts ce qui correspond aux attentes actuelles de la majorité des joueurs. Elle est principalement composée de condensateurs japonais haut de gamme pour assurer un fonctionnement efficace, ce qui assure une très bonne stabilité de l\'énergie. Elles sont aussi équipé d\'un ventilateur de 135 mm pour bien gérer le refroidissement et ainsi optimiser la durée de vie de composants, mais pas seulement elle utilise des capteurs thermiques pour permettre au ventilateur de s\'éteindre complètement à des puissances plus basses : elle reste très silencieuse.', 'https://media.materiel.net/r900/products/MN0005715189_1.jpg', 'https://media.materiel.net/r900/products/MN0005715188_1.jpg', 'https://media.materiel.net/r900/products/MN0005715192_1.jpg', NULL, 349, 4, 22, 19, 18, 0, NULL, '2021-03-05', '0', NULL, 0),
(43, 'Asus RX 5500 XT ROG STRIX OC', 'Avec la carte graphique Asus RX 5500 XT ROG STRIX OC, faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA ! Pensée pour atteindre des performances exceptionnelles en 1080p et une efficacité énergétique excellente, la RX 5500XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5500 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Le système de refroidissement de la Asus RX 5500 XT ROG STRIX OC se base sur 2 ventilateurs dernières génération pour permettre un refroidissement excellent pour des conditions de jeu optimales.', 'https://media.materiel.net/r900/products/MN0005548942_1.jpg', 'https://media.materiel.net/r900/products/MN0005548943_1.jpg', 'https://media.materiel.net/r900/products/MN0005548970_1.jpg', NULL, 339, 4, 27, 20, 3, 0, NULL, '2021-03-05', '1', NULL, 2),
(41, 'Seasonic Connect 750 - Gold', 'Seasonic dévoile ce que beaucoup attendait comme une réelle innovation dans le domaine de l\'alimentation PC : la Seasonic Connect 750. C\'est une solution jamais vue jusque là qui combine une alimentation Seasonic Prime de 750W avec la certification 80 PLUS Or avec un module de gestion des câbles indépendant pouvant se fixer au meilleur endroit de votre boitier. Le montage et le câble management sont grandement simplifier pour le bonheur des passionnés de PC.', 'L\'alimentation Seasonic Connect 750 est le résultat de la cellule recherche et développement de Seasonic. Il propose un système d\'alimentation pour votre PC entièrement modulaire équipé du Connect device indépendant qui permet de fixer ses câbles plus facilement. Ce bloc d\'alimentation vous offre une puissance de 750W ce qui est très bien pour une configuration gamer musclée ou pour une station de travail exigeante comme pour lles professionnels de l\'image.', 'https://media.materiel.net/r900/products/MN0005631141_1.jpg', 'https://media.materiel.net/r900/products/MN0005631146_1.jpg', 'https://media.materiel.net/r900/products/MN0005631144_1.jpg', NULL, 179, 4, 22, 18, 16, 0, NULL, '2021-03-05', '2', NULL, 0),
(40, 'Antec High Current Gamer HCG-750W Gold', 'Photos non contractuelles La gamme HCG (High Current Gaming) revient en version Gold et full modulaire. Conçu pour une utilisation intensive, le bloc Antec HCG fut plébiscité pour son efficacité redoutable en conditions de jeux. Les connecteurs ainsi que le câblage des alimentations HCG Gold permettent d\'atteindre des niveaux de performance très élevés.', 'Bâtie sur une architecture exclusive, le bloc Antec HCG Gold affiche une qualité de fabrication irréprochable grâce à l\'intégration de condensateurs haut de gamme japonais. Ce modèle 750W est constitué d\'un solide rail +12V de 62A, parfait pour supporter efficacement la puissance de votre carte graphique et le reste de vos composants. Ce modèle destiné aux amateurs et avertis de jeux-vidéo assure une distribution aussi stable qu\'efficace du courant ; en témoigne sa certification 80+ Gold  atteignant jusqu\'à 92% d\'efficience. Ce bloc fait partie du programme AQ10 du constructeur et bénéficie à ce titre d\'une garantie de 10 ans et d\'une assistance 24h/24h et 7j/7j de la part d\'Antec. Signe de la confiance du constructeur dans son produit.', 'https://media.materiel.net/r900/oproducts/AR201802070011_g8.jpg', 'https://media.materiel.net/r900/oproducts/AR201802070011_g1.jpg', 'https://media.materiel.net/r900/oproducts/AR201802070011_g7.jpg', NULL, 144, 4, 22, 18, 17, 0, NULL, '2021-03-05', '2', NULL, 0),
(38, 'Cooler Master V550 SFX - Gold', 'Le bloc d\'alimentation Cooler Master V550 SFX permet de donner toute la puissance nécessaire à votre PC pour un bon fonctionnement et des performances remarquables. Avec 550 Watts et une certification 80 PLUS Or, c\'est idéal pour un pc de travail ou une configuration gamer.', 'Le bloc d\'alimentation Cooler Master V550 SFX permet de donner la puissance nécessaire à votre PC pour un bon fonctionnement pour de hautes performances. Avec 550 Watts, c\'est idéal pour un pc de travail ou une configuration gamer qui va vous époustoufler. Il dispose d\'une certification 80PLUS Or qui récompense les alimentations avec un haut taux de rendement et économe en énergie. Il dispose d\'un connecteur +12V (Alimentation P8 - 2 x P4), un connecteur EPS 8pin supplémentaire, de huit connecteurs d\'alimentation Serial ATA, d\'un conecteur ATX 24 Broches, de quatre molex (4 broches) Femelle et de 4 connecteurs PCI Express 6 + 2 Broches.  Elle se fait discrète avec son format compact SFX et ses câbles totalement noirs. De plus, celle-ci est totalement modulaire, ne gardez que les câbles utiles à votre montage, c\'est simple et sans surplus. Elle se refroidit aussi très efficacement avec un ventilateur de 92 mm HDB à réduction de bruit. L\'alimentation dispose aussi d\'une garantie de 10 ans : un gage de qualité !', 'https://media.materiel.net/r900/products/MN0005755105_1.jpg', 'https://media.materiel.net/r900/products/MN0005755106_1.jpg', 'https://media.materiel.net/r900/products/MN0005755109_1.jpg', NULL, 139, 4, 22, 16, 15, 0, NULL, '2021-03-05', '2', NULL, 0),
(39, 'Seasonic Prime TX-650 - Titanium', 'Offrez-vous l\'excellence avec cette nouvelle gamme d\'alimentations pour PC. Les Prime TX sont dans la continuité de la gamme Seasonic, ce sont des alimentations puissantes extrêmement fiables et surtout très silencieuse. La certification 80 PLUS Titanium permet de conserver un très taux de charge et donc un haut niveau de performance quelque soit l\'utilisation: Elle est idéale comme alimentation pour PC gamer ou les stations de travail.', 'Seasonic fait parler son expérience en matière de conception d\'alimentations avec cette nouvelle gamme Prime TX . Retrouvez des alimentations pour PC irréprochables sur le plan technique avec une puissance allant de 650 à 1000 Watts. Les alimentations Seasonic sont conçues avec des matériaux de grande qualité, par exemple les ventilateurs à roulement hydrodynamique permettent de refroidir en silence et générent moins de chaleur en fonctionnement.  Le contrôle hybride du ventilateur permet de réduire drastiquement le bruit émis par l\'alimentation pour en faire l\'une des plus silencieuse du marché, la Prime TX-650 est idéale pour une configuration haute performance notamment pour un PC gamer.  Cette unité d\'alimentation bénéficie d\'un mode Prenium Hybrid fan Control ce qui permet de réduire grandement le bruit émis par l\'alimentation. En dessous de 40% de charge le ventilateur n\'est pas activé donc le bloc est en mode 0 décibel, parfait lorsque vous voulez une configuration silencieuse.', 'https://media.materiel.net/r900/products/MN0005592442_1.jpg', 'https://media.materiel.net/r900/products/MN0005592443_1.jpg', 'https://media.materiel.net/r900/products/MN0005592445_1.jpg', NULL, 229, 4, 22, 17, 16, 0, NULL, '2021-03-05', '2', NULL, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `nom`, `image`, `description`) VALUES
(1, 'Msi', 'https://www.electroguide.com/images/icones-marques/logo-msi.jpg', 'En tant que marque leader du secteur informatique, MSI continue à placer la barre très haut en termes de design et d\'innovation de ses produits de gamme Gaming. Ces efforts ont d\'ailleurs résulté en un sponsoring de plusieurs équipes de eSport. La collaboration entre les services de recherche et développement et les joueurs professionnels a permis la création de nombre des produits MSI Gaming actuellement sur le marché.'),
(2, 'ASUS', 'https://logo-marque.com/wp-content/uploads/2020/07/Asus-Logo.png', 'AsusTeK Computer, Inc. est une entreprise taïwanaise qui produit des cartes mères, des cartes graphiques, des lecteurs optiques, des assistants personnels, des ordinateurs portables, des ordinateurs de bureau, des périphériques réseau, des téléphones portables, des boîtiers et des systèmes de refroidissement d’ordinateurs.'),
(3, 'GigaByte', 'https://www.portables4gamers.com/wp-content/uploads/2014/06/gigabyte-logo.jpg', 'Gigabyte Technology est une société de matériel informatique basée à Taïwan, fondée en 1986. La société fait partie des plus grands constructeurs de matériel informatique au monde et emploie plus de 7 000 personnes. Elle est implantée en France depuis 2003 sous le nom GIGABYTE Technology France.'),
(4, 'ASRock', 'https://img.generation-nt.com/logo-asrock_012C00C801401202.png', 'ASRock Inc. est un fabricant de cartes mères, de systèmes industriels et de Home Theater Personal Computer basé à Taiwan et dirigé par Ted Hsu. La société a été créée en 2002 et est actuellement intégrée à la Pegatron Corporation.');

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cette table permet un tri facultatif selon l''article';

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
(14, 'I-3', 29, 2, NULL),
(16, '550', 22, 15, NULL),
(17, '650', 22, 16, 0),
(18, '750', 22, 17, 0),
(19, '1000', 22, 0, 0),
(20, '5500', 27, 3, 0),
(21, '5700', 27, 3, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `generation`
--

INSERT INTO `generation` (`id`, `nom`, `id_type`, `id_marque`) VALUES
(1, 'RTX 3000', 1, 1),
(2, 'Intel 10th', 5, 2),
(4, 'Intel 8th', 29, 2),
(5, 'Intel 9th', 29, 2),
(6, 'Intel 7th', 29, 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `marque`
--

INSERT INTO `marque` (`id`, `nom`, `image`, `description`) VALUES
(1, 'NVIDIA', 'https://www.ginjfo.com/wp-content/uploads/2015/12/Nvidia-1200x720.jpg', 'jkhfgjhfgj'),
(2, 'Intel', 'https://www.presse-citron.net/app/uploads/2020/09/intel-core-11e-gen.jpg', 'intel c bien'),
(3, 'AMD', 'https://www.netcost-security.fr/wp-content/uploads/2020/12/amd-logo.jpg', 'concurrent intel nvidia'),
(7, 'Corsair', 'https://ih1.redbubble.net/image.509899309.3494/fpp,small,lustre,wall_texture,product,750x1000.u8.jpg', 'Corsair est un intégrateur de mémoire vive : le fabricant intègre sur ses circuits imprimés des séries de modules mémoires issues de constructeurs tels que Siemens et Samsung. Corsair produit également des claviers dédiés pour le gaming (Corsair K55 par ex.), des boitiers de PC fixe pour le gaming (Corsair Carbide par ex.) etc...'),
(8, 'Noctua', 'https://upload.wikimedia.org/wikipedia/fr/6/6e/Noctua_logo.jpg', 'Noctua est une entreprise spécialisée dans la conception et la production de matériel de refroidissement pour PC.\r\n\r\nC\'est une coentreprise entre Rascom Computer Distribution GmbH et Kolink International Corporation.\r\n\r\nLe logo de la société représente une chouette, une chevêche d\'Athéna, dont le nom scientifique est Athene Noctua.'),
(15, 'Cooler Master', 'https://upload.wikimedia.org/wikipedia/commons/0/03/Cm-logo-200x200.jpg', 'Cooler Master, Co. Ltd. est un constructeur de matériel informatique spécialisé dans les boîtiers d\'ordinateurs. Depuis sa création en 1992, Cooler Master est devenu l’un des leaders mondiaux dans le domaine des systèmes de refroidissement.'),
(16, 'Seasonic', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRK3Snhfq8LKcbnXTTdkw6unwChs8c9cSsEsQ&usqp=CAU', 'Sea Sonic Electronics Co Ltd. est une société taïwanaise d\'électronique de puissance, fondée en 1975. Elle produit d\'abord des blocs d\'alimentation pour Apple II, ainsi que IBM PC. Aujourd\'hui, elle commercialise des blocs d\'alimentation plutôt orientés vers le haut de gamme bénéficiant d\'une bonne réputation dans le milieu des hobbyistes en informatique. Antec, XFX, Corsair Memory, LDLC et d\'autres compagnies vendent des blocs d\'alimentation qui sont basés ou faits par Sea Sonic. Tous leurs blocs sont certifiés 80 PLUS.'),
(17, 'Antel', 'https://upload.wikimedia.org/wikipedia/commons/8/86/Antec_Logo_2012.png', 'Antec, Inc. est un constructeur de composants et accessoires informatiques sur le marché de l’assemblage, aussi appelé DIY (Do-It-Yourself). Elle propose aussi une ligne d’accessoires comme des ventilateurs LED.'),
(18, 'ASUS', 'https://logo-marque.com/wp-content/uploads/2020/07/Asus-Logo.png', 'AsusTeK Computer, Inc. est une entreprise taïwanaise qui produit des cartes mères, des cartes graphiques, des lecteurs optiques, des assistants personnels, des ordinateurs portables, des ordinateurs de bureau, des périphériques réseau, des téléphones portables, des boîtiers et des systèmes de refroidissement d’ordinateurs.'),
(19, 'Gigabyte', 'https://www.portables4gamers.com/wp-content/uploads/2014/06/gigabyte-logo.jpg', 'Gigabyte Technology est une société de matériel informatique basée à Taïwan, fondée en 1986. La société fait partie des plus grands constructeurs de matériel informatique au monde et emploie plus de 7 000 personnes. Elle est implantée en France depuis 2003 sous le nom GIGABYTE Technology France.'),
(20, 'ASRock', 'https://img.generation-nt.com/logo-asrock_012C00C801401202.png', 'ASRock Inc. est un fabricant de cartes mères, de systèmes industriels et de Home Theater Personal Computer basé à Taiwan et dirigé par Ted Hsu. La société a été créée en 2002 et est actuellement intégrée à la Pegatron Corporation.');

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
-- Structure de la table `type_article`
--

DROP TABLE IF EXISTS `type_article`;
CREATE TABLE IF NOT EXISTS `type_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `type_article`
--

INSERT INTO `type_article` (`id`, `type`) VALUES
(1, 'RAM'),
(2, 'RAM'),
(3, 'RAM'),
(4, 'RAM');

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `email`, `password`, `image`, `id_droits`, `anniversaire`) VALUES
(3, NULL, NULL, 'TestTest', 'TestTest@ok.fr', '$2y$10$487VcE6QPmC6u633DBKvV.phhbze9NYdZAw6dJIz96gxYMUsam/Ou', 'https://drone-geofencing.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png', 1, NULL),
(4, NULL, NULL, 'HARDJOJOJ', 'HARDJOJOJ@HARDJOJOJ.HARDJOJOJ', '$2y$10$/al.NlaH47M0a751YGTWCe5Z/Q92i0V5qfAajozb7ydcusXVy5joC', 'https://drone-geofencing.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png', 1, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=126 DEFAULT CHARSET=latin1;

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
(77, 14, 2),
(78, 8, 4),
(79, 14, 4),
(80, 8, 4),
(81, 14, 4),
(82, 19, 4),
(83, 22, 4),
(84, 24, 4),
(85, 24, 4),
(86, 23, 4),
(87, 35, 4),
(88, 25, 4),
(89, 26, 4),
(90, 27, 4),
(91, 26, 4),
(92, 24, 4),
(93, 245, 4),
(94, 25, 4),
(95, 26, 4),
(96, 25, 4),
(97, 245, 4),
(98, 24, 4),
(99, 24, 4),
(100, 24, 4),
(101, 24, 4),
(102, 33, 4),
(103, 33, 4),
(104, 33, 4),
(105, 33, 4),
(106, 33, 4),
(107, 33, 4),
(108, 33, 4),
(109, 24, 4),
(110, 26, 4),
(111, 26, 4),
(112, 37, 4),
(113, 37, 4),
(114, 37, 4),
(115, 41, 4),
(116, 39, 4),
(117, 38, 4),
(118, 40, 4),
(119, 39, 4),
(120, 41, 4),
(121, 38, 4),
(122, 40, 4),
(123, 43, 4),
(124, 44, 4),
(125, 45, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
