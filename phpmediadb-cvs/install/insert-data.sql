-- phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
-- $Id: insert-data.sql,v 1.4 2005/04/05 21:35:36 mblaschke Exp $

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
(2, 1, 'Codec_Vorbis'),
(3, 1, 'Codec_WAVE'),
(4, 1, 'Codec_WMA'),
(5, 1, 'Codec_AC3'),
(6, 1, 'Codec_MP3Pro'),
(7, 1, 'Codec_MPEGPlus'),
(8, 1, 'Codec_AAC'),
(9, 2, 'Codec_Divx'),
(10, 2, 'Codec_Xvid'),
(11, 2, 'Codec_MPEG4'),
(12, 2, 'Codec_Dirac'),
(15, 2, 'Codec_MPEG2'),
(14, 2, 'Codec_Quicktime'),
(16, 1, 'Codec_AIFF_AIFC'),
(18, 1, 'Codec_PCM'),
(19, 3, 'Codec_PDF'),
(20, 3, 'Codec_Word'),
(21, 3, 'Codec_OpenOffice'),
(22, 3, 'Codec_RTF');

--
-- Daten für Tabelle `mediaformats`
--

INSERT INTO `MediaFormats` (`MediaFormatID`, `ItemTypeID`, `MediaFormatName`) VALUES (1, 1, 'Datei'),
(2, 1, 'Format_AudioCD'),
(3, 1, 'Format_AudioDVD'),
(4, 1, 'Format_MiniDisc'),
(5, 1, 'Format_Cassette'),
(6, 2, 'Format_DV'),
(7, 2, 'Format_VHS'),
(8, 2, 'Format_SVHS'),
(9, 2, 'Format_DVD'),
(10, 2, 'Format_File'),
(11, 2, 'Format_VCD'),
(12, 2, 'Format_SVCD'),
(13, 2, 'Format_Hi8'),
(14, 2, 'Format_MiniDV'),
(15, 2, 'Format_MiniDVD'),
(16, 2, 'Format_Video8'),
(17, 3, 'Format_Hardcover'),
(18, 3, 'Format_Softcover'),
(19, 3, 'Format_File');

-- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF -- EOF --