<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_categories.php,v 1.3 2005/03/15 17:45:32 bruf Exp $ */

class phpmediadb_data_categories
{
	// --- ATTRIBUTES ---

	/**
	 * Short description of attribute PHPMEDIADB
	 *
	 * @access protected
	 * @see phpmediadb
	 * @var phpmediadb
	 */
	protected $PHPMEDIADB = null;

	/**
	 * Short description of attribute DATA
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	protected $DATA = null;

	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb_data
	 */
	public function __construct()
	{
		/* nothing to do yet */
	}
  
//-----------------------------------------------------------------------------
	/**
	 * The destructor __destruct is responsible for closing all open files,
	 * etc.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function get( $CategoryID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
		FROM Categories,
		WHERE Categories.CategoryID = ?' );
		$stmt->setString( 1, $CategoryID );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getList()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
		FROM Categories,
		WHERE Categories.CategoryID LIKE "%"' );
		$rs = $stmt->executeQuery();
		
		return $rs;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new record in the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 */
	public function create( $CategoryName )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO Categories
		( CategoryName ) VALUES( ? )' );
		$stmt->setString( 1, $CategoryName );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function modifies a specified record from the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @param String
	 */
	public function modify( $CategoryID, $CategoryName )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'UPDATE Categories
		SET Categories.CategoryName = ?
		WHERE Categories.CategoryID = ?' );
		$stmt->setString( 1, $CategoryName );
		$stmt->setString( 2, $CategoryID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 */
	public function delete( $CategoryID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'DELETE FROM Categories
		WHERE Categories.CategoryID = ?' );
		$stmt->setString( 1, $CategoryID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns true when the record exists
	 * and false when the record doesn't exist
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return Boolean
	 */
	public function exist( $CategoryID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT COUNT(*)
		FROM Categories,
		WHERE Categories.CategoryID = ?' );
		$stmt->setString( 1, $CategoryID );
		$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
		$rs->next();
		if( $rs->get(1) >= 1 )
			{
			return true;
			}
		else
			{
			return false;
			}
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>