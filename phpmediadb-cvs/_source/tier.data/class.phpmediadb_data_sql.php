<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_sql.php,v 1.10 2005/04/09 15:44:54 mblaschke Exp $ */

/**
 * This is the class that provides often used sql actions
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.10 $
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
			
			/* return connection */
			return $conn;
		}
		catch( Exception $ex  )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
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
			/* get ID-generator */
			$idGen = $conn->getIdGenerator();
			
			/* return last inserted id */
			return $idGen->getId();
		}
		catch( Exception $e )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
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
		/* delegate */
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
		/* delegate */
		$conn->commit();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function makes a rollback from a transaction
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	 * @param exception $exception exception of error
	*/
	public function rollbackTransaction( $conn, $exception )
	{
		/* abort all delete/update queries in the transaction*/
		$conn->rollback();
		
		/* handle exception and terminate script */
		phpmediadb_exception::handleException( $exception );
		die();
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
		/* copy all rows to an dataarray */
		while ($rs->next())
			$dataArray[] = $rs->GetRow();

		/* return dataarray */
		return $dataArray;
	}
		
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_sql */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>