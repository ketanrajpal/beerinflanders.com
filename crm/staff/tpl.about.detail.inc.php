<?php include( 'include/tpl.html.begin.inc.php' ); ?>
<?php $hm->Title( __FILE__, RSTR_APP_TITLE, RSTR_ABOUT ); ?>

<head>
<?php include( 'include/tpl.html.header.inc.php' ); ?>

<style type="text/css">
span.about_title {
	font-weight:normal;
	font-size:200%;
}
</style>

</head>

<body>

<!-- [BEGIN] Container -->
<div id="container">

<?php include( 'include/tpl.body.header.inc.php' ); ?>

<!-- [BEGIN] Main Form -->
<div id="main_div">

<?php include( 'include/tpl.form.begin.inc.php' ); ?>

<?php include( 'include/tpl.body.info.inc.php' ); ?>

	<!-- [BEGIN] about -->
	<?php echo $hm->SectBegin(); ?>

	<div style='overflow:auto;'>
	<table width='99%' border='0' cellpadding='3' cellspacing='1'>

	<tr>
		<td align='left'>

			<div style='font-size:200%;'>
Contact Us			</div>

			<div style='margin:10px 0 0 20px;'>
				Generated by <a href='http://www.phpkobo.com/form2db-builder' target='_blank'>
				<span style='font-weight:bold;'>
Form2DB Builder</span></a>
v1.30 on
				<span style='font-weight:bold;'>2013-09-24 16:01:39</span>
			</div>

			<div style='margin:10px 0 0 20px;'>
				Base Code : <a href='http://www.phpkobo.com/form2db.php' target='_blank'>
				<span style='font-weight:bold;'>Form2DB</span></a>
v1.14			</div>

			<div style='margin:10px 0 0 20px;'>
				<a href='http://www.phpkobo.com/form2db-builder?id=12474&ps=AJJDsyEuTT' target='_blank'>
				<span style='font-weight:bold;'>Build a new script based on
				&lt; Contact Us &gt;</span>
				</a>
			</div>

		</td>
	</tr>

	<tr>
		<td align='left'>
		</td>
	</tr>

	</table>
	</div>

	<?php echo $hm->SectEnd(); ?>
	<!-- [END] about -->

	<?php echo $hm->SectEndMarker(); ?>

<?php include( 'include/tpl.form.end.inc.php' ); ?>

</div>
<!-- [END] Main Form -->

<?php include( 'include/tpl.body.footer.inc.php' ); ?>

</div>
<!-- [END] Container -->

</body>

<?php include( 'include/tpl.html.end.inc.php' ); ?>