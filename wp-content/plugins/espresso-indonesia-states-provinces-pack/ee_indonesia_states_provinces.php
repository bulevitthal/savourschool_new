<?php
/*
  Plugin Name: Event Espresso - States/Provinces Pack: Indonesia
  Plugin URI: http://www.eventespresso.com
  Description: This plugins adds states/provinces for the country of Indonesia to Event Espresso 4.
  Version: 1.0
  Author: Event Espresso
  Author URI: http://www.eventespresso.com
  Copyright 2014 Event Espresso (email : support@eventespresso.com)
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.
  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implIDd warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.See the
  GNU General Public License for more details.
  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA02110-1301USA
*/
function ee_indonesia_states_provinces_activate() {
  $installed = get_option( 'ee_indonesia_states_provinces_added');
  
  if ($installed) return;
  
  global $wpdb;
  
  $sql = "INSERT INTO `" . $wpdb->prefix . "esp_state` (`CNT_ISO`, `STA_abbrev`, `STA_name`, `STA_active`) VALUES
   ('ID', 'ID-AC', 'Aceh', 1),
   ('ID', 'ID-BA', 'Bali', 1),
   ('ID', 'ID-BB', 'Bangka Belitung', 1),
   ('ID', 'ID-BT', 'Banten', 1),
   ('ID', 'ID-BE', 'Bengkulu', 1),
   ('ID', 'ID-GO', 'Gorontalo', 1),
   ('ID', 'ID-JA', 'Jambi', 1),
   ('ID', 'ID-JB', 'Jawa Barat', 1),
   ('ID', 'ID-JT', 'Jawa Tengah', 1),
   ('ID', 'ID-JI', 'Jawa Timur', 1),
   ('ID', 'ID-KB', 'Kalimantan Barat', 1),
   ('ID', 'ID-KS', 'Kalimantan Selatan', 1),
   ('ID', 'ID-KT', 'Kalimantan Tengah', 1),
   ('ID', 'ID-KI', 'Kalimantan Timur', 1),
   ('ID', 'ID-KU', 'Kalimantan Utara', 1),
   ('ID', 'ID-KR', 'Kepulauan Riau', 1),
   ('ID', 'ID-LA', 'Lampung', 1),
   ('ID', 'ID-MA', 'Maluku', 1),
   ('ID', 'ID-MU', 'Maluku Utara', 1),
   ('ID', 'ID-NB', 'Nusa Tenggara Barat', 1),
   ('ID', 'ID-NT', 'Nusa Tenggara Timur', 1),
   ('ID', 'ID-PA', 'Papua', 1),
   ('ID', 'ID-PB', 'Papua Barat', 1),
   ('ID', 'ID-RI', 'Riau', 1),
   ('ID', 'ID-SR', 'Sulawesi Barat', 1),
   ('ID', 'ID-SN', 'Sulawesi Selatan', 1),
   ('ID', 'ID-ST', 'Sulawesi Tengah', 1),
   ('ID', 'ID-SG', 'Sulawesi Tenggara', 1),
   ('ID', 'ID-SA', 'Sulawesi Utara', 1),
   ('ID', 'ID-SB', 'Sumatera Barat', 1),
   ('ID', 'ID-SS', 'Sumatera Selatan', 1),
   ('ID', 'ID-SU', 'Sumatera Utara', 1),
   ('ID', 'ID-JK', 'Jakarta Raya', 1),
   ('ID', 'ID-YO', 'Yogyakarta', 1);";
   
  if ($wpdb->query($sql)){
    
    add_option( 'ee_indonesia_states_provinces_added', 1, '', 'no' );
  
  }
  
}

register_activation_hook( __FILE__, 'ee_indonesia_states_provinces_activate' );
