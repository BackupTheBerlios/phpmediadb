<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: search.php,v 1.2 2005/03/08 20:48:49 mblaschke Exp $ */

require_once( '_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb(); 

/* setup templates */
$templates = array();
$templates[] = 'body.search.header.tpl';

switch( @$_GET['action'] )
{
		case 'search':
				/* display site */
				/* TODO */
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( $templates );
			break;
					
		default:
				/* display site */
				/* TODO */
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( $templates );
			break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>