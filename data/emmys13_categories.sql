/*
 Navicat Premium Data Transfer

 Source Server         : DEV MySQL
 Source Server Type    : MySQL
 Source Server Version : 50167
 Source Host           : localhost
 Source Database       : features

 Target Server Type    : MySQL
 Target Server Version : 50167
 File Encoding         : utf-8

 Date: 09/14/2013 15:20:58 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `emmys13_categories`
-- ----------------------------
DROP TABLE IF EXISTS `emmys13_categories`;
CREATE TABLE `emmys13_categories` (
  `cat_id` int(7) NOT NULL AUTO_INCREMENT,
  `category` varchar(256) DEFAULT NULL,
  `img` varchar(256) DEFAULT NULL,
  `critictext` text,
  `lastwinner` varchar(100) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `emmys13_categories`
-- ----------------------------
BEGIN;
INSERT INTO `emmys13_categories` VALUES ('1', 'Drama Series', 'x', '\"Critic pick: \"Breaking Bad\"  Reason: \"Mad Men\" had an uneven season, \"House of Cards\" made Emmy history as the first non-broadcast series ever nominated but the show was good, not great. \"Homeland,\" which won last year, has some curious lags. \"BB\" is simply the most brilliant television being made at the moment.  - Joanne Ostrow, The Denver Post\"', '\"Homeland\"', 'Will \"Homeland\" come away with a repeat win, or will voters lean toward \"Breaking Bad\" to give Walter White a proper send-off? Not to be overlooked, Netflix has a solid horse in the race with \"House of Cards.\"'), ('2', 'Lead Actor (Drama)', 'x', '\"Critic pick: Kevin Spacey, \"House Of Cards\"  Reason: As the bent Congressman Francis Underwood, Spacey makes the most of a very showy role.  -Rob Lowman, Los Angeles Daily News\"', 'Damian Lewis, \"Homeland\"', 'Some think Kevin Spacey has this category on lockdown. Though, as with the Drama category, Bryan Cranston could benefit from the all-time-high popularity of \"Breaking Bad.\" Or will Damian Lewis take home yet another statue for \"Homeland\"?'), ('3', 'Lead Actress (Drama)', 'x', 'Critic pick: Kerry Washington, \"Scandal\"  Reason: I\'d be totally satisfied with a repeat victory for Claire Danes, but something tells me that Washington has a lot of momentum -- and buzz -- on her side.  - Chuck Barney, Bay Area News Group', 'Claire Danes, \"Homeland\"', 'Connie Britton and Kerry Washington may go head-to-head in terms of popularity here, but Robin Wright stands a fair chance for her excellent \"House of Cards\" performance. And of course, Claire Danes could be back on stage for \"Homeland.\"'), ('4', 'Comedy Series', 'x', 'Critic pick: \"Louie\"  Reason: Charting a new course for comedy, this is the most inventive half hour on the list. Still. Emmy voters may very well stick with repeat winner \"Modern Family.\"  - Joanne Ostrow, The Denver Post', '\"Modern Family\"', 'This one is tough. \"Louie\" is a critical favorite, sure, but \"Big Bang\" crushes the ratings game. Might voters stay safe and hand \"Modern Family\" another statue, or shine a light on Lena Dunham for the brilliant second season of \"Girls\"?'), ('5', 'Lead Actor (Comedy)', 'x', 'Critic pick: Louis C.K., \"Louie\"  Reason: While I was glad to see LeBlanc nominated for his work in the under-appreciated \"Episodes,\" this is the year for Louis C.K.\'s intimate observational humor and understated delivery.  - Joanne Ostrow, The Denver Post', 'Jon Cryer, \"Two And A Half Men\"', 'Despite the lackluster return of \"Arrested Development,\" Jason Bateman sure has his share of fans, and could walk away with this one. However, a more logical bet would be Alec Baldwin for \"30 Rock\" or Jim Parsons for \"Big Bang.\" At the end of the day, though, this is Louis C.K.\'s category to lose.'), ('6', 'Lead Actress (Comedy)', 'x', 'Critic pick: Julia Louis-Dreyfus, \"Veep\"  Reason: As blindly ambitious Vice President Selina Meyer, Louis-Dreyfus is tremendously funny, which she proved for years on \"Seinfeld.\"  - Rob Lowman, Los Angeles Daily News', 'Julia Louis-Dreyfus, \"Veep\"', 'Another chance for Lena Dunham to shine, though she\'ll have to squeak by her funny gal predecessors Tina Fey and Amy Poehler. And even though \"Veep\" has a relatively small audience, critics are weak at the knees for Julia Louis-Dreyfus.'), ('7', 'Miniseries/Movie', 'x', 'Critic pick: \"Behind The Candleabra\"  Reason: \"Top of the Lake\" was fantastic, but it will be heard to beat the glitter, the glitz and the star power of this Liberace saga.  - Chuck Barney, Bay Area News Group', '\"Game Change\"', 'Is this the most competitive category this year? Perhaps. While \"American Horror Story\" and \"The Bible\" succeeded in finding wide audiences, HBO went two-for-two with \"Behind The Candleabra\" and \"Phil Spector.\" Then there\'s always Sundance Channel\'s \"Top of the Lake,\" which was a critical darling.'), ('8', 'Variety Series', 'x', 'Critic pick: \"The Daily Show with Jon Stewart\"  Reason: Because \"The Daily Show\" always wins, but it would be nice to see a tie with its equally brilliant counterpart, \"The Colbert Report.\"  - Rob Lowman, Los Angeles Daily News', '\"The Daily Show with Jon Stewart\"', 'Another packed field. Jon Stewart will face off with his friend/former employee Stephen Colbert, and Jimmy Fallon will be stiff competition for his old \"SNL\" crew. But then there\'s always Jimmy Kimmel, whose stock has risen this year after moving to the crucial 11:30 time slot.'), ('9', 'Supporting Actor (Drama)', 'x', 'Critic pick: Aaron Paul, \"Breaking Bad\"  Reason: Although voters may lean to Mandy Patinkin (\"Homeland\"), Paul is giving the performance of a lifetime as Jesse Pinkman, an emotionally searing and nuanced display.  - Joanne Ostrow, The Denver Post', 'Aaron Paul, \"Breaking Bad\"', 'Aaron Paul is primed for a repeat win for \"Breaking Bad\" here, though his costar Jonathan Banks is undoubtedly a contender. Many will likely put their money on \"Game Of Thrones\" favorite Peter Dinklage, or Mandy Patinkin for his portrayal of the stoic, paternal Saul Berenson on \"Homeland.\"'), ('10', 'Supporting Actress (Drama)', 'x', 'Critic pick: Anna Gunn, \"Breaking Bad\"  Reason: Skyler White has taken enough abuse (from \"Breaking Bad\"  fans, as well as Walt). It\'s time to reward Gunn for her stellar work on the series.  Chuck Barney, Bay Area News Group', 'Maggie Smith, \"Downton Abbey\"', 'Maggie Smith is a hard one to beat here, as she proved last year with a big \"Downton Abbey\" win. Though there\'s always Christina Hendricks as Joan on \"Mad Men,\" and Anna Gunn as the shape-shifting Skyler White on \"Breaking Bad.\"'), ('11', 'Supporting Actor (Comedy)', 'x', 'Critic pick: Ed O\'Neill, \"Modern Family\"  Reason: I\'d love to see Adam Driver win here, but I think voters will stick with someone from \"Modern Family,\" and it\'s O\'Neill\'s turn.  - Joanne Ostrow, The Denver Post', 'Eric Stonestreet, \"Modern Family\"', 'It\'s a \"Modern Family\" affair here, with three strong actors (Jesse Tyler Ferguson, Ed O\'Neill and Ty Burrell) looking to take the baton from Eric Stonestreet, who won for his work on the show last year. Underdogs Bill Hader (various characters?) and Adam Driver would make for a great TV upset, though.'), ('12', 'Supporting Actress (Comedy)', 'x', 'Critic pick: Julie Bowen, \"Modern Family\"  Reason: Julie Bowen just might rule this category again, but I\'m all for a fresh face, and Mayim Bialik (\"Big Bang\") is a constant source of mirth.  - Chuck Barney, Bay Area News Group', 'Julie Bowen, \"Modern Family\"', 'Julie Bowen is back again after a win last year, though Sofia Vegara had a particularly strong \"Modern Family\" season. However, Jane Lynch is always a threat as the powerhouse Sue Sylvester on \"Glee.\"');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
