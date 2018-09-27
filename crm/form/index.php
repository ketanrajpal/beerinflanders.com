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

	// 22527 = E_ALL & ~E_DEPRECATED & ~E_STRICT
	error_reporting( 22527 );

	require( 'common.inc.php' );
	$sys =& CVSystem::SetupSystem( $spec_sys_base );
	$sys->SetUserType( UT_GUEST );
	$sys->Run();
?>
