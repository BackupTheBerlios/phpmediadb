<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_formats.php,v 1.7 2005/03/15 17:46:07 bruf Exp $ */

class phpmediadb_data_formats
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
	 * This function returns a specified record from the table MediaFormats
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function get( $MediaFormatID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
		FROM MediaFormats,
		WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $MediaFormatID );
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
		FROM MediaFormats,
		WHERE MediaFormats.MediaFormatID LIKE "%"' );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new records in the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @param Integer
	 */
	public function create( $MediaFormatName, $ItemTypeID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO MediaFormats
		( MediaFormatName, ItemTypeID ) VALUES( ?, ? )' );
		$stmt->setString( 1, $MediaFormatName );
		$stmt->setString( 2, $ItemTypeID );
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
	 * @param Integer
	 */
	public function modify( $MediaFormatID, $MediaFormatName, $ItemTypeID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'UPDATE MediaFormats
		SET MediaFormats.MediaFormatName = ?,
		MediaFormats.ItemTypeID = ?
		WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $MediaFormatName );
		$stmt->setString( 2, $ItemTypeID );
		$stmt->setString( 3, $MediaFormatID );
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
	public function delete( $MediaFormatID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'DELETE FROM MediaFormats
		WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $MediaFormatID );
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
	public function exist( $MediaFormatID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT COUNT(*)
		FROM MediaFormats,
		WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $MediaFormatID );
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