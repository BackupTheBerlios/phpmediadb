<?php
/**
 * $Id: class.phpmediadb.php,v 1.7 2005/04/20 21:46:07 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb.php
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
 * @subpackage	global
 * @version     $Revision: 1.7 $
 */

/**
 * This is the class that manages the whole tiers.
 *
 * All tiers can be accessed via the refereces eg. PRESENTATION.
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.7 $
 * @package		phpmediadb
 * @subpackage	global
 */
class phpmediadb
{
	// --- ATTRIBUTES ---

	/**
	 * Container for phpmediadb_presentation class
	 *
	 * @access public
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	public $PRESENTATION = null;

	/**
	 * Container for phpmediadb_business class
	 *
	 * @access public
	 * @see phpmediadb_business
	 * @var phpmediadb_presentation_session
	 */
	public $BUSINESS = null;

	/**
	 * Container for phpmediadb_data class
	 *
	 * @access public
	 * @see phpmediadb_data
	 * @var phpmediadb_data
	 */
	public $DATA = null;


	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		global $phpMediaDbConfig;
		
		/* assign childs */
		$this->DATA			= new phpmediadb_data( $this );
		$this->BUSINESS		= new phpmediadb_business( $this );
		$this->PRESENTATION	= new phpmediadb_presentation( $this );
		
		/* unset global configuration - security */
		unset( $phpMediaDbConfig );
	}
	
//-----------------------------------------------------------------------------
	/**
	 * The destructor __destruct is responsible for closing all open files,
	 * etc.
	 *
	 * @access public
	 * @return void
	 */
	public function __destruct()
	{
		/* nothing to do yet */
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>