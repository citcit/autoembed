<?php
/*
Plugin Name: AutoEmbed
Plugin URI: http://www.autoembed.com/download/
Description: Plugin to embed videos from over 150 video sites
Date: 04/01/2009
Author: Jason Hines
Author URI: http://devtwo.com
Version: 1.0

Copyright 2009 Jason Hines
This software is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

add_filter('the_content','autoembed_content');

function autoembed_content($content) {
  preg_match_all('/\[embed:(.*?)]/i', $content, $matches);
  for($i=0;$i<count($matches[0]);$i++) {
    $url = $matches[1][$i];
    $replace = file_get_contents("http://autoembed.com/api/?url={$url}&fmt=raw");
    $content = str_replace($matches[0][$i], $replace, $content);
  }
  return $content;
}
?>
