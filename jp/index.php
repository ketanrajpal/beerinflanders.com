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
});

</script>
</head>
<body class="cover">
<section>
  <header>
    <h1>ベルギービール</h1>
    <div class="separator"></div>
    <h2><br>ビール醸造の技術は紀元前9000年頃にメソポタミアに始まり、文明とほぼ同じぐらいの歴史があります。やがて、ビールはエジプトとローマ帝国を経由して、ガリアに伝わりました。もともと、ビール醸造は家事の一種で、最初に醸造に携わるのは女性でした。<br></h2>
    <br><div class="separator"></div><br>
    <h3>あなたの好みの言語を選択</h3>
    
    <ul class="language clear">
 <li><a href="http://www.beerinflanders.com">EN</a></li>
 <li><a href="http://www.jp.beerinflanders.com">JP</a></li>
 <li><a href="http://www.ch.beerinflanders.com">CH</a></li>
</ul>
    <h3>もっと知りたい？まず年齢を入れてください。</h3>
    <br>
    <form action="../home/" method="post" onSubmit="return age()">
    <div id="datepicker" class="clear">
    <input type="text" class="datepicker onlynumbers" placeholder="dd" maxlength="2" id="date">
    <div class="datesep">&bull;</div>
    <input type="text" class="datepicker onlynumbers" placeholder="mm" maxlength="2" id="month">
    <div class="datesep">&bull;</div>
    <input type="text" class="datepicker big onlynumbers" placeholder="yyyy" maxlength="4" id="year">
    </div>
    <center><input type="submit" value="送信" class="button"></center>
    </form>
    <br><div class="separator"></div><br><br>
    
    <h2>このサイトにアクセスされる方は、国籍を持っている国の法定飲酒年齢に達していなければなりません。本サイトをご利用される場合、利用規約とプライバシーに関する声明に同意したものとみなされます。<br><br><br><br>責任を持って、お楽しみください。</h2>
    <br>
    <br><div class="separator"></div><br><br><br>
    <!--
    
    <br>
    <a href="http://www.beerinflanders.com/landing/jp"><h2 style="font-weight:bold">抽選で当たる！ベルギー・フランダース<br>本場でベルギービールを味わう旅にご招待</h2><br><img src="http://www.beerinflanders.com/landing/img/title-image.jpg" style="width:100% !important;"></a><br><br>-->
    
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