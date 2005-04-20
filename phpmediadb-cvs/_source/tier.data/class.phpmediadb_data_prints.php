<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_prints.php,v 1.16 2005/04/20 20:14:58 bruf Exp $ */

/**
 * This is the class that manages all database activities for the prints
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.16 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_prints
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
	 * This function returns a specified record from the table PrintDatas
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
			$stmt = $conn->prepareStatement(	'SELECT Items.*, ItemTypes.*, MediaCodecs.*, MediaFormats.*, MediaAgeRestrictions.*
													FROM Items
													LEFT JOIN ItemTypes ON ItemTypes.ItemTypeID=Items.ItemTypeID
													LEFT JOIN MediaCodecs ON MediaCodecs.MediaCodecID=Items.MediaCodecID
													LEFT JOIN MediaFormats ON MediaFormats.MediaFormatID=Items.MediaFormatID
													LEFT JOIN MediaAgeRestrictions ON MediaAgeRestrictions.MediaAgeRestrictionID=Items.MediaAgeRestrictionID
													WHERE Items.ItemID = ?' );
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
	 * This function returns all records from the table PrintDatas
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
			$stmt = $conn->prepareStatement(	'SELECT Items.*, ItemTypes.*, MediaCodecs.*, MediaFormats.*, MediaAgeRestrictions.* 
													FROM Items
													LEFT JOIN ItemTypes ON ItemTypes.ItemTypeID=Items.ItemTypeID
													LEFT JOIN MediaCodecs ON MediaCodecs.MediaCodecID=Items.MediaCodecID
													LEFT JOIN MediaFormats ON MediaFormats.MediaFormatID=Items.MediaFormatID
													LEFT JOIN MediaAgeRestrictions ON MediaAgeRestrictions.MediaAgeRestrictionID=Items.MediaAgeRestrictionID
													WHERE Items.ItemTypeID = ?' );
			$stmt->setString( 1, PHPMEDIADB_ITEM_PRINT );
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
	 * This function creates a new record into the table PrintDatas
	 * and all required data into the other tables
	 *
	 * @access public
	 * @param Mixed array $data contains all required data for the sql statement
	 * @return Integer returns id from the last created record
	 */
	public function create( $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO Items
												( ItemTitle, ItemOriginalTitle, ItemReleaseDate, ItemMediaName, ItemLocation, ItemCreationDate,
												ItemModificationDate, ItemPictureURL, ItemComment, ItemQuantity, ItemIdentifier, ItemTypeID,
												ItemPublisher, MediaCodecID,MediaFormatID,MediaAgeRestrictionID )
												VALUES( ?, ?, ?, ?, ?, now(), now(), ?, ?, ?, ?, ?, ?, ?, ?, ? )' );
			$stmt->setString( 1, $data['itemtitle'] );
			$stmt->setString( 2, $data['itemoriginaltitle'] );
			$stmt->setString( 3, $data['itemreleasedate'] );
			$stmt->setString( 4, $data['itemmedianame'] );
			$stmt->setString( 5, $data['itemlocation'] );
			$stmt->setString( 6, $data['itempictureurl'] );
			$stmt->setString( 7, $data['itemcomment'] );
			$stmt->setString( 8, $data['itemquantity'] );
			$stmt->setString( 9, $data['itemidentifier'] );
			$stmt->setString( 10, PHPMEDIADB_ITEM_PRINT );
			$stmt->setString( 11, $data['itempublisher'] );
			$stmt->setString( 12, $data['mediacodecid'] );
			$stmt->setString( 13, $data['mediaformatid'] );
			$stmt->setString( 14, $data['mediaagerestrictionid'] );
			$stmt->executeUpdate();
			
			$id = $this->DATA->SQL->getLastInsert( $conn );
			
			$stmt = $conn->prepareStatement( 'INSERT INTO PrintDatas ( ItemID ) VALUES( ? )' );
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
	 * This function modifies a specified record from the table PrintDatas
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
			$stmt = $conn->prepareStatement(	'Update Items
													LEFT JOIN AudioDatas ON AudioDatas.ItemID=Items.ItemID
													SET Items.ItemTitle = ?,
													Items.ItemOriginalTitle = ?,
													Items.ItemReleaseDate = ?,
													Items.ItemMediaName = ?,
													Items.ItemLocation = ?,
													Items.ItemModificationDate = now(),
													Items.ItemPictureURL = ?,
													Items.ItemComment = ?,
													Items.ItemQuantity = ?,
													Items.ItemIdentifier = ?,
													Items.MediaCodecID = ?,
													Items.MediaFormatID = ?,
													Items.MediaAgeRestrictionID = ?,
													Items.ItemPublisher = ?
													WHERE Items.ItemID = ?' );
			$stmt->setString( 1, $data['itemtitle'] );
			$stmt->setString( 2, $data['itemoriginaltitle'] );
			$stmt->setString( 3, $data['itemreleasedate'] );
			$stmt->setString( 4, $data['itemmedianame'] );
			$stmt->setString( 5, $data['itemlocation'] );
			$stmt->setString( 6, $data['itemcomment'] );
			$stmt->setString( 7, $data['itempictureurl'] );
			$stmt->setString( 8, $data['itemquantity'] );
			$stmt->setString( 9, $data['itemidentifier'] );
			$stmt->setString( 10, $data['mediacodecid'] );
			$stmt->setString( 11, $data['mediaformatid'] );
			$stmt->setString( 12, $data['mediaagerestrictionid'] );
			$stmt->setString( 13, $data['itempublisher'] );
			$stmt->setString( 14, $id );
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
	 * This function deletes a specified record from the table PrintDatas
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
													FROM Items
													LEFT JOIN VideoDatas ON VideoDatas.ItemID=Items.ItemID
													LEFT JOIN Categories_has_Items ON Categories_has_Items.ItemID=Items.ItemID
													LEFT JOIN BinaryDatas ON  BinaryDatas.ItemID=Items.ItemID
													WHERE Items.ItemID = ?' );
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
												FROM PrintDatas
												WHERE PrintDatas.PrintDataID = ?' );
			$stmt->setString( 1, $id );
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
} /* end of class phpmediadb_data_prints */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>