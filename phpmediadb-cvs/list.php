<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: list.php,v 1.2 2005/03/20 17:15:52 mblaschke Exp $ */

require_once( '_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();


/* setup templates */
$templates = array();
$templates[] = 'body.list.header.tpl';

switch( @$_GET['list'] )
{
		case 'audio':
				/* display site */
				$templates[] = 'body.list.audio.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
			
		case 'video':
				/* display site */
				$templates[] = 'body.list.video.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
			
		case 'print':
				/* display site */
				$templates[] = 'body.list.print.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
			
		default:
				/* display site */
				$templates[] = 'body.list.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );
			break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>