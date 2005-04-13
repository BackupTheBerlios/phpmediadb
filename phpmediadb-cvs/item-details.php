<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-details.php,v 1.2 2005/04/13 11:56:26 bruf Exp $ */
/**
 * This file displays all details of an item
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.2 $
 * @package		phpmediadb_html
 * @subpackage	access_anonymous
 */
 
/* include main phpmediadb-project */
require_once( '_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb(); 

//-----------------------------------------------------------------------------
function itemdetails_getItemId()
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
	if( !$PHPMEDIADB->DATA->ITEMS->exists( $itemID ) )
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
function itemdetails_showDetails( $itemId )
{
	/* init */
	global $PHPMEDIADB;
	
	/* get itemdata */
	$data = $PHPMEDIADB->BUSINESS->ITEMS->get( $itemId );

	switch( $data['itemtypeid'] )
	{
		case(PHPMEDIADB_ITEM_AUDIO):
			$template = 'body.item.audio.show.tpl';
		break;
	
	
		case(PHPMEDIADB_ITEM_VIDEO):
			$template = 'body.item.video.show.tpl';
		break;
	
	
		case(PHPMEDIADB_ITEM_PRINT):
			$template = 'body.item.print.show.tpl';
		break;
	}
	
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEM', $data );
	$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $template );
}

//-----------------------------------------------------------------------------

/* get itemid */
$itemId = itemdetails_getItemId();

/* show details */
itemdetails_showDetails( $itemId );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>