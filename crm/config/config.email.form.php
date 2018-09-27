//<?php exit; ?>
//---------------------------------------------------------------
//---------------------------------------------------------------
//---------------------------------------------------------------
//---------------------------------------------------------------
//
// Email Configuration File
//
//---------------------------------------------------------------
//---------------------------------------------------------------
//---------------------------------------------------------------
//---------------------------------------------------------------

//---------------------------------------------------------------
// Hostname 
//---------------------------------------------------------------
//
// The address of SMTP server
//
// ( example1 ) Hostname=localhost
// ( example2 ) Hostname=mail.mydomain.com
// ( example3 ) Hostname=111.222.333.444
//

Hostname=localhost

//---------------------------------------------------------------
// SMTP Authentication
//---------------------------------------------------------------
//
// If your email server requires SMTP Authentication,
// enable the following three lines, "Auth", "Username", and
// "Password"
// ( NOTE: They are commented out by default. )
//
// Set "LOGIN" to Auth, and set your SMTP username and
// password to Username and Password respectively.
//

//Auth=LOGIN
//Username=(your-username-here)
//Password=(your-password-here)

//---------------------------------------------------------------
// From
//---------------------------------------------------------------
//
// The sender of the form mail
//
// ( example1 ) From=sender@mydomain.com
// ( example2 ) From=John Smith <john@smith.com>
//

From=sender@mydomain.com

//---------------------------------------------------------------
// To
//---------------------------------------------------------------
//
// The receiver of the form mail
//
// ( example1 ) To=receiver@mydomain.com
// ( example2 ) To=John Smith <john@smith.com>
//

To=receiver@mydomain.com

//---------------------------------------------------------------
// Cc
//---------------------------------------------------------------
//
// Carbon Copy (Cc)
//
// ( example1 ) Cc=john@smith.com
// ( example2 ) Cc=John Smith <john@smith.com>
// ( example3 ) Cc=john@smith.com | nancy@gold.com
// ( example4 ) Cc=John Smith <john@smith.com> | Nancy Gold <nancy@gold.com>
//

Cc=

//---------------------------------------------------------------
// Bcc
//---------------------------------------------------------------
//
// Blind Carbon Copy (Bcc)
//
// ( example1 ) Bcc=john@smith.com
// ( example2 ) Bcc=John Smith <john@smith.com>
// ( example3 ) Bcc=john@smith.com | nancy@gold.com
// ( example4 ) Bcc=John Smith <john@smith.com> | Nancy Gold <nancy@gold.com>
//

Bcc=

//---------------------------------------------------------------
// Email Subject
//---------------------------------------------------------------
//
// (e.g.) "Contact Us"
//

Subject=Contact Us

//---------------------------------------------------------------
// Email Body Template ( Text Format )
//---------------------------------------------------------------

Body=<<<_EOM_
Name : ##name##
Email : ##email##
Tel : ##tel##
Subject : ##subject##
Message : ##message##
_EOM_

//---------------------------------------------------------------
// Email Body Template ( HTML Format )
//---------------------------------------------------------------

Html=<<<_EOM_
<html>
<head>
	<title>Contact Us</title>
</head>
<body>
	<table>
	<tr>
		<td align='right'>Name : </td>
		<td align='left'>##name##</td>
	</tr>
	<tr>
		<td align='right'>Email : </td>
		<td align='left'>##email##</td>
	</tr>
	<tr>
		<td align='right'>Tel : </td>
		<td align='left'>##tel##</td>
	</tr>
	<tr>
		<td align='right'>Subject : </td>
		<td align='left'>##subject##</td>
	</tr>
	<tr>
		<td align='right'>Message : </td>
		<td align='left'>##message##</td>
	</tr>
	</table>
</body>
</html>
_EOM_

//---------------------------------------------------------------
// END OF FILE
//---------------------------------------------------------------
