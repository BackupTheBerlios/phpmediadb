<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_audios.php,v 1.8 2005/03/30 09:49:54 bruf Exp $ */

/**
 * This is the class that manages all database activities for the audios
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.8 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_audios
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
	 * This function returns a specified record from the table AudioDatas
	 * and all required data from the other tables
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
			$stmt = $conn->prepareStatement(	'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.ItemPicturesID
												FROM AudioDatas a,
												Items b,
												ItemTypes c,
												MediaCodecs d,
												MediaFormats e,
												MediaAgeRestrictions f,
												BinaryDatas g
												WHERE b.ItemID = ? 
												AND a.ItemID = b.ItemID
												AND b.ItemTypeID = c.ItemTypeID
												AND b.MediaCodecID = d.MediaCodecID
												AND b.MediaFormatID = e.MediaFormatID
												AND b.MediaAgeRestrictionID = f.MediaAgeRestrictionID
												AND b.ItemPicturesID = g.ItemPicturesID' );
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
	 * This function returns all records from the table AudioDatas
	 * and all required data from the other tables
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
			$stmt = $conn->prepareStatement(	'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.ItemPicturesID
												FROM AudioDatas a,
												Items b,
												ItemTypes c,
												MediaCodecs d,
												MediaFormats e,
												MediaAgeRestrictions f,
												BinaryDatas g' );
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
	 * This function creates a new record in the table AudioDatas
	 * and all required data in the other tables
	 *
	 * @access public
	 * @param Mixed array $data contains all required data for the sql statement
	 * @return Integer $id returns id from the last created record
	 * @return Mixed rollbackTransaction() returns the error message
	 */
	public function create( $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO Items
												( ItemTitle, ItemOriginalTitle, ItemRelease, ItemMediaName, ItemCreationDate,
												ItemModificationDate, ItemComment, ItemQuantity, ItemIdentifier, ItemTypeID )
												VALUES( ?, ?, ?, ?, now(), now(), ?, ?, ?, ? )' );
			$stmt->setString( 1, $data['ItemTitle'] );
			$stmt->setString( 2, $data['ItemOriginalTitle'] );
			$stmt->setString( 3, $data['ItemRelease'] );
			$stmt->setString( 4, $data['ItemMediaName'] );
			$stmt->setString( 5, $data['ItemComment'] );
			$stmt->setString( 6, $data['ItemQuantity'] );
			$stmt->setString( 7, $data['ItemIdentifier'] );
			$stmt->setString( 8, $data['ItemTypeID'] );
			$stmt->executeUpdate();
		
			$id = $this->DATA->SQL->getLastInsert( $conn );
		
			$stmt = $conn->prepareStatement( 'INSERT INTO AudioDatas ( ItemID ) VALUES( ? )' );
			$stmt->setString( 1, $id );
			$stmt->executeUpdate();	
			$this->DATA->SQL->commitTransaction( $conn );
			return $id;
		}
		catch( Exception $e )
		{
			return $this->DATA->SQL->rollbackTransaction( $conn, $e );
		}
	}

//-----------------------------------------------------------------------------
/**
	 * This function modifies a specified record from the table AudioDatas
	 * and all required data from the other tables
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
			$stmt = $conn->prepareStatement(	'UPDATE AudioDatas,
												Items,
												ItemTypes,
												MediaCodecs,
												MediaFormats,
												MediaAgeRestrictions,
												BinaryDatas
												SET Items.ItemTitle = ?,
												Items.ItemOriginalTitle = ?,
												Items.ItemRelease = ?,
												Items.ItemMediaName = ?,
												Items.ItemModificationDate = now(),
												Items.ItemComment = ?,
												Items.ItemQuantity = ?,
												Items.ItemIdentifier = ?,
												Items.ItemTypeID = ?,
												Items.MediaCodecID = ?,
												Items.MediaFormatID = ?,
												Items.MediaAgeRestrictionID = ?,
												Items.MediaStatusID = ?,
												Items.ItemPicturesID = ?
												WHERE Items.ItemID = ?
												AND AudioDatas.ItemID = Items.ItemID
												AND Items.ItemTypeID = ItemTypes.ItemTypeID
												AND Items.MediaCodecID = MediaCodecs.MediaCodecID
												AND Items.MediaFormatID = MediaFormats.MediaFormatID
												AND Items.MediaAgeRestrictionID = MediaAgeRestrictions.MediaAgeRestrictionID
												AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID' );
			$stmt->setString( 1, $data['ItemTitle'] );
			$stmt->setString( 2, $data['ItemOriginalTitle'] );
			$stmt->setString( 3, $data['ItemRelease'] );
			$stmt->setString( 4, $data['ItemMediaName'] );
			$stmt->setString( 5, $data['ItemComment'] );
			$stmt->setString( 6, $data['ItemQuantity'] );
			$stmt->setString( 7, $data['ItemIdentifier'] );
			$stmt->setString( 8, $data['ItemTypeID'] );
			$stmt->setString( 9, $data['MediaCodecID'] );
			$stmt->setString( 10, $data['MediaFormatID'] );
			$stmt->setString( 11, $data['MediaAgeRestrictionID'] );
			$stmt->setString( 12, $data['ItemPicturesID'] );
			$stmt->setString( 13, $id );
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
	 * This function deletes a specified record from the table AudioDatas
	 * and all depending data from the other tables
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
			$stmt = $conn->prepareStatement(	'DELETE AudioDatas, Items, BinaryDatas, Categories_has_Items
												FROM AudioDatas, Items, BinaryDatas, Categories_has_Items
												WHERE Items.ItemID = ?
												AND AudioDatas.ItemID = Items.ItemID
												AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID
												AND Items.ItemID = Categories_has_Items.ItemID' );
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
												FROM Items
												WHERE Items.ItemID = ?' );
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
} /* end of class phpmediadb_data_audios */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>