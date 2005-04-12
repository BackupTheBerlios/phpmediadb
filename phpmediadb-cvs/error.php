<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: error.php,v 1.2 2005/04/12 19:05:40 mblaschke Exp $ */
/**
 * This file displays an error-message
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.2 $
 * @package		phpmediadb_html
 * @subpackage	access_anonymous
 */
 
/* include main phpmediadb-project */
require_once( '_source/phpmediadb.php' );

/* create object and init */
$PHPMEDIADB	= new phpmediadb();
 
 /* HTTP Errors */
switch( $_GET['http'] )
{
	case('401');
		/* get %HTTP_ERROR_401_TITLE% */
		$messageTitle = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_401_TITLE' );

		/* get %HTTP_ERROR_401_BODY% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_401_BODY' );
	break;	
 	
	case('403');
		/* get %HTTP_ERROR_403_TITLE% */
		$messageTitle = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_403_TITLE' );

		/* get %HTTP_ERROR_403_BODY% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_403_BODY' );
	break;	

	case('404');
		/* get %HTTP_ERROR_404_TITLE% */
		$messageTitle = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_404_TITLE' );

		/* get %HTTP_ERROR_404_BODY% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_404_BODY' );
	break;	
	
	case('500');
		/* get %HTTP_ERROR_500_TITLE% */
		$messageTitle = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_500_TITLE' );

		/* get %HTTP_ERROR_500_BODY% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_500_BODY' );
	break;	
 	
	default:
		/* get %HTTP_ERROR_UNKNOWN_TITLE% */
		$messageTitle = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_UNKNOWN_TITLE' );

		/* get %HTTP_ERROR_UNKNOWN_BODY% */
		$messageBody = $PHPMEDIADB->PRESENTATION->I18N->translate( 'HTTP_ERROR_UNKNOWN_BODY' );
	break;	
}
 
/* assign message */
@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.TITLE', $messageTitle );
@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'MESSAGE.BODY', $messageBody );
 
/* display message */
$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( 'body.message.tpl' );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>