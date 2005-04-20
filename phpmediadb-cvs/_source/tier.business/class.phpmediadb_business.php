<?php
/**
 * $Id: class.phpmediadb_business.php,v 1.13 2005/04/20 21:45:25 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_business.php
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
 * @subpackage	business
 * @version     $Revision: 1.13 $
 */

/**
 * This class contains all subclasses of the TIER.BUSINESS and the configuration
 * for the whole TIER.BUSINESS.
 * The subclasses can be accessed through the public references.
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.13 $
 * @package		phpmediadb
 * @subpackage	business
 */
class phpmediadb_business
{
	// --- ATTRIBUTES ---

	/**
	 * Reference to class phpmediadb
	 *
	 * @access public
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	public $PHPMEDIADB = null;
	
	/**
	 * Reference to class phpmediadb_business_agerestrictions
	 *
	 * @access public
	 * @see phpmediadb_business_agerestrictions
	 * @var phpmediadb_business_agerestrictions
	 */	
	public $AGERESTRICTIONS = null;

	/**
	 * Reference to class phpmediadb_business_audios
	 *
	 * @access public
	 * @see phpmediadb_business_audios
	 * @var phpmediadb_business_audios
	 */	
	public $AUDIOS = null;
	
	/**
	 * Reference to class phpmediadb_busness_binarydatas
	 *
	 * @access public
	 * @see phpmediadb_busness_binarydatas
	 * @var phpmediadb_busness_binarydatas
	 */
	public $BINARYDATAS = null;
	
	/**
	 * Reference to class phpmediadb_business_categories
	 *
	 * @access public
	 * @see phpmediadb_business_categories
	 * @var phpmediadb_business_categories
	 */	
	public $CATEGORIES = null;
	
	/**
	 * Reference to class phpmediadb_business_codecs
	 *
	 * @access public
	 * @see phpmediadb_business_codecs
	 * @var phpmediadb_business_codecs
	 */	
	public $CODECS = null;
	
	/**
	 * Reference to class phpmediadb_business_formats
	 *
	 * @access public
	 * @see phpmediadb_business_formats
	 * @var phpmediadb_business_formats
	 */	
	public $FORMATS = null;
	
	/**
	 * Reference to class phpmediadb_business_items
	 *
	 * @access public
	 * @see phpmediadb_business_items
	 * @var phpmediadb_business_items
	 */
	public $ITEMS = null;
	
	/**
	 * Reference to class phpmediadb_business_inspector
	 *
	 * @access public
	 * @see phpmediadb_business_inspector
	 * @var phpmediadb_business_inspector
	 */	
	public $INSPECTOR = null;
	
	/**
	 * Reference to class phpmediadb_business_prints
	 *
	 * @access public
	 * @see phpmediadb_business_prints
	 * @var phpmediadb_business_prints
	 */	
	public $PRINTS = null;
	
	/**
	 * Reference to class phpmediadb_business_videos
	 *
	 * @access public
	 * @see phpmediadb_business_videos
	 * @var phpmediadb_business_videos
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* init */

		/* load configuration */
		$this->loadConfiguration();
    	 
		/* assign parent */
		$this->PHPMEDIADB		= $sender;
		
		/* assign childs */
		$this->AGERESTRICTIONS	= new phpmediadb_business_agerestrictions( $this );
		$this->AUDIOS			= new phpmediadb_business_audios( $this );
		$this->BINARYDATAS		= new phpmediadb_business_binarydatas( $this );
		$this->CATEGORIES		= new phpmediadb_business_categories( $this );
		$this->CODECS			= new phpmediadb_business_codecs( $this );
		$this->FORMATS			= new phpmediadb_business_formats( $this );
		$this->ITEMS			= new phpmediadb_business_items( $this );
		$this->INSPECTOR		= new phpmediadb_business_inspector( $this );
		$this->PRINTS			= new phpmediadb_business_prints( $this );
		$this->VIDEOS			= new phpmediadb_business_videos( $this );
	}

//-----------------------------------------------------------------------------
	/**
	 * Loads the configuration from the global array and resets the array
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 */
	private function loadConfiguration()
	{
		/* init */
		global $phpMediaDbConfig;
		$this->configuration = array();
				
		/* get and set config */
		@$this->configuration = $phpMediaDbConfig['BUSINESS'];
		
		/* unset global configuration -> security */
		unset( $phpMediaDbConfig['BUSINESS'] );
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>