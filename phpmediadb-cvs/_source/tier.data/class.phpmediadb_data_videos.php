<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_videos.php,v 1.3 2005/03/11 12:17:43 bruf Exp $ */

class phpmediadb_data_videos
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
	 * This function returns a specified record from the table VideoDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function getVideo( $VideoDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
		FROM VideoDatas a,
		Languages b,
		Items c,
		ItemTypes d,
		MediaCodecs e,
		MediaFormats f,
		MediaAgeRestrictions g,
		MediaStatus h,
		BinaryDatas i
		WHERE a.VideoDataID = :vdid 
		AND a.LanguageID = b.LanguageID
		AND a.ItemID = c.ItemID
		AND c.ItemTypeID = d.ItemTypeID
		AND c.MediaCodecID = e.MediaCodecID
		AND c.MediaFormatID = f.MediaFormatID
		AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
		AND c.MediaStatusID = h.MediaStatusID
		AND c.ItemPicturesID = i.ItemPicturesID' );
		$stmt->setString( ':vdid', $VideoDataID );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table VideoDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getallVideos()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
		FROM VideoDatas a,
		Languages b,
		Items c,
		ItemTypes d,
		MediaCodecs e,
		MediaFormats f,
		MediaAgeRestrictions g,
		MediaStatus h,
		BinaryDatas i
		WHERE a.VideoDataID = :vdid 
		AND a.LanguageID = b.LanguageID
		AND a.ItemID = c.ItemID
		AND c.ItemTypeID = d.ItemTypeID
		AND c.MediaCodecID = e.MediaCodecID
		AND c.MediaFormatID = f.MediaFormatID
		AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
		AND c.MediaStatusID = h.MediaStatusID
		AND c.ItemPicturesID = i.ItemPicturesID' );
		$stmt->setString( ':vdid', '%' );
		$stmt->executeQuery();
		
		return $stmt;
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function delete a specified record from the table VideoDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 */
	public function deleteVideo( $VideoDataID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'DELETE VideoDatas, Items, BinaryDatas, Categories_has_Items
		FROM AudioDatas, Items, BinaryDatas, Categories_has_Items
		WHERE VideoDatas.VideoDataID = :vdid
		AND VideoDatas.ItemID = Items.ItemID
		AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID
		AND Items.ItemID = Categories_has_Items.ItemID' );
		$stmt->setString( ':vdid', $VideoDataID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
/**
	 * This function create a new record into the table VideoDatas
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
	 * @param Integer
	 * @param Integer
	 * @param Blob
	 */
	public function createVideo( $VideoDataMediaCount, $AudioDataImdbID, $ItemTitle, $ItemOriginalTitle,
	$ItemRelease, $ItemMediaName, $ItemCreationDate, $ItemModificationDate, $ItemComment )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'INSERT INTO VideoDatas ( VideoDataMediaCount, VideoDataImdbID ) VALUES( :vdmc, :vdii )' );
		$stmt->setString( ':vdmc', $VideoDataMediaCount );
		$stmt->setString( ':vdii', $VideoDataImdbID );
		$stmt->executeUpdate();
		
		$stmt = $conn->preparedStatement( 'INSERT INTO Items
		( ItemTitle, ItemOriginalTitle, ItemRelease, ItemMediaName, ItemCreationDate, ItemModificationDate, ItemComment )
		VALUES( :it, :iot, :ir, :imn, :icd, :imd, :ic )' );
		$stmt->setString( ':it', $ItemTitle );
		$stmt->setString( ':iot', $ItemOriginalTitle );
		$stmt->setString( ':ir', $ItemRelease );
		$stmt->setString( ':imn', $ItemMediaName );
		$stmt->setString( ':icd', $ItemCreationDate );
		$stmt->setString( ':imd', $ItemModificationDate );
		$stmt->setString( ':ic' , $ItemComment );
		$stmt->executeUpdate(); 

	}

//-----------------------------------------------------------------------------
/**
	 * This function modify a specified record from the table VideoDatas
	 * and all required data from other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @param String
	 * @param String
	 * @param String
	 * @param Integer
	 * @param String
	 * @param Integer
	 * @param Blob
	 * @param Integer
	 */
	public function modifyVideo( $VideoDataID, $VideoDataMediaCount, $VideoDataImdbID, $ItemTitle, $ItemOriginalTitle,
	$ItemRelease, $ItemMediaName, $ItemModificationDate, $ItemComment, $MediaCodecID, $MediaFormatID,
	$MediaAgeRestrictionID, $MediaStatusID, $ItemPicturesID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'UPDATE VideoDatas,
		Languages,
		Items,
		ItemTypes,
		MediaCodecs,
		MediaFormats,
		MediaAgeRestrictions,
		MediaStatus,
		BinaryDatas
		SET VideoDatas.VideoDataMediaCount = :vdmc,
		VideoDatas.VideoDataImdbID = :vdii,
		Items.ItemTitle = :it,
		Items.ItemOriginalTitle = :iot,
		Items.ItemRelease = :ir,
		Items.ItemMediaName = :imn,
		Items.ItemModificationDate = :imd,
		Items.ItemComment = :ic
		Items.MediaCodecID = :mcid,
		Items.MediaFormatID = :mfid,
		Items.MediaAgeRestrictionID = :marid,
		Items.MediaStatusID = :msid,
		Items.ItemPicturesID = :ipid
		WHERE VideoDatas.VideoDataID = :vdid 
		AND VideoDatas.LanguageID = Languages.LanguageID
		AND VideoDatas.ItemID = Items.ItemID
		AND Items.ItemTypeID = ItemTypes.ItemTypeID
		AND Items.MediaCodecID = MediaCodecs.MediaCodecID
		AND Items.MediaFormatID = MediaFormats.MediaFormatID
		AND Items.MediaAgeRestrictionID = MediaAgeRestrictions.MediaAgeRestrictionID
		AND Items.MediaStatusID = MediaStatus.MediaStatusID
		AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID' );
		$stmt->setString( ':vdmc', $VideoDataMediaCount );
		$stmt->setString( ':vdii', $VideoDataImdbID );
		$stmt->setString( ':it', $ItemTitle );
		$stmt->setString( ':iot', $ItemOriginalTitle );
		$stmt->setString( ':ir', $ItemRelease );
		$stmt->setString( ':imn', $ItemMediaName );
		$stmt->setString( ':imd', $ItemModificatioDate );
		$stmt->setString( ':ic', $ItemComment );
		$stmt->setString( ':mcid', $MediaCodecID );
		$stmt->setString( ':mfid', $MediaFormatID );
		$stmt->setString( ':marid', $MediaAgeRestrictionID );
		$stmt->setString( ':msid', $MediaStatusID );
		$stmt->setString( ':ipid', $ItemPicturesID );
		$stmt->setString( ':vdid', $VideoDataID );
		$stmt->executeQuery();
		
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>