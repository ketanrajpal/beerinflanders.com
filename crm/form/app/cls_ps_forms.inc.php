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
// cls_ps_forms 
//----------------------------------------------------------------
class cls_ps_forms extends cls_ps_base
{
	var $ps_caption = RSTR_FORMS;
	var $fs_name = 'forms';
	var $fs_reg_init = array( '(g_reg_page1)' );
	var $fs_reg_page1 = array( '(g_reg_page1)' );
	var $fs_reg_page2 = array( '(g_reg_page2)' );
	var $fs_reg_page3 = array( '(g_reg_save)', '(reg_save)' );
	var $config_email = "config.email.form.php";

	//------------------------------------------------------------
	// CommandProc
	//------------------------------------------------------------
	function CommandProc( &$sc )
	{
		//-- [BEGIN] Assign PageSig
		$pagesig_key = 'pagesig:' . get_class( $this );
		//-- [END] Assign PageSig

		//-- [BEGIN] Get default field set
		$def =& $this->GetFieldList( $this->fs_name );
		//-- [END] Get default field set

		//-- [BEGIN] Read command
		$cmd = $sc->Cmd();
		//-- [END] Read command

		switch( $cmd )
		{

		//------------------------------------------------------
		// Reg Init
		//------------------------------------------------------
		case 'reg_init':

			//-- [BEGIN] Set PageID
			$sc->SetPageID( "reg_init" );
			//-- [END] Set PageID

			//-- [BEGIN] Mark PageSig
			$this->sys->PageSig->Mark( $pagesig_key );
			//-- [END] Mark PageSig

			//-- [BEGIN] Set init values
			$def->SetNS( "rs:def:" );
			$def->SetList( $this->fs_reg_init );
			$def->SetEmpty();
			$def->FromInitValue( 'reg' );

			$iv = $def->GetInitValues();
			if ( $iv != null )
			{
				foreach( $iv as $key=>$val )
				{
					$obj =& $def->GetChild( $key );
					$obj->SetVal( $val );
				}
			}
			$def->ToState();
			//-- [END] Set init values

			//-- [BEGIN] Go
			$sc->SetNextSc( "reg_page1" );
			//-- [END] Go

			break;

		//------------------------------------------------------
		// Reg Page1
		//------------------------------------------------------
		case 'reg_page1':

			//-- [BEGIN] Validate prev PageID & Set new PageID
			if ( !$sc->CheckPrevPageID(
				array(
					'reg_init',
					'reg_page1',
					'reg_page2',
					'reg_page3'
				)
			) ) break;
			$sc->SetPageID( "reg_page1" );
			//-- [END] Validate prev PageID & Set new PageID

			//-- [BEGIN] Load data from state
			$def->SetNS( "rs:def:" );
			$def->SetList( $this->fs_reg_page1 );
			$def->FromState();
			//-- [END] Load data from state

			//-- [BEGIN] Output
			$def->ToZBuffer( XC_OF_INPUT );
			//-- [END] Output

			//-- [BEGIN] Set display on
			$this->SetDisplay( "def:", true );
			//-- [END] Set display on

			//-- [BEGIN] Set template page
			$this->SetPage( $sc, "reg_page1" );
			//-- [END] Set template page

			break;

		case 'reg_page1_next':

			//-- [BEGIN] Set return page
			$sc->SetNextSc( "reg_page1" );
			//-- [END] Set return page

			//-- [BEGIN] Load data from input to state and validate
			$def->SetNS( 'rs:def:' );
			$def->SetList( $this->fs_reg_page1 );
			$def->FromInput();
			$def->ToState();
			if ( !$def->Validate( XPT_INPUT ) ) break;
			//-- [END] Load data from input to state and validate

			//-- [BEGIN] Go
			$sc->SetNextSc( "reg_page2" );
			//-- [END] Go

			break;

		//------------------------------------------------------
		// Reg Page2 
		//------------------------------------------------------
		case "reg_page2":

			//-- [BEGIN] Validate prev PageID & Set new PageID
			if ( !$sc->CheckPrevPageID(
				array(
					"reg_page1"
				)
			) ) break;
			$sc->SetPageID( "reg_page2" );
			//-- [END] Validate prev PageID & Set new PageID

			//-- [BEGIN] Load values from State
			$def->SetNS( "rs:def:" );
			$def->SetList( $this->fs_reg_page2 );
			$def->FromState();
			//-- [END] Load values from State

			//-- [BEGIN] Output
			$def->ToZBuffer( XC_OF_DEFAULT );
			//-- [END] Output

			//-- [BEGIN] Set display on
			$this->SetDisplay( "def:", true );
			//-- [END] Set display on

			//-- [BEGIN] Set template page
			$this->SetPage( $sc, "reg_page2" );
			//-- [END] Set template page

			break;

		case 'reg_page2_prev':

			//-- [BEGIN] Go
			$sc->SetNextSc( "reg_page1" );
			//-- [END] Go

			break;

		case 'reg_page2_next':

			//-- [BEGIN] Go
			$sc->SetNextSc( "reg_page3" );
			//-- [END] Go

			break;

		//------------------------------------------------------
		// Reg Page3 
		//------------------------------------------------------
		case "reg_page3":

			//-- [BEGIN] Validate prev PageID & Set new PageID
			if ( !$sc->CheckPrevPageID(
				array(
					"reg_page2"
				)
			) ) break;
			$sc->SetPageID( "reg_page3" );
			//-- [END] Validate prev PageID & Set new PageID

			//-- [BEGIN] Set return page
			$sc->SetNextSc( "reg_page1" );
			//-- [END] Set return page

			//-- [BEGIN] Check PageSig
			if ( !DEBUG_SKIP_DOUBLE_SUBMIT_CHECK )
			{
				if ( !$this->sys->PageSig->Check( $pagesig_key ) )
				{
					$sc->DoubleSubmitError();
					break;
				}
			}
			//-- [END] Check PageSig

			//-- [BEGIN] Load data from state
			$def->SetNS( "rs:def:" );
			$def->SetList( $this->fs_reg_page3 );
			$def->FromState();
			//-- [END] Load data from state

			//-- [BEGIN] Set additional init values
			$obj =& $def->GetChild('active');
			$obj->SetVal('Y');
			//-- [END] Set additional init values

			//-- [BEGIN] Output
			$def->SetNS( 'rs:def:' );
			$def->SetList( $this->fs_reg_page3 );
			$def->ToZBuffer( XC_OF_DEFAULT );
			//-- [END] Output

			//-- [BEGIN] Save data into database
			$def->SetList( $this->fs_reg_page3 );
			$id = $def->InsertRecordSet();
			//-- [END] Save data into database

			//-- [BEGIN] Send email
			if ( !$this->SendRegEmail( $def,
				$this->fs_reg_page3,
				$this->config_email
			) ) break;
			//-- [END] Send email

			//-- [BEGIN] Clear PageSig
			$this->sys->PageSig->Clear( $pagesig_key );
			//-- [END] Clear PageSig

			//-- [BEGIN] Set display on
			$this->SetDisplay( "def:", true );
			//-- [END] Set display on

			//-- [BEGIN] Set template page
			$this->SetPage( $sc, "reg_page3" );
			//-- [END] Set template page

			break;

		//------------------------------------------------------
		// Page Not Found
		//------------------------------------------------------
		default:

			//-- [BEGIN] Unknown command
			$sc->RaiseError( SC_ERR_PAGE_NOT_FOUND );
			//-- [END] Unknown command

			break;
		}
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>