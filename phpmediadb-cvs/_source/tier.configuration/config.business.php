<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */

// $phpMediaDbConfig['BUSINESS']['example-config'] = "abc";

/**
 * Itemsepecifications (regex etc.)
 */ 

$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemTitle'] 				= '^.{1,255}$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemOriginalTitle']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaName']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemIdentification']		= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemRelease']				= '^([[:digit:]]{4})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['Categories']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaSize']			= '^(([[:digit:]]+([[:punct:]]{1}[[:digit:]]+)))?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['MediaFormatID']			= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['PublisherName']			= '^(.{1,255})?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['MediaAgeRestrictionID']	= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['MediaCodecID']				= '^([[:digit:]]+)?$';
$phpMediaDbConfig['BUSINESS']['input-regex'][PHPMEDIADB_ITEM_AUDIO]['ItemQuantity']				= '^(.{1,255})?$';

$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemTitle'] 				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemOriginalTitle']			= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaName']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemIdentification']		= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemRelease']				= 4;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemMediaSize']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['PublisherName']				= 255;
$phpMediaDbConfig['BUSINESS']['input-size'][PHPMEDIADB_ITEM_AUDIO]['ItemQuantity']				= 255;

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>