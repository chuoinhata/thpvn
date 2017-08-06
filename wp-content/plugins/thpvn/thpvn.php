<?php
/**
 * Plugin Name: THPVN
 * Plugin URI: http://thpvn.com
 * Description: Plugin site thpvn
 * Version: 1.0 
 * Author: NVTri
 * Author URI: http://nvtri.com
 * License: GPLv2
 */

require __DIR__ . '/src/frontend/Shortcode.php';
require __DIR__ . '/src/frontend/WoocommerceCustom.php';

class thpvn{

	public function __construct()
	{
		$this->loadModule();
		
		add_filter('widget_text','do_shortcode');

		remove_filter('widget_text_content', 'wpautop');
		remove_filter('widget_text_content', 'wptexturize');
		remove_filter('widget_text_content', 'capital_P_dangit');
		remove_filter('widget_text_content', 'convert_smilies');
	}

	public function loadModule()
	{
		$getShortcode = new THP\Frontend\Shortcode;
		$getWoocommerceCustom = new THP\Frontend\WoocommerceCustom;
	}

}

$thpvn = new thpvn();