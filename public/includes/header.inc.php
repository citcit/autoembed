<?
define('BASE_URL','/~jason/autoembed/public');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>AutoEmbed - Programmable Embedded Media for PHP</title>
<link rel="stylesheet" href="<?=BASE_URL?>/stylesheets/common.css" type="text/css" />
<meta name="description" content="AutoEmbed is a PHP class for manipulating embedded audio and video from various Internet sites." /> 
<meta name="keywords" content="php, embed, video, audio, object, media, php class, extract, html, code, web service, api, download, utility, flash, demo" /> 
</head>
<body>

<div id="container">
  <div id="logo"><a href="<?=BASE_URL?>/"><img src="<?=BASE_URL?>/images/logo5b_flattened.png" alt="AutoEmbed PHP Class" border="0" /></a></div>
  <div id="nav">
    <ul>
      <li class="<?=@$about_current?>"><a href="<?=BASE_URL?>/about/">Synopsis</a></li>
      <li class="<?=@$demo_current?>"><a href="<?=BASE_URL?>/demos/">Demonstrations</a></li>
      <li class="<?=@$api_current?>"><a href="<?=BASE_URL?>/api/">API Service</a></li>
      <li class="<?=@$download_current?>"><a href="<?=BASE_URL?>/download/">Download</a></li>
      <li class="<?=@$docs_current?>"><a href="<?=BASE_URL?>/docs/">Documentation</a></li>
      <br class="clear" />
    </ul>
  </div>
  <div id="content">