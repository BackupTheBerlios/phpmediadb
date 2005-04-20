<?php
/**
 * $Id: config.data.php,v 1.8 2005/04/20 21:45:38 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        config.data.php
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
 * @version     $Revision: 1.8 $
 */
// $phpMediaDbConfig['DATA']['example-config'] = "abc";

/**
 * SQL Connection
 *   phptype:   SQL Datbase Type
 *   hostspec:  Serveraddress (eg. localhost)
 *   username:  SQL User
 *   password:  SQL User Password
 *   database:  SQL Database
 *   conntype:  Type of Connection	->	comment out for normal connection,
 *										CREOLE::PERSISTENT for persistent connection
 */
$phpMediaDbConfig['DATA']['sqlconnection']['phptype']	= 'mysql';
$phpMediaDbConfig['DATA']['sqlconnection']['hostspec']	= 'localhost';
$phpMediaDbConfig['DATA']['sqlconnection']['username']	= 'root';
$phpMediaDbConfig['DATA']['sqlconnection']['password']	= '';
$phpMediaDbConfig['DATA']['sqlconnection']['database']	= 'phpmediadb';

$phpMediaDbConfig['DATA']['sqlconnection']['conntype'] = 1;

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>