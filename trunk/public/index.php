<?php
$title = "Video Embedding";
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
  <li>Very fast and lightweight - does not depend on any external libraries</li>
  <li>Available as a single PHP class, easily includable in your own projects</li>
  <li>Supports <a href="<?=BASE_URL?>/demos/">over 150 audio &amp; video sites</a> (with more being added often)</li>
  <li>Provides easy error checking in the event that a URL is not valid</li>
  <li>Produces valid XHTML valid code</li>
</ul>
<br />

<h3>Embeds video from popular video sites</h3>
<div style="text-align:center;margin:20px 0;">
<a href="http://youtube.com"><img alt="Youtube" class="logo" src="<?=BASE_URL?>/images/logos/youtube.png" />    </a> 
<a href="http://hulu.com"><img alt="Hulu" class="logo" src="<?=BASE_URL?>/images/logos/hulu.png" />      </a> 
<a href="http://vimeo.com"><img alt="Vimeo" class="logo" src="<?=BASE_URL?>/images/logos/vimeo.png" />      </a> 
<a href="http://vids.myspace.com/"><img alt="Myspacevideo" class="logo" height="40" src="<?=BASE_URL?>/images/logos/myspacevideo.png" /></a> 
<a href="http://www.cbs.com/video/">  <img alt="Cbs" class="logo" height="40" src="<?=BASE_URL?>/images/logos/cbs.png" /></a> 
<a href="http://espn.go.com/video/"><img alt="Espn" class="logo" height="40" src="<?=BASE_URL?>/images/logos/espn.png" /></a> 
<a href="http://video.yahoo.com"><img alt="Yahoo-video" class="logo" height="40" src="<?=BASE_URL?>/images/logos/yahoo-video.png" /></a> 
<a href="http://theonion.com"><img alt="Theonion" class="logo" height="40" src="<?=BASE_URL?>/images/logos/theonion.png" /></a>      
<a href="http://metacafe.com"><img alt="Metacafe" class="logo" height="40" src="<?=BASE_URL?>/images/logos/metacafe.png" /></a> 
<a href="http://funnyordie.com"><img alt="Funnyordie" class="logo" height="40" src="<?=BASE_URL?>/images/logos/funnyordie.png" /></a> 
<a href="http://megavideo.com"><img alt="Megavideo" class="logo" height="40" src="<?=BASE_URL?>/images/logos/megavideo.png" /></a> 
<a href="http://dailymotion.com"><img alt="Dailymotion" class="logo" height="40" src="<?=BASE_URL?>/images/logos/dailymotion.png" /></a> 
<a href="http://bliptv.com"><img alt="Bliptv" class="logo" height="40" src="<?=BASE_URL?>/images/logos/bliptv.png" /></a> 
<a href="http://break.com"><img alt="Break" class="logo" height="40" src="<?=BASE_URL?>/images/logos/break.png" /></a> 
<a href="http://spike.com"><img alt="Spike" class="logo" height="40" src="<?=BASE_URL?>/images/logos/spike.png" /></a> 
<a href="http://veoh.com"><img alt="Veoh" class="logo" height="40" src="<?=BASE_URL?>/images/logos/veoh.png" /></a> 
<a href="http://imeem.com"><img alt="Imeem" class="logo" src="<?=BASE_URL?>/images/logos/imeem.png" /></a> 
</div>

<div class="box">

<p><b>Some programming is required.</b> <em>AutoEmbed</em> is available as a 
<a href="api/">web service</a> for performing <em>URL to Embedded Video HTML</em> conversions, 
and is available for <a href="download/">download</a> as a PHP class, licensed
under the LGPL.</p>

</div>
<?
include "includes/footer.inc.php";
?>
