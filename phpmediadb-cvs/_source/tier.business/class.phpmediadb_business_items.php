<?php
/**
 * $Id: class.phpmediadb_business_items.php,v 1.5 2005/04/22 21:54:45 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_business_items.php
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
 * @version     $Revision: 1.5 $
 */

/**
 * This is the class that manages all database activities for the items
 */
class phpmediadb_business_items
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
	 * Reference to class phpmediadb_business
	 *
	 * @access protected
	 * @see phpmediadb_business
	 * @var phpmediadb_business
	 */
	protected $BUSINESS = null;
	
	/**
	 * Reference to class phpmediadb_data
	 *
	 * @access protected
	 * @see phpmediadb_data
	 * @var phpmediadb_data
	 */
	protected $DATA = null;
	
	// --- OPERATIONS ---
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @param phpmediadb_business $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* init */
    	 
		/* assign parent */
		$this->BUSINESS		= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
		$this->DATA			= $sender->PHPMEDIADB->DATA;
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
	 * This function returns a specified record from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return array returns the results of database query
	 */
	public function get( $id )
	{
		/* init */
		$returnValue = NULL;
		
		/* get item */
		$returnValue = $this->DATA->ITEMS->get( $id );
		
		/* only first item */
		$returnValue = $returnValue[0];
		
		/* get categories */
		$categories = $this->BUSINESS->CATEGORIES->getLinkList( $returnValue['itemid'] ); 
		
		/* assign category-ids */
		if( is_array( $categories ) )
		{
			foreach( $categories as $value )
			{
				$returnValue['categories'][]	= $value['categoryid'];
				$specialValue['categoryid']		= $value['categoryid'];
				$specialValue['categoryname']	= $value['categoryname'];
				
				$returnValue['__special']['categories'][] = $specialValue;
			}
		}
		
		/* translate categoryByNames */
		$returnValue['__special']['categories'] = $this->BUSINESS->CATEGORIES->translate( $returnValue['__special']['categories'] );

			
		/* return value */
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @param integer $itemType Type of item
	 * @return array returns the results of database query
	 */
	public function getList( $itemType )
	{
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->getList( $itemType );
		
		/* return value */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
/**
	 * This function creates a new record in the table AudioDatas
	 * and all required data in the other tables
	 *
	 * @access public
	 * @param array $data contains all required data for the sql statement
	 * @param integer $itemType Type of item
	 * @return Integer returns id from the last created record
	 */
	public function create( $data, $itemType )
	{
		/* init */
		$returnValue = NULL;

		/* delegate */
		$returnValue = $this->DATA->ITEMS->create( $data, $itemType );
		
		/* return value */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table AudioDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @param array $data contains all required data for the sql statement
	 * @return bool Status of transaction
	 */
	public function modify( $id, $data )
	{
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->modify( $id, $data );
		
		/* return value */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table AudioDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return bool Status of transaction
	 */
	public function delete( $id )
	{
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->delete( $id );
		
		/* return value */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @param Integer $itemId contains specified id for the sql statement
	 * @return Bool returns whether the specified record exists
	 */
	public function exists( $itemId )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->exists( $itemId );
		
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the ItemType from a specified ItemID
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return integer returns the results of database query
	 */
	public function getItemType( $id )
	{
		/* init */
		$returnValue = false;
		
		/* delegate */
		$returnValue = $this->DATA->ITEMS->getItemType( $id );
		
		return $returnValue;
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_items */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>