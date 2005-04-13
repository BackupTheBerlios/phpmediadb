<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_items.php,v 1.1 2005/04/13 11:49:51 bruf Exp $ */

/**
 * This is the class that manages all database activities for the items
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.1 $
 * @package		phpmediadb
 * @subpackage	business
 */
class phpmediadb_business_items
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
		/* init */
		$returnValue = NULL;
		
		/* get item */
		$returnValue = $this->DATA->ITEMS->get( $id );
		
		/* only first item */
		$returnValue = $returnValue[0];
		
		/* get categories */
		$categories = $this->BUSINESS->CATEGORIES->getLinkList( $returnValue['itemid'] ); 
		
		/* assign category-ids */
		if( is_array( $categories ) )
		{
			foreach( $categories as $key => $value )
				$returnValue['categories'][] = $value['categoryid'];
		}

			
		/* return value */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @param integer $itemType Type of item
	 * @return array returns the results of database query
	 */
	public function getList( $itemType )
	{
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->getList( $itemType );
		
		/* return value */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
/**
	 * This function creates a new record in the table AudioDatas
	 * and all required data in the other tables
	 *
	 * @access public
	 * @param array $data contains all required data for the sql statement
	 * @param integer $itemType Type of item
	 * @return Integer returns id from the last created record
	 */
	public function create( $data, $itemType )
	{
		/* init */
		$returnValue = NULL;

		/* delegate */
		$returnValue = $this->DATA->ITEMS->create( $data, $itemType );
		
		/* return value */
		return $returnValue;
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
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->modify( $id, $data );
		
		/* return value */
		return $returnValue;
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
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->delete( $id );
		
		/* return value */
		return $returnValue;
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
	public function exists( $itemId )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->exists( $itemId );
		
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the ItemType from a specified ItemID
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return integer returns the results of database query
	 */
	public function getItemType( $id )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->getItemType( $id );
		
		return $returnValue;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_items */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>