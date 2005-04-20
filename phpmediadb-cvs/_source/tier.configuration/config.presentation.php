<?php
/**
 * $Id: config.presentation.php,v 1.9 2005/04/20 21:45:38 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        config.presentation.php
 * License:     GNU General Publice License
 *
 * This file is part of phpMediaDB.
 *
 * phpMediaDB is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * phpMediaDB mailing list. See phpMediaDB projectportal for more
 * information.
 *
 * @link        http://phpmediadb.berlios.de/
 * @copyright   2004-2005 &copy; Blaschke, Markus; Ruf, Boris
 * @license     http://opensource.org/licenses/gpl-license.php GNU General Public License
 * @author      Markus Blaschke <mblaschke@users.berlios.de>
 * @author      Boris Ruf <bruf@users.berlios.de>
 * @package		phpmediadb
 * @subpackage	configuration
 * @version     $Revision: 1.9 $
 */
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
$phpMediaDbConfig['PRESENTATION']['i18n']['defaultLanguage']	= 'de';
$phpMediaDbConfig['PRESENTATION']['i18n']['forcedLanguage']		= false;



//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>
