<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_inspector.php,v 1.2 2005/03/15 20:59:22 mblaschke Exp $ */

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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb $sender Refreence to parent class
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
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
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
							$returnValue['general']											= TRUE;
							$returnValue['flag'][$checkKey] 						= TRUE;
							$returnValue['message'][$checkKey]['size']	= TRUE;
						}
					break;
					
					case('array'):
						foreach( $data[$checkKey] as $ItemKey => $ItemValue )
						{
							if( @strlen( $ItemValue ) > $checkValue )
							{
								/* set errorflags */
								$returnValue['general']											= TRUE;
								$returnValue['flag'][$checkKey] 						= TRUE;
								$returnValue['message'][$checkKey]['size']	= TRUE;
							}
						}
					break;
				}
			}
		}
		
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
							$returnValue['general']											= TRUE;
							$returnValue['flag'][$checkKey] 						= TRUE;
							$returnValue['message'][$checkKey]['regex']	= TRUE;
						}
					break;
					
					case('array'):
						foreach( $data[$checkKey] as $ItemKey => $ItemValue )
						{
							if( ! @ereg( $checkValue, $ItemValue ) )
							{
								/* set errorflags */
								$returnValue['general']											= TRUE;
								$returnValue['flag'][$checkKey] 						= TRUE;
								$returnValue['message'][$checkKey]['regex']	= TRUE;
							}
						}
					break;
				}
			}
		}
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Returns all size-specifications for variable check
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $type Itemtype
	 * @return mixed Specifications of variable-value sizes
	 */
	public function getSize( $type )
	{
		/* init */
		$returnValue = NULL;
		
		/* get size */
		$returnValue = $this->BUSINESS->configuration['input-size'][$type];
		
		/* return data */
		return $returnValue;
	}	

//-----------------------------------------------------------------------------
	/**
	 * Returns all regex-specifications for variable check
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Integer $type Itemtype
	 * @return mixed Specifications of variable-value regex
	 */
	public function getRegex( $type )
	{
		/* init */
		$returnValue = NULL;
		
		/* get size */
		$returnValue = $this->BUSINESS->configuration['input-regex'][$type];
		
		/* return data */
		return $returnValue;
	}	
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_inspector */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>