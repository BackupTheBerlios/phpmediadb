<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_session.php,v 1.6 2005/03/24 17:12:36 mblaschke Exp $ */

/**
 * This is the class that manages the session-access
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.6 $
 * @package		phpmediadb
 * @subpackage	presentation
 */
class phpmediadb_presentation_session
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
		$this->PHPMEDIADB		= $sender->PHPMEDIADB;
		
		/* init session */
		$this->start();
	}
  
//-----------------------------------------------------------------------------
	/**
	 * Registers a variable in session object
	 *
	 * @access public
	 * @param String $id Specifies which id should used to store the value
	 * @param Mixed $regvar Value which should be stored
	 */
	public function register( $id, $regvar )
	{
		/* set value */
		$_SESSION[$id] = $regvar;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Removes a variable from session object
	 *
	 * @access public
	 * @param String $id Specifies which id should removed
	 */
	public function unregister( $id )
	{
		/* unregister variable */
		unset( $_SESSION[$id] );
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Returns a variable from session object
	 *
	 * @access public
	 * @param String $id Specifies which id should be returned
	 */
	public function get( $id )
	{
		/* return value */
		return $_SESSION[$id];
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Starts and initalized the session
	 *
	 * @access public
	 */
	public function start()
	{
		/* start session - delegate */
		session_start();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Destroys the session
	 *
	 * @access public
	 */	
	public function destroy()
	{
		/* destroy session - delegate */
		session_destroy();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Return and/or sets the global unique session id
	 *
	 * @access public
	 * @param String $newId New session id as string
	 * @return String Currently used or old session id
	 */	
	public function getUid( $newId = NULL )
	{
		/* return session_id */
		return session_id( $newId );
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_presentation_session */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>