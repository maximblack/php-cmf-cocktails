/*
Navicat MySQL Data Transfer

Source Server         : cocktail
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : cocktail

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2013-01-14 23:30:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cocktails`
-- ----------------------------
DROP TABLE IF EXISTS `cocktails`;
CREATE TABLE `cocktails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume` varchar(100) NOT NULL,
  `imagine` varchar(200) DEFAULT NULL,
  `descriere` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cocktails
-- ----------------------------
INSERT INTO `cocktails` VALUES ('76', 'Avocado Aperitif', 'androidlowres-cocktail_maidens-prayer.png', 'Peel, pit, and slice apricots. Puree in a food processor or blender with lime juice, sugar substitute, and 1 mint leaf. Add 2 ice cubes or crushed ice. Process on and off to blend. Pour into serving glass. Garnish with remaining mint leaf.\r\n');
INSERT INTO `cocktails` VALUES ('77', 'Autumn Apple Punch', 'androidlowres-cocktail_mojito.png', 'Place apple juice in a NON-aluminum kettle; tie spices in cheesecloth, add to kettle, and simmer uncovered 15 minutes; discard spice bag. Mix spiced juice with remaining fruit juices. To serve, place a large block of ice in a large punch bowl, add fruit juice and ginger ale.xzz2HCO28bEM');
INSERT INTO `cocktails` VALUES ('78', 'Apricto Mint Julep', 'androidlowres-cocktail_chocolate-martini.png', 'Combine all ingredients in a blender and puree until smooth. Serve in tall stylish glasses.');
INSERT INTO `cocktails` VALUES ('79', 'Banana Milk', 'androidlowres-ingredient_cherry-brandy.png', 'Place all of the ingredients in a blender and process until smooth.');
INSERT INTO `cocktails` VALUES ('80', 'Cranberry Party Punch', 'androidlowres-ingredient_grapefruit-juice.png', 'Combine juices and chill. Add ginger ale just before serving. Garnish with orange slices. Yields 1.5 gallons. One of the cans of lemonade concentrate may be diluted and frozen to make an ice ring or cubes.\r\n');
INSERT INTO `cocktails` VALUES ('81', 'Cocoa', 'android-ingredient_coffee-liqueur.png', 'Combine cold coffee, cocoa and vanilla. Pour over ice in tall glasses. Top each with 2 tablespoons of whipped cream. Nutritional analysis per serving: 225 calories; 15.5 grams total fat; (61 percent of calories from fat), 57.2 milligrams cholesterol, 75.4 milligrams sodium.');
INSERT INTO `cocktails` VALUES ('82', 'Death Mix', 'androidlowres-cocktail_zombie.png', 'Just run the coke syrup down the side of the glass (the dark stuff not the soda). Any size glass will do. Then, fill the rest with grenadine. Do not skull it because it is very very strong. Look at it in the light - it should be very dark.');
INSERT INTO `cocktails` VALUES ('83', 'Earth Shake', 'androidlowres-cocktail_sea-breeze.png', 'Place all ingredients in a blender, cover and whiz on medium speed until well blended. Pour into a collins glass, and serve.');

-- ----------------------------
-- Table structure for `cocktails_ingridients`
-- ----------------------------
DROP TABLE IF EXISTS `cocktails_ingridients`;
CREATE TABLE `cocktails_ingridients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cocktail_id` int(11) NOT NULL,
  `ingridient_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cocktail_id` (`cocktail_id`),
  KEY `ingridient_id` (`ingridient_id`),
  CONSTRAINT `cocktails_ingridients_ibfk_1` FOREIGN KEY (`cocktail_id`) REFERENCES `cocktails` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cocktails_ingridients_ibfk_2` FOREIGN KEY (`ingridient_id`) REFERENCES `ingridients` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cocktails_ingridients
-- ----------------------------
INSERT INTO `cocktails_ingridients` VALUES ('23', '76', '11');
INSERT INTO `cocktails_ingridients` VALUES ('24', '76', '13');
INSERT INTO `cocktails_ingridients` VALUES ('25', '76', '19');
INSERT INTO `cocktails_ingridients` VALUES ('26', '77', '12');
INSERT INTO `cocktails_ingridients` VALUES ('27', '77', '13');
INSERT INTO `cocktails_ingridients` VALUES ('28', '77', '14');
INSERT INTO `cocktails_ingridients` VALUES ('29', '77', '19');
INSERT INTO `cocktails_ingridients` VALUES ('30', '78', '11');
INSERT INTO `cocktails_ingridients` VALUES ('31', '78', '12');
INSERT INTO `cocktails_ingridients` VALUES ('32', '78', '18');
INSERT INTO `cocktails_ingridients` VALUES ('33', '79', '12');
INSERT INTO `cocktails_ingridients` VALUES ('34', '79', '13');
INSERT INTO `cocktails_ingridients` VALUES ('35', '79', '14');
INSERT INTO `cocktails_ingridients` VALUES ('36', '79', '19');
INSERT INTO `cocktails_ingridients` VALUES ('37', '80', '10');
INSERT INTO `cocktails_ingridients` VALUES ('38', '80', '11');
INSERT INTO `cocktails_ingridients` VALUES ('39', '80', '12');
INSERT INTO `cocktails_ingridients` VALUES ('40', '80', '13');
INSERT INTO `cocktails_ingridients` VALUES ('41', '80', '15');
INSERT INTO `cocktails_ingridients` VALUES ('42', '80', '18');
INSERT INTO `cocktails_ingridients` VALUES ('43', '81', '11');
INSERT INTO `cocktails_ingridients` VALUES ('44', '81', '18');
INSERT INTO `cocktails_ingridients` VALUES ('45', '81', '19');
INSERT INTO `cocktails_ingridients` VALUES ('46', '81', '21');
INSERT INTO `cocktails_ingridients` VALUES ('47', '82', '14');
INSERT INTO `cocktails_ingridients` VALUES ('48', '82', '15');
INSERT INTO `cocktails_ingridients` VALUES ('49', '82', '22');
INSERT INTO `cocktails_ingridients` VALUES ('50', '83', '15');
INSERT INTO `cocktails_ingridients` VALUES ('51', '83', '23');
INSERT INTO `cocktails_ingridients` VALUES ('52', '83', '24');

-- ----------------------------
-- Table structure for `cocktails_tags`
-- ----------------------------
DROP TABLE IF EXISTS `cocktails_tags`;
CREATE TABLE `cocktails_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cocktail_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cocktail_id` (`cocktail_id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `cocktails_tags_ibfk_1` FOREIGN KEY (`cocktail_id`) REFERENCES `cocktails` (`id`) ON DELETE CASCADE,
  CONSTRAINT `cocktails_tags_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cocktails_tags
-- ----------------------------
INSERT INTO `cocktails_tags` VALUES ('3', '76', '8');
INSERT INTO `cocktails_tags` VALUES ('4', '76', '10');
INSERT INTO `cocktails_tags` VALUES ('5', '77', '13');
INSERT INTO `cocktails_tags` VALUES ('6', '77', '14');
INSERT INTO `cocktails_tags` VALUES ('7', '77', '15');
INSERT INTO `cocktails_tags` VALUES ('8', '78', '12');
INSERT INTO `cocktails_tags` VALUES ('9', '78', '13');
INSERT INTO `cocktails_tags` VALUES ('10', '78', '17');
INSERT INTO `cocktails_tags` VALUES ('11', '78', '19');
INSERT INTO `cocktails_tags` VALUES ('12', '79', '11');
INSERT INTO `cocktails_tags` VALUES ('13', '80', '12');
INSERT INTO `cocktails_tags` VALUES ('14', '80', '13');
INSERT INTO `cocktails_tags` VALUES ('15', '81', '9');
INSERT INTO `cocktails_tags` VALUES ('16', '81', '18');
INSERT INTO `cocktails_tags` VALUES ('17', '81', '19');
INSERT INTO `cocktails_tags` VALUES ('18', '81', '20');
INSERT INTO `cocktails_tags` VALUES ('19', '82', '9');
INSERT INTO `cocktails_tags` VALUES ('20', '82', '10');
INSERT INTO `cocktails_tags` VALUES ('21', '82', '11');
INSERT INTO `cocktails_tags` VALUES ('22', '83', '14');
INSERT INTO `cocktails_tags` VALUES ('23', '83', '15');

-- ----------------------------
-- Table structure for `ingridients`
-- ----------------------------
DROP TABLE IF EXISTS `ingridients`;
CREATE TABLE `ingridients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingridients
-- ----------------------------
INSERT INTO `ingridients` VALUES ('10', 'vodka');
INSERT INTO `ingridients` VALUES ('11', 'soda');
INSERT INTO `ingridients` VALUES ('12', 'citrus');
INSERT INTO `ingridients` VALUES ('13', 'lime');
INSERT INTO `ingridients` VALUES ('14', 'whiskey');
INSERT INTO `ingridients` VALUES ('15', 'gin');
INSERT INTO `ingridients` VALUES ('16', 'dry gin');
INSERT INTO `ingridients` VALUES ('17', 'bourbon whiskey');
INSERT INTO `ingridients` VALUES ('18', 'tennessee whiskey');
INSERT INTO `ingridients` VALUES ('19', 'amaretto');
INSERT INTO `ingridients` VALUES ('20', 'liqueur');
INSERT INTO `ingridients` VALUES ('21', 'cream');
INSERT INTO `ingridients` VALUES ('22', 'ice cream');
INSERT INTO `ingridients` VALUES ('23', 'juice');
INSERT INTO `ingridients` VALUES ('24', 'apricots');

-- ----------------------------
-- Table structure for `tags`
-- ----------------------------
DROP TABLE IF EXISTS `tags`;
CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tags
-- ----------------------------
INSERT INTO `tags` VALUES ('8', 'non-alcoholic');
INSERT INTO `tags` VALUES ('9', 'alcoholic');
INSERT INTO `tags` VALUES ('10', 'tropical');
INSERT INTO `tags` VALUES ('11', 'champagne');
INSERT INTO `tags` VALUES ('12', 'creamy');
INSERT INTO `tags` VALUES ('13', 'frozen');
INSERT INTO `tags` VALUES ('14', 'hot');
INSERT INTO `tags` VALUES ('15', 'long');
INSERT INTO `tags` VALUES ('16', 'short');
INSERT INTO `tags` VALUES ('17', 'cofee');
INSERT INTO `tags` VALUES ('18', 'tea');
INSERT INTO `tags` VALUES ('19', 'beer');
INSERT INTO `tags` VALUES ('20', 'ale');
