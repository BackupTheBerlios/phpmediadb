<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_sql.php,v 1.5 2005/03/16 15:04:17 bruf Exp $ */

class phpmediadb_data_sql
{
	// --- ATTRIBUTES ---

	/**
	 * Reference to class PHPMEDIADB
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	protected $PHPMEDIADB = null;

	/**
	 * Reference to class DATA
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 */
	public function __destruct()
	{
		/* nothing to do yet */
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function provides the connection to the database
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String $conn contains information from the connection to the database
	*/
	public function getConnection()
	{
		$dsn		= $this->DATA->configuration['sqlconnection'];
		$conntype	= $this->DATA->configuration['sqlconnection']['conntype'];
		$conn = Creole::getConnection($dsn, $conntype );
		return $conn;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the id of the last created record in a table
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String $conn contains information from the connection to the database
	 * @return Integer $rs returns the id from the last created record
	*/
	public function getLastInsert( $conn )
	{
		$stmt = $conn->prepareStatement( 'SELECT LAST_INSERT_ID()' );
		$rs = $stmt->executeQuery();
		
		return $rs;	
	}
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_sql */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>