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
// CPath
//----------------------------------------------------------------
class CPath
{
	function ThisFullFileUrl()
	{
		$bHTTPS = (( isset($_SERVER["HTTPS"]) ) && ( $_SERVER["HTTPS"] == "on" ));

		$pageURL = ( $bHTTPS ? "https" : "http" );
		$pageURL .= "://";
		$pageURL .= $_SERVER["SERVER_NAME"];

		if ( !$bHTTPS && ( $_SERVER["SERVER_PORT"] != "80" ) )
			$pageURL .= ":" . $_SERVER["SERVER_PORT"];

		$pageURL .= $_SERVER['PHP_SELF'];

		return $pageURL;
	}

	function ThisFileUrl()
	{
		return $_SERVER['PHP_SELF'];
	}

	function ThisFolderUrl()
	{
		$path = CPath::ThisFileUrl();
		$pos = strrpos( $path, '/' );
		return substr( $path, 0, $pos+1 );
	}

	function ThisFileName()
	{
		$path = CPath::ThisFileUrl();
		$pos = strrpos( $path, '/' );
		return substr( $path, $pos+1 );
	}

	function ThisFilePath()
	{
		if ( isset( $_SERVER['SCRIPT_FILENAME'] ) )
			$path = $_SERVER['SCRIPT_FILENAME'];
		else
			$path = $_SERVER["PATH_TRANSLATED"];

		return str_replace( "\\", '/', $path );
	}

	function ThisFolderPath()
	{
		$path = CPath::ThisFilePath();
		if (( $pos = strrpos( $path, '/' ) ) !== false )
			return substr( $path, 0, $pos+1 );
		else if (( $pos = strrpos( $path, "\\" ) ) !== false )
			return substr( $path, 0, $pos+1 );
		else
			return $path;
	}
}

//----------------------------------------------------------------
// CPath Test
//----------------------------------------------------------------
/*
$obj =& new CPath();
$s = '';
$s .= "ThisFullFileUrl() : " . $obj->ThisFullFileUrl() . "<br/>";
$s .= "ThisFileUrl() : " . $obj->ThisFileUrl() . "<br/>";
$s .= "ThisFolderUrl() : " . $obj->ThisFolderUrl() . "<br/>";
$s .= "ThisFileName() : " . $obj->ThisFileName() . "<br/>";
$s .= "ThisFilePath() : " . $obj->ThisFilePath() . "<br/>";
$s .= "ThisFolderPath() : " . $obj->ThisFolderPath() . "<br/>";
echo $s;
*/

?>