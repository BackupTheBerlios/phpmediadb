<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business.php,v 1.4 2005/02/09 20:26:39 mblaschke Exp $ */

class phpmediadb_business
{
	// --- ATTRIBUTES ---

	/**
	 * Configurationcontainer of this tier
	 *
	 * @access public
	 * @var configuration
	 */
	public $configuration = null;
	
	// --- OPERATIONS ---

	public function __construct( $sender )
	{
		global $phpMediaDbConfig;
		
		/* init configuration */
		$this->configuration = array();
		$this->configuration = $phpMediaDbConfig['BUSINESS'];
		unset( $phpMediaDbConfig['BUSINESS'] );
	}

} /* end of class phpmediadb_business */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>