<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_htmlservice.php,v 1.7 2005/03/15 20:24:28 mblaschke Exp $ */

class phpmediadb_presentation_htmlservice
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
	 * Reference to template engine (tier.lib)
	 *
	 * @access private
	 */
	private $templateEngine = null;

	// --- OPERATIONS ---
	
//-----------------------------------------------------------------------------
	/**
	 * The constructor __construct initalizes the Class.
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param phpmediadb_presentation $sender Reference to parentclass
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB		= $sender->PHPMEDIADB;
			
		/* setup smarty object */
		$this->setupTemplateEngine();
		
	}

//-----------------------------------------------------------------------------
	/**
	 * Compiles one or more templates via template-engine and return it
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String $template Filename of template
	 * @return mixed compiled template as html or text
	 */
	public function compile( $template )
	{
		/* init */
		$returnValue = null;
		$content		= array();
		
		
		/* set up template engine */
		$this->initTemplateEngine();
		
		/* compile specified templates */
		switch( gettype( $template ) )
		{
			case 'string':
					$content['DOCUMENT']['BODY'] = $this->templateEngine->fetch( $template );
				break;
			
			case 'array';
				$content['DOCUMENT']['BODY'] = '';
					foreach( $template as $value )
						$content['DOCUMENT']['BODY'] .= $this->templateEngine->fetch( $value );
				break;	
		}
		
		/* compile pre-template */
		$this->templateEngine->assign( $content );
		$returnValue = $this->templateEngine->fetch( 'overall.body.tpl' );
		
 		/* return compiled template */
	 	return $returnValue;
	}
//-----------------------------------------------------------------------------
	/**
	 * Compiles one or more templates via template-engine and sends it to client
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String $template Filename of template
	 */	
	public function display( $template )
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$returnValue = $this->compile( $template );
		
		/* output */
		echo $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Initalizes the template engine
	 *
	 * @access protected
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 */
	protected function initTemplateEngine()
	{
		/* clear vars */
		$this->templateEngine->clear_all_assign();
		
		/* set contentvars */
		$this->templateEngine->assign( $this->PRESENTATION->CONTENTVARS->getNode() );
		
		/* set i18n-vars */
		$this->templateEngine->assign( 'I18N', $this->PRESENTATION->I18N->getLanguageArray() );
		
		/* set CONFIGURATION */
		$configuration['ROOTPATH'] = $this->PRESENTATION->configuration['webpath']['root-path'];
		
		$this->templateEngine->assign( 'CONFIGURATION', $configuration );
	}
//-----------------------------------------------------------------------------
	/**
	 * Setup the template engine for the first time
	 *
	 * @access public
	 * @author phpMediaDB Team - http://phpmediadb.berlios.de/
	 * @param String
	 */
	protected function setupTemplateEngine()
	{
		/* create templateengine-object */
		$this->templateEngine = new Smarty();
		
		/* setup configuration */
		$this->templateEngine->template_dir	= $this->PRESENTATION->configuration['directory']['templates'];
		$this->templateEngine->compile_dir	= $this->PRESENTATION->configuration['directory']['templates_c'];
	}
	
//-----------------------------------------------------------------------------
} /* end of class phpmediadb_presentation_htmlservice */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>