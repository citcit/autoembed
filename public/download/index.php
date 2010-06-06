<?php
$download_current = "current";
$title = "Download";
include "../includes/header.inc.php";
?>

<h2>Download AutoEmbed</h2>

<p><img src="<?=BASE_URL?>/images/download.png" align="absmiddle" /> <a href="http://autoembed.googlecode.com/files/AutoEmbed-1.6.tar.gz">AutoEmbed PHP Class</a> (1.6 Released 2/23/10)</p>

<p><em>AutoEmbed</em> is the product of collaborative development between
<em>Corey Wilson</em> of <a target="_new" href="http://2catdesigns.com">2catdesigns</a>
and <em>Jason Hines</em> of <a target="_new" href="http://devtwo.com/">DevTwo Software</a>.</p>
<p>AutoEmbed is licensed under the <a href="http://www.gnu.org/licenses/lgpl.txt">GNU Lesser General Public License</a>.</p>

<div class="box">
  <h3>For users of WordPress and MyBB forum software...</h3>
  <p>AEFlowPlayer is a plugin available for WordPress and MyBB forums that adds AutoEmbed to your site.</p>
  <p><a href="http://code.google.com/p/aeflowplayer/">Visit the AEFlowPlayer Project</a></p>
</div>

<div class="box">
  <div style="float:left;width:70%;">
    <h3>Donations? Hey Thanks!</h3>
    <p>We offer this service and product free of charge, and are glad to do so.  However, sending
    us a few bucks is hands-down the best way to get your suggestion or feature request
    noticed.  Also, it helps pay the hosting costs to keep this project going.</p>
  </div>
  <div style="float:right;">
    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_new">
    <input type="hidden" name="cmd" value="_s-xclick">
    <input type="hidden" name="encrypted" value="-----BEGIN PKCS7-----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-----END PKCS7-----">
    <input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="">
    <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
    </form>
  </div>
  <br class="clear" />
</div>
<?
include "../includes/footer.inc.php";
?>
