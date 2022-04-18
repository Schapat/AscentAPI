<?php
if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly
}


function create_pro_config_table() {
    global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    //ascent_products
    $create_table = "
    CREATE TABLE IF NOT EXISTS `cs_pro_configs` (
      `ProID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
      `ProName` varchar(10) NOT NULL,
      `Config` longblob,
      `Autoexec` longblob,
      `Video` longblob,
      PRIMARY KEY(ProID))
    ENGINE=MyISAM DEFAULT CHARSET=utf8;
  ";
    dbDelta($create_table);
}

?>