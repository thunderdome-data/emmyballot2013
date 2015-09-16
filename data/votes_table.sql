DROP TABLE IF EXISTS `emmys_votes`;
CREATE TABLE `emmys_votes_2015` (
  `nom_id` int(7) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) DEFAULT 0,
  `votes` int(11) DEFAULT 0,
  PRIMARY KEY (`nom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=latin1;

LOAD DATA INFILE '/path/to/the/emmy-ballot/data/2015/nominees.csv'
INTO TABLE emmys_votes_2015
FIELDS TERMINATED BY ',' 
ENCLOSED BY '"' 
LINES TERMINATED BY '\n' 
IGNORE 1 LINES
(nom_id,@dummy,@dummy,@dummy,cat_id,@dummy,@dummy,@dummy,votes);
