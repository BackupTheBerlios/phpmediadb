<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_agerestrictions.php,v 1.3 2005/03/11 12:13:19 bruf Exp $ */

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
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>