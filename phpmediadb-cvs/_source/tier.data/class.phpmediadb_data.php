<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data.php,v 1.6 2005/03/02 15:36:28 bruf Exp $ */

class phpmediadb_data
{
	// --- ATTRIBUTES ---

	/**
	 * Reference to class phpmediadb
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	public $PHPMEDIADB = null;

	/**
	 * Container of configuration for the whole tier
	 *
	 * @access public
	 * @var configuration
	 */
	public $configuration = null;
	
	// --- OPERATIONS ---

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
		$this->AGERESTRICTIONS	= new phpmediadb_data_agerestrictions( $this );
		$this->AUDIOS			= new phpmediadb_data_audios( $this );
		$this->CATEGORIES		= new phpmediadb_data_categories( $this );
		$this->CODECS			= new phpmediadb_data_codecs( $this );
		$this->FORMATS			= new phpmediadb_data_formats( $this );
		$this->PRINTS			= new phpmediadb_data_prints( $this );
		$this->SQL				= new phpmediadb_data_sql( $this );
		$this->STATUS			= new phpmediadb_data_status( $this );
		$this->VIDEOS			= new phpmediadb_data_videos( $this );
	}

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
		@$this->configuration = $phpMediaDbConfig['DATA'];
		
		/* unset global configuration -> security */
		unset( $phpMediaDbConfig['DATA'] );
	}
	
} /* end of class phpmediadb_data */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>