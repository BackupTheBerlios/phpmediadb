<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_htmlservice.php,v 1.3 2005/02/27 16:05:10 mblaschke Exp $ */

class phpmediadb_presentation_htmlservice
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
	 * Reference to class phpmediadb_presentation
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	protected $PRESENTATION = null;

	/**
	 * Reference to template engine
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	private $templateEngine = null;

	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb_presentation
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB		= $sender->PHPMEDIADB;
		
		/* create smarty object */
		$this->templateEngine = new Smarty();
	}

//-----------------------------------------------------------------------------
	public function compileTemplate( $template )
	{
		/* init */
		$returnValue = null;
		
		/* set up template engine */
		initTemplateEngine();

		/* return compiled template */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	protected function initTemplateEngine()
	{
		
	}
} /* end of class phpmediadb_presentation_htmlservice */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>