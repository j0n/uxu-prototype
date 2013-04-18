<?php
/**
 * @package UxU
 */
/*
Plugin Name: UxU Tickets
Plugin URI: http://j0n.se
Description: Plugin used for prototype of UxU site
Version: 0.0.1
Author: Jon
*/

function uxu_tickets_info(){
  $values = array(
    'current_ticket_url' => 'current_ticket_url',
    'current_ticket_price' => '240',
    'next_ticket_price' => '250',
  );
  include('view.php');
}
