<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_formats.php,v 1.8 2005/03/16 15:02:53 bruf Exp $ */

class phpmediadb_data_formats
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
	 * This function returns a specified record from the table MediaFormats
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
											FROM MediaFormats,
											WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $id );
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
	 * @param Mixed array $data contains all required data for the sql statement
	 * @param Integer getLastInsert() returns id from the last created record
	 */
	public function create( $data )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'INSERT INTO MediaFormats
											( MediaFormatName, ItemTypeID )
											VALUES( ?, ? )' );
		$stmt->setString( 1, $data['MediaFormatName'] );
		$stmt->setString( 2, $data['ItemTypeID'] );
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
		$stmt = $conn->prepareStatement(	'UPDATE MediaFormats
											SET MediaFormats.MediaFormatName = ?,
											MediaFormats.ItemTypeID = ?
											WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $data['MediaFormatName'] );
		$stmt->setString( 2, $data['ItemTypeID'] );
		$stmt->setString( 3, $data['MediaFormatID'] );
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
		$stmt = $conn->prepareStatement(	'DELETE FROM MediaFormats
											WHERE MediaFormats.MediaFormatID = ?' );
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
											FROM MediaFormats,
											WHERE MediaFormats.MediaFormatID = ?' );
		$stmt->setString( 1, $id );
		$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
		$rs->next();
		
		/* check if item exists */
		if( $rs->get(1) >= 1 )
			$returnValue = true;

		return $returnValue;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_formats */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>