<?php
$page="index";
?>
<!DOCTYPE HTML>
<html>
<head>
<?php
require_once("inc/meta.php");
require_once("inc/head.php");
?>
<script>
 $(document).ready(function() {
	 
	 $("html").height($(window).height());
	 $("html").width($(window).width());

	width = $(window).width();
	height = $(window).height();
	
	$("section").css({'height':height});	
	
});

</script>
</head>
<body class="cover">
<section>

  <header>
    <h1>Belgian Beer</h1>
    <div class="separator"></div>
    <h2>The art of brewing beer is as old as civilisation and originated in Mesopotamia in 9000 BC. Over time, beer found its way to Gaul via Egypt and the Roman Empire. Initially, beer brewing was a household task and the first brewers were women.</h2>
    <div class="separator"></div>
    
    <h3>Select your preferred Language</h3>
    
    <ul class="language">
 <li><a href="http://www.beerinflanders.com">EN</a></li>
 <li><a href="http://www.jp.beerinflanders.com">JP</a></li>
 <li><a href="http://www.ch.beerinflanders.com">CH</a></li>
</ul>
    
    <h3>Want to discover more?<br>
      First, we just have to check your age.</h3>
    <br>
    <form action="../home/" method="post" onSubmit="return age()">
    <div id="datepicker" class="clear">
    <input type="text" class="datepicker onlynumbers" placeholder="dd" maxlength="2" id="date">
    <div class="datesep">&bull;</div>
    <input type="text" class="datepicker onlynumbers" placeholder="mm" maxlength="2" id="month">
    <div class="datesep">&bull;</div>
    <input type="text" class="datepicker big onlynumbers" placeholder="yyyy" maxlength="4" id="year">
    </div>
    <center><input type="submit" value="Enter" class="button"></center>
    </form>
    <br><div class="separator"></div>
    
    <h2>You must be of legal drinking age in the country in which you are accessing this site. 
By entering you agree to our terms & conditions and our privacy statement.<br><br>ENJOY RESPONSIBLY</h2>
  </header>
</section>

<script>
 function age()
 {
	 
	 if(isDate(parseInt(document.getElementById("year").value),parseInt(document.getElementById("month").value),parseInt(document.getElementById("date").value)))
	 {
		var dateval=document.getElementById("year").value;
	 var d = new Date();
	 var n = d.getFullYear();
	 dateval=parseInt(n)-parseInt(dateval); 
	 if(dateval >= 21)
	 {
		 return true
	 }
	 else
	 {
		 alert("Sorry, You are not allowed to enter the website."); 
		 return false;
	 } 
	 }
	 else
	 {
		 alert("Sorry, You are not allowed to enter the website."); 
		 return false;
	 }
 }
 
 function isDate(y,m,d)
{
var date = new Date(y,m-1,d);
var convertedDate =
""+date.getFullYear() + (date.getMonth()+1) + date.getDate();
var givenDate = "" + y + m + d;
return ( givenDate == convertedDate);
}
</script>



<img src="img/flanders.jpg" id="logo">
</body>
</html>