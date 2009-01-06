<?php
$intro_current = "current";
include "includes/header.inc.php";
?>

<h2>AutoEmbed - Finally a url-to-embed function!</h2>

<p><em>AutoEmbed</em> is a utility and service that generates
<a target="_new" href="http://www.w3schools.com/flash/flash_inhtml.asp">HTML embed tags</a> 
for a given URL.  It also provides the means to optionally manipulate the 
retrieved media information by setting parameters, and finally returning 
a reconstructed HTML snippet for presenting <a target="_new" href="http://www.adobe.com/flashplatform/">Flash Video</a>
on a website.</p>

<p><b>Some programming is required.</b> <em>AutoEmbed</em> is available as a 
<a href="api/">web service</a> for performing <em>URL to Embedded Video</em> conversions, 
as well as a <a href="download/">downloadable PHP class</a>.</p>

<h3>Quick Synopsis</h3>
<pre>
// Obtain a new instance of the class...
$AE = new AutoEmbed();

// Parse a url that contains a video.
$AE->parseUrl('http://youtube.com/etc/etc');

// Inspect the flash vars from this movie.
var_dump($AE->getFlashParams());

// Inspect the object params too.
var_dump($AR->getObjectParams());

// Let's change some parameters.
$AE->setParam('wmode','transparent');
$AE->setParam('autoplay','false');

// Inspect the flash vars again.
var_dump($AE->getFlashParams());

// Looks good, embed it on my page.
echo $AE->getEmbedCode();

// And do it again with a different URL.
$AR->parseUrl('http://videoplace.net/newvideo');
</pre>


<p>To examine the output returned by these methods, check out the
<a href="<?=BASE_URL?>/demos/">demonstrations</a> for yourself.</p>

<?
include "includes/footer.inc.php";
?>
