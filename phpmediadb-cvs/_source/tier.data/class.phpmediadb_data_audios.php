<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_audios.php,v 1.6 2005/03/16 15:02:03 bruf Exp $ */

class phpmediadb_data_audios
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
	 * This function returns a specified record from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 * @return Mixed array $rs contains result of database query
	 */
	public function get( $id )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
											FROM AudioDatas a,
											Languages b,
											Items c,
											ItemTypes d,
											MediaCodecs e,
											MediaFormats f,
											MediaAgeRestrictions g,
											MediaStatus h,
											BinaryDatas i
											WHERE c.ItemID = ? 
											AND a.LanguageID = b.LanguageID
											AND a.ItemID = c.ItemID
											AND c.ItemTypeID = d.ItemTypeID
											AND c.MediaCodecID = e.MediaCodecID
											AND c.MediaFormatID = f.MediaFormatID
											AND c.MediaAgeRestrictionID = g.MediaAgeRestrictionID
											AND c.MediaStatusID = h.MediaStatusID
											AND c.ItemPicturesID = i.ItemPicturesID' );
		$stmt->setString( 1, $id );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return Mixed array $rs contains result of database query
	 */
	public function getList()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'SELECT a.*, b.*, c.*, d.*, e.*, f.*, g.*, h.*, i.ItemPicturesID
											FROM AudioDatas a,
											Languages b,
											Items c,
											ItemTypes d,
											MediaCodecs e,
											MediaFormats f,
											MediaAgeRestrictions g,
											MediaStatus h,
											BinaryDatas i
											WHERE c.ItemID LIKE "%" 
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
	 * This function creates a new record in the table AudioDatas
	 * and all required data in the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Mixed array $data contains all required data for the sql statement
	 * @return Integer getLastInsert() returns id from the last created record
	 */
	public function create( $data )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO AudioDatas ( AudioDataMediaCount, AudioDataDiscID ) VALUES( ?, ? )' );
		$stmt->setString( 1, $AudioDataMediaCount );
		$stmt->setString( 2, $AudioDataDiscID );
		$stmt->executeUpdate();
				
		$stmt = $conn->prepareStatement( 'INSERT INTO Items
		( ItemTitle, ItemOriginalTitle, ItemRelease, ItemMediaName, ItemCreationDate, ItemModificationDate, ItemComment )
		VALUES( ?, ?, ?, ?, now(), now(), ? )' );
		$stmt->setString( 1, $data['ItemTitle'] );
		$stmt->setString( 2, $data['ItemOriginalTitle'] );
		$stmt->setString( 3, $data['ItemRelease'] );
		$stmt->setString( 4, $data['ItemMediaName'] );
		$stmt->setString( 5, $data['ItemComment'] );
		$stmt->executeUpdate();
		
		return $this->DATA->SQL->getLastInsert( $conn );	
	}

//-----------------------------------------------------------------------------
/**
	 * This function modifies a specified record from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 * @param Mixed array $data contains all required data for the sql statement
	 */
	public function modify( $id, $data )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'UPDATE AudioDatas,
											Languages,
											Items,
											ItemTypes,
											MediaCodecs,
											MediaFormats,
											MediaAgeRestrictions,
											MediaStatus,
											BinaryDatas
											SET AudioDatas.AudioDataMediaCount = ?,
											AudioDatas.AudioDataDiscID = ?,
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
											WHERE Items.ItemID = ? 
											AND AudioDatas.LanguageID = Languages.LanguageID
											AND AudioDatas.ItemID = Items.ItemID
											AND Items.ItemTypeID = ItemTypes.ItemTypeID
											AND Items.MediaCodecID = MediaCodecs.MediaCodecID
											AND Items.MediaFormatID = MediaFormats.MediaFormatID
											AND Items.MediaAgeRestrictionID = MediaAgeRestrictions.MediaAgeRestrictionID
											AND Items.MediaStatusID = MediaStatus.MediaStatusID
											AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID' );
		$stmt->setString( 1, $data['AudioDataMediaCount'] );
		$stmt->setString( 2, $data['AudioDataDiscID'] );
		$stmt->setString( 3, $data['ItemTitle'] );
		$stmt->setString( 4, $data['ItemOriginalTitle'] );
		$stmt->setString( 5, $data['ItemRelease'] );
		$stmt->setString( 6, $data['ItemMediaName'] );
		$stmt->setString( 7, $data['ItemComment'] );
		$stmt->setString( 8, $data['MediaCodecID'] );
		$stmt->setString( 9, $data['MediaFormatID'] );
		$stmt->setString( 10, $data['MediaAgeRestrictionID'] );
		$stmt->setString( 11, $data['MediaStatusID'] );
		$stmt->setString( 12, $data['ItemPicturesID'] );
		$stmt->setString( 13, $id );
		$stmt->executeUpdate();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table AudioDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $id contains specified id for the sql statement
	 */
	public function delete( $id )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement(	'DELETE AudioDatas, Items, BinaryDatas, Categories_has_Items
											FROM AudioDatas, Items, BinaryDatas, Categories_has_Items
											WHERE Items.ItemID = ?
											AND AudioDatas.ItemID = Items.ItemID
											AND Items.ItemPicturesID = BinaryDatas.ItemPicturesID
											AND Items.ItemID = Categories_has_Items.ItemID' );
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
											FROM Items,
											WHERE Items.ItemID = ?' );
		$stmt->setString( 1, $id );
		$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
		$rs->next();
		
		/* check if item exists */
		if( $rs->get(1) >= 1 )
			$returnValue = true;

		return $returnValue;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_audios */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>