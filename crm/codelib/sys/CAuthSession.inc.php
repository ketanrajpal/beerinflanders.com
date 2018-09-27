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
// CAuthSession
//----------------------------------------------------------------
class CAuthSession extends CObject
{
	function GetKey()
	{
		return AUTHSESSION_KEY;
	}
	
	function Enable()
	{
		$_SESSION[$this->GetKey()] = $this->GetKey();
	}

	function Terminate()
	{
		unset( $_SESSION[$this->GetKey()] );
	}

	function Check()
	{
		return isset( $_SESSION[$this->GetKey()] ) && 
			( $_SESSION[$this->GetKey()] == $this->GetKey() );
	}

	function SetV( $key , $val )
	{
		$_SESSION[$this->GetKey() . $key ] = $val;
	}

	function SetAV( $ax )
	{
		foreach ( $ax as $key => $val )
			$_SESSION[$this->GetKey() . $key ] = $val;
	}

	function GetV( $key )
	{
		if ( isset( $_SESSION[$this->GetKey() . $key ] ) )
			return $_SESSION[$this->GetKey() . $key ];
		else
			return '';
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>