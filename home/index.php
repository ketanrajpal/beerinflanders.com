<?php
$page="home";
?>
<!DOCTYPE HTML>
<html>
<head>
<?php
require_once("../inc/meta.php");
require_once("../inc/head.php");
?>
</head>
<body>
<?php require_once("../inc/header.php"); ?>
<section id="slider">
  <ul>
    <li><img src="../img/slide-1.jpg" width="100%"></li>
    <li><img src="../img/slide-2.jpg" width="100%"></li>
    <li><img src="../img/slide-3.jpg" width="100%"></li>
  </ul>
</section>
<script>
  $(document).ready(function(){ $('#slider ul').bxSlider({mode:'fade',controls:false,pager:false,auto:true});});
 </script>

<section id="about" class="light">
  <h1>About Belgian Beer</h1>
  <p>Belgium is a beer-lover's paradise, with over 1.500 different original beers, many with their own personalized beer glasses in which that beer, and only that beer, may be served. The shape of each glass is made to enhance the flavor of the beer for which it is designed. This strict beer separatism may seem like behavior usually reserved for wine snobbery, but Belgians do take their beer seriously - and with good reason. Belgium has enjoyed an unparalleled reputation for its specialty beers since the Middle Ages. <br>
    <br>
    Connoisseurs favor Belgian beers for their variety, real flavor and character. The choices are endless when you consider Belgian ales, raspberry or cherry beer, white beer, Flanders 'Old' red and brown, Abbey and Trappist beer and of course the beer that Belgium is most famous for - the lambic and geuze.</p>
</section>
<section id="history" class="dark">
  <h1>A brief history of Belgian Beer</h1>
  <p>It is the combination of a beer tradition stretching back over centuries and the passion displayed by today's brewers in their search for the perfect beer which has made Belgium the home of exceptional beers, unique in character and produced with an innovative knowledge of brewing. It therefore comes as no surprise that Belgian brewers regularly sweep the board at major international beer competitions.</p>
  <a href="../history">Know More <span class="fa fa-chevron-right "></span></a> </section>
<section id="styles" class="light clear">
  <h1>Belgian Beer Styles</h1>
  <p>Beer is traditionally made from water, barley and hops, but sometimes wheat is added to create a crisp, citrusy flavour.</p>
  <article>
    <h2>Beer making</h2>
    <span class="line"></span> <img src="../img/beer-making.jpg"> A yeast culture is added to the mash that derives from this mixture, which then converts the sugars into carbon dioxide and alcohol. Every brewery has its own strain of yeast culture, each with its own specific properties that contribute, together with the selection of different types of malts and hops, towards defining the type of beer exclusive to that brewery. Beers can ferment in wooden barrels or undergo a secondary fermentation in the bottle. </article>
  <article>
    <h2>Finishing touch</h2>
    <span class="line"></span> <img src="../img/finishing-touch.jpg"> Various Belgian breweries add 'rough grains' such as rice and maize to guarantee the beer's taste and stability. A very important ingredient in the brewing process is, of course, hops, which not only give the beer its bitterness, but also help preserve it. In addition to the classic bitter hops, Belgian brewers are increasingly turning to more aromatic hops for their typical, often fruity, flavours. Lambic brewers use aged, dried hops to make their beers less bitter. </article>
  <article>
    <h2>Beer Styles</h2>
    <span class="line"></span> <img src="../img/beer-styles.jpg"> Beers are classified into beer styles according to the fermentation method used. For Belgian beers we notice four types of fermentation: bottom, top, spontaneous and mixed.<br>
    <br>
    Two unique and typically Belgian beer styles are beers of spontaneous fermentation and beers of mixed fermentations. </article>
</section>
<section id="factsfigures"> <img src="../img/facts&figures.jpg"> </section>
<section id="breweries" class="dark">
  <h1>Breweries</h1>
  <p>The breweries and beer museums listed here all offer guided tours and/or explanations in English. Visitors are, of course, welcome at many other breweries in Belgium, but guided tours/explanations are only available in Dutch, French or German.</p>
  <a href="http://www.visitflanders.com/en/themes/belgian-beer/index.jsp" target="_blank">Know More <span class="fa fa-chevron-right "></span></a> </section>
<section id="unique" class="light clear">
  <h1>What makes Belgian beers so unique?</h1>
  <img src="../img/unique.jpg"> <img src="../img/unique-2.jpg"> </section>
<section id="womenbeer" class="dark">
  <h1>Women turned onto beer!</h1>
  <p>Some people think that beer is a man's drink, and that women prefer wine or sip at light, fruity beers. Well, it's about time this myth was dispelled! In ancient Babylonia, priestesses drank in honour of Ninkasi, the goddess of beer. In the middle ages, the brewing of beer was a female occupation. But, in Belgium, beer seems to have become something of a men's club. Flemish women let all our delicious Belgian beers pass them by. Or do they?</p>
  <a href="../womenbeer">Know More <span class="fa fa-chevron-right "></span></a> </section>
<section id="contact" class="light">
  <h1>Contact us</h1>
  <p>If you have any questions or comments please contact us and we will get back to you shortly.<br>
    <br>
    Tourism Office of Flanders & Brussels (Belgium), c/o Mileage Communications (India) Pvt Ltd,<br>
    119, Sishan House, 2nd Floor, Shahpur Jat, 
    110049 New Delhi (India) </p>
  <br>
  <br>
  <form id="contact-page" name="contact-page" method="post" action="contact.php" onSubmit="javascript: alert('Thankyou for your Enquiry.\n\nWe will contact you within 24-48hrs.');">
    <fieldset>
      <label for="name">Name</label>
      <input type="text" name="name" id="name" required>
    </fieldset>
    <input type="hidden" name="subject" id="subject" value="beerinflanders.com">
     <fieldset>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>
    </fieldset>
    <fieldset>
      <label for="phone">Phone</label>
      <input type="text" name="phone" id="phone" required>
    </fieldset>
    <div class="clear"></div>
    <br>
    <fieldset>
      <label for="message">Message</label>
      <textarea id="message" name="message"></textarea>
    </fieldset>
    <center>
      <input type="submit" value="Submit">
    </center>
  </form>
  </div>
</section>
<?php require_once("../inc/footer.php"); ?>
</body>
</html>