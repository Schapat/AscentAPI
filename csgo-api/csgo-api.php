<?php
/**
 * Plugin Name: Custom API
 * Plugin URI: http://ascentnow.eu
 * Description: Crushing it!
 * Version: 1.0
 * Author: ascentnow.eu
 * Author URI: ascentnow.e
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

include(dirname(__FILE__) . '/create_tables.php');

function pro_config() {

	global $wpdb;
    $configs = $wpdb->get_results($wpdb->prepare("SELECT * FROM cs_pro_configs"));

	 $data=[];
     $i = 0;

     foreach($configs as $row) {
         $data[$i]['pro_id'] = $row->ProID;
         $data[$i]['pro_name'] = $row->ProName;
         $data[$i]['config'] = $row->Config;
         $data[$i]['autoexec'] = $row->Autoexec;
         $data[$i]['video'] = $row->Video;
         $i++;
     }
     return $data;
}

add_action('rest_api_init', function() {
	register_rest_route('csgo/v1', 'pro_config', [
		'methods' => 'GET',
		'callback' => 'pro_config',
	]);
});
?>