<?php
/**
 * $Id: i18n.de.php,v 1.16 2005/06/06 09:25:23 bruf Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        i18n.de.php
 * License:     GNU General Publice License
 *
 * This file is part of phpMediaDB.
 *
 * phpMediaDB is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * phpMediaDB mailing list. See phpMediaDB projectportal for more
 * information.
 *
 * @link        http://phpmediadb.berlios.de/
 * @copyright   2004-2005 &copy; Blaschke, Markus; Ruf, Boris
 * @license     http://opensource.org/licenses/gpl-license.php GNU General Public License
 * @author      Markus Blaschke <mblaschke@users.berlios.de>
 * @author      Boris Ruf <bruf@users.berlios.de>
 * @package		phpmediadb
 * @subpackage	configuration
 * @version     $Revision: 1.16 $
 */
// $i18n['STRING-ID'] = "";

/******************************************************************************
*** HTML-Translations
******************************************************************************/

	$i18n['MEDIA_VIDEO_TITLE'] = 'audio-visuelles Medium';
	
/* default i18ns */
	$i18n['OK']					= 'Akzeptieren';
	$i18n['CANCEL']				= 'Abbrechen';
	$i18n['DELETE']				= 'Löschen';
	$i18n['INPUT_FIELD']		= 'Eingabefeld';
	$i18n['NOT_IMPLEMENTED']	= 'Diese Funktion ist in dieser Version noch nicht implementiert worden.';
	
/* messages */
	$i18n['MESSAGE_SUCCESS_SAVE']	= 'Element erfolgreich gespeichert!';
	
/* errors */
	$i18n['ERROR_TITLE']						= 'Fehlertitel';
	$i18n['ERROR_INPUTSIZE']					= 'Eingabe zu lang.';
	$i18n['ERROR_INPUTREGEX']					= 'Eingabe nicht korrekt.';
	$i18n['ERROR_OCCURRED']						= 'Es sind Eingabefehler auftreten.';
	$i18n['ERROR_LISTLINK']						= '[Fehlerliste]';
	$i18n['HTTP_ERROR_401_TITLE']				= 'HTTP 401 - Authentisierung fehlgeschlagen!';
	$i18n['HTTP_ERROR_401_BODY']				= 'Der Server konnte nicht verifizieren, ob Sie autorisiert sind. Entweder wurden falsche Referenzen (z.B. ein falsches Passwort) angegeben oder ihr Browser versteht nicht, wie die geforderten Referenzen zu übermitteln sind.';
	$i18n['HTTP_ERROR_403_TITLE']				= 'HTTP 403 - Zugriff verweigert!';
	$i18n['HTTP_ERROR_403_BODY']				= 'Der Zugriff auf das angeforderte Objekt ist nicht möglich. Entweder kann es vom Server nicht gelesen werden oder es ist zugriffsgeschützt.';
	$i18n['HTTP_ERROR_404_TITLE']				= 'HTTP 404 - Objekt nicht gefunden!';
	$i18n['HTTP_ERROR_404_BODY']				= 'Der angeforderte URL konnte auf dem Server nicht gefunden werden.';
	$i18n['HTTP_ERROR_500_TITLE']				= 'HTTP 500 - Serverfehler!';
	$i18n['HTTP_ERROR_500_BODY']				= 'Die Anfrage kann nicht beantwortet werden, da im Server ein interner Fehler aufgetreten ist. Der Server ist entweder überlastet oder ein Fehler in einem CGI-Skript ist aufgetreten.';
	$i18n['HTTP_ERROR_UNKNOWN_TITLE']			= 'Unbekannter Fehler!';
	$i18n['HTTP_ERROR_UNKNOWN_BODY']			= 'Es ist ein unbekannter Fehler aufgetreten.';

	$i18n['MESSAGE_ITEMID_NOTNUMERICAL']		= 'Die gewählte Medien-Nummer ist nicht nummerisch!';
	$i18n['MESSAGE_ITEM_LOADERROR']				= 'Das Medium konnte nicht geladen werden.';
	$i18n['MESSAGE_ITEM_NOTEXISTENT']			= 'Das Medium existiert nicht.';
	
/* formular */
	$i18n['FORM_RESET']					= 'Zurücksetzen';
	$i18n['FORM_SUBMIT']				= 'Absenden';
	$i18n['FORMULAR_OPTION_ITEM_EMPTY']	= 'Bitte wählen / Keine Auswahl';
	$i18n['HYPERLINK_BACK']				= '<< Zurück';
	
