<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */
/**
 * This file stores all configurations in tier.business
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.10 $
 * @package		phpmediadb
 * @subpackage	configuration
 */
 
// $phpMediaDbConfig['BUSINESS']['example-config'] = "abc";

/**
 * Itemsepecifications (regex etc.)
 */ 

//-- ITEM AUDIO

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemtitle'] 				= '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemoriginaltitle']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemmedianame']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['itemlocation']				= '^(.{1,255})?$';
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
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemlocation']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemidentification']		= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemreleasedate']			= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemmediasize']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itempublisher']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['itemquantity']				= 255;

//-- ITEM VIDEO

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemtitle'] 				= '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemoriginaltitle']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemmedianame']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemlocation']				= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemidentification']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemreleasedate']				= '^([[:digit:]]{4})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['categories']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemmediasize']			= '^(([[:digit:]]+([[:punct:]]{1}[[:digit:]]+)))?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['mediaformatid']			= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itempublisher']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['mediaagerestrictionid']	= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['mediacodecid']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_VIDEO]['itemquantity']				= '^(.{1,255})?$';

$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemtitle'] 				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemoriginaltitle']			= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemmedianame']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemlocation']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemidentification']		= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemreleasedate']			= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemmediasize']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itempublisher']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_VIDEO]['itemquantity']				= 255;

//-- ITEM PRINT

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemtitle'] 				= '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemoriginaltitle']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemmedianame']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemlocation']				= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemidentification']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemreleasedate']				= '^([[:digit:]]{4})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['categories']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemmediasize']			= '^(([[:digit:]]+([[:punct:]]{1}[[:digit:]]+)))?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['mediaformatid']			= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itempublisher']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['mediaagerestrictionid']	= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['mediacodecid']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_PRINT]['itemquantity']				= '^(.{1,255})?$';

$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemtitle'] 				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemoriginaltitle']			= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemmedianame']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemlocation']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemidentification']		= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemreleasedate']			= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemmediasize']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itempublisher']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_PRINT]['itemquantity']				= 255;


//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>