<?php
$conf=[
	'cat'=>'payment',
	'meta'=>[
		'cp_gmopg_keys'=>['type'=>'options','option'=>'cp_gmopg_keys','meta'=>[
			'env'=>['type'=>'radio','label'=>'環境','value'=>['テスト'=>'dev','本番'=>'master']],
			'SiteID'=>['type'=>'text','label'=>'サイトID'],
			'SitePass'=>['type'=>'text','label'=>'サイトパスワード'],
			'ShopID'=>['type'=>'text','label'=>'ショップID'],
			'ShopPass'=>['type'=>'text','label'=>'ショップパスワード'],
			'configid'=>['type'=>'text','label'=>'設定ID']
		]]
	]
];