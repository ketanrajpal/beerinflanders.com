	<!-- [BEGIN] Search Result Bottom Bar -->
	<div class='data_table_bottom_bar'>
		<?php if ( !isset( $_sr_bottom_bar ) ||
			CUtil::CheckOption( $_sr_bottom_bar, 'msg' ) ) { ?>
		<div style='float:left'>
			<?php echo $hm->Zb( 'stat:rs:def:msg' ); ?>
		</div>
		<?php } ?>
		<?php if ( !isset( $_sr_bottom_bar ) ||
			CUtil::CheckOption( $_sr_bottom_bar, 'page_tabs' ) ) { ?>
		<div style='float:right'>
			<?php echo $hm->Zb( 'navi:rs:def:page_tabs' ); ?>
		</div>
		<?php } ?>
		<div style='clear:both'></div>
	</div>
	<!-- [END] Search Result Bottom Bar -->
