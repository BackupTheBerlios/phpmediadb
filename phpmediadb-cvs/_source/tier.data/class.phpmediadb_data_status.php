<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_status.php,v 1.5 2005/03/15 13:30:34 bruf Exp $ */

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
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaStatus,
		WHERE MediaStatus.MediaStatusID = :msid' );
		$stmt->setString( ':msid', $MediaStatusID );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getall()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaStatus,
		WHERE MediaStatus.MediaStatusID = :msid' );
		$stmt->setString( ':msid', '%' );
		$stmt->executeQuery();
		
		return $stmt;
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
		$stmt = $conn->preparedStatement( 'INSERT INTO MediaStatus
		( MediaStatus, MediaStatusOwner, MediaStatusHolder )
		VALUES( :ms, :mso, :msh )' );
		$stmt->setString( ':ms', $MediaStatus );
		$stmt->setString( ':mso', $MediaStatusOwner );
		$stmt->setString( ':msh', $MediaStatusHolder );
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
		$stmt = $conn->preparedStatement( 'UPDATE MediaStatus
		SET MediaStatus.MediaStatus = :ms,
		MediaStatus.MediaStatusOwner = :mso,
		MediaStatus.MediaStatusHolder = :msh
		WHERE MediaStatus.MediaStatusID = :msid' );
		$stmt->setString( ':ms', $MediaStatus );
		$stmt->setString( ':mso', $MediaStatusOwner );
		$stmt->setString( ':msh', $MediaStatusHolder );
		$stmt->setString( ':msid', $MediaStatusID );
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
		$stmt = $conn->preparedStatement( 'DELETE FROM MediaStatus
		WHERE MediaStatus.MediaStatusID = :msid' );
		$stmt->setString( ':msid', $MediaStatusID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>