<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_status.php,v 1.11 2005/04/06 13:57:24 bruf Exp $ */

/**
 * This is the class that manages all database activities for the status
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.11 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_status
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
	 * This function returns a specified record from the table MediaStatus
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return array returns the results of database query
	 */
	public function get( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM MediaStatus
												WHERE MediaStatus.MediaStatusID = ?' );
			$stmt->setString( 1, $MediaStatusID );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $e )
		{
			die( $e->getMessage() );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaStatus
	 *
	 * @access public
	 * @return array returns the results of database queryry
	 */
	public function getList()
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM MediaStatus' );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $e )
		{
			die( $e->getMessage() );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new record in the table MediaStatus
	 *
	 * @access public
	 * @param array $data contains all required data for the sql statement
	 * @return Integer returns id from the last created record
	 */
	public function create( $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO MediaStatus
												( MediaStatus, MediaStatusOwner, MediaStatusHolder )
												VALUES( ?, ?, ? )' );
			$stmt->setString( 1, $data['MediaStatus'] );
			$stmt->setString( 2, $data['MediaStatusOwner'] );
			$stmt->setString( 3, $data['MediaStatusHolder'] );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
			return $this->DATA->SQL->getLastInsert( $conn );
		}
		catch( Exception $e )
		{
			$this->DATA->SQL->rollbackException( $conn, $e ); 
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table MediaStatus
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @param array $data contains all required data for the sql statement
	 */
	public function modify( $id, $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'UPDATE MediaStatus
												SET MediaStatus.MediaStatus = ?,
												MediaStatus.MediaStatusOwner = ?,
												MediaStatus.MediaStatusHolder = ?
												WHERE MediaStatus.MediaStatusID = ?' );
			$stmt->setString( 1, $data['MediaStatus'] );
			$stmt->setString( 2, $data['MediaStatusOwner'] );
			$stmt->setString( 3, $data['MediaStatusHolder'] );
			$stmt->setString( 4, $data['MediaStatusID'] );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $e )
		{
			$this->DATA->SQL->rollbackException( $conn, $e );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table MediaStatus
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 */
	public function delete( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'DELETE FROM MediaStatus
												WHERE MediaStatus.MediaStatusID = ?' );
			$stmt->setString( 1, $id );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn, $e );
		}
		catch( Exception $e )
		{
			$this->DATA->SQL->rollbackException( $conn, $e );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return bool returns whether the specified record exists
	 */
	public function exist( $id )
	{
		/* init */
		$returnValue = false;
		
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT COUNT(*)
												FROM MediaStatus
												WHERE MediaStatus.MediaStatusID = ?' );
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
			die( $e->getMessage() );
		}
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_status */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>