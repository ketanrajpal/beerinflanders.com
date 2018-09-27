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
// cls_hm_base
//----------------------------------------------------------------
class cls_hm_base extends cls_hm_aso
{
	//----------------------------------------------------------------
	// GetImagePath
	//----------------------------------------------------------------
	function GetImagePath()
	{
		return _LANG_FILE_( "images/buttons/##LANG_CODE##/" );
	}

	//----------------------------------------------------------------
	// GetDefaultButtonType()
	//----------------------------------------------------------------
	function GetDefaultButtonType()
	{
		// '<>' => '</>'
		// '<>' => '<html/>'
		// '<>' => '<image/>'
		// '<>' => '<rollover/>'
		return "rollover";
	}

	//----------------------------------------------------------------
	// Section
	//----------------------------------------------------------------
	function SectBegin( $label = null )
	{
		if ( is_null($label) )
		{
			echo "<span class=''>&nbsp;</span>";
		}
		else
		{
			echo "<span class='sect_title'>{$label}</span>";
		}
		include( 'include/tpl.box.def_begin.inc.php' );
	}

	function SectEnd()
	{
		include( 'include/tpl.box.def_end.inc.php' );
	}

	function SectEndMarker()
	{
		include( 'include/tpl.box.end_marker.inc.php' );
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>