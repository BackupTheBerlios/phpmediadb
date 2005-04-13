<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: phpmediadb.php,v 1.11 2005/04/13 11:56:05 bruf Exp $ */
/**
 * This file includes all required files for phpMediaDB to work
 * 
 * @author		Markus Blaschke <mblaschke@users.berlios.de>
 * @version		$Revision: 1.11 $
 * @package		phpmediadb
 * @subpackage	global
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