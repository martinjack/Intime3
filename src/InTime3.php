<?php
/**
 *	module: InTime API 3 
 *	author: Evgenij Kitonin
 *	version: 1
 *	create: 05.10.2017
 **/

/**
 *	@var github lib https://github.com/meng-tian/async-soap-guzzle
 **/
namespace InTime;

use GuzzleHttp\Client;
use Meng\AsyncSoap\Guzzle\Factory;

include_once __DIR__ . '/../vendor/autoload.php';

class InTime3
{
    /**
     *	API KEY STRING
     *
     *	@var string api key
     *
     **/
    private $api_key = null;
    /**
     *	CLASS CLIENT
     *
     *	@var class
     *
     **/
    private $client = null;
    /**
     *	API URL
     *
     *	@var string
     *
     **/
    private $api = 'http://esb.intime.ua:8080/services/intime_api_3.0?wsdl';
    /**
     *	PRINT DATA IN FORMAT ARRAY OR STD OBJECT
     *	
     *	@var boolean
     *
     **/
    private $print = true;
    /**
     *	DEBUG MODE
     *	
     *	@var boolean
     *	
     **/
    private $debug = false;
    /**
     *
     *	@param INIT CLASS
     *	@return $this;
     *
     **/
    public function __construct($api_key, $print = true, $debug = false)
    {
        $this->print  = $print;
        $this->debug  = $debug;
        $factory      = new Factory();
        $this->client = $factory->create(new Client(), $this->api);
        
        if ($this->debug)
            header("Content-Type: application/json;charset=utf-8");
        
        return $this->setKey($api_key);
    }
    public function __destruct()
    {
    }
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
    private function requestData($method, $argv, $id = 0)
    {
        $argv[$method]['api_key'] = $this->api_key;
        
        if ($id != 0)
            $argv[$method]['id'] = $id;

        $request = $this->client->call($method, $argv);
        
        return $this->prepare($request);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО КРАЇНІ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СТРАНЕ
     *	@param RECEIVING INFORMATION BY COUNTRY
     *	
     **/
    public function get_country_list()
    {
        return $this->requestData('get_country_by_id', null);
    }
    public function get_country_id($id)
    {
        return $this->requestData('get_country_by_id', null, $id);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОБЛАСТЯМ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОБЛАСТЯМ
     *	@param OBTAINING INFORMATION BY REGION
     *
     **/
    public function get_area_list()
    {
        return $this->requestData('get_area_by_id', null);
    }
    public function get_area_id($id)
    {
        return $this->requestData('get_area_by_id', null, $id);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО РАЙОНАМ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО РАЙОНАМ
     *	@param OBTAINING INFORMATION ON AREAS
     *
     **/
    public function get_district_list()
    {
        return $this->requestData('get_district_by_id', null);
    }
    public function get_district_id($id)
    {
        return $this->requestData('get_district_by_id', null, $id);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО НАСЕЛЕНОМУ ПУНКТУ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО НАСЕЛЕННЫМ ПУНКТАМ
     *	@param OBTAINING INFORMATION ON HUMAN SETTLEMENTS
     *
     **/
    public function get_locality_list()
    {
        return $this->requestData('get_locality_by_id', null);
    }
    public function get_locality_id($id)
    {
        return $this->requestData('get_locality_by_id', null, $id);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО СКЛАДАМ/ ПОШТОМАТАМ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СКЛАДУ / ПОШТОМАТАМ
     *	@param OBTAINING INFORMATION ON WAREHOUSE / STANDINGS
     *	
     **/
    public function get_branch_list()
    {
        return $this->requestData('get_branch_by_id', null);
    }
    public function get_branch_id($id)
    {
        return $this->requestData('get_branch_by_id', null, $id);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОПИСУ ВАНТАЖУ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОПИСАНИЯ ГРУЗА
     *	@param OBTAINING INFORMATION ON THE DESCRIPTION OF GOODS
     *
     **/
    public function get_goods_desc_list()
    {
        return $this->requestData('get_goods_desc_by_id', null);
    }
    public function get_goods_desc_id($id)
    {
        return $this->requestData('get_goods_desc_by_id', null, $id);
    }
    /**
     *
     *	@param ОТРИМАННЯ ІНФОРМАЦІЇ ПО ПАКУВАННЮ
     *	@param ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО УПАКОВКЕ
     *	@param RECEIPT OF PACKAGING INFORMATION
     *	
     **/
    public function get_box_list()
    {
        return $this->requestData('get_box_by_id', null);
    }
    public function get_box_id($id)
    {
        return $this->requestData('get_box_by_id', null, $id);
    }
    /**
     *
     *	@param СТВОРЕННЯ ЗАЯВКИ ТТН
     *	@param СОЗДАНИЕ ЗАЯВКИ ТТН 
     *	@param CREATING A TTN APPLICATION
     *
     **/
    public function declaration_create($data = array())
    {
        $argv['declaration_insert_update']['locality_id']              =    $data['locality_id'];
        $argv['declaration_insert_update']['sender_warehouse']         =    $data['sender_warehouse'];
        $argv['declaration_insert_update']['sender_address']           =    strlen($data['sender_address']) > 0 ? $data['sender_address'] : '';
        $argv['declaration_insert_update']['receiver_okpo']            =    strlen($data['receiver_okpo']) ? $data['receiver_okpo'] : '';
        $argv['declaration_insert_update']['receiver_company_name']    =    strlen($data['receiver_company_name']) ? $data['receiver_company_name'] : '';
        $argv['declaration_insert_update']['receiver_cellphone']       =    $data['receiver_cellphone'];
        $argv['declaration_insert_update']['receiver_lastname']        =    $data['receiver_lastname'];
        $argv['declaration_insert_update']['receiver_firstname']       =    $data['receiver_firstname'];
        $argv['declaration_insert_update']['receiver_patronymic']      =    $data['receiver_patronymic'];
        $argv['declaration_insert_update']['receiver_locality_id']     =    $data['receiver_locality_id'];
        $argv['declaration_insert_update']['receiver_warehouse_id']    =    $data['receiver_warehouse_id'];
        $argv['declaration_insert_update']['receiver_address']         =    strlen($data['receiver_address']) > 0 ? $data['receiver_address'] : '';
        $argv['declaration_insert_update']['payment_type_id']          =    $data['payment_type_id'];
        $argv['declaration_insert_update']['payer_type_id']            =    $data['payer_type_id'];
        $argv['declaration_insert_update']['return_day']               =    strlen($data['return_day']) ? $data['return_day'] : '';
        $argv['declaration_insert_update']['cost_return']              =    $data['cost_return'];
        $argv['declaration_insert_update']['cash_on_delivery_sum']     =    $data['cash_on_delivery_sum'];
        $argv['declaration_insert_update']['client_doc_id']            =    $data['client_doc_id'];
        $argv['declaration_insert_update']['cancel_packing']           =    $data['cancel_packing'];
        $argv['declaration_insert_update']['sender_paid_sum']          =    strlen($data['sender_paid_sum']) > 0 ? $data['sender_paid_sum'] : '';
        $argv['declaration_insert_update']['third_party_okpo']         =    strlen($data['third_party_okpo']) > 0 ? $data['third_party_okpo'] : '';
        $argv['declaration_insert_update']['third_party_company_name'] =    strlen($data['third_party_company_name']) > 0 ? $data['third_party_company_name'] : '';
        $argv['declaration_insert_update']['third_party_cellphone']    =    strlen($data['third_party_cellphone']) > 0 ? $data['third_party_cellphone'] : '';
        $argv['declaration_insert_update']['third_party_lastname']     =    strlen($data['third_party_lastname']) > 0 ? $data['third_party_lastname'] : ''; 
        $argv['declaration_insert_update']['third_party_firstname']    =    strlen($data['third_party_firstname']) > 0 ? $data['third_party_firstname'] : '';
        $argv['declaration_insert_update']['third_party_patronymic']   =    strlen($data['third_party_patronymic']) > 0 ? $data['third_party_patronymic'] : '';
        $argv['declaration_insert_update']['third_patry_store_id']     =    strlen($data['third_patry_store_id']) > 0 ? $data['third_patry_store_id'] : '';
        $argv['declaration_insert_update']['third_party_address']      =    strlen($data['third_party_address']) > 0 ? $data['third_party_address'] : '';
        $argv['declaration_insert_update']['packages']                 =    strlen($data['packages']) > 0 ? $data['packages'] : '';
        $argv['declaration_insert_update']['commands']                 =    strlen($data['commands'] > 0) ? $data['commands'] : '';
        $argv['declaration_insert_update']['containers']               =    strlen($data['containers']) > 0 ? $data['containers'] : '';
        $argv['declaration_insert_update']['seats']                    =    $data['seats'];
    }
    /**
    *
    *   @param ОТРИМАННЯ ГРАФІКУ РОБОТИ СКЛАДУ
    *   @param ПОЛУЧЕНИЯ ГРАФИКА РАБОТЫ СКЛАДА
    *   @param GETTING SCHEDULES FOR THE WAREHOUSE
    *   
    **/
    public function get_branch_work_hours()
    {
        return $this->requestData('get_branch_work_hours', null);
    }
    public function get_branch_work_hours_id($id)
    {
        return $this->requestData('get_branch_work_hours', null, $id);
    }
}
