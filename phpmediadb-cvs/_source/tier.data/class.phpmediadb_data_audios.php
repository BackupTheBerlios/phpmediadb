<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_audios.php,v 1.4 2005/03/15 13:29:33 bruf Exp $ */

class phpmediadb_data_audios
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
	 * This function returns a specified record from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function get( $AudioDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
		FROM AudioDatas a,
		Languages b,
		Items c,
		ItemTypes d,
		MediaCodecs e,
		MediaFormats f,
		MediaAgeRestrictions g,
		MediaStatus h,
		BinaryDatas i
		WHERE a.AudioDataID = :adid 
		AND a.LanguageID = b.LanguageID
		AND a.ItemID = c.ItemID
		AND c.ItemTypeID = d.ItemTypeID
		AND c.MediaCodecID = e.MediaCodecID
		AND c.MediaFormatID = f.MediaFormatID
		AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
		AND c.MediaStatusID = h.MediaStatusID
		AND c.ItemPicturesID = i.ItemPicturesID' );
		$stmt->setString( ':adid', $AudioDataID );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getall()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
		FROM AudioDatas a,
		Languages b,
		Items c,
		ItemTypes d,
		MediaCodecs e,
		MediaFormats f,
		MediaAgeRestrictions g,
		MediaStatus h,
		BinaryDatas i
		WHERE a.AudioDataID = :id 
		AND a.LanguageID = b.LanguageID
		AND a.ItemID = c.ItemID
		AND c.ItemTypeID = d.ItemTypeID
		AND c.MediaCodecID = e.MediaCodecID
		AND c.MediaFormatID = f.MediaFormatID
		AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
		AND c.MediaStatusID = h.MediaStatusID
		AND c.ItemPicturesID = i.ItemPicturesID' );
		$stmt->setString( ':id', '%' );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table AudioDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 */
	public function delete( $AudioDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'DELETE AudioDatas, Items, BinaryDatas, Categories_has_Items
		FROM AudioDatas, Items, BinaryDatas, Categories_has_Items
		WHERE AudioDatas.AudioDataID = :adid
		AND AudioDatas.ItemID = Items.ItemID
		AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID
		AND Items.ItemID = Categories_has_Items.ItemID' );
		$stmt->setString( ':adid', $AudioDataID );
		$stmt->executeUpdate();
	}

//-----------------------------------------------------------------------------
/**
	 * This function creates a new record in the table AudioDatas
	 * and all required data in the other tables
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
	public function create( $AudioDataMediaCount, $AudioDataDiscID, $ItemTitle, $ItemOriginalTitle,
	$ItemRelease, $ItemMediaName, $ItemComment )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'INSERT INTO AudioDatas ( AudioDataMediaCount, AudioDataDiscID ) VALUES( :admc, :addi )' );
		$stmt->setString( ':admc', $AudioDataMediaCount );
		$stmt->setString( ':addi', $AudioDataDiscID );
		$stmt->executeUpdate();
		
		$stmt = $conn->preparedStatement( 'INSERT INTO Items
		( ItemTitle, ItemOriginalTitle, ItemRelease, ItemMediaName, ItemCreationDate, ItemModificationDate, ItemComment )
		VALUES( :it, :iot, :ir, :imn, now(), now(), :ic )' );
		$stmt->setString( ':it', $ItemTitle );
		$stmt->setString( ':iot', $ItemOriginalTitle );
		$stmt->setString( ':ir', $ItemRelease );
		$stmt->setString( ':imn', $ItemMediaName );
		$stmt->setString( ':ic' , $ItemComment );
		$stmt->executeUpdate(); 
		
	}

//-----------------------------------------------------------------------------
/**
	 * This function modifies a specified record from the table AudioDatas
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
	public function modify( $AudioDataID, $AudioDataMediaCount, $AudioDataDiscID, $ItemTitle, $ItemOriginalTitle,
	$ItemRelease, $ItemMediaName, $ItemComment, $MediaCodecID, $MediaFormatID,
	$MediaAgeRestrictionID, $MediaStatusID, $ItemPicturesID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'UPDATE AudioDatas,
		Languages,
		Items,
		ItemTypes,
		MediaCodecs,
		MediaFormats,
		MediaAgeRestrictions,
		MediaStatus,
		BinaryDatas
		SET AudioDatas.AudioDataMediaCount = :admc,
		AudioDatas.AudioDataDiscID = :addid,
		Items.ItemTitle = :it,
		Items.ItemOriginalTitle = :iot,
		Items.ItemRelease = :ir,
		Items.ItemMediaName = :imn,
		Items.ItemModificationDate = now(),
		Items.ItemComment = :ic,
		Items.MediaCodecID = :mcid,
		Items.MediaFormatID = :mfid,
		Items.MediaAgeRestrictionID = :marid,
		Items.MediaStatusID = :msid,
		Items.ItemPicturesID = :ipid
		WHERE AudioDatas.AudioDataID = :adid 
		AND AudioDatas.LanguageID = Languages.LanguageID
		AND AudioDatas.ItemID = Items.ItemID
		AND Items.ItemTypeID = ItemTypes.ItemTypeID
		AND Items.MediaCodecID = MediaCodecs.MediaCodecID
		AND Items.MediaFormatID = MediaFormats.MediaFormatID
		AND Items.MediaAgeRestrictionID = MediaAgeRestrictions.MediaAgeRestrictionID
		AND Items.MediaStatusID = MediaStatus.MediaStatusID
		AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID' );
		$stmt->setString( ':admc', $AudioDataMediaCount );
		$stmt->setString( ':addid', $AudioDataDiscID );
		$stmt->setString( ':it', $ItemTitle );
		$stmt->setString( ':iot', $ItemOriginalTitle );
		$stmt->setString( ':ir', $ItemRelease );
		$stmt->setString( ':imn', $ItemMediaName );
		$stmt->setString( ':ic', $ItemComment );
		$stmt->setString( ':mcid', $MediaCodecID );
		$stmt->setString( ':mfid', $MediaFormatID );
		$stmt->setString( ':marid', $MediaAgeRestrictionID );
		$stmt->setString( ':msid', $MediaStatusID );
		$stmt->setString( ':ipid', $ItemPicturesID );
		$stmt->setString( ':adid', $AudioDataID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>