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

'frame' => array(
XA_CLASS=>'cls_ps_frame',
XA_AUTH=>false,
XA_DEFAULT_COMMAND=>'login'
),

'staff' => array(
XA_CLASS=>'cls_ps_staff',
XA_DEFAULT_COMMAND=>'search_init'
),

'about' => array(
XA_CLASS=>'cls_ps_about',
XA_DEFAULT_COMMAND=>'detail'
),

'forms' => array(
XA_CLASS=>'cls_ps_forms',
XA_DEFAULT_COMMAND=>'search_init'
),

);

?>