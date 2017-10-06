<?php 

use InTime\InTime3;

include_once 'vendor/autoload.php';

$intime = new InTime3('API_KEY');

print_r($intime->get_country_list());
