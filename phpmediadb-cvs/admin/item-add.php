<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-add.php,v 1.3 2005/03/24 17:12:17 mblaschke Exp $ */
/**
 * This file adds one item to the session and redirects to item-session.php
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.3 $
 * @package		phpmediadb_html
 * @subpackage	access_admin
 */
 
/* include main phpmediadb-project */
require_once( '../_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();

switch( @$_GET['type'] )
{
	case('audio'):
			/* create session-item */
			$sessionItem = array();
			$sessionItem['type'] = PHPMEDIADB_ITEM_AUDIO;
			$sessionItem['id']	 = NULL;
			$PHPMEDIADB->PRESENTATION->SESSION->register( 'sessionitem' ,$sessionItem );
			
			/* redirect */
			header( 'Location: item-session.php' );
		break;
	
	case('video'):
			/* create session-item */
			$sessionItem = array();
			$sessionItem['type'] = PHPMEDIADB_ITEM_VIDEO;
			$sessionItem['id']	 = NULL;
			$sessionItem['data'] = array();
			$PHPMEDIADB->PRESENTATION->SESSION->register( 'sessionitem' ,$sessionItem );
			
			/* redirect */
			header( 'Location: item-session.php' );
		break;

	case('print'):
			/* create session-item */
			$sessionItem = array();
			$sessionItem['type'] = PHPMEDIADB_ITEM_PRINT;
			$sessionItem['id']	 = NULL;
			$sessionItem['data'] = array();
			$PHPMEDIADB->PRESENTATION->SESSION->register( 'sessionitem' ,$sessionItem );
			
			/* redirect */
			header( 'Location: item-session.php' );
		break;

	default:
			/* display site */
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.item.add.choice.tpl' );
		break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>