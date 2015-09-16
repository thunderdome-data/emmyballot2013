DROP TABLE IF EXISTS `emmys_votes`;
CREATE TABLE `emmys_votes` (
  `nom_id` int(7) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `votes` int(11) DEFAULT NULL
  PRIMARY KEY (`nom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;
