<?php
/**
*	module: InTime API 3 
*	author: Jack Martin
*	version: 1
*	create: 05.10.2017
**/

/**
*	@var github lib https://github.com/meng-tian/async-soap-guzzle
**/
namespace InTime;

use GuzzleHttp\Client;
use Meng\AsyncSoap\Guzzle\Factory;

include_once __DIR__.'/../vendor/autoload.php';

class InTime3
{
	/**
	*	API KEY STRING
	*
	*	@var string api key
	*
	**/
	private $api_key 	= null;
	/**
	*	CLASS CLIENT
	*
	*	@var class
	*
	**/
	private $client 	= null;
	/**
	*	API URL
	*
	*	@var string
	*
	**/
	private $api 		=	'http://esb.intime.ua:8080/services/intime_api_3.0?wsdl';
	/**
	*	PRINT DATA IN FORMAT ARRAY OR STD OBJECT
	*	
	*	@var boolean
	*
	**/
	private $print 		=	true;
	/**
	*	DEBUG MODE
	*	
	*	@var boolean
	*	
	**/
	private $debug 		=	false;
	/**
	*
	*	@param INIT CLASS
	*	@return $this;
	*
	**/
	public function __construct($api_key, $print = true, $debug = false)
	{
		

		$this->print 	=	$print;
		$this->debug 	=	$debug;
		$factory 		= 	new Factory();
		$this->client 	= 	$factory->create(new Client(), $this->api);

		if ($this->debug)
			header("Content-Type: application/json;charset=utf-8");

		return $this
			->setKey($api_key);
	}
	public function __destruct()
	{}
	/**
	*
	*	@param SET API KEY
	*	@return $this;
	*
	**/
	private function setKey($api_key)
	{
		$this->api_key = $api_key;
		return $this;
	}
	/**
	*
	*	@param PREPARE
	*	@return $data;
	*
	**/
	private function prepare($data)
	{
		if ($this->print) {

			if ($this->debug) {

				return json_decode(json_encode($data, JSON_UNESCAPED_UNICODE), true);

			} else {

				return json_encode($data, JSON_UNESCAPED_UNICODE);

			}

		} else {

			return $data;

		}
	}
	/**
	*
	*	@param REQUEST DATA
	*	@return $data;
	*
	**/
	private function requestData($method, $argv)
	{
		$argv[$method]['api_key'] 	=	$this->api_key;

		$request = $this->client->call($method, $argv);
		
		return $this->prepare($request);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО КРАЇНІ
 	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПОСТРАНЕ
 	*	@param RECEIVING INFORMATION BY COUNTRY
	*	
	**/
	public function get_country_list()
	{
		return $this->requestData('get_country_by_id', null);
	}
	public function get_country_id($id)
	{
		$argv['get_country_by_id']['id']		=	$id;
		return $this->requestData('get_country_by_id', $argv);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОБЛАСТЯМ
	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОБЛАСТЯМ
	*	@param OBTAINING INFORMATION BY REGION
	*
	**/
	public function get_area_by_list()
	{
		return $this->requestData('get_area_by_id', null);
	}
	public function get_area_by_id($id)
	{
		$argv['get_area_by_id']['id']	=	$id;
		return $this->requestData('get_area_by_id', $argv);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО РАЙОНАМ
	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО РАЙОНАМ
	*	@param 
	*
	**/
	public function get_district_list()
	{
		return $this->requestData('get_district_by_id', null);
	}
	public function get_district_id($id)
	{
		$argv['get_district_by_id']['id']	=	$id;
		return $this->requestData('get_district_by_id', $id);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО НАСЕЛЕНОМУ ПУНКТУ
	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО НАСЕЛЕННЫМ ПУНКТАМ
	*	@param
	*
	**/
	public function get_locality_list()
	{
		return $this->requestData('get_locality_by_id', null);
	}
	public function get_locality_id($id)
	{
		$argv['get_locality_by_id']['id']	=	$id;
		return $this->requestData('get_locality_by_id', $argv);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО СКЛАДАМ/ ПОШТОМАТАМ
	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СКЛАДУ / ПОШТОМАТАМ
	*	@param
	*	
	**/
	public function get_branch_list()
	{
		return $this->requestData('get_branch_by_id', null);
	}
	public function get_branch_id($id)
	{
		$argv['get_branch_by_id']['id']		=	$id;
		return $this->requestData('get_branch_by_id', $argv);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОПИСУ ВАНТАЖУ
	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОПИСАНИЯ ГРУЗА
	*	@param
	*
	**/
	public function get_goods_desc_list()
	{
		return $this->requestData('get_goods_desc_by_id', null);
	}
	public function get_goods_desc_id($id)
	{
		$argv['get_goods_desc_by_id']['id'] 	=	$id;
		return $this->requestData('get_goods_desc_by_id', $argv);
	}
	/**
	*
	*	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО ПАКУВАННЮ
	*	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО УПАКОВКЕ
	*	@param
	*	
	**/
	public function get_box_list()
	{
		return $this->requestData('get_box_by_id', null);
	}
	public function get_box_id($id)
	{
		$argv['get_box_by_id']['id'] 	=	$id;
		return $this->requestData('get_box_by_id', $argv);
	}
	/**
	*
	*	@param СТВОРЕННЯ ЗАЯВКИ ТТН
	*	@param СОЗДАНИЕ ЗАЯВКИ ТТН 
	*	@param 
	*
	**/
	public function declaration_create($data = array())
	{
		$argv['declaration_insert_update']['locality_id'] 				= $data[''];
		$argv['declaration_insert_update']['sender_warehouse']			= $data[''];
		$argv['declaration_insert_update']['sender_address'] 			= $data[''];
		$argv['declaration_insert_update']['receiver_okpo'] 			= $data[''];
		$argv['declaration_insert_update']['receiver_company_name'] 	= $data[''];
		$argv['declaration_insert_update']['receiver_cellphone'] 		= $data[''];
		$argv['declaration_insert_update']['receiver_lastname'] 		= $data[''];
		$argv['declaration_insert_update']['receiver_firstname'] 		= $data[''];
		$argv['declaration_insert_update']['receiver_patronymic'] 		= $data[''];
		$argv['declaration_insert_update']['receiver_locality_id'] 		= $data[''];
		$argv['declaration_insert_update']['receiver_warehouse_id'] 	= $data[''];
		$argv['declaration_insert_update']['receiver_address']	 		= $data[''];
		$argv['declaration_insert_update']['payment_type_id'] 			= $data[''];
		$argv['declaration_insert_update']['payer_type_id']			 	= $data[''];
		$argv['declaration_insert_update']['return_day'] 				= $data[''];
		$argv['declaration_insert_update']['cost_return'] 				= $data[''];
		$argv['declaration_insert_update']['cash_on_delivery_sum'] 		= $data[''];
		$argv['declaration_insert_update']['client_doc_id']				= $data[''];
		$argv['declaration_insert_update']['cancel_packing']			= $data[''];
		$argv['declaration_insert_update']['sender_paid_sum'] 			= $data[''];
		$argv['declaration_insert_update']['third_party_okpo'] 			= $data[''];
		$argv['declaration_insert_update']['third_party_company_name'] 	= $data[''];
		$argv['declaration_insert_update']['third_party_cellphone'] 	= $data[''];
		$argv['declaration_insert_update']['third_party_lastname'] 		= $data[''];
		$argv['declaration_insert_update']['third_party_firstname'] 	= $data[''];
		$argv['declaration_insert_update']['third_party_patronymic'] 	= $data[''];
		$argv['declaration_insert_update']['third_patry_store_id'] 		= $data[''];
		$argv['declaration_insert_update']['third_party_address'] 		= $data[''];
		$argv['declaration_insert_update']['packages'] 					= $data[''];
		$argv['declaration_insert_update']['commands'] 					= $data[''];
		$argv['declaration_insert_update']['containers'] 				= $data[''];
		$argv['declaration_insert_update']['seats'] 					= $data[''];
	}
}

