<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_binarydatas.php,v 1.2 2005/04/20 20:18:24 bruf Exp $ */

/**
 * This is the class that manages all database activities for the binarydatas
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.2 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_binarydatas
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
	 * This function returns a specified record from the table BinaryDatas
	 * and all required data from the other tables
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
			$stmt = $conn->prepareStatement(	'SELECT BinaryDatas.*
													FROM BinaryDatas
													WHERE BinaryDatas.ItemID = ?' );
			$stmt->setString( 1, $id );
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
	/**
	 * This function returns all records from the table BinaryDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @return array returns the results of database query
	 */
	public function getList()
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT BinaryDatas.*
													FROM BinaryDatas' );
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
/**
	 * This function creates a new record in the table BinaryDatas
	 * and all required data in the other tables
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
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'INSERT INTO BinaryDatas
												( ItemID, BinaryDataMimeType, BinaryDataSize )
												VALUES( ?, ?, ? )' );
			$stmt->setString( 1, $data['itemid'] );
			$stmt->setString( 1, $data['binarydatamimetype'] );
			$stmt->setString( 2, $data['binarydatasize'] );
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
	 * This function modifies a specified record from the table BinaryDatas
	 * and all required data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @param array $data contains all required data for the sql statement
	 * @return bool Status of transaction
	 */
	public function modify( $id, $data )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'Update BinaryDatas
													SET BinaryDatas.BinaryDataMimeType = ?,
													BinaryDatas.BinaryDataSize = ?
													WHERE BinaryDatas.ItemID = ?' );
			$stmt->setString( 1, $data['binarydatamimetype'] );
			$stmt->setString( 2, $data['binarydatasize'] );
			$stmt->setString( 12, $id );
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
		
		return true;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function deletes a specified record from the table BinaryDatas
	 * and all depending data from the other tables
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return bool Status of transaction
	 */
	public function delete( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$this->DATA->SQL->openTransaction( $conn );
			$stmt = $conn->prepareStatement(	'DELETE FROM BinaryDatas
													WHERE BinaryDatas.ItemID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeUpdate();
			
			$this->DATA->SQL->commitTransaction( $conn );
		}
		catch( Exception $exception )
		{
			/* rollback transaction */
			$this->DATA->SQL->rollbackTransaction( $conn );
			
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
		
		return true;
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
												FROM BinaryDatas
												WHERE BinaryDatas.ItemID = ?' );
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
} /* end of class phpmediadb_data_audios */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>