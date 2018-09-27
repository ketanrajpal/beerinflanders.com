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
	Please fill out the form below and click the [ Next ] button.
	</div>

	<table class='field-table1' width='100%' border='0' cellpadding='3' cellspacing='1'>

	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_NAME; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:name'); ?> 
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_EMAIL; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:email'); ?> 
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_TEL; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:tel'); ?> 
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_SUBJECT; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:subject'); ?> 
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_MESSAGE; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:message'); ?> 
		</td>
	</tr>


	</table>

	<!-- [END] Fields -->

	<!-- [BEGIN] Buttons -->
	<div align="center" style="margin-top:10px">
	<?php echo $hm->Button( array(
		'<>'=>'<default/>',
		'name'=>"_sc=_this/reg_page1_next&"
	) ); ?>
	<table width='100%'>
	<tr>
		<td align='center'>
			<?php echo $hm->Button( array(
				'<>'=>'<html/>',
				'name'=>"_sc=_this/reg_page1_next&",
				'src'=>'next',
				'value'=>"  Next  ",
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