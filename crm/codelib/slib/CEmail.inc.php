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

define( 'LOG_MULTI_PART_DATA', false );
define( 'CSMTP_TIMEOUT', 40 );

//----------------------------------------------------------------
// CEmail
//----------------------------------------------------------------
include_once( "CMBStr.inc.php" );
define( 'HERE_DOC_KEY', "=<<<" );

class CEmail
{
	var $params = array();

	//----------------------------------------------------------------
	// ReadEmailAddress
	//----------------------------------------------------------------
	function ReadEmailAddress( $s )
	{
		$s = trim($s);
		$pat = '^([^<]+)<([^>]+)>$';
		mb_regex_encoding( "UTF-8" );
		$ax = array();
		if ( mb_ereg( $pat, $s, $matches ) )
		{
			$ax[] = trim( $matches[2] );
			$ax[] = CMBStr::replace( ",", "\\," , trim( $matches[1] ) );
		}
		else
		{
			$ax[] = $s;
		}
		return $ax;
	}

	//----------------------------------------------------------------
	// Conf File
	//----------------------------------------------------------------
	function OpenConfig( $path, $b_direct_config = false )
	{
		if ( $b_direct_config )
			$txt = $path;
		else
		{
			if ( !file_exists( $path ) )
			{
				echo "Can not find config file : {$path}";
				exit();
			}
			$txt = file_get_contents( $path );
		}

		$txt = CMBStr::replace( "\r\n", "\n", $txt );
		$tx = CMBStr::split( "\n", $txt );
		$params = array();
		$params[ "Encoding" ] = "UTF-8";

		$multi_line_key = "";
		$multi_line_end = "";
		$multi_line = "";
		foreach ( $tx as $ln )
		{
			if ( $multi_line_end != "" )
			{
				if ( trim($ln) == $multi_line_end )
				{
					$params[$multi_line_key] = $multi_line;
					$multi_line_end = "";
				}
				else
					$multi_line .= $ln . "\r\n";
			}
			else
			{
				if ( CMBStr::substr( $ln, 0, 2 ) != "//" )
				{
					$pos = CMBStr::strpos( $ln, HERE_DOC_KEY );
					if ( $pos !== false )
					{
						$multi_line_key = trim( CMBStr::substr( $ln, 0, $pos ));
						$multi_line_end = trim( CMBStr::substr( $ln, $pos+strlen(HERE_DOC_KEY), CMBStr::strlen($ln) ) );
						$multi_line = "";
					}
					else if ( trim( $ln ) != "" )
					{
						$this->split_by_e( $ln, $key, $val );
						if ( $key == "Inherits" )
						{
							$path_x = $this->get_folder_path($path) . $val;
							if ( file_exists( $path_x ) )
								$this->OpenConfig( $path_x );
							else
							{
								echo "Can not find include config file : {$path_x}";
								exit();
							}
						}
						else if ( CMBStr::substr( $key, 0, 1 ) == "!" )
						{
							$this->headers[ substr($key,1) ] = $val;
						}
						else
							$params[$key] = $val;
					}
				}
			}
		}

		$ls = array( "From", "To", "Reply-To", "Cc" , "Bcc", "Attachment" );
		foreach ( $ls as $key )
		{
			if ( isset( $params[$key] ) )
			{
				$ax = CMBStr::split( "\|", $params[$key] );
				$ax2= array();
				foreach ( $ax as $s )
				{
					$s = trim( $s );
					if ( CMBStr::strlen( $s ) > 0 )
					{
						$ax2[] = $this->ReadEmailAddress( $s );
					}
				}
				$params[$key] = $ax2;
			}
		}
		
		foreach ( $params as $key => $val )
		{
			$this->params[$key] = $val;
		}
	}
	
