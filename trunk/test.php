<?php
/**
 * This file is part of AutoEmbed.
 * http://code.google.com/p/autoembed/
 *
 * AutoEmbed is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * 
 * AutoEmbed is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AutoEmbed.  If not, see <http://www.gnu.org/licenses/>.
 */

error_reporting(E_ALL);

require_once 'AutoEmbed.class.php';

$ae = new AutoEmbed();
if (!$ae->parseUrl('http://www.youtube.com/watch?v=NbwpgyRUv5g')) {
  echo('Error finding video metadata.');
}

// Extract the video's media params  (movie url, width, height, media type, etc)
$params = $ae->getParams();
echo "<h2>Params</h2>\n";
echo "<pre>";
var_dump($params);
echo "</pre>";

// Construct HTML tag for embedding the video
$embed_tag = $ae->getEmbedCode();
echo "<h2>Embed Code</h2>\n";
echo "<pre>";
echo $embed_tag;
echo "<br />";
echo htmlspecialchars($embed_tag);
echo "</pre>";
?>
