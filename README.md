# Описание

PHP класс для работы с почтой Intime

# Документация 

[Інструкція по інтеграції з веб- сервісами Ін-Тайм. API 3.0](https://intime.ua/upload/images/document/api_3_0.pdf)

# Требование

* PHP не ниже 5.6
* Composer

# Composer
```bash
composer require jackmartin/api3intime dev-master
```

# Библиотеки
1. [Soap-Guzzle](https://github.com/meng-tian/async-soap-guzzle)

# Методы API

1. Полученить список стран  
	* [get_country_list](https://github.com/martinjack/Intime3#get_country_list)
2. Получить информацию о стране по ID
	* [get_country_id](https://github.com/martinjack/Intime3#get_country_idid)
3. Получить список областей
	* [get_area_list](https://github.com/martinjack/Intime3#get_area_list)
4. Получить информацию о областе по ID
	* [get_area_id](https://github.com/martinjack/Intime3#get_area_idid)
5. Получить список районов
	* [get_district_list](https://github.com/martinjack/Intime3#get_district_list)
6. Получить информацию о районе по ID
	* [get_district_id](https://github.com/martinjack/Intime3#get_district_idid)
7. Получение список населенных пунктов
	* [get_locality_list](https://github.com/martinjack/Intime3#get_locality_list)
8. Получить информацию о населенным пункте по ID
	* [get_locality_id](https://github.com/martinjack/Intime3#get_locality_idid)
9. Получение список складов / почтоматов
	* [get_branch_list](https://github.com/martinjack/Intime3#get_branch_list)
10. Получить информацию о складе / почтомат по ID
	* [get_branch_id](https://github.com/martinjack/Intime3#get_branch_idid)
11. Получить список описаний груза
	* [get_goods_desc_list](https://github.com/martinjack/Intime3#get_goods_desc_list)
12. Получить описание груза по ID
	* [get_goods_desc_id](https://github.com/martinjack/Intime3#get_goods_desc_idid)
13. Получить список упаковок
	* [get_box_list](https://github.com/martinjack/Intime3#get_box_list)
14. Получить упаковку по ID
	* [get_box_id](https://github.com/martinjack/Intime3#get_box_idid)
15. Создать заявку ТТН
	* [declaration_create](https://github.com/martinjack/Intime3#declaration_createdata--array)
15. Получить список графика работы складов
	* [get_branch_work_list](https://github.com/martinjack/Intime3#get_branch_work_list)
16. Получить график работы склада по ID
	* [get_branch_work_id](https://github.com/martinjack/Intime3#get_branch_work_idid)
17. Получить список историй ТТН
	* [declStatus](https://github.com/martinjack/Intime3#declstatusnumber)
18. Получить информацию ТТН
	* [getTTN](https://github.com/martinjack/Intime3#getttnnumber)

# Пример

### get_country_list() ###
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

### get_country_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_country_id(213));
```

### get_area_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_area_list());
```

### get_area_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_area_id(1));
```

### get_district_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_district_list());
```

### get_district_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_district_id(241));
```

### get_locality_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_key');

print_r($intime->get_locality_list());
```

### get_locality_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_locality_id(100));
```

### get_branch_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_branch_list());
```

### get_branch_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_branch_id(328));
```

### get_goods_desc_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_goods_desc_list());
```

### get_goods_desc_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_goods_desc_list());
```

### get_box_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_box_list());
```

### get_box_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_box_id(50));
```

### declaration_create($data = array()) ###
```php

```

### get_branch_work_list() ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_branch_work_list());
```

### get_branch_work_id($id) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_branch_work_id(200));
```

### declStatus($number) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->declStatus('NUMBER_TTN'));
```

### getTTN($number) ###
```php
<?php

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->getTTN('NUMBER_TTN'));
```