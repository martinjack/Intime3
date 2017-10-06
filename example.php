<?php 

use InTime\InTime3;

include_once 'vendor/autoload.php';


$intime = new InTime3('API_KEY');
//$intime = new InTime3('API_KEY', false); print data stdclass format 
//$intime = new InTime3('API_KEY', false, true); debug mode

print_r($intime->get_country_list());
