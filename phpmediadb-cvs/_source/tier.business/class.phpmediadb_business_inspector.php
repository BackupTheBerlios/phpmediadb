<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_inspector.php,v 1.1 2005/03/15 17:38:08 mblaschke Exp $ */

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
	
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb
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
	 * Returns the complete list
	 *
	 *
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
				if( @strlen( $data[$checkKey] ) > $checkValue )
				{
					/* set errorflags */
					$returnValue['general']											= TRUE;
					$returnValue['flag'][$checkKey] 						= TRUE;
					$returnValue['message'][$checkKey]['size']	= TRUE;
				}
			}
		}
		
		/* check input-regex */
		if( is_array( $inputSize ) )
		{
			foreach( $checkRegex as $checkKey => $checkValue )
			{
				if( ! @ereg( $checkValue, $data[$checkKey] ) )
				{
					/* set errorflags */
					$returnValue['general']											= TRUE;
					$returnValue['flag'][$checkKey] 						= TRUE;
					$returnValue['message'][$checkKey]['regex']	= TRUE;
				}
			}
		}
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
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