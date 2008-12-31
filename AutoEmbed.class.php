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
  
  private $_url;
  private $_video_id;
  private $_site;

  /**
   * AutoEmbed Constructor
   *
   * returns object - AutoEmbed object
   */
  public function __construct() {
    global $sites;

    include_once 'data/sites.php';
  }

  /**
   * Parse given URL
   *
   * @param $url string - href to check for embeded video
   *
   * returns boolean - whether or not the url contains valid/supported video
   */
  public function parseUrl($url) {
    global $sites;
    $this->url = $url;

    foreach ($sites as $site) { 
      if ( preg_match('~'.$site['embed-pattern'].'~imu', $url, $match) ) {
        $this->_video_id = $match;
        $this->_site = $site;
        return true;
      }
    }

    unset($site);
    return false;
  }

  /**
   * Return params about the video metadata
   *
   * returns array - video metadata
   */
  public function getParams() {
    return $this->_site;
  }

  /**
   * Convert the url to an embedable tag
   *
   * returns string - the embed html
   */
  public function getEmbedCode() {
    $plugin = $this->_get_plugin($this->_site['plugin']);

    $params = $this->_build_params($plugin['params']);
    $object_html = $this->_build_object($plugin, $params);
    $this->_inject_id($object_html);

    return $object_html;
  }

  /**
   * Build a generic object skeleton based on the type
   * of content we're trying to embed
   */
  private function _build_object($plugin, $param) {
    return '<object classid="' . $plugin['classid'] . '" ' .
           (!empty($plugin['codebase']) ? 'codebase="' . $plugin['codebase'] . '" ' : '' ).
           'type="' . $plugin['type'] . '" width="' . $this->_site['embed-width'] . 'px" height="' . $this->_site['embed-height'] . 'px">' .
           '<param name="' . ( empty($plugin['src']) ? 'movie' : $plugin['src'] ) . '" value="' . 
            $this->_site['embed' . (empty($this->_site['embed-movie']) ? '-hq' : '' ) . '-movie'] . '" />' . $param['object'] .
           '<embed type="' . $plugin['type'] . '" ' .	'src="' . $this->_site['embed' . (empty($this->_site['embed-movie']) ? '-hq' : '' ) . '-movie'] . 
           '" width="' . $this->_site['embed-width'] . 'px" height="' . $this->_site['embed-height'] . 'px"' . $param['embed'] . ' /></object>';
  }

  /**
   * Inject the id of the object we're embeding into the
   * object skeleton
   */
  private function _inject_id(&$object_html) {
    for ($i=1; $i<=count($this->_video_id); $i++) {
      $object_html = str_ireplace('$'.$i, $this->_video_id[$i - 1], $object_html);
    }
  }

  /**
   * Build a list of <param> tags and param values to
   * go inside the <object> tag
   */
  private function _build_params($plugin_params) {
    $params['embed'] = '';
    $params['object'] = '';

	  foreach ($plugin_params as $p => $val) {

      if ($val === '') continue;
    
      $params['embed'] .= ' ' . $p . '="' . $val . '"';
		  $params['object'] .= '<param name="' . $p . '" value="' . $val . '" />';
	  }

    unset($p, $val);

    return $params;
  }

  /**
   * Return params specific to the given plugin type
   */
  function _get_plugin($plugin_type) {
    if ($plugin_type == 'flash') {
      return array(
        'classid' => 'CLSID:D27CDB6E-AE6D-11CF-96B8-444553540000',
        'type' => 'application/x-shockwave-flash',
        'codebase' => 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,115,0',
        'params' => array(
          'wmode' => 'transparent',
          'quality' => 'high',
          'allowFullScreen' => 'true',
          'allowScriptAccess' => 'never',
          'pluginspage' => 'http://www.macromedia.com/go/getflashplayer',
          'autoplay' => 'false',
          'autostart' => 'false',
        ),
      );
    
    }
    
    if ($plugin_type == 'divx') {
      return array(
        'classid' => 'CLSID:67DABFBF-D0AB-41FA-9C46-CC0F21721616',
        'type' => 'video/divx',
        'codebase' => 'http://go.divx.com/plugin/DivXBrowserPlugin.cab',
        'params' => array(
          'allowFullScreen' => 'true',
          'allowScriptAccess' => 'never',
          'pluginspage' => 'http://go.divx.com/plugin/download/',
          'custommode' => 'none',
          'autoPlay' => 'false',
          'mode' => 'full',
          'minVersion' => '1.0.0',
          'allowContextMenu' => 'true',
          'url' => '$2',
          'bannerEnabled' => 'false',
          'showpostplaybackad' => 'false',
        ),
        'src' => 'src',
      );
    }
    
    if ($plugin_type == 'wmp') {
      return array(
        'classid' => 'CLSID:22D6F312-B0F6-11D0-94AB-0080C74C7E95',
        'type' => 'application/x-mplayer2',
        'codebase' => 'http://activex.microsoft.com/activex/controls/mplayer/en/nsmp2inf.cab#Version=6,4,7,1112',
        'params' => array(
          'wmode' => 'transparent',
          'quality' => 'high',
          'allowFullScreen' => 'true',
          'allowScriptAccess' => 'never',
          'ShowControls' => 'True',
          'autostart' => 'false',
          'autoplay' => 'false',
        ),
        'src' => 'filename', 
      );
    }
    
    if ($plugin_type == 'quicktime') {
      return array(
        'classid' => 'CLSID:02BF25D5-8C17-4B23-BC80-D3488ABDDC6B',
        'type' => 'video/quicktime',
        'codebase' => 'http://www.apple.com/qtactivex/qtplugin.cab',
        'params' => array(
          'pluginspage' => 'http://www.apple.com/quicktime/download/',
          'wmode' => 'transparent',
          'quality' => 'high',
          'allowFullScreen' => 'true',
          'allowScriptAccess' => 'never',
          'scale' => 'aspect',
          'loop' => 'false',
          'controller' => 'true',
          'autoplay' => 'false',
          'src' => 'src', 
        ),
      );
    }
    
    if ($plugin_type == 'realmedia') {
      return array(
        'classid' => 'CLSID:CFCDAA03-8BE4-11CF-B84B-0020AFBBCCFA',
        'type' => 'audio/x-pn-realaudio-plugin',
        'params' => array(
          'pluginspage' => 'http://www.real.com',
          'wmode' => 'transparent',
          'quality' => 'high',
          'allowFullScreen' => 'true',
          'allowScriptAccess' => 'never',
          'controls' => 'imagewindow',
          'console' => 'video',
          'autostart' => 'false',
          'src' => true, // Uses src instead of 'movie' like flash
        ),
        'extra' => ('<embed src="$1" width="$8px" height="30" controls="ControlPanel" type="audio/x-pn-realaudio-plugin" console="video" autostart="false"></embed>'),
      );
    }
  }

}

?>