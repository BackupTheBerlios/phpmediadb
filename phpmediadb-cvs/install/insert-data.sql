-- phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
-- $Id: insert-data.sql,v 1.3 2005/03/27 01:16:13 mblaschke Exp $

--
-- Daten für Tabelle `categories`
--

INSERT INTO `Categories` (`CategoryID`, `CategoryName`) VALUES (1, 'Category_Action'),
(2, 'Category_Adventure'),
(3, 'Category_Animation'),
(4, 'Category_Comedy'),
(5, 'Category_Crime'),
(6, 'Category_Documentary'),
(7, 'Category_Drama'),
(8, 'Category_Family'),
(9, 'Category_Fantasy'),
(10, 'Category_Film-Noir'),
(11, 'Category_Horror'),
(12, 'Category_Music'),
(13, 'Category_Musical'),
(14, 'Category_Mystery'),
(15, 'Category_Romance'),
(16, 'Category_Sci-Fi'),
(17, 'Category_Short'),
(18, 'Category_Thriller'),
(19, 'Category_War'),
(20, 'Category_Western');

--
-- Daten für Tabelle `itemtypes`
--

INSERT INTO `ItemTypes` (`ItemTypeID`, `ItemTypeCode`) VALUES (1, 'AUDIO'),
(2, 'VIDEO'),
(3, 'PRINT');

--
-- Daten für Tabelle `mediaagerestrictions`
--

INSERT INTO `MediaAgeRestrictions` (`MediaAgeRestrictionID`, `MediaAgeRestriction`) VALUES (1, 'AgeRestriction_Free'),
(2, 'AgeRestriction_6Years'),
(3, 'AgeRestriction_12Years'),
(4, 'AgeRestriction_16Years'),
(5, 'AgeRestriction_18Years');

--
-- Daten für Tabelle `mediacodecs`
--

INSERT INTO `MediaCodecs` (`MediaCodecID`, `ItemTypeID`, `MediaCodecName`) VALUES (1, 1, 'MP3'),
(2, 1, 'OGG Vorbis'),
(3, 1, 'WAVE'),
(4, 1, 'WMA'),
(5, 1, 'AC3'),
(6, 1, 'MP3Pro'),
(7, 1, 'MPEGPlus'),
(8, 1, 'AAC'),
(9, 2, 'DivX'),
(10, 2, 'XviD'),
(11, 2, 'MPEG4'),
(12, 2, 'Dirac'),
(15, 2, 'MPEG2'),
(14, 2, 'Quicktime'),
(16, 1, 'AIFF/AIFC'),
(18, 1, 'PCM'),
(19, 3, 'PDF'),
(20, 3, 'Word (DOC)'),
(21, 3, 'OpenOffice (SWX)'),
(22, 3, 'RTF');

--
-- Daten für Tabelle `mediaformats`
--

INSERT INTO `MediaFormats` (`MediaFormatID`, `ItemTypeID`, `MediaFormatName`) VALUES (1, 1, 'Datei'),
(2, 1, 'AudioCD'),
(3, 1, 'AudioDVD'),
(4, 1, 'MiniDisc'),
(5, 1, 'Kassette'),
(6, 2, 'DV'),
(7, 2, 'VHS'),
(8, 2, 'SVHS'),
(9, 2, 'DVD'),
(10, 2, 'Datei'),
(11, 2, 'VCD'),
(12, 2, 'SVCD'),
(13, 2, 'Hi8'),
(14, 2, 'MiniDV'),
(15, 2, 'MiniDVD'),
(16, 2, 'Video8'),
(17, 3, 'Hardcover'),
(18, 3, 'Softcover'),
(19, 3, 'Datei');

-- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF --