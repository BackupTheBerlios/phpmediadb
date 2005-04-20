<?php
/**
 * $Id: item-session.php,v 1.13 2005/04/20 21:44:56 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        item-session.php
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
 * @version     $Revision: 1.13 $
 */
 
/* include main phpmediadb-project */
require_once( '../_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();

//-----------------------------------------------------------------------------
function itemsession_itemShow( $sessionItem )
{
	global $PHPMEDIADB;
	
	/* get and set input-size */
	$itemSize = $PHPMEDIADB->BUSINESS->INSPECTOR->getSize( $sessionItem['type'] );
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTSIZE', $itemSize );
	
	/* get database-vars */
	$categories			= $PHPMEDIADB->BUSINESS->CATEGORIES->getListByItemType( $sessionItem['type'] );
	$formats			= $PHPMEDIADB->BUSINESS->FORMATS->getListByItemType( $sessionItem['type'] );
	$ageRestrictions	= $PHPMEDIADB->BUSINESS->AGERESTRICTIONS->getList();
	$codecs				= $PHPMEDIADB->BUSINESS->CODECS->getListByItemType( $sessionItem['type'] );

	/* translate data */
	$categories			= $PHPMEDIADB->BUSINESS->CATEGORIES->translate( $categories );
	$formats			= $PHPMEDIADB->BUSINESS->FORMATS->translate( $formats );
	$ageRestrictions	= $PHPMEDIADB->BUSINESS->AGERESTRICTIONS->translate( $ageRestrictions );
	$codecs				= $PHPMEDIADB->BUSINESS->CODECS->translate( $codecs );
	
	/* assign database-vars */
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'DATA.CATEGORIES', $categories );
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'DATA.MEDIAFORMATS', $formats );
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'DATA.AGERESTRICTIONS', $ageRestrictions );
	@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'DATA.CODECS', $codecs );
	
	switch( $sessionItem['type'] )
	{
		case(PHPMEDIADB_ITEM_AUDIO):
			/* assign data */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $sessionItem['data'] );
			/* display site */
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.item.audio.formular.tpl' );
		break;
	
	
		case(PHPMEDIADB_ITEM_VIDEO):
			/* assign data */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $sessionItem['data'] );
			/* display site */
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.item.video.formular.tpl' );
		break;
	
	
		case(PHPMEDIADB_ITEM_PRINT):
			/* assign data */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $sessionItem['data'] );
			/* display site */
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.item.print.formular.tpl' );
		break;
	}
}
//-----------------------------------------------------------------------------
function itemsession_itemGet()
{
	global $PHPMEDIADB;
	/* get session data first*/
	$returnValue = $PHPMEDIADB->PRESENTATION->SESSION->get( 'sessionitem' );
	if( NULL === $returnValue )
	{
		header( 'Location: item-add.php' );
		die();
	}
	else
	{
		return $returnValue;
	}
}
//-----------------------------------------------------------------------------
function itemsession_itemSave( $sessionItem )
{
	global $PHPMEDIADB;
	switch( $sessionItem['type'] )
	{
		case(PHPMEDIADB_ITEM_AUDIO):
		/* check data */
		$errorData = $PHPMEDIADB->BUSINESS->AUDIOS->check( $sessionItem['data'] );
			
		if( $errorData === NULL || $errorData === TRUE )
		{
			/* no error occurred :) */
			if( $sessionItem['id'] === NULL )
				$status = $PHPMEDIADB->BUSINESS->AUDIOS->create( $sessionItem['data'] );
			else 
				$status = $PHPMEDIADB->BUSINESS->AUDIOS->modify( $sessionItem['id'], $sessionItem['data'] );
				
			/* %MESSAGE_SAVE_SUCCESS% */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_SAVE_SUCCESS' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			$PHPMEDIADB->PRESENTATION->SESSION->unregister( 'sessionitem' );
			die();		
		}
		else
		{
			/* too bad, error occurred */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTERROR', $errorData );
			itemsession_itemShow( $sessionItem );
			die();
		}
		break;
	
	
		case(PHPMEDIADB_ITEM_VIDEO):
		/* check data */
		$errorData = $PHPMEDIADB->BUSINESS->VIDEOS->check( $sessionItem['data'] );
			
		if( $errorData === NULL || $errorData === TRUE )
		{
			/* no error occurred :) */
			if( $sessionItem['id'] === NULL )
				$status = $PHPMEDIADB->BUSINESS->VIDEOS->create( $sessionItem['data'] );
			else 
				$status = $PHPMEDIADB->BUSINESS->VIDEOS->modify( $sessionItem['id'], $sessionItem['data'] );
				
			/* %MESSAGE_SAVE_SUCCESS% */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_SAVE_SUCCESS' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			$PHPMEDIADB->PRESENTATION->SESSION->unregister( 'sessionitem' );
			die();		
		}
		else
		{
			/* too bad, error occurred */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTERROR', $errorData );
			itemsession_itemShow( $sessionItem );
			die();
		}
		break;
	
	
		case(PHPMEDIADB_ITEM_PRINT):
		/* check data */
		$errorData = $PHPMEDIADB->BUSINESS->PRINTS->check( $sessionItem['data'] );
			
		if( $errorData === NULL || $errorData === TRUE )
		{
			/* no error occurred :) */
			if( $sessionItem['id'] === NULL )
				$status = $PHPMEDIADB->BUSINESS->PRINTS->create( $sessionItem['data'] );
			else 
				$status = $PHPMEDIADB->BUSINESS->PRINTS->modify( $sessionItem['id'], $sessionItem['data'] );
			
			/* %MESSAGE_SAVE_SUCCESS% */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_SAVE_SUCCESS' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			$PHPMEDIADB->PRESENTATION->SESSION->unregister( 'sessionitem' );
			die();		
		}
		else
		{
			/* too bad, error occurred */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTERROR', $errorData );
			itemsession_itemShow( $sessionItem );
			die();
		}
		break;
	}
}

//-----------------------------------------------------------------------------

$sessionItem = itemsession_itemGet();

if( isset( $_POST['buttonsave'] ) )
{
	/* set itemdata to sessionItem */
	$sessionItem['data'] = $_POST['itemdata'];
	$PHPMEDIADB->PRESENTATION->SESSION->register( 'sessionitem' ,$sessionItem );

	/* try to save */
	itemsession_itemSave( $sessionItem );
}
else
{
	/* only show */
	itemsession_itemShow( $sessionItem );
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>