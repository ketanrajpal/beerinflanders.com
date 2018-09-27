<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="shortcut icon" href="../img/favicon.png">
<?php if($page=="index"){ ?><link rel="stylesheet" type="text/css" href="../css/home.css">
<?php } else { ?><link rel="stylesheet" type="text/css" href="../css/style.css"><?php } ?>
<script src="../js/jquery.js"></script>
<script type="text/javascript" src="../js/jquery.bxslider.min.js"></script>
<script type="text/javascript" src="../js/jquery.slicknav.min.js"></script>
<script>$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});</script>