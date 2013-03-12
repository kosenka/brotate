DROP TABLE IF EXISTS `brotate`;
CREATE TABLE IF NOT EXISTS `brotate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bnrDefault` tinyint(1) unsigned NOT NULL,
  `bnrTag` varchar(25) NOT NULL,
  `bnrTyp` enum('swf','img','js','text') NOT NULL,
  `bnrFile` varchar(50) NOT NULL,
  `bnrWidth` int(10) unsigned NOT NULL DEFAULT '0',
  `bnrHeight` int(10) unsigned NOT NULL DEFAULT '0',
  `bnrUrl` varchar(250) NOT NULL,
  `bnrClicks` int(10) unsigned NOT NULL DEFAULT '0',
  `bnrVisible` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `bnrVisibleFrom` date NOT NULL,
  `bnrVisibleTo` date NOT NULL,
  `bnrVisibleLimit` int(11) NOT NULL DEFAULT '0',
  `bnrViewedCurrent` int(10) unsigned NOT NULL DEFAULT '0',
  `bnrViewedTotal` int(10) unsigned NOT NULL DEFAULT '0',
  `bnrDescr` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `bnrVisible` (`bnrVisible`),
  KEY `bnrVisibleFrom` (`bnrVisibleFrom`),
  KEY `bnrVisibleTo` (`bnrVisibleTo`)
);

DROP TABLE IF EXISTS `brotate_stat`;
CREATE TABLE IF NOT EXISTS `brotate_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bannerId` int(11) NOT NULL,
  `showTime` int(11) NOT NULL,
  `showRef` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `bannerId` (`bannerId`)
);
