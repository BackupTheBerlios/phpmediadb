<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-add.php,v 1.1 2005/03/15 17:37:30 mblaschke Exp $ */

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
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( 'body.item.add.choice.tpl' );
		break;
}




//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>