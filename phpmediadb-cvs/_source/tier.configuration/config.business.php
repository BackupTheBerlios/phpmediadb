<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */

// $phpMediaDbConfig['BUSINESS']['example-config'] = "abc";

/**
 * Itemsepecifications (regex etc.)
 */ 

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['title'] = '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['originaltitle']  = '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['identification']	= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['releaseyear']		= '^([[:digit:]]{4})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['quantity']				= '^([[:digit:]]{0,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['mediasize']			= '^(([[:digit:]]+([[:punct:]]{1}[[:digit:]]+)))?$';

$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['title'] 					= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['originaltitle'] 	= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['identification'] 	= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['releaseyear']		 	= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['quantity'] 				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['mediasize'] 			= 255;


//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>