<?php
/**
 * Plugin Name: Custom API
 * Plugin URI: http://ascentnow.eu
 * Description: Crushing it!
 * Version: 1.0
 * Author: ascentnow.eu
 * Author URI: ascentnow.e
 */


function player_config() {

	global $wpdb;
	 $configs = $wpdb->get_results($wpdb->prepare("SELECT Extension FROM backups"));

	 $data=[];
     $i = 0;

     foreach($configs as $row) {
         $data[$i]['option_id'] = $i;
         $data[$i]['option_name'] = $row->ID;
         $i++;
     }
     return $data;
}

add_action('rest_api_init', function() {
	register_rest_route('csgo/v1', 'player_config', [
		'methods' => 'GET',
		'callback' => 'player_config',
	]);
});