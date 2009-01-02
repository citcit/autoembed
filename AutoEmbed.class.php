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

class AutoEmbed {
  
  private $_video_id;
  private $_site;
  private $_params;

  /**
   * AutoEmbed Constructor
   *
   * @return object - AutoEmbed object
   */
  public function __construct() {
    global $sites;

    include_once 'sites.php';
  }

  /**
   * Parse given URL
   *
   * @param $url string - href to check for embeded video
   *
   * @return boolean - whether or not the url contains valid/supported video
   */
  public function parseUrl($url) {
    global $sites;

    foreach ($sites as $site) { 
      if ( preg_match('~'.$site['embed-pattern'].'~imu', $url, $match) ) {
        $this->_video_id = $match;
        $this->_site = $site;
        $this->_setDefaultParams($url);
        return true;
      }
    }

    unset($site);
    return false;
  }

  /**
   * Returns the website that is hosting
   * the video
   *
   * @return string - host website
   */
  public function getHost() {
    return $this->_site['title'];
  }
  

  /**
   * Return params about the video metadata
   *
   * @return array - video metadata
   */
  public function getParams() {
    return $this->_params;
  }

  /**
   * Convert the url to an embedable tag
   *
   * returns string - the embed html
   */
  public function getEmbedCode() {
    $object_html = $this->_buildObject();
    $this->_injectId($object_html);

    return $object_html;
  }

  /**
   * Override a default param value
   *
   *
   * @param $param string - the name of the param to be set
   * @param $value string - the value to set the param to
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setParam($param, $value) {

    if (!is_array($this->_params)) return false;

    $this->_params[$param] = $value;

    return true;
  }

  /**
   * Build a generic object skeleton 
   */
  private function _buildObject() {
    $object_html = '<object classid="CLSID:D27CDB6E-AE6D-11CF-96B8-444553540000" ' .
                   '        codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,115,0" ' .
                   '        type="application/x-shockwave-flash" ' . 
                   '        width="' . $this->_params['width'] . '"' .
                   '        height="' . $this->_params['height'] . '">';

    $param_html = '<param name="movie" value="' . $this->_params['src'] . '" />';
    
    $embed_html = '<embed type="application/x-shockwave-flash" ' .
                  '        src="' . $this->_params['src'] . '"' . 
                  '        width="' . $this->_params['width'] . '"' .
                  '        height="' . $this->_params['height'] . '"';

    foreach ($this->_params as $param => $value) {
      if ($param == 'src' || $param == 'height' || $param == 'width') continue;
      
      $param_html .= '<param name="' . $param . '" value="' . $value . '" />';
      $embed_html .= '  ' . $param . '="' . $value . '"';
    }
    
    $embed_html .= ' />';
    
    return $object_html . $param_html . $embed_html . '</object>';
  }

  /**
   * Inject the id of the object we're embeding into the
   * object skeleton
   */
  private function _injectId(&$object_html) {
    for ($i=1; $i<=count($this->_video_id); $i++) {
      $object_html = str_ireplace('$'.$i, $this->_video_id[$i - 1], $object_html);
    }
  }

  
  /**
   * Set the default params for the type of
   * site we are working with
   */
  private function _setDefaultParams() {
    $this->_params = array(
            'wmode' => 'transparent',
            'quality' => 'high',
            'allowFullScreen' => 'true',
            'allowScriptAccess' => 'never',
            'pluginspage' => 'http://www.macromedia.com/go/getflashplayer',
            'autoplay' => 'false',
            'autostart' => 'false',
            'width' => $this->_site['embed-width'] . 'px',
            'height' => $this->_site['embed-height'] . 'px',
            'src' => $this->_site['embed-movie'],
           );
            
  }
}

?>
