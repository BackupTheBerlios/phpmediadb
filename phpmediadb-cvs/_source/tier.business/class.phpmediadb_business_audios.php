<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_audios.php,v 1.3 2005/03/15 20:59:21 mblaschke Exp $ */

class phpmediadb_business_audios
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
	 * @param phpmediadb $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* init */
    	 
		/* assign parent */
		$this->BUSINESS		= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
		$this->DATA				= $sender->PHPMEDIADB->DATA;
	}

//-----------------------------------------------------------------------------
	/**
	 * Checks if the data is correct
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Mixed $data Data which should be checked
	 * @return Mixed Successstatus, NULL if success, failed with error-array
	 */
	 public function check( $data )
	 {
		/* init */
		$returnValue = NULL;
		
		/* delegate */
		$returnValue = $this->BUSINESS->INSPECTOR->check( PHPMEDIADB_ITEM_AUDIO, $data );

		
		return $returnValue;
	 }

//-----------------------------------------------------------------------------
	/**
	 * Creates an empty dataset
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return Array Empty dataset
	 */
	 public function createEmpty()
	 {
		/* init */
		$returnValue = array();
	 	
		/* create empty itemset */
		$returnValue['ItemTitle'] 						= '';
		$returnValue['ItemOriginalTitle']			= '';
		$returnValue['ItemMediaName']					= '';
		$returnValue['ItemIdentification']		= '';
		$returnValue['ItemRelease']						= '';
		$returnValue['Categories']						= array();
		$returnValue['ItemMediaSize']					= '';
		$returnValue['MediaFormatID']					= '';
		$returnValue['BinaryData']						= '';
		$returnValue['PublisherName']					= '';
		$returnValue['MediaAgeRestrictionID']	= '';
		$returnValue['MediaCodecID']					= '';
		$returnValue['ItemQuantity']					= '';
		$returnValue['ItemCreationDate']			= NULL;
		$returnValue['ItemModificationDate']	= NULL;
			
		/* return data */
		return $returnValue;
	 }

//-----------------------------------------------------------------------------
	/**
	 * Returns the complete list of datasets
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return Array Array with all available datasets
	 */
	public function getList()
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$this->DATA->AUDIOS->getList();
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Modifies one dataset specified by the id
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String $id Primarykey/Identifier of dataset
	 * @param Array $data New data of dataset
	 */
	public function modify( $id, $data )
	{
		/* init */
		$returnValue = NULL;
		
		/* check data */
		$returnValue = $this->check( $data );
		
		/* no input-error, ready to save */
		if( $returnValue === NULL )
		{
			/* delegate */
			//$this->DATA->AUDIOS->modify( $id, $data );
			
			$returnValue = TRUE;
		}
		
		/* return data */
		return $returnValue;
	}
//-----------------------------------------------------------------------------
	/**
	 * Creates one dataset
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Array $data New data of dataset
	 * @return Primarykey/Identifier of dataset
	 */
	public function create( $data )
	{
		/* init */
		$returnValue = NULL;
		
		/* check data */
		$returnValue = $this->check( $data );
		
		/* no input-error, ready to save */
		if( $returnValue === NULL )
		{
			/* delegate */
			//$this->DATA->AUDIOS->create( $id, $data );
			
			$returnValue = TRUE;
		}
		
		/* return data */
		return $returnValue;
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_business_audios */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>