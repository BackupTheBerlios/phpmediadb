<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_codecs.php,v 1.7 2005/03/15 17:45:52 bruf Exp $ */

class phpmediadb_data_codecs
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
	 * This function returns a specified record from the table MediaCodecs
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function get( $MediaCodecID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
		FROM MediaCodecs,
		WHERE MediaCodecs.MediaCodecID = ?' );
		$stmt->setString( 1, $MediaCodecID );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaCodecs
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getList()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
		FROM MediaCodecs,
		WHERE MediaCodecs.MediaCodecID LIKE "%"' );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new record in the table MediaCodecs
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @param Integer
	 * @param Integer
	 */
	public function create( $MediaCodecName, $MediaCodecBitrate, $ItemTypeID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO MediaCodecs
		( MediaCodecName, MediaCodecBitrate, ItemTypeID )
		VALUES( ?, ?, ? )' );
		$stmt->setString( 1, $MediaCodecName );
		$stmt->setString( 2, $MediaCodecBitrate );
		$stmt->setString( 3, $ItemTypeID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table MediaCodecs
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @param String
	 * @param Integer
	 * @param Integer
	 */
	public function modify( $MediaCodecID, $MediaCodecName, $MediaCodecBitrate, $ItemTypeID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'UPDATE MediaCodecs
		SET MediaCodecs.MediaCodecName = ?,
		MediaCodecs.MediaCodecBitrate = ?,
		MediaCodecs.ItemTypeID = ?
		WHERE MediaCodecs.MediaCodecID = ?' );
		$stmt->setString( 1, $MediaCodecName );
		$stmt->setString( 2, $MediaCodecBitrate );
		$stmt->setString( 3, $ItemTypeID );
		$stmt->setString( 4, $MediaCodecID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table MediaCodecs
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 */
	public function delete( $MediaCodecID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'DELETE FROM MediaCodecs
		WHERE MediaCodecs.MediaCodecID = ?' );
		$stmt->setString( 1, $MediaCodecID );
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
	public function exist( $MediaCodecID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT COUNT(*)
		FROM MediaCodecs,
		WHERE MediaCodecs.MediaCodecID = ?' );
		$stmt->setString( 1, $MediaCodecID );
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