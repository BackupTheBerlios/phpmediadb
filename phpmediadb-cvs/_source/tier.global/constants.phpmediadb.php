<?php
/**
 * $Id: constants.phpmediadb.php,v 1.8 2005/04/22 21:55:08 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        constants.phpmediadb.php
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
 * @subpackage	global
 * @version     $Revision: 1.8 $
 */
 
/**
 * This files handels all contants
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