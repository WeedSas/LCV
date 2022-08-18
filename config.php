<?php 

$path = dirname(__FILE__);
$path = str_replace('\\', '/', $path);

if(strpos($path, '/prod/') !== false || strpos($path, '/PROD/') !== false){

	define("CHEMIN", "https://backoffice-prod.bng-networks.com/");
	define("ETAT", "prod");

}elseif(strpos($path, '/APP/') !== false){

	define("CHEMIN", "https://backoffice-prod.bng-networks.com/");
	define("ETAT", "prod");

}elseif(strpos($path, '/dev/') !== false || strpos($path, '/DEV/') !== false){

	define("CHEMIN", "https://backoffice-dev.bng-networks.com");
	define("ETAT", "dev");
	
}else{

	define("CHEMIN", "http://localhost/backoffice/");
	define("ETAT", "localhost");

}
define("PROJET", "la_croix_valmer");


const TAB_BORNES = array(
    'la_croix_valmer' => array(
        'lat' => '43.206709',
        'lon' => '6.568789'
	)
    );