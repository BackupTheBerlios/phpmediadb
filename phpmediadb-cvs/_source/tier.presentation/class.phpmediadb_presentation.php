<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation.php,v 1.8 2005/03/24 17:12:36 mblaschke Exp $ */

/**
 * This class contains all subclasses of the TIER.PRESENTATION and the configuration
 * for the whole TIER.PRESENTATION.
 * The subclasses can be accessed through the public references.
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.8 $
 * @package		phpmediadb
 * @subpackage	presentation
 */
class phpmediadb_presentation
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
	 * Reference to class phpmediadb_presentation_session
	 *
	 * @access public
	 * @see phpmediadb_presentation_session
	 * @var phpmediadb_presentation_session
	 */
	public $SESSION = null;

	/**
	 * Reference to class phpmediadb_presentation_i18n
	 *
	 * @access public
	 * @see phpmediadb_presentation_i18n
	 * @var phpmediadb_presentation_i18n
	 */
	public $I18N = null;

	/**
	 * Reference to class phpmediadb_presentation_contentvars
	 *
	 * @access public
	 * @see phpmediadb_presentation_contentvars
	 * @var phpmediadb_presentation_contentvars
	 */
	public $CONTENTVARS = null;

	/**
	 * Reference to class phpmediadb_presentation_htmlservice
	 *
	 * @access public
	 * @see phpmediadb_presentation_htmlservice
	 * @var phpmediadb_presentation_htmlservice
	 */
	public $HTMLSERVICE = null;

	/**
	 * Reference to class phpmediadb_presentation_xmlservice
	 *
	 * @access public
	 * @see phpmediadb_presentation_xmlservice
	 * @var phpmediadb_presentation_xmlservice
	 */
	public $XMLSERVICE = null;

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
	 * @param phpmediadb $sender Refernce to parentclass
	 */
	public function __construct( $sender )
	{
		/* init */

		/* load configuration */
		$this->loadConfiguration();
    	 
		/* assign parent */
		$this->PHPMEDIADB	= $sender;

		/* assign childs */
		$this->CONTENTVARS	= new phpmediadb_presentation_contentvars( $this );
		$this->HTMLSERVICE	= new phpmediadb_presentation_htmlservice( $this );
		$this->I18N			= new phpmediadb_presentation_i18n( $this );
		$this->SESSION		= new phpmediadb_presentation_session( $this );
		$this->XMLSERVICE	= new phpmediadb_presentation_xmlservice( $this );
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
	 * Loads the configuration from the global array and resets the array
	 *
	 * @access public
	 * @return void
	 */
	private function loadConfiguration()
	{
		/* init */
		global $phpMediaDbConfig;
		$this->configuration = array();
				
		/* get and set config */
		@$this->configuration = $phpMediaDbConfig['PRESENTATION'];
		
		/* unset global configuration -> security */
		unset( $phpMediaDbConfig['PRESENTATION'] );
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_presentation */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>