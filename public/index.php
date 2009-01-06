<?php
include "includes/header.inc.php";
?>

<h2>AutoEmbed Makes Embeddable Audio/Video HTML</h2>

<p><em>AutoEmbed</em> is a utility and service that generates
<a target="_new" href="http://www.w3schools.com/flash/flash_inhtml.asp">HTML embed tags</a> 
for audio or video located on a given URL.  It also provides the means to optionally manipulate the 
retrieved media information by setting parameters, and finally returning 
a reconstructed HTML snippet for presenting <a target="_new" href="http://www.adobe.com/flashplatform/">Flash video</a>
on a website.</p>

<ul>
  <li>Translate any given URL (from a supported video site) into an &lt;embed&gt; HTML snippet</li>
  <li>Is very lightweight and does not depend on any external libraries</li>
  <li>Available as a single PHP class, easily includable in your own projects</li>
  <li>Supports <a href="<?=BASE_URL?>/demos/">over 150 audio &amp; video sites</a> (with more being added often)</li>
  <li>Provides easy error checking in the event that a URL is not valid</li>
</ul>

<p><b>Some programming is required.</b> <em>AutoEmbed</em> is available as a 
<a href="api/">web service</a> for performing <em>URL to Embedded Video</em> conversions, 
and is available for <a href="download/">download</a> as a PHP class, licensed
under the LGPL.</p>

<?
include "includes/footer.inc.php";
?>
