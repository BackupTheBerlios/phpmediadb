<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: search.php,v 1.3 2005/03/20 17:15:52 mblaschke Exp $ */

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
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
					
		default:
				/* display site */
				/* TODO */
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>