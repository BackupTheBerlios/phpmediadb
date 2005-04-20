<?php
/**
 * $Id: phpmediadb.php,v 1.14 2005/04/20 21:45:17 mblaschke Exp $
 *
 * Project:     phpMediaDB :: OpenSource Mediadatabase
 * File:        phpmediadb.php
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
 * @package		phpmediadb
 * @subpackage	global
 * @version     $Revision: 1.14 $
 */

/* let's begin */

/* run preinit */
	require_once( 'tier.configuration/config.preinit.php' );

/* include tier.global */
	require_once( 'tier.global/constants.phpmediadb.php' );
	require_once( 'tier.global/class.phpmediadb_exception.php' );
	require_once( 'tier.global/class.phpmediadb.php' );

/* include configuration */
	require_once( 'tier.configuration/config.data.php' );
	require_once( 'tier.configuration/config.business.php' );
	require_once( 'tier.configuration/config.presentation.php' );

/* include tier.lib */
	require_once( 'tier.lib/smarty/Smarty.class.php' );
	require_once( 'tier.lib/creole/Creole.php' );

/* include tier.presentation */
	require_once( 'tier.presentation/class.phpmediadb_presentation.php' );
	require_once( 'tier.presentation/class.phpmediadb_presentation_contentvars.php' );
	require_once( 'tier.presentation/class.phpmediadb_presentation_htmlservice.php' );
	require_once( 'tier.presentation/class.phpmediadb_presentation_i18n.php' );
	require_once( 'tier.presentation/class.phpmediadb_presentation_session.php' );
	require_once( 'tier.presentation/class.phpmediadb_presentation_xmlservice.php' );

/* include tier.business */
	require_once( 'tier.business/class.phpmediadb_business.php' );
	require_once( 'tier.business/class.phpmediadb_business_agerestrictions.php' );
	require_once( 'tier.business/class.phpmediadb_business_audios.php' );
	require_once( 'tier.business/class.phpmediadb_business_binarydatas.php' );
	require_once( 'tier.business/class.phpmediadb_business_categories.php' );
	require_once( 'tier.business/class.phpmediadb_business_codecs.php' );
	require_once( 'tier.business/class.phpmediadb_business_formats.php' );
	require_once( 'tier.business/class.phpmediadb_business_items.php' );
	require_once( 'tier.business/class.phpmediadb_business_inspector.php' );
	require_once( 'tier.business/class.phpmediadb_business_prints.php' );
	require_once( 'tier.business/class.phpmediadb_business_videos.php' );

/* include tier.data */
	require_once( 'tier.data/class.phpmediadb_data.php' );
	require_once( 'tier.data/class.phpmediadb_data_agerestrictions.php' );
	require_once( 'tier.data/class.phpmediadb_data_audios.php' );
	require_once( 'tier.data/class.phpmediadb_data_binarydatas.php' );
	require_once( 'tier.data/class.phpmediadb_data_categories.php' );
	require_once( 'tier.data/class.phpmediadb_data_codecs.php' );
	require_once( 'tier.data/class.phpmediadb_data_formats.php' );
	require_once( 'tier.data/class.phpmediadb_data_items.php' );
	require_once( 'tier.data/class.phpmediadb_data_prints.php' );
	require_once( 'tier.data/class.phpmediadb_data_sql.php' );
	require_once( 'tier.data/class.phpmediadb_data_status.php' );
	require_once( 'tier.data/class.phpmediadb_data_videos.php' );

/* run postinit */
	require_once( 'tier.configuration/config.postinit.php' );

/* now we're done */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>