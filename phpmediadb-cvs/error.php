<?php
/**
 * $Id: error.php,v 1.3 2005/04/20 21:44:45 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        error.php
 * License:     GNU General Publice License
 *
 * This file is part of phpMediaDB.
 *
 * phpMediaDB is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Foobar is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 * For questions, help, comments, discussion, etc., please join the
 * phpMediaDB mailing list. See phpMediaDB projectportal for more
 * information.
 *
 * @link        http://phpmediadb.berlios.de/
 * @copyright   2004-2005 &copy; Blaschke, Markus; Ruf, Boris
 * @license     http://opensource.org/licenses/gpl-license.php GNU General Public License
 * @author      Markus Blaschke <mblaschke@users.berlios.de>
 * @author      Boris Ruf <bruf@users.berlios.de>
 * @package		phpmediadb_html
 * @subpackage	access_anonymous
 * @version     $Revision: 1.3 $
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