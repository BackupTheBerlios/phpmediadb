<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_i18n.php,v 1.4 2005/02/27 16:05:51 mblaschke Exp $ */

class phpmediadb_presentation_i18n
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
	 * Reference to class phpmediadb_presentation
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	protected $PRESENTATION = null;
	
	/**
	 * Container with all translated languagestrings
	 *
	 * @access private
	 * @var mixed
	 */
	private $langContainer = null;
	
	/**
	 * Container with all available languages
	 *
	 * @access private
	 * @var mixed
	 */
	private $availableLanguagesContainer = null;
	
	/**
	 * Currently used languagecode
	 *
	 * @access private
	 * @var mixed
	 */
	private $langCode = null;

	// --- OPERATIONS ---
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb_presentation
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB		= $sender->PHPMEDIADB;

		/* initalize */
		$this->langContainer = array();
		
		/* initalize values */
		$this->readI18nDirectory();
		$this->initalizeLanguageContainer();
  }
  
//-----------------------------------------------------------------------------
	/**
	 * This function returns the language of the client browser
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return string
	 */
  public function getBrowserLanguage()
  {
  	/* init */
  	$returnValue = "";
  	$availableLanguages	= $this->getAvailableLanagues();
  	$defaultLanguage		= $this->PRESENTATION->configuration['i18n']['defaultLanguage'];
  	
  	/* detect browser language */
  	if( !$this->PRESENTATION->configuration['i18n']['forcedLanguage'] )
  		$returnValue = $this->detectBrowserLanguage( $availableLanguages, $defaultLanguage );
  	else
  		$returnValue = $defaultLanguage;
  	
  	return $returnValue;
  }
  
//-----------------------------------------------------------------------------
	/**
	 * This function returns the i18n string specified by the langID
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @return mixed
	 */
  public function getLanguageString( $langId )
  {
  	/* init */
  	$returnValue = false;
  	
  	/* check if key exists */
  	if( array_key_exists( $langId, $this->langContainer ) )
  		$returnValue = $this->langContainer["$langId"];
  	
  	return $returnValue;
  }
  
//-----------------------------------------------------------------------------
	/**
	 * This function returns the whole i18n array
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return Array
	 */
  public function getLanguageArray()
  {
  	/* init */
  	$returnValue	= "";
  	
		$returnValue = $this->langContainer;
  	
  	return $returnValue;
  }
  
//-----------------------------------------------------------------------------
	/**
	 * This function returns a array with the available languages
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return Array
	 */
  public function getAvailableLanagues()
  {
  	/* init */
  	$returnValue = array();
		
  	/* get lanagues */
  	$returnValue	= array_keys( $this->availableLanguagesContainer );
  	  	
  	return $returnValue;
  }

  
//-----------------------------------------------------------------------------
	/**
	 * This function returns the currently used language as langcode
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return String
	 */
	 public function getLanguageCode()
	 {
  	/* init */
  	$returnValue = $this->langCode;
  	  	
  	return $returnValue;
	 }  
	 
//-----------------------------------------------------------------------------
	/**
	 * This function sets the currently used language as langcode
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 * @return Bool
	 */
	 public function setLanguageCode( $langCode )
	 {
  	/* init */
  	$returnValue = false;
  	
  	if( key_exists( $this->availableLanguagesContainer, $langCode ) && !$this->PRESENTATION->configuration['i18n']['forcedLanguage'] )
  	{
  		$this->loadLanagueFile( $langCode );
  		$returnValue = true;
  	}
  	  	
  	return $returnValue;
	 }  	 
  
