<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business.php,v 1.3 2005/02/09 16:20:44 mblaschke Exp $ */

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
		/* init */
		$this->configuration = array();
	}

} /* end of class phpmediadb_business */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>