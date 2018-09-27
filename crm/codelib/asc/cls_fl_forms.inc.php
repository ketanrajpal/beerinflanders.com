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
// cls_fl_forms 
//----------------------------------------------------------------
class cls_fl_forms extends cls_fl_aso
{
}

//----------------------------------------------------------------
// cls_form_EmailConf
//----------------------------------------------------------------
class cls_form_EmailConf extends CVEmail
{
	function Validate_Value( &$msg )
	{
		$v = $this->val;
		if ( !parent::Validate_Value( $msg ) ) return false;
		if ( !$this->Validate_Conf( $v ) ) return false;
		return true;
	}

	function Validate_Conf( $v )
	{
		$obj =& $this->prt->GetChild('email');
		if ( ! ( $v == $obj->GetVal() ) )
		{
			$this->SetErrMsg( RSTR_ERR_CAN_NOT_CONFIRM, $v );
			return false;
		}

		return true;
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>