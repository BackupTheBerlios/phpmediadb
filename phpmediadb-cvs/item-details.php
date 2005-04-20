<?php
/**
 * $Id: item-details.php,v 1.4 2005/04/20 21:44:45 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        item-details.php
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
 * @subpackage	access_anonymous
 * @version     $Revision: 1.4 $
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
		
		default:
			/* %MESSAGE_ITEM_LOADERROR% */
			$message = $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_ITEM_LOADERROR' );
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $message  );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			die();	
		break;
	}
	
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $data );
	$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $template );
}

//-----------------------------------------------------------------------------

/* get itemid */
$itemId = itemdetails_getItemId();

/* show details */
itemdetails_showDetails( $itemId );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>