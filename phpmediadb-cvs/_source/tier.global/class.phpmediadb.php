<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb.php,v 1.3 2005/02/09 20:26:00 mblaschke Exp $ */

/**
 * Main class of the phpMediaDB Project. It contains all other classes in the
 * PRESENTATION, BUSINESS and DATA.
 *
 * @access public
 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
 * @package phpmediadb
 * @since 0.0.0
 * @subpackage global
 * @version 1.0.0
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

	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return void
	 */
	public function __construct()
	{
		global $phpMediaDbConfig;
		
		/* assign childs */
		$this->PRESENTATION		= new phpmediadb_presentation( $this );
		$this->BUSINESS				= new phpmediadb_business( $this );
		$this->DATA						= new phpmediadb_data( $this );
		
		/* unset global configuration - security */
		unset( $phpMediaDbConfig );
	}

	/**
	 * The destructor __destruct is responsible for closing all open files,
	 * etc.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return void
	 */
	public function __destruct()
	{
		/* TODO */
	}

} /* end of class phpmediadb */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>