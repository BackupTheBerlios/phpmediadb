-- phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
-- $Id: create-tables.sql,v 1.8 2005/04/21 20:30:14 mblaschke Exp $

CREATE TABLE AudioDatas (
  AudioDataID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemID INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(AudioDataID),
  INDEX AudioDatas_FKIndex3(ItemID)
);

CREATE TABLE BinaryDatas (
  ItemPicturesID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemID INTEGER UNSIGNED NOT NULL,
  BinaryDataMimeType VARCHAR(255) NOT NULL,
  BinaryDataSize INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(ItemPicturesID),
  INDEX BinaryDatas_FKIndex1(ItemID)
);

CREATE TABLE Categories (
  CategoryID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemTypeID INTEGER UNSIGNED NOT NULL,
  CategoryName VARCHAR(255) NOT NULL,
  PRIMARY KEY(CategoryID),
  INDEX Categories_FKIndex1(ItemTypeID)
);

CREATE TABLE Categories_has_Items (
  ItemID INTEGER UNSIGNED NOT NULL,
  CategoryID INTEGER UNSIGNED NOT NULL,
  INDEX Categories_has_Items_FKIndex1(CategoryID),
  INDEX Categories_has_Items_FKIndex2(ItemID)
);

CREATE TABLE Items (
  ItemID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  MediaAgeRestrictionID INTEGER UNSIGNED,
  MediaCodecID INTEGER UNSIGNED,
  MediaFormatID INTEGER UNSIGNED,
  ItemTitle VARCHAR(255),
  ItemOriginalTitle VARCHAR(255) NOT NULL,
  ItemReleaseDate VARCHAR(255) NOT NULL,
  ItemMediaName VARCHAR(255) NOT NULL,
  ItemCreationDate DATETIME,
  ItemModificationDate DATETIME,
  ItemComment BLOB NOT NULL,
  ItemQuantity VARCHAR(255) NOT NULL,
  ItemIdentifier VARCHAR(255) NOT NULL,
  ItemTypeID INTEGER UNSIGNED NOT NULL,
  ItemPublisher VARCHAR(255) NOT NULL, 
  ItemLocation VARCHAR(255) NOT NULL, 
  ItemPictureURL VARCHAR(255) NOT NULL, 
  PRIMARY KEY(ItemID),
  INDEX Items_FKIndex1(ItemTypeID),
  INDEX Items_FKIndex3(MediaFormatID),
  INDEX Items_FKIndex4(MediaCodecID),
  INDEX Items_FKIndex5(MediaAgeRestrictionID)
);

CREATE TABLE ItemTypes (
  ItemTypeID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemTypeCode VARCHAR(255) NOT NULL,
  PRIMARY KEY(ItemTypeID)
);

CREATE TABLE MediaAgeRestrictions (
  MediaAgeRestrictionID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  MediaAgeRestriction VARCHAR(255) NOT NULL,
  PRIMARY KEY(MediaAgeRestrictionID)
);

CREATE TABLE MediaCodecs (
  MediaCodecID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemTypeID INTEGER UNSIGNED NOT NULL,
  MediaCodecName VARCHAR(255) NOT NULL,
  PRIMARY KEY(MediaCodecID),
  INDEX MediaCodecs_FKIndex1(ItemTypeID)
);

CREATE TABLE MediaFormats (
  MediaFormatID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemTypeID INTEGER UNSIGNED NOT NULL,
  MediaFormatName VARCHAR(255) NOT NULL,
  PRIMARY KEY(MediaFormatID),
  INDEX MediaFormats_FKIndex1(ItemTypeID)
);

CREATE TABLE PrintDatas (
  PrintDataID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemID INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(PrintDataID),
  INDEX PrintDatas_FKIndex2(ItemID)
);

CREATE TABLE VideoDatas (
  VideoDataID INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  ItemID INTEGER UNSIGNED NOT NULL,
  PRIMARY KEY(VideoDataID),
  INDEX VideoDatas_FKIndex2(ItemID)
);

-- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF --