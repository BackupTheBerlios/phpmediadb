<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_data_items.php,v 1.2 2005/04/12 17:59:17 mblaschke Exp $ */

/**
 * This is the class that manages all database activities for the items
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.2 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_items
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
		
		switch( $this->getItemType( $id ) )
		{
		case(PHPMEDIADB_ITEM_AUDIO):
			/* delegate */
			$returnValue = $this->DATA->AUDIOS->delete( $id );
		break;
	
		case(PHPMEDIADB_ITEM_VIDEO):
			/* delegate */
			$returnValue = $this->DATA->VIDEOS->delete( $id );
		break;
	
		case(PHPMEDIADB_ITEM_PRINT):
			/* delegate */
			$returnValue = $this->DATA->PRINTS->delete( $id );
		break;
		}
		
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
		
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT COUNT(*)
												FROM Items
												WHERE Items.ItemID = ?' );
			$stmt->setString( 1, $itemId );
			$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
			$rs->next();
			
			/* check if item exists */
			if( $rs->get(1) >= 1 )
				$returnValue = true;
				
			return $returnValue;
		}
		catch( Exception $exception )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the ItemType from a specified ItemID
	 *
	 * @access public
	 * @param Integer $id contains specified id for the sql statement
	 * @return array returns the results of database query
	 */
	public function getItemType( $id )
	{
		try
		{
			$conn = $this->DATA->SQL->getConnection();
			$stmt = $conn->prepareStatement(	'SELECT Items.ItemTypeID
												FROM Items
												WHERE Items.ItemID = ?' );
			$stmt->setString( 1, $id );
			$rs = $stmt->executeQuery( ResultSet::FETCHMODE_NUM );
			
			if( $rs->next() )
			{
				return $rs->get(1);
			}
			else
			{
				return NULL;	
			}
		}
		catch( Exception $exception )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $exception );
		}
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_items */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>