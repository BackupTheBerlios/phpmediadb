<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data.php,v 1.4 2005/02/09 20:26:39 mblaschke Exp $ */

class phpmediadb_data
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
		$this->configuration = $phpMediaDbConfig['DATA'];
		unset( $phpMediaDbConfig['DATA'] );
	}


} /* end of class phpmediadb_data */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>