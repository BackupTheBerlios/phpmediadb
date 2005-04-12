<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_exception.php,v 1.5 2005/04/12 18:53:12 mblaschke Exp $ */

/**
 * This is the class that manages the exceptions.
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.5 $
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
	.phpmediadb-body-exception { background-color:#EEEEEE; border:1px dashed grey; margin-bottom:10px; padding:5px; }
	.phpmediadb-body-exception-code { background-color:#FFFFCC; border:1px dotted grey; margin:10px; padding:5px; }
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