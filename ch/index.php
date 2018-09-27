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
	
    $(".onlynumbers").keydown(function (e) {
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || (e.keyCode >= 35 && e.keyCode <= 40)) { return; }
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

</script>
</head>
<body class="cover">
<section>

  <header>
    <h1>比利时啤酒</h1>
    <div class="separator"></div>
    <h2>酿造啤酒的艺术和文明一样源远流长，最早出现于公元前9000年的美索不达米亚地区。随着时间的推移，啤酒逐渐传入埃及和罗马帝国，随后又传到高卢。最初，酿造啤酒只是家庭内的活动，而且最早由女人负责。</h2>
    <div class="separator"></div>
    
    <h3>选择首选语言</h3>
    
    <ul class="language">
 <li><a href="http://www.beerinflanders.com">EN</a></li>
 <li><a href="http://www.jp.beerinflanders.com">JP</a></li>
 <li><a href="http://www.ch.beerinflanders.com">CH</a></li>
</ul>
    
    <h3>想发现更多？<br>
      首先，我们只需要检查你的年龄。</h3>
    <br>
    <form action="../home/" method="post" onSubmit="return age()">
    <div id="datepicker" class="clear">
    <input type="text" class="datepicker onlynumbers" placeholder="dd" maxlength="2" id="date">
    <div class="datesep">&bull;</div>
    <input type="text" class="datepicker onlynumbers" placeholder="mm" maxlength="2" id="month">
    <div class="datesep">&bull;</div>
    <input type="text" class="datepicker big onlynumbers" placeholder="yyyy" maxlength="4" id="year">
    </div>
    <center><input type="submit" value=" 进入" class="button"></center>
    </form>
    <br><div class="separator"></div>
    
    <h2>若你想要进入饮酒的场所，必须要达到该国法定饮酒年龄。进入的同时表明你同意我们的规定条款以及隐私声明。<br><br>负责任地享受此次旅程</h2>
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