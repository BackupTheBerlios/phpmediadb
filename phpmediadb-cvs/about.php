<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: about.php,v 1.3 2005/03/24 17:11:59 mblaschke Exp $ */
/**
 * This file displays the about-site
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

/* display site */
$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.about.tpl' );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>