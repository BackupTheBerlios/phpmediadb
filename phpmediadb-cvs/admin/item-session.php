<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: item-session.php,v 1.3 2005/03/15 21:06:50 mblaschke Exp $ */

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
	/*
	$categories				= $PHPMEDIADB->BUSINESS->CATEGORIES->getList();
	$formats					= $PHPMEDIADB->BUSINESS->FORMAT->getList();
	$ageRestrictions	= $PHPMEDIADB->BUSINESS->AGERESTRICTIONS->getList();
	$codecs						= $PHPMEDIADB->BUSINESS->CODECS->getList();
	*/
	
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
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( 'body.item.audio.formular.tpl' );
		break;
	
	
		case(PHPMEDIADB_ITEM_VIDEO):
			/* assign data */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $sessionItem['data'] );
			/* display site */
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( 'body.item.video.formular.tpl' );
		break;
	
	
		case(PHPMEDIADB_ITEM_PRINT):
			/* assign data */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $sessionItem['data'] );
			/* display site */
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( 'body.item.print.formular.tpl' );
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
		
		if( $sessionItem['id'] === NULL )
			$errorData = $PHPMEDIADB->BUSINESS->AUDIOS->create( $sessionItem['data'] );
		else 
			$errorData = $PHPMEDIADB->BUSINESS->AUDIOS->modify( $sessionItem['id'], $sessionItem['data'] );
			
		if( $errorData === NULL || $errorData === TRUE )
		{
			/* happy, no error :) */
			@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE', $PHPMEDIADB->PRESENTATION->I18N->getLanguageString( 'MESSAGE_SUCCESS_SAVE' ) );
			$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( 'body.message.tpl' );
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
		break;
	
	
		case(PHPMEDIADB_ITEM_PRINT):
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