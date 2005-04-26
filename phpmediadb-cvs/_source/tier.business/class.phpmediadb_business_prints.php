<?php
/**
 * $Id: class.phpmediadb_business_prints.php,v 1.10 2005/04/26 21:24:42 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_business_prints.php
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
 * @subpackage	business
 * @version     $Revision: 1.10 $
 */

/**
 * This is the class that manages all functions of the prints
 */
class phpmediadb_business_prints
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
	 * Reference to class phpmediadb_business
	 *
	 * @access protected
	 * @see phpmediadb_business
	 * @var phpmediadb_business
	 */
	protected $BUSINESS = null;
	
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
	 * @param phpmediadb_business $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* init */
    	 
		/* assign parent */
		$this->BUSINESS		= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
		$this->DATA			= $sender->PHPMEDIADB->DATA;
	}

//-----------------------------------------------------------------------------
	/**
	 * Creates an empty dataset
	 *
	 * @access public
	 * @return Array Empty dataset
	 */
	 public function createEmpty()
	 {
		/* init */
		$returnValue = array();
	 	
		/* create empty itemset */
		$returnValue['ItemTitle'] 				= '';
		$returnValue['ItemOriginalTitle']		= '';
		$returnValue['ItemMediaName']			= '';
		$returnValue['ItemIdentification']		= '';
		$returnValue['ItemRelease']				= '';
		$returnValue['Categories']				= array();
		$returnValue['ItemMediaSize']			= '';
		$returnValue['MediaFormatID']			= '';
		$returnValue['BinaryData']				= '';
		$returnValue['PublisherName']			= '';
		$returnValue['MediaAgeRestrictionID']	= '';
		$returnValue['MediaCodecID']			= '';
		$returnValue['ItemQuantity']			= '';
		$returnValue['ItemPublisher']			= '';
		$returnValue['ItemCreationDate']		= NULL;
		$returnValue['ItemModificationDate']	= NULL;
			
		/* return data */
		return $returnValue;
	 }

//-----------------------------------------------------------------------------
	/**
	 * Returns one item from the batabase
	 *
	 * @access public
	 * @param integer $id ID of item
	 * @return array Array with itemdata
	 */
	public function get( $id )
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$returnValue = $this->DATA->PRINTS->get( $id );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Returns the complete list of items from the database
	 *
	 * @access public
	 * @return array list of items
	 */
	public function getList()
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$returnValue = $this->DATA->PRINTS->getList();
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Adds one item into the database
	 *
	 * @access public
	 * @param array $data Data of the item
	 * @return mixed Last inserted it as integer or false if operation failed
	 */
	public function create( $data )
	{
		/* init */
		$returnValue = false;
		
		/* create itemdata */
		$itemId = $this->DATA->PRINTS->create( $data );
		
		/* link item with categories */
		if( array_key_exists( 'categories', $data ) && is_array( $data['categories'] ) )
		{
			foreach( $data['categories'] as $categoryId )
				$this->BUSINESS->CATEGORIES->addLink( $itemId, $categoryId );
		}

		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Modifies one item
	 *
	 * @access public
	 * @param integer $id ID of item
	 * @param array $data Data of the item
	 * @return bool successstatus (true/false)
	 */
	public function modify( $id, $data )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->PRINTS->modify( $id, $data );
		
		/* delete categorylinks */
		$this->BUSINESS->CATEGORIES->removeAllLinks( $id );
		
		/* reassign new categories */
		if( array_key_exists( 'categories', $data ) && is_array( $data['categories'] ) )
		{
			foreach( $data['categories'] as $categoryId )
				$this->BUSINESS->CATEGORIES->addLink( $id, $categoryId );
		}

		
		/* return data */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	/**
	 * Removes one item from the database
	 *
	 * @access public
	 * @param integer $data Data of the item
	 * @return bool successstatus (true/false)
	 */
	public function check( $data )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->BUSINESS->INSPECTOR->check( PHPMEDIADB_ITEM_PRINT, $data );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_prints */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>