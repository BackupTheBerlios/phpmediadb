<?php
/**
 * $Id: class.phpmediadb_presentation_session.php,v 1.7 2005/04/20 21:46:16 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_presentation_session.php
 * License:     GNU General Publice License
 *
 * This file is part of phpMediaDB.
 *
 * phpMediaDB is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * phpMediaDB mailing list. See phpMediaDB projectportal for more
 * information.
 *
 * @link        http://phpmediadb.berlios.de/
 * @copyright   2004-2005 &copy; Blaschke, Markus; Ruf, Boris
 * @license     http://opensource.org/licenses/gpl-license.php GNU General Public License
 * @author      Markus Blaschke <mblaschke@users.berlios.de>
 * @author      Boris Ruf <bruf@users.berlios.de>
 * @package		phpmediadb
 * @subpackage	presentation
 * @version     $Revision: 1.7 $
 */

/**
 * This is the class that manages the session-access
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.7 $
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