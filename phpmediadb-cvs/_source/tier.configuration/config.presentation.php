<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */

// $phpMediaDbConfig['PRESENTATION']['example-config'] = "abc";

/*
 * Generic Configuration
 */
$phpMediaDbConfig['PRESENTATION']['generic']['gzip-compression'] = false;

/*
 * Configuration of directories
 */
$phpMediaDbConfig['PRESENTATION']['directory']['root']			= realpath( dirname(__FILE__) . '/../../' ) ;
$phpMediaDbConfig['PRESENTATION']['directory']['i18n']			= $phpMediaDbConfig['PRESENTATION']['directory']['root'] . '/_source/tier.configuration/i18n/';
$phpMediaDbConfig['PRESENTATION']['directory']['templates']		= $phpMediaDbConfig['PRESENTATION']['directory']['root'] . '/_source/tier.configuration/templates';
$phpMediaDbConfig['PRESENTATION']['directory']['templates_c']	= $phpMediaDbConfig['PRESENTATION']['directory']['root'] . '/var/templates_c';


/**
  * Configuration of directories
  */
$phpMediaDbConfig['PRESENTATION']['webpath']['server']		= '';
$phpMediaDbConfig['PRESENTATION']['webpath']['root-path']	= '/phpmediadb-cvs/';

/**
  * i18n - Configuration
  */
$phpMediaDbConfig['PRESENTATION']['i18n']['defaultLanguage']	= "de";
$phpMediaDbConfig['PRESENTATION']['i18n']['forcedLanguage']		= true;



//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>