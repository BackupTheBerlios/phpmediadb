<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_xmlservice.php,v 1.5 2005/03/24 17:12:36 mblaschke Exp $ */
/**
 * This is the class that manages all xml-serivces
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.5 $
 * @package		phpmediadb
 * @subpackage	presentation
 */
class phpmediadb_presentation_xmlservice
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

//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @param phpmediadb_presentation $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_presentation_xmlservice */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>