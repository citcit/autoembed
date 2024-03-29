<?php
include "../../AutoEmbed.class.php";

if (isset($_GET['url'])) {
  $AE = new AutoEmbed;
  if ($AE->parseUrl($_GET['url'])) {
    $embed_code = $AE->getEmbedCode();
  }    
  if ($_GET['demo']!='1') die($embed_code);
}

$api_current = "current";
$title = "API Service";
include "../includes/header.inc.php";
?>
<h2>AutoEmbed Web Service</h2>


<div class="box" style="padding-bottom:0;">
  <h4><label for="url">Enter a URL to Auto-Embedify</label></h4>
  <form methpd="get" action="<?=BASE_URL?>/api/">
    <input type="text" id="url" size="60" name="url" value="<?=$_GET['url']?>" class="text" onClick="this.select();" />
    <input type="submit" value="Get Embed Code" class="button" /><br />
    <b>Format:</b>
    <label><input type="radio" name="demo" value="1" checked="true" /> Web Demonstration</label>
    <label><input type="radio" name="demo" value="0" /> Raw HTML Only</label>
  </form>
</div>

<? if (!empty($_GET['url'])) { ?>
  <? if (!$embed_code) { ?>
    <p>Sorry, the URL you entered is not supported by this version of AutoEmbed.</p>
  <? } else { ?>
    <div class="result box">
      <h4>Example from <em><?=$AE->getStub('title')?></em></h4>
      <?=$embed_code?>
      <br /><br />
      <h4>Embed Code</h4>
      <input type="text" size="80%" value="<?=htmlspecialchars($embed_code)?>" onClick="this.select();" />
    </div>
  <? } ?>
<? } ?>


<br />
<h3>Try a Few Examples</h3>
<ul>
  <li><a href="<?=BASE_URL?>/api/?demo=1&url=http://www.youtube.com/watch?v=tGEz31RA4es">YouTube</a></li>
  <li><a href="<?=BASE_URL?>/api/?demo=1&url=http://www.metacafe.com/watch/1669953/the_transporter_3/">MetaCafe</a></li>
  <li><a href="<?=BASE_URL?>/api/?demo=1&url=http://www.dailymotion.com/video/x5z2ym_jolcats_fun">DailyMotion</a></li>
  <li><a href="<?=BASE_URL?>/api/?demo=1&url=http://www.vimeo.com/2398561">Vimeo</a></li>
</ul>

<br />
<h4>Terms of Use</h4>
<p style="font-size:11px;line-height:1.2em;">
<img src="<?=BASE_URL?>/images/icon.png" align="left" style="margin-right:5px;margin-bottom:10px;" />
AutoEmbed was created as a free service to make posting embedded videos easier, 
and may only be used for legitimate video site URLs. Using it for spamming or illegal purposes is 
forbidden and any such use will result in the reporting of this abuse to your ISP's authorities.
(Your recorded IP address is <?=$_SERVER['REMOTE_ADDR']?>).  This service is provided without 
warranty of any kind.</p>


<?
include "../includes/footer.inc.php";
?>