/* media data */
	$i18n['MEDIA_TITLE']	= 'Medientitel';
	$i18n['MEDIA_ARTIST']	= 'Artist';
	$i18n['MEDIA_Category']	= 'Kategorie';
	
/* projectdata */
	$i18n['PROJECT_SUBTITLE']		= 'OpenSource Mediendatenbank';
	$i18n['PROJECT_LICENSED_UNDER']	= 'Lizenziert unter';
	$i18n['PROJECT_DESCRIPTION']	= 'Dieses Projekt dient zur Erfassung von auditiven, visuellen und Printmedien. Initiert wurde dieses Projekt von Boris Ruf und Markus Blaschke im Rahmen eines Technikerprojekts an der Werner-Siemens-Schule in Stuttgart.';
	
/* Menu items */
	$i18n['MENU_TITLE']					= 'Navigation';
	$i18n['MENU_HOME']					= 'Startseite';
	$i18n['MENU_SEARCH']				= 'Suche';
	$i18n['MENU_LIST']					= 'Liste';
	$i18n['MENU_ABOUT']					= 'Über uns';
	$i18n['MENU_ADDITEM']				= 'Medium hinzufügen';
	$i18n['MENU_ADMINISTRATION_TITLE']	= 'Administration';


/* Itemtypes */
	$i18n['ITEM_AUDIO'] = 'Audio';
	$i18n['ITEM_VIDEO'] = 'Video';
	$i18n['ITEM_PRINT'] = 'Print';

/* Site: HOME */
	$i18n['HOME_WELCOME'] = 'Willkommen zu phpMediaDB';

/* */
	$i18n['MEDIA_ITEM_CREATIONDATE']			= 'Erstellt am';
	$i18n['MEDIA_ITEM_MODIFICATIONDATE']		= 'Geändert am';
	
/**/
	$i18n['LIST_COLUMN_TITLE_MEDIATITLE']		= 'Titel';
	$i18n['LIST_COLUMN_TITLE_RELEASEDATE']		= 'Veröffentlichungsjahr';
	$i18n['LIST_COLUMN_AUDIO_MEDIATITLE']		= 'Titel';
	$i18n['LIST_COLUMN_AUDIO_RELEASEDATE']		= 'Veröffentlichungsjahr';
	$i18n['LIST_COLUMN_PRINT_MEDIATITLE']		= 'Titel';
	$i18n['LIST_COLUMN_PRINT_RELEASEDATE']		= 'Veröffentlichungsjahr';
	$i18n['LIST_COLUMN_VIDEO_MEDIATITLE']		= 'Titel';
	$i18n['LIST_COLUMN_VIDEO_RELEASEDATE']		= 'Veröffentlichungsjahr';
	
/*----------------------------------------------------------*/	
	$i18n['ACTION_DELETE']					= 'Löschen';
	$i18n['ACTION_MODIFY']					= 'Ändern';



	$i18n['MEDIA_AGERESTRICTION']			= 'Altersbeschränkung';
	$i18n['MEDIA_CATEGORY']					= 'Kategorie';
	$i18n['MEDIA_CODEC']					= 'Codec';
	$i18n['MEDIA_COMMENT']					= 'Kommentar';
	$i18n['MEDIA_CREATIONDATE']				= 'Erstellt am';
	$i18n['MEDIA_DATA_AUDIO']				= 'Audiodaten';
	$i18n['MEDIA_DATA_PRINT']				= 'Printdaten';
	$i18n['MEDIA_DATA_VIDEO']				= 'Videodaten';
	$i18n['MEDIA_FORMAT']					= 'Format';
	$i18n['MEDIA_IDENTIFICATION']			= 'Identifiactionsnummer';
	$i18n['MEDIA_IMAGE']					= 'Bild';
	$i18n['MEDIA_MEDIANAME']				= 'Medienname';
	$i18n['MEDIA_MEDIASIZE']				= 'Mediengröße';
	$i18n['MEDIA_MODIFICATIONDATE']			= 'Geändert am';
	$i18n['MEDIA_ORIGINALTITLE']			= 'Original Titel';
	$i18n['MEDIA_PUBLISHER']				= 'Veröffentlicher';
	$i18n['MEDIA_QUANTITY']					= 'Anzahl';
	$i18n['MEDIA_RELEASEYEAR']				= 'Erscheinungsjahr';
	$i18n['MEDIA_TITLE']					= 'Titel';

	$i18n['MESSAGE']						= 'Nachricht';
	$i18n['NOT_SET']						= 'Nicht gesetzt';
	 
	$i18n['BUTTON_ABORT']						= 'Abbrechen';
	$i18n['BUTTON_ITEMDELETE']					= 'Löschen';
	
