<?php
$about_current = "current";
$title = "Usage";
include "../includes/header.inc.php";
?>

<p><em>AutoEmbed</em> is available as a <a href="<?=BASE_URL?>/download/">downloadable PHP class</a> that you can use directly.  These examples show how
to interface with AutoEmbed in your own projects.</p>

<h2>PHP Class Example</h2>

<div class="box">
	<h4>Include the AutoEmbed class file</h4>
	
	<pre>include "/path/to/libraries/AutoEmbed.class.php";</pre>
	
	<h4>Obtain a new instance of the class</h4>
	<pre>$AE = new AutoEmbed();</pre>

	<h4>Parse any URL that contains a video on the page</h4>
  <p>If URL does not contain a resource, these methods will return false.
<pre>
// load the embed source from a remote url
if (!$AE->parseUrl('http://www.youtube.com/watch?v=ikTxfIDYx6Q')) {
    // No embeddable video found (or supported)
}

// or alternatively, load the embed source from a local FLV file
if (!$AE->embedLocal('/public/flash/awesome-video.flv')) {
    // No embeddable video found
}
</pre>

	<h4>If resource is an image, you can retrieve it's URL</h4>
<pre>
// PHP
$imageURL = $AE->getImageURL();
// HTML
&lt;img src="&lt;?=$imageURL?&gt;" /&gt;
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

</div>

<p>To examine the output returned by these methods, check out the
<a href="<?=BASE_URL?>/demos/">demonstrations</a> for yourself.</p>

<?
include "../includes/footer.inc.php";
?>
