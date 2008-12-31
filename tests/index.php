<html>
<head>
<title>AutoEmbed Testing Suite</title>
<style>
body {font-family:helvetica;font-size:12px;}
ul {list-style:none;padding:0;margin:0;}
li {width:180px;float:left;}
li a {display:block;padding:2px 5px;}
li a:hover {background:#eee;}
</style>
<body>
<?php
error_reporting(E_ALL);
require_once '../AutoEmbed.class.php';
require_once '../data/test_urls.php';
global $test_urls;

$ae = new AutoEmbed();
?>


<h1>AutoEmbed Testing Suite</h1>
<p>Select a site to test.</p>
<ul>
<? foreach ($test_urls as $site=>$url) { ?>
  <li><a href="?url=<?=$url?>"><?=$site?></a></li>
<? } ?>
</ul>
<br style="clear:both;" />


<? if (!empty($_GET['url'])) { ?>
  <div style="background:#eee;padding:20px;margin-top:15px;">
  <?
  if ($ae->parseUrl($_GET['url'])) {
    // Construct HTML tag for embedding the video
    $embed_tag = $ae->getEmbedCode();
    // Extract the video's media params  (movie url, width, height, media type, etc)
    $params = $ae->getParams();
    ?>
    <table cellspacing="10">
      <tr>
        <td><?=$embed_tag?></td>
        <td>
          <h2><?=$params['title']?></h2>
          <pre style="font-size:11px;"><?var_dump($params)?></pre>
        </td>
      </tr>
    </table>
  <? } else { ?>
    <h2>Could not obtain video metadata for site: <?=$params['title']?></h2>
  <? } ?>
  </div>
<? } ?>


</body>
</html>