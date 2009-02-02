<?php
$about_current = "current";
$title = "Usage";
include "../includes/header.inc.php";
?>

<h2>How to AutoEmbed</h2>

<p><em>AutoEmbed</em> is available as a 
<a href="<?=BASE_URL?>/api/">web service</a> for performing <em>URL to Embedded Video</em> conversions, 
as well as a <a href="<?=BASE_URL?>/download/">downloadable PHP class</a>.  This tutorial shows how
to use AutoEmbed in your own projects as a included PHP class.</p>

<h3>Quick Synopsis</h3>
<h4>Include the AutoEmbed class file</h4>

<pre>include "/path/to/libraries/AutoEmbed.class.php";</pre>

<h4>Obtain a new instance of the class</h4>
<pre>$AE = new AutoEmbed();</pre>

<h4>Load the embed source</h4>
<pre>
// load the embed source from a remote url
$AE->parseUrl('http://youtube.com/etc/etc');

// or load the embed source from a local file
$AE->embedLocal('/public/flash/awesome-video.flv');
</pre>

<h4>Inspect the flash vars from the video</h4>
<pre>var_dump($AE->getFlashParams());</pre>

<h4>Inspect the object params too</h4>
<pre>var_dump($AR->getObjectParams());</pre>

<h4>Let's change some parameters to suit our needs</h4>
<pre>
$AE->setParam('wmode','transparent');
$AE->setParam('autoplay','false');
</pre>

<h4>Inspect the flash vars again</h4>
<pre>var_dump($AE->getFlashParams());</pre>

<h4>Embed it on my page</h4>
<pre>echo $AE->getEmbedCode();</pre>

<h4>Parse a new URL, rinse and repeat as needed</h4>
<pre>$AR->parseUrl('http://videoplace.net/newvideo');</pre>

<p>To examine the output returned by these methods, check out the
<a href="<?=BASE_URL?>/demos/">demonstrations</a> for yourself.</p>

<?
include "../includes/footer.inc.php";
?>
