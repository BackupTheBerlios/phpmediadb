<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_audios.php,v 1.14 2005/04/13 11:52:22 bruf Exp $ */

/**
 * This is the class that manages all database activities for the audios
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.14 $
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
	 * @return array returns the results of database query
	 */
	public function get( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT Items.*, AudioDatas.*, ItemTypes.*, MediaCodecs.MediaCodecName, MediaFormats.MediaFormatName, MediaAgeRestrictions.MediaAgeRestriction ,BinaryDatas.ItemPicturesID
													FROM Items
													LEFT JOIN AudioDatas ON AudioDatas.ItemID=Items.ItemID
													LEFT JOIN ItemTypes ON ItemTypes.ItemTypeID=Items.ItemTypeID
													LEFT JOIN MediaCodecs ON MediaCodecs.MediaCodecID=Items.MediaCodecID
													LEFT JOIN MediaFormats ON MediaFormats.MediaFormatID=Items.MediaFormatID
													LEFT JOIN MediaAgeRestrictions ON MediaAgeRestrictions.MediaAgeRestrictionID=Items.MediaAgeRestrictionID
													LEFT JOIN BinaryDatas ON  BinaryDatas.ItemPicturesID=Items.ItemPicturesID
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
	 * This function returns all records from the table AudioDatas
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
			$stmt = $conn->prepareStatement(	'SELECT Items.*, AudioDatas.*, ItemTypes.*, MediaCodecs.MediaCodecName, MediaFormats.MediaFormatName, MediaAgeRestrictions.MediaAgeRestriction ,BinaryDatas.ItemPicturesID
													FROM Items
													LEFT JOIN AudioDatas ON AudioDatas.ItemID=Items.ItemID
													LEFT JOIN ItemTypes ON ItemTypes.ItemTypeID=Items.ItemTypeID
													LEFT JOIN MediaCodecs ON MediaCodecs.MediaCodecID=Items.MediaCodecID
													LEFT JOIN MediaFormats ON MediaFormats.MediaFormatID=Items.MediaFormatID
													LEFT JOIN MediaAgeRestrictions ON MediaAgeRestrictions.MediaAgeRestrictionID=Items.MediaAgeRestrictionID
													LEFT JOIN BinaryDatas ON  BinaryDatas.ItemPicturesID=Items.ItemPicturesID
													WHERE Items.ItemTypeID = ?' );
			$stmt->setString( 1, PHPMEDIADB_ITEM_AUDIO );
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
	 * This function creates a new record in the table AudioDatas
	 * and all required data in the other tables
	 *
	 * @access public
	 * @param array $data contains all required data for the sql statement
	 * @return Integer returns id from the last created record
	 */
	public function create( $data )
	{
		
		/*
		  INDEX Items_FKIndex3(MediaFormatID),
  INDEX Items_FKIndex4(MediaCodecID),
  INDEX Items_FKIndex5(MediaAgeRestrictionID)
		*/
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO Items
												( ItemTitle, ItemOriginalTitle, ItemReleaseDate, ItemMediaName, ItemCreationDate,
												ItemModificationDate, ItemComment, ItemQuantity, ItemIdentifier, ItemTypeID,
												ItemPublisher, MediaCodecID,MediaFormatID,MediaAgeRestrictionID )
												VALUES( ?, ?, ?, ?, now(), now(), ?, ?, ?, ?, ?, ?, ?, ? )' );
			$stmt->setString( 1, $data['itemtitle'] );
			$stmt->setString( 2, $data['itemoriginaltitle'] );
			$stmt->setString( 3, $data['itemreleasedate'] );
			$stmt->setString( 4, $data['itemmedianame'] );
			$stmt->setString( 5, $data['itemcomment'] );
			$stmt->setString( 6, $data['itemquantity'] );
			$stmt->setString( 7, $data['itemidentifier'] );
			$stmt->setString( 8, PHPMEDIADB_ITEM_AUDIO );
			$stmt->setString( 9, $data['itempublisher'] );
			$stmt->setString( 10, $data['mediacodecid'] );
			$stmt->setString( 11, $data['mediaformatid'] );
			$stmt->setString( 12, $data['mediaagerestrictionid'] );
			$stmt->executeUpdate();
		
			$id = $this->DATA->SQL->getLastInsert( $conn );
		    			
			$stmt = $conn->prepareStatement( 'INSERT INTO AudioDatas ( ItemID ) VALUES( ? )' );
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
	 * This function modifies a specified record from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @param array $data contains all required data for the sql statement
	 * @return bool Status of transaction
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
													Items.ItemModificationDate = now(),
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
			$stmt->setString( 5, $data['itemcomment'] );
			$stmt->setString( 6, $data['itemquantity'] );
			$stmt->setString( 7, $data['itemidentifier'] );
			$stmt->setString( 8, $data['mediacodecid'] );
			$stmt->setString( 9, $data['mediaformatid'] );
			$stmt->setString( 10, $data['mediaagerestrictionid'] );
			$stmt->setString( 11, $data['itempublisher'] );
			$stmt->setString( 12, $id );
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
		
		return true;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table AudioDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return bool Status of transaction
	 */
	public function delete( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'DELETE AudioDatas, Items, BinaryDatas, Categories_has_Items
													FROM Items
													LEFT JOIN AudioDatas ON AudioDatas.ItemID=Items.ItemID
													LEFT JOIN Categories_has_Items ON Categories_has_Items.ItemID=Items.ItemID
													LEFT JOIN BinaryDatas ON  BinaryDatas.ItemPicturesID=Items.ItemPicturesID
													WHERE Items.ItemID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeUpdate();
			
			
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
		
		return true;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @param Integer $itemId contains specified id for the sql statement
	 * @return Bool returns whether the specified record exists
	 */
	public function exists( $id )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->exist( $id );

		/* return value */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_audios */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>