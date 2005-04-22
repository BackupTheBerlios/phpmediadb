<?php
/**
 * $Id: class.phpmediadb_presentation.php,v 1.10 2005/04/22 21:55:18 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_presentation.php
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
 * @version     $Revision: 1.10 $
 */

/**
 * This class contains all subclasses of the TIER.PRESENTATION and the configuration
 * for the whole TIER.PRESENTATION.
 * The subclasses can be accessed through the public references.
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