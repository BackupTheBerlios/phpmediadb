<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_status.php,v 1.6 2005/03/15 17:46:33 bruf Exp $ */

class phpmediadb_data_status
{
	// --- ATTRIBUTES ---

	/**
	 * Short description of attribute PHPMEDIADB
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	protected $PHPMEDIADB = null;

	/**
	 * Short description of attribute DATA
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
	 * @param phpmediadb_data
	 */
	public function __construct()
	{
		/* nothing to do yet */
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
	 * @param Integer
	 * @return String
	 */
	public function get( $MediaStatusID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
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
	 * @return String
	 */
	public function getList()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
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
	 * @param String
	 * @param String
	 * @param String
	 */
	public function create( $MediaStatus, $MediaStatusOwner, $MediaStatusHolder )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO MediaStatus
		( MediaStatus, MediaStatusOwner, MediaStatusHolder )
		VALUES( ?, ?, ? )' );
		$stmt->setString( 1, $MediaStatus );
		$stmt->setString( 2, $MediaStatusOwner );
		$stmt->setString( 3, $MediaStatusHolder );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @param String
	 * @param String
	 * @param String
	 */
	public function modify( $MediaStatusID, $MediaStatus, $MediaStatusOwner, $MediaStatusHolder )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'UPDATE MediaStatus
		SET MediaStatus.MediaStatus = ?,
		MediaStatus.MediaStatusOwner = ?,
		MediaStatus.MediaStatusHolder = ?
		WHERE MediaStatus.MediaStatusID = ?' );
		$stmt->setString( 1, $MediaStatus );
		$stmt->setString( 2, $MediaStatusOwner );
		$stmt->setString( 3, $MediaStatusHolder );
		$stmt->setString( 4, $MediaStatusID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 */
	public function delete( $MediaStatusID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'DELETE FROM MediaStatus
		WHERE MediaStatus.MediaStatusID = ?' );
		$stmt->setString( 1, $MediaStatusID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return Boolean
	 */
	public function exist( $MediaStatusID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT COUNT(*)
		FROM MediaStatus,
		WHERE MediaStatus.MediaStatusID = ?' );
		$stmt->setString( 1, $MediaStatusID );
		$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
		$rs->next();
		if( $rs->get(1) >= 1 )
			{
			return true;
			}
		else
			{
			return false;
			}
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>