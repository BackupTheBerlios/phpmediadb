<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_htmlservice.php,v 1.10 2005/03/24 17:12:36 mblaschke Exp $ */

/**
 * This is the class that manages all html-serivces like template-compilation
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.10 $
 * @package		phpmediadb
 * @subpackage	presentation
 */
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
	 * @param phpmediadb_presentation $sender Reference to parentclass
	 */
	public function __construct( $sender )
	{
		/* assign parent */
		$this->PRESENTATION	= $sender;
		$this->PHPMEDIADB	= $sender->PHPMEDIADB;
			
		/* setup smarty object */
		$this->setupTemplateEngine();
	}

//-----------------------------------------------------------------------------
	/**
	 * Compiles one or more templates via template-engine and return it
	 *
	 * @access public
	 * @param String $template Filename of template
	 * @return mixed compiled template as html or text
	 */
	public function compile( $template )
	{
		/* init */
		$returnValue = null;
		
		/* set up template engine */
		$this->initTemplateEngine();
		
		/* compile specified templates */
		switch( gettype( $template ) )
		{
			case 'string':
					$returnValue = $this->templateEngine->fetch( $template );
				break;
			
			case 'array';
					foreach( $template as $value )
						$returnValue .= $this->templateEngine->fetch( $value );
				break;	
		}
				
 		/* return compiled template */
	 	return $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Compiles one or more templates via template-engine and sends it to client
	 *
	 * @access public
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
	 * Compiles one or more templates via template-engine and return it
	 *
	 * @access public
	 * @param String $template Filename of template
	 * @return mixed compiled template as html or text
	 */
	public function compileMain( $template )
	{
		/* init */
		$returnValue = null;
		$content	= array();
		
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
	 * @param String $template Filename of template
	 */	
	public function displayMain( $template )
	{
		/* init */
		$returnValue = null;
		
		/* delegate */
		$returnValue = $this->compileMain( $template );
		
		/* output */
		echo $returnValue;
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Initalizes the template engine
	 *
	 * @access protected
	 */
	protected function initTemplateEngine()
	{
		/* clear vars */
		$this->templateEngine->clear_all_assign();
		
		/* set i18n-vars to contentvars*/
		//$this->PRESENTATION->CONTENTVARS->addNode( 'I18N', $this->PRESENTATION->I18N->getLanguageArray() );
		
		/* set contentvars */
		$this->templateEngine->assign( $this->PRESENTATION->CONTENTVARS->getNode() );
		
		/* set CONFIGURATION */
		$configuration['ROOTPATH'] = $this->PRESENTATION->configuration['webpath']['root-path'];
		
		$this->templateEngine->assign( 'CONFIGURATION', $configuration );
	}
	
//-----------------------------------------------------------------------------
	/**
	 * Setup the template engine for the first time
	 *
	 * @access public
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