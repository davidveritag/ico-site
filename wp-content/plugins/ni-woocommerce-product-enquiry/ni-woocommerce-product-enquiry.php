<?php 
/*
Plugin Name: Ni WooCommerce Product Enquiry 
Plugin URI: http://naziinfotech.com/
Description: Ni WooCommerce Product Enquiry plugin allow the customer or visitor to make the enquiry about the product before purchase. This plug-in bridges the gap between the potential customer and product owner.
Version: 2.0.4
Author: anzia
Author URI: http://naziinfotech.com/
Plugin URI: https://wordpress.org/plugins/ni-woocommerce-product-enquiry/
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/agpl-3.0.html
WC requires at least: 3.0.0
WC tested up to:3.5.1
Last Updated Date: 07-November-2018
*/
if ( ! defined( 'ABSPATH' ) ) { exit;}
if( !class_exists( 'ni_woocommerce_product_enquiry' ) ) :
	class ni_woocommerce_product_enquiry{
		function __construct(){
			add_filter( 'plugin_action_links',  array( &$this, 'plugin_action_links'), 10, 5 );
			include_once("include/ni-enquiry-init.php");
			$obj =new  ni_enquiry_init();
		}
		function plugin_action_links($actions, $plugin_file){
			static $plugin;

			if (!isset($plugin))
				$plugin = plugin_basename(__FILE__);
				if ($plugin == $plugin_file) {
						  $settings_url = admin_url() . 'admin.php?page=ni-enquiry-setting';
							$settings = array('settings' => '<a href='. $settings_url.'>' . __('Settings', '') . '</a>');
							$site_link = array('support' => '<a href="http://naziinfotech.com" target="_blank">Support</a>');
							$email_link = array('email' => '<a href="mailto:support@naziinfotech.com" target="_top">Email</a>');
					
							$actions = array_merge($settings, $actions);
							$actions = array_merge($site_link, $actions);
							$actions = array_merge($email_link, $actions);
						
					}
					
					return $actions;
				}
	}
	$obj = new ni_woocommerce_product_enquiry(); 
endif;
?>