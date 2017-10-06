<?php 

use InTime\InTime3;

include_once 'vendor/autoload.php';


$intime = new InTime3('69502396190001818247');

print_r($intime->get_country_list());
