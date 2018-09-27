<?php
//==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>
//
// Form2DB v1.14 [G130]
// Copyright (c) phpkobo.com ( http://www.phpkobo.com/ )
// Email : admin@phpkobo.com
// ID : CU201-114 [G130]
// URL : http://www.phpkobo.com/contact_us.php
//
// This software is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; version 2 of the
// License.
//
//==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<

//----------------------------------------------------------------
// AUTHSESSION_KEY
//----------------------------------------------------------------

define( 'AUTHSESSION_KEY', "AuthSessionKey:(" . __FILE__ . ")" );

//----------------------------------------------------------------
// cls_auth_base
//----------------------------------------------------------------
class cls_auth_base extends cls_auth_aso
{
	function IsAuthorized( $ps, $cmd )
	{
		if ( $this->sys->IsAdmin() )
		{
			return true;
		}
		else
		{
			return ( $ps != "staff" );
		}
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>