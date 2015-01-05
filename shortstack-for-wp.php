<?php
/**
 * Plugin Name: ShortStack for WP
 * Plugin URI: http://www.shortstack.com
 * Description: Provides a shortcode for embedding published ShortStack Campaigns into WordPress
 * Version: 0.0.1
 * Author: Ben Menesini
 * Author Email: ben@shortstacklab.com
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

// Inserts iframe into content via the [shortstack] shortcode.
// Options:
// 	smart_url: The smart url for the campaign
//  width: Width of the embedded iframe
//  height: Height of the embedded iframe
//
function embed_campaign($args){
  // Parse shortcode attributes
  $settings = shortcode_atts(array(
    'smart_url' => '',
    'width' => '100%',
    'height' => '800'
  ), $args);

  // Return empty string if smart url does not include pgtb.me
  // if(stripos($settings['smart_url'], 'pgtb.me') === false) {
  //   return '';
  // }

  // Grab ShortStack shortcode
  $i = strrpos($settings['smart_url'], '/');
  $campaignShortcode = substr($settings['smart_url'], $i);

  // Build embed code
  $id = 'sscampaign_'.$campaignShortcode;
  $iframe = '<iframe src="'.$settings['smart_url'].'?embed=1" id="'.$id.'"'.
            ' width="'.$settings['width'].'" height="'.$settings['height'].'"'.
            ' scrolling="no" style="overflow:hidden;" seamless="seamless">'.
            '</iframe>';

  return $iframe;
}

add_shortcode("shortstack", 'embed_campaign');

?>
