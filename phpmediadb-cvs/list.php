<?php
/**
 * $Id: list.php,v 1.6 2005/04/20 21:44:45 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        list.php
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
 * @version     $Revision: 1.6 $
 */
 
/* include main phpmediadb-project */
require_once( '_source/phpmediadb.php' );

/* create object */
$PHPMEDIADB	= new phpmediadb();


/* setup templates */
$templates = array();
$templates[] = 'body.list.header.tpl';

switch( @$_GET['list'] )
{
		case 'audio':
				/* get data list */
				$dataList = $PHPMEDIADB->BUSINESS->AUDIOS->getList();	
				@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $dataList );
				
				/* set template */
				$templates[] = 'body.list.audio.tpl';
			break;
			
		case 'video':
				/* get data list */
				
				$dataList = $PHPMEDIADB->BUSINESS->VIDEOS->getList();		
				@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $dataList );

				/* set template */
				$templates[] = 'body.list.video.tpl';
			break;
			
		case 'print':
				/* get data list */
				$dataList = $PHPMEDIADB->BUSINESS->PRINTS->getList();		
				@$PHPMEDIADB->PRESENTATION->CONTENTVARS->addNode( 'ITEMDATA', $dataList );

				/* set template */
				$templates[] = 'body.list.print.tpl';
			break;
			
		default:
				/* set default template */
				$templates[] = 'body.list.tpl';
			break;
}

/* show template */
$PHPMEDIADB->PRESENTATION->HTMLSERVICE->displayMain( $templates );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>