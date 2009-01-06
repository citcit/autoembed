<?php
$demo_current = "current";
include "../includes/header.inc.php";

# load the test urls
include "test_urls.php";

# setup AE
include "../../AutoEmbed.class.php";
$ae = new AutoEmbed();
?>

<h2>AutoEmbed Live Demos</h2>
<p>Select a site preset to test.  Each site preset consists of a single URL,
which points to a video located within that site.</p>
<p><em><b>Note:</b> This list is a comprehensive set of sites that AutoEmbed supports.  This list is not complete
and will likely change often as we support more video sites in the future.</em></p>
</div>
</div>

<div id="wide-area">

  <div id="demo-list">
    <ul>
      <? foreach ($test_urls as $site=>$url) { ?>
        <li class="<?=(base64_encode($url)==$_GET['url']?'current':'')?>"><a href="?url=<?=base64_encode($url)?>#demo-area" title="Test: <?=$url?>"><?=$site?></a></li>
      <? } ?>
      <br class="clear" />
    </ul>
  </div>

  <? if (!empty($_GET['url'])) { ?>
    <div id="demo-area">
    <?
    if ($ae->parseUrl(base64_decode($_GET['url']))) {
      // Construct HTML tag for embedding the video
      $embed_tag = $ae->getEmbedCode();
      // Extract the video's media params
      $flash_params = $ae->getFlashParams();
      $object_params = $ae->getObjectParams();
      ?>
      <h2 style="margin:0;">Test Results for Site: <em><?=$ae->getHost('title')?></em></h2>
      <p><b>Testing URL &rarr;</b> <a href="<?=base64_decode($_GET['url'])?>" target="_new"><?=base64_decode($_GET['url'])?></a></p>

      <h4>Embedded Media</h4>
      <?=$embed_tag?>

      <h4>Embed Code</h4>
      <textarea style="width:100%;" rows="10"><?=htmlspecialchars($embed_tag)?></textarea>
      
      <h4>Flash Params</h4>
      <pre><?var_dump($flash_params)?></pre>
      
      <h4>Object Params</h4>
      <pre><?var_dump($object_params)?></pre>
      <h1 style="text-align:center;">Thanks <em>AutoEmbed</em>, you're awesome!</h1>
    <? } else { ?>
      <h2 style="margin:0;">Test Results</h2>
      <p>Error: Could not obtain video metadata for URL: <a href="<?=base64_decode($_GET['url'])?>" target="_new"><?=base64_decode($_GET['url'])?></a></h3>
    <? } ?>
    </div>
  <? } ?>
</div>

<?
include "../includes/footer.inc.php";
?>
