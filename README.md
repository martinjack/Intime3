# Описание

[![Latest Stable Version](https://poser.pugx.org/jackmartin/api3intime/v/stable)](https://packagist.org/packages/jackmartin/api3intime) [![Total Downloads](https://poser.pugx.org/jackmartin/api3intime/downloads)](https://packagist.org/packages/jackmartin/api3intime) [![License](https://poser.pugx.org/jackmartin/api3intime/license)](https://packagist.org/packages/jackmartin/api3intime)

PHP класс для работы с почтой Intime

# Документация 

[Інструкція по інтеграції з веб- сервісами Ін-Тайм. API 3.1](https://intime.ua/upload/images/document/api_3_1.pdf)

# Требование

* PHP не ниже 7.0
* Composer

# Composer
```bash
composer require jackmartin/api3intime
```

# Библиотеки
1. [Soap-Guzzle](https://github.com/meng-tian/async-soap-guzzle)

# Методы API

1. Настройка подключения
	* [__construct](#__construct)
2. Получить список стран  
	* [getCountryList](#getCountryList)
3. Получить информацию о стране по ID
	* [getCountryId](#getCountryIdid)
4. Получить список областей
	* [getAreaList](#getAreaList)
5. Получить информацию о областе по ID
	* [getAreaId](#getAreaIdid)
6. Получить список областей по фильтру
	* [getAreaFilter](#getAreaFilterdata--array)
7. Получить список районов
	* [getDistrictList](#getDistrictList)
8. Получить информацию о районе по ID
	* [getDistrictId](#getDistrictIdid)
9. Получить список районов по фильтру
	* [getDistrictFilter](#getDistrictFilterdata--array)
10. Получение список населенных пунктов
	* [getLocalityList](#getLocalityList)
11. Получить информацию о населенным пункте по ID
	* [getLocalityId](#getLocalityIdid)
12. Получить список населенных пунктов по фильтру
	* [getLocalityFilter](#getLocalityFilterdata--array)
13. Получение список складов / почтоматов
	* [getBranchList](#getBranchList)
14. Получить информацию о складе / почтомате по ID
	* [getBranchId](#getBranchIdid)
15. Получить список складов / почтоматов по фильтру
	* [getBranchFilter](#getBranchFilterdata--array)
16. Получить список описаний груза
	* [getGoodsDescList](#getGoodsDescList)
17. Получить описание груза по ID
	* [getGoodsDescId](#getGoodsDescIdid)
18. Получить список упаковок
	* [getBoxList](#getBoxList)
19. Получить упаковку по ID
	* [getBoxId](#getBoxIdid)
20. Создать заявку ТТН
	* [declarationCreate](#declarationCreatedata--array)
21. Получить список графика работы складов
	* [getBranchWorkList](#getBranchWorkList)
22. Получить график работы склада по ID
	* [getBranchWorkId](#getBranchWorkIdid)
23. Получить список историй ТТН
	* [declStatus](#declstatusnumber)
24. Получить информацию ТТН
	* [getTTN](#getttnnumber)

# Пример

### __construct() ###

```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');
// $intime = new InTime3('API_KEY', true, false, 30, 30);
// $intime = new InTime3('API_KEY', true, false);

```

### getCountryList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');
//$intime = new InTime3('API_KEY', false); print data stdclass format 
//$intime = new InTime3('API_KEY', false, true); debug mode

print_r($intime->getCountryList());
//{"Entry_get_country_by_id":[{"id":"213","name_ua":"УЕЛЬС","name_en":"WALES","name_ru":"УЭЛЬС","short_name_ua":"УЕЛЬС","short_name_en":"WALES","short_name_ru":"УЭЛЬС","code":"000000213","last_change":"2017-08-30T21:04:00.000+03:00","status":"1"},{"id":"214","name_ua":"УЗБЕКИСТАН","name_en":"UZBEKISTAN","name_ru":"УЗБЕКИСТАН","short_name_ua":"УЗБЕКИСТАН","short_name_en":"UZBEKISTAN","short_name_ru":"УЗБЕКИСТАН","code":"000000214","last_change":"2017-05-11T21:10:00.000+03:00","status":"1"}
```

### getCountryId($id) ###
```php


use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getCountryId(213));
```

### getAreaList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getAreaList());
```

### getAreaId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getAreaId(1));
```

### getAreaFilter($data = array()) ###
```php 

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getAreaFilter(array(

    // 'id'        => 1,
    'area_name' => 'В',
    // 'country_id' => '215',

)));
```

### getDistrictList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getDistrictList());
```

### getDistrictId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getDistrictId(241));
```

### getDistrictFilter($data = array()) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getDistrictFilter(array(

    // 'id' => '241',
    // 'country_id' => '215',
    'district_name' => 'Бере',

)));
```

### getLocalityList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_key');

print_r($intime->getLocalityList());
```

### getLocalityId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getLocalityId(100));
```

### getLocalityFilter($data = array()) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getLocalityFilter(array(

    // 'id' => 328,
    // 'country_id' => 215,
    // 'area_id' => 14,
    'district_id' => 416,
    // 'locality_name' => 'Сково',

)));
```

### getBranchList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBranchList());
```

### getBranchId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBranchId(328));
```

### getBranchFilter($data = array()) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBranchFilter(array(

    // 'id' => 328,
    // 'country_id' => 215,
    // 'area_id' => 15,
    // 'district_id' => 40,
    // 'locality_id' => 39,
    'branch_name' => 'Воло',

)));
```

### getGoodsDescList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getGoodsDescList());
```

### getGoodsDescId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getGoodsDescList());
```

### getBoxList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBoxList());
```

### getBoxId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBoxId(50));
```

### declarationCreate($data = array()) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r(

	$intime->declarationCreate(

		[

			...

		]

	)

);

```

### getBranchWorkList() ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBranchWorkList());
```

### getBranchWorkId($id) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getBranchWorkId(200));
```

### declStatus($number) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->declStatus('NUMBER_TTN'));
```

### getTTN($number) ###
```php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getTTN('NUMBER_TTN'));
```
