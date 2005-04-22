<?php
/**
 * $Id: class.phpmediadb_data.php,v 1.14 2005/04/22 21:54:59 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_data.php
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
 * @subpackage	data
 * @version     $Revision: 1.14 $
 */

/**
 * This class contains all subclasses of the TIER.DATA and the configuration
 * for the whole TIER.DATA.
 * The subclasses can be accessed through the public references.
 */
class phpmediadb_data
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
	 * Reference to class phpmediadb_data_agerestrictions
	 *
	 * @access public
	 * @see phpmediadb_data_agerestrictions
	 * @var phpmediadb_data_agerestrictions
	 */
	public $AGERESTRICTIONS = null;

	/**
	 * Reference to class phpmediadb_data_audios
	 *
	 * @access public
	 * @see phpmediadb_data_audios
	 * @var phpmediadb_data_audios
	 */
	public $AUDIOS = null;
	
	/**
	 * Reference to class phpmediadb_data_binarydatas
	 *
	 * @access public
	 * @see phpmediadb_data_audios
	 * @var phpmediadb_data_audios
	 */
	public $BINARYDATAS = null;
	
	/**
	 * Reference to class phpmediadb_data_categories
	 *
	 * @access public
	 * @see phpmediadb_data_categories
	 * @var phpmediadb_data_categories
	 */
	public $CATEGORIES = null;
	
	/**
	 * Reference to class phpmediadb_data_codecs
	 *
	 * @access public
	 * @see phpmediadb_data_codecs
	 * @var phpmediadb_data_codecs
	 */
	public $CODECS = null;
	
	/**
	 * Reference to class phpmediadb_data_formats
	 *
	 * @access public
	 * @see phpmediadb_data_formats
	 * @var phpmediadb_data_formats
	 */
	public $FORMATS = null;
	
	/**
	 * Reference to class phpmediadb_data_items
	 *
	 * @access public
	 * @see phpmediadb_data_items
	 * @var phpmediadb_data_items
	 */
	public $ITEMS = null;
	
	/**
	 * Reference to class phpmediadb_data_prints
	 *
	 * @access public
	 * @see phpmediadb_data_prints
	 * @var phpmediadb_data_prints
	 */
	public $PPRINTS = null;
	
	/**
	 * Reference to class phpmediadb_data_sql
	 *
	 * @access public
	 * @see phpmediadb_data_sql
	 * @var phpmediadb_data_sql
	 */
	public $SQL = null;
	
	/**
	 * Reference to class phpmediadb_data_status
	 *
	 * @access public
	 * @see phpmediadb_data_status
	 * @var phpmediadb_data_status
	 */
	public $STATUS = null;
	
	/**
	 * Reference to class phpmediadb_data_videos
	 *
	 * @access public
	 * @see phpmediadb_data_videos
	 * @var phpmediadb_data_videos
	 */
	public $VIDEOS = null;
	
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
	 * @param phpmediadb_data $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* init */

		/* load configuration */
		$this->loadConfiguration();
    	 
		/* assign parent */
		$this->PHPMEDIADB		= $sender;
		
		/* assign childs */
		$this->AGERESTRICTIONS	= new phpmediadb_data_agerestrictions( $this );
		$this->AUDIOS			= new phpmediadb_data_audios( $this );
		$this->BINARYDATAS		= new phpmediadb_data_binarydatas( $this );
		$this->CATEGORIES		= new phpmediadb_data_categories( $this );
		$this->CODECS			= new phpmediadb_data_codecs( $this );
		$this->FORMATS			= new phpmediadb_data_formats( $this );
		$this->ITEMS			= new phpmediadb_data_items( $this );
		$this->PRINTS			= new phpmediadb_data_prints( $this );
		$this->SQL				= new phpmediadb_data_sql( $this );
		$this->STATUS			= new phpmediadb_data_status( $this );
		$this->VIDEOS			= new phpmediadb_data_videos( $this );
	}

//-----------------------------------------------------------------------------
	/**
	 * Loads the configuration from the global array and resets the array
	 *
	 * @access private
	 */
	private function loadConfiguration()
	{
		/* init */
		global $phpMediaDbConfig;
		$this->configuration = array();
				
		/* get and set config */
		@$this->configuration = $phpMediaDbConfig['DATA'];
		
		/* unset global configuration -> security */
		unset( $phpMediaDbConfig['DATA'] );
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>