<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_agerestrictions.php,v 1.6 2005/03/31 16:27:02 mblaschke Exp $ */

/**
 * This is the class that manages all functions of the agerestrictions
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.6 $
 * @package		phpmediadb
 * @subpackage	business
 */
class phpmediadb_business_agerestrictions
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
		$returnValue = $this->DATA->AGERESTRICTIONS->get( $id );
		
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
		$returnValue = $this->DATA->AGERESTRICTIONS->getList();
		
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
		$returnValue = $this->DATA->AGERESTRICTIONS->create( $data );
		
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
		$returnValue = $this->DATA->AGERESTRICTIONS->modify( $id, $data );
		
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
		$returnValue = $this->DATA->AGERESTRICTIONS->modify( $id );
		
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
		$returnValue = $this->BUSINESS->INSPECTOR->check( PHPMEDIADB_ITEMINFO_AGERESTRICTION, $data );
		
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
		/* init */
		$returnValue = false;
		
		/* translate database data */
		foreach( $data as $key => $value )
			$returnValue[$key]['mediaagerestriction'] = $this->PHPMEDIADB->PRESENTATION->I18N->translate( $data[$key]['mediaagerestriction'] );
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_agerestrictions */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>