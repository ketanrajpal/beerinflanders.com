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
<script src="../js/validate.min.js"></script>
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
  <h1>关于比利时啤酒</h1>
  <p>比利时是啤酒爱好者的天堂，有1500多种独特啤酒，而且其中许多啤酒有自己独有的个性酒杯。酒杯造型各异，目的就是为了提升特定啤酒的口感。这种严格的啤酒及酒杯的搭配看起来好像是那些所谓的红酒达人们的专利，但比利时人确实把啤酒看得很重要，而且确实有他们的理由。中世纪以来，比利时的啤酒一直享誉全球，无人能及。<br>
    <br>
    鉴赏家们喜欢比利时啤酒，因为其种类丰富，口感浓郁，特性鲜明。他们似乎有无穷无尽的选择，比利时麦芽酒、覆盆子啤酒、樱桃啤酒、白啤酒、弗拉芒红啤和棕啤、修道院啤酒、特拉普啤酒以及比利时最有名的拉比克啤酒和贵兹香槟啤酒。</p>
</section>
<section id="history" class="dark">
  <h1>比利时啤酒的历史概述</h1>
  <p>比利时的啤酒传统延续数百年，今天的啤酒酿造者又对创造完美啤酒展现出极大热情，这使得比利时当仁不让地拥有众多美味啤酒，特色鲜明且酿造工艺独特。所以，比利时的酿酒者在国际啤酒比赛中屡拔头筹就不足为奇了。</p>
  <a href="../history">了解更多 <span class="fa fa-chevron-right "></span></a> </section>
<section id="styles" class="light clear">
  <h1>比利时啤酒类型</h1>
  <p>制作啤酒的传统原料包括水、酵母大麦和啤酒花，但有时候也会加入小麦以使啤酒口感更佳清爽并且散发柑橘香气。</p>
  <article>
    <h2>啤酒制作</h2>
    <span class="line"></span> <img src="../img/beer-making.jpg">在混合物中提取出麦芽浆，在其中加入酵母培养物，这可以将糖分转化为二氧化碳和酒精。每一个酿酒厂都有自己的酵母菌株，并各有其特点，同时酿酒厂还会选择不同类型的麦芽和啤酒花，以制作各个酿酒厂独有的啤酒。啤酒会在橡木桶中进行发酵或在瓶中进行二次发酵。</article>
  <article>
    <h2>画龙点睛</h2>
    <span class="line"></span> <img src="../img/finishing-touch.jpg">许多比利时酿酒厂会加入大米或玉米等“粗糙谷物”来保证啤酒的口感和稳定性。在酿造过程中非常重要的一个组成部分当然就是啤酒花，它不仅可以使啤酒略带苦味，还可以帮助保存啤酒。除了经典的苦味啤酒花，比利时的酿酒者逐渐开始使用有香味的啤酒花以呈现独一无二的口味，而且往往是水果香味。拉比克啤酒的酿造者就是在啤酒中加入成熟的干啤酒花以使啤酒味道不那么苦涩。</article>
  <article>
    <h2>啤酒类型</h2>
    <span class="line"></span> <img src="../img/beer-styles.jpg">啤酒按照其发酵方式的不同可分为不同类型。比利时啤酒通常使用四种发酵方式：底部发酵、顶部发酵、自然发酵和混合发酵。<br>
    <br>
   比利时特有的两种啤酒就是自然发酵的啤酒和混合发酵的啤酒。 </article>
</section>
<section id="factsfigures"> <img src="../img/facts&figures.jpg"> </section>
<section id="breweries" class="dark">
  <h1>酿酒厂</h1>
  <p>在这里列出的酿酒厂和啤酒博物馆都可提供导游或英文讲解。当然，比利时的其它酿酒厂也随时欢迎游客到访，但是它们只可以提供荷兰语、法语或德语的导游或讲解。</p>
  <a href="http://www.visitflanders.com/en/themes/belgian-beer/index.jsp" target="_blank">了解更多 <span class="fa fa-chevron-right "></span></a> </section>
<section id="unique" class="light clear">
  <h1>是什么让比利时啤酒如此独特？</h1>
  <img src="../img/unique.jpg"> <img src="../img/unique-2.jpg"> </section>
<section id="womenbeer" class="dark">
  <h1>女性也钟爱啤酒！</h1>
  <p>有些人认为啤酒是属于男性的饮品，女性更倾向于红酒或品一品清淡的果味啤酒。现在到了解开这个谜题的时候了！在古巴比伦王国，女祭司为了纪念啤酒女神Ninkasi而喝酒。在中世纪时期，酿制啤酒其实是女性的工作。但是在比利时，啤酒似乎成为了男人的专属，佛拉芒的女人们对所有可口的比利时啤酒全都视而不见，不感兴趣。事实果真如此吗？</p>
  <a href="../womenbeer">了解更多 <span class="fa fa-chevron-right "></span></a> </section>
<section id="contact" class="light">
  <h1>联系我们</h1>
  <p>如果您有任何问题或意见，请与我们联系，我们会尽快给您回复。<br>
    <br>
    中国北京市朝阳区工体北路21号 永利国际1单元1107</p>
  <br>
  <br>
  <form id="contact-page" name="contact-page" method="post" action="contact.php" onSubmit="return javascript: alert('Thankyou for your Enquiry.\n\nWe will contact you within 24-48hrs.');" >
    <fieldset>
      <label for="name">姓名</label>
      <input type="text" name="name" id="name" required data-msg-required="请填写姓名">
    </fieldset>
<input type="hidden" name="subject" id="subject" value="ch.beerinflanders.com">
    <fieldset>
      <label for="email">电子邮件</label>
      <input type="email" name="email" id="email" required data-msg-required="请填写电子邮件">
    </fieldset>
    <fieldset>
      <label for="phone">电话</label>
      <input type="text" name="phone" id="phone" required data-msg-required="请填写电话号码">
    </fieldset>
    <input type="hidden" id="client_ip" name="client_ip" value="<?php echo $_SERVER['REMOTE_ADDR'] ?>">
    <div class="clear"></div>
    <br>
    <fieldset>
      <label for="message">留言</label>
      <textarea id="message" name="message"></textarea>
    </fieldset>
    <center>
      <input type="submit" value="提交">
    </center>
  </form>
  <script>
$("#contact-page").validate();
</script>
<style>
.error
{
color:red;
}
</style>
</section>
<?php require_once("../inc/footer.php"); ?>
</body>
</html>