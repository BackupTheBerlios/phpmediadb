<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_agerestrictions.php,v 1.4 2005/03/13 13:24:49 bruf Exp $ */

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
	public function getAgeRestriction( $MediaAgeRestrictionID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaAgeRestrictions,
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = :marid' );
		$stmt->setString( ':marid', $MediaAgeRestrictionID );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getallAgeRestrictions()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaAgeRestrictions,
		WHERE MediaAgeRestrictions.MediaRestrictionID = :marid' );
		$stmt->setString( ':marid', '%' );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function creates a new record in the table MediaAgeRestrictions
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 */
	public function createAgeRestriction( $MediaAgeRestriction )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'INSERT INTO MediaAgeRestrictions
		( MediaAgeRestriction ) VALUES( :mar )' );
		$stmt->setString( ':mar', $MediaAgeRestriction );
		$stmt->executeUpdate();
		
		return $stmt;
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
	public function modifyAgeRestriction( $MediaAgeRestrictionID, $MediaAgeRestriction )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'UPDATE MediaAgeRestrictions
		SET MediaAgeRestrictions.MediaAgeRestriction = :mar
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = :marid' );
		$stmt->setString( ':mar', $MediaAgeRestriction );
		$stmt->setString( ':marid', $MediaAgeRestrictionID );
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
	public function deleteAgeRestriction( $MediaAgeRestrictionID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'DELETE FROM MediaAgeRestrictions
		WHERE MediaAgeRestrictions.MediaAgeRestrictionID = :marid' );
		$stmt->setString( ':marid', $MediaAgeRestrictionID );
		$stmt->executeUpdate();
		
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>