
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

$date = date('Y-m-d H:i:s');

$data = json_decode(file_get_contents("php://input"), TRUE);
$requestType = $data['type'];

if ($requestType === 'Car Details') {
$carLocation = $data['carLocation'];
$carTitle = $data['carTitle'];
$carTire = $data['carTire'];
$carFlat = $data['carFlat'];
$carWheel = $data['carWheel'];
$carKey = $data['carKey'];
$carDrive = $data['carDrive'];
$carEngine = $data['carEngine'];
$carExternal = $data['carExternal'];
$carInterior = $data['carInterior'];
$carBody = $data['carBody'];
$carMirror = $data['carMirror'];
$carFlood = $data['carFlood'];
$carMileage = $data['carMileage'];
$contactName = $data['contactName'];
$contactPhone = $data['contactPhone'];
$contactEmail = $data['contactEmail'];
$contactZip = $data['contactZip'];
$badTire = $data['badTire'];
$badWheel = $data['badWheel'];
$badBody = $data['badBody'];
$badExt = $data['badExt'];
$badMirror = $data['badMirror'];
$carYear = $data['carYear'];
$carBrand = $data['carBrand'];
$carModel = $data['carModel'];




function checkArray($arr){
if (is_array($arr)) {
	$arr = array_filter($arr);
$arr = implode(", ", $arr);
}
return $arr;
}

if ($carFlat === 'y') {
$carFlat = checkArray($badTire);
}

if ($carWheel === 'n') {
$carWheel = checkArray($badWheel);
}

if ($carBody === 'y') {
$carBody = checkArray($badBody);
}

if ($carMirror === 'y') {
$carMirror = checkArray($badMirror);
}

if ($carExternal === 'y') {
$carExternal = checkArray($badExt);
}




if (empty($carYear)) {
$response = 0;
}else if (empty($carBrand)) {
$response = 1;
}else if (empty($carModel)) {
$response = 2;
}else if (empty($carLocation)) {
$response = 3;
}else if (empty($carTitle)) {
$response = 4;
}else if (empty($carTire)) {
$response = 5;
}else if (empty($carFlat)) {
$response = 6;
}else if (empty($carWheel)) {
$response = 7;
}else if (empty($carKey)) {
$response = 8;
}else if (empty($carDrive)) {
$response = 9;
}else if (empty($carEngine)) {
$response = 10;
}else if (empty($carExternal)) {
$response = 11;
}else if (empty($carInterior)) {
$response = 12;
}else if (empty($carBody)) {
$response = 13;
}else if (empty($carFlood)) {
$response = 14;
}else if (empty($carMirror)) {
$response = 15;
}else if (empty($contactName)) {
$response = 16;
}else if (empty($contactEmail)) {
$response = 17;
}else if (empty($contactPhone)) {
$response = 18;
}else{ 
$sql = $connect -> prepare("INSERT INTO quotation (car_year, car_brand, car_model, car_location, car_title, car_tires, car_flat_tires, car_key, car_wheel, car_engine, car_drive, car_exterior, car_mileage, car_interior, car_body, car_flood, car_mirror, contact_name, contact_email, contact_phone, contact_zip, quote_time) VALUES (:car_year, :car_brand, :car_model, :car_location, :car_title, :car_tires, :car_flat_tires, :car_key, :car_wheel, :car_engine, :car_drive, :car_exterior, :car_mileage, :car_interior, :car_body, :car_flood, :car_mirror, :contact_name, :contact_email, :contact_phone, :contact_zip, :quote_time)");
$sql -> execute(array(':car_year' => $carYear, ':car_brand' => $carBrand, ':car_model' => $carModel, ':car_location' => $carLocation, ':car_title' => $carTitle, ':car_tires' => $carTire, ':car_flat_tires' => $carFlat, ':car_key' => $carKey, ':car_wheel' => $carWheel, ':car_engine' => $carEngine, ':car_drive' => $carDrive, ':car_exterior' => $carExternal, ':car_mileage' => $carMileage, ':car_interior' => $carInterior, ':car_body' => $carBody, ':car_flood' => $carFlood, ':car_mirror' => $carMirror, ':contact_name' => $contactName, ':contact_email' => $contactEmail, ':contact_phone' => $contactPhone, ':contact_zip' => $contactZip, ':quote_time' => $date));



if (!$sql) {
$response = 19;
} else {
$response = 200;
}

}
echo json_encode($response);
}
?>