<?php
/**
 * @package Catpow
 * @version 1.0
 */
/*
Plugin Name: Catpow GMO Payment Gateway
Description: Catpow
Author: synchro_vision
Version: 1.1
Author URI: https://catpow.info
Text Domain: catpow
Domain Path: /languages
*/

add_filter('catpow_extensions',function($extensions){$extensions[]=basename(__DIR__);return $extensions;});