SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `tips` (
  `id` int(50) NOT NULL,
  `names` varchar(50) NOT NULL,
  `match1` varchar(50) NOT NULL,
  `match2` varchar(50) NOT NULL,
  `match3` varchar(50) NOT NULL,
  `match4` varchar(50) NOT NULL,
  `match5` varchar(50) NOT NULL,
  `match6` varchar(50) NOT NULL,
  `match7` varchar(50) NOT NULL,
  `match8` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tips` (`id`, `names`, `match1`, `match2`, `match3`, `match4`, `match5`, `match6`, `match7`, `match8`) VALUES
(1, 'ondrej', '3', '2', '1', '1', '2', '0', '4', '3'),
(2, 'aska', '1', '1', '3', '2', '1', '2', '4', '0'),
(3, 'tomas', '2', '1', '3', '0', '2', '1', '5', '1'),
(4, 'daniel', '2', '1', '1', '1', '3', '3', '4', '0'),
(5, 'gregor', '2', '1', '3', '0', '1', '1', '2', '2');


ALTER TABLE `tips`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `tips`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
