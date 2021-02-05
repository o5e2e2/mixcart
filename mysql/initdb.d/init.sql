DROP TABLE IF EXISTS `queque`;
CREATE TABLE `queque` (
  `id` int NOT NULL AUTO_INCREMENT,
  `worker` int DEFAULT NULL,
  `message` json NOT NULL,
  PRIMARY KEY (`id`)
);
