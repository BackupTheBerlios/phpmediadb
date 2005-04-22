<?php
/**
 * $Id: class.phpmediadb_business_inspector.php,v 1.8 2005/04/22 21:54:45 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        class.phpmediadb_business_inspector.php
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
 * @version     $Revision: 1.8 $
 */
/**
 * This is the class that manages all inspector functions like datavalidation
 */
class phpmediadb_business_inspector
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
	 * @param phpmediadb_business $sender Refreence to parent class
	 */
	public function __construct( $sender )
	{
		/* init */
    	 
		/* assign parent */
		$this->BUSINESS		= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
	}

//-----------------------------------------------------------------------------
	/**
	 * Checkengine: Checks if data is valid or generates an error-array
	 *
	 * @access public
	 * @param Integer $type Itemtype which should be checked
	 * @param Array $data Data which should be checked
	 * @return mixed Success if Null, failed if error-array
	 */
	public function check( $type, $data )
	{
		/* init */
		$returnValue	= NULL;
		$inputSize		= $this->getSize( $type );
		$checkRegex		= $this->getRegex( $type );
		
		/*
		$error['general'] = true;
		$error['flag']['title'] = true;
		$error['message']['title']['size'] = true;
		$error['message']['title']['regex'] = true;
		*/
		
		/* check input-sizes */
		if( is_array( $inputSize ) )
		{
			foreach( $inputSize as $checkKey => $checkValue )
			{
				switch( @gettype( $data[$checkKey] ) )
				{
					case('string'):
						if( @strlen( $data[$checkKey] ) > $checkValue )
						{
							/* set errorflags */
							$returnValue['general']						= TRUE;
							$returnValue['flag'][$checkKey] 			= TRUE;
							$returnValue['message'][$checkKey]['size']	= TRUE;
						}
					break;
					
					case('array'):
						foreach( $data[$checkKey] as $ItemKey => $ItemValue )
						{
							if( @strlen( $ItemValue ) > $checkValue )
							{
								/* set errorflags */
								$returnValue['general']						= TRUE;
								$returnValue['flag'][$checkKey] 			= TRUE;
								$returnValue['message'][$checkKey]['size']	= TRUE;
							}
						}
					break;
				} /* end of switch */
			} /* end of foreach */
		} /* end of if */
		
		/* check input-regex */
		if( is_array( $inputSize ) )
		{
			foreach( $checkRegex as $checkKey => $checkValue )
			{
				switch( @gettype( $data[$checkKey] ) )
				{
					case('string'):
						if( ! @ereg( $checkValue, $data[$checkKey] ) )
						{
							/* set errorflags */
							$returnValue['general']						= TRUE;
							$returnValue['flag'][$checkKey] 			= TRUE;
							$returnValue['message'][$checkKey]['regex']	= TRUE;
						}
					break;
					
					case('array'):
						foreach( $data[$checkKey] as $ItemKey => $ItemValue )
						{
							if( ! @ereg( $checkValue, $ItemValue ) )
							{
								/* set errorflags */
								$returnValue['general']						= TRUE;
								$returnValue['flag'][$checkKey] 			= TRUE;
								$returnValue['message'][$checkKey]['regex']	= TRUE;
							}
						}
					break;
				} /* end of switch */
			} /* end of foreach */
		} /* end of if */
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Returns all size-specifications for variable check
	 *
	 * @access public
	 * @param Integer $type Itemtype
	 * @return mixed Specifications of variable-value sizes
	 */
	public function getSize( $type )
	{
		/* init */
		$returnValue = NULL;
		
		/* get size */
		if( array_key_exists( $type,  $this->BUSINESS->configuration['input-size'] ) )
			$returnValue = $this->BUSINESS->configuration['input-size'][$type];
		else
			$returnValue = NULL;
		
		/* return data */
		return $returnValue;
	}	

//-----------------------------------------------------------------------------
	/**
	 * Returns all regex-specifications for variable check
	 *
	 * @access public
	 * @param Integer $type Itemtype
	 * @return mixed Specifications of variable-value regex
	 */
	public function getRegex( $type )
	{
		/* init */
		$returnValue = NULL;
		
		/* get size */
		if( array_key_exists( $type,  $this->BUSINESS->configuration['input-regex'] ) )
			$returnValue = $this->BUSINESS->configuration['input-regex'][$type];
		else
			$returnValue = NULL;
		
		/* return data */
		return $returnValue;
	}	
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_inspector */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>