<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */
/**
 * This file stores all configurations in tier.data
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.7 $
 * @package		phpmediadb
 * @subpackage	configuration
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