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
// String Functions
//----------------------------------------------------------------
class CStr
{
	function e2n( $s )
	{
		return ( $s == '' ? null : $s );
	}

	function n2e( $s )
	{
		return ( is_null( $s ) ? '' : $s );
	}

	function html( $s )
	{
		if ( is_null( $s ) )
			return '';
		else
			return htmlspecialchars( $s );
	}

	function implode( $sepa, $ax, $idx )
	{
		$s = '';
		foreach( $ax as $v )
		{
			if ( $s != '' ) $s .= $sepa;
			$s .= $v[$idx];
		}
		return $s;
	}
}

?>