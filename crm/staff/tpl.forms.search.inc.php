<?php include( 'include/tpl.html.begin.inc.php' ); ?>
<?php $hm->Title( __FILE__, RSTR_APP_TITLE, RSTR_FORMS, RSTR_SEARCH ); ?>

<head>
<?php include( 'include/tpl.html.header.inc.php' ); ?>
</head>

<body>

<!-- [BEGIN] Container -->
<div id="container">

<?php include( 'include/tpl.body.header.inc.php' ); ?>

<!-- [BEGIN] Main Form -->
<div id="main_div">

<?php include( 'include/tpl.form.begin.inc.php' ); ?>

<?php include( 'include/tpl.body.info.inc.php' ); ?>

	<!-- [BEGIN] Search Criteria -->
	<?php echo $hm->SectBegin( RSTR_SEARCH_CRITERIA ); ?>

	<div style='overflow:auto;'>
	<table width='99%'>

	<tr>
		<td align="right"><?php echo RSTR_FORMS_ID; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:forms_id' ); ?></td>
		<td align="right"><?php echo RSTR_ACTIVE; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:active' ); ?></td>
		<td align="right"><?php echo RSTR_NAME; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:name' ); ?></td>
	</tr>

	<tr>
		<td align="right"><?php echo RSTR_EMAIL; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:email' ); ?></td>
		<td align="right"><?php echo RSTR_TEL; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:tel' ); ?></td>
		<td align="right"><?php echo RSTR_SUBJECT; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:subject' ); ?></td>
	</tr>

	<tr>
		<td align="right"><?php echo RSTR_MESSAGE; ?> : </td>
		<td align="left"><?php echo $hm->Zb( 'sp:def:message' ); ?></td>
		<td align="right">&nbsp;</td>
		<td align="left">&nbsp;</td>
		<td align="right">&nbsp;</td>
		<td align="right"><?php echo $hm->Button(
			array( '<>'=>'</>',
			'name'=>"_sc=_this/search_pb&",
			'src'=>'search',
			'value'=>RSTR_SEARCH,
		) ); ?></td>
	</tr>

	</table>
	</div>

	<?php echo $hm->SectEnd(); ?>
	<!-- [END] Search Criteria-->

	<!-- [BEGIN] Search Result -->
	<?php if ( $hm->Zb( 'def:display?' ) ) { ?>

	<?php echo $hm->SectBegin( RSTR_SEARCH_RESULT ); ?>

	<?php $_sr_top_bar = "del_multi,page_tabs"; ?>
	<?php include( 'include/tpl.sr.top_bar.inc.php' ); ?>

	<div style='overflow:auto;'>
	<table class='data_table'>

		<tr class='data_table_caption'>
			<th nowrap='true'><?php echo $hm->Zb('ob:rs:def:forms_id'); ?>
				<?php echo RSTR_FORMS_ID; ?></th>
			<th><?php include( 'include/tpl.sr.selrec_header.inc.php' ); ?></th>
			<th><?php include( 'include/tpl.sr.edit_btn_header.inc.php' ); ?></th>
			<th><?php echo RSTR_ACTIVE; ?></th>
			<th nowrap='true'><?php echo $hm->Zb('ob:rs:def:name'); ?> <?php echo RSTR_NAME; ?></th>
			<th nowrap='true'><?php echo $hm->Zb('ob:rs:def:email'); ?> <?php echo RSTR_EMAIL; ?></th>
			<th nowrap='true'><?php echo $hm->Zb('ob:rs:def:tel'); ?> <?php echo RSTR_TEL; ?></th>
			<th nowrap='true'><?php echo $hm->Zb('ob:rs:def:subject'); ?> <?php echo RSTR_SUBJECT; ?></th>
			<th nowrap='true'><?php echo $hm->Zb('ob:rs:def:message'); ?> <?php echo RSTR_MESSAGE; ?></th>
		</tr>

		<?php while( $hm->zb('@rs:def:begin_table') ) { ?>
		<tr>
			<td style='text-align:right;'><?php echo $hm->Zb('rs:def:forms_id'); ?></td>
			<?php include( 'include/tpl.sr.id_param.inc.php' ); ?>
			<?php include( 'include/tpl.sr.selrec.inc.php' ); ?>
			<?php include( 'include/tpl.sr.edit_btn.inc.php' ); ?>
			<td style='text-align:center;'><?php echo $hm->Zb('rs:def:active'); ?></td>
			<td style='text-align:left;'><?php echo $hm->Zb('rs:def:name'); ?></td>
			<td style='text-align:left;'><?php echo $hm->Zb('rs:def:email'); ?></td>
			<td style='text-align:left;'><?php echo $hm->Zb('rs:def:tel'); ?></td>
			<td style='text-align:left;'><?php echo $hm->Zb('rs:def:subject'); ?></td>
			<td style='text-align:left;'><?php echo $hm->Zb('rs:def:message'); ?></td>
		</tr>
		<?php } ?>

	</table>
	</div>

	<?php include( 'include/tpl.sr.bottom_bar.inc.php' ); ?>

	<?php echo $hm->SectEnd(); ?>

	<?php } ?>
	<!-- [END] Search Result -->

	<?php echo $hm->SectEndMarker(); ?>

<?php include( 'include/tpl.form.end.inc.php' ); ?>

</div>
<!-- [END] Main Form -->

<?php include( 'include/tpl.body.footer.inc.php' ); ?>

</div>
<!-- [END] Container -->

</body>

<?php include( 'include/tpl.html.end.inc.php' ); ?>