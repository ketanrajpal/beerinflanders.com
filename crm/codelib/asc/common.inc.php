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
// FileList
//----------------------------------------------------------------
require( "cls_fl_aso.inc.php" );
require( 'cls_fl_staff.inc.php' );
require( 'cls_fl_forms.inc.php' );

//----------------------------------------------------------------
// HtmlMacro
//----------------------------------------------------------------
class cls_hm_aso extends CHtmlMacro {}

//----------------------------------------------------------------
// Authorization
//----------------------------------------------------------------
class cls_auth_aso extends CAuthorization {}

//----------------------------------------------------------------
// PageSet
//----------------------------------------------------------------
class cls_ps_aso extends CVPageSet {}

//----------------------------------------------------------------
// System
//----------------------------------------------------------------
class cls_sys_aso extends CVSystem
{
	function IsAdmin()
	{
		return false;
	}

	function ShowRLog()
	{
		$b = ( $this->sys->GetUserType( UT_STAFF ) == UT_STAFF );
		return $b;
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>