<?php
namespace Catpow\GMOPG;

class Agent{
	use \Catpow\traits\SessionSingleton;
	
	public $config,$api_base_url,$cache=[];
	const
		INSTANCE_NAME='CatpowGmopgAgent',
		LINK_TYPE_BASE_URL='https://link.mul-pay.jp/link/',
		LINK_PLUS_BASE_URL='https://link.mul-pay.jp/v1/plus/',
		API_BASE_URL='https://p01.mul-pay.jp/payment/',
		API_STG_BASE_URL='https://pt01.mul-pay.jp/payment/',
		API_STATIC_BASE_URL='https://static.mul-pay.jp/',
		API_STATIC_STG_BASE_URL='https://stg.static.mul-pay.jp/';
	
	public function __construct(){
		$this->init();
	}
	public function init(){
		$conf=get_option('cp_gmopg_keys');
		
		foreach($conf as $key=>$val){$conf[$key]=reset($val);}
		$this->config=$conf;
		$this->api_base_url=($this->config['env']==='master')?self::API_BASE_URL:self::API_STG_BASE_URL;
		$this->client=new \GuzzleHttp\Client(['base_uri'=>$this->api_base_url]);
	}
	public function get($ep,$param){
		return json_decode($this->client->get($ep,$param)->getBody()->getContents(),1);
	}
	public function post($ep,$param){
		return json_decode($this->client->post($ep,$param)->getBody()->getContents(),1);
	}
	public function get_link_plus_checkout_url($transaction,$geturlparam=[]){
		if(empty($transaction['Amount'])){return new \WP_error('fail','require Amount');}
		if(empty($transaction['OrderID'])){return new \WP_error('fail','require OrderID');}
		$order_id=$transaction['OrderID'];
		if(isset($this->cache[$order_id])){
			if($this->cache[$order_id]['transaction']!==$transaction){
				return new \WP_error('fail','try to get checkout url with same OrderID and different transaction');
			}
			return $this->cache[$order_id]['LinkUrl'];
		}
		$param=[
			'geturlparam'=>array_merge([
				'ShopID'=>$this->config['ShopID'],
				'ShopPass'=>$this->config['ShopPass'],
			],$geturlparam),
			'configid'=>$this->config['configid'],
			'transaction'=>$transaction
		];
		try{
			$res=$this->post('GetLinkplusUrlPayment.json',['json'=>$param]);
			$this->cache[$order_id]=[
				'LinkUrl'=>$res['LinkUrl'],
				'transaction'=>$transaction
			];
			return $res['LinkUrl'];
		}
		catch(\Exception $e){
			return new \WP_error('fail',$e->getResponse()->getBody()->getContents());
		}
	}
	
	function __sleep(){
		return ['api_base_url','config','cache'];
	}
	function __wakeup(){
		$this->client=new \GuzzleHttp\Client(['base_uri'=>$this->api_base_url]);
	}
}