<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_categories.php,v 1.9 2005/04/13 11:48:29 bruf Exp $ */

/**
 * This is the class that manages all functions of the categories
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.9 $
 * @package		phpmediadb
 * @subpackage	business
 */
class phpmediadb_business_categories
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
		$returnValue = $this->DATA->CATEGORIES->get( $id );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Returns the complete list of items from the database filtered by
	 * itemtype
	 *
	 * @access public
	 * @param integer $itemType Data of the item
	 * @return array list of items
	 */
	public function getListByItemType( $itemType )
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$returnValue = $this->DATA->CATEGORIES->getListByItemType( $itemType );
		
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
		$returnValue = $this->DATA->CATEGORIES->getList();
		
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
		
		/* delegate */
		$returnValue = $this->DATA->CATEGORIES->create( $data );
		
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
		$returnValue = $this->DATA->CATEGORIES->modify( $id, $data );
		
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
		$returnValue = $this->DATA->CATEGORIES->modify( $id );
		
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
		$returnValue = $this->BUSINESS->INSPECTOR->check( PHPMEDIADB_ITEMINFO_CATEGORIES, $data );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Translates the dataitems one item from the database
	 *
	 * @access public
	 * @param integer $data Data of the item (resultset)
	 * @return bool successstatus (true/false)
	 */
	public function translate( $data )
	{	

		/* translate database data */
		if( is_array( $data ) )
		{
			foreach( $data as $key => $value )
				$data[$key]['categoryname'] = $this->PHPMEDIADB->PRESENTATION->I18N->translate( $data[$key]['categoryname'] );
		}
		
		/* return data */
		return $data;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function links a item with a category
	 *
	 * @access public
	 * @param integer $itemId ID of the item
	 * @param integer $categoryId ID of the category
	 */
	public function addLink( $itemId, $categoryId )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->CATEGORIES->addLink( $itemId, $categoryId );
		
		/* return data */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function removes all links from an item
	 *
	 * @access public
	 * @param Integer $itemId ID of the item
	 */
	public function removeAllLinks( $itemId )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->CATEGORIES->removeAllLinks( $itemId );
		
		/* return data */
		return $returnValue;
	}
//-----------------------------------------------------------------------------
	/**
	 * This function returns the list of  the parameters ItemID and CategoryID
	 * from the table Categories_has_Items
	 *
	 * @access public
	 * @param Integer $itemId contains specified id for the sql statement
	 */
	public function getLinkList( $itemId )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->CATEGORIES->getLinkList( $itemId );
		
		/* return data */
		return $returnValue;		
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_categories */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>