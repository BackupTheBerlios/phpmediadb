<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: list.php,v 1.5 2005/04/13 15:00:18 mblaschke Exp $ */
/**
 * This file displays the itemlist
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.5 $
 * @package		phpmediadb_html
 * @subpackage	access_anonymous
 */
 
/* include main phpmediadb-project */
require_once( '_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();


/* setup templates */
$templates = array();
$templates[] = 'body.list.header.tpl';

switch( @$_GET['list'] )
{
		case 'audio':
				/* get data list */
				$dataList = $PHPMEDIADB->BUSINESS->AUDIOS->getList();	
				@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $dataList );
				
				/* set template */
				$templates[] = 'body.list.audio.tpl';
			break;
			
		case 'video':
				/* get data list */
				
				$dataList = $PHPMEDIADB->BUSINESS->VIDEOS->getList();		
				@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $dataList );

				/* set template */
				$templates[] = 'body.list.video.tpl';
			break;
			
		case 'print':
				/* get data list */
				$dataList = $PHPMEDIADB->BUSINESS->PRINTS->getList();		
				@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $dataList );

				/* set template */
				$templates[] = 'body.list.print.tpl';
			break;
			
		default:
				/* set default template */
				$templates[] = 'body.list.tpl';
			break;
}

/* show template */
$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>