<?php
/*
  Plugin Name: Event Espresso - States/Provinces Pack: New Zealand
  Plugin URI: http://www.eventespresso.com
  Description: The Event Espresso New Addon adds New Zealand States/Provinces to Event Espresso 4
  Version: 1.0
  Author: Event Espresso
  Author URI: http://www.eventespresso.com
  Copyright 2014 Event Espresso (email : support@eventespresso.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA02110-1301USA
*/

function ee_new_zealand_states_provinces_activate() {
  $installed = get_option( 'ee_new_zealand_states_provinces_added');
  
  if ($installed) return;

  global $wpdb;

  $sql = "INSERT INTO `" . $wpdb->prefix . "esp_state` (`CNT_ISO`, `STA_abbrev`, `STA_name`, `STA_active`) VALUES
    ('NZ', 'AUK', 'Auckland', 1),
    ('NZ', 'BOP', 'Bay of Plenty', 1),
    ('NZ', 'CAN', 'Canterbury', 1),
    ('NZ', 'HKB', 'Hawke''s Bay', 1),
    ('NZ', 'MWT', 'Manawatu-Wanganui', 1),
    ('NZ', 'NTL', 'Northland', 1),
    ('NZ', 'OTA', 'Otago', 1),
    ('NZ', 'STL', 'Southland', 1),
    ('NZ', 'TKI', 'Taranaki', 1),
    ('NZ', 'WKO', 'Waikato', 1),
    ('NZ', 'WGN', 'Wellington', 1),
    ('NZ', 'WTC', 'West Coast', 1),
    ('NZ', 'GIS', 'Gisborne District', 1),
    ('NZ', 'MBH', 'Marlborough District', 1),
    ('NZ', 'NSN', 'Nelson City', 1),
    ('NZ', 'TAS', 'Tasman District', 1),
    ('NZ', 'CIT', 'Chatham Islands Territory', 1);";

  if ($wpdb->query($sql)){
    
    add_option( 'ee_new_zealand_states_provinces_added', 1, '', 'no' );

  }

}
register_activation_hook( __FILE__, 'ee_new_zealand_states_provinces_activate' );
