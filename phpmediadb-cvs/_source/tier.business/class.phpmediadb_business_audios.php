<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_business_audios.php,v 1.2 2005/03/15 18:07:24 mblaschke Exp $ */

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
		$this->DATA				= $sender->PHPMEDIADB->DATA;
	}

//-----------------------------------------------------------------------------
	/**
	 *
	 *
	 *
	 *
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
	 *
	 *
	 *
	 */
	 public function createEmpty()
	 {
		/* init */
		$returnValue = array();
	 	
		$returnValue['id'] = NULL;
		$returnValue['title']	= '';
		$returnValue['originaltitle']	= '';
		$returnValue['medianame']	= '';
		$returnValue['']	= '';
		$returnValue['']	= '';
		$returnValue['']	= '';
		$returnValue['']	= '';
		$returnValue['']	= '';
		$returnValue['']	= '';
		$returnValue['']	= '';
			
		/* return data */
		return $returnValue;
	 }

//-----------------------------------------------------------------------------
	/**
	 * Returns the complete list
	 *
	 *
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