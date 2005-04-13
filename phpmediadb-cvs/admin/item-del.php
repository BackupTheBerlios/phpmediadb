<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-del.php,v 1.4 2005/04/13 11:46:19 bruf Exp $ */
/**
 * This file deletes one item
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.4 $
 * @package		phpmediadb_html
 * @subpackage	access_admin
 */
 
/* include main phpmediadb-project */
require_once( '../_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();

//-----------------------------------------------------------------------------
function itemdel_deleteItem( $itemId )
{
	global $PHPMEDIADB;
	$status = $PHPMEDIADB->BUSINESS->ITEMS->delete( $itemId );
	
	if( true === $status )
	{
		/* %MESSAGE_DELETION_SUCCESS% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_DELETION_SUCCESS' );
	}
	else
	{
		/* %MESSAGE_DELETION_FAILED% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_DELETION_FAILED' );
	}
	
	/* set message */
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $messageBody  );
	
	/* set redirect */
	if( !empty( $_POST['redirect'] ) )
		@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.HYPERLINK_BACK', $_POST['redirect']  );
	
	$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
	die();
}
//-----------------------------------------------------------------------------
function itemdel_showQuestion( $itemId )
{
	global $PHPMEDIADB;
	
	/* save itemid */
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMID', $itemId  );
	
	/* save referer */
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'REDIECT', $_SERVER['HTTP_REFERER'] );
	
	/* show site */
	$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.item.deletequestion.tpl' );
	
}
//-----------------------------------------------------------------------------
function itemdel_getItemId()
{
	/* init */
	global $PHPMEDIADB;
	$returnValue = NULL;
	
	/* get itemid */
	switch( $_SERVER['REQUEST_METHOD'] )
	{
		case( 'GET' ):
			$returnValue = $_GET['itemid'];
		break;	
	
		case( 'POST' ):
			$returnValue = $_POST['itemid'];
		break;	
	}
	
	/* check if itemid is numerical/valid */
	if( !is_numeric( $returnValue ) )
	{
		/* %MESSAGE_ITEMID_NOTNUMERICAL% */
		$message = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_ITEMID_NOTNUMERICAL' );
		@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $message  );
		$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
		die();
	}
	
	/* check if item exists */
	if( !$PHPMEDIADB->BUSINESS->ITEMS->exists( $returnValue ) )
	{
		/* %MESSAGE_ITEM_NOTEXISTENT% */
		$message = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_ITEM_NOTEXISTENT' );
		@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $message  );
		$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
		die();		
	}
	 
	return $returnValue;	
}
//-----------------------------------------------------------------------------

switch( $_SERVER['REQUEST_METHOD'] )
{
	case( 'GET' ):
		$itemId = itemdel_getItemId();
		itemdel_showQuestion( $itemId );
	break;	
	
	case( 'POST' ):
		$itemId = itemdel_getItemId();
		if( isset( $_POST['BUTTON_DELETE'] ) )
		{
			itemdel_deleteItem( $itemId );
		}
		else
		{
			if( !empty( $_POST['redirect'] ) )
				header( 'Location: ' . $_POST['redirect']  );
			else
				header( 'Location: ../index.php' );
		}
	break;	
	
	default:
		header( 'Location: ../index.php' );
	break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>