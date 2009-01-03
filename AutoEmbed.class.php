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
   * Returns info about the website 
   * hosting the video
   *
   * @param string $property - (optional) the specific
   *           property of the site to be returned.  If 
   *           ommited, array of all properties are returned
   *
   * @return mixed - details about the site the embed
   *                 link is hosted on 
   */
  public function getHost($property) {
    return isset($property) ? $this->_site[$property] : $this->_site;
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
    return $this->_buildObject();
  }

  /**
   * Override a default param value
   *
   * @param $param mixed - the name of the param to be set
   *                       or an array of multiple params to set
   * @param $value string - (optional) the value to set the param to
   *                        if only one param is being set
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setParam($param, $value = '') {
    if (!is_array($this->_params)) return false;

    if ( is_array($param) ) {
      foreach ($param as $p => $v) {
        $this->_params[$p] = $v;
      }
    
    } else {
      $this->_params[$param] = $value;
    }
    
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
   * Set the default params for the type of
   * site we are working with
   */
  private function _setDefaultParams() {

    for ($i=1; $i<=count($this->_video_id); $i++) {
      $source = str_ireplace('$'.$i, $this->_video_id[$i - 1], $this->_site['embed-movie']);
    }
    
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
            'src' => $source,
           );   
  }

}

?>
