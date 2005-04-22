<?php
/**
 * $Id: class.phpmediadb_data_categories.php,v 1.14 2005/04/22 21:54:59 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_data_categories.php
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
 * This is the class that manages all database activities for the categories
 */
class phpmediadb_data_categories
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
	 * @param phpmediadb_data $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->DATA			= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
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
	 * This function returns a specified record from the table Categories
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return array returns the results of database query
	 */
	public function get( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM Categories
												WHERE Categories.CategoryID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $ex )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table Categories
	 *
	 * @access public
	 * @return array returns the results of database query
	 */
	public function getList()
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM Categories' );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $ex )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table Categories for a specified ItemType
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return array returns the results of database query
	 */
	public function getListByItemType( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT *
												FROM Categories
												WHERE ItemTypeID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $ex )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
		}
	}
//-----------------------------------------------------------------------------
	/**
	 * This function creates a new record in the table Categories
	 *
	 * @access public
	 * @param array $data contains all required data for the sql statement
	 * @return Integer returns id from the last created record
	 */
	public function create( $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'INSERT INTO Categories
												( ItemTypeID, CategoryName ) VALUES( ?, ? )' );
			$stmt->setString( 1, $data['itemtypeid'] );
			$stmt->setString( 2, $data['categoryname'] );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
			return $this->DATA->SQL->getLastInsert( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table Categories
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @param array $data contains all required data for the sql statement
	 */
	public function modify( $id, $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'UPDATE Categories
												SET Categories.CategoryName = ?
												WHERE Categories.CategoryID = ?' );
			$stmt->setString( 1, $data['categoryname'] );
			$stmt->setString( 2, $id );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table Categories
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 */
	public function delete( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'DELETE FROM Categories
												WHERE Categories.CategoryID = ?' );
			$stmt->setString( 1, $id );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return bool returns whether the specified record exists
	 */
	public function exist( $id )
	{
		/* init */
		$returnValue = false;
		
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT COUNT(*)
												FROM Categories
												WHERE Categories.CategoryID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
			$rs->next();
		
			/* check if item exists */
			if( $rs->get(1) >= 1 )
				$returnValue = true;
			
			return $returnValue;
		}
		catch( Exception $ex )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function inserts the parameters ItemID and CategoryID
	 * into the table Categories_has_Items
	 *
	 * @access public
	 * @param integer $itemId ID of the item
	 * @param integer $categoryId ID of the category
	 */
	public function addLink( $itemId, $categoryId )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO Categories_has_Items
												( ItemID, CategoryID ) VALUES( ?, ? )' );
			$stmt->setString( 1, $itemId );
			$stmt->setString( 2, $categoryId );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes the parameters ItemID and CategoryID
	 * from the table Categories_has_Items
	 *
	 * @access public
	 * @param Integer $itemId contains specified id for the sql statement
	 */
	public function removeAllLinks( $itemId )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'DELETE FROM Categories_has_Items
												WHERE Categories_has_Items.ItemID = ?' );
			$stmt->setString( 1, $itemId );
			$stmt->executeUpdate();
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the list of  the parameters ItemID and CategoryID
	 * from the table Categories_has_Items
	 *
	 * @access public
	 * @param Integer $itemId contains specified id for the sql statement
	 */
	public function getLinkList( $itemId )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT Categories_has_Items.*, Categories.* FROM Categories_has_Items
													LEFT JOIN Categories ON Categories.CategoryID=Categories_has_Items.CategoryID
													WHERE Categories_has_Items.ItemID = ?' );
			$stmt->setString( 1, $itemId );
			$rs = $stmt->executeQuery();
			
			return $this->DATA->SQL->generateDataArray( $rs );
		}
		catch( Exception $exception )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}
	

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_categories */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>