/* audio */
	$i18n['MEDIA_AUDIO_IMAGEDELETE']			= 'Bild löschen';
	$i18n['MEDIA_AUDIO_ITEM_AGERESTRICTION']	= 'Altersbeschränkung';
	$i18n['MEDIA_AUDIO_ITEM_CATEGORY']			= 'Kategorie';
	$i18n['MEDIA_AUDIO_ITEM_CODEC']				= 'Codec';
	$i18n['MEDIA_AUDIO_ITEM_COMMENT']			= 'Kommentar';
	$i18n['MEDIA_AUDIO_ITEM_FORMAT']			= 'Format';
	$i18n['MEDIA_AUDIO_ITEM_IDENTIFICATION']	= 'Identifikation';
	$i18n['MEDIA_AUDIO_ITEM_IMAGE']				= 'Bild';
	$i18n['MEDIA_AUDIO_ITEM_IMAGEURL']			= 'Bildadresse';
	$i18n['MEDIA_AUDIO_ITEM_LOCATION']			= 'Standort';
	$i18n['MEDIA_AUDIO_ITEM_MEDIANAME']			= 'Medienname';
	$i18n['MEDIA_AUDIO_ITEM_MEDIASIZE']			= 'Länge (Min)';
	$i18n['MEDIA_AUDIO_ITEM_ORIGINALTITLE']		= 'Original Titel';
	$i18n['MEDIA_AUDIO_ITEM_PUBLISHER']			= 'Veröffentlicher';
	$i18n['MEDIA_AUDIO_ITEM_QUANTITY']			= 'Anzahl';
	$i18n['MEDIA_AUDIO_ITEM_RELEASEYEAR']		= 'Veröffentlichungsjahr';
	$i18n['MEDIA_AUDIO_ITEM_TITLE']				= 'Titel';
	$i18n['MEDIA_AUDIO_TITLE']					= 'Audio';
	
/* print */
	$i18n['MEDIA_PRINT_IMAGEDELETE']			= 'Bild löschen';
	$i18n['MEDIA_PRINT_ITEM_AGERESTRICTION']	= 'Altersbeschränkung';
	$i18n['MEDIA_PRINT_ITEM_CATEGORY']			= 'Kategorie';
	$i18n['MEDIA_PRINT_ITEM_CODEC']				= 'Codec';
	$i18n['MEDIA_PRINT_ITEM_COMMENT']			= 'Kommentar';
	$i18n['MEDIA_PRINT_ITEM_FORMAT']			= 'Format';
	$i18n['MEDIA_PRINT_ITEM_IDENTIFICATION']	= 'ISBN';
	$i18n['MEDIA_PRINT_ITEM_IMAGE']				= 'Bild';
	$i18n['MEDIA_PRINT_ITEM_IMAGEURL']			= 'Bildadresse';
	$i18n['MEDIA_PRINT_ITEM_LOCATION']			= 'Standort';
	$i18n['MEDIA_PRINT_ITEM_MEDIANAME']			= 'Medienname';
	$i18n['MEDIA_PRINT_ITEM_MEDIASIZE']			= 'Seitenanzahl';
	$i18n['MEDIA_PRINT_ITEM_ORIGINALTITLE']		= 'Original Titel';
	$i18n['MEDIA_PRINT_ITEM_PUBLISHER']			= 'Veröffentlicher';
	$i18n['MEDIA_PRINT_ITEM_QUANTITY']			= 'Anzahl';
	$i18n['MEDIA_PRINT_ITEM_RELEASEYEAR']		= 'Veröffentlichungsjahr';
	$i18n['MEDIA_PRINT_ITEM_TITLE']				= 'Titel';
	$i18n['MEDIA_PRINT_TITLE']					= 'Print';

