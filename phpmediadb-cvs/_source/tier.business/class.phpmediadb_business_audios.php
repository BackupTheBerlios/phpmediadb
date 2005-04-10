<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_audios.php,v 1.7 2005/04/10 01:34:45 mblaschke Exp $ */

/**
 * This is the class that manages all functions of the audios
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.7 $
 * @package		phpmediadb
 * @subpackage	business
 */
class phpmediadb_business_audios
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
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
		$returnValue = $this->DATA->AUDIOS->get( $id );
		
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
		$returnValue = $this->DATA->AUDIOS->getList();
		
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
		$itemId = $this->DATA->AUDIOS->create( $data );
		
		/* link item with categories */
		if( is_array( $data['Categories'] ) )
		{
			foreach( $data['Categories'] as $categoryId )
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
		$returnValue = $this->DATA->AUDIOS->modify( $id, $data );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Removes one item from the database
	 *
	 * @access public
	 * @param integer $id ID of item
	 * @return bool successstatus (true/false)
	 */
	public function remove( $id )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->AUDIOS->modify( $id );
		
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
		$returnValue = $this->BUSINESS->INSPECTOR->check( PHPMEDIADB_ITEM_AUDIO, $data );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_audios */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>