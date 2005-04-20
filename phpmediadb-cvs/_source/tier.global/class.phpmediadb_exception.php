<?php
/**
 * $Id: class.phpmediadb_exception.php,v 1.7 2005/04/20 21:46:07 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_exception.php
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
 * @subpackage	global
 * @version     $Revision: 1.7 $
 */

/**
 * This is the class that manages the exceptions.
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.7 $
 * @package		phpmediadb
 * @subpackage	global
 */
class phpmediadb_exception extends Exception
{
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @param string $message Message of exception
	 * @param integer $code Code of exception
	 */
	public function __construct($message, $code = 0) 
	{
		/* assign values to parent */
		parent::__construct($message, $code);
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Handles a normal/general exception and terminate the script
	 *
	 * @access public
	 * @static
	 * @param exception $generalException Instanz of an exception
	 */
	public function handleException( $generalException )
	{
		/* delegate - static call */
		phpmediadb_exception::showError( $generalException );
		
		/* sorry, have to kill script - no way i can fix it */
		die();
	}
//-----------------------------------------------------------------------------
	/**
	 * Sends an errormessage (html) to the user
	 *
	 * @access public
	 * @static
	 * @param exception $exception Instanz of an exception
	 */
	public function showError( $exception )
	{
		/* flush cache */
		ob_clean();
		ob_start();

		/* display html */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<title>phpMedaDB :: Exception</title>
	<style type="text/css">
<!--
	body { font-size:12px; font-family:monospace; }
	h1 { font-size:18px; color:red; }
	.phpmediadb-body-exception { background-color:#FFFFCC; border:1px dashed grey; margin-bottom:10px; padding:5px; }
	.phpmediadb-body-exception-code { background-color:#FAFAFA; border:1px dotted grey; margin:10px; padding:5px; }
	.phpmediadb-body-exception-copyright { text-align:right; }
-->
	</style>
</head>

<body>
<div class="phpmediadb-body-exception">
	<h1>Ouch, got an exception...</h1>
	Sorry but I was not able to complete your request. Please try again.
<?php
if( constant( 'PHPMEDIADB_SYSTEM_DEBUGLEVEL' ) >= 1 )
{
?>
	<br /><br />
	<b>Exception Details:</b>
	<div class="phpmediadb-body-exception-code"><pre><?php echo htmlentities( $exception->getMessage() ); ?></pre></div>
<?php
}
?>
</div>

<?php
if( constant( 'PHPMEDIADB_SYSTEM_DEBUGLEVEL' ) >= 2 )
{
?>
<div class="phpmediadb-body-exception">
	<h1>Debug</h1>
	<b>Stack trace:</b><br />
	<div class="phpmediadb-body-exception-code"><pre><?php echo htmlentities( $exception->getTraceAsString() ); ?></pre></div>
	<br />
	<b>File:</b> <?php echo htmlentities( $exception->getFile() ); ?> <b>Line:</b> <?php echo htmlentities( $exception->getLine() ); ?>
</div>
<?php
}
?>
<div class="phpmediadb-body-exception-copyright">
	phpMediaDB :: The media database<br />
	Version <?php echo PHPMEDIADB_SYSTEM_VERSION; ?>
</div>
</body>
</html><?php
	}
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_exception */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>