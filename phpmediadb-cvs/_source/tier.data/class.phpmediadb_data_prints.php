<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_prints.php,v 1.5 2005/03/15 17:46:19 bruf Exp $ */

class phpmediadb_data_prints
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
	 * This function returns a specified record from the table PrintDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function get( $PrintDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
		FROM PrintDatas a,
		Languages b,
		Items c,
		ItemTypes d,
		MediaCodecs e,
		MediaFormats f,
		MediaAgeRestrictions g,
		MediaStatus h,
		BinaryDatas i
		WHERE a.PrintDataID = ? 
		AND a.LanguageID = b.LanguageID
		AND a.ItemID = c.ItemID
		AND c.ItemTypeID = d.ItemTypeID
		AND c.MediaCodecID = e.MediaCodecID
		AND c.MediaFormatID = f.MediaFormatID
		AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
		AND c.MediaStatusID = h.MediaStatusID
		AND c.ItemPicturesID = i.ItemPicturesID' );
		$stmt->setString( 1, $PrintDataID );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table PrintDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getList()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
		FROM PrintDatas a,
		Languages b,
		Items c,
		ItemTypes d,
		MediaCodecs e,
		MediaFormats f,
		MediaAgeRestrictions g,
		MediaStatus h,
		BinaryDatas i
		WHERE a.PrintDataID LIKE "%"
		AND a.LanguageID = b.LanguageID
		AND a.ItemID = c.ItemID
		AND c.ItemTypeID = d.ItemTypeID
		AND c.MediaCodecID = e.MediaCodecID
		AND c.MediaFormatID = f.MediaFormatID
		AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
		AND c.MediaStatusID = h.MediaStatusID
		AND c.ItemPicturesID = i.ItemPicturesID' );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table PrintDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 */
	public function delete( $PrintDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'DELETE PrintDatas, Items, BinaryDatas, Categories_has_Items
		FROM PrintDatas, Items, BinaryDatas, Categories_has_Items
		WHERE PrintDatas.PrintDataID = ?
		AND PrintDatas.ItemID = Items.ItemID
		AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID
		AND Items.ItemID = Categories_has_Items.ItemID' );
		$stmt->setString( 1, $PrintDataID );
		$stmt->executeUpdate();
	}

//-----------------------------------------------------------------------------
/**
	 * This function creates a new record into the table PrintDatas
	 * and all required data into the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @param String
	 * @param String
	 * @param String
	 * @param Integer
	 * @param String
	 * @param Blob
	 */
	public function create( $PrintDataMediaCount, $PrintDataISBN, $ItemTitle, $ItemOriginalTitle,
	$ItemRelease, $ItemMediaName, $ItemComment )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO PrintDatas ( PrintDataMediaCount, PrintDataISBN ) VALUES( ?, ? )' );
		$stmt->setString( 1, $PrintDataMediaCount );
		$stmt->setString( 2, $PrintDataISBN );
		$stmt->executeUpdate();
		
		$stmt = $conn->prepareStatement( 'INSERT INTO Items
		( ItemTitle, ItemOriginalTitle, ItemRelease, ItemMediaName, ItemCreationDate, ItemModificationDate, ItemComment )
		VALUES( ?, ?, ?, ?, now(), now(), ? )' );
		$stmt->setString( 1, $ItemTitle );
		$stmt->setString( 2, $ItemOriginalTitle );
		$stmt->setString( 3, $ItemRelease );
		$stmt->setString( 4, $ItemMediaName );
		$stmt->setString( 5, $ItemComment );
		$stmt->executeUpdate(); 
		
	}

//-----------------------------------------------------------------------------
/**
	 * This function modifies a specified record from the table PrintDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @param Integer
	 * @param String
	 * @param String
	 * @param String
	 * @param Integer
	 * @param String
	 * @param Blob
	 * @param Integer
	 * @param Integer
	 * @param Integer
	 * @param Integer
	 * @param Integer
	 */
	public function modify( $PrintDataID, $PrintDataMediaCount, $PrintDataISBN, $ItemTitle, $ItemOriginalTitle,
	$ItemRelease, $ItemMediaName, $ItemComment, $MediaCodecID, $MediaFormatID,
	$MediaAgeRestrictionID, $MediaStatusID, $ItemPicturesID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'UPDATE PrintDatas,
		Languages,
		Items,
		ItemTypes,
		MediaCodecs,
		MediaFormats,
		MediaAgeRestrictions,
		MediaStatus,
		BinaryDatas
		SET PrintDatas.PrintDataMediaCount = ?,
		PrintDatas.PrintDataISBN = ?,
		Items.ItemTitle = ?,
		Items.ItemOriginalTitle = ?,
		Items.ItemRelease = ?,
		Items.ItemMediaName = ?,
		Items.ItemModificationDate = now(),
		Items.ItemComment = ?,
		Items.MediaCodecID = ?,
		Items.MediaFormatID = ?,
		Items.MediaAgeRestrictionID = ?,
		Items.MediaStatusID = ?,
		Items.ItemPicturesID = ?
		WHERE PrintDatas.PrintDataID = ? 
		AND PrintDatas.LanguageID = Languages.LanguageID
		AND PrintDatas.ItemID = Items.ItemID
		AND Items.ItemTypeID = ItemTypes.ItemTypeID
		AND Items.MediaCodecID = MediaCodecs.MediaCodecID
		AND Items.MediaFormatID = MediaFormats.MediaFormatID
		AND Items.MediaAgeRestrictionID = MediaAgeRestrictions.MediaAgeRestrictionID
		AND Items.MediaStatusID = MediaStatus.MediaStatusID
		AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID' );
		$stmt->setString( 1, $PrintDataMediaCount );
		$stmt->setString( 2, $PrintDataISBN );
		$stmt->setString( 3, $ItemTitle );
		$stmt->setString( 4, $ItemOriginalTitle );
		$stmt->setString( 5, $ItemRelease );
		$stmt->setString( 6, $ItemMediaName );
		$stmt->setString( 7, $ItemComment );
		$stmt->setString( 8, $MediaCodecID );
		$stmt->setString( 9, $MediaFormatID );
		$stmt->setString( 10, $MediaAgeRestrictionID );
		$stmt->setString( 11, $MediaStatusID );
		$stmt->setString( 12, $ItemPicturesID );
		$stmt->setString( 13, $PrintDataID );
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
	public function exist( $PrintDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT COUNT(*)
		FROM PrintDatas,
		WHERE PrintDatas.PrintDataID = ?' );
		$stmt->setString( 1, $PrintDataID );
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