<?php
/*
Plugin Name: Catpow GMO Payment Gateway
Description: ブロックエディタにGMO決済ボタンブロックを追加します
Author: synchro_vision
Version: 1.0.2-alpha
Author URI: https://catpow.info
Text Domain: catpow
Domain Path: /languages
GitHub Repository: synchrovision/catpow-gmopg
Requires at least: 5.6
Requires PHP: 7.4
*/

add_filter('catpow_extensions',function($extensions){$extensions[]=basename(__DIR__);return $extensions;});