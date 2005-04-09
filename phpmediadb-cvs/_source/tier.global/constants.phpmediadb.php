<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: constants.phpmediadb.php,v 1.6 2005/04/09 15:43:24 mblaschke Exp $ */
/**
 * This files handels all contants
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.6 $
 * @package		phpmediadb
 * @subpackage	global
 */
 
// --- tier.global ---
	/**
	 * Constant that indicates the phpmediadb-version
	 */
	define( 'PHPMEDIADB_SYSTEM_VERSION', '0.0.0-prealpha' ); 
	
	/**
	 * Constant that indicates the debuglevel of phpmediadb
	 *
	 * 0 - no debug
	 * 1 - debug with exception-message
	 * 2 - debug with stacktrace
	 */
	define( 'PHPMEDIADB_SYSTEM_DEBUGLEVEL' , 2);
 
// --- tier.presentation ---

    /**
     * Constant that indicates that the content is already HTML
     */
	define( 'PHPMEDIADB_NODEFORMAT_HTML', 1 );
	
    /**
     * Constant that indicates that the content is only text
     * and should be converted. XML/XHTML ruleset is used.
     */
	define( 'PHPMEDIADB_NODEFORMAT_TEXT', 0 );

// --- tier.business ---
    /**
     * Constant that indicated that the item is an audio-media
     */
     
	define( 'PHPMEDIADB_ITEM_AUDIO', 1 );
    /**
     * Constant that indicated that the item is an video-media
     */
	define( 'PHPMEDIADB_ITEM_VIDEO', 2 );
	
    /**
     * Constant that indicated that the item is an print-media
     */
	define( 'PHPMEDIADB_ITEM_PRINT', 3 );
	
    /**
     * Constant that indicated that the iteminfo is a agerestriction-info
     */	
	define( 'PHPMEDIADB_ITEMINFO_AGERESTRICTION', 900 );

    /**
     * Constant that indicated that the iteminfo is a category
     */	
	define( 'PHPMEDIADB_ITEMINFO_CATEGORIES', 901 );
	
    /**
     * Constant that indicated that the iteminfo is a codec
     */	
	define( 'PHPMEDIADB_ITEMINFO_CODECS', 902 );
	
    /**
     * Constant that indicated that the iteminfo is a format
     */	
	define( 'PHPMEDIADB_ITEMINFO_FORMATS', 903 );
	
    /**
     * Constant that indicated that the iteminfo is a status
     */	
	define( 'PHPMEDIADB_ITEMINFO_STATUS', 904 );

// --- tier.data ---

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>