<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-session.php,v 1.10 2005/04/06 13:50:12 bruf Exp $ */
/**
 * This file edits the item in the session and save or creates it
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.10 $
 * @package		phpmediadb_html
 * @subpackage	access_admin
 */
 
/* include main phpmediadb-project */
require_once( '../_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();

//-----------------------------------------------------------------------------
function itemShow( $sessionItem )
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
function itemGet()
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
function itemSave( $sessionItem )
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
				
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE', $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_SUCCESS_SAVE' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			$PHPMEDIADB->PRESENTATION->SESSION->unregister( 'sessionitem' );
			die();		
		}
		else
		{
			/* too bad, error occurred */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTERROR', $errorData );
			itemShow( $sessionItem );
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
				
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE', $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_SUCCESS_SAVE' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			$PHPMEDIADB->PRESENTATION->SESSION->unregister( 'sessionitem' );
			die();		
		}
		else
		{
			/* too bad, error occurred */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTERROR', $errorData );
			itemShow( $sessionItem );
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
				
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE', $PHPMEDIADB->PRESENTATION->I18N->translate( 'MESSAGE_SUCCESS_SAVE' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );
			$PHPMEDIADB->PRESENTATION->SESSION->unregister( 'sessionitem' );
			die();		
		}
		else
		{
			/* too bad, error occurred */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'INPUTERROR', $errorData );
			itemShow( $sessionItem );
			die();
		}
		break;
	}
}

//-----------------------------------------------------------------------------

$sessionItem = itemGet();
if( isset( $_POST['buttonsave'] ) )
{
	/* set itemdata to sessionItem */
	$sessionItem['data'] = $_POST['itemdata'];
	$PHPMEDIADB->PRESENTATION->SESSION->register( 'sessionitem' ,$sessionItem );

	/* try to save */
	itemSave( $sessionItem );
}
else
{
	/* only show */
	itemShow( $sessionItem );
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>