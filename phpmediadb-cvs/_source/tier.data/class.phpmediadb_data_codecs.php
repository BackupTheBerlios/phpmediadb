<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_codecs.php,v 1.4 2005/03/13 13:25:17 bruf Exp $ */

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
	public function getCodec( $MediaCodecID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaCodecs,
		WHERE MediaCodecs.MediaCodecID = :mcid' );
		$stmt->setString( ':mcid', $MediaCodecID );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaCodecs
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getallCodecs()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaCodecs,
		WHERE MediaCodecs.MediaCodecID = :mcid' );
		$stmt->setString( ':mcid', '%' );
		$stmt->executeQuery();
		
		return $stmt;
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
	public function createCodec( $MediaCodecName, $MediaCodecBitrate, $ItemTypeID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'INSERT INTO MediaCodecs
		( MediaCodecName, MediaCodecBitrate, ItemTypeID )
		VALUES( :mcn, :mcb, :itid )' );
		$stmt->setString( ':mcn', $MediaCodecName );
		$stmt->setString( ':mcb', $MediaCodecBitrate );
		$stmt->setString( ':itid', $ItemTypeID );
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
	public function createCodec( $MediaCodecID, $MediaCodecName, $MediaCodecBitrate, $ItemTypeID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'UPDATE MediaCodecs
		SET MediaCodecs.MediaCodecName = :mcn,
		MediaCodecs.MediaCodecBitrate = :mcb,
		MediaCodecs.ItemTypeID = :itid
		WHERE MediaCodecs.MediaCodecID = :mcid' );
		$stmt->setString( ':mcn', $MediaCodecName );
		$stmt->setString( ':mcb', $MediaCodecBitrate );
		$stmt->setString( ':itid', $ItemTypeID );
		$stmt->setString( ':mcid', $MediaCodecID );
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
	public function deleteCodec( $MediaCodecID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'DELETE FROM MediaCodecs
		WHERE MediaCodecs.MediaCodecID = :mcid' );
		$stmt->setString( ':mcid', $MediaCodecID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>