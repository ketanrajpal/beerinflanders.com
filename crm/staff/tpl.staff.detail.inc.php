<?php include( 'include/tpl.html.begin.inc.php' ); ?>
<?php $hm->Title( __FILE__, RSTR_APP_TITLE, RSTR_STAFF, $hm->Zb( 'page:caption_verb' ) ); ?>
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
	<table width='99%' border='0' cellpadding='3' cellspacing='1'>

	<?php if ( $b_edit || $b_del ) { ?>
	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_STAFF_ID; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:staff_id' ); ?>
		</td>
	</tr>
	<?php } ?>

	<?php if ( ROOT_USER_ID == $hm->Zb( 'rs:def:staff_id' ) ) { ?>
	<input type='hidden' name='rs:def:active' value='Y' />
	<?php } else { ?>
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
	<?php } ?>

	<?php if ( ROOT_USER_ID == $hm->Zb( 'rs:def:staff_id' ) ) { ?>
		<input type='hidden' name='rs:def:group_id' value='<?php echo GROUP_ADMIN; ?>' />
	<?php } else { ?>
	<tr>
		<td class='column_caption'>
			<span class="required">*</span>
			<?php echo RSTR_STAFF_TYPE; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:group_id' ); ?>
		</td>
	</tr>
	<?php } ?>

	<tr>
		<td class='column_caption'>
			<span class="required">*</span>
			<?php echo RSTR_USERNAME; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:username' ); ?>
		</td>
	</tr>

	<?php if ( $b_reg || $b_edit ) { ?>
	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg ) { ?>
			<span class="required">*</span>
			<?php } ?>
			<?php echo RSTR_PASSWORD; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:password_new' ); ?>
			<?php if ( $b_edit ) { ?>
			<span style='font-size:80%'>
			<?php echo RSTR_LEAVE_PASSWORD_BLANK; ?>
			</span>
			<?php } ?>
		</td>
	</tr>
	<?php } ?>

	<?php if ( $b_reg || $b_edit ) { ?>
	<tr>
		<td class='column_caption'>
			<?php if ( $b_reg ) { ?>
			<span class="required">*</span>
			<?php } ?>
			<?php echo RSTR_PASSWORD_CONF; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:password_conf' ); ?>
			<?php if ( $b_edit ) { ?>
			<span style='font-size:80%'>
			<?php echo RSTR_LEAVE_PASSWORD_BLANK; ?>
			</span>
			<?php } ?>
		</td>
	</tr>
	<?php } ?>

	<tr>
		<td class='column_caption'>
			<span class="required">*</span>
			<?php echo RSTR_EMAIL; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:email' ); ?>
		</td>
	</tr>

	<tr>
		<td class='column_caption'>
			<span class="required"></span>
			<?php echo RSTR_NAME; ?> :
		</td>
		<td class='column_value'>
			<?php echo $hm->Zb( 'rs:def:name' ); ?>
		</td>
	</tr>

	</table>
	</div>

	<?php echo $hm->SectEnd(); ?>
	<!-- [END] basic_info -->

	<?php $_last_login_ = 'yes'; ?>
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