	function DisplayParams( $b_show = true )
	{
		$s = "";
		$s .= "<table border='1'>\r\n";
		foreach ( $this->params as $key => $val )
		{
			$s .= "<tr>\r\n";
			$s .= "<td valign='top'>{$key}</td>\r\n";
			$s .= "<td>\r\n";
			if ( is_array( $val ) )
			{
				$s .= "<table border='1'>\r\n";
				foreach ( $val as $val2 )
				{
					$s .= "<tr><td>\r\n";
					if ( is_array( $val2 ) )
					{
						$s .= "<table border='1'>";
						foreach ( $val2 as $val3 )
						{
							$s .= "<tr><td>{$val3}</td></tr>\r\n";
						}
						$s .= "</table>\r\n";
					}
					else
						$s .= $val2;
					$s .= "</td></tr>\r\n";
				}
				$s .= "</table>\r\n";
			}
			else
			{
				$s .= str_replace("\r\n","<br>",$val);
			}
			$s .= "</td>\r\n";
			$s .= "</tr>\r\n";
		}
		$s .= "</table>\r\n";
		
		if ( $b_show )
			echo $s;
		else
			return $s;
	}

	function GetParam( $key )
	{
		if ( isset( $this->params[$key] ) )
			return $this->params[$key];
		else
			return null;
	}

	function SetParam( $key, $val )
	{
		if ( is_null( $val ) )
			unset( $this->params[$key] );
		else
			$this->params[$key] = $val;
	}

	function AddParam( $key, $x )
	{
		if ( !isset( $this->params[$key] ) )
			$ax = array();
		else
			$ax = $this->params[$key];
		$ax[] = $x;
		$this->params[$key] = $ax;
	}

	function AddHeader( $key, $val )
	{
		$this->headers[$key] = $val;
	}

	//----------------------------------------------------------------
	// Utilities
	//----------------------------------------------------------------
	function split_by_e( $ln, &$key, &$val )
	{
		$pos = CMBStr::strpos( $ln, '=' );
		if ($pos === false)
		{
			$key = trim( $ln );
			$val = '';
		}
		else
		{
			$key = trim( CMBStr::substr( $ln, 0, $pos ) );
			$val = CMBStr::substr( $ln, $pos+1, CMBStr::strlen($ln) );
		}
	}

	function get_folder_path( $path )
	{
		$path_parts = pathinfo( $path );
		$dirname = $path_parts[ 'dirname' ];
		return $dirname . '/';
	}

	function base64_encode_and_split( $s )
	{
		return chunk_split( base64_encode( $s ), 72 );
	}

	function LineEncode( $s )
	{
		$encode = $this->GetEmailEncoding();
		$encode_prefix = "=?" . $encode . "?B?";

		$ret = "";
		$cnt = 0;
		$ch = "";
		$buff = "";
		$line_no = 1;
		$ss = mb_convert_encoding( $s, $encode, $this->GetEncoding() );
		$ss_len = mb_strlen( $ss, $encode );

		for( $i = 0; $i < $ss_len; $i++ )
		{
			$ch = mb_substr( $ss, $i, 1, $encode );
			$cnt += strlen( $ch );
			$buff .= $ch;

			if ( $cnt > 60 )
			{
				if ( $line_no > 1 ) $ret .= "\r\n ";
				$ret .= $encode_prefix . base64_encode($buff) . "?=";
				$line_no++;
				$buff = "";
				$cnt = 0;
			}
		}

		if( $buff != "" )
		{
			if ( $line_no > 1 ) $ret .= "\r\n ";
			$ret .= $encode_prefix . base64_encode( $buff ) . "?=";
		}

		return $ret;
	}

	function GetEncoding()
	{
		return $this->params['Encoding'];
	}
	
	function GetEmailEncoding()
	{
		return "utf-8";
	}

	function GetEmailCharSet()
	{
		return $this->GetEmailEncoding();
	}

	function IsAscii( $s )
	{
		mb_regex_encoding ( $this->GetEncoding() );
		return mb_ereg_match( "^[\x20-\x7E]*$", $s );
	}
	
	function CreateAddressLine( $ax )
	{
		$s = "";
		foreach ( $ax as $val )
		{
			if ( $s != '' ) $s .= ", ";

			$addr = $val[0];
			if ( isset( $val[1] ) )
			{
				$name = $val[1];
				if ( $this->IsAscii($name) )
					$s .= $name . " <" . $addr . ">";
				else
					$s .= $this->LineEncode( $name ) . " <" . $addr . ">";
			}
			else
				$s .= $addr;
		}
		
		return $s;
	}

	function DataSig()
	{
		return '//**//';
	}

	function BodyExists()
	{
		return ( isset( $this->params['Body'] ) );
	}

