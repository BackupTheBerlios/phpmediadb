<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business.php,v 1.6 2005/03/15 18:06:52 mblaschke Exp $ */

class phpmediadb_business
{
	// --- ATTRIBUTES ---

	/**
	 * Reference to class phpmediadb
	 *
	 * @access public
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	public $PHPMEDIADB = null;
	
	public $AGERESTRICTIONS = null;
	public $AUDIOS = null;
	public $CATEGORIES = null;
	public $CODECS = null;
	public $FORMATS = null;
	public $INSPECTOR = null;
	public $PRINTS = null;
	public $VIDEOS = null;

	/**
	 * Container of configuration for the whole tier
	 *
	 * @access public
	 * @var configuration
	 */
	public $configuration = null;
	
	// --- OPERATIONS ---

//-----------------------------------------------------------------------------	
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb
	 */
	public function __construct( $sender )
	{
		/* init */

		/* load configuration */
		$this->loadConfiguration();
    	 
		/* assign parent */
		$this->PHPMEDIADB		= $sender;
		
		/* assign childs */
		$this->AGERESTRICTIONS	= new phpmediadb_business_agerestrictions( $this );
		$this->AUDIOS						= new phpmediadb_business_audios( $this );
		$this->CATEGORIES				= new phpmediadb_business_categories( $this );
		$this->CODECS						= new phpmediadb_business_codecs( $this );
		$this->FORMATS					= new phpmediadb_business_formats( $this );
		$this->INSPECTOR				= new phpmediadb_business_inspector( $this );
		$this->PRINTS						= new phpmediadb_business_prints( $this );
		$this->VIDEOS						= new phpmediadb_business_prints( $this );
	}

//-----------------------------------------------------------------------------
	/**
	 * Loads the configuration from the global array and resets the array
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb
	 * @return void
	 */
	private function loadConfiguration()
	{
		/* init */
		global $phpMediaDbConfig;
		$this->configuration = array();
				
		/* get and set config */
		@$this->configuration = $phpMediaDbConfig['BUSINESS'];
		
		/* unset global configuration -> security */
		unset( $phpMediaDbConfig['BUSINESS'] );
	}
	
} /* end of class phpmediadb_business */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>