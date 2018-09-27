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

	// 22527 = E_ALL & ~E_DEPRECATED & ~E_STRICT
	error_reporting( 22527 );

$LANG_CODE = "en";
include( 'common.inc.php' );

class CPageInstall
{
	var $pageset = 'install';

	//----------------------------------------------------------------
	// setErrMsg
	//----------------------------------------------------------------
	function setErrMsg( $err_msg )
	{
		$this->err_msg = $err_msg;
	}

	//----------------------------------------------------------------
	// getErrMsg
	//----------------------------------------------------------------
	function getErrMsg()
	{
		return $this->err_msg;
	}

	//----------------------------------------------------------------
	// resetError
	//----------------------------------------------------------------
	function resetError()
	{
		$this->err_msg = '';
	}

	//----------------------------------------------------------------
	// isError
	//----------------------------------------------------------------
	function isError()
	{
		return ( $this->err_msg != '' );
	}

	//----------------------------------------------------------------
	// getTableList
	//----------------------------------------------------------------
	function getTableList()
	{
		$ax = array();
		$txt = file_get_contents( "../codelib/cfg/config.table_name.inc.php" );
		$pat = '/define<space>\(<space>\'(<word>)\'<space>,/s';
		$pat = str_replace( "<space>", "\s*", $pat );
		$pat = str_replace( "<word>", "\w+", $pat );
		if ( preg_match_all( $pat, $txt, $matches ) )
		{
			foreach( $matches[1] as $s )
				if ( $s != 'TBL_PREFIX' )
					$ax[] = strtolower( $s );
		}
		return $ax;
	}

	//----------------------------------------------------------------
	// createTables
	//----------------------------------------------------------------
	function createTables()
	{
		$mst = new CMySqlTool();

		$px['hostname'] = DB_HOSTNAME;
		$px['username'] = DB_USERNAME;
		$px['password'] = DB_PASSWORD;
		$px['database'] = DB_DATABASE;

		$co = "<font color='#008000'>";
		$cc = "</font>";

		//-- testConnection
		$b = $mst->testConnection( $px );
		if ( $mst->isError() )
		{
			$msg = ERR_CANNOT_CONNECT_TO_DB;
			$msg = str_replace( "##co##", $co, $msg );
			$msg = str_replace( "##hostname##", $px['hostname'], $msg );
			$msg = str_replace( "##cc##", $cc, $msg );
			$this->setErrMsg( $msg );

			$ax = split( ':', $mst->getErrMsg() );
			for( $i = 1; $i < count( $ax ); $i++ )
			{
				$msg = $msg . ' : ' . $ax[$i];
			}
			$this->setErrMsg( $msg );
			return false;
		}

		//-- dbExists
		$b = $mst->dbExists( $px );
		if ( $mst->isError() )
		{
			$msg = ERR_CANNOT_FIND_DB;
			$msg = str_replace( "##co##", $co, $msg );
			$msg = str_replace( "##database##", $px['database'], $msg );
			$msg = str_replace( "##cc##", $cc, $msg );
			$this->setErrMsg( $msg );

			return false;
		}

		//-- get table list
		$ax = $this->getTableList();
		// foreach ( $ax as $s ) echo $s;

		//-- tableExists
		foreach ( $ax as $table_name )
		{
			$px['table'] = $table_name;
			$b = $mst->tableExists( $px );
			if ( $mst->isError() )
			{
				$this->setErrMsg( $mst->getErrMsg() );
				return false;
			}

			if ( $b )
			{
				$msg = ERR_TABLE_EXISTS;
				$msg = str_replace( "##table##", $px['table'], $msg );
				$msg = str_replace( "##database##", $px['database'], $msg );
				$this->setErrMsg( $msg );

				return false;
			}
		}

		//-- create Tables
		$sql = file_get_contents( "sql/sql.txt" );
		$mst->runSqlText( $px, $sql );
		if ( $mst->isError() )
		{
			$this->setErrMsg( $mst->getErrMsg() );
			return false;
		}

		return true;
	}

	//----------------------------------------------------------------
	// showPage
	//----------------------------------------------------------------
	function showPage( $key )
	{
		$sys =& $this;
		include( 'tpl.' . $this->pageset . '.' . $key . '.inc.php' );
	}

	//----------------------------------------------------------------
	// main
	//----------------------------------------------------------------
	function main()
	{
		//$this->showPage( 'done' );die;

		$this->resetError();
		if ( isset( $_POST['_postback'] ) && ( $_POST['_postback'] == 'y' ) )
		{
			$b = $this->createTables();
			if ( $b )
			{
				$this->showPage( 'done' );
				return;
			}
		}
		$this->showPage( 'home' );
	}
}

//----------------------------------------------------------------
// PageInstall
//----------------------------------------------------------------
$pg = new CPageInstall();
$pg->main();

?>
