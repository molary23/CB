
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

if($requestType === 'Contact Us') {
$name = $data['name'];
$email = $data['email'];
$phone = $data['phone'];
$subject = $data['subject'];
$message = $data['message'];

//Send Message

$response = 200;

echo json_encode($response);
}

?>