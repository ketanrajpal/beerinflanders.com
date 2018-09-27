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
  <h1>ベルギービールについて</h1>
  <p>ベルギーはビール愛好家の天国です。1500以上の種類のオリジナルビールがあります。その多くに、そのビールが一番おいしく飲めるようにデザインされた専用ビールグラスがあります。まるでワインの愛好家のように、ベルギー人はビールにとことんこだわります。ベルギービールの特色は、中世から比類のない評判を受けてきました。<br>
    <br>
   愛好家がベルギービールを好む理由はベルギービールの多様性、本物の味、個性などが挙げられます。ベルギービールの選択肢はほぼ無限です。ベルギーエール、ラズベリービールやチェリービール、白ビール、年代物のフランダース・レッドとブラウン、アビービールとトラピストビール、そしてベルギーのもっとも有名なビール ― ランビックとグーズなどがあります。</p>
</section>
<section id="history" class="dark">
  <h1>ベルギービールの歴史</h1>
  <p>数世紀前に遡るビールの伝統と、現在の醸造者が完璧な品質のビール醸造にかける情熱によってベルギーは品質抜群なビールの本場になりました。革新的な醸造知識で製造され、ユニークな個性を持つ数々のビールが生まれました。したがって、ベルギーの醸造者が主な国際ビールコンペティションの賞を独占するのも当然のことと言えるでしょう。</p>
  <a href="../history">詳細はこちら <span class="fa fa-chevron-right "></span></a> </section>
<section id="styles" class="light clear">
  <h1>ベルギービールの種類</h1>
  <p>ビールは、伝統的に水、大麦およびホップから作られますが、時々、さわやかな柑橘系の風味を出すために小麦が加えられます。</p>
  <article>
    <h2>ビール作り</h2>
    <span class="line"></span> <img src="../img/beer-making.jpg">麦芽汁に酵母培養物が添加され、それが糖を、二酸化炭素とアルコールに分解します。すべての醸造所は独自の酵母培養菌株を持っており、異なるタイプの麦芽とホップと組み合わせ、その固有の特性がその醸造所特有のビールのタイプを決定づけます。ビールは、木製の樽の中で発酵させたり、あるいは瓶内で二次発酵をさせることがあります。</article>
  <article>
    <h2>最後の仕上げ</h2>
    <span class="line"></span> <img src="../img/finishing-touch.jpg"> 様々なベルギービールが、ビールの味と安定性を確保するために、米やトウモロコシなどの「きめの粗い穀物」を追加します。醸造過程で非常に重要な成分は、もちろん、ビールに苦味を与えるだけでなく保存を助けるホップです。クラシックなビターホップのほかに、ベルギーの醸造者は、その典型的な、多くの場合フルーティな風味を出すためにさらに芳香性のホップに目を向けています。ランビックの醸造者は、苦味を押さえたビールにするために熟成し乾燥したホップを使用しています。 </article>
  <article>
    <h2>ビールの種類</h2>
    <span class="line"></span> <img src="../img/beer-styles.jpg"> ビールとビールのスタイルは使用した発酵法によって分類され、低、高、自発、混合の4つの発酵法があります。<br>
    <br>
    ユニークで、ベルギービールに典型的な２つのスタイルは、自然発酵と混合発酵のビールです。 </article>
</section>
<section id="factsfigures"> <img src="../img/facts&figures.jpg"> </section>
<section id="breweries" class="dark">
  <h1>ビール醸造所</h1>
  <p>ここで挙げたビール醸造所とビール博物館ではガイド付ツアーまたは英語の表記があります。もちろん、この他の醸造所も見学を随時に歓迎しますが、オランダ語、フランス語とドイツ語でのガイドまたは表記になります。</p>
  <a href="http://www.visitflanders.com/en/themes/belgian-beer/index.jsp" target="_blank">詳細はこちら <span class="fa fa-chevron-right "></span></a> </section>
<section id="unique" class="light clear">
  <h1>ベルギービールはなにがユニークか？</h1>
  <img src="../img/unique.jpg"> <img src="../img/unique-2.jpg"> </section>
<section id="womenbeer" class="dark">
  <h1>女性もビール好き！</h1>
  <p>女性はワインかフルティーで爽やかなビール好みで、ビールは男性の飲み物だと思いがちです。今、この迷信が解けるときが来ました！古代バビロニア王国で、ニンカシはビールと醸造を司る女神のことです。巫女は女神への崇拝を表するためにビールを飲みました。中世には、ビール醸造は女性の仕事でした。ただし、ベルギーにおいて、ビールは男性だけに独占されているようです。フランダースの女性たちは果たしてベルギービールに対する興味がないのでしょうか。</p>
  <a href="../womenbeer">詳細はこちら <span class="fa fa-chevron-right "></span></a> </section>
<section id="contact" class="light">
  <!--<h1>お問い合わせ</h1>
  <p>本ウェブサイトについて、ご質問やコメントがございましたら、お気軽にお問合わせください。<br>
    <br>
    ベルギー・フランダース政府観光局
<br>
  102-0083東京都千代田区麹町5-1 NK真和ビル5階</p>
  <br>
  <br>
  <form id="contact-page" name="contact-page" method="post" action="contact.php" onSubmit="javascript: alert('お問い合わせを受付けました。回答までしばらくお待ちください。');">
    <fieldset>
      <label for="name">お名前</label>
      <input type="text" name="name" id="name" required>
    </fieldset>
<input type="hidden" name="subject" id="subject" value="jp.beerinflanders.com">
    <fieldset>
      <label for="email">Eメールアドレス</label>
      <input type="email" name="email" id="email" required>
    </fieldset>
    <fieldset>
      <label for="phone">電話</label>
      <input type="text" name="phone" id="phone" required>
    </fieldset>
    <div class="clear"></div>
    <br>
    <fieldset>
      <label for="message">メッセージをどうぞ</label>
      <textarea id="message" name="message"></textarea>
    </fieldset>
    
    <input type="hidden" id="send_url" name="send_url" value="beerinflanders.com">
 <input type="hidden" id="redirect_url" name="redirect_url" value="http://www.jp.beerinflanders.com/home">
 <input type="hidden" id="send_email" name="send_email" value="info@hollandflanders.jp">
 <input type="hidden" id="send_name" name="send_name" value="Beer in Flanders">
    
    <center>
      <input type="submit" value="送信">
    </center>
  </form>-->
  
  <h1>お問い合わせ</h1>
<p>本ウェブサイトについて、ご質問やコメントがございましたら、お気軽にお問合わせください。</p>
<p><a href="mailto:info@hollandflanders.jp">info@hollandflanders.jp</a></p>
<p>ベルギー・フランダース政府観光局 <br>102-0083東京都千代田区麹町5-1 NK真和ビル5階</p>
  
  </div>
</section>
<?php require_once("../inc/footer.php"); ?>
</body>
</html>