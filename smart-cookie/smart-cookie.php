<?php
/*
Plugin Name: SmartCookie
Plugin URI: http://www.styleblueprint.com/
Description: Set cookie if 'cid' passed as GET parameter
Version: 0.0.2
Author: Jay Graves
Author URI: http://www.styleblueprint.com
*/

add_action('init', 'my_set_cid_cookie', 1);

function my_set_cid_cookie() {

  if (isset($_GET) && isset($_GET['cid']) && (strlen($_GET['cid']) > 0) && preg_match('/^[0-9a-z\.\,\-\_]+$/i', $_GET['cid'])) {

    $cid = $_GET['cid'];

    $domain = $_SERVER['HTTP_HOST'];

    if (preg_match('/.+\.(.+)\.(.+)/', $domain, $matches)) {

      $domain = $matches[1] . '.' . $matches[2];
    }

    setcookie('cid', $cid, (24*3600*366) + time(), '/', $domain, 0, 1);
  }

}