<?php
//ob_start("ob_gzhandler");
error_reporting(0);
session_start();

/* DATABASE CONFIGURATION */
define('DB_SERVER', 'fdb16.eohost.com');
define('DB_USERNAME', '2450783_healthy');
define('DB_PASSWORD', '963852asd');
define('DB_DATABASE', '2450783_healthy');
define("BASE_URL", "http://yoursite.com/app/");
define("SITE_KEY", 'yourSecretKey');


function getDB() 
{
	$dbhost=DB_SERVER;
	$dbuser=DB_USERNAME;
	$dbpass=DB_PASSWORD;
	$dbname=DB_DATABASE;
	$dbConnection = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbuser, $dbpass);	
	$dbConnection->exec("set names utf8");
	$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	return $dbConnection;
}
/* DATABASE CONFIGURATION END */

/* API key encryption */
function apiToken()
{
return 'app963';
}



?>