-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 28 mars 2021 à 21:02
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `boutique`
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
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `adresse`
--

INSERT INTO `adresse` (`id`, `id_utilisateur`, `nom`, `prenom`, `batiment`, `rue`, `code_postal`, `pays`, `ville`, `info_sup`, `tel`) VALUES
(26, 1, 'Verguldezoone', 'Joris', '7 résidence Le Club', '139 François Mauriac', 13002, 'marseille', 'France', 'faut passer la rue du Dr Riera', 770739000),
(27, 1, 'Verguldezoone', 'Joris', '7 résidence Le Club', '139 François Mauriac', 13002, 'marseille', 'France', 'faut passer la rue du Dr Riera', 770739000),
(65, 1, 'Verguldezoone', 'Verguldezoone', 'Verguldezoone', 'Verguldezoone', 54254354, 'Verguldezoone', 'Verguldezoone', 'Verguldezoone', 654455000),
(67, 3, 'azertya', 'azertya', '7 résidence Le Club', '139 François Mauriac', 1111111, 'azertya', 'France', 'faut passer la rue du Dr Riera', 111111000),
(68, 3, 'azertya', 'azertya', '7 résidence Le Club', '139 François Mauriac', 1111111, 'azertya', 'France', 'faut passer la rue du Dr Riera', 111111000),
(85, 3, 'azertya', 'azertya', '7 résidence Le Club', '139 François Mauriac', 1111111, 'azertya', 'France', 'faut passer la rue du Dr Riera', 111111000);

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
) ENGINE=MyISAM AUTO_INCREMENT=73 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `presentation`, `description`, `image`, `image_2`, `image_3`, `note`, `prix`, `id_utilisateur`, `id_type`, `id_gamme`, `id_marque`, `id_generation`, `promo`, `date`, `vues`, `likey`, `id_editeur`) VALUES
(48, 'MSI Radeon RX 5700 XT MECH OC', 'La carte graphique MSI Radeon RX 5700 XT MECH OC est doté du GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA. Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l', 'https://media.materiel.net/r900/products/MN0005418294_1.jpg', 'https://media.materiel.net/r900/products/MN0005418296_1.jpg', 'https://media.materiel.net/r900/products/MN0005418299_1.jpg', 0, 619, 4, 27, 21, 3, 13, 0, '2021-03-05', '0', '', 1),
(50, 'GeForce GT 1030, 1265 MHz, PCI-Express 16x, 2 Go', 'Carte graphique compacte, la Gigabyte GeForce GT 1030 OC 2G se destine tout particulièrement à la création d', 'Les portes du multimédia  La carte graphique Gigabyte GeForce GT 1030 OC 2G assure à votre PC des performances multimédia supérieures à la plupart des iGP (coeurs graphiques intégrés aux processeurs). Que vous cherchiez à monter un HTPC ou un ordinateur dédié au multimédia, le format \"low-profile\" de sa carte rendra son intégration facile vous permettant de ne réaliser aucun compromis sur le choix de vos composants. Gigabyte a doté cette carte d', 'https://images-na.ssl-images-amazon.com/images/I/61p1MvrEYIL._AC_SX425_.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRhgVX6lAgO-EZwTiOQ_1NNa3q3bx6gTuoxpfPo0Ndx98ncVaNMkSX8ga7jwTRe5rSWkAU&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRr_7XeZHj_9t2VhBuWnbFz_2c3vQpSQWNqXugPLbNawNI2Mav8cqYfxRlZwPMhT_dGb_s&usqp=CAU', 0, 95, 4, 27, 25, 1, 16, 0, '2021-03-23', '3', '', 3),
(45, 'ASRock Radeon RX 5700 XT Taichi X OC+', 'Reposant sur la nouvelle architecture AMD RDNA, la carte graphique ASRock Radeon RX 5700 XT Taichi X OC+ est pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. La ASRock Radeon RX 5700 XT Taichi X se dote d\'un look massif, d\'une backplate robuste et profite du refroidissement triple ventilateurs Taichi pour un refroidissement optimal, un bruit contenu pour des performances optimales.', 'https://media.materiel.net/r900/products/MN0005688570_1.jpg', 'https://media.materiel.net/r900/products/MN0005688571_1.jpg', 'https://media.materiel.net/r900/products/MN0005688575_1.jpg', NULL, 584, 4, 27, 21, 3, 13, NULL, '2021-03-05', '2', NULL, 4),
(46, 'Asus Radeon RX 5700 XT ROG STRIX OC', 'Avec la carte graphique Asus Radeon RX 5700 XT ROG STRIX OC, faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA ! Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Carénage renforcé, triple ventilateurs STRIX, dissipateur élargi avec une large surface couvrant le GPU, Asus Aura Sync : pas de doute, Asus vous propose ici un modèle haut de gamme pensé pour un refroidissement et un silence optimal.', 'https://media.materiel.net/r900/products/MN0005421579_1.jpg', 'https://media.materiel.net/r900/products/MN0005421582_1.jpg', 'https://media.materiel.net/r900/products/MN0005421584_1.jpg', NULL, 589, 4, 27, 21, 3, 13, NULL, '2021-03-05', '0', NULL, 2),
(47, 'Gigabyte Radeon RX 5700 XT GAMING OC', 'Faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA avec la carte graphique customisé Gigabyte Radeon RX 5700 XT Gaming OC (GV-R57XTGAMING OC-8GD)! Pensée pour atteindre des performances exceptionnelles en 1440p et une efficacité énergétique excellente, la RX 5700 XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5700 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Pour ce modèle, Gigabyte mise sur sa technologie de refroidissement WindForce 3X, 3 ventilateurs de 82 mm permettant de tempérer efficacement les composants les plus sensibles de votre carte graphique (GPU, VRAM et MOSFET) pour une stabilité totale et des performances débridées. Côté esthétique, backplate en métal au design soigné et personnalisation RGB via RGB Fusion 2.0 font de cette carte un modèle haut de gamme.', 'https://media.materiel.net/r900/products/MN0005421312_1.jpg', 'https://media.materiel.net/r900/products/MN0005421314_1.jpg', 'https://media.materiel.net/r900/products/MN0005421316_1.jpg', NULL, 479, 4, 27, 21, 3, 13, NULL, '2021-03-05', '0', NULL, 3),
(44, 'Gigabyte Radeon RX 5500 XT OC 4 Go', 'Avec la Gigabyte Radeon RX 5500 XT OC (GV-R55XTOC-4GD), faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA ! Pensée pour atteindre des performances exceptionnelles en 1080p et une efficacité énergétique excellente, la RX 5500 XT compte également sur 4 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5500 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Pour ce modèle, Gigabyte mise sur sa technologie de refroidissement WindForce 2X, 2 ventilateurs de 90 mm permettant de tempérer efficacement les composants les plus sensibles de votre carte graphique (GPU, VRAM et MOSFET) pour une stabilité totale et des performances débridées. Côté esthétique, backplate en métal au design soigné pour un modèle haut de gamme.', 'https://media.materiel.net/r900/products/MN0005548063_1.jpg', 'https://media.materiel.net/r900/products/MN0005548064_1.jpg', 'https://media.materiel.net/r900/products/MN0005548067_1.jpg', NULL, 269, 4, 27, 20, 3, 13, NULL, '2021-03-05', '1', NULL, 3),
(42, 'Asus ROG Strix 1000G - Gold', 'Asus renforce encore son offre sur le marché de l\'informatique et du gaming avec deux nouvelles alimentations PC conçues pour les PC gamer. La série ROG Strix sont des alimentations puissantes en 650 et 1000 Watts offeant une connectique très complète à l\'utilisateur afin de s\'adapter aux besoins en énergie des machines actuelles. De plus, elles obtiennent la certification 80 PLUS Gold qui récompense les alimentations performantes et économes en énergies.', 'La nouvelle alimentation Asus ROG Strix se veut très qualitative, et c\'est pluôt un pari réussi de la part de la marque. L\'alimentation dégage une puissance de 1000watts ce qui correspond aux attentes actuelles de la majorité des joueurs. Elle est principalement composée de condensateurs japonais haut de gamme pour assurer un fonctionnement efficace, ce qui assure une très bonne stabilité de l\'énergie. Elles sont aussi équipé d\'un ventilateur de 135 mm pour bien gérer le refroidissement et ainsi optimiser la durée de vie de composants, mais pas seulement elle utilise des capteurs thermiques pour permettre au ventilateur de s\'éteindre complètement à des puissances plus basses : elle reste très silencieuse.', 'https://media.materiel.net/r900/products/MN0005715189_1.jpg', 'https://media.materiel.net/r900/products/MN0005715188_1.jpg', 'https://media.materiel.net/r900/products/MN0005715192_1.jpg', NULL, 349, 4, 22, 19, 18, 0, NULL, '2021-03-05', '0', NULL, 0),
(43, 'Asus RX 5500 XT ROG STRIX OC', 'Avec la carte graphique Asus RX 5500 XT ROG STRIX OC, faites place aux nouveaux GPU AMD Radeon Navi reposant sur la nouvelle architecture RDNA ! Pensée pour atteindre des performances exceptionnelles en 1080p et une efficacité énergétique excellente, la RX 5500XT compte également sur 8 Go de mémoire GDDR6 et sur la prise en charge du PCI Express 4.0 pour vous offrir une expérience de jeu ultra-confortable.', 'Les cartes graphiques Radeon RX 5500 XT sont basées sur RDNA, l\'architecture de GPU gaming d’AMD avec une finesse de gravure de 7 nm, qui annonce un gain d\'efficacité de 1,5 en termes de performance par watt et 1,25 d\'amélioration du nombre d\'instruction par cycle par rapport à la génération en 14 nm précédente. En clair pour les joueurs PC : plus de performances, moins d\'énergie consommée. Le système de refroidissement de la Asus RX 5500 XT ROG STRIX OC se base sur 2 ventilateurs dernières génération pour permettre un refroidissement excellent pour des conditions de jeu optimales.', 'https://media.materiel.net/r900/products/MN0005548942_1.jpg', 'https://media.materiel.net/r900/products/MN0005548943_1.jpg', 'https://media.materiel.net/r900/products/MN0005548970_1.jpg', NULL, 339, 4, 27, 20, 3, 13, NULL, '2021-03-05', '1', NULL, 2),
(41, 'Seasonic Connect 750 - Gold', 'Seasonic dévoile ce que beaucoup attendait comme une réelle innovation dans le domaine de l\'alimentation PC : la Seasonic Connect 750. C\'est une solution jamais vue jusque là qui combine une alimentation Seasonic Prime de 750W avec la certification 80 PLUS Or avec un module de gestion des câbles indépendant pouvant se fixer au meilleur endroit de votre boitier. Le montage et le câble management sont grandement simplifier pour le bonheur des passionnés de PC.', 'L\'alimentation Seasonic Connect 750 est le résultat de la cellule recherche et développement de Seasonic. Il propose un système d\'alimentation pour votre PC entièrement modulaire équipé du Connect device indépendant qui permet de fixer ses câbles plus facilement. Ce bloc d\'alimentation vous offre une puissance de 750W ce qui est très bien pour une configuration gamer musclée ou pour une station de travail exigeante comme pour lles professionnels de l\'image.', 'https://media.materiel.net/r900/products/MN0005631141_1.jpg', 'https://media.materiel.net/r900/products/MN0005631146_1.jpg', 'https://media.materiel.net/r900/products/MN0005631144_1.jpg', NULL, 179, 4, 22, 18, 16, 0, NULL, '2021-03-05', '2', NULL, 0),
(40, 'Antec High Current Gamer HCG-750W Gold', 'Photos non contractuelles La gamme HCG (High Current Gaming) revient en version Gold et full modulaire. Conçu pour une utilisation intensive, le bloc Antec HCG fut plébiscité pour son efficacité redoutable en conditions de jeux. Les connecteurs ainsi que le câblage des alimentations HCG Gold permettent d\'atteindre des niveaux de performance très élevés.', 'Bâtie sur une architecture exclusive, le bloc Antec HCG Gold affiche une qualité de fabrication irréprochable grâce à l\'intégration de condensateurs haut de gamme japonais. Ce modèle 750W est constitué d\'un solide rail +12V de 62A, parfait pour supporter efficacement la puissance de votre carte graphique et le reste de vos composants. Ce modèle destiné aux amateurs et avertis de jeux-vidéo assure une distribution aussi stable qu\'efficace du courant ; en témoigne sa certification 80+ Gold  atteignant jusqu\'à 92% d\'efficience. Ce bloc fait partie du programme AQ10 du constructeur et bénéficie à ce titre d\'une garantie de 10 ans et d\'une assistance 24h/24h et 7j/7j de la part d\'Antec. Signe de la confiance du constructeur dans son produit.', 'https://media.materiel.net/r900/oproducts/AR201802070011_g8.jpg', 'https://media.materiel.net/r900/oproducts/AR201802070011_g1.jpg', 'https://media.materiel.net/r900/oproducts/AR201802070011_g7.jpg', NULL, 144, 4, 22, 18, 17, 0, NULL, '2021-03-05', '2', NULL, 0),
(38, 'Cooler Master V550 SFX - Gold', 'Le bloc d\'alimentation Cooler Master V550 SFX permet de donner toute la puissance nécessaire à votre PC pour un bon fonctionnement et des performances remarquables. Avec 550 Watts et une certification 80 PLUS Or, c\'est idéal pour un pc de travail ou une configuration gamer.', 'Le bloc d\'alimentation Cooler Master V550 SFX permet de donner la puissance nécessaire à votre PC pour un bon fonctionnement pour de hautes performances. Avec 550 Watts, c\'est idéal pour un pc de travail ou une configuration gamer qui va vous époustoufler. Il dispose d\'une certification 80PLUS Or qui récompense les alimentations avec un haut taux de rendement et économe en énergie. Il dispose d\'un connecteur +12V (Alimentation P8 - 2 x P4), un connecteur EPS 8pin supplémentaire, de huit connecteurs d\'alimentation Serial ATA, d\'un conecteur ATX 24 Broches, de quatre molex (4 broches) Femelle et de 4 connecteurs PCI Express 6 + 2 Broches.  Elle se fait discrète avec son format compact SFX et ses câbles totalement noirs. De plus, celle-ci est totalement modulaire, ne gardez que les câbles utiles à votre montage, c\'est simple et sans surplus. Elle se refroidit aussi très efficacement avec un ventilateur de 92 mm HDB à réduction de bruit. L\'alimentation dispose aussi d\'une garantie de 10 ans : un gage de qualité !', 'https://media.materiel.net/r900/products/MN0005755105_1.jpg', 'https://media.materiel.net/r900/products/MN0005755106_1.jpg', 'https://media.materiel.net/r900/products/MN0005755109_1.jpg', NULL, 139, 4, 22, 16, 15, 0, NULL, '2021-03-05', '2', NULL, 0),
(39, 'Seasonic Prime TX-650 - Titanium', 'Offrez-vous l\'excellence avec cette nouvelle gamme d\'alimentations pour PC. Les Prime TX sont dans la continuité de la gamme Seasonic, ce sont des alimentations puissantes extrêmement fiables et surtout très silencieuse. La certification 80 PLUS Titanium permet de conserver un très taux de charge et donc un haut niveau de performance quelque soit l\'utilisation: Elle est idéale comme alimentation pour PC gamer ou les stations de travail.', 'Seasonic fait parler son expérience en matière de conception d\'alimentations avec cette nouvelle gamme Prime TX . Retrouvez des alimentations pour PC irréprochables sur le plan technique avec une puissance allant de 650 à 1000 Watts. Les alimentations Seasonic sont conçues avec des matériaux de grande qualité, par exemple les ventilateurs à roulement hydrodynamique permettent de refroidir en silence et générent moins de chaleur en fonctionnement.  Le contrôle hybride du ventilateur permet de réduire drastiquement le bruit émis par l\'alimentation pour en faire l\'une des plus silencieuse du marché, la Prime TX-650 est idéale pour une configuration haute performance notamment pour un PC gamer.  Cette unité d\'alimentation bénéficie d\'un mode Prenium Hybrid fan Control ce qui permet de réduire grandement le bruit émis par l\'alimentation. En dessous de 40% de charge le ventilateur n\'est pas activé donc le bloc est en mode 0 décibel, parfait lorsque vous voulez une configuration silencieuse.', 'https://media.materiel.net/r900/products/MN0005592442_1.jpg', 'https://media.materiel.net/r900/products/MN0005592443_1.jpg', 'https://media.materiel.net/r900/products/MN0005592445_1.jpg', NULL, 229, 4, 22, 17, 16, 0, NULL, '2021-03-05', '2', NULL, 0),
(51, 'GeForce GT 1030, 1265 MHz, PCI-Express 16x, 2 Go', 'Nvidia nous présente sa nouvelle carte graphique, la GeForce GT 1030 Low Profile par MSI destinée à remplacer avec brio et efficacité la GT 730. Positionnée entrée de gamme des GeForce 10, la GeForce GT 1030 est destinée à une utilisation multimédia et jeux peu gourmands.', 'La Haute Définition nouvelle génération avec la GT 1030 ! Basée sur l\'architecture Kepler de NVIDIA, la GeForce GT 1030 passive et low profile MSI (GEFORCE GT 1030 2GH LP OC) arrive avec pas moins de 384 coeurs CUDA qui délivreront leur puissance de calcul et accélèreront les performances de votre PC. Grâce à ses 2 sorties vidéo (HDMI et DisplayPort) la MSI GT 1030 se connectera à tous vos périphériques et pourra gérer jusqu\'à 2 écrans HD. La GeForce GT 1030 est équipée de 2 Go de mémoire GDDR5 qui viendront apporter fluidité et rapidité à votre configuration. Compatible avec DirectX 12, la MSI GeForce GT 1030 (GEFORCE GT 1030 2GH LP OC) atteint les 1265 MHz et est taillée pour une utilisation régulière que ce soit dans une configuration destinée au Home-Cinema ou au jeu. Autre avantage non négligeable, elle ne nécessite pas de câble d\'alimentation et est auto alimentée via le port PCI Express de la carte mère.', 'https://images-na.ssl-images-amazon.com/images/I/41yShmpHyBL._AC_.jpg', 'https://images-na.ssl-images-amazon.com/images/I/41yShmpHyBL._AC_.jpg', 'https://www.cdiscount.com/pdt2/2/g/o/1/700x700/gt1030aeroitx2go/rw/msi-carte-graphique-geforce-r-gt-1030-aero-itx-2g.jpg', NULL, 95, 4, 27, 25, 1, 16, NULL, '2021-03-23', '22', NULL, 1),
(52, 'GeForce GTX 1660 Super, PCI-Express 16x', 'Mettez à niveau votre configuration PC gaming avec la carte graphique Asus TUF GeForce GTX 1660 SUPER OC. Misant sur des performances en hausse par rapport à la 1660 grâce à 6 Go de mémoire GDDR6, elle compte également sur la nouvelle architecture NVIDIA et ses shaders Turing pour proposer une expérience de jeu Full HD / 1080p des plus confortable et à prix accessible.', 'L\'architecture Turing accessible La carte graphique Asus GeForce GTX 1660 SUPER est propulsée par l\'architecture Turing, placée entre la GTX 1660 et la 1660 Ti en termes de performances, la carte graphique GeForce GTX 1660 SUPER compte 1408 coeurs CUDA (comme la 1660) mais elle se démarque par 6 Go de mémoire GDDR6 à 14Gbps (contre de la GDDR5 à 8 Gbps pour la 1660) pour un gain de bande passante supplémentaire, sur un même bus 192-Bit. Grâce à ces caractéristiques, la GTX 1660 Super se rend maîtresse du jeu en 1080p. Le bon équilibre prix-performances pour qui souhaite se construire une configuration gaming à prix contenu. Au menu des innovations, la GTX 1660 SUPER compte sur les shaders Turing pour vous faire profiter de fonctionnalités graphiques avancées.', 'https://images-na.ssl-images-amazon.com/images/I/61-qh4qbYSL._AC_SL1000_.jpg', 'https://images-na.ssl-images-amazon.com/images/I/91V41TXra%2BL._AC_SL1500_.jpg', 'https://images-na.ssl-images-amazon.com/images/I/91iC3Wi4TUL._AC_SL1500_.jpg', NULL, 309, 4, 27, 9, 1, 16, NULL, '2021-03-23', '0', NULL, 1),
(53, 'GeForce GTX 1660 Super, EVGA 6 Go GDDR6', 'Préparez votre configuration PC gamer à accueillir la carte graphique EVGA GeForce GTX 1660 Super SC Ultra (06G-P4-1068-KR) ! Misant sur des performances en hausse par rapport à la 1660 grâce à 6 Go de mémoire GDDR6, elle compte également sur la nouvelle architecture NVIDIA et ses shaders Turing pour proposer une expérience de jeu Full HD / 1080p des plus confortable et à prix accessible.', 'L\'architecture Turing accessible La carte graphique Gigabyte GTX 1660 SUPER SC Ultra est propulsée par l\'architecture Turing, placée entre la GTX 1660 et la 1660 Ti en termes de performances, la carte graphique GeForce GTX 1660 SUPER compte 1408 coeurs CUDA (comme la 1660) mais elle se démarque par 6 Go de mémoire GDDR6 à 14Gbps (contre de la GDDR5 à 8 Gbps pour la 1660) pour un gain de bande passante supplémentaire, sur un même bus 192-Bi.. Grâce à ces caractéristiques, la GTX 1660 Super se rend maîtresse du jeu en 1080p. Le bon équilibre prix-performances pour qui souhaite se construire une configuration gaming à prix contenu.', 'https://media.ldlc.com/r1600/ld/products/00/05/68/77/LD0005687769_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/68/77/LD0005687772_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/68/77/LD0005687771_1.jpg', NULL, 289, 4, 27, 9, 1, 16, NULL, '2021-03-23', '0', NULL, 9),
(54, 'GeForce GTX 1660 Super, AORUS 6 Go GDDR6', 'Mettez à niveau votre configuration PC gaming avec la carte graphique Gigabyte Aorus GeForce GTX 1660 SUPER. Misant sur des performances en hausse par rapport à la 1660 grâce à 6 Go de mémoire GDDR6, elle compte également sur la nouvelle architecture NVIDIA et ses shaders Turing pour proposer une expérience de jeu Full HD / 1080p des plus confortable et à prix accessible.', 'L\'architecture Turing accessible La carte graphique Gigabyte Aorus GTX 1660 SUPER est propulsée par l\'architecture Turing, placée entre la GTX 1660 et la 1660 Ti en termes de performances, la carte graphique GeForce GTX 1660 SUPER compte 1408 coeurs CUDA (comme la 1660) mais elle se démarque par 6 Go de mémoire GDDR6 à 14Gbps (contre de la GDDR5 à 8 Gbps pour la 1660) pour un gain de bande passante supplémentaire, sur un même bus 192-Bi.. Grâce à ces caractéristiques, la GTX 1660 Super se rend maîtresse du jeu en 1080p. Le bon équilibre prix-performances pour qui souhaite se construire une configuration gaming à prix contenu. Au menu des innovations, la GTX 1660 compte sur les shaders Turing pour vous faire profiter de fonctionnalités graphiques avancées. Plus adaptatifs et performants dans leurs gestion des opérations, ils s\'associent à la nouvelle architecture mémoire unifiée pour vous permettre dans jouer dans les meilleures conditions aux derniers jeux du moment.', 'https://media.ldlc.com/r1600/ld/products/00/05/78/32/LD0005783260_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/78/32/LD0005783264_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/78/32/LD0005783262_1.jpg', NULL, 329, 4, 27, 9, 1, 16, NULL, '2021-03-23', '0', NULL, 10),
(55, 'GeForce GTX 1660 Super MSI 6 Go GDDR6', 'Mettez à niveau votre configuration PC gaming avec la carte graphique MSI GeForce GTX 1660 SUPER Ventus XS OC. Misant sur des performances en hausse par rapport à la 1660 grâce à 6 Go de mémoire GDDR6, elle compte également sur la nouvelle architecture NVIDIA et ses shaders Turing pour proposer une expérience de jeu Full HD / 1080p des plus confortable et à prix accessible.', 'L\'architecture Turing accessible La carte graphique MSI GeForce GTX 1660 SUPER est propulsée par l\'architecture Turing, placée entre la GTX 1660 et la 1660 Ti en termes de performances, la carte graphique GeForce GTX 1660 SUPER compte 1408 coeurs CUDA (comme la 1660) mais elle se démarque par 6 Go de mémoire GDDR6 à 14Gbps (contre de la GDDR5 à 8 Gbps pour la 1660) pour un gain de bande passante supplémentaire, sur un même bus 192-Bi.. Grâce à ces caractéristiques, la GTX 1660 Super se rend maîtresse du jeu en 1080p. Le bon équilibre prix-performances pour qui souhaite se construire une configuration gaming à prix contenu. Au menu des innovations, la GTX 1660 SUPER compte sur les shaders Turing pour vous faire profiter de fonctionnalités graphiques avancées. Plus adaptatifs et performants dans leurs gestion des opérations, ils s\'associent à la nouvelle architecture mémoire unifiée pour vous permettre dans jouer dans les meilleures conditions aux derniers jeux du moment.', 'https://media.ldlc.com/r374/ld/products/00/05/21/64/LD0005216442_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/21/64/LD0005216452_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/21/64/LD0005216447_2.jpg', NULL, 299, 4, 27, 9, 1, 16, NULL, '2021-03-23', '0', NULL, 1),
(56, 'MSI GeForce RTX 3070 VENTUS 3X 8G OC', 'La carte graphique MSI GeForce RTX 3070 VENTUS 3X 8G OC embarque 8 Go de mémoire vidéo de nouvelle génération GDDR6. Ce modèle overclocké d\'usine bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'La 2nd génération de cartes graphiques NVIDIA RTX, basée sur l\'architecture Ampère, promet aux joueurs de tout bord une expérience de jeu ultime et des performances jamais atteintes dans les jeux PC les plus réalistes et les plus immersifs. L\'amélioration des rendements des coeurs RT et Tensor ainsi que des multiprocesseurs de flux est au coeur de cette nouvelle architecture de haute technologie dont l\'unique objectif est d\'offrir une expérience de jeu ultime et exceptionnelle. Les cartes graphiques NVIDIA GeForce RTX 3000 sont tout simplement les cartes les plus puissantes jamais conçues par NVIDIA.', 'https://media.ldlc.com/r1600/ld/products/00/05/73/87/LD0005738731_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/73/87/LD0005738734_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/73/87/LD0005738733_1.jpg', NULL, 959, 4, 27, 3, 1, 1, NULL, '2021-03-23', '0', NULL, 1),
(57, 'Gigabyte AORUS GeForce RTX 3070 MASTER 8G', 'La carte graphique Gigabyte AORUS GeForce RTX 3070 MASTER 8G embarque 8 Go de mémoire vidéo de nouvelle génération GDDR6. Ce modèle overclocké d\'usine bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'La 2nd génération de cartes graphiques NVIDIA RTX, basée sur l\'architecture Ampère, promet aux joueurs de tout bord une expérience de jeu ultime et des performances jamais atteintes dans les jeux PC les plus réalistes et les plus immersifs. L\'amélioration des rendements des coeurs RT et Tensor ainsi que des multiprocesseurs de flux est au coeur de cette nouvelle architecture de haute technologie dont l\'unique objectif est d\'offrir une expérience de jeu ultime et exceptionnelle. Les cartes graphiques NVIDIA GeForce RTX 3000 sont tout simplement les cartes les plus puissantes jamais conçues par NVIDIA.', 'https://media.ldlc.com/r1600/ld/products/00/05/73/87/LD0005738721_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/73/87/LD0005738725_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/73/87/LD0005738723_1.jpg', NULL, 1099, 4, 27, 3, 1, 1, NULL, '2021-03-23', '0', NULL, 10),
(58, 'ZOTAC GeForce RTX 3070 Twin Edge OC White Edition', 'La carte graphique ZOTAC GeForce RTX 3070 Twin Edge OC White Edition embarque 8 Go de mémoire GDDR6. Ce modèle overclocké d', 'La 2nd génération de cartes graphiques NVIDIA RTX, basée sur l', 'https://media.ldlc.com/r1600/ld/products/00/05/76/61/LD0005766190_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/76/61/LD0005766199_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/76/61/LD0005766197_1.jpg', 0, 869, 4, 27, 0, 1, 1, 0, '2021-03-23', '0', '', 11),
(59, 'Gigabyte GeForce RTX 3080 GAMING OC 10G', 'La carte graphique Gigabyte GeForce RTX 3080 GAMING OC 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle overclocké d\'usine bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme', 'La 2nd génération de cartes graphiques NVIDIA RTX, basée sur l\'architecture Ampère, promet aux joueurs de tout bord une expérience de jeu ultime et des performances jamais atteintes dans les jeux PC les plus réalistes et les plus immersifs. L\'amélioration des rendements des coeurs RT et Tensor ainsi que des multiprocesseurs de flux est au coeur de cette nouvelle architecture de haute technologie dont l\'unique objectif est d\'offrir une expérience de jeu ultime et exceptionnelle. Les cartes graphiques NVIDIA GeForce RTX 3000 sont tout simplement les cartes les plus puissantes jamais conçues par NVIDIA.', 'https://media.ldlc.com/r1600/ld/products/00/05/71/64/LD0005716431_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/71/64/LD0005716434_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/71/64/LD0005716433_1.jpg', NULL, 1199, 4, 27, 4, 1, 1, NULL, '2021-03-23', '0', NULL, 3),
(60, 'MSI GeForce RTX 3080 GAMING X TRIO 10G', 'La carte graphique MSI GeForce RTX 3080 GAMING X TRIO 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'La 2nd génération de cartes graphiques NVIDIA RTX, basée sur l\'architecture Ampère, promet aux joueurs de tout bord une expérience de jeu ultime et des performances jamais atteintes dans les jeux PC les plus réalistes et les plus immersifs. L\'amélioration des rendements des coeurs RT et Tensor ainsi que des multiprocesseurs de flux est au coeur de cette nouvelle architecture de haute technologie dont l\'unique objectif est d\'offrir une expérience de jeu ultime et exceptionnelle. Les cartes graphiques NVIDIA GeForce RTX 3000 sont tout simplement les cartes les plus puissantes jamais conçues par NVIDIA.', 'https://media.ldlc.com/r1600/ld/products/00/05/73/27/LD0005732752_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/73/27/LD0005732756_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/73/27/LD0005732754_1.jpg', NULL, 1339, 4, 27, 4, 1, 1, NULL, '2021-03-23', '2', NULL, 1),
(61, 'AORUS GeForce RTX 3080 XTREME WATERFORCE 10G', 'La carte graphique Gigabyte AORUS GeForce RTX 3080 XTREME WATERFORCE 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle overclocké d\'usine bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré', 'Les cartes graphiques NVIDIA GeForce RTX 3000 sont tout simplement les cartes les plus puissantes jamais conçues par NVIDIA.   La carte graphique Gigabyte AORUS GeForce RTX 3080 XTREME WATERFORCE 10G embarque 10 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle overclocké d\'usine bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'https://media.ldlc.com/r1600/ld/products/00/05/76/53/LD0005765390_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/76/53/LD0005765394_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/76/53/LD0005765393_1.jpg', NULL, 1459, 4, 27, 4, 1, 1, NULL, '2021-03-23', '0', NULL, 10),
(62, 'MSI GeForce RTX 3090 SUPRIM X 24G', 'La carte graphique MSI GeForce RTX 3090 SUPRIM X 24G embarque 24 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'La 2nd génération de cartes graphiques NVIDIA RTX, basée sur l\'architecture Ampère, promet aux joueurs de tout bord une expérience de jeu ultime et des performances jamais atteintes dans les jeux PC les plus réalistes et les plus immersifs. L\'amélioration des rendements des coeurs RT et Tensor ainsi que des multiprocesseurs de flux est au coeur de cette nouvelle architecture de haute technologie dont l\'unique objectif est d\'offrir une expérience de jeu ultime et exceptionnelle. Les cartes graphiques NVIDIA GeForce RTX 3000 sont tout simplement les cartes les plus puissantes jamais conçues par NVIDIA.', 'https://media.ldlc.com/r1600/ld/products/00/05/75/26/LD0005752605_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/75/26/LD0005752609_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/75/26/LD0005752608_1.jpg', NULL, 2689, 4, 27, 1, 1, 1, NULL, '2021-03-23', '0', NULL, 1),
(63, 'EVGA GeForce RTX 3090 FTW3 ULTRA GAMING', 'La carte graphique EVGA GeForce RTX 3090 FTW3 ULTRA GAMING embarque 24 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'Les cartes graphiques NVIDIA GeForce RTX 3090 offrent un niveau de performances jamais atteint dans les jeux vidéo de dernière génération. Un puissance monstre, de la VRAM en quantité astronomique et des technologies de traitement de l\'image ultra-avancées vous permettront de jouer en 8K HDR et de vivre l’expérience de jeu ultime sur PC. La carte graphique EVGA GeForce RTX 3090 FTW3 ULTRA GAMING embarque 24 Go de mémoire vidéo de nouvelle génération GDDR6X.', 'https://media.ldlc.com/r1600/ld/products/00/05/72/53/LD0005725309_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/72/53/LD0005725312_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/72/53/LD0005725311_1.jpg', NULL, 2599, 4, 27, 1, 1, 1, NULL, '2021-03-23', '0', NULL, 9),
(64, 'ASUS ROG STRIX GeForce RTX 3090 O24G GAMING', 'La carte graphique ASUS ROG STRIX GeForce RTX 3090 O24G GAMING embarque 24 Go de mémoire vidéo de nouvelle génération GDDR6X. Ce modèle bénéficie de fréquences de fonctionnement élevées et d\'un système de refroidissement amélioré gage de fiabilité et de performances à long terme.', 'Les cartes graphiques NVIDIA GeForce RTX 3090 offrent un niveau de performances jamais atteint dans les jeux vidéo de dernière génération. Un puissance monstre, de la VRAM en quantité astronomique et des technologies de traitement de l\'image ultra-avancées vous permettront de jouer en 8K HDR et de vivre l’expérience de jeu ultime sur PC. La carte graphique ASUS ROG STRIX GeForce RTX 3090 O24G GAMING embarque 24 Go de mémoire vidéo de nouvelle génération GDDR6X.', 'https://media.ldlc.com/r1600/ld/products/00/05/72/62/LD0005726238_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/72/62/LD0005726242_1.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/72/62/LD0005726240_1.jpg', NULL, 2699, 4, 27, 1, 1, 1, NULL, '2021-03-23', '0', NULL, 2),
(65, 'INNO3D GeForce RTX 2060 TWIN OC X2', 'La carte graphique INNO3D GeForce RTX 2060 TWIN X2 est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain', 'La carte graphique Inno3D GeForce RTX 2060 TWIN X2 est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive, et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain. Destinée aux joueurs exigeants, cette carte graphique gaming embarque le nouveau processeur graphique NVIDIA TU106, 6 Go de VRAM GDDR6, une interface mémoire 192 bits et 1920 Cores CUDA pour des performances de jeu époustouflantes et un rendu graphique exceptionnel. Les derniers jeux PC et ceux à venir bénéficieront de la puissance exceptionnelle de cette bête de compétition. En d\'autres termes, l\'avenir (des joueurs) commence ici !', 'https://media.ldlc.com/r1600/ld/products/00/05/77/13/LD0005771323_1.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', NULL, 499, 32, 27, 8, 1, 17, NULL, '2021-03-24', '0', NULL, 12),
(66, 'ASUS GeForce RTX 2060 DUAL-RTX2060-6G-EVO', 'La carte graphique Asus GeForce RTX 2060 DUAL-RTX2060-6G-EVO est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain.', 'La carte graphique ASUS GeForce RTX 2060 DUAL-RTX2060-6G-EVO est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive, et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain. Destinée aux joueurs les plus exigeants, cette carte graphique gaming embarque le nouveau processeur graphique NVIDIA TU106, 6 Go de VRAM GDDR6, une interface mémoire 192 bits et 1920 Cores CUDA pour des performances de jeu exceptionnelles et un rendu graphique magnifique. Les derniers jeux PC et ceux à venir bénéficieront de la puissance exceptionnelle de cette bête de compétition. En d\'autres termes, l\'avenir (des joueurs) commence ici !', 'https://media.ldlc.com/r1600/ld/products/00/05/77/08/LD0005770847_1.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', NULL, 469, 32, 27, 8, 1, 17, NULL, '2021-03-24', '0', NULL, 2),
(67, 'Gigabyte GeForce RTX 2060 OC 6G (rev. 2.0)', 'La carte graphique GeForce RTX 2060 OC 6G (rev 2.0) est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain.', 'La carte graphique Gigabyte GeForce RTX 2060 OC 6G (rev. 2.0) est basée sur la nouvelle architecture GPU ultra-innovante NVIDIA Turing. Destinée aux joueurs exigeants, cette carte graphique gaming  embarque le nouveau processeur graphique NVIDIA TU106, 6 Go de VRAM GDDR6, une interface mémoire 192 bits et 1920 processeurs de flux (Cores CUDA) pour des performances de jeu et un rendu graphique à couper le souffle. Les derniers jeux PC et ceux à venir bénéficieront de la puissance exceptionnelle de cette bête de compétition. En d\'autres termes, l\'avenir (des joueurs) commence ici !', 'https://media.ldlc.com/r1600/ld/products/00/05/66/07/LD0005660710_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/66/07/LD0005660730_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/66/07/LD0005660720_2.jpg', NULL, 499, 32, 27, 8, 1, 17, NULL, '2021-03-24', '0', NULL, 3),
(68, 'Gigabyte GeForce RTX 2070 WINDFORCE 2X 8G', 'Basée sur l\'architecture Turing qui est à ce jour la plus aboutie dans le monde ces cartes graphiques, la Gigabyte Gaming RTX 2070 WINDFORCE 2X 8G embarque les toutes dernières technologies développées pour des performances de pointe !', 'Dotée de 8 Go de mémoire vidéo en GDDR6 et d\'une interface mémoire de 256 bits, cette carte graphique est aussi équipée du système WINDFORCE 2X pour une ventilation optimale ainsi que de la technologie Raytracing pour rendu graphique à couper le souffle. Avec son design résolument moderne, ce bijou de technologie saura combler les joueurs les plus exigeants en leur assurant une expérience de jeu exceptionnelle pour de longues années.', 'https://media.ldlc.com/r1600/ld/products/00/05/34/56/LD0005345658_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/34/56/LD0005345678_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/34/56/LD0005345663_2.jpg', NULL, 600, 32, 27, 7, 1, 17, NULL, '2021-03-24', '0', NULL, 3),
(69, 'ASUS GeForce RTX 2070 ROG-STRIX-RTX2070-8G-GAMING', 'La carte graphique ASUS GeForce RTX 2070 ROG STRIX RTX2070-8G-GAMING est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain.', 'Destinée aux joueurs les plus exigeants, cette carte graphique gaming haut de gamme embarque le nouveau processeur graphique NVIDIA TU106, 8 Go de VRAM GDDR6, une interface mémoire 256 bits et 2304 Cores CUDA pour des performances de jeu et un rendu graphique exceptionnels. Les derniers jeux PC et ceux à venir bénéficieront de la puissance exceptionnelle de cette bête de compétition. En d\'autres termes, l\'avenir (des joueurs) commence ici !', 'https://media.ldlc.com/r1600/ld/products/00/05/37/15/LD0005371521_2.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/06/76/LD0005067662_2_0005371487.jpg', 'https://media.ldlc.com/r1600/ld/products/00/05/06/76/LD0005067648_2_0005371479.jpg', NULL, 720, 32, 27, 7, 1, 17, NULL, '2021-03-24', '0', NULL, 2),
(70, 'ASUS GeForce RTX 2070 - DUAL-RTX2070-O8G-EVO-V2', 'La carte graphique ASUS GeForce RTX 2070 DUAL-RTX2070-O8G-EVO-V2 est basée sur l\'architecture de pointe NVIDIA Turing. Des graphismes ultra-réalistes, une VR ultra-immersive, et des performances gaming à couper le souffle pour profiter du meilleur des jeux vidéo d\'aujourd\'hui et de demain.', 'Destinée aux joueurs les plus exigeants, cette carte graphique gaming haut de gamme embarque le nouveau processeur graphique NVIDIA TU106, 8 Go de VRAM GDDR6, une interface mémoire 256 bits et 2304 Cores CUDA pour des performances de jeu et un rendu graphique exceptionnels. Les derniers jeux PC et ceux à venir bénéficieront de la puissance exceptionnelle de cette bête de compétition. En d\'autres termes, l\'avenir (des joueurs) commence ici !', 'https://media.ldlc.com/r1600/ld/products/00/05/68/10/LD0005681067_1.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', NULL, 659, 32, 27, 7, 1, 17, NULL, '2021-03-24', '0', NULL, 2),
(71, 'Gigabyte Aorus GeForce RTX 2080 Xtreme Waterforce', 'Attention aux yeux, la Gigabyte Aorus GeForce RTX 2080 Xtreme Waterforce (GV-N2080AORUSX W-8GC) arrive avec des mensurations de haute volée ! Armée de ses 2944 coeurs CUDA (vs 2560 pour la GTX 1080), la nouvelle architecture NVIDIA Turing 2080 affiche surtout une fréquence turbo impressionnante et NVIDIA annonce des performances bien plus élevées que la génération précédente.', 'Côté &quot;mémoire&quot; de la nouveauté également puisque la GeForce RTX 2080 embarque 8 Go de mémoire GDDR6. Cette dernière apporte son lot de nouveauté, notamment un débit amélioré et surtout au global une augmentation de la bande passante effective.  Adeptes de haute résolution, le multi-écran ? La GeForce RTX 2080  dispose de 7sorties vidéo ! Elle pourra afficher avec une résolution maximale de 7680 x 4320 à 60 Hz ! De quoi être immergés dans vos jeux en VR ou en multi-écrans à 300% !  Ce modèle profite du système de refroidissement all-in-one WATERFORCE, un kit avec pompe et waterblock pré-assemblés et rempli permettant une installation facile et surtout un refroidissement optimal. Le radiateur en aluminium de 240mm couplé aux 2 ventilateurs assurent une dissipation et un refroidissement du GPU efficace.', 'https://media.materiel.net/r550/products/MN0005299890_1.jpg', 'https://media.materiel.net/bo-images/fiches/composants%20pc/cartes%20graphiques/gigabyte/2080/2080wf-aorus.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', NULL, 979, 32, 27, 6, 1, 17, NULL, '2021-03-24', '0', NULL, 10),
(72, 'Inno3D GeForce RTX 2080 Jet', 'Inno 3D et sa carte graphique GeForce RTX 2080 Jet (N20801-08D6-1180651) vous ouvre les portes du gaming. Équipée des dernières technologies NVIDIA et de puissantes caractéristiques techniques, cette carte graphique vous assure des performances Full HD/4K exceptionnelles.', 'Les gamers disposent d\'une nouvelle &quot;arme de jeu massive&quot; avec cette toute dernière génération Nvidia basée sur l\'architecture Turing. Pour repousser les limites de la performance le fondeur de Santa Clara a intégré 2944 coeurs CUDA pour une vitesse de calcul ahurissante. En effet, cette version   GeForce RTX 2080 Jet d\'Inno 3D est cadencée à 1710 MHz avec le mode Boost. Pour enfoncer le clou, la carte a été overclockée en usine. D\'autre part, cette carte ne craint pas la haute définition grâce à ses 8 Go de GDDR6. Vous allez pouvoir profiter, dans tous vos jeux, d\'une excellente fluidité, même avec le niveau de détails poussé à fond ! Pour jouer des heures en toute sérénité, Inno 3D a équipé sa carte de 3 ventilateurs efficaces et silencieux !', 'https://media.materiel.net/bo-images/fiches/composants%20pc/cartes%20graphiques/inno/900.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', 'https://m.media-amazon.com/images/S/aplus-media/vc/45b772ea-9925-4af1-b325-8d5f4b4826a0.__CR0,30,970,600_PT0_SX970_V1___.jpg', NULL, 729, 32, 27, 6, 1, 17, NULL, '2021-03-24', '0', NULL, 12);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `editeur`
--

INSERT INTO `editeur` (`id`, `nom`, `image`, `description`) VALUES
(1, 'Msi', 'https://www.electroguide.com/images/icones-marques/logo-msi.jpg', 'En tant que marque leader du secteur informatique, MSI continue à placer la barre très haut en termes de design et d\'innovation de ses produits de gamme Gaming. Ces efforts ont d\'ailleurs résulté en un sponsoring de plusieurs équipes de eSport. La collaboration entre les services de recherche et développement et les joueurs professionnels a permis la création de nombre des produits MSI Gaming actuellement sur le marché.'),
(2, 'ASUS', 'https://www.universfreebox.com/wp-content/uploads/2019/07/asus_logo.jpg', 'AsusTeK Computer, Inc. est une entreprise taïwanaise qui produit des cartes mères, des cartes graphiques, des lecteurs optiques, des assistants personnels, des ordinateurs portables, des ordinateurs de bureau, des périphériques réseau, des téléphones portables, des boîtiers et des systèmes de refroidissement d’ordinateurs.'),
(3, 'GigaByte', 'https://www.portables4gamers.com/wp-content/uploads/2014/06/gigabyte-logo.jpg', 'Gigabyte Technology est une société de matériel informatique basée à Taïwan, fondée en 1986. La société fait partie des plus grands constructeurs de matériel informatique au monde et emploie plus de 7 000 personnes. Elle est implantée en France depuis 2003 sous le nom GIGABYTE Technology France.'),
(4, 'ASRock', 'https://logos-download.com/wp-content/uploads/2016/02/ASRock_Logo_white_bg.png', 'ASRock Inc. est un fabricant de cartes mères, de systèmes industriels et de Home Theater Personal Computer basé à Taiwan et dirigé par Ted Hsu. La société a été créée en 2002 et est actuellement intégrée à la Pegatron Corporation.'),
(9, 'EVGA', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcEj_uxEv1nJID3vx0yR2EsEVWo7SKnMDlk06OvhfwL-h0dpEY7UTDCjlbxkUTQJKQDGo&usqp=CAU', 'EVGA Corporation est une entreprise américaine qui commercialise des cartes mères et des cartes graphiques pour micro ordinateur. La société a été fondée en 1999 et son siège social est située à Brea, Californie aux États-Unis. Les cartes graphiques sont basées sur des chipsets graphiques NVIDIA exclusivement.'),
(10, 'Aorus', 'https://global.aorus.com/img/AORUS_logo.png', 'Est une marque de GigaByte, sert de distribution '),
(11, 'ZOTAC', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6rJ7YLOvy1hYEbJEGUDofcAB-3g8Zvr7UWVSZguylVeX6SASQrJSIP82ThbCrnjYLEQ&usqp=CAU', 'ZOTAC International Ltd. est un fabricant de matériel informatique établi à Hong Kong qui produit notamment des cartes graphiques à base de chipsets NVIDIA, des cartes mères de format Mini-ITX et Mini-DTX, des mini PC et nettops. La société fait partie du groupe PC Partner Ltd et emploie plus de 6 000 personnes au siège de la société de Hong Kong et dans 40 usines de montage en Chine2.\r\n\r\nLa marque Zotac a été officiellement lancée par PC Partner le 2 avril 2007 lors du Cebit.'),
(12, 'INNO3D', 'https://m.media-amazon.com/images/S/aplus-media/vc/05d65e4c-bee4-473f-8985-3f41f750e623.__CR0,0,600,180_PT0_SX600_V1___.png', 'InnoVISION Multimedia est un constructeur de matériel informatique fondé en 1989, et basé à Hong Kong, Chine. La société est principalement reconnue pour ses cartes graphiques à base de chipsets graphiques NVIDIA exclusivement, commercialisées sous la marque Inno3D. Sa filiale en Europe, InnoVISION Multimedia Deutschland GmbH, a été implanté en Allemagne.');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci COMMENT='Cette table permet un tri facultatif selon l''article';

--
-- Déchargement des données de la table `gamme`
--

INSERT INTO `gamme` (`id`, `nom`, `id_type`, `id_marque`, `id_editeur`) VALUES
(1, 'RTX 3090 ', 27, 1, NULL),
(2, 'I-9', 5, 2, NULL),
(3, 'RTX 3070', 27, 1, NULL),
(4, 'RTX 3080', 27, 1, NULL),
(5, 'RTX 3060', 27, 1, NULL),
(6, 'RTX 2080', 27, 1, NULL),
(7, 'RTX 2070', 27, 1, NULL),
(8, 'RTX 2060', 27, 1, NULL),
(9, 'GTX 1660', 27, 1, NULL),
(10, 'GTX 1060', 27, 1, NULL),
(11, 'GTX 1050', 27, 1, NULL),
(12, 'I-7', 29, 2, NULL),
(13, 'I-5', 29, 2, NULL),
(14, 'I-3', 29, 2, NULL),
(16, '550 W', 22, 15, NULL),
(17, '650 W', 22, 16, 0),
(18, '750 W', 22, 17, 0),
(19, '1000 W', 22, 0, 0),
(20, 'RX 5500', 27, 3, 0),
(21, 'RX 5700', 27, 3, 0),
(22, 'RX 6800', 27, 3, 0),
(23, 'RX 6800XT', 27, 3, 0),
(24, 'RX 6900 XT', 27, 3, 0),
(25, 'GTX 1030', 27, 1, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `generation`
--

INSERT INTO `generation` (`id`, `nom`, `id_type`, `id_marque`) VALUES
(1, 'RTX 3000', 27, 1),
(2, 'Intel 10th', 29, 2),
(4, 'Intel 8th', 29, 2),
(5, 'Intel 9th', 29, 2),
(6, 'Intel 7th', 29, 2),
(13, 'RX 5000', 27, 3),
(16, 'GTX 1000', 27, 1),
(15, 'RX 6000', 27, 3),
(17, 'RTX 2000', 27, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `likey`
--

INSERT INTO `likey` (`id`, `id_utilisateur`, `id_article`, `id_commentaire`) VALUES
(9, 2, 8, NULL),
(10, 32, NULL, NULL);

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
(18, 'ASUS', 'https://www.universfreebox.com/wp-content/uploads/2019/07/asus_logo.jpg', 'AsusTeK Computer, Inc. est une entreprise taïwanaise qui produit des cartes mères, des cartes graphiques, des lecteurs optiques, des assistants personnels, des ordinateurs portables, des ordinateurs de bureau, des périphériques réseau, des téléphones portables, des boîtiers et des systèmes de refroidissement d’ordinateurs.'),
(19, 'Gigabyte', 'https://www.portables4gamers.com/wp-content/uploads/2014/06/gigabyte-logo.jpg', 'Gigabyte Technology est une société de matériel informatique basée à Taïwan, fondée en 1986. La société fait partie des plus grands constructeurs de matériel informatique au monde et emploie plus de 7 000 personnes. Elle est implantée en France depuis 2003 sous le nom GIGABYTE Technology France.'),
(20, 'ASRock', 'https://logos-download.com/wp-content/uploads/2016/02/ASRock_Logo_white_bg.png', 'ASRock Inc. est un fabricant de cartes mères, de systèmes industriels et de Home Theater Personal Computer basé à Taiwan et dirigé par Ted Hsu. La société a été créée en 2002 et est actuellement intégrée à la Pegatron Corporation.');

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
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_article` int(11) NOT NULL,
  `image_article` varchar(500) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `prix` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`id`, `id_utilisateur`, `id_article`, `image_article`, `titre`, `prix`) VALUES
(1, 32, 51, 'https://images-na.ssl-images-amazon.com/images/I/41yShmpHyBL._AC_.jpg', 'GeForce GT 1030, 1265 MHz, PCI-Express 16x, 2 Go', 95),
(2, 4, 60, 'https://media.ldlc.com/r1600/ld/products/00/05/73/27/LD0005732752_1.jpg', 'MSI GeForce RTX 3080 GAMING X TRIO 10G', 1339);

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
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `login`, `email`, `password`, `image`, `id_droits`, `anniversaire`) VALUES
(3, 'testnom', 'testprenom', 'TestTest', 'TestTest@ok.fr', '$2y$10$487VcE6QPmC6u633DBKvV.phhbze9NYdZAw6dJIz96gxYMUsam/Ou', 'https://drone-geofencing.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png', 1, '2001-01-01'),
(4, 'Verguldezoone', 'Joris', 'HARDJOJOJ', 'HARDJOJOJ@HARDJOJOJ.HARDJOJOJ', '$2y$10$/al.NlaH47M0a751YGTWCe5Z/Q92i0V5qfAajozb7ydcusXVy5joC', 'https://drone-geofencing.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png', 100, '1998-08-16'),
(5, NULL, NULL, 'test', 'test@test.com', '$2y$10$xbEfJazosq1nOSLfC3i7HOsc.P2896nBF1CNm2r6.zkC5XA4CaKhq', 'https://drone-geofencing.com/wp-content/plugins/all-in-one-seo-pack/images/default-user-image.png', 1, NULL);

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
) ENGINE=MyISAM AUTO_INCREMENT=154 DEFAULT CHARSET=latin1;

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
(125, 45, 4),
(126, 45, 4),
(127, 51, 32),
(128, 51, 32),
(129, 50, 32),
(130, 50, 32),
(131, 50, 32),
(132, 51, 32),
(133, 51, 32),
(134, 51, 32),
(135, 51, 32),
(136, 51, 32),
(137, 51, 32),
(138, 51, 32),
(139, 51, 32),
(140, 51, 32),
(141, 51, 32),
(142, 51, 32),
(143, 51, 32),
(144, 51, 32),
(145, 51, 32),
(146, 51, 32),
(147, 51, 32),
(148, 51, 32),
(149, 51, 32),
(150, 51, 32),
(151, 51, 32),
(152, 60, 4),
(153, 60, 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
