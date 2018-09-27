<?php
//==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>==>>>
//
// Form2DB v1.14 [G130]
// Copyright (c) phpkobo.com ( http://www.phpkobo.com/ )
// Email : admin@phpkobo.com
// ID : CU201-114 [G130]
// URL : http://www.phpkobo.com/contact_us.php
//
// This software is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; version 2 of the
// License.
//
//==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<==<<<

$spec = array(

'staff' => array(
XA_CLASS=>'cls_fl_staff',
XA_SPEC_FILE=>'df.fl.staff.inc.php',
XA_TABLE_NAME=>TBL_STAFF,
XA_ID_NAME=>'staff_id',
XA_INIT_ORDER_BY=>'staff_id ASC',
XA_INIT_PAGE_SIZE=>20
),

'forms' => array(
XA_CLASS=>'cls_fl_forms',
XA_SPEC_FILE=>'df.fl.forms.inc.php',
XA_TABLE_NAME=>TBL_FORMS,
XA_ID_NAME=>'forms_id',
XA_INIT_ORDER_BY=>'forms_id DESC',
XA_INIT_PAGE_SIZE=>20
),

);

?>