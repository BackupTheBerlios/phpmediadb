<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_htmlservice.php,v 1.4 2005/03/08 17:53:26 mblaschke Exp $ */

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
	 * Reference to template engine
	 *
	 * @access protected
	 * @see phpmediadb_presentation
	 * @var phpmediadb_presentation
	 */
	private $templateEngine = null;

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
			
		/* setup smarty object */
		$this->setupTemplateEngine();
		
	}

//-----------------------------------------------------------------------------
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
		
		/* compile header */
		$content['DOCUMENT']['HEADER'] = $this->templateEngine->fetch( 'overall.header.tpl' );
		/* compile menu */
		$content['DOCUMENT']['MENU'] = $this->templateEngine->fetch( 'overall.menu.tpl' );
		/* compile footer */
		$content['DOCUMENT']['FOOTER'] = $this->templateEngine->fetch( 'overall.footer.tpl' );
		
		
		/* compile pre-template */
		$this->templateEngine->assign( $content );
		$returnValue = $this->templateEngine->fetch( 'overall.body.tpl' );
		
 		/* return compiled template */
	 	return $returnValue;
	}
//-----------------------------------------------------------------------------
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
	protected function initTemplateEngine()
	{
		/* clear vars */
		$this->templateEngine->clear_all_assign();
		
		/* set contentvars */
		$this->templateEngine->assign( $this->PRESENTATION->CONTENTVARS->getNode() );
		
		/* set i18n-vars */
		$this->templateEngine->assign( 'I18N', $this->PRESENTATION->I18N->getLanguageArray() );
			
	}
//-----------------------------------------------------------------------------
	protected function setupTemplateEngine()
	{
		/* create templateengine-object */
		$this->templateEngine = new Smarty();
		
		/* setup configuration */
		$this->templateEngine->template_dir	= $this->PRESENTATION->configuration['directory']['templates'];
		$this->templateEngine->compile_dir	= $this->PRESENTATION->configuration['directory']['templates_c'];
	}
} /* end of class phpmediadb_presentation_htmlservice */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>