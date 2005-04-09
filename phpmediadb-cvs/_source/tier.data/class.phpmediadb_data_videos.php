<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_videos.php,v 1.12 2005/04/09 23:56:01 mblaschke Exp $ */

/**
 * This is the class that manages all database activities for the videos
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.12 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_videos
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
	 * This function returns a specified record from the table VideoDatas
	 * and all required data from the other tables
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
			$stmt = $conn->prepareStatement(	'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.ItemPicturesID
												FROM VideoDatas a,
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
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $exception )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table VideoDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @return array returns the results of database query
	 */
	public function getList()
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.ItemPicturesID
												FROM VideoDatas a,
												Items b,
												ItemTypes c,
												MediaCodecs d,
												MediaFormats e,
												MediaAgeRestrictions f,
												BinaryDatas g' );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $exception )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
/**
	 * This function creates a new record in the table VideoDatas
	 * and all required data in the other tables
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
			$stmt = $conn->prepareStatement(	'INSERT INTO Items
												( ItemTitle, ItemOriginalTitle, ItemReleaseDate, ItemMediaName, ItemCreationDate,
												ItemModificationDate, ItemComment, ItemQuantity, ItemIdentifier, ItemTypeID )
												VALUES( ?, ?, ?, ?, now(), now(), ?, ?, ?, ? )' );
			$stmt->setString( 1, $data['ItemTitle'] );
			$stmt->setString( 2, $data['ItemOriginalTitle'] );
			$stmt->setString( 3, $data['ItemReleaseDate'] );
			$stmt->setString( 4, $data['ItemMediaName'] );
			$stmt->setString( 5, $data['ItemComment'] );
			$stmt->setString( 6, $data['ItemQuantity'] );
			$stmt->setString( 7, $data['ItemIdentifier'] );
			$stmt->setString( 8, PHPMEDIADB_ITEM_VIDEO );
			$stmt->executeUpdate();
			
			$id = $this->DATA->SQL->getLastInsert( $conn );
			
			$stmt = $conn->prepareStatement( 'INSERT INTO VideoDatas ( ItemID ) VALUES( ? )' );
			$stmt->setString( 1, $id );
			$stmt->executeUpdate();	
			$this->DATA->SQL->commitTransaction( $conn );
			return $id;
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
/**
	 * This function modifies a specified record from the table VideoDatas
	 * and all required data from the other tables
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
			$stmt = $conn->prepareStatement(	'UPDATE VideoDatas,
												Items,
												ItemTypes,
												MediaCodecs,
												MediaFormats,
												MediaAgeRestrictions,
												BinaryDatas
												SET Items.ItemTitle = ?,
												Items.ItemOriginalTitle = ?,
												Items.ItemReleaseDate = ?,
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
												AND VideoDatas.ItemID = Items.ItemID
												AND Items.ItemTypeID = ItemTypes.ItemTypeID
												AND Items.MediaCodecID = MediaCodecs.MediaCodecID
												AND Items.MediaFormatID = MediaFormats.MediaFormatID
												AND Items.MediaAgeRestrictionID = MediaAgeRestrictions.MediaAgeRestrictionID
												AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID' );
			$stmt->setString( 1, $data['ItemTitle'] );
			$stmt->setString( 2, $data['ItemOriginalTitle'] );
			$stmt->setString( 3, $data['ItemReleaseDate'] );
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
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table VideoDatas
	 * and all depending data from the other tables
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
			$stmt = $conn->prepareStatement(	'DELETE VideoDatas, Items, BinaryDatas, Categories_has_Items
												FROM AudioDatas, Items, BinaryDatas, Categories_has_Items
												WHERE Items.ItemID = ?
												AND VideoDatas.ItemID = Items.ItemID
												AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID
												AND Items.ItemID = Categories_has_Items.ItemID' );
			$stmt->setString( 1, $id );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
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
												FROM VideoDatas
												WHERE VideoDatas.VideoDataID = ?' );
			$stmt->setString( 1, $videoDataId );
			$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
			$rs->next();
			
			/* check if item exists */
			if( $rs->get(1) >= 1 )
				$returnValue = true;
			
			return $returnValue;
		}
		catch( Exception $exception )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_videos */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>