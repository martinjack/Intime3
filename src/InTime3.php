<?php

namespace InTime;

use GuzzleHttp\Client;
use InTime\Contracts\iInTime;
use Meng\AsyncSoap\Guzzle\Factory;

/**
 *
 * Class InTime3
 *
 * @package InTime
 *
 **/
class InTime3 implements iInTime
{

    /**
     * API KEY
     *
     * @var STRING
     *
     **/
    private $api_key = null;
    /**
     *
     * CLIENT
     *
     * @var OBJECT
     *
     **/
    private $client = null;
    /**
     *
     * API URL
     *
     * @var STRING
     *
     **/
    private $api = 'http://esb.intime.ua:8080/services/intime_api_3.0?wsdl';
    /**
     * PRINT DATA IN FORMAT ARRAY OR STD OBJECT
     *
     * @var BOOLEAN
     *
     **/
    private $print = true;
    /**
     *
     * DEBUG MODE
     *
     * @var BOOLEAN
     *
     **/
    private $debug = false;
    /**
     *
     * INIT CLASS
     *
     * @param STRING
     *
     * @param  BOOLEAN
     *
     * @param INTEGER
     *
     * @param INTEGER
     *
     * @return OBJECT
     *
     **/
    public function __construct($api_key, $print = true, $debug = false, $timeout = 60, $connect_timeout = 60)
    {

        $this->print = $print;

        $this->debug = $debug;

        $factory = new Factory();

        $this->client = $factory->create(new Client(

            [

                'request.options' => [
                    'timeout'         => $timeout,
                    'connect_timeout' => $connect_timeout,
                ],

            ]

        ), $this->api);

        if ($this->debug) {

            header("Content-Type: application/json;charset=utf-8");

        }

        return $this->setKey($api_key);
    }
    /**
     *
     * SET API KEY
     *
     * @param STRING
     *
     * @return OBJECT
     *
     **/
    public function setKey($api_key)
    {

        $this->api_key = $api_key;

        return $this;

    }
    /**
     *
     * PREPARE
     *
     * @param STRING
     *
     * @return  ARRAY
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
     * BUILD ARRAY DATA
     *
     * @param ARRAY $fields
     * @param ARRAY $data
     *
     * @return ARRAY
     *
     */
    private function buildFields($fields = [], $data = [])
    {

        $arr = [];

        foreach ($fields as $field) {

            if (isset($data[$field])) {

                $arr[$field] = $data[$field];

            }

        }

        return $arr;

    }
    /**
     *
     * REQUEST DATA
     *
     * @param STRING
     * @param ARRAY
     * @param INTEGER
     * @param BOOLEAN
     *
     * @return JSON
     *
     **/
    private function requestData($method, $argv = array(), $id = 0, $key = true)
    {
        $_argv[$method] = $argv;
        $argv           = $_argv;

        if ($key) {

            $argv[$method]['api_key'] = $this->api_key;

        } else {

            $argv[$method]['p_api_key'] = $this->api_key;

        }

        if ($id != 0) {

            $argv[$method]['id'] = $id;

        }

        $request = $this->client->call($method, $argv);

        return $this->prepare($request);

    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО КРАЇНІ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СТРАНЕ
     * RECEIVING INFORMATION BY COUNTRY
     *
     * @return JSON
     *
     **/
    public function getCountryList()
    {

        return $this->requestData('get_country_by_id', null);

    }
    /**
     *
     *  ОТРИМАТИ ІНФОРМАЦІЮ ПРО КРАЇНУ ПО ID
     *  ПОЛУЧИТЬ ИНФОРМАЦИЮ О СТРАНЕ ПО ID
     *  GET INFORMATION ABOUT THE COUNTRY BY ID
     *
     *  @param ARRAY
     *
     *  @return JSON
     *
     **/
    public function getCountryId($id)
    {

        return $this->requestData('get_country_by_id', null, $id);

    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОБЛАСТЯМ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОБЛАСТЯМ
     * OBTAINING INFORMATION BY REGION
     *
     * @return JSON
     *
     **/
    public function getAreaList()
    {

        return $this->requestData('get_area_by_id', null);

    }
    /**
     *
     * ОТРИМАТИ ІНФОРМАЦІЮ ПРО ОБЛАСТЬ ПО ID
     * ПОЛУЧИТЬ ИНФОРМАЦИЮ О ОБЛАСТЬ ПО ID
     * GET INFORMATION ABOUT THE REGION BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getAreaId($id)
    {

        return $this->requestData('get_area_by_id', null, $id);

    }
    /**
     *
     * ОТРИМАТИ СПИСОК ОБЛАСТЕЙ ПО ФІЛЬТРУ
     * ПОЛУЧИТЬ СПИСОК ОБЛАСТЕЙ ПО ФИЛЬТРУ
     * GET A LIST OF AREAS BY FILTER
     *
     * @param ARRAY
     *
     * @return JSON
     *
     **/
    public function getAreaFilter($data = [])
    {

        $required_array = [

            'id',
            'country_id',
            'area_name',

        ];

        return $this->requestData('get_area_filtered', $this->buildFields($required_array, $data));

    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО РАЙОНАМ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО РАЙОНАМ
     * OBTAINING INFORMATION ON AREAS
     *
     * @return JSON
     *
     **/
    public function getDistrictList()
    {

        return $this->requestData('get_district_by_id', null);

    }
    /**
     *
     * ОТРИМАТИ ІНФОРМАЦІЮ ПРО РАЙОНІ ПО ID
     * ПОЛУЧИТЬ ИНФОРМАЦИЮ О РАЙОНЕ ПО ID
     * GET INFORMATION ABOUT THE AREA BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getDistrictId($id)
    {

        return $this->requestData('get_district_by_id', null, $id);

    }
    /**
     *
     * ОТРИМАТИ СПИСОК РАЙОНІВ ПО ФІЛЬТРУ
     * ПОЛУЧИТЬ СПИСОК РАЙОНОВ ПО ФИЛЬТРУ
     * GET A LIST OF AREAS BY FILTER
     *
     * @param ARRAY
     *
     * @return json
     *
     **/
    public function getDistrictFilter($data = [])
    {
        $required_array = [

            'id',
            'area_id',
            'country_id',
            'district_name',

        ];

        return $this->requestData('get_district_filtered', $this->buildFields($required_array, $data));
    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО НАСЕЛЕНОМУ ПУНКТУ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО НАСЕЛЕННЫМ ПУНКТАМ
     * OBTAINING INFORMATION ON HUMAN SETTLEMENTS
     *
     * @return JSON
     *
     **/
    public function getLocalityList()
    {

        return $this->requestData('get_locality_all', null);

    }
    /**
     *
     * ОТРИМАТИ ІНФОРМАЦІЮ ПРО НАСЕЛЕНИМ ПУНКТІ ПО ID
     * ПОЛУЧИТЬ ИНФОРМАЦИЮ О НАСЕЛЕННЫМ ПУНКТЕ ПО ID
     * GET INFORMATION ABOUT THE LOCALITY BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getLocalityId($id)
    {

        return $this->requestData('get_locality_by_id', null, $id);

    }
    /**
     *
     * ОТРИМАТИ СПИСОК ОБЛАСТЕЙ ПО ФІЛЬТРУ
     * ПОЛУЧИТЬ СПИСОК ОБЛАСТЕЙ ПО ФИЛЬТРУ
     * OBTAIN A LIST OF REGIONS BY FILTER
     *
     * @param ARRAY
     *
     * @return JSON
     *
     **/
    public function getLocalityFilter($data = [])
    {

        $required_fields = [

            'id',
            'country_id',
            'area_id',
            'district_id',
            'locality_name',

        ];

        return $this->requestData('get_locality_filtered', $this->buildFields($required_fields, $data));
    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО СКЛАДУ / ПОШТОМАТАМ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СКЛАДУ / ПОЧТАМАТАМ
     * OBTAINING INFORMATION ON WAREHOUSE / MAILBOXES
     *
     * @return JSON
     *
     **/
    public function getBranchList()
    {

        return $this->requestData('get_branch_by_id', null);

    }
    /**
     *
     * ОТРИМАТИ ІНФОРМАЦІЮ ПРО СКЛАДІ / ПОШТОМАТЕ ПО ID
     * ПОЛУЧИТЬ ИНФОРМАЦИЮ О СКЛАДЕ / ПОЧТОМАТЕ ПО ID
     * GET INFORMATION ABOUT THE STOCK / MAILBOX BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getBranchId($id)
    {

        return $this->requestData('get_branch_by_id', null, $id);

    }
    /**
     *
     * ОТРИМАТИ СПИСОК СКЛАДІВ / ПОЧТОМАТОВ ПО ФІЛЬТРУ
     * ПОЛУЧИТЬ СПИСОК СКЛАДОВ / ПОЧТОМАТОВ ПО ФИЛЬТРУ
     * GET A LIST OF WAREHOUSES / MAILBOXES BY FILTER
     *
     * @param ARRAY
     *
     * @return JSON
     *
     **/
    public function getBranchFilter($data = [])
    {
        $required_fields = [

            'id',
            'country_id',
            'area_id',
            'district_id',
            'locality_id',
            'branch_name',

        ];

        return $this->requestData('get_branch_filtered', $this->buildFields($required_fields, $data));
    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОПИСУ ВАНТАЖУ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОПИСАНИЯ ГРУЗА
     * OBTAINING INFORMATION ON THE DESCRIPTION OF GOODS
     *
     * @return JSON
     *
     **/
    public function getGoodsDescList()
    {

        return $this->requestData('get_goods_desc_by_id', null);

    }
    /**
     *
     * ОТРИМАТИ ОПИС ВАНТАЖУ ПО ID
     * ПОЛУЧИТЬ ОПИСАНИЕ ГРУЗА ПО ID
     * RECEIVE A DESCRIPTION OF THE CARGO BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getGoodsDescId($id)
    {

        return $this->requestData('get_goods_desc_by_id', null, $id);

    }
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО ПАКУВАННЮ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО УПАКОВКЕ
     * RECEIPT OF PACKAGING INFORMATION
     *
     * @return JSON
     *
     **/
    public function getBoxList()
    {

        return $this->requestData('get_box_by_id', null);

    }
    /**
     *
     * ОТРИМАТИ УПАКОВКУ ПО OD
     * ПОЛУЧИТЬ УПАКОВКУ ПО ID
     * GET PACKAGING BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getBoxId($id)
    {

        return $this->requestData('get_box_by_id', null, $id);

    }
    /**
     *
     * СТВОРЕННЯ ЗАЯВКИ ТТН
     * СОЗДАНИЕ ЗАЯВКИ ТТН
     * CREATING A TTN APPLICATION
     *
     * @param ARRAY
     *
     * @return JSON
     *
     **/
    public function declarationCreate($data = [])
    {

        $required_fields = [

            'locality_id',
            'sender_warehouse_id',
            'sender_address',
            'receiver_okpo',
            'receiver_company_name',
            'receiver_cellphone',
            'receiver_surname',
            'receiver_firstname',
            'receiver_patronymic',
            'receiver_locality_id',
            'receiver_warehouse_id',
            'receiver_address',
            'payment_type_id',
            'payer_type_id',
            'return_day',
            'cost_return',
            'cash_on_delivery_sum',
            'client_doc_id',
            'cancel_packing',
            'sender_paid_sum',
            'third_party_okpo',
            'third_party_company_name',
            'third_party_cellphone',
            'third_party_lastname',
            'third_party_firstname',
            'third_party_patronymic',
            'third_patry_store_id',
            'third_party_address',
            'packages',
            'commands',
            'containers',
            'seats',

        ];

        return $this->buildFields($required_fields, $data);

        // return $this->requestData('declaration_insert_update', $this->buildFields($required_fields, $data));
    }
    /**
     *
     * РОЗРАХУНОК ВАРТОСТІ ДОСТАВКИ
     * РАСЧЕТ СТОИМОСТИ ДОСТАВКИ
     * CALCULATING THE COST OF DELIVERY
     *
     * @param ARRAY
     *
     * @return JSON
     *
     **/
    public function declarationCalculate($data = [])
    {
        $required_fields = [
            'p_sender_locality_id',
            'p_sender_warehouse_id',
            'p_sender_address',
            'p_receiver_okpo',
            'p_receiver_company_name',
            'p_receiver_cellphone',
            'p_receiver_surname',
            'p_receiver_firstname',
            'p_receiver_patronymic',
            'p_receiver_locality_id',
            'p_receiver_warehouse_id',
            'p_receiver_address',
            'p_payment_type_id',
            'p_payer_type_id',
            'p_cost_return',
            'p_cod',
            'p_perc_send',
            'p_part3_okpo',
            'p_part3_company_name',
            'p_part3_surname',
            'p_part3_firstname',
            'p_part3_patronymic',
            'p_city_p',
            'p_wh_p',
            'p_adress_p',
            'p_clob_box',
            'p_clob_comparam',
            'p_clob_serv',
            'p_clob_seats',
        ];

        return $this->requestData('declaration_calculate', $this->buildFields($required_fields, $data), '', false);

    }
    /**
     *
     * ОТРИМАННЯ ІСТОРІЇ СТАТУСІВ ПО ТТН
     * ПОЛУЧЕНИЕ ИСТОРИИ СТАТУС ПО ТТН
     * GET A LIST OF TTN STORIES
     *
     * @param STRING
     *
     * @return JSON
     *
     **/
    public function declStatus($number)
    {

        $argv['decl_status_history']['decl_num'] = $number;

        return $this->requestData('decl_status_history', $argv);

    }
    /**
     *
     * ОТРИМАННЯ ГРАФІКУ РОБОТИ СКЛАДУ
     * ПОЛУЧЕНИЯ ГРАФИКА РАБОТЫ СКЛАДА
     * GETTING SCHEDULES FOR THE WAREHOUSE
     *
     * @return JSON
     *
     **/
    public function getBranchWorkList()
    {

        return $this->requestData('get_branch_work_hours', null);

    }
    /**
     *
     * ОТРИМАТИ ГРАФІК РОБОТИ СКЛАДА ПО ID
     * ПОЛУЧИТЬ ГРАФИК РАБОТЫ СКЛАДА ПО ID
     * GET THE WORK SCHEDULE OF THE WAREHOUSE BY ID
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getBranchWorkId($id)
    {

        return $this->requestData('get_branch_work_hours', null, $id);

    }
    /**
     *
     * ОТРИМАТИ ІНФОРМАЦІЮ ТТН
     * ПОЛУЧИТЬ ИНФОРМАЦИЮ ТТН
     * GET TTN INFORMATION
     *
     * @param INTEGER
     *
     * @return JSON
     *
     **/
    public function getTTN($number)
    {

        $argv['get_ttn_by_api_key']['ttn'] = $number;

        return $this->requestData('get_ttn_by_api_key', $argv);
    }
    /**
     *
     * СТВОРЕННЯ МІСЦЯ
     * СОЗДАНИЕ МЕСТА
     * CREATE SEAT
     *
     * @param ARRAY $data
     *
     * @return ARRAY
     *
     */
    public function createSeat($data): array
    {

        $required_array = [

            'Goods_type_id',
            'Weight_m',
            'Length_m',
            'Width_m',
            'Height_m',
            'Weight_r',
            'Gsize_r',
            'Count_m',
            'Goods_type_descr_id',
            'Box_id',
            'SN',

        ];

        return $this->buildFields(

            $required_array, $data

        );

    }
}
