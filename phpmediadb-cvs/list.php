<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: list.php,v 1.3 2005/03/24 17:11:59 mblaschke Exp $ */
/**
 * This file displays the itemlist
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.3 $
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
				/* display site */
				$templates[] = 'body.list.audio.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
			
		case 'video':
				/* display site */
				$templates[] = 'body.list.video.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
			
		case 'print':
				/* display site */
				$templates[] = 'body.list.print.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
			
		default:
				/* display site */
				$templates[] = 'body.list.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>