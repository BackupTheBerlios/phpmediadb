<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_formats.php,v 1.4 2005/03/11 12:14:09 bruf Exp $ */

class phpmediadb_data_formats
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
	 * This function returns a specified record from the table MediaFormats
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer
	 * @return String
	 */
	public function getFormat( $MediaFormatID )
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaFormats,
		WHERE MediaFormats.MediaFormatID = :mfid' );
		$stmt->setString( ':mfid', $MediaFormatID );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
	/**
	 * This function returns all records from the table MediaStatus
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	public function getallStatus()
	{
		$conn = $this->DATA->SQL->getConnection();
		$stmt = $conn->preparedStatement( 'SELECT *
		FROM MediaFormats,
		WHERE MediaFormats.MediaFormatID = :mfid' );
		$stmt->setString( ':mfid', '%' );
		$stmt->executeQuery();
		
		return $stmt;
	}

//-----------------------------------------------------------------------------
}
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>