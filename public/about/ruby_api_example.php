<?php
$about_current = "current";
$title = "Web API";
include "../includes/header.inc.php";
?>

<h2>Using the Web API with Ruby</h2>

<p>Using <em>AutoEmbed</em> with any language other than PHP is as simple as making a request to the <em>web API</em>.  Below is an example of how to make a request using Ruby.</p>

<h3>Quick Synopsis</h3>

<h4>Send the escaped URL to the AutoEmbed API</h4>
<pre>
url = CGI.escape 'http://videoworld.com/Ahg6qcgoay4'
embed = open("http://autoembed.com/api/?url=#{url}&fmt=raw").read
</pre>

<h4>Check to see if any embed code was returned</h4>
<pre>
if embed.blank?
  post = url
else
  post = embed
end
</pre>

<h4>Parse a new URL, rinse and repeat as needed</h4>
<pre>
url = CGI.escape 'http://newvideo.com/lolz'
embed = open("http://autoembed.com/api/?url=#{url}&fmt=raw").read
</pre>

<?
include "../includes/footer.inc.php";
?>
