<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_status.php,v 1.7 2005/03/16 15:03:48 bruf Exp $ */

class phpmediadb_data_status
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
	 * This function returns a specified record from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 * @return Mixed array $rs contains result of database query
	 */
	public function get( $id )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'SELECT *
											FROM MediaStatus,
											WHERE MediaStatus.MediaStatusID = ?' );
		$stmt->setString( 1, $MediaStatusID );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return Mixed array $rs contains result of database query
	 */
	public function getList()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'SELECT *
											FROM MediaStatus,
											WHERE MediaStatus.MediaStatusID LIKE "%"' );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new record in the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Mixed array $data contains all required data for the sql statement
	 * @return Integer getLastInsert() returns id from the last created record
	 */
	public function create( $data )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'INSERT INTO MediaStatus
											( MediaStatus, MediaStatusOwner, MediaStatusHolder )
											VALUES( ?, ?, ? )' );
		$stmt->setString( 1, $data['MediaStatus'] );
		$stmt->setString( 2, $data['MediaStatusOwner'] );
		$stmt->setString( 3, $data['MediaStatusHolder'] );
		$stmt->executeUpdate();
		
		return $this->DATA->SQL->getLastInsert( $conn );
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 * @param Mixed array $data contains all required data for the sql statement
	 */
	public function modify( $id, $data )
	{
		$conn = $this->DATA->SQL->getConnection();
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
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 */
	public function delete( $id )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'DELETE FROM MediaStatus
											WHERE MediaStatus.MediaStatusID = ?' );
		$stmt->setString( 1, $id );
		$stmt->executeUpdate();
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 * @return Boolean $returnValue returns whether the specified record exists
	 */
	public function exist( $id )
	{
		/* init */
		$returnValue = false;
		
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'SELECT COUNT(*)
											FROM MediaStatus,
											WHERE MediaStatus.MediaStatusID = ?' );
		$stmt->setString( 1, $id );
		$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
		$rs->next();
		
		/* check if item exists */
		if( $rs->get(1) >= 1 )
			$returnValue = true;

		return $returnValue;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_status */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>