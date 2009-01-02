<html>
<head>
<title>AutoEmbed Testing Suite</title>
<style>
body,p {font-family:helvetica;font-size:11px;}
textarea {width:100%;height:150px;}
h1,h2 {margin-bottom:0;}
p {margin-top:0;}
ul {list-style:none;padding:0;margin:0;}
li {width:180px;float:left;}
li a {display:block;padding:2px 5px;}
li a:hover {background:#eee;}
</style>
<body>
<?php
error_reporting(E_ALL);
require_once '../AutoEmbed.class.php';
require_once 'test_urls.php';
global $test_urls;

$ae = new AutoEmbed();
?>


<h1>AutoEmbed Testing Suite</h1>
<p>Select a site to test.</p>
<ul>
<? foreach ($test_urls as $site=>$url) { ?>
  <li><a href="?url=<?=urlencode($url)?>" title="Test: <?=$url?>"><?=$site?></a></li>
<? } ?>
</ul>
<br style="clear:both;" />


<? if (!empty($_GET['url'])) { ?>
  <div style="background:#eee;padding:20px;margin-top:15px;">
  <?
  if ($ae->parseUrl(urldecode($_GET['url']))) {
    // Construct HTML tag for embedding the video
    $embed_tag = $ae->getEmbedCode();
    // Extract the video's media params  (movie url, width, height, media type, etc)
    $params = $ae->getParams();
    ?>
    <table border="0" width="100%">
      <tr>
        <td colspan="2" style="padding-bottom:10px;">
          <h2><?=$ae->getHost()?></h2>
          <p><b>Test URL &rarr;</b> <a href="<?=$_GET['url']?>" target="_new"><?=$_GET['url']?></a></p>
        </td>
      </tr>
      <tr>
        <td valign="top"><?=$embed_tag?></td>
        <td valign="top" style="padding-left:10px">
          <h4>Embed Code</h4>
          <textarea><?=htmlspecialchars($embed_tag)?></textarea>
          <h4>Params</h4>
          <pre><?var_dump($params)?></pre>
        </td>
      </tr>
    </table>
  <? } else { ?>
    <h3>Could not obtain video metadata for URL: <a href="<?=$_GET['url']?>" target="_new"><?=$_GET['url']?></a></h3>
  <? } ?>
  </div>
<? } ?>


</body>
</html>