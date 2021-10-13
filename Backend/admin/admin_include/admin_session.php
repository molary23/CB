<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/functions/function.php');


$expireAfter = 20160;

if(isset($_SESSION['last_action'])){

$secondsInactive = time() - $_SESSION['last_action'];

$expireAfterSeconds = $expireAfter * 60;

if($secondsInactive >= $expireAfterSeconds){
session_unset();
session_destroy();
// Will ask then log out via JS
}
}
$_SESSION['last_action'] = time();

if (isset($_SESSION['id_user']) && (isset($_SESSION['ad'])) && ($_SESSION['ad'] === 'M')) {
$user_id = $_SESSION['id_user'];
$sql = $connect -> query("SELECT i.user_name, i.user_image, u.user_level, u.user_email,u.user_password, u.user_phone FROM user_info i INNER JOIN user u ON i.user_id = u.id_user WHERE user_id = '$user_id' LIMIT 1");
$stmt = $connect -> query("SELECT * FROM quotation WHERE quote_status = 'n' ");  
$sql6 = $connect -> query("SELECT * FROM quotation WHERE quote_status <> 'r'");
$sql1 = $connect -> query("SELECT * FROM transactions");
$sql2 = $connect -> query("SELECT * FROM user WHERE user_status != 'd'");
$sql3 = $connect -> query("SELECT * FROM testimonials");
$sql4 = $connect -> query("SELECT * FROM gallery");
$sqlC = $connect -> query("SELECT *FROM cars");
$sql5 = $connect -> query("SELECT * FROM transactions WHERE transaction_client = 'n' ");
$carSql = $connect -> query("SELECT DISTINCT car_brand FROM cars ORDER BY car_brand ASC "); 
$carSql2 = $connect -> query("SELECT DISTINCT car_model FROM cars ORDER BY car_brand ASC "); 
$actSQL = $connect -> query("SELECT * FROM userLog"); 
try{
$getUser = $sql -> fetch(PDO::FETCH_ASSOC);
$name = ucwords($getUser['user_name']);
$image = $getUser['user_image'];    
$level = $getUser['user_level']; 
$email = $getUser['user_email'];    
$phone = $getUser['user_phone']; 
$pwd = $getUser['user_password']; 

$cQ = $sql6 -> rowCount();
$cT = $sql1 -> rowCount();
$cU = $sql2 -> rowCount();
$cTe = $sql3 -> rowCount();
$cG = $sql4 -> rowCount();
$cC = $sqlC -> rowCount();
$cL = $actSQL -> rowCount();
$counted = $stmt -> rowCount();
$getCars = $carSql -> fetchAll(PDO::FETCH_ASSOC);
$getCars2 = $carSql2 -> fetchAll(PDO::FETCH_ASSOC);
$client = $sql5 -> rowCount();
/*
$cT = $getT['tCount'];
$cQ = $getQ['qCount'] ;
$cU = $getU['uCount']  ;
$cTe = $getTe['teCount'] ;
$cG = $getG['gCount'];
$cC = $getC['cCount'];
$cL = $getL['lCount'];
//$client = $getClient['clientCount'];*/

$counted = reduceNumber($counted);
$countT = reduceNumber($cT);
$countQ = reduceNumber($cQ);
$countU = reduceNumber($cU);
$countTe = reduceNumber($cTe);
$countG = reduceNumber($cG);
$countC = reduceNumber($cC);
$countClient = reduceNumber($client);

}catch (PDOException $e) {
echo $e->getMessage();
}

$changePass = 0;
if (empty($pwd)) {
$changePass = 1;
}
$theme = 'd'; $intro = 0;
$sqlSetting = $connect -> query("SELECT * FROM setting WHERE user = '$user_id' ");
$checkS = $sqlSetting -> rowCount();
if ($checkS >= 1) {
$getS = $sqlSetting -> fetchAll(PDO::FETCH_ASSOC);
foreach ($getS as $setArr) {
    $settingName[] = $setArr['setting_name'];
    $settings[] = $setArr['settings'];
  }
  $t_pos = array_search('t', $settingName);
  $i_pos = array_search('i', $settingName);
  if (is_numeric($t_pos)) {
    $theme = $settings[$t_pos];
  }
  if (is_numeric($i_pos)) {
    $intro = $settings[$i_pos];
  }
}



$imgDir = '//localhost/fljc/upload/users/';
}else{
    session_unset();
    session_destroy();
    header("location: //localhost/fljc/login.php");
    exit;
}



?>