<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: search.php,v 1.4 2005/03/24 17:11:59 mblaschke Exp $ */
/**
 * This file searches for items
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.4 $
 * @package		phpmediadb_html
 * @subpackage	access_anonymous
 */
 
/* include main phpmediadb-project */
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