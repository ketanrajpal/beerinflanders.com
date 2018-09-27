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

$mysql_connect_error_msg = '';
function mysql_connect_error_handler( $errno, $errstr, $errfile, $errline )
{
	if ( strpos($errstr,"mysql extension is deprecated") !== false ) {
		return false;
	}

	global $mysql_connect_error_msg;
	$mysql_connect_error_msg = $errstr;
    return true;
}

//----------------------------------------------------------------
// CXMySQL
//----------------------------------------------------------------
class CXMySQL
{
	function __construct()
	{
		$this->resetError();
	}

	function __destruct()
	{
	}

	function setError( $errno, $errmsg )
	{
		$this->errno = $errno;
		$this->errmsg = $errmsg;
	}

	function checkError()
	{
		if ( !$this->isError() )
		{
			$this->setError(
				mysql_errno( $this->conn ),
				mysql_error( $this->conn )
			);
		}
	}

	function isError()
	{
		return ( $this->errno != 0 );
	}

	function resetError()
	{
		$this->errno = 0;
		$this->errmsg = '';
	}

	function getErrMsg()
	{
		return '(' . $this->errno . ') ' . $this->errmsg;
		//return $this->errmsg;
	}

	function connect( $hostname, $username, $password )
	{
		set_error_handler( 'mysql_connect_error_handler' );
		$this->conn = mysql_connect( $hostname, $username, $password );
		restore_error_handler();

		global $mysql_connect_error_msg;
		if ( $mysql_connect_error_msg != '' )
		{
			$this->setError( -999, $mysql_connect_error_msg );
			$mysql_connect_error_msg = '';
			return false;
		}

		return $this->conn;
	}

	function selectDB( $database )
	{
		if ( $this->isError() ) false;
		if ( !@mysql_select_db( $database, $this->conn ) )
		{
			$this->checkError();
			return false;
		}
		return true;
	}

	function query( $sql )
	{
		if ( $this->isError() ) false;
		if ( !( $result = @mysql_query( $sql, $this->conn ) ) )
			$this->checkError();
		return $result;
	}

	function getRowCount( $result )
	{
		if ( !$result ) return false;
		if ( $this->isError() ) false;
		if ( ( $num = @mysql_num_rows( $result ) ) === false )
			$this->checkError();
		return $num;
	}

	function getRowA( $result )
	{
		if ( !$result ) return false;
		if ( $this->isError() ) false;
		if ( ( $rs = @mysql_fetch_array( $result, MYSQL_ASSOC ) ) === false )
			$this->checkError();
		return $rs;
	}

	function freeResult( $result )
	{
		if ( !$result ) return false;
		if ( !( $ret = @mysql_free_result( $result ) ) )
			if ( !$this->isError() ) $this->checkError();
		return $ret;
	}

	function close()
	{
		if ( !( $this->conn ) ) return false;
		if ( $ret = @mysql_close( $this->conn ) )
			$this->conn = null;
		else if ( !$this->isError() )
			$this->checkError();
		return $ret;
	}
}

//----------------------------------------------------------------
// CMySqlTool
//----------------------------------------------------------------
class CMySqlTool
{
	function __construct()
	{
		$this->resetError();
	}

	function __destruct()
	{
	}

	function resetError()
	{
		$this->errmsg = '';
	}

	function isError()
	{
		return ( $this->errmsg != '' );
	}

	function getErrMsg()
	{
		return $this->errmsg;
	}

	function setErrMsg( $errmsg )
	{
		if ( !$this->isError() )
			return $this->errmsg = $errmsg;
		else
			return '';
	}

	//----------------------------------------------------------------
	// testConnection
	//----------------------------------------------------------------
	function testConnection( $px )
	{
		$db =& new CXMySQL();
		$conn = $db->connect( $px['hostname'], $px['username'], $px['password'] );
		$db->close();
		if ( $db->isError() ) $this->setErrMsg( $db->getErrMsg() );
		return !$db->isError();
	}

	//----------------------------------------------------------------
	// dbExists
	//----------------------------------------------------------------
	function dbExists( $px )
	{
		$db =& new CXMySQL();
		$conn = $db->connect( $px['hostname'], $px['username'], $px['password'] );
		$db->selectDB( $px['database'] );
		$db->close();
		if ( $db->isError() ) $this->setErrMsg( $db->getErrMsg() );
		return !$db->isError();
	}

	//----------------------------------------------------------------
	// tableExists
	//----------------------------------------------------------------
	function tableExists( $px )
	{
		$db =& new CXMySQL();
		$conn = $db->connect( $px['hostname'], $px['username'], $px['password'] );
		$db->query( 'SET NAMES utf8;' );
		$db->selectDB( $px['database'] );
		$field_name = "Tables_in_" . $px['database'];
		$result = $db->query( "SHOW TABLES WHERE `{$field_name}`='{$px['table']}';" );
		$b = ( $db->getRowCount( $result ) > 0 );
		$db->freeResult( $result );
		$db->close();
		if ( $db->isError() ) $this->setErrMsg( $db->getErrMsg() );
		return $b;
	}

	//----------------------------------------------------------------
	// getTableSchema
	//----------------------------------------------------------------
	function getTableSchema( $px )
	{
		$db =& new CXMySQL();
		$conn = $db->connect( $px['hostname'], $px['username'], $px['password'] );
		$db->query( 'SET NAMES utf8;' );
		$result = $db->query( "SHOW CREATE TABLE `{$px['database']}`.{$px['table']};" );
		$sql = '';
		if ( $rs = $db->getRowA( $result ) )
		{
			$sql = $rs['Create Table'] . ';';
		}
		else
		{
			$this->setErrMsg( "Can not obtain table schema of " . 
				"'{$px['database']}.{$px['table']}'" );
		}
		$db->freeResult( $result );
		$db->close();
		if ( $db->isError() ) $this->setErrMsg( $db->getErrMsg() );
		return $sql;
	}

	//----------------------------------------------------------------
	// runSqlText
	//----------------------------------------------------------------
	function runSqlText( $px, $sql )
	{
		//-- [BEGIN] Split Sql Text
		$sql = str_replace( "\r", "", $sql );
		$ax = split( "\n", $sql );
		$bx = array();
		$cx = array();
		foreach( $ax as $s )
		{
			if ( substr( $s, 0, 2 ) != "--" )
			{
				$bx[] = $s;
				if (( strlen( $s ) > 0 ) && ( substr( $s, strlen($s)-1, 1 ) == ";" ))
				{
					$cx[] = implode( "\n", $bx );
					$bx = array();
				}
			}
		}
		//-- [END] Split Sql Text

		$db =& new CXMySQL();
		$conn = $db->connect( $px['hostname'], $px['username'], $px['password'] );
		$db->query( 'SET NAMES utf8;' );
		$db->selectDB( $px['database'] );

		foreach( $cx as $s )
		{
			$db->query( $s . ";" );
			if ( $db->isError() )
			{
				$this->setErrMsg( $db->getErrMsg() );
				break;
			}
		}
	}
}

?>
