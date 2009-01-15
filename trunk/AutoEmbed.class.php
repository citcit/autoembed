<?php
/**
 * This file is part of AutoEmbed.
 * http://autoembed.com
 *
 * AutoEmbed is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Lesser General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * AutoEmbed is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public License
 * along with AutoEmbed.  If not, see <http://www.gnu.org/licenses/>.
 */

class AutoEmbed {
  
  private $_media_id;
  private $_stub;
  private $_object_params;
  private $_flash_params;

  /**
   * AutoEmbed Constructor
   *
   * @return object - AutoEmbed object
   */
  public function __construct() {
    global $AutoEmbed_stubs;

    include_once 'stubs.php';
  }

  /**
   * Parse given URL
   *
   * @param $url string - href to check for embeded video
   *
   * @return boolean - whether or not the url contains valid/supported video
   */
  public function parseUrl($url) {
    global $AutoEmbed_stubs;

    foreach ($AutoEmbed_stubs as $stub) { 
      if ( preg_match('~'.$stub['url-match'].'~imu', $url, $match) ) {
        $this->_media_id = $match;
        $this->_stub = $stub;
        $this->_setDefaultParams($url);
        return true;
      }
    }

    unset($stub);
    return false;
  }

  /**
   * Returns info about the stub
   *
   * @param string $property - (optional) the specific
   *           property of the stub to be returned.  If 
   *           ommited, array of all properties are returned
   *
   * @return mixed - details about the stub 
   */
  public function getStub($property = null) {
    return isset($property) ? $this->_stub[$property] : $this->_stub;
  }

  /**
   * Return params about the video metadata
   *
   * @return array - video metadata
   */
  public function getFlashParams() {
    return $this->_flash_params;
  }

  /**
   * Return object params about the video metadata
   *
   * @return array - object params
   */
  public function getObjectParams() {
    return $this->_object_params;
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
   * Set the height of the object
   * 
   * @param mixed - height to set the object to
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setHeight($height) {
    return $this->setFlashParam('height', $height);
  }

  /**
   * Set the width of the object
   * 
   * @param mixed - width to set the object to
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setWidth($width) {
    return $this->setFlashParam('width', $width);
  }

  /**
   * Override a default param value for both the object
   * and flash param list
   *
   * @param $param mixed - the name of the param to be set
   *                       or an array of multiple params to set
   * @param $value string - (optional) the value to set the param to
   *                        if only one param is being set
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setParam($param, $value = null) {
    if ( !$this->setObjectParam($param, $value) ) {
      return false;
    }

    return $this->setFlashParam($param, $value);
  }

  /**
   * Override a default object param value
   *
   * @param $param mixed - the name of the param to be set
   *                       or an array of multiple params to set
   * @param $value string - (optional) the value to set the param to
   *                        if only one param is being set
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setObjectParam($param, $value = null) {
    if (!is_array($this->_object_params)) return false;

    if ( is_array($param) ) {
      foreach ($param as $p => $v) {
        $this->_object_params[$p] = $v;
      }

    } else {
      $this->_object_params[$param] = $value;
    }

    return true;
  }

  /**
   * Override a default flash param value
   *
   * @param $param mixed - the name of the param to be set
   *                       or an array of multiple params to set
   * @param $value string - (optional) the value to set the param to
   *                        if only one param is being set
   *
   * @return boolean - true if the value was set, false
   *                   if parseURL hasn't been called yet
   */
  public function setFlashParam($param, $value = null) {
    if (!is_array($this->_flash_params)) return false;

    if ( is_array($param) ) {
      foreach ($param as $p => $v) {
        $this->_flash_params[$p] = $v;
      }

    } else {
      $this->_flash_params[$param] = $value;
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
                   '        width="' . $this->_flash_params['width'] . '"' .
                   '        height="' . $this->_flash_params['height'] . '">';

    foreach ($this->_object_params as $param => $value) {
      $object_html .= '<param name="' . $param . '" value="' . $value . '" />';
    }

    $object_html .= '<embed ';

    foreach ($this->_flash_params as $param => $value) {
      $object_html .= '  ' . $param . '="' . $value . '"';    
    }

    return $object_html .= ' /><!-- Generated by AutoEmbed (http://autoembed.com) --></object>';
  }

  
  /**
   * Set the default params for the type of
   * stub we are working with
   */
  private function _setDefaultParams() {

    $flashvars = $this->_stub['flashvars'];
    $source = $this->_stub['embed-src'];

    for ($i=1; $i<=count($this->_media_id); $i++) {
      $source = str_ireplace('$'.$i, $this->_media_id[$i - 1], $source);
      $flashvars = str_ireplace('$'.$i, $this->_media_id[$i - 1], $flashvars);
    }

    $this->_flash_params = array(
            'type' => 'application/x-shockwave-flash',
            'src' => $source,
            'width' => $this->_stub['embed-width'],
            'height' => $this->_stub['embed-height'],
            'wmode' => 'transparent',
            'quality' => 'high',
            'allowFullScreen' => 'true',
            'allowScriptAccess' => 'always',
            'pluginspage' => 'http://www.macromedia.com/go/getflashplayer',
            'autoplay' => 'false',
            'autostart' => 'false',
            'flashvars' => $flashvars,
           );   

    $this->_object_params = array(
            'movie' => $source,
            'wmode' => 'transparent',
            'quality' => 'high',
            'allowFullScreen' => 'true',
            'allowScriptAccess' => 'always',
            'pluginspage' => 'http://www.macromedia.com/go/getflashplayer',
            'autoplay' => 'false',
            'autostart' => 'false',
           );
  }

}

?>
