
<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: 1000');
header('Access-Control-Allow-Methods: POST, GET, PATCH, OPTIONS, PUT, DELETE');
header('Access-Control-Max-Age: 86400');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json');

?>
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');

if (isset($_GET['send']) && ($_GET['send'] === 'Get Car Brands')) {
$value = $_GET['value'];
$sql = $connect -> query("SELECT DISTINCT car_brand FROM cars WHERE car_year = '$value' OR car_remodel_year = '$value' ORDER BY car_brand ASC ");
$getCarBrands = $sql -> fetchAll(PDO::FETCH_ASSOC);

echo json_encode($getCarBrands);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Get Car Models')) {
$value = $_GET['value'];
$carYear = $_GET['carYear'];
if (!empty($value)) {
$sql = $connect -> query("SELECT car_model FROM cars WHERE car_year = '$carYear' AND car_brand = '$value' ORDER BY car_model ASC ");
$getCarModel = $sql -> fetchAll(PDO::FETCH_ASSOC);
}else{
	$getCarModel = '';
}
echo json_encode($getCarModel);
}else{
	die();
}
$connect = null;
?>