	function HtmlExists()
	{
		return ( isset( $this->params['Html'] ) );
	}

	function AttachmentExists()
	{
		return isset( $this->params['Attachment'] );
	}

	function WriteBoundaryMixDef()
	{
		$this->Write( "Content-Type: multipart/mixed;\r\n " .
			"boundary=\"{$this->mime_boundary_mix}\"\r\n" );
	}

	function WriteBoundaryAltDef()
	{
		$this->Write( "Content-Type: multipart/alternative;\r\n " .
			"boundary=\"{$this->mime_boundary_alt}\"\r\n\r\n" );
	}

	function WriteDataHeader()
	{
		//--- "From", "To", "Reply-To", "Cc", "Bcc"
		$ls = array( "From", "To", "Reply-To", "Cc", "Bcc" );
		foreach ( $ls as $key )
		{
			if ( isset( $this->params[$key] ) && !empty( $this->params[$key] ) )
			{
				$this->Write( $key . ": " . $this->CreateAddressLine( $this->params[$key] ) . "\r\n" );
			}
		}

		//--- "Subject"
		$this->Write( "Subject: " . $this->LineEncode( $this->params['Subject'] ) . "\r\n" );

		//--- Declear MIME Version
		$this->Write( "MIME-Version: 1.0\r\n" );

		//--- Additional Headers
		if ( isset( $this->headers ) )
		{
			foreach ( $this->headers as $key => $val )
			{
				if ( $val != '' )
				{
					$this->Write( $key . ': ' . $val . "\r\n" );
				}
			}
		}

		//--- Add Mine Boundary Sig. to Header
		$this->WriteBoundaryMixDef();

		//--- Add a Blank Line
		$this->Write( "\r\n" );
	}

	function WriteMuliPartMsg()
	{
		$this->Write( "This is a multi-part message in MIME format.\r\n\r\n" );
	}

	function WriteBoundaryMix( $b_end = false )
	{
		$ending = $b_end ? "--\r\n\r\n" : "\r\n";
		$this->Write( "--{$this->mime_boundary_mix}{$ending}" );
	}

	function WriteBoundaryAlt( $b_end = false )
	{
		$ending = $b_end ? "--\r\n\r\n" : "\r\n";
		$this->Write( "--{$this->mime_boundary_alt}{$ending}" );
	}

	function WriteBody()
	{
		$s = '';
		$s .= "Content-Type: text/plain;\r\n charset=\"" . $this->GetEmailCharSet() . "\"\r\n";
		$s .= "Content-Transfer-Encoding: base64\r\n\r\n";
		$this->Write( $s );

		$s = $this->params['Body'];
		$s = mb_convert_encoding( $s, $this->GetEmailEncoding(), $this->GetEncoding() );
		$s = $this->base64_encode_and_split( $s );
		$this->Write( $s );
		$this->Write( "\r\n" );
	}

	function WriteHtml()
	{
		$s = '';
		$s .= "Content-Type: text/html;\r\n charset=\"" . $this->GetEmailCharSet() . "\"\r\n";
		$s .= "Content-Transfer-Encoding: base64\r\n\r\n";
		$this->Write( $s );

		$s = $this->params['Html'];
		$s = mb_convert_encoding( $s, $this->GetEmailEncoding(), $this->GetEncoding() );
		$s = $this->base64_encode_and_split( $s );
		$this->Write( $s );
		$this->Write( "\r\n" );
	}

