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
// CUtil
//----------------------------------------------------------------
class CUtil
{
	function &CreateObject( $class_name )
	{
		$p = null;
		eval( "\$p =& new " . $class_name . ";" );
		return $p;
	}

	function CurrentTimeStamp()
	{
		return date("Y-m-d H:i:s");
	}

	function DateAdd( $t, $d_year, $d_month, $d_day, $d_hour, $d_min, $d_sec )
	{
		return mktime(
			date( "H", $t ) + $d_hour,
			date( "i", $t ) + $d_min,
			date( "s", $t ) + $d_sec,
			date( "m", $t ) + $d_month,
			date( "d", $t ) + $d_day,
			date( "Y", $t ) + $d_year
		);
	}

	function CreateRandomString( $n )
	{
		$s = '';
		for ( $i = 0; $i < $n; $i++ )
		if ( rand( 1, 2 ) == 1 )
			$s .= chr(rand(97, 122));
		else
			$s .= chr(rand(65, 90));
		return $s;
	}

	function CheckOption( $s, $key )
	{
		return in_array( $key, split( ",", $s ) );
	}

	function PrintPairs( $kv )
	{
		$s = '';
		$s .= "<table border='0' cellpadding='4', cellspacing='3'>";

		foreach ( $kv as $key => $val )
		{
			$s .= '<tr>';
			$s .= "<td bgcolor='#000080'><font color='#ffffff'>" . CStr::html($key) . "</font> : </td>";
			$s .= "<td bgcolor='#c0c0ff'>" . CStr::html($val) .'</td>';
			$s .= '</tr>';
		}
		$s .= '</table>';

		return $s;
	}
	
	function Text2Dict( $txt )
	{
		$txt = CMBStr::replace( "\r", '', $txt );
		$ax = CMBStr::split( "\n", $txt );
		$bx = array();

		for ( $i = 0; $i < count( $ax ); $i++ )
		{
			$L = $ax[ $i ];

			if ( CMBStr::substr($L,0,2) == "//" )
			{
				// do nothing
			}
			else if ( $L != "" )
			{
				CMBStr::splite( $L, $key, $val );
				$bx[$key] = $val;
			}
		}
		return $bx;
	}

	function Redirect( $url )
	{
		header( 'Location: ' . $url );
	}

	function EncryptPassword( $s )
	{
		return md5($s);
	}

	function JSDocumentWrite( $txt )
	{
		if ( isset( $_GET['_direct_'] ) )
		{
			return $txt;
		}
		$txt = str_replace( "\r", "", $txt );
		$ax = split( "\n", $txt );
		$bx = array();
		foreach( $ax as $line )
		{
			if ( $line != "" )
			{
				$s = str_replace( '"', '\"', $line );
				$s = str_replace( '</script>', '</scr"+"ipt>', $line );
				$s = "document.write( \"" . $s . "\" );\r\n";
				$bx[] = $s;
			}
		}
		return implode( "\r\n", $bx );
	}
}

?>