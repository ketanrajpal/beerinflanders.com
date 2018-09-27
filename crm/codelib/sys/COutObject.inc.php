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
// COutObject
//----------------------------------------------------------------
class COutObject
{
	function Render()
	{
		return '';
	}

	function PaintError()
	{
	}
}

//----------------------------------------------------------------
// COutString
//----------------------------------------------------------------
//
//	$ht =& new COutString();
//	$ht->Set( '---template---', array( item, item item... );
//
//	$ht =& new COutString();
//	$ht->AddItem( item );
//	$ht->AddItem( item );
//	$ht->AddItem( item );
//	.....................
//
class COutString extends COutObject
{
	var $items;
	var $template;
	
	function COutString()
	{
		$this->template = null;
		$this->items = array();
	}

	function Set( $template, $items = null )
	{
		$this->template = $template;
		if ( !is_null( $items ) ) $this->items = $items;
	}

	function AddItem( $item )
	{
		$this->items[] = $item;
	}

	function Render( $format_encoding )
	{
		$ax = array();
		for( $i = 0; $i < count($this->items); $i++ )
		{
			$item = $this->items[$i];
			if ( is_object( $item ) )
				$ax[] = $this->items[$i]->Render( $format_encoding );
			else
			{
				switch( $format_encoding )
				{
				case 'html':
					$s = CStr::html( $item );
					$s = CMBStr::replace( "\r\n", '<br/>', $s );
					break;
				default:
					$s = $item;
					break;
				}

				$ax[] = $s;
			}
		}

		if ( count( $ax ) == 0  )
		{
			$s = '';
		}
		else
		{
			if ( is_null( $this->template ) )
				$s = implode( '', $ax );
			else
				$s = vsprintf( $this->template, $ax );
		}

		return $s;
	}

	function PaintError()
	{
		for( $i = 0; $i < count($this->items); $i++ )
		{
			$p =& $this->items[$i];
			if ( is_object( $p ) ) $p->PaintError();
		}
	}
}

//----------------------------------------------------------------
// COutHtml
//----------------------------------------------------------------
class COutHtml extends COutObject
{
	var $tag_name;
	var $kv;
	var $inside;
	var $err_msg;

	function COutHtml()
	{
		$this->tag_name = "";
		$this->attri = array();
		$this->inside = null;
		$this->err_flag = null;
	}

	function SetTagName( $tag_name )
	{
		$this->tag_name = $tag_name;
	}

	function SetInside( $inside )
	{
		$this->inside = $inside;
	}

	//-------------------------------------------
	// SetKV
	//-------------------------------------------
	//
	// Add 'readonly'
	// ->SetKV( 'readonly' )
	//
	// Remove 'readonly'
	// ->SetKV( 'readonly', null )
	//
	// Add 'checked'
	// ->SetKV( 'checked' )
	//
	// remove 'checked'
	// ->SetKV( 'checked', null )
	//
	// Add 'name'
	// ->SetKV( 'name', 'street' )
	//
	// Remove 'name'
	// ->SetKV( 'name', null )
	//
	// Append new class to exisiting class
	// ->SetKV( 'class', 'myclass' )
	//
	// Replace exisiting class with a new class
	// ->SetKV( 'class', 'myclass' )
	//
	// Remove exisiting class
	// ->SetKV( 'class', null )
	//
	// Append new style to exisiting style
	// ->SetKV( 'style', array( 'color'=>'#ffffff', 'font-size'=>12 ) )
	//
	// Replace exisiting style with new style
	// ->SetKV( 'style', array( 'color'=>'#ffffff', 'font-size'=>12 ), false )
	//
	// Remove exisiting style
	// ->SetKV( 'style', null )
	//
	//-------------------------------------------
	function SetKV( $key, $val = nothing, $b_append = true )
	{
		if ( $val == null )
		{
			unset( $this->attri[$key] );
		}
		else if ( $key == 'class' )
		{
			$this->SetClass( $val, $b_append );
		}
		else if ( $key == 'style' )
		{
			foreach( $val as $k => $v )
			{
				$this->SetStyle( $k, $v, $b_append );
			}
		}
		else
		{
			$this->attri[$key] = $val;
		}
	}

	function SetClass( $val, $b_append = true )
	{
		if ( $b_append && isset( $this->attri['class'] ) )
			$this->attri['class'][] = $val;
		else
			$this->attri['class'] = array( $val );
	}

	function SetStyle( $key, $val, $b_append = true )
	{
		if ( $b_append && isset( $this->attri['style'] ) )
			$this->attri['style'][$key] = $val;
		else
			$this->attri['style'] = array( $key=>$val );
	}

	function Render( $format_encoding )
	{
		if ( is_null( $this->inside ) )
			$inside = '';
		else if ( is_object( $this->inside ) )
			$inside = $this->inside->Render( $format_encoding );
		else
			$inside = $this->inside;

		if ( $format_encoding == 'html' )
		{
			$ax = array();
			$ax[] = '<' . $this->tag_name;
			foreach( $this->attri as $key => $val )
			{
				if ( $val == nothing )
				{
					$ax[] = $key;
				}
				else if ( $key == 'class' )
				{
					$class= implode( ' ', $val );
					$ax[] = $key . "=\"" . $class . "\"";
				}
				else if ( $key == 'style' )
				{
					$style= '';
					foreach( $val as $k => $v )
						$style .= $k .':' . $v .';';
					$ax[] = $key . "=\"" . $style . "\"";
				}
				else
				{
					$ax[] = $key . "=\"" . $val . "\"";
				}
			}

			$s = implode( ' ', $ax );

			if ( is_null( $this->inside ) )
				$s .= '/>';
			else
				$s .= '>' . $inside . '</' . $this->tag_name . '>';
		}
		else
			$s = $inside;

		return $s;
	}

	function SetErrMsg( $err_msg )
	{
		$this->err_msg = $err_msg;
	}

	function GetErrMsg( $format_encoding )
	{
		if ( $format_encoding == 'html' )
			$s = CStr::html( $this->err_msg );
		else
			$s = $this->err_msg;
		return $s;
	}

	function IsError()
	{
		return !is_null( $this->err_msg );
	}

	function PaintError()
	{
		if ( is_object( $this->inside ) )
		{
			$this->inside->PaintError();
		}
		else if ( $this->IsError() )
		{
			$this->SetKV( 'class', 'zb_error', true );
		}
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>