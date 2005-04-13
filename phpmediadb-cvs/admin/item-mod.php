<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-mod.php,v 1.3 2005/04/13 11:46:33 bruf Exp $ */
/**
 * This file loads one item and redirect to item-session.php
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

//-----------------------------------------------------------------------------
function itemmod_getItemId()
{
	/* init */
	global $PHPMEDIADB;
	$itemID = $_GET['itemid'];

	/* check if itemid is numerical/valid */
	if( !is_numeric( $itemID ) )
	{
		/* %MESSAGE_ITEMID_NOTNUMERICAL% */
		$message = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_ITEMID_NOTNUMERICAL' );
		@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $message  );
		$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
		die();
	}
	
	/* check if item exists */
	if( !$PHPMEDIADB->BUSINESS->ITEMS->exists( $itemID ) )
	{
		/* %MESSAGE_ITEM_NOTEXISTENT% */
		$message = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_ITEM_NOTEXISTENT' );
		@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $message  );
		$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
		die();		
	}
	 
	return $itemID;	
}
//-----------------------------------------------------------------------------

/* get itemdata */
$itemId	= itemmod_getItemId();
$data	= $PHPMEDIADB->BUSINESS->ITEMS->get( $itemId );
	
/* create session-item */
$sessionItem = array();
$sessionItem['type'] = $data['itemtypeid'];
$sessionItem['id']	 = $data['itemid'];
$sessionItem['data'] = $data;
$PHPMEDIADB->PRESENTATION->SESSION->register( 'sessionitem' ,$sessionItem );

/* redirect */
header( 'Location: item-session.php' );
	
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>