<?php include( 'include/tpl.html.begin.inc.php' ); ?>

<head>
<?php include( 'include/tpl.html.header.inc.php' ); ?>
<title>Contact Us</title>
</head>

<body>

<!-- [BEGIN] Container -->
<div id="container">

<?php include( 'include/tpl.body.header.inc.php' ); ?>

<!-- [BEGIN] Main Form -->
<div id="main_div">

<?php include( 'include/tpl.form.begin.inc.php' ); ?>

	<?php include( 'include/tpl.body.info.inc.php' ); ?>

	<!-- [BEGIN] Fields -->
	<div class='instruction'>
	Please confirm the following information and<br/>
	click the [ Send ] button to send your form or<br/>
	click the [ Back ] button to return to the previous page.
	</div>

	<table class='field-table2' width='100%' border='0' cellpadding='3' cellspacing='1'>

	<tr>
		<td class='column_caption'>
			<?php echo RSTR_NAME; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:name'); ?>
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<?php echo RSTR_EMAIL; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:email'); ?>
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<?php echo RSTR_TEL; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:tel'); ?>
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<?php echo RSTR_SUBJECT; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:subject'); ?>
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<?php echo RSTR_MESSAGE; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:message'); ?>
		</td>
	</tr>


	</table>

	<!-- [END] Fields -->

	<!-- [BEGIN] Buttons -->
	<div align="center" style="margin:20px 20px 0px 20px">
	<?php echo $hm->Button( array(
		'<>'=>'<default/>',
		'name'=>"_sc=_this/reg_page2_next&"
	) ); ?>
	<table width='100%'>
	<tr>
		<td align='center'>
			<?php echo $hm->Button( array(
				'<>'=>'<html/>',
				'name'=>"_sc=_this/reg_page2_prev&",
				'src'=>'prev', 'value'=>"Back",
				'class'=>"form-button",
			) ); ?>
		</td>
		<td align='center'>
			<?php echo $hm->Button( array(
				'<>'=>'<html/>',
				'name'=>"_sc=_this/reg_page2_next&",
				'src'=>'send', 'value'=>"Send",
				'class'=>"form-button",
			) ); ?>
		</td>
	</tr>
	</table>
	</div>
	<!-- [END] Buttons -->

<?php include( 'include/tpl.form.end.inc.php' ); ?>

</div>
<!-- [END] Main Form -->

<?php include( 'include/tpl.body.footer.inc.php' ); ?>

</div>
<!-- [END] Container -->

</body>

<?php include( 'include/tpl.html.end.inc.php' ); ?>