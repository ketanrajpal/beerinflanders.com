<?php include( 'include/tpl.html.begin.inc.php' ); ?>
<?php $hm->Title( __FILE__, RSTR_APP_TITLE, RSTR_FORMS, $hm->Zb( 'page:caption_verb' ) ); ?>
<?php include( 'include/tpl.detail.verb.inc.php' ); ?>

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

	<?php if ( $hm->Zb( 'def:display?' ) ) { ?>

	<!-- [BEGIN] basic_info -->
	<?php echo $hm->SectBegin(); ?>

	<div style='overflow:auto;'>
	<table border='0' cellpadding='3' cellspacing='1'>

	<?php if ( $b_edit || $b_del ) { ?>
	<tr>
		<td class='column_caption'><span class="required"></span>
			<?php echo RSTR_FORMS_ID; ?> : </td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:forms_id'); ?></td>
	</tr>
	<?php } ?>

	<tr>
		<td class='column_caption'>
			<span class="required">*</span>
			<?php echo RSTR_ACTIVE; ?> :
		</td>
		<td class='column_value'>
			<?php if ( $b_reg || $b_edit ) { ?>
				<?php echo $hm->Zb( 'rs:def:active_Y' ); ?>Yes&nbsp;&nbsp;&nbsp;
				<?php echo $hm->Zb( 'rs:def:active_N' ); ?>No
			<?php } ?>
			<?php if ( $b_del ) { ?>
				<?php echo $hm->Zb( 'rs:def:active' ); ?>
			<?php } ?>
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg || $b_edit ) { ?><span class="required"></span><?php } ?>
			<?php echo RSTR_NAME; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:name'); ?>
		</td>
	</tr>
	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg || $b_edit ) { ?><span class="required"></span><?php } ?>
			<?php echo RSTR_EMAIL; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:email'); ?>
		</td>
	</tr>
	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg || $b_edit ) { ?><span class="required"></span><?php } ?>
			<?php echo RSTR_TEL; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:tel'); ?>
		</td>
	</tr>
	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg || $b_edit ) { ?><span class="required"></span><?php } ?>
			<?php echo RSTR_SUBJECT; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:subject'); ?>
		</td>
	</tr>
	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg || $b_edit ) { ?><span class="required"></span><?php } ?>
			<?php echo RSTR_MESSAGE; ?> :
		</td>
		<td class='column_value'><?php echo $hm->Zb('rs:def:message'); ?>
		</td>
	</tr>

	</table>
	</div>

	<?php echo $hm->SectEnd(); ?>
	<!-- [END] basic_info -->

	<?php include( 'include/tpl.detail.record_info.inc.php' ); ?>

	<?php echo $hm->SectEndMarker(); ?>

	<?php include( 'include/tpl.detail.buttons.inc.php' ); ?>

	<?php } ?>

<?php include( 'include/tpl.form.end.inc.php' ); ?>

</div>
<!-- [END] Main Form -->

<?php include( 'include/tpl.body.footer.inc.php' ); ?>

</div>
<!-- [END] Container -->

</body>

<?php include( 'include/tpl.html.end.inc.php' ); ?>