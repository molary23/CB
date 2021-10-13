<?php
//error_reporting(0);
define('DSN', 'mysql:host=localhost;dbname=XXXXXX;charset=utf8');
define('USERNAME', 'XXXXXXX');
define('PASSWORD', '');
try {
$connect = new PDO(DSN,USERNAME,PASSWORD);
} catch (PDOException $e) {
echo $e -> getMessage();
}
$connect ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$connect -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

date_default_timezone_set('America/New_York');

session_start();

$baseURL = '//localhost/fljc/';
//echo $baseURL;
     
?>