/* video */
	$i18n['MEDIA_VIDEO_IMAGEDELETE']			= 'Bild löschen';
	$i18n['MEDIA_VIDEO_ITEM_AGERESTRICTION']	= 'Altersbeschränkung';
	$i18n['MEDIA_VIDEO_ITEM_CATEGORY']			= 'Kategorie';
	$i18n['MEDIA_VIDEO_ITEM_CODEC']				= 'Codec';
	$i18n['MEDIA_VIDEO_ITEM_COMMENT']			= 'Kommentar';
	$i18n['MEDIA_VIDEO_ITEM_FORMAT']			= 'Format';
	$i18n['MEDIA_VIDEO_ITEM_IDENTIFICATION']	= 'Identifikation';
	$i18n['MEDIA_VIDEO_ITEM_IMAGE']				= 'Bild';
	$i18n['MEDIA_VIDEO_ITEM_IMAGEURL']			= 'Bildadresse';
	$i18n['MEDIA_VIDEO_ITEM_LOCATION']			= 'Standort';
	$i18n['MEDIA_VIDEO_ITEM_MEDIANAME']			= 'Medienname';
	$i18n['MEDIA_VIDEO_ITEM_MEDIASIZE']			= 'Länge (Min)';
	$i18n['MEDIA_VIDEO_ITEM_ORIGINALTITLE']		= 'Original Titel';
	$i18n['MEDIA_VIDEO_ITEM_PUBLISHER']			= 'Veröffentlicher';
	$i18n['MEDIA_VIDEO_ITEM_QUANTITY']			= 'Anzahl';
	$i18n['MEDIA_VIDEO_ITEM_RELEASEYEAR']		= 'Veröffentlichungsjahr';
	$i18n['MEDIA_VIDEO_ITEM_TITLE']				= 'Titel';
	$i18n['MEDIA_VIDEO_TITLE']					= 'Video';

/* */
	$i18n['QUESTION_ITEMDELETE']				= 'Soll der Eintrag wirklich gelöscht werden?';
	$i18n['MESSAGE_DELETION_SUCCESS']			= 'Eintrag wurde erfolgreich gelöscht.';
	$i18n['MESSAGE_SAVE_SUCCESS']				= 'Eintrag wurde erfolgreich gespeichert.';


	

/******************************************************************************
*** SQL-Translations
******************************************************************************/

