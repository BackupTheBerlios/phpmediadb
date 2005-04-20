<?php
/**
 * $Id: class.phpmediadb_data_videos.php,v 1.16 2005/04/20 21:45:59 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_data_videos.php
 * License:     GNU General Publice License
 *
 * This file is part of phpMediaDB.
 *
 * phpMediaDB is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * phpMediaDB mailing list. See phpMediaDB projectportal for more
 * information.
 *
 * @link        http://phpmediadb.berlios.de/
 * @copyright   2004-2005 &copy; Blaschke, Markus; Ruf, Boris
 * @license     http://opensource.org/licenses/gpl-license.php GNU General Public License
 * @author      Markus Blaschke <mblaschke@users.berlios.de>
 * @author      Boris Ruf <bruf@users.berlios.de>
 * @package		phpmediadb
 * @subpackage	data
 * @version     $Revision: 1.16 $
 */

/**
 * This is the class that manages all database activities for the videos
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.16 $
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
			$stmt = $conn->prepareStatement(	'SELECT Items.*, ItemTypes.*, MediaCodecs.*, MediaFormats.*, MediaAgeRestrictions.*
													FROM Items
													LEFT JOIN ItemTypes ON ItemTypes.ItemTypeID=Items.ItemTypeID
													LEFT JOIN MediaCodecs ON MediaCodecs.MediaCodecID=Items.MediaCodecID
													LEFT JOIN MediaFormats ON MediaFormats.MediaFormatID=Items.MediaFormatID
													LEFT JOIN MediaAgeRestrictions ON MediaAgeRestrictions.MediaAgeRestrictionID=Items.MediaAgeRestrictionID
													WHERE Items.ItemTypeID = ?' );
			$stmt->setString( 1, PHPMEDIADB_ITEM_VIDEO );
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
			$stmt->setString( 10, PHPMEDIADB_ITEM_VIDEO );
			$stmt->setString( 11, $data['itempublisher'] );
			$stmt->setString( 12, $data['mediacodecid'] );
			$stmt->setString( 13, $data['mediaformatid'] );
			$stmt->setString( 14, $data['mediaagerestrictionid'] );
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