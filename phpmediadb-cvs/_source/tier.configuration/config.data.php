<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id $ */

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
$phpMediaDbConfig['DATA']['sql-connection']['phptype']	= 'mysql';
$phpMediaDbConfig['DATA']['sql-connection']['hostspec']	= 'localhost';
$phpMediaDbConfig['DATA']['sql-connection']['username']	= 'dbuser';
$phpMediaDbConfig['DATA']['sql-connection']['password']	= 'dbpass';
$phpMediaDbConfig['DATA']['sql-connection']['database']	= 'phpmediadb';

//$phpMediaDbConfig['DATA']['sql-connection']['conntype'] = CREOLE::PERSISTENT;

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>