<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_sql.php,v 1.9 2005/04/06 13:57:14 bruf Exp $ */

/**
 * This is the class that provides often used sql actions
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.9 $
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
	 * @return String contains information from the connection to the database
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
	 * @return Integer returns the id from the last created record
	*/
	public function getLastInsert( $conn )
	{
		try
		{
			/*
			$stmt = $conn->prepareStatement( 'SELECT LAST_INSERT_ID()' );
			$rs = $stmt->executeQuery();
			return $rs;
			*/
			
			$idGen = $conn->getIdGenerator();
			return $idGen->getId();
		}
		catch( Exception $e )
		{
			die( $e->getMessage() );
		}	
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function opens a transaction
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
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
	*/
	public function rollbackTransaction( $conn, $e )
	{
		/* abort all delete/update queries in the transaction*/
		$conn->rollback();
		
		/* get errormessage */
		$error = $e->getMessage();
		
		/* terminate script */
		die( $error );
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function generates an array an fill in the data from the sql query
	 *
	 * @access public
	 * @param String $rs is the resultset from the sql query
	 * @return array contains the results of the sql query
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