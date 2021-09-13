<?php
$attributes=[
	'text'=>['source'=>'children','selector'=>'.wp-block-catpow-gmopg__button','default'=>['GMO決済でお支払い']],
	'OrderID'=>['type'=>'string','default'=>'[val order_id]'],
	'Amount'=>['type'=>'string','default'=>'[val price]'],
	'Detail'=>['type'=>'string','default'=>'[val desc]'],
	'PayMethods'=>['type'=>'string','default'=>'credit,cvs'],
	'GuideMailSendFlag'=>['type'=>'bool','default'=>false],
	'ThanksMailSendFlag'=>['type'=>'bool','default'=>false],
	'BccSendMailAddress'=>['type'=>'string','default'=>''],
	'FromSendMailAddress'=>['type'=>'string','default'=>''],
	'FromSendMailName'=>['type'=>'string','default'=>''],
	'SendMailAddress'=>['type'=>'string','default'=>''],
	'CustomerName'=>['type'=>'string','default'=>''],
	'TemplateNo'=>['type'=>'string','default'=>'']
];