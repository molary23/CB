<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/mails/mail.php');
$userID = $_SESSION['id_user'];
$date = date('Y-m-d H:i:s');
$uploadDirectory = $_SERVER['DOCUMENT_ROOT'] . '/fljc/upload/gallery/';

$alphanum = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
$special  = '~!@#$%^&*?';
$alphabet = $alphanum . $special;
$len = 15;
$options = [
   'cost' => 11
   ];

$header  = "MIME-Version: 1.0" . PHP_EOL;
$header .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;

if (isset($_GET['send']) && ($_GET['send'] === 'Car')) {
$carYear = $_GET['carYear'];
$carRemodelYear = $_GET['carRemodelYear'];
$carBrand = $_GET['carBrand'];
$carModel = $_GET['carModel'];
$carStatus = $_GET['carStatus'];

if (empty($carYear)) {
$response = 0;
}else if (empty($carBrand)) {
$response = 1;
}else if (empty($carModel)) {
$response = 2;
}else{
if ($carStatus === 'new') {
$sql = $connect -> query("SELECT * FROM cars WHERE car_year = '$carYear' AND car_brand = '$carBrand' AND car_model = '$carModel' ");

$checkCar = $sql -> rowCount();

if ($checkCar > 0) {
$response = 3;
}else{
$sqlCar = $connect -> prepare("INSERT INTO cars (car_year, car_brand, car_model, car_remodel_year) VALUES (:carYear, :carBrand, :carModel, :carRemodelYear)");
$sqlCar -> execute(array(':carYear' => $carYear, ':carBrand' => $carBrand, ':carModel' => $carModel, ':carRemodelYear' => $carRemodelYear));
}
}else{
$sqlCar = $connect -> prepare("UPDATE cars SET car_year = ?, car_brand = ?, car_model = ?, car_remodel_year = ? WHERE car_id = ?");
$sqlCar -> execute(array($carYear, $carBrand,  $carModel, $carRemodelYear, $carStatus));  
}
if ($sqlCar) {
$response = 200;
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Delete Car')) {
$carID = $_GET['clickedID'];
$sqlTest = $connect -> prepare("DELETE FROM cars WHERE car_id = ? LIMIT 1");
$sqlTest -> execute(array( $carID));
if(!$sqlTest) {
$response = 0;
} else{
$response = 200;
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Delete Image')) {
$imgID = $_GET['clickedID'];
$sql = $connect -> query("SELECT image_location FROM gallery WHERE image_id = '$imgID'");
$getI = $sql -> fetch(PDO::FETCH_ASSOC);
$imgLoc = $getI['image_location'];

if (!empty($imgLoc)) {
if(file_exists($uploadDirectory.$imgLoc)){
unlink($uploadDirectory.$imgLoc); 
}
}
$sqlImage = $connect -> prepare("DELETE FROM gallery WHERE image_id = ? LIMIT 1");
$sqlImage -> execute(array( $imgID));
if(!$sqlImage) {
$response = 0;
} else{
$response = 200;
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Add User')) {
$email = $_GET['email'];
$phone = $_GET['phone'];
$level = $_GET['level'];
$name = $_GET['name'];
$uStatus = $_GET['status'];
$header .= "From:" . $officeGenEmail . PHP_EOL .	"CC: officegmail@gmail.com" .PHP_EOL. 'X-Mailer: PHP/' . phpversion();
if (empty($email)) {
$response = 0;
}else if (empty($phone)) {
$response = 1;
}else if (empty($level)) {
$response = 2;
}else if (empty($name)) {
$response = 4;
}else{

if ($uStatus === 'new') {
$random = openssl_random_pseudo_bytes($len);
$alphabet_length = strlen($alphabet);
$pwd = '';
for ($i = 0; $i < $len; ++$i) {
$pwd .= $alphabet[ord($random[$i]) % $alphabet_length];
}

$pword = password_hash($pwd, PASSWORD_BCRYPT, $options);

$sql = $connect -> query("SELECT * FROM user WHERE user_email = '$email' OR user_phone = '$phone' ");

$checkUser = $sql -> rowCount();

if ($checkUser > 0) {
$getUser = $sql -> fetch(PDO::FETCH_ASSOC);
$userStatus = $getUser['user_status'];
$user_id = $getUser['id_user'];
if ($userStatus === 'a') {
   $response = 3;
} else if ($userStatus === 'd'){
   $sqlOld = $connect -> prepare("UPDATE user SET user_status = ? WHERE id_user = ?");
   $sqlOld -> execute(array('a', $user_id)); 
   $newUserMsg = createUser($name, $email, $phone, $pword);
$subject = "New Administrator Alert.";
$mail = mail($email, $subject, $newUserMsg, $header);
$response = 201;
}
}else{
$sqlUser = $connect -> prepare("INSERT INTO user (user_email, user_phone, user_level) VALUES (:email, :phone, :lvl)");
$sqlUser -> execute(array(':email' => $email, ':phone' => $phone, ':lvl' => $level));
$createID = $connect -> lastInsertId();
$sqlInfo = $connect -> prepare("INSERT INTO userInfo (user_id, user_name) VALUES (:user_id, $name)");
$sqlInfo -> execute(array(':user_id' => $createID, ':name' => $name));
if ($sqlInfo) {
$sqlPwd = $connect -> prepare("INSERT INTO user_recover (user_id, recover, recover_date) VALUES (:user_id, :recover, :recover_date)");
$sqlPwd -> execute(array(':user_id' => $createID, ':recover' => $pword, ':recover_date' => $date));

if ($sqlPwd) {
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => 'a', ':action_id' => $createID, ':act_time' => $date));
// Send Mail to Both Principal and new User		
$newUserMsg = createUser($name, $email, $phone, $pword);
$subject = "New Administrator Alert.";
$mail = mail($email, $subject, $newUserMsg, $header);
$response = 200;
}
}


}
}else{
$sqlUser = $connect -> prepare("UPDATE user SET user_email = ?, user_phone = ?, user_level = ? WHERE id_user = ?");
$sqlUser -> execute(array($email, $phone,$level, $uStatus));
$sqlInfo = $connect -> prepare("UPDATE userInfo user_name = ? WHERE user_id = ?");
$sqlInfo -> execute(array($name, $uStatus));
if ($sqlInfo) {
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => 'e', ':action_id' => $uStatus, ':act_time' => $date));
$response = 200;
}
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Reset Password')) {
$id = $_GET['clickedID'];
$random = openssl_random_pseudo_bytes($len);
$alphabet_length = strlen($alphabet);
$pwd = '';
for ($i = 0; $i < $len; ++$i) {
$pwd .= $alphabet[ord($random[$i]) % $alphabet_length];
}
$pword = password_hash($pwd, PASSWORD_BCRYPT, $options);
$id = intval($id);


$sql = $connect -> prepare("UPDATE user_recover SET recover = ?, recover_date = ? WHERE user_id = ? LIMIT 1");
$sql -> execute(array($pword, $date, $id));

if ($sql) {
$sqlP = $connect -> prepare("UPDATE user SET user_password = ? WHERE id_user = ? LIMIT 1");
$sqlP -> execute(array(NULL, $id));


if ($sqlP) {
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => 'r', ':action_id' => $id, ':act_time' => $date));
// Send Mail to User
$sql = $connect -> query("SELECT i.user_name, u.user_email FROM user u LEFT JOIN user_info i ON u.id_user = i.user_id WHERE user_id = '$id' LIMIT 1");
$getUser = $sql -> fetch(PDO::FETCH_ASSOC);
$name = $getUser['user_name'];
$email = $getUser['user_email'];
$header .= "From:" . $officeGenEmail . PHP_EOL . 'X-Mailer: PHP/' . phpversion();
$recMsg = recoverPass($name, $pword );
$subject = "Your Password has been reset.";
$mail = mail($email, $subject, $recMsg, $header);
$response = 200; 
}else{
$response = 0;   
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Delete User')) {
$id = $_GET['clickedID'];
$id = intval($id);


$sql = $connect -> prepare("UPDATE user SET user_status = ? WHERE id_user = ? LIMIT 1");
$sql -> execute(array('d', $id));

if ($sql) {
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => 't', ':action_id' => $id, ':act_time' => $date));
$response = 200; 
}else{
$response = 0;   
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Testimony')) {
$testName = $_GET['testName'];
$testChannel = $_GET['testChannel'];
$testimony = $_GET['testimony'];
$testStat = $_GET['testStat'];

if (empty($testName)) {
$response = 0;
}else if (empty($testChannel)) {
$response = 1;
}else if (empty($testimony)) {
$response = 2;
}else{
if ($testStat === 'new') {
$sqlTest = $connect -> prepare("INSERT INTO testimonials (test_name, test_content, test_date, test_who, test_channel) VALUES (:test_name, :test_content, :test_date, :test_who, :test_channel)");
$sqlTest -> execute(array(':test_name' => $testName, ':test_content' => $testimony, ':test_date' => $date, ':test_who' => $userID, ':test_channel' => $testChannel));  
}else {
$sqlTest = $connect -> prepare("UPDATE testimonials SET test_name = ?, test_content = ?, test_channel = ?  WHERE test_id = ? LIMIT 1");
$sqlTest -> execute(array($testName, $testimony, $testChannel, $testStat));
}
if(!$sqlTest) {
$response = 3;
} else{
$response = 200;
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Delete Testimony')) {
$testID = $_GET['clickedID'];
$sqlTest = $connect -> prepare("UPDATE testimonials SET status = ? WHERE test_id = ? LIMIT 1");
$sqlTest -> execute(array('d', $testID));
if(!$sqlTest) {
$response = 0;
} else{
$response = 200;
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Send Price')) {
$quotedPrice = $_GET['quotedPrice'];
$dealedPrice = $_GET['dealedPrice'];
$id = $_GET['id'];
$chosenPrice = $_GET['chosenPrice'];
$transaction_client = $_GET['tClient'];

if (($chosenPrice === 'Quote') && (empty($quotedPrice))) {
$response = 0;
}else if (($chosenPrice === 'Deal') && (empty($dealedPrice))) {
$response = 1;
}else{ 
if ($chosenPrice === 'Quote') {
$sql = $connect -> prepare("INSERT INTO transactions (quote_price, quote_date, quote_who, quote_id, transaction_client) VALUES(:quote_price, :quote_date, :quote_who, :quote_id, :transaction_client)");
$sql -> execute(array(':quote_price' => $quotedPrice, ':quote_date' => $date, ':quote_who' => $userID, ':quote_id' => $id, ':transaction_client' => $transaction_client)); 
$logType = 'q';
}else if ($chosenPrice === 'Deal') {
$sql = $connect -> prepare("UPDATE transactions SET deal_price = ?, deal_date = ?, deal_who = ?, transaction_client = ? WHERE quote_id = ? LIMIT 1");
$sql -> execute(array($dealedPrice, $date, $userID, $transaction_client, $id));
$logType = 'd';
}
if ($sql) {
$sqlUpl = $connect -> prepare("UPDATE quotation SET quote_status = ? WHERE quotation_id = ? LIMIT 1");
$sqlUpl -> execute(array($logType, $id)); 
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => $logType, ':action_id' => $id, ':act_time' => $date));
$sql = $connet -> query("SELECT car_brand, car_year, car_model, contact_name, contact_email FROM quotation WHERE quotation_id = '$id'");
$getCar = $sql -> fetch(PDO::FETCH_ASSOC);
$car_brand = $getCar['car_brand'];
$car_year = $getCar['car_year'];
$car_model = $getCar['car_model'];
$contact_name = $getCar['contact_name'];
$contact_email = $getCar['contact_email'];	
$header .= "From:" . $quoteEmail . PHP_EOL .	"CC: thelucipost@gmail.com" .PHP_EOL. 'X-Mailer: PHP/' . phpversion();
$quoteMsg = sendQuotePrice($contact_name, $car_brand, $car_model, $car_year, $quotedPrice);
$subject = "Quotation for your Car is ready";
$mail = mail($contact_email, $subject, $quoteMsg, $header);
$response = 200; 
}else{
$response = 2;   
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Delete Quote')) {
$quoteID = $_GET['id'];
$sqlD = $connect -> prepare("UPDATE quotation SET quote_status = ? WHERE quotation_id = ? LIMIT 1");
$sqlD -> execute(array('r', $quoteID));
if(!$sqlD) {
$response = 0;
} else{
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => 'c', ':action_id' => $quoteID, ':act_time' => $date));    
$response = 200;
}
echo json_encode($logType);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Save New Quote')) {
$car_year = $_GET['car_year'];
$car_brand = $_GET['car_brand'];
$car_model = $_GET['car_model'];
$car_location = $_GET['car_location'];
$car_title = $_GET['car_title'];
$carFlatTires = $_GET['carFlatTires'];
$car_wheel = $_GET['car_wheel'];
$car_key = $_GET['car_key'];
$car_drive = $_GET['car_drive'];
$car_engine = $_GET['car_engine'];
$car_ext = $_GET['car_ext'];
$car_int = $_GET['car_int'];
$car_body = $_GET['car_body'];
$car_mirror = $_GET['car_mirror'];
$carMileage = $_GET['carMileage'];
$contactName = $_GET['contactName'];
$contactEmail = $_GET['contactEmail'];
$contactPhone = $_GET['contactPhone'];
$contactZip = $_GET['contactZip'];
$carQty = $_GET['carQty'];
$car_tires = $_GET['car_tires'];
$car_flood = $_GET['car_flood'];

function checkArray($arr){
if (is_array($arr)) {
   $arr = array_filter($arr);
$arr = implode(", ", $arr);
}
return $arr;
}

$carFlatTires = checkArray($carFlatTires);
$car_wheel = checkArray($car_wheel);
$car_ext = checkArray($car_ext);
$car_body = checkArray($car_body);
$car_mirror = checkArray($car_mirror);



if (empty($car_year)) {
$response = 0;
}else if (empty($car_brand)) {
$response = 1;
}else if (empty($car_model)) {
$response = 2;
}else if (empty($car_location)) {
$response = 3;
}else if (empty($car_title)) {
$response = 4;
}else if (empty($car_tires)) {
$response = 17;
}else if (empty($carFlatTires)) {
$response = 5;
}else if (empty($car_wheel)) {
$response = 6;
}else if (empty($car_key)) {
$response = 7;
}else if (empty($car_drive)) {
$response = 8;
}else if (empty($car_engine)) {
$response = 9;
}else if (empty($car_ext)) {
$response = 10;
}else if (empty($car_int)) {
$response = 11;
}else if (empty($car_body)) {
$response = 12;
}else if (empty($car_flood)) {
$response = 18;
}else if (empty($car_mirror)) {
$response = 13;
}else if (empty($contactName)) {
$response = 14;
}else if (empty($contactEmail)) {
$response = 15;
}else if (empty($contactPhone)) {
$response = 16;
}else if (empty($carQty)) {
$response = 16;
}else{ 
$sql = $connect -> prepare("INSERT INTO quotation (car_year, car_brand, car_model, car_location, car_title, car_tires, car_flat_tires, car_key, car_wheel, car_engine, car_drive, car_exterior, car_mileage, car_interior, car_body, car_flood, car_mirror, contact_name, contact_email, contact_phone, contact_zip, quote_time, quote_qty, quote_origin) VALUES (:car_year, :car_brand, :car_model, :car_location, :car_title, :car_tires, :car_flat_tires, :car_key, :car_wheel, :car_engine, :car_drive, :car_exterior, :car_mileage, :car_interior, :car_body, :car_flood, :car_mirror, :contact_name, :contact_email, :contact_phone, :contact_zip, :quote_time, :quote_qty, :quote_origin)");
$sql -> execute(array(':car_year' => $car_year, ':car_brand' => $car_brand, ':car_model' => $car_model, ':car_location' => $car_location, ':car_title' => $car_title, ':car_tires' => $car_tires, ':car_flat_tires' => $carFlatTires, ':car_key' => $car_key, ':car_wheel' => $car_wheel, ':car_engine' => $car_engine, ':car_drive' => $car_drive, ':car_exterior' => $car_ext, ':car_mileage' => $carMileage, ':car_interior' => $car_int, ':car_body' => $car_body, ':car_flood' => $car_flood, ':car_mirror' => $car_mirror, ':contact_name' => $contactName, ':contact_email' => $contactEmail, ':contact_phone' => $contactPhone, ':contact_zip' => $contactZip, ':quote_time' => $date,  ':quote_qty' => $carQty, ':quote_origin' => 'p'));
if (!$sql) {
$response = 19;
} else {
$response = 200;
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Edit Image')) {
$imageId = $_GET['imageId'];
$imgCapt = $_GET['imgCapt'];
$imgDesc = $_GET['imgDesc'];

if (empty($imgCapt )) {
$response = 0;
} else if (empty($imgDesc)) {
$response = 1;
}else{
$sqlImage = $connect -> prepare("UPDATE gallery SET image_alt = ?, image_description = ? WHERE image_id = ? LIMIT 1");
$sqlImage -> execute(array($imgCapt, $imgDesc, $imageId));
if(!$sqlImage) {
$response = 2;
} else{
$response = 200;
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Change Password')) {
$pwd = $_GET['pwd1'];

if (empty($pwd)) {
$response = 0;
}else{
$pword = password_hash($pwd, PASSWORD_BCRYPT, $options);
$sqlPass = $connect -> prepare("UPDATE user SET user_password = ? WHERE id_user = ? LIMIT 1");
$sqlPass -> execute(array($pword, $userID));

if ($sqlPass) {
$sqlRe = $connect -> prepare("UPDATE user_recover SET recover = ?, recover_date =? WHERE user_id = ? LIMIT 1");
$sqlRe -> execute(array(NULL, NULL, $userID));
}

if (!$sqlRe) {
$response = 1;
}else{
$sqlLog = $connect -> prepare("INSERT INTO userLog (user, user_action, action_id, act_time) VALUES (:user, :user_action, :action_id, :act_time)");
$sqlLog -> execute(array(':user' => $userID, ':user_action' => 'n', ':action_id' => $userID, ':act_time' => $date));
// destroy session
$response = 200;
}
}
echo json_encode($response);
}if ((isset($_POST['send']) )&& ($_POST['send'] === 'Change Photo')) {
$filename = $_FILES['image']['name'];
$type = substr($filename, strrpos($filename, '.') + 1);
$size = $_FILES['image']['size'];
$tmp_dir = $_FILES['image']['tmp_name'];
$imgExt = strtolower(pathinfo($filename,PATHINFO_EXTENSION)); 
$valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
if (!in_array($imgExt, $valid_extensions)) {
$response = 0;
}else{
$sql = $connect -> query("SELECT user_image FROM user_info WHERE user_id = '$userID'");
$check = $sql -> rowCount();
if ($check > 0) {
$getImage = $sql -> fetch(PDO::FETCH_ASSOC);
$image = $getImage['user_image'];
unlink($uploadDirectory.$image);	
}
$userPix = $userID . '.' . $imgExt;
$upl = move_uploaded_file($tmp_dir,$uploadDirectory.$userPix);	
if (!$upl) {
$response = 1;
}else{
$sql = $connect -> prepare("UPDATE user_info SET user_image = ? WHERE user_id = ?");
$sql -> execute(array($userPix, $userID));
$response = 200;
}
}
echo json_encode($response);
}else if (isset($_GET['send']) && ($_GET['send'] === 'Edit Settings')) {
$caller = $_GET['caller'];
$calling = $_GET['calling'];

$sql = $connect -> query("SELECT * FROM setting WHERE user = '$userID' AND setting_name = '$caller'");
$check = $sql -> rowCount();

if ($check >= 1) {
$sql = $connect -> prepare("UPDATE setting SET settings = ? WHERE user = ? AND setting_name = ?");
$sql -> execute(array($calling, $userID, $caller)); 
}else{
$sql = $connect -> prepare("INSERT INTO setting (user, setting_name, settings) VALUES (:user, :setting_name, :settings)");
$sql -> execute(array(':user' => $userID, ':setting_name' => $caller, ':settings' => $calling));
}
if ($sql) {
$response = 200;
}
echo json_encode($response);
}
$connect = null; 
?>