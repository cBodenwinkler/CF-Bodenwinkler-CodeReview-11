-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2020 at 01:19 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cr11_bodenwinkler_petadoption`
--
CREATE DATABASE IF NOT EXISTS `cr11_bodenwinkler_petadoption` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cr11_bodenwinkler_petadoption`;

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `id` int(11) NOT NULL,
  `animalName` varchar(255) NOT NULL,
  `animalImage` varchar(255) NOT NULL,
  `animalDescription` varchar(255) NOT NULL,
  `animalLocation` varchar(255) NOT NULL,
  `animalHobbies` varchar(255) NOT NULL,
  `animalAge` int(11) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 0,
  `animalSize` enum('small','large','senior') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`id`, `animalName`, `animalImage`, `animalDescription`, `animalLocation`, `animalHobbies`, `animalAge`, `active`, `animalSize`) VALUES
(1, 'Horst', 'https://images.unsplash.com/photo-1571391733814-15ac29ac3544?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1352&q=80', 'Horst die Schlange', 'Vienna - Neubau', 'Eating Rats and Mice', 7, 0, 'small'),
(6, 'Fred', 'https://www.zooplus.de/magazin/wp-content/uploads/2019/01/labradoodle-welpe-1024x683.jpeg', 'Funny little Labradoodle', 'Vienna - Josefstadt', 'Bellyrubs and hunting Sticks', 3, 0, 'large'),
(7, 'Bertha', 'https://www.aljazeera.com/wp-content/uploads/2020/02/0024d1579c2c4b4395e53a39f70d49f7_18.jpeg?resize=770%2C513', 'Funny big Elephant for your home needs', 'Vienna - Meidling', 'Eating gras and scaring people', 25, 0, 'large'),
(8, 'Gunni', 'https://www.zooplus.de/magazin/wp-content/uploads/2020/10/kitten-sitzt-boden-768x512.jpeg', 'Little Kitten of unknown breed', 'Vienna', 'brawling with other kittens', 1, 0, 'small'),
(9, 'Nico', 'https://www.thetimes.co.uk/imageserver/image/%2Fmethode%2Ftimes%2Fprod%2Fweb%2Fbin%2F26702f36-f52a-11e7-a789-003e705b951e.jpg?crop=2333%2C1555%2C0%2C0', 'Nice old silverback Gorilla', 'Vienna - Meidling', 'Eating fruits and messing with people', 32, 0, 'senior'),
(11, 'Timmy', 'https://www.ecuador-discover.de/media/_processed_/a/7/csm_galapagos-riesenschildkroete-chelonoidis-nigra-el-chato-santa-cruz_648628faac.jpg', 'Very calm and friendly', 'Linz - Urfahr', 'Playing Hide and Seek', 98, 0, 'senior'),
(12, 'Stinky', 'https://www.haz.de/var/storage/images/haz/nachrichten/wissen/uebersicht/knochenfunde-belegen-hausschweine-waren-frueher-schwer-in-mode/52467550-1-ger-DE/Hausschweine-waren-frueher-schwer-in-Mode_master_reference.jpg', 'Little Housepig - Nice and friendly', 'Vienna', 'Playing ball, eating and sleeping', 3, 0, 'small'),
(13, 'Herbert', 'https://cdn.mos.cms.futurecdn.net/gJJFamQca86CibEeDmegk-320-80.jpg', 'Little Guinea Pig - Pls buy a second one', 'Neubau', 'Eating and Sleeping', 2, 0, 'small'),
(14, 'Rex', 'https://www.treehugger.com/thmb/-D1tFsK9DbnPB_4pnwwj9W_1Xjo=/735x0/__opt__aboutcom__coeus__resources__content_migration__mnn__images__2018__10__TRexModelAgainstYellowEggshellBackground-df740d7273ea421bad87046e1ba6e071.jpg', 'Large, scary but very cool', 'Innsbruck', 'Eating everything that moves', 23, 0, 'large'),
(15, 'Benny', 'https://tractive.com/blog/wp-content/uploads/2020/02/how-to-deal-with-panting-shaking-seizures-in-old-dogs.jpg', 'Nice old dog that loves people', 'Klosterneuburg', 'Sleeping and walking in the woods', 17, 0, 'senior'),
(16, 'Trudy', 'https://www.dogslife.com.au/wp-content/uploads/2018/09/1-15-624x416.jpg', 'Lovely older Dog', 'Salzburg', 'Hide and Seek', 16, 0, 'senior'),
(17, 'Willy', 'https://lh3.googleusercontent.com/proxy/ngCGTL50v-ulEKWr6VvsLkkD8P0dViOFumKtFKoALjP4PBM3fVTalMarTaiKKJUillok4UnhWg0PZRbbMNF-owqfRk6H5Gm_Lx1_g3gyMs41H2zyAheYjh2aqCMkevYLHb-RHnmQWVh6Zde93LLbiDPUOUS93HU9nSBQOxSmHJnNQQ', 'For everybody with a slightly larger pool at home', 'Vienna - Meidling', 'Eating all day long', 25, 0, 'large');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin','superAdmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(5, 'Christian BWIN', 'test@superadmin.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 'superAdmin'),
(9, 'Test User', 'test@user.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 'user'),
(12, 'Test Admin', 'test@admin.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 'admin'),
(13, 'Test Test Admin', 'test@admin2.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 'admin'),
(14, 'Test ChangeMe USER', 'test@user2.com', 'df5d32b3291d74318eaa98c9230bcff1aa35c275de0da3b804326098fbb9fe91', 'user'),
(15, 'Test DeleteME User', 'test@deleteMe.com', 'ecd71870d1963316a97e3ac3408c9835ad8cf0f3c1bc703527c30265534f75ae', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `userEmail` (`userEmail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
