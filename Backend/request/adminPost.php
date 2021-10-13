<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');

$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fljc/upload/gallery/';



$data = json_decode(file_get_contents("php://input"), TRUE);
$requestType = $data['send'] ;

if ($requestType === 'Save Image') {
$imgSrc = $data['imgSrc'];
$caption = $data['caption'];
$desc = $data['desc'];

if (empty($imgSrc)) {
$response = 0;
}else if (empty($caption)) {
$response = 1;
}else{
$sqlImg = $connect -> prepare("INSERT INTO gallery (image_alt, image_description) VALUES (:image_alt, :image_description)");
$sqlImg -> execute(array(':image_alt' => $caption, ':image_description' => $desc));  
$imgId = $connect -> lastInsertId();


if (preg_match('/^data:image\/(\w+);base64,/', $imgSrc, $type)) {
$imgSrc = substr($imgSrc, strpos($imgSrc, ',') + 1);
$type = strtolower($type[1]); // jpg, png, gif

if (!in_array($type, [ 'jpg', 'jpeg', 'gif', 'png' ])) {
throw new \Exception('invalid image type');
}

$data = base64_decode($imgSrc);

if ($data === false) {
throw new \Exception('base64_decode failed');
}
} else {
throw new \Exception('did not match data URI with image data');
}
$fileUp = file_put_contents("{$uploadDirectory}{$imgId}.{$type}", $data);

if (!$fileUp) {
$sql = $connect -> query("DELETE FROM gallery WHERE image_id = '$imgId' ");
$response = 2;
}else{
$imageLoc = $imgId .'.'. $type;
$sql = $connect -> prepare("UPDATE gallery set image_location = ?  WHERE image_id = ?");
$sql -> execute(array($imageLoc,$imgId)); 
if ($sql) {
    $response = 200;
} 
}
}
echo json_encode($response);
}

?>