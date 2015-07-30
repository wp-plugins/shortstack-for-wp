=== ShortStack for WP ===
Contributors: shortstackben
Tags: shortstack, facebook, campaign, embed, contest, promotion
Requires at least: 2.5.0
Tested up to: 4.2.3
Stable tag: 1.0.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

== Description ==

[ShortStack](http://www.shortstack.com) is a self-service platform that helps
you build contests, landing pages, and Campaigns for social, web and mobile.

ShortStack users can install this plugin to enable the web embed shortcode
`[shortstack smart_url='//a.pgtb.me/#####' responsive='true' autoscroll_p='true']` within WordPress. Shortcodes can be copied from ShortStack to Wordpress Posts and Pages.

== Installation ==

= Prerequisites =
- This plugin utilizes ShortStack's __Embed__ feature.
- The Campaign must be published. You can only embed published Campaigns.

= Setup =
1. Upload the `shortstack-wordpress` folder to the `/wp-content/plugins/` directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.

= Usage =
1. Within the Campaign Designer, open the [Embed Settings](http://docs.shortstackapp.com/article/176-embed-to-the-web) panel for your published campaign.
2. Click on the __WordPress__ link on the left of the dialog.
3. Select and copy the __WordPress Shortcode__.
4. Paste the shortcode anywhere inside the body of a Post or Page within your WordPress installation.

_Example:_ `[shortstack smart_url='//a.pgtb.me/#####' responsive='true' autoscroll_p='true']`

== Frequently Asked Questions ==

= Why do I see a message reading **External embedding is not enabled for tab #####**? =

Check your Campaign's settings to see if __Embedding in External Sites__ is enabled.
 See _Embedding_ [on this help page](http://docs.shortstackapp.com/article/179-campaign-settings).

= Will you add a feature to ShortStack or this WordPress plugin? =

Maybe! We live on feedback. [Send our support team a note!](http://shortstack.zendesk.com/)

= How do I get help? =

Check our [detailed help docs](http://docs.shortstackapp.com) or [contact our support team](http://shortstack.zendesk.com/).

== Changelog ==

= 1.0.1 =
* Adds support for the ShortStack responsive embed code and improves mobile support
* Removes iframe border
* Adds scrollbar to fixed embed code when necessary

= 0.0.1 =
* First release.

== Upgrade Notice ==

= 1.0.1 =
* Better support for responsive themes and mobile browsers