	function WriteAttachments( $attachment )
	{
		$att_file_path = $attachment[0];
		$att_file_type = $attachment[1];
		$att_file_name = $attachment[2];
		$att_file_name = $this->LineEncode( $att_file_name );

		$s = '';
		$s .= "Content-Type: {$att_file_type};\r\n";
		$s .= " name=\"{$att_file_name}\"\r\n";
		$s .= "Content-Disposition: attachment;\r\n";
		$s .= " filename=\"{$att_file_name}\"\r\n";
		$s .= "Content-Transfer-Encoding: base64\r\n\r\n";
		$this->Write( $s );

		if ( substr( $att_file_path, 0, strlen($this->DataSig())) == $this->DataSig() )
		{//-- Immediate Data
			$filedata = substr( $att_file_path, strlen($this->DataSig()) );

			//--- Use chunk split
			$filedata = chunk_split( base64_encode( $filedata ) );

			if ( !LOG_MULTI_PART_DATA ) { $this->EnableLog( false ); }
			$this->Write( $filedata );
			if ( !LOG_MULTI_PART_DATA ) { $this->EnableLog( true ); }
			$this->Write( "\r\n\r\n" );
		}
		else
		{//-- From file

			if ( false )
			{//-- Encode entire file
				$file = fopen( $att_file_path, 'rb' ); 
				$filedata = fread( $file, filesize( $att_file_path ) ); 
				fclose( $file );
				$filedata = chunk_split( base64_encode( $filedata ) );

				if ( !LOG_MULTI_PART_DATA ) { $this->EnableLog( false ); }
				$this->Write( $filedata );
				if ( !LOG_MULTI_PART_DATA ) { $this->EnableLog( true ); }

				$this->Write( "\r\n" );
			}
			else
			{//-- Encode a file in chunks
				$file = fopen( $att_file_path, 'rb' );
				stream_filter_append( $file, 'convert.base64-encode' );

				if ( !LOG_MULTI_PART_DATA ) { $this->EnableLog( false ); }
				while ( !feof( $file ) )
				{
					$filedata = fread( $file, 8192 );
					$filedata = chunk_split( $filedata, 60 );
					$this->Write( $filedata );
				}
				if ( !LOG_MULTI_PART_DATA ) { $this->EnableLog( true ); }

				fclose( $file );

				$this->Write( "\r\n" );
			}
		}
	}

	function WriteDataSection()
	{
		//-- [BEGIN] Set up Boundary
		$t = time();

		$semi_rand = md5( $t ); 
		$this->mime_boundary_mix = "==Multipart_Boundary_x{$semi_rand}x"; 

		$semi_rand = md5( $t-100 ); 
		$this->mime_boundary_alt = "==Multipart_Boundary_x{$semi_rand}x"; 
		//-- [END] Set up Boundary

		$this->WriteDataHeader();

		$this->WriteMuliPartMsg();

		$this->WriteBoundaryMix();

		{
			$this->WriteBoundaryAltDef();

			if ( $this->BodyExists() )
			{
				$this->WriteBoundaryAlt();
				$this->WriteBody();
			}

			if ( $this->HtmlExists() )
			{
				$this->WriteBoundaryAlt();
				$this->WriteHtml();
			}

			$this->WriteBoundaryAlt(true);
		}

		if ( $this->AttachmentExists() )
		{
			foreach ( $this->params['Attachment'] as $attachment )
			{
				$this->WriteBoundaryMix();
				$this->WriteAttachments( $attachment );
			}
		}

		$this->WriteBoundaryMix(true);

		$this->Write( "." .  "\r\n");
	}

	//----------------------------------------------------------------
	// SMTP interaction
	//----------------------------------------------------------------
	function Read()
	{
		$b_err =false;
		$errx = array();
		while( true )
		{
			$s = fgets($this->handle, 1024);
			if ( $s === false ) $s = "FALSE";

			$this->WriteLog( "" . $s );

			if ( $this->IsSmtpError( $s ) )
			{
				$b_err = true;
				$errx[] = $s;
			}

			if ( !$this->BMore( $s ) )
			{
				if ( $b_err )
				{
					$this->err_msg = implode( "\r\n", $errx );
					return false;
				}
				else
				{
					return true;
				}
			}
		}
	}

	function EnableLog( $b )
	{
		$this->b_log = $b;
		$this->WriteLog( "###LOGGING = " .
			( $b ? "ON" : "OFF" ) . "\r\n"
		);
	}

	function Write( $s )
	{
		if ( $this->b_log ) $this->WriteLog( "" . $s );
		fputs( $this->handle, $s );
	}

	function WriteLog( $s )
	{
		$this->log .= $s;
	}

	function GetErrMsg()
	{
		return $this->err_msg;
	}

	function GetVersion()
	{
		//-- 2012-12-13 updated
		return "CEmail v1.41";
	}

	function GetSmtpLog()
	{
		return $this->GetVersion() . "\r\n" . $this->log;
	}

