<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_sql.php,v 1.8 2005/03/31 10:13:14 bruf Exp $ */

/**
 * This is the class that provides often used sql actions
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.8 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_sql
{
	// --- ATTRIBUTES ---

	/**
	 * Reference to class phpmediadb
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	protected $PHPMEDIADB = null;

	/**
	 * Reference to class phpmediadb_data
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	protected $DATA = null;

	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @param phpmediadb_data $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->DATA			= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
	}
  
//-----------------------------------------------------------------------------
	/**
	 * The destructor __destruct is responsible for closing all open files,
	 * etc.
	 *
	 * @access public
	 */
	public function __destruct()
	{
		/* nothing to do yet */
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function provides the connection to the database
	 *
	 * @access public
	 * @return String $conn contains information from the connection to the database
	*/
	public function getConnection()
	{
		try
		{
			/* try to connect to database */
			$dsn		= $this->DATA->configuration['sqlconnection'];
			$conntype	= $this->DATA->configuration['sqlconnection']['conntype'];
			$conn = Creole::getConnection($dsn, $conntype );
			return $conn;
		}
		catch( Exception $ex  )
		{
			/* connection failed -- exception thrown.. sorry, can't do anything */
			echo $ex->getMessage();
			die();
		}
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the id of the last created record in a table
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	 * @return Integer $rs returns the id from the last created record
	 * @return Mixed rollbackTransaction() returns the error message
	*/
	public function getLastInsert( $conn )
	{
		try
		{
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement( 'SELECT LAST_INSERT_ID()' );
			$rs = $stmt->executeQuery();
			$this->DATA->SQL->commitTransaction( $conn );
			return $rs;
		}
		catch( Exception $e )
		{
			return $this->DATA->SQL->rollbackTransaction( $conn, $e );
		}	
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function opens a transaction
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	 * @return Mixed $error returns the error message
	*/
	public function openTransaction( $conn )
	{
		$conn->setAutoCommit(false);
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function commits a transaction
	 * @access public
	 * @param String $conn contains information from the connection to the database
	 * @return Mixed $error returns the error message
	*/
	public function commitTransaction( $conn )
	{
		$conn->commit();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function makes a rollback from a transaction
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	 * @return Mixed $error returns the error message
	*/
	public function rollbackTransaction( $conn, $e )
	{
		$conn->rollback(); // abort all delete/update queries in the transaction
		$error = $e->getMessage();
		
		return $error;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function generates an array an fill in the data from the sql query
	 *
	 * @access public
	 * @param String $rs is the resultset from the sql query
	 * @return Mixed $dataArray contains the results of the sql query
	*/
	public function generateDataArray( $rs )
	{

		while ($rs->next())
		{
			$dataArray[] = $rs->GetRow();
		}

		return $dataArray;
	}
		
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_sql */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>