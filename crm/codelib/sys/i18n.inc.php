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
// Language Code
//----------------------------------------------------------------
define( 'LC_EN', 'en' );

$LANG_CODE_ALL = array(
	LC_EN,
);

//----------------------------------------------------------------
// _LANG_FILE_
//----------------------------------------------------------------
function _LANG_FILE_( $filename )
{
	global $LANG_CODE;
	global $LANG_CODE_ALL;
	if ( !in_array( $LANG_CODE, $LANG_CODE_ALL ) )
	{
 		echo 'Invalid Language Code';
 		exit;
	}
	return str_replace( "##LANG_CODE##", $LANG_CODE, $filename ); 
}

//-----------------------------------------------------------------------
// END OF FILE
//-----------------------------------------------------------------------
?>