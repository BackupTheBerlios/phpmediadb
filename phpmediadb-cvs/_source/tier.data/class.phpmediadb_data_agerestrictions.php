<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_agerestrictions.php,v 1.6 2005/03/15 17:44:52 bruf Exp $ */

class phpmediadb_data_agerestrictions
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
	 * This function returns a specified record from the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function get( $MediaAgeRestrictionID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT *
		FROM MediaAgeRestrictions,
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = ?' );
		$stmt->setString( 1, $MediaAgeRestrictionID );
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
		FROM MediaAgeRestrictions,
		WHERE MediaAgeRestrictions.MediaRestrictionID LIKE "%"' );
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
	public function create( $MediaAgeRestriction )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'INSERT INTO MediaAgeRestrictions
		( MediaAgeRestriction ) VALUES( ? )' );
		$stmt->setString( 1, $MediaAgeRestriction );
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
	public function modify( $MediaAgeRestrictionID, $MediaAgeRestriction )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'UPDATE MediaAgeRestrictions
		SET MediaAgeRestrictions.MediaAgeRestriction = ?
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = ?' );
		$stmt->setString( 1, $MediaAgeRestriction );
		$stmt->setString( 2, $MediaAgeRestrictionID );
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
	public function delete( $MediaAgeRestrictionID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'DELETE FROM MediaAgeRestrictions
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = ?' );
		$stmt->setString( 1, $MediaAgeRestrictionID );
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
	public function exist( $MediaAgeRestrictionID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->prepareStatement( 'SELECT COUNT(*)
		FROM MediaAgeRestrictions,
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = ?' );
		$stmt->setString( 1, $MediaAgeRestrictionID );
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