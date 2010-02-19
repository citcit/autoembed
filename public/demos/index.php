<?php
$demo_current = "current";
$title = "Demos";
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
and will likely change often as we add more sites to this list in the future.</em></p>

<p>To suggest a new site to be added to this list or to report an issue found in this demonstration, please 
direct inquires to the <a href="http://groups.google.com/group/autoembed/">AutoEmbed Project</a> page.</p>

</div>
</div>

<div id="wide-area">
  <div id="demo-list">
    <h4>Select a site</h4>
    <ul>
      <? foreach ($verified_urls as $site=>$url) { ?>
        <li class="<?=(base64_encode($url)==$_GET['url']?'current':'')?>"><a href="?url=<?=base64_encode($url)?>#demo-area" title="Test: <?=$url?>"><?=$site?></a></li>
      <? } ?>
      <br class="clear" />
    </ul>
  </div>

  <? if (!empty($_GET['url'])) { ?>
    <div id="demo-area" class="result box">
    <?
    if ($ae->parseUrl(base64_decode($_GET['url']))) {
      // Construct HTML tag for embedding the video
      $embed_tag = $ae->getEmbedCode();
      $object_params = $ae->getObjectParams();
      ?>
      <h2 style="margin:0;">Test Results for Site: <em><?=$ae->getStub('title')?></em></h2>
      <p><b>Testing URL &rarr;</b> <a href="<?=base64_decode($_GET['url'])?>" target="_new"><?=base64_decode($_GET['url'])?></a></p>

      <h4>Embedded Media</h4>
      <?=$embed_tag?>
      <br /><br />

      <? if ($image = $ae->getImageURL()) { ?>
      <h4>Image</h4>
        <img src="<?=$image?>">
      <br /><br />
      <? } ?>

      <h4>Embed Code</h4>
      <textarea style="width:100%;" rows="10"><?=htmlspecialchars($embed_tag)?></textarea>
      <br /><br />      
      
      <h4>Object Params</h4>
      <pre><?var_dump($object_params)?></pre>

      <h1 style="text-align:center;">Thanks <em>AutoEmbed</em>, you're awesome!</h1>
    <? } else { ?>
      <h2 style="margin:0;">Test Results</h2>
      <p>Error: Could not obtain video metadata for URL: <a href="<?=base64_decode($_GET['url'])?>" target="_new"><?=base64_decode($_GET['url'])?></a></h3>
    <? } ?>
      <p style="text-align:center;margin-top:10px;"><a href="#demo-list">Back up to List</a></p>
    </div>
  <? } ?>
</div>

<?
include "../includes/footer.inc.php";
?>
