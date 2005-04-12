<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */
/**
 * This file stores all configurations in tier.business
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.8 $
 * @package		phpmediadb
 * @subpackage	configuration
 */
 
// $phpMediaDbConfig['BUSINESS']['example-config'] = "abc";

/**
 * Itemsepecifications (regex etc.)
 */ 

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemTitle'] 				= '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemOriginalTitle']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaName']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemIdentification']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemReleaseDate']				= '^([[:digit:]]{4})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['Categories']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaSize']			= '^(([[:digit:]]+([[:punct:]]{1}[[:digit:]]+)))?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['MediaFormatID']			= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemPublisher']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['MediaAgeRestrictionID']	= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['MediaCodecID']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemQuantity']				= '^(.{1,255})?$';

$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemTitle'] 				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemOriginalTitle']			= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaName']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemIdentification']		= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemReleaseDate']			= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaSize']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemPublisher']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemQuantity']				= 255;

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>