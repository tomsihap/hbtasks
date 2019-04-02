-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 02, 2019 at 02:44 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hbtasks`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Tâches ménagères'),
(2, 'Perso'),
(3, 'Pro');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `description` text,
  `due_date` datetime DEFAULT NULL,
  `state` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `description`, `due_date`, `state`, `category_id`) VALUES
(11, 'Tache à faire sans date', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id tenetur similique sapiente ea fugiat aperiam. Explicabo, alias aliquid. Quaerat ipsam odio cupiditate sed, consequatur perspiciatis qui dolorem quis eos dolores.', NULL, 0, 1),
(12, 'Tache à faire avec date', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id tenetur similique sapiente ea fugiat aperiam. Explicabo, alias aliquid. Quaerat ipsam odio cupiditate sed, consequatur perspiciatis qui dolorem quis eos dolores.', '2019-04-09 00:00:00', 0, 1),
(13, 'Acheter des crayons (tâche effectuée)', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo vero natus eius distinctio quia expedita quos in, quisquam fugiat saepe eligendi dolores dolor vitae minus? Fuga voluptatum nam cum repudiandae.', NULL, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
