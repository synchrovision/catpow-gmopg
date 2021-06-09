<?php
use Catpow\GMOPG\Agent;
if($is_preview){$url='';}
else{
	$agent=Agent::getInstance();
	$transaction=[
		'OrderID'=>do_shortcode($attr['OrderID']),
		'Amount'=>do_shortcode($attr['Amount']),
		'Detail'=>do_shortcode($attr['Detail'])
	];
	$url=$agent->get_link_plus_checkout_url($transaction);
	if(is_wp_error($url)){
		echo $url->get_error_message();
		return;
	}
	if($form=\Catpow\form()){
		$form->set('checkout_url',[$url]);
	}
}
echo str_replace('[gmopg_checkout_url]',$url,$content);