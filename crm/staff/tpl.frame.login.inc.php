<?php include( 'include/tpl.html.begin.inc.php' ); ?>
<?php $hm->Title( __FILE__, RSTR_APP_TITLE, RSTR_AREA_TITLE, RSTR_LOG_IN ); ?>

<head>
<?php include( 'include/tpl.html.header.inc.php' ); ?>

<style type="text/css">

div.login_title {
	margin-top:10px;
	text-align:center;
	font-size:28px;
	font-weight:bold;
	color:#3e83c9;
}

span.login_input_caption {
	color:#808080;
	font-weight:bold;
	font-style:italic;
}
span.login_input_box input {
	width:180px;
	padding:0 6px 0 6px;
	font-weight:bold;
	font-size:150%;
	color:#404040;
	background:#f0f0f0 url(images/login/bg_input.png);
}

a.login_maker_link {
	text-align:center;
	color:#d0d0d0;
	font-style:italic;
	font-weight:bold;
	font-size:11px;
	text-decoration:none;
}
</style>

</head>

<body>

<!-- [BEGIN] Container -->
<div id="container">

<!-- [BEGIN] Main Form -->
<div style='width:440px; margin:0 auto;'>

<?php include( 'include/tpl.form.begin.inc.php' ); ?>

<div style="margin-top:80px;"></div>

<?php include( 'include/tpl.body.info.inc.php' ); ?>

	<!-- [BEGIN] Log In -->
	<?php echo $hm->SectBegin( RSTR_LOG_IN ); ?>

		<!-- [BEGIN] Title -->
		<div class='login_title'>
Contact Us		</div>
		<!-- [END] Title -->

		<div style="margin-top:20px;"></div>

	<table width='100%' border='0' cellpadding='3' cellspacing='1'>

	<tr>
	  <td class='column_caption' style='width:150px;'><span class="required">*</span>
	  <span class='login_input_caption'><?php echo RSTR_USERNAME; ?></span> : </td>
	  <td class='column_value'><span class='login_input_box'><?php echo $hm->Zb('rs:def:username_login'); ?></span></td>
	</tr>

	<tr>
	  <td class='column_caption' style='width:150px;'><span class="required">*</span>
	  <span class='login_input_caption'><?php echo RSTR_PASSWORD; ?></span> : </td>
	  <td class='column_value'><span class='login_input_box'><?php echo $hm->Zb('rs:def:password_login'); ?></span></td>
	</tr>

	</table>

	<div style="text-align:center;margin-top:20px;margin-bottom:10px;">
		<?php echo $hm->Button( array( '<>'=>'</>', 'name'=>'_sc=_this/auth&', 'src'=>'enter', 'value'=>RSTR_ENTER ) ); ?>
	</div>

	<?php echo $hm->SectEnd(); ?>
	<!-- [END] Log In -->

	<?php echo $hm->SectEndMarker(); ?>

	<div style='text-align:center;margin:10px;'>
	<a class='login_maker_link' href='http://www.phpkobo.com/form2db.php' target='_blank'>
www.phpkobo.com	</a>
	</div>

<?php include( 'include/tpl.form.end.inc.php' ); ?>

</div>
<!-- [END] Main Form -->

<?php include( 'include/tpl.body.footer.inc.php' ); ?>

</div>
<!-- [END] Container -->

</body>

<?php include( 'include/tpl.html.end.inc.php' ); ?>
