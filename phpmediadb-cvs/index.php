<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: index.php,v 1.2 2005/03/20 17:15:52 mblaschke Exp $ */

require_once( '_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();

/* display site */
$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.home.tpl' );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>