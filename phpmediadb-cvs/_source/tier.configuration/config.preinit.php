<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */
/**
 * This file is used for init-functions before deklaration of the classes
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.3 $
 * @package		phpmediadb
 * @subpackage	configuration
 */

/**
 * Configuration initalize
 */
$phpMediaDbConfig = array();

 
 /**
  * Set path - creole need this!
  */
	$sourcePath = dirname(dirname(__FILE__) . '..' );
	ini_set('include_path',  $sourcePath . DIRECTORY_SEPARATOR . 'tier.lib' . PATH_SEPARATOR . ini_get('include_path'));


//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>