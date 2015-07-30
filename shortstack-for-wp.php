<?php
/**
 * Plugin Name: ShortStack for WP
 * Plugin URI: http://www.shortstack.com
 * Description: Provides a shortcode for embedding published ShortStack Campaigns into WordPress
 * Version: 1.0.0
 * Author: ShortStack.com
 * Author Email: theteam@shortstacklab.com
 * Author URI: http://www.shortstack.com/
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// Inserts iframe into content via the [shortstack] shortcode.
// Options:
//  smart_url: The smart url for the campaign
//  width: Width of the embedded iframe
//  height: Height of the embedded iframe
//
function embed_campaign($args){
  // Parse shortcode attributes
  $settings = shortcode_atts(array(
    'smart_url' => '',
    'width' => '100%',
    'height' => '800',
    'responsive' => 'false',
    'v_offset' => 0,
    'autoscroll_p' => 'true'
  ), $args);
  return $settings['responsive'] === 'true' ? build_responsive_embed($settings) : build_fixed_embed($settings);
}

function build_fixed_embed($settings){
  $iframe = '<iframe src="'.$settings['smart_url'].'?embed=1" id="'.
    get_id($settings['smart_url']).'"'.
    ' width="'.$settings['width'].'" height="'.$settings['height'].'"'.
    ' scrolling="auto" seamless="seamless" frameborder="0">'.
    '</iframe>';
  return $iframe;
}

function build_responsive_embed($settings){
  $iframe_src = preg_replace('/http(s)?:/i', '', $settings['smart_url']) . '?embed=1';
  $iframe_src .= '&v_offset=' . intval($settings['v_offset']);
  $iframe_src .= '&autoscroll_p=' . ($settings['autoscroll_p'] === 'true' ? 1 : 0);
  $iframe = "<iframe class='campaign_embed' src='". $iframe_src ."'
    seamless='seamless' frameborder='0' width='100%' scrolling='no'></iframe>
    <script type='text/javascript'>
      (function(){

        function loadScript(url, scriptId, callback) {
          if(document.getElementById(scriptId) != null) {
            return;
          }
          var script = document.createElement('script');
          script.type = 'text/javascript';
          if (script.readyState) {
            script.onreadystatechange = function() {
              if (script.readyState === 'loaded' || script.readyState === 'complete') {
                script.onreadystatechange = null;
                callback();
              }
            };
          } else {
            script.onload = function() {
              callback();
            };
          }
          var scriptIdAttr = document.createAttribute('id');
          scriptIdAttr.value = scriptId;
          script.setAttributeNode(scriptIdAttr);
          script.src = url;
          document.getElementsByTagName('head')[0].appendChild(script);
        }

        function loadEmbed(){
          var iframes = document.getElementsByClassName('campaign_embed');
          for(var i = 0; i < iframes.length; i++) {
            iFrameResize({ enablePublicMethods: true }, iframes[i]);
          }
        }

        loadScript(
          '//d2xcq4qphg1ge9.cloudfront.net/javascript/responsive_embed/20150624/iframeResizer.min.js',
          'campaignEmbedder',
          loadEmbed
        );
      })();
    </script>";
   return $iframe;
}

function get_id($smart_url){
  $i = strrpos($settings['smart_url'], '/');
  $shortcode = substr($settings['smart_url'], $i);
  return 'sscampaign_'.$shortcode;
}

add_shortcode("shortstack", 'embed_campaign');

?>
