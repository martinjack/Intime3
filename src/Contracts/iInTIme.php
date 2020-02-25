<?php

namespace InTime\Contracts;

/**
 *
 * Interface inInTime
 *
 * @package InTime
 *
 */
interface iInTime
{

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
    public function __construct($api_key, $print = true, $debug = false, $timeout = 60, $connect_timeout = 60);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО КРАЇНІ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СТРАНЕ
     * RECEIVING INFORMATION BY COUNTRY
     *
     * @return JSON
     *
     **/
    public function getCountryList();
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
    public function getCountryId($id);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОБЛАСТЯМ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОБЛАСТЯМ
     * OBTAINING INFORMATION BY REGION
     *
     * @return JSON
     *
     **/
    public function getAreaList();
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
    public function getAreaId($id);
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
    public function getAreaFilter($data = []);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО РАЙОНАМ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО РАЙОНАМ
     * OBTAINING INFORMATION ON AREAS
     *
     * @return JSON
     *
     **/
    public function getDistrictList();
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
    public function getDistrictId($id);
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
    public function getDistrictFilter($data = []);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО НАСЕЛЕНОМУ ПУНКТУ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО НАСЕЛЕННЫМ ПУНКТАМ
     * OBTAINING INFORMATION ON HUMAN SETTLEMENTS
     *
     * @return JSON
     *
     **/
    public function getLocalityList();
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
    public function getLocalityId($id);
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
    public function getLocalityFilter($data = []);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО СКЛАДУ / ПОШТОМАТАМ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО СКЛАДУ / ПОЧТАМАТАМ
     * OBTAINING INFORMATION ON WAREHOUSE / MAILBOXES
     *
     * @return JSON
     *
     **/
    public function getBranchList();
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
    public function getBranchId($id);
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
    public function getBranchFilter($data = []);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО ОПИСУ ВАНТАЖУ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО ОПИСАНИЯ ГРУЗА
     * OBTAINING INFORMATION ON THE DESCRIPTION OF GOODS
     *
     * @return JSON
     *
     **/
    public function getGoodsDescList();
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
    public function getGoodsDescId($id);
    /**
     *
     * ОТРИМАННЯ ІНФОРМАЦІЇ ПО ПАКУВАННЮ
     * ПОЛУЧЕНИЕ ИНФОРМАЦИИ ПО УПАКОВКЕ
     * RECEIPT OF PACKAGING INFORMATION
     *
     * @return JSON
     *
     **/
    public function getBoxList();
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
    public function getBoxId($id);
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
    public function declarationCreate($data = []);
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
    public function declarationCalculate($data = []);
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
    public function declStatus($number);
    /**
     *
     * ОТРИМАННЯ ГРАФІКУ РОБОТИ СКЛАДУ
     * ПОЛУЧЕНИЯ ГРАФИКА РАБОТЫ СКЛАДА
     * GETTING SCHEDULES FOR THE WAREHOUSE
     *
     * @return JSON
     *
     **/
    public function getBranchWorkList();
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
    public function getBranchWorkId($id);
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
    public function getTTN($number);
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
    public function createSeat($data);

}
