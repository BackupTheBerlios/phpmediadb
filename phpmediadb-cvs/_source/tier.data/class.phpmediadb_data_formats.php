<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_formats.php,v 1.10 2005/03/30 09:50:29 bruf Exp $ */

/**
 * This is the class that manages all database activities for the formats
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.10 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_formats
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
	 * @see phpmediadb_data
	 * @var phpmediadb_data
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
	 * This function returns a specified record from the table MediaFormats
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return Mixed array $rs contains result of database query
	 * @return Mixed getMessage() returns the error message
	 */
	public function get( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM MediaFormats
												WHERE MediaFormats.MediaFormatID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeQuery();
			
			return $rs;
		}
		catch( Exception $e )
		{
			return $e->getMessage();
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaStatus
	 *
	 * @access public
	 * @return Mixed array $rs contains result of database query
	 * @return Mixed getMessage() returns the error message
	 */
	public function getList()
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM MediaFormats' );
			$rs = $stmt->executeQuery();
			
			return $rs;
		}
		catch( Exception $e )
		{
			return $e->getMessage();
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new records in the table MediaStatus
	 *
	 * @access public
	 * @param Mixed array $data contains all required data for the sql statement
	 * @param Integer getLastInsert() returns id from the last created record
	 * @return Mixed rollbackTransaction() returns the error message
	 */
	public function create( $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO MediaFormats
												( MediaFormatName, ItemTypeID )
												VALUES( ?, ? )' );
			$stmt->setString( 1, $data['MediaFormatName'] );
			$stmt->setString( 2, $data['ItemTypeID'] );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
			return $this->DATA->SQL->getLastInsert( $conn );
		}
		catch( Exception $e )
		{
			return $this->DATA->SQL->rollbackTransaction( $conn, $e );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table MediaStatus
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @param Mixed array $data contains all required data for the sql statement
	 * @return Mixed rollbackTransaction() returns the error message
	 */
	public function modify( $id, $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'UPDATE MediaFormats
												SET MediaFormats.MediaFormatName = ?,
												MediaFormats.ItemTypeID = ?
												WHERE MediaFormats.MediaFormatID = ?' );
			$stmt->setString( 1, $data['MediaFormatName'] );
			$stmt->setString( 2, $data['ItemTypeID'] );
			$stmt->setString( 3, $data['MediaFormatID'] );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $e )
		{
			return $this->DATA->SQL->rollbackTransaction( $conn, $e );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table MediaStatus
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return Mixed rollbackTransaction() returns the error message
	 */
	public function delete( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'DELETE FROM MediaFormats
												WHERE MediaFormats.MediaFormatID = ?' );
			$stmt->setString( 1, $id );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $e )
		{
			return $this->DATA->SQL->rollbackTransaction( $conn, $e );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return Boolean $returnValue returns whether the specified record exists
	 * @return Mixed getMessage() returns the error message
	 */
	public function exist( $id )
	{
		/* init */
		$returnValue = false;		
		
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT COUNT(*)
												FROM MediaFormats
												WHERE MediaFormats.MediaFormatID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
			$rs->next();
			
			/* check if item exists */
			if( $rs->get(1) >= 1 )
				$returnValue = true;
				
			return $returnValue;
		}
		catch( Exception $e )
		{
			return $e->getMessage();
		}
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_formats */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>