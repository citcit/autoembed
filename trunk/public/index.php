<?php
$intro_current = "current";
include "includes/header.inc.php";
?>

<h2>Introduction to AutoEmbed</h2>

<p><em>AutoEmbed</em> is a utility and service for developers to generate
<a target="_new" href="http://www.w3schools.com/flash/flash_inhtml.asp">HTML embed tags</a> 
from a given URL.  It also provides the means to optionally manipulate the 
retrieved media information by setting parameters, and finally returning 
a reconstructed HTML snippet for presenting <a target="_new" href="http://www.adobe.com/flashplatform/">Flash Video</a>
on a website.</p>

<p><b>Some programming is required.</b> <em>AutoEmbed</em> is available as a 
<a href="api/">web service</a> for performing <b>URL to Embed</b> conversions, 
as well as a <a href="download/">downloadable PHP class</a>.</p>

<h2>Quick Synopsis</h2>
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

<?
include "includes/footer.inc.php";
?>
