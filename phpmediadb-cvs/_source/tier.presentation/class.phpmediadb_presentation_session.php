<?php
// phpMediaDB :: Licensed under GNU-GPL :: http://phpmediadb.berlios.de/
/* $Id: class.phpmediadb_presentation_session.php,v 1.3 2005/03/15 18:10:22 mblaschke Exp $ */

class phpmediadb_presentation_session
{


	public function __construct( $sender )
	{
		/* init session */
		$this->start();
	}

	public function register( $id, $regvar )
	{
		/* set value */
		$_SESSION[$id] = $regvar;
	}
	
	public function unregister( $id )
	{
		/* unregister variable */
		unset( $_SESSION[$id] );
	}
	
	public function get( $id )
	{
		/* return value */
		return $_SESSION[$id];
	}
	
	public function start()
	{
		/* start session */
		session_start();
	}
	
	public function destroy()
	{
		/* destroy session */
		session_destroy();
	}
	
	public function getUid( $newId = NULL )
	{
		/* return session_id */
		return session_id( $newId );
	}
	

} /* end of class phpmediadb_presentation_session */

//--- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF --- EOF ---
?>