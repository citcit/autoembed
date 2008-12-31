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

require_once 'test_urls.php';
global $test_urls;

$ae = new AutoEmbed();

echo "<h1>AutoEmbed Testing Suite</h1>\n";
echo "<table>\n";

$i = 0;
foreach ($test_urls as $site=>$url) {
  $i++;
  echo "<tr>\n";

  // Parse new URL
  if (!$ae->parseUrl($url)) {
    echo "<td colspan=\"2\"><h2>Error finding video metadata from {$site}.</h2></td>";
    continue;
  }

  // Construct HTML tag for embedding the video
  $embed_tag = $ae->getEmbedCode();
  echo "<td><pre>";
  echo $embed_tag;
  #echo "<br />";
  #echo htmlspecialchars($embed_tag);
  echo "</pre></td>";

  // Extract the video's media params  (movie url, width, height, media type, etc)
  $params = $ae->getParams();
  echo "<td>";
  echo "<h2>{$site}</h2>\n";
  var_dump($params);
  echo "</td>";


  echo "</tr>\n";
  if ($i > 10) break; // exit after 10 to keep browser from crashing :)
}
echo "</table>\n";
?>
