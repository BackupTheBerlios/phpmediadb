<?php
/**
 * $Id: item-del.php,v 1.5 2005/04/20 21:44:56 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        item-del.php
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
 * @package		phpmediadb_html
 * @subpackage	access_administration
 * @version     $Revision: 1.5 $
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