<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_agerestrictions.php,v 1.4 2005/03/24 17:13:26 mblaschke Exp $ */

/**
 * This is the class that manages all functions of the agerestrictions
 *
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.4 $
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb $sender Reference to parent class
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
	 * Returns the complete list
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return array list of agerestrictions
	 */
	public function getList()
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$this->DATA->AGERESTRICTIONS->getList();
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_agerestrictions */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>