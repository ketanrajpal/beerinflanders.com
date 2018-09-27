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
// CZBuffer
//----------------------------------------------------------------

//-- 'No Value' to set 'readonly', 'checked'
define( 'ZBUFFER_NO_VALUE', nothing ); 

//-- Empty string in html
define( 'ZBUFFER_STR_NULL', '&nbsp;' );

//-- Callback Function
define( 'ZB_CBF', 1 );

//-- Set Attributes
define( 'ZB_SA', 2 ); 

//-- Append Attributes ( for 'class' & 'style' )
define( 'ZB_AA', 3 ); 

//-- Get Error Message
define( 'ZB_ERRMSG', 4 ); 

//-- Check if it's error
define( 'ZB_ISERR', 5 ); 

class CZBuffer extends CObject
{
	var $buff;
	var $cbf_arr = array();
	var $unknown_cbf_arr = array();

	function Set( $key, $val )
	{
		$this->buff[ $key ] = $val;
	}

	function SetCallBack( $name, &$obj, $method = null )
	{
		$this->cbf_arr[$name] =& $obj;
	}

	function Get( $key, $filter_type = null, $filter_param = null )
	{
		//---------------------------
		// Boolean & Text format
		//---------------------------
		$last_char = substr( $key, strlen($key)-1, 1 );
		$b_found = false;
		$b_bool = false;
		$b_direct = false;
		$format_encoding = 'html';

		switch ( $last_char )
		{
		case '?':
			$b_found = true;
			$b_bool = true;
			break;

		case '=':
			$b_found = true;
			$b_direct = true;
			$format_encoding = 'text';
			break;
		}

		if ( $b_found )
		{
			$key = substr( $key, 0, strlen($key)-1 );
		}

		//---------------------------
		// Callback Function
		//---------------------------
		if ( substr($key,0,1) == '@' )
		{
			$key = substr($key,1);
			if ( array_key_exists( $key, $this->cbf_arr ) )
			{
				$ax = split( ":", $key );
				$method_name = $ax[ count($ax)-1 ];
				$obj =& $this->cbf_arr[ $key ];
				return call_user_func( array( &$obj, $method_name ) );
			}
			else 
			{
				if ( array_key_exists( $key, $this->unknown_cbf_arr ) )
				{
					return false;
				}
				else
				{
					$this->unknown_cbf_arr[$key] = 1;
					return true;
				}
			}
		}
		//---------------------------
		// Value
		//---------------------------
		else if ( isset( $this->buff[ $key ] ) )
		{
			$v = $this->buff[ $key ];

			if ( !is_null( $filter_type ) )
			{
				switch( $filter_type )
				{
				case ZB_CBF:
					$callback_function = ( is_null($filter_param) ?
						'zb_callback' : $filter_param );
					$v = call_user_func( $callback_function, $key, $v );
					break;

				case ZB_SA:
					$this->ZbAttr( $v, $filter_param, false );
					break;

				case ZB_AA:
					$this->ZbAttr( $v, $filter_param, true );
					break;
				}
			}

			if ( $b_bool )
			{
				return $v;
			}
			else if ( is_object( $v ) )
			{
				//-- [BEGIN] Check error state
				$v->PaintError();
				//-- [END] Check error state

				$b_outhtml = ( strcasecmp( get_class( $v ), 'COutHtml' ) == 0 );

				if ( $filter_type == ZB_ERRMSG )
				{
					if ( $b_outhtml && $v->IsError() )
					{
						$v = $v->GetErrMsg( $format_encoding );
						if ( !is_null( $filter_param ) )
						{
							$v = str_replace( '##err_msg##', $v, $filter_param );
						}
					}
					else
						return '';
				}
				else
				if ( $filter_type == ZB_ISERR )
				{
					if ( $b_outhtml )
						return $v->IsError();
					else
						return false;
				}
				else
				{
					$v = $v->Render( $format_encoding );
				}
			}

			if (( $v == null ) || ( $v == '' ))
			{
				if ( $format_encoding == 'text' )
					return '';
				else
					return ZBUFFER_STR_NULL;
			}
			else
				return $v;
		}
		//---------------------------
		// Unknown
		//---------------------------
		else
		{
			if ( $b_bool )
				return false;
			else
				return "<font color='#ff0000'>" . $key . "</font>";
		}
	}

	function Clear( $key )
	{
		unset($this->buff[ $key ]);
	}

	function Count()
	{
		return count($this->buff);
	}

	function PrintAll()
	{
		return CUtil::PrintPairs( $this->buff );
	}

	function ZbAttr( &$v, $ax, $b_append )
	{
		foreach( $ax as $key => $val )
		{
			$v->SetKV( $key, $val, $b_append );
		}
	}
}

//-----------------------------------------------------------------------
// END OF FILE
//-----------------------------------------------------------------------
?>