	function DisplaySmtpLog()
	{
		echo "<pre>" . str_replace( "\n", "<br>",
			str_replace( "\r", "", $this->GetSmtpLog() )) . "</pre>";
	}

	function IsSmtpError( $s )
	{
		$ch = substr( $s, 0, 1 );
		return !(( $ch == '2' ) || ( $ch == '3' ));
	}

	function BMore( $s )
	{
		$ch = substr( $s, 3, 1 );
		return ( $ch == '-' );
	}

	function Process()
	{
		$params = $this->params;

		if ( !$this->Read() ) return false;

		$auth = '';
		if ( isset( $params['Auth'] ) )
			$auth = $params['Auth'];

		$cmd = 'helo';
		switch( $auth )
		{
		case '': break;
		default:
			$cmd = 'ehlo';
			$auth = $auth;
			break;
		}

		//-- Helo / Ehlo
		$this->Write( "{$cmd} " . $this->hostname . "\r\n" );
		if ( !$this->Read() ) return false;

		//-- Do authenticate
		if ( !empty( $auth ) )
		{
			$username = '';
			if ( isset( $params['Username'] ) )
				$username = $params['Username'];

			$password = '';
			if ( isset( $params['Password'] ) )
				$password = $params['Password'];

			switch( $auth )
			{
			case 'LOGIN':
				$this->Write( "auth login\r\n" );
				if ( !$this->Read() ) return false;

				$this->Write( base64_encode($username) . "\r\n" );
				if ( !$this->Read() ) return false;

				$this->Write( base64_encode($password) . "\r\n" );
				if ( !$this->Read() ) return false;
				break;
			}
		}

		//-- mail from
		$from = $params['From'];
		$from0 = $from[0];
		$from_addr = $from0[0];

		$this->Write( "mail from: " . $from_addr . "\r\n" );
		if ( !$this->Read() ) return false;

		//--- [BEGIN] rcpt to
		// You need to do this for every to, cc, and bcc.

		$ls = array( "To", "Cc" , "Bcc" );
		foreach ( $ls as $key )
		{
			if ( isset( $params[$key] ) && !empty( $params[$key] ) )
			{
				$ax = $params[$key];
				foreach ( $ax as $to_email )
				{
					$addr = $to_email[0];
					$this->Write( "rcpt to: " . $addr . "\r\n" );
					if ( !$this->Read() ) return false;
				}
			}
		}
		//--- [END] rcpt to

		$this->Write( "data" . "\r\n" );
		if ( !$this->Read() ) return false;

		$this->WriteDataSection();
		if ( !$this->Read() ) return false;

		//--- quit
		$this->Write( "quit" . "\r\n" );
		if ( !$this->Read() ) return false;

		return true;
	}

	function Run()
	{
		$this->log = '';
		$this->err_msg = '';
		$this->b_log = true;
		$params = $this->params;

		if ( isset( $params['Hostname'] ) )
			$this->hostname = $params['Hostname'];
		else
			$this->hostname = ini_get("SMTP");

		if ( isset( $params['Port'] ) )
			$this->port = $params['Port'];
		else
			$this->port = ini_get("smtp_port");

		if ( isset( $params['Transport'] ) )
			$this->transport = $params['Transport'] . '://';
		else
			$this->transport = '';

		//--- open connection
		$this->handle = @fsockopen( $this->transport . $this->hostname,
			$this->port, $errno, $errstr, CSMTP_TIMEOUT );

		if ( $this->handle === false )
		{
			if ( $errstr == null ) $errstr = '';
			if (( $errno == 0 ) || ( $errstr == '' ))
			{
				$this->err_msg = "Could not connect to mail server [" . $this->hostname . "]";
			}
			else
			{
				$this->err_msg = $errstr . "({$errno})";
			}
			return false;
		}

		//--- process
		$success = $this->Process();

		//--- close  connection
		fclose($this->handle);

		return $success;
	}

	//----------------------------------------------------------------
	// Send
	//----------------------------------------------------------------
	function Send()
	{
		$this->AddHeader( 'Date', date( "D, d M Y H:i:s O" ) );
		return $this->Run(); 
	}
}

//----------------------------------------------------------------
// END OF FILE
//----------------------------------------------------------------
?>