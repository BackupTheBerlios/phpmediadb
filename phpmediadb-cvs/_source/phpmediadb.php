<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: phpmediadb.php,v 1.4 2005/02/09 20:27:19 mblaschke Exp $ */

/* run preinit */
require_once( 'tier.configuration/config.preinit.php' );

/* include configuration */
require_once( 'tier.configuration/config.data.php' );
require_once( 'tier.configuration/config.business.php' );
require_once( 'tier.configuration/config.presentation.php' );

/* include tier.global */
require_once( 'tier.global/class.phpmediadb_exception.php' );
require_once( 'tier.global/class.phpmediadb.php' );
require_once( 'tier.global/constants.phpmediadb.php' );

/* include tier.presentation */
require_once( 'tier.presentation/class.phpmediadb_presentation.php' );
require_once( 'tier.presentation/class.phpmediadb_presentation_contentvars.php' );
require_once( 'tier.presentation/class.phpmediadb_presentation_htmlservice.php' );
require_once( 'tier.presentation/class.phpmediadb_presentation_i18n.php' );
require_once( 'tier.presentation/class.phpmediadb_presentation_session.php' );
require_once( 'tier.presentation/class.phpmediadb_presentation_xmlservice.php' );

/* include tier.business */
require_once( 'tier.business/class.phpmediadb_business.php' );

/* include tier.data */
require_once( 'tier.data/class.phpmediadb_data.php' );

/* run postinit */
require_once( 'tier.configuration/config.postinit.php' );

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>