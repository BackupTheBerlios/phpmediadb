<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb.php,v 1.6 2005/03/27 00:40:27 mblaschke Exp $ */

/**
 * This is the class that manages the whole tiers.
 *
 * All tiers can be accessed via the refereces eg. PRESENTATION.
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.6 $
 * @package		phpmediadb
 * @subpackage	global
 */
class phpmediadb
{
	// --- ATTRIBUTES ---

	/**
	 * Container for phpmediadb_presentation class
	 *
	 * @access public
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	public $PRESENTATION = null;

	/**
	 * Container for phpmediadb_business class
	 *
	 * @access public
	 * @see phpmediadb_business
	 * @var phpmediadb_presentation_session
	 */
	public $BUSINESS = null;

	/**
	 * Container for phpmediadb_data class
	 *
	 * @access public
	 * @see phpmediadb_data
	 * @var phpmediadb_data
	 */
	public $DATA = null;


	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		global $phpMediaDbConfig;
		
		/* assign childs */
		$this->DATA			= new phpmediadb_data( $this );
		$this->BUSINESS		= new phpmediadb_business( $this );
		$this->PRESENTATION	= new phpmediadb_presentation( $this );
		
		/* unset global configuration - security */
		unset( $phpMediaDbConfig );
	}
	
//-----------------------------------------------------------------------------
	/**
	 * The destructor __destruct is responsible for closing all open files,
	 * etc.
	 *
	 * @access public
	 * @return void
	 */
	public function __destruct()
	{
		/* nothing to do yet */
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>