<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: list.php,v 1.1 2005/03/08 17:54:16 mblaschke Exp $ */

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
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( $templates );
			break;
			
		case 'video':
				/* display site */
				$templates[] = 'body.list.video.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( $templates );
			break;
			
		case 'print':
				/* display site */
				$templates[] = 'body.list.print.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( $templates );
			break;
			
		default:
				/* display site */
				$templates[] = 'body.list.tpl';
				$PHPMEDIADB->PRESENTATION->HTMLSERVICE->display( $templates );
			break;
}

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>