//-----------------------------------------------------------------------------
	/**
	 * This function returns the language of the client browser
	 * specified by the allowed languages and the default language
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param Array
	 * @param String
	 * @return string
	 */
  protected function detectBrowserLanguage( $allowedLanguageArray, $defaultLanguage )
  {
  	/* init */
  	$returnValue = $defaultLanguage;
  	
		/* get browserlanguage */
		$HTTP_Language	= $_SERVER['HTTP_ACCEPT_LANGUAGE'];

		/* check if browserlanguage is empty -> return default language */
		if( empty( $HTTP_Language ) )
		{
			$returnValue = $defaultLanguage;
			
			return $returnValue;
		}

		/* split http-header */
		$HTTP_LanguageArray	= preg_split( '/,\s*/', $HTTP_Language );

		/* set default language as current */
		$CurrentLanguage['code']		= $defaultLanguage;
		$CurrentLanguage['quality']	= 0;
		
		foreach( $HTTP_LanguageArray as $HTTP_LanguageString )
		{
			/* validate language-string */
			if( !preg_match ('/^([a-z]{1,8}(?:-[a-z]{1,8})*)(?:;\s*q=(0(?:\.[0-9]{1,3})?|1(?:\.0{1,3})?))?$/i',
											$HTTP_LanguageString, $PregMatches) )
			{
				/* warning: not valid -> bad browser? .. ok, try next string */
				continue;
			}

			/* get language code */
			$Language['code']	= explode ( '-', $PregMatches[1] );

			/* language quality available? */
			if( isset( $PregMatches[2] ) )
			{
				/* ah, language quality available.. let's use it :) */
				$Language['quality']	= (float)$PregMatches[2];
			}
			else
			{
				/* very bad, no language quality available.. let's use 1.0 */
				$Language['quality']	= 1.0;
			}

			while( count( $Language['code'] ) )
			{
				if( in_array( strtolower( join( '-', $Language['code'] )), $allowedLanguageArray ) )
				{
					/* is the quality higher? */
					if( $Language['quality'] > $CurrentLanguage['quality'] )
					{
						/* quality is higher than current quality, let's use this language :) */
								$CurrentLanguage['code']		= strtolower( join ( '-', $Language['code'] ) );
								$CurrentLanguage['quality']	= $Language['quality'];
								break;
					}
				}
				/* delete last (right) arrayitem */
				array_pop( $Language['code'] );
			}
		}

			$returnValue = $CurrentLanguage['code'];
			
			return $returnValue;
  }
  
//-----------------------------------------------------------------------------
	/**
	 * This function read the i18n directory and detect the available languages
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return void
	 */
	 protected function readI18nDirectory()
	 {
	 		/* get files in i18n directory */
	 		foreach( glob( $this->PRESENTATION->configuration['directory']['i18n'] . "/i18n.*.php" ) as $filename )
	 		{
	 			/* double check with regex */
	 			if( eregi( '^i18n.([a-z]+).php$', basename( $filename ), $regArray ) )
	 			{			
	 				/* set values like filename and langcode */
	 				$filename	= trim( $filename );
	 				$langcode	= trim( $regArray[1] );
	 			
	 				/* set values to the contaienr */
		 			$this->availableLanguagesContainer[$langcode] = $filename;
	 			}
	 		}
	 }
  
//-----------------------------------------------------------------------------
	/**
	 * This function gets the current browser-language and calls the
	 * loadlanguagefile function.
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return void
	 */
	protected function initalizeLanguageContainer()
	{
		/* get language */
		$this->langCode = $this->getBrowserLanguage();
		
		/* load language file */
		$this->loadLanagueFile( $this->langCode );
		
	}
//-----------------------------------------------------------------------------
	/**
	 * This function loads the languagefile into the languagecontainer
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @return void
	 */
  protected function loadLanagueFile( $langCode )
  {
  	if( eregi( '^[a-z]+$', $langCode ) )
  	{
  		include( $this->PRESENTATION->configuration['directory']['i18n'] . "/i18n.$langCode.php" );
  		$this->langContainer	= $i18n;
  		$this->langCode				= $langCode;
  	}
  	else
  	{
  		throw new phpmediadb_exception( "ERR_LANGCODE_CHECK_FAILED" );
  	}
  }

} /* end of class phpmediadb_presentation_i18n */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>