<?php if ( $hm->Zb( 'page:info_msg?' ) ) { ?>
<!-- [BEGIN] Info Message -->
<div class='info_box'><?php echo $hm->Zb( 'page:info_msg' ); ?></div>
<!-- [END] Info Message -->
<script>
$(document).ready( function() {
	var obj = $( '.info_box' );
	obj.slideDown(500);
	window.setTimeout( function(){
		obj.slideUp(1000);
	}, 5000 );
});
</script>
<?php } ?>

<?php if ( $hm->Zb( 'page:err_msg?' ) ) { ?>
<!-- [BEGIN] Error Message -->
<div class='err_box' style='display:none;'>
<table width='99%' style='border-collapse: collapse;'>
<tr>
	<td align='center' valign='middle' width='20'><img src='images/icons/icon_warn.gif'></td>
	<td width='10'>&nbsp;</td>
	<td align='left' valign='middle'><?php echo $hm->Zb( 'page:err_msg' ); ?></td>
</tr>
</table>
</div>
<!-- [END] Error Message -->
<script>
$(document).ready( function() {
	var obj = $( '.err_box' );
	obj.slideDown(500);
	window.setTimeout( function(){
		obj.slideUp(1000);
	}, 5000 );
});
</script>
<?php } ?>