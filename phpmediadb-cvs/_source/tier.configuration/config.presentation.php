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
$phpMediaDbConfig['PRESENTATION']['directory']['root']			= realpath("./") . "/";
$phpMediaDbConfig['PRESENTATION']['directory']['i18n']			= $phpMediaDbConfig['PRESENTATION']['directory']['root'] . "_source/tier.configuration/i18n/";
$phpMediaDbConfig['PRESENTATION']['directory']['templates']	= $phpMediaDbConfig['PRESENTATION']['directory']['root'] . "_source/tier.configuration/templates";

/*
 * Configuration of directories
 */
$phpMediaDbConfig['PRESENTATION']['webpath']['server']		= "";
$phpMediaDbConfig['PRESENTATION']['webpath']['root-path']	= "";

/*
 * i18n - Configuration
 */
$phpMediaDbConfig['PRESENTATION']['i18n']['defaultLanguage']	= "en";
$phpMediaDbConfig['PRESENTATION']['i18n']['forcedLanguage']		= true;

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>