/* Categories */

	$i18n['Category_Blues']							= 'Blues';
	$i18n['Category_Classic-Rock']					= 'Klassischer Rock';
	$i18n['Category_Country']						= 'Country';
	$i18n['Category_Dance']							= 'Dance';
	$i18n['Category_Disco']							= 'Disco';
	$i18n['Category_Funk']							= 'Funk';
	$i18n['Category_Grunge']						= 'Grunge';
	$i18n['Category_Hip-Hop']						= 'Hip-Hop';
	$i18n['Category_Jazz']							= 'Jazz';
	$i18n['Category_Metal']							= 'Metal';
	$i18n['Category_New-Age']						= 'New Age';
	$i18n['Category_Oldies']						= 'Oldies';
	$i18n['Category_Other']							= 'Andere';
	$i18n['Category_Pop']							= 'Pop';
	$i18n['Category_R&B']							= 'R&B';
	$i18n['Category_Rap']							= 'Rap';
	$i18n['Category_Reggae']						= 'Reggae';
	$i18n['Category_Rock']							= 'Rock';
	$i18n['Category_Techno']						= 'Techno';
	$i18n['Category_Industrial']					= 'Industrial';
	$i18n['Category_Alternative']					= 'Alternative';
	$i18n['Category_Ska']							= 'Ska';
	$i18n['Category_Death-Metal']					= 'Death Metal';
	$i18n['Category_Pranks']						= 'Pranks';
	$i18n['Category_Soundtrack']					= 'Soundtrack';
	$i18n['Category_Euro-Techno']					= 'Euro-Techno';
	$i18n['Category_Ambient']						= 'Ambient';
	$i18n['Category_Trip-Hop']						= 'Trip-Hop';
	$i18n['Category_Vocal']							= 'Vocal';
	$i18n['Category_Jazz+Funk']						= 'Jazz+Funk';
	$i18n['Category_Fusion']						= 'Fusion';
	$i18n['Category_Trance']						= 'Trance';
	$i18n['Category_Classical']						= 'Klassisch';
	$i18n['Category_Instrumental']					= 'Instrumetal';
	$i18n['Category_Acid']							= 'Acid';
	$i18n['Category_House']							= 'House';
	$i18n['Category_Game']							= 'Game';
	$i18n['Category_Sound-Clip']					= 'Sound Clip';
	$i18n['Category_Gospel']						= 'Gospel';
	$i18n['Category_Noise']							= 'Noise';
	$i18n['Category_AlternRock']					= 'AlternRock';
	$i18n['Category_Bass']							= 'Bass';
	$i18n['Category_Soul']							= 'Soul';
	$i18n['Category_Punk']							= 'Punk';
	$i18n['Category_Space']							= 'Space';
	$i18n['Category_Meditative']					= 'Meditativ';
	$i18n['Category_Instrumental-Pop']				= 'Instrumental Pop';
	$i18n['Category_Instrumental-Rock']				= 'Instrumental Rock';
	$i18n['Category_Ethnic']						= 'Ethnic';
	$i18n['Category_Gothic']						= 'Gothic';
	$i18n['Category_Darkwave']						= 'Darkwave';
	$i18n['Category_Techno-Industrial']				= 'Techno-Industrial';
	$i18n['Category_Electronic']					= 'Eletronic';
	$i18n['Category_Pop-Folk']						= 'Pop-Folk';
	$i18n['Category_Eurodance']						= 'Eurodance';
	$i18n['Category_Dream']							= 'Dream';
	$i18n['Category_Southern-Rock']					= 'Südländischer Rock';
	$i18n['Category_Comedy']						= 'Comedy';
	$i18n['Category_Cult']							= 'Kult';
	$i18n['Category_Gangsta']						= 'Gangsta';
	$i18n['Category_Top-40']						= 'Top 40';
	$i18n['Category_Christian-Rap']					= 'Christlicher Rap';
	$i18n['Category_Pop/Funk']						= 'Pop/Funk';
	$i18n['Category_Jungle']						= 'Jungle';
	$i18n['Category_Native-American']				= 'Native American';
	$i18n['Category_Cabaret']						= 'Cabaret';
	$i18n['Category_New Wave']						= 'New Wave';
	$i18n['Category_Psychadelic']					= 'Psychadelic';
	$i18n['Category_Rave']							= 'Rave';
	$i18n['Category_Showtunes']						= 'Showtunes';
	$i18n['Category_Trailer']						= 'Trailer';
	$i18n['Category_Lo-Fi']							= 'Lo-Fi';
	$i18n['Category_Tribal']						= 'Tribal';
	$i18n['Category_Acid-Punk']						= 'Acid Punk';
	$i18n['Category_Acid-Jazz']						= 'Acid Jazz';
	$i18n['Category_Polka']							= 'Polka';
	$i18n['Category_Retro']							= 'Retro';
	$i18n['Category_Musical']						= 'Musical';
	$i18n['Category_Rock&Roll']						= 'Rock & Roll';
	$i18n['Category_Hard-Rock']						= 'Hard Rock';
	$i18n['Category_Folk']							= 'Folk';
	$i18n['Category_Folk-Rock']						= 'Folk-Rock';
	$i18n['Category_National-Folk']					= 'National Folk';
	$i18n['Category_Swing']							= 'Swing';
	$i18n['Category_Fast-Fusion']					= 'Fast Fusion';
	$i18n['Category_Bebob']							= 'Bebob';
	$i18n['Category_Latin']							= 'Latin';
	$i18n['Category_Revival']						= 'Revival';
	$i18n['Category_Celtic']						= 'Celtic';
	$i18n['Category_Bluegrass']						= 'Bluegrass';
	$i18n['Category_Avantgarde']					= 'Avantgarde';
	$i18n['Category_Gothic-Rock']					= 'Gothic Rock';
	$i18n['Category_Progressive-Rock']				= 'Progressive Rock';
	$i18n['Category_Psychedelic-Rock']				= 'Psychedelic Rock';
	$i18n['Category_Symphonic-Rock']				= 'Symphonic Rock';
	$i18n['Category_Slow-Rock']						= 'Slow Rock';
	$i18n['Category_Big-Band']						= 'Big Band';
	$i18n['Category_Chorus']						= 'Chorus';
	$i18n['Category_Easy-Listening']				= 'Easy Listening';
	$i18n['Category_Acoustic']						= 'Akustisch';
	$i18n['Category_Humour']						= 'Humor';
	$i18n['Category_Speech']						= 'Sprache';
	$i18n['Category_Chanson']						= 'Chanson';
	$i18n['Category_Opera']							= 'Oper';
	$i18n['Category_Chamber-Music']					= 'Kammermusik';
	$i18n['Category_Sonata']						= 'Sonate';
	$i18n['Category_Symphony']						= 'Symphonie';
	$i18n['Category_Booty-Bass']					= 'Booty Bass';
	$i18n['Category_Primus']						= 'Priums';
	$i18n['Category_Porn-Groove']					= 'Porn Groove';
	$i18n['Category_Satire']						= 'Satire';
	$i18n['Category_Slow-Jam']						= 'Slow Jam';
	$i18n['Category_Club']							= 'Club';
	$i18n['Category_Tango']							= 'Tango';
	$i18n['Category_Samba']							= 'Samba';
	$i18n['Category_Folklore']						= 'Folklore';
	$i18n['Category_Ballad']						= 'Ballade';
	$i18n['Category_Power-Ballad']					= 'Power Ballade';
	$i18n['Category_Rhythmic-Soul']					= 'Rhythmischer Soul';
	$i18n['Category_Freestyle']						= 'Freestyle';
	$i18n['Category_Duet']							= 'Duett';
	$i18n['Category_Punk-Rock']						= 'Punk Rock';
	$i18n['Category_Drum-Solo']						= 'Drum Solo';
	$i18n['Category_Acapella']						= 'Acapella';
	$i18n['Category_Euro-House']					= 'Euro-House';
	$i18n['Category_Dance-Hall']					= 'Dance Hall';
	$i18n['Category_Goa']							= 'Goa';
	$i18n['Category_Drum&Bass']						= 'Drum & Bass';
	$i18n['Category_Club-House']					= 'Club-House';
	$i18n['Category_Hardcore']						= 'Hardcore';
	$i18n['Category_Terror']						= 'Terror';
	$i18n['Category_Indie']							= 'Indie';
	$i18n['Category_BritPop']						= 'BritPop';
	$i18n['Category_Negerpunk']						= 'Negerpunk';
	$i18n['Category_Polsk-Punk']					= 'Polsk Punk';
	$i18n['Category_Beat']							= 'Beat';
	$i18n['Category_Christian-Gangsta Rap']			= 'Christlicher Gangster Rap';
	$i18n['Category_Heavy-Metal']					= 'Heavy Metal';
	$i18n['Category_Black-Metal']					= 'Black Metal';
	$i18n['Category_Crossover']						= 'Crossover';
	$i18n['Category_Contemporary-Christian']		= 'Christlich Contemporary';
	$i18n['Category_Christian-Rock']				= 'Christlicher Rock';
	$i18n['Category_Merengue']						= 'Merengue';
	$i18n['Category_Salsa']							= 'Salsa';
	$i18n['Category_Trash-Metal']					= 'Trash Metal';
	$i18n['Category_Anime']							= 'Anime';
	$i18n['Category_Jpop']							= 'Jpop';
	$i18n['Category_Synthpop']						= 'Synthpop';

	$i18n['Category_Action']		= 'Action';
	$i18n['Category_Adventure']		= 'Adventure';
	$i18n['Category_Animation']		= 'Animation';
	$i18n['Category_Comedy']		= 'Komödie';
	$i18n['Category_Crime']			= 'Krimi';
	$i18n['Category_Documentary']	= 'Dokumentation';
	$i18n['Category_Drama']			= 'Drama';
	$i18n['Category_Family']		= 'Familie';
	$i18n['Category_Fantasy']		= 'Fantasie';
	$i18n['Category_Film-Noir']		= 'Schwarz-Weiß Film';
	$i18n['Category_Horror']		= 'Horror';
	$i18n['Category_Music']			= 'Musik';
	$i18n['Category_Musical']		= 'Musical';
	$i18n['Category_Mystery']		= 'Mystery';
	$i18n['Category_Romance']		= 'Romanze';
	$i18n['Category_Sci-Fi']		= 'Sciene-Fiction';
	$i18n['Category_Short']			= 'Kurzfilm';
	$i18n['Category_Thriller']		= 'Thriller';
	$i18n['Category_War']			= 'Kriegsfilm';
	$i18n['Category_Western']		= 'Western';	
	
	$i18n['Category_Antiquarian']		= 'Antiquarisch';
	$i18n['Category_Fiction']			= 'Gedichte';
	$i18n['Category_Biography']			= 'Biography';
	$i18n['Category_Business']			= 'Geschäft';
	$i18n['Category_Computer']			= 'Computer';
	$i18n['Category_Erotic']			= 'Erotik';
	$i18n['Category_Technical']			= 'Technisch';
	$i18n['Category_Movie']				= 'Filme';
	$i18n['Category_Comic']				= 'Comic';
	$i18n['Category_Children']			= 'Kinderbuch';
	$i18n['Category_Young']				= 'Jugendbuch';
	$i18n['Category_Cooking']			= 'Kochbuch';
	$i18n['Category_Crime']				= 'Krimi';
	$i18n['Category_Thriller']			= 'Thriller';
	$i18n['Category_Learning']			= 'Lernbuch';
	$i18n['Category_Music']				= 'Musik';
	$i18n['Category_Sciences']			= 'Wissenschaft';
	$i18n['Category_Politics']			= 'Politik';
	$i18n['Category_History']			= 'Geschichte';
	$i18n['Category_Advisory']			= 'Beratung';
	$i18n['Category_Traveling']			= 'Reise';
	$i18n['Category_Sport']				= 'Sport';
	$i18n['Category_Religion']			= 'Religion';
	$i18n['Category_Esoterism']			= 'Esoterik';
	$i18n['Category_Science-Fiction']	= 'Science-Fiction';
	$i18n['Category_Fantasy']			= 'Fantasy';
	$i18n['Category_Horror']			= 'Horror';
	$i18n['Category_EBook']				= 'Elektronisches Buch';
	
	$i18n['AgeRestriction_Free']		= 'Keine Beschränkung';
	$i18n['AgeRestriction_6Years']		= 'Ab 6 Jahre';
	$i18n['AgeRestriction_12Years']		= 'Ab 12 Jahre';
	$i18n['AgeRestriction_16Years']		= 'Ab 16 Jahre';
	$i18n['AgeRestriction_18Years']		= 'Ab 18 Jahre';
	
	$i18n['Codec_MP3']			= 'MP3';
	$i18n['Codec_Vorbis']		= 'Ogg Vorbis';
	$i18n['Codec_WAVE']			= 'Wave';
	$i18n['Codec_WMA']			= 'WMA';
	$i18n['Codec_AC3']			= 'AC3';
	$i18n['Codec_MP3Pro']		= 'MP3Pro';
	$i18n['Codec_MPEGPlus']		= 'MPEGPlus';
	$i18n['Codec_AAC']			= 'ACC';
	$i18n['Codec_Divx']			= 'DivX';
	$i18n['Codec_Xvid']			= 'Xvid';
	$i18n['Codec_MPEG4']		= 'MPEG4';
	$i18n['Codec_Dirac']		= 'Dirac';
	$i18n['Codec_MPEG2']		= 'MPEG2';
	$i18n['Codec_Quicktime']	= 'Quicktime';
	$i18n['Codec_AIFF_AIFC']	= 'AIFF/AIFC';
	$i18n['Codec_PCM']			= 'PCM/Wave';
	$i18n['Codec_PDF']			= 'Acrobat PDF';
	$i18n['Codec_Word']			= 'Microsoft Word';
	$i18n['Codec_OpenOffice']	= 'Openoffice.org';
	$i18n['Codec_RTF']			= 'Richtext Format';

	$i18n['Format_AudioCD']		= 'AudioCD';
	$i18n['Format_AudioDVD']	= 'AudioDVD';
	$i18n['Format_MiniDisc']	= 'MiniDisc';
	$i18n['Format_Cassette']	= 'Kassette';
	$i18n['Format_DV']			= 'DV';
	$i18n['Format_VHS']			= 'VHS';
	$i18n['Format_SVHS']		= 'SVHS';
	$i18n['Format_DVD']			= 'DVD';
	$i18n['Format_VCD']			= 'VideoCD';
	$i18n['Format_SVCD']		= 'SuperVideoCD';
	$i18n['Format_Hi8']			= 'Hi8';
	$i18n['Format_MiniDV']		= 'MiniDV';
	$i18n['Format_MiniDVD']		= 'MiniDVD';
	$i18n['Format_Video8']		= 'Video8';
	$i18n['Format_Hardcover']	= 'Hardcover';
	$i18n['Format_Softcover']	= 'Softcover';
	$i18n['Format_File']		= 'Datei';
	
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>
