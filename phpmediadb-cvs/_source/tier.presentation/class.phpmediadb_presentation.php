<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation.php,v 1.3 2005/02/09 16:20:45 mblaschke Exp $ */

class phpmediadb_presentation
{
	// --- ATTRIBUTES ---

	/**
	 * Short description of attribute PHPMEDIADB
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	public $PHPMEDIADB = null;

	/**
	 * Short description of attribute SESSION
	 *
	 * @access public
	 * @see phpmediadb_presentation_session
	 * @var phpmediadb_presentation_session
	 */
	public $SESSION = null;

	/**
	 * Short description of attribute I18N
	 *
	 * @access public
	 * @see phpmediadb_presentation_i18n
	 * @var phpmediadb_presentation_i18n
	 */
	public $I18N = null;

	/**
	 * Short description of attribute CONTENTVARS
	 *
	 * @access public
	 * @see phpmediadb_presentation_contentvars
	 * @var phpmediadb_presentation_contentvars
	 */
	public $CONTENTVARS = null;

	/**
	 * Short description of attribute HTMLSERVICE
	 *
	 * @access public
	 * @see phpmediadb_presentation_htmlservice
	 * @var phpmediadb_presentation_htmlservice
	 */
	public $HTMLSERVICE = null;

	/**
	 * Short description of attribute XMLSERVICE
	 *
	 * @access public
	 * @see phpmediadb_presentation_xmlservice
	 * @var phpmediadb_presentation_xmlservice
	 */
	public $XMLSERVICE = null;

	/**
	 * Configurationcontainer of this tier
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
	 * @return void
	 */
	public function __construct( $sender )
	{
		/* init */
		$this->configuration = array();
    	 
		/* assign parent */
		$this->PHPMEDIADB		= $sender;

		/* assign childs */
		$this->CONTENTVARS	= new phpmediadb_presentation_contentvars( $this );
		$this->HTMLSERVICE	= new phpmediadb_presentation_htmlservice( $this );
		$this->I18N					= new phpmediadb_presentation_i18n( $this );
		$this->SESSION			= new phpmediadb_presentation_session( $this );
		$this->XMLSERVICE		= new phpmediadb_presentation_xmlservice( $this );
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

} /* end of class phpmediadb_presentation */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>