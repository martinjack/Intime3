# Описание

PHP класс для работы с почтой Intime

# Документация 

[Doc PDF](https://intime.ua/upload/images/document/api_3_0.pdf)

# Требование

* PHP не ниже 5.6
* Composer

# Методы API

1. Получение информации по стране  
	- get_country_list
	* get_country_id
2. Получение информации по областям
	* get_area_list
	* get_area_id
3. Получение информации по районам
	* get_district_list
	* get_district_id
4. Получение информации по населенным пунктам
	* get_locality_list
	* get_locality_id
5. Получение информации по складу / поштоматам
	* get_branch_list
	* get_branch_id
6. Получение информации по описания груза
	* get_goods_desc_list
	* get_goods_desc_id
7. Получение информации по упаковке
	* get_box_list
	* get_box_id
8. Получения графика работы склада
	* get_branch_work_hours
	* get_branch_work_hours_id

# Composer
```bash
composer require jackmartin/api3intime
```

# Пример
```php
<?php
use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');
//$intime = new InTime3('API_KEY', false); print data stdclass format 
//$intime = new InTime3('API_KEY', false, true); debug mode

print_r($intime->get_country_list());
//{"Entry_get_country_by_id":[{"id":"213","name_ua":"УЕЛЬС","name_en":"WALES","name_ru":"УЭЛЬС","short_name_ua":"УЕЛЬС","short_name_en":"WALES","short_name_ru":"УЭЛЬС","code":"000000213","last_change":"2017-08-30T21:04:00.000+03:00","status":"1"},{"id":"214","name_ua":"УЗБЕКИСТАН","name_en":"UZBEKISTAN","name_ru":"УЗБЕКИСТАН","short_name_ua":"УЗБЕКИСТАН","short_name_en":"UZBEKISTAN","short_name_ru":"УЗБЕКИСТАН","code":"000000214","last_change":"2017-05-11T21:10:00.000+03:00","status":"1"}
```

# Библиотеки
1. [Soap-Guzzle](https://github.com/meng-tian/async-soap-guzzle)