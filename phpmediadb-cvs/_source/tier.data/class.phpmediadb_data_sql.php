<?php
/**
 * $Id: class.phpmediadb_data_sql.php,v 1.12 2005/04/20 21:45:59 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_data_sql.php
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
 * @version     $Revision: 1.12 $
 */

/**
 * This is the class that provides often used sql actions
 *
 * @author		Boris Ruf <bruf@users.berlios.de>
 * @version		$Revision: 1.12 $
 * @package		phpmediadb
 * @subpackage	data
 */
class phpmediadb_data_sql
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
	 * This function provides the connection to the database
	 *
	 * @access public
	 * @return String contains information from the connection to the database
	*/
	public function getConnection()
	{
		try
		{
			/* try to connect to database */
			$dsn		= $this->DATA->configuration['sqlconnection'];
			$conntype	= $this->DATA->configuration['sqlconnection']['conntype'];
			$conn = Creole::getConnection($dsn, $conntype );
			
			/* return connection */
			return $conn;
		}
		catch( Exception $ex  )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
		}
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function returns the id of the last created record in a table
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	 * @return Integer returns the id from the last created record
	*/
	public function getLastInsert( $conn )
	{
		try
		{
			/* get ID-generator */
			$idGen = $conn->getIdGenerator();
			
			/* return last inserted id */
			return $idGen->getId();
		}
		catch( Exception $e )
		{
			/* handle exception and terminate script */
			phpmediadb_exception::handleException( $ex );
		}	
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function opens a transaction
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	*/
	public function openTransaction( $conn )
	{
		/* delegate */
		$conn->setAutoCommit(false);
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function commits a transaction
	 * @access public
	 * @param String $conn contains information from the connection to the database
	*/
	public function commitTransaction( $conn )
	{
		/* delegate */
		$conn->commit();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function makes a rollback from a transaction
	 *
	 * @access public
	 * @param String $conn contains information from the connection to the database
	*/
	public function rollbackTransaction( $conn )
	{
		/* abort all delete/update queries in the transaction*/
		$conn->rollback();
	}
	
//-----------------------------------------------------------------------------
	/**
	 * This function generates an array an fill in the data from the sql query
	 *
	 * @access public
	 * @param String $rs is the resultset from the sql query
	 * @return array contains the results of the sql query
	*/
	public function generateDataArray( $rs )
	{
		/* init */
		$dataArray = NULL;
		
		/* copy all rows to an dataarray */
		while ($rs->next())
			$dataArray[] = $rs->GetRow();

		/* return dataarray */
		return $dataArray;
	}
		
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_data_sql */
//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>