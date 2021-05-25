<?php namespace Catpow;?>
<h3><i class="far fa-credit-card"></i>GMO Payment Gateway</h3>
<?php foreach(loop('cp_gmopg_keys') as $vals): ?>
<dl>
	<dt>環境</dt>
	<dd><?php input('env'); ?></dd>
</dl>
<dl>
	<dt>サイトID</dt>
	<dd><?php input('SiteID'); ?></dd>
</dl>
<dl>
	<dt>サイトパスワード</dt>
	<dd><?php input('SitePass'); ?></dd>
</dl>
<dl>
	<dt>ショップID</dt>
	<dd><?php input('ShopID'); ?></dd>
</dl>
<dl>
	<dt>ショップパスワード</dt>
	<dd><?php input('ShopPass'); ?></dd>
</dl>
<dl>
	<dt>設定ID</dt>
	<dd><?php input('configid'); ?></dd>
</dl>
<?php endforeach; ?>
<p>
	<a href="https://www.gmo-pg.com">GMO PaymentGateway</a>より発行された管理画面の
	「サイト管理＞サイト情報」及び「ショップ管理＞ショップ情報」に記載されている各項目の値を入力してください。
</p>
<ul class="wp-block-catpow-buttons m center">
	<li class="item edit"><?php button('登録','action','message'); ?></li>
</ul>
<?php §message(); ?>