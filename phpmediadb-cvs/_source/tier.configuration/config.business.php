<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */
/**
 * This file stores all configurations in tier.business
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.9 $
 * @package		phpmediadb
 * @subpackage	configuration
 */
 
// $phpMediaDbConfig['BUSINESS']['example-config'] = "abc";

/**
 * Itemsepecifications (regex etc.)
 */ 

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemtitle'] 				= '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemoriginaltitle']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemmedianame']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemidentification']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemreleasedate']				= '^([[:digit:]]{4})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['categories']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemmediasize']			= '^(([[:digit:]]+([[:punct:]]{1}[[:digit:]]+)))?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['mediaformatid']			= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itempublisher']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['mediaagerestrictionid']	= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['mediacodecid']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemquantity']				= '^(.{1,255})?$';

$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemtitle'] 				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemoriginaltitle']			= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemmedianame']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemidentification']		= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemreleasedate']			= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemmediasize']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itempublisher']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemquantity']				= 255;

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>