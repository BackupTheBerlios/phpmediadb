<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_i18n.php,v 1.10 2005/03/24 17:12:36 mblaschke Exp $ */

/**
 * This is the class that manages all internationalization-functions and also contains
 * all i18n variables
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.10 $
 * @package		phpmediadb
 * @subpackage	presentation
 */
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
	 * @param phpmediadb_presentation $sender Reference to parent class
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;

		/* initalize */
		$this->langContainer = array();
		
		/* initalize values */
		$this->readI18nDirectory();
		$this->initalizeLanguageContainer();
	}
  
//-----------------------------------------------------------------------------
	/**
	 * Returns the language of the client browser
	 *
	 * @access public
	 * @return string Browserlanguage as languagecode
	 */
	public function getBrowserLanguage()
	{
		/* init */
		$returnValue		= "";
		$availableLanguages	= $this->getAvailableLanagues();
		$defaultLanguage	= $this->PRESENTATION->configuration['i18n']['defaultLanguage'];
  	
		/* detect browser language */
		if( !$this->PRESENTATION->configuration['i18n']['forcedLanguage'] )
			$returnValue = $this->detectBrowserLanguage( $availableLanguages, $defaultLanguage );
		else
			$returnValue = $defaultLanguage;

		return $returnValue;
	}
  
//-----------------------------------------------------------------------------
	/**
	 * Returns the i18n string specified by the langID
	 *
	 * @access public
	 * @param String Internal language-i18n-stringcode
	 * @return mixed Internationalized string
	 */
	public function getLanguageString( $langId )
	{
		/* init */
		$returnValue = false;
  	
		/* check if key exists */
		if( array_key_exists( $langId, $this->langContainer ) )
			$returnValue = $this->langContainer["$langId"];
		else
			$returnValue = '%'.$langId.'%';

		return $returnValue;
	}
  
//-----------------------------------------------------------------------------
	/**
	 * Returns the whole i18n array
	 *
	 * @access public
	 * @return Array Array with all i18n strings
	 */
	public function getLanguageArray()
	{
		/* init */
		$returnValue = "";

		/* get container */
		$returnValue = $this->langContainer;

		return $returnValue;
	}
  
//-----------------------------------------------------------------------------
	/**
	 * Returns a array with the available languages
	 *
	 * @access public
	 * @return Array Array with all available languages as langcodes
	 */
	public function getAvailableLanagues()
	{
		/* init */
		$returnValue = array();
		
		/* get lanagues */
		$returnValue = array_keys( $this->availableLanguagesContainer );
  	  	
		return $returnValue;
	}

//-----------------------------------------------------------------------------
	/**
	 * Returns the currently used language as langcode
	 *
	 * @access public
	 * @return String Currently used language as langcode
	 */
	public function getLanguageCode()
	{
  		/* init */
  		$returnValue = $this->langCode;
  	  	
  		return $returnValue;
	}  
	 
//-----------------------------------------------------------------------------
	/**
	 * Sets the currently used language as langcode
	 *
	 * @access public
	 * @param String $langCode Languagecode which should be used
	 * @return Bool status if set was successfull
	 */
	public function setLanguageCode( $langCode )
	{
  		/* init */
  		$returnValue = false;
  	
  		if( key_exists( $this->availableLanguagesContainer, $langCode ) && !$this->PRESENTATION->configuration['i18n']['forcedLanguage'] )
  		{
  			$this->loadLanagueFile( $langCode );
  		
  			/* save i18n-vars to contentvars */
  			$this->PRESENTATION->CONTENTVARS->addNode( 'I18N', $this->getLanguageArray() );
  		
  			$returnValue = true;
  		}
  	  	
  		return $returnValue;
	}  	 
  
//-----------------------------------------------------------------------------
	/**
	 * Returns the language of the client browser specified by the 
	 * allowed languages and the default language
	 *
	 * @access protected
	 * @param Array $allowedLanguageArray Array with all allowed langcodes
	 * @param String $defaultLanguage Default Language as langcode
	 * @return string Prefered langcode
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
			
		/* return value */
		return $returnValue;
	}
  
//-----------------------------------------------------------------------------
	/**
	 * Reads the i18n directory and detect the available languages
	 *
	 * @access protected
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
	 */
	protected function initalizeLanguageContainer()
	{
		/* get language */
		$this->langCode = $this->getBrowserLanguage();
		
		/* load language file */
		$this->loadLanagueFile( $this->langCode );
		
		/* save i18n-vars to contentvars */
		$this->PRESENTATION->CONTENTVARS->addNode( 'I18N', $this->getLanguageArray() );
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Loads the languagefile into the languagecontainer
	 *
	 * @access protected
	 * @param String $langCode Langcode which should be loaded
	 * @return void
	 */
	protected function loadLanagueFile( $langCode )
	{
		/* security check - langcode*/
		if( eregi( '^[a-z]+$', $langCode ) )
		{
			/* load langcode-file */
			include( $this->PRESENTATION->configuration['directory']['i18n'] . "/i18n.$langCode.php" );
			
			/* set langcodes */
			$this->langContainer	= $i18n;
			$this->langCode			= $langCode;
		}
		else
		{
			/* security exception */
			throw new phpmediadb_exception( "ERR_LANGCODE_CHECK_FAILED" );
		}
	}

//-----------------------------------------------------------------------------
} /* end of class phpmediadb_presentation_i18n */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>