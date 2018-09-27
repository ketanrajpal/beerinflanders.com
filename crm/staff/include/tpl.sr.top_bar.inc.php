	<!-- [BEGIN] Search Result Top Bar -->
	<div class='data_table_top_bar'>
		<?php if ( !isset( $_sr_top_bar ) ||
			CUtil::CheckOption( $_sr_top_bar, 'addnew' ) ) { ?>
		<div style='float:left;'><?php
			echo $hm->Button( array(
				'<>'=>'</>',
				'name'=>"_sc=_this/search_pxy&_ssc=reg_init&",
				'src'=>'addnew',
				'value'=>RSTR_ADDNEW
			) ); ?></div>
		<div style='float:left;width:10px;'>&nbsp;</div>
		<?php } ?>
		<?php if ( !isset( $_sr_top_bar ) ||
			CUtil::CheckOption( $_sr_top_bar, 'del_multi' ) ) { ?>
		<div style='float:left;'><?php
			echo $hm->Button( array( 
					'<>'=>'</>',
				'id'=>'btn_del_multi',
					'name'=>"_sc=_this/search_pxy&_ssc=del_multi&",
				'src'=>'delete',
					'value'=>RSTR_DELETE,
			) ); ?></div>
		<?php } ?>
		<?php if ( !isset( $_sr_top_bar ) ||
			CUtil::CheckOption( $_sr_top_bar, 'page_tabs' ) ) { ?>
		<div style='float:right;'><?php echo $hm->Zb( 'navi:rs:def:page_tabs' ); ?></div>
		<?php } ?>
		<div style='clear:both;'></div>
	</div>
	<!-- [END] Search Result Top Bar -->
