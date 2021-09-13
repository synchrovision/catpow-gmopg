<?php
use Catpow\GMOPG\Agent;
if($is_preview){$url='';}
else{
	$agent=Agent::getInstance();
	$transaction=[
		'OrderID'=>do_shortcode($attr['OrderID']),
		'Amount'=>do_shortcode($attr['Amount']),
		'Detail'=>do_shortcode($attr['Detail']),
	];
	$geturlparam=[
		'GuideMailSendFlag'=>$attr['GuideMailSendFlag']?1:0,
		'ThanksMailSendFlag'=>$attr['ThanksMailSendFlag']?1:0,
		'BccSendMailAddress'=>do_shortcode($attr['BccSendMailAddress']),
		'FromSendMailAddress'=>do_shortcode($attr['FromSendMailAddress']),
		'FromSendMailName'=>do_shortcode($attr['FromSendMailName']),
		'SendMailAddress'=>do_shortcode($attr['SendMailAddress']),
		'CustomerName'=>do_shortcode($attr['CustomerName']),
		'TemplateNo'=>do_shortcode($attr['TemplateNo'])
	];
	$url=$agent->get_link_plus_checkout_url($transaction,$geturlparam);
	if(is_wp_error($url)){
		echo $url->get_error_message();
		return;
	}
	if($form=\Catpow\form()){
		$form->set('checkout_url',[$url]);
	}
}
echo str_replace('[gmopg_checkout_url]',$url,$content);