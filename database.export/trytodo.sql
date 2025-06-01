-- --------------------------------------------------------
-- Διακομιστής:                  127.0.0.1
-- Έκδοση διακομιστή:            10.4.32-MariaDB - mariadb.org binary distribution
-- Λειτ. σύστημα διακομιστή:     Win64
-- HeidiSQL Έκδοση:              12.10.0.7000
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping data for table trytodo.users: ~5 rows (approximately)
INSERT INTO `users` (`id`, `email`, `password`, `status`, `first_name`, `last_name`, `password_confirm`, `message`, `message2`, `message3`, `created_at`, `reset_token`, `reset_token_expires`) VALUES
	(1, 'mpampis@gmail.com', 'mpampis123', '1', 'mpampis', 'mpampopoulos', '', '', '', '', '2024-03-08 17:48:47', '', NULL),
	(15, 'nikos@gmail.com', '$2y$10$D5yVTvx7r96H2fnO2LOqp.wW/O03O7mFeR6rcz.5iO2nd01IeTuB6', '', 'nikos', 'nikolopoulos', '', 'Nulla mauris ligula, convallis at rutrum et, porttitor vitae enim. Quisque elementum in erat porta posuere. Cras odio quam, elementum non luctus ut, congue eget dui. ', 'Phasellus sed lorem eu dolor dictum gravida in vel lectus. Integer dolor nisi, finibus a imperdiet non, tempus sed tellus. ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed porttitor sed sapien finibus bibendum. ', '2024-03-10 20:51:50', '', NULL),
	(16, 'panos@gmail.com', '$2y$10$1bRg7fMC0jfHc2mdo93gL.MZ.d9EhJERGKLY7D8e.VZy2N.Zp5Pau', '', 'panos', 'panagiwtopoulos', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque hendrerit purus porttitor pellentesque pulvinar. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ', 'Nunc luctus suscipit interdum. Aenean venenatis, eros vitae finibus lobortis, dolor est gravida tellus, vel pretium velit libero sed dolor. ', 'Nulla hendrerit gravida posuere. Phasellus sit amet elit a diam euismod dignissim at vitae leo. Vestibulum dui sem, scelerisque sed libero et, malesuada tempus lorem. Pellentesque vitae tortor ac ipsum ultricies condimentum.', '2025-05-27 17:26:29', '', NULL),
	(20, 'labisrigopoulos@gmail.com', '$2y$10$laKO97ejenfzjhD1zDOtRuCyH.fzJc.GHmihaBeltlInTnlZEDunm', '1', 'mpampis', 'rhgopoylos', '', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat commodo tellus. Duis rutrum hendrerit augue, vitae facilisis purus ultricies sed. Proin porttitor sagittis ligula, et sagittis pu', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc placerat commodo tellus. Duis rutrum hendrerit augue, vitae facilisis purus ultricies sed. Proin porttitor sagittis ligula, et sagittis purus malesuada at. Integer id felis at diam mattis interdum. Quisque rhoncus aliquam fermentum. Cras auctor risus sit amet tempor euismod. Morbi quis ligula eget magna tempus luctus. Pellentesque volutpat est vel auctor pharetra. Nulla condimentum laoreet imperdiet. In eleifend elit a turpis luctus, ', 'Pellentesque volutpat est vel auctor pharetra. Nulla condimentum laoreet imperdiet. In eleifend elit a turpis luctus, nec feugiat metus sagittis. Sed non lectus nec elit sodales fermentum sed dictum justo. Phasellus dapibus aliquam enim, et consequat nunc consectetur a. Vestibulum est leo, placerat sit amet magna et, mattis pulvinar dui. Aenean vel odio eu sapien tincidunt venenatis nec in felis. ', '2025-05-27 20:54:59', NULL, NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
