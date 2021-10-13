<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');

if (isset($_GET['call']) && ($_GET['call'] === 'quote')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];

if ($search === 'default') {
$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status FROM quotation WHERE quote_status <> 'r' ORDER BY quotation_id DESC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "contact_name LIKE '%$term%'";
}

}

$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status  FROM quotation WHERE " . implode(' AND ', $searchTermBits) . "ORDER BY quotation_id DESC ");

}else{
if ($search === 'Unread') {
$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status  FROM quotation WHERE quote_status = 'n' ORDER BY quotation_id DESC "); 
}if ($search === 'Read') {
$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status  FROM quotation WHERE quote_status = 'q' OR quote_status = 'd' ORDER BY quotation_id DESC "); 
}else if ($search === 'Online') {
$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status  FROM quotation WHERE quote_origin = 'o' AND quote_status <> 'r' ORDER BY quotation_id DESC "); 
}else if ($search === 'Offline') {
$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status  FROM quotation WHERE quote_origin = 'p' AND quote_status <> 'r' ORDER BY quotation_id DESC "); 
}else{
$sql = $connect -> query("SELECT contact_name, contact_email, contact_phone, car_brand, car_model, car_year, quotation_id, quote_status  FROM quotation WHERE quote_status <> 'r' AND (car_brand LIKE '%$search%' OR car_model LIKE '%$search%' OR contact_name LIKE '%$search%' OR contact_email LIKE '%$search%') ORDER BY quotation_id DESC ");  
}
}
}
try{
$getQuote = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}

echo json_encode($getQuote);
}else if (isset($_GET['call']) && ($_GET['call'] === 'transaction')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];


if ($search === 'default') {
$sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year, t.quote_price, t.deal_price, q.quotation_id FROM transactions t INNER JOIN quotation q ON t.quote_id = q.quotation_id WHERE q.quote_status <> 'r' ORDER BY t.quote_id DESC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "contact_name LIKE '%$term%'";
}

}

$sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year, t.quote_price, t.deal_price, q.quotation_id FROM transactions t INNER JOIN quotation q ON t.quote_id = q.quotation_id WHERE q.quote_status <> 'r' AND"  . implode(' AND ', $searchTermBits) . "ORDER BY t.quote_id DESC ");

}else{
if ($search === 'Deal') {
$sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year, t.quote_price, t.deal_price, q.quotation_id FROM transactions t INNER JOIN quotation q ON t.quote_id = q.quotation_id WHERE q.quote_status <> 'r' AND deal_price <> '' ORDER BY t.quote_id DESC "); 
}else if ($search === 'Open') {
$sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year, t.quote_price, t.deal_price, q.quotation_id FROM transactions t INNER JOIN quotation q ON t.quote_id = q.quotation_id WHERE q.quote_status <> 'r' AND deal_price = '' ORDER BY q.quote_id DESC "); 
}else{
$sql = $connect -> query("SELECT q.contact_name, q.contact_email, q.contact_phone, q.car_brand, q.car_model, q.car_year, t.quote_price, t.deal_price, q.quotation_id FROM transactions t INNER JOIN quotation q ON t.quote_id = q.quotation_id WHERE q.quote_status <> 'r' AND (car_brand LIKE '%$search%' OR car_model LIKE '%$search%' OR contact_name LIKE '%$search%') ORDER BY t.quote_id DESC ");  
}
}
}
try{
$getTrans = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}

echo json_encode($getTrans);
}else if (isset($_GET['call']) && ($_GET['call'] === 'cars')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];


if ($search === 'default') {
$sql = $connect -> query("SELECT car_brand, car_model, car_year, car_remodel_year, car_id FROM cars ORDER BY car_brand ASC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "car_brand LIKE '%$term%'";
}
}
$sql = $connect -> query("SELECT car_brand, car_model, car_year, car_remodel_year, car_id  FROM cars WHERE " . implode(' AND ', $searchTermBits) . "ORDER BY car_brand ASC");

}else{
$sql = $connect -> query("SELECT car_brand, car_model, car_year, car_remodel_year, car_id  FROM cars WHERE (car_brand LIKE '%$search%' OR car_model LIKE '%$search%' OR car_remodel_year LIKE '%$search%') ORDER BY car_brand ASC ");  
}
}
try{
$getCars = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}
echo json_encode($getCars);
}else if (isset($_GET['call']) && ($_GET['call'] === 'testimonials')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];


if ($search === 'default') {
$sql = $connect -> query("SELECT test_name, test_content, DATE_FORMAT(test_date , '%l:%i %p %w, %e%D %M, %Y') AS t_date, test_channel, test_id FROM testimonials ORDER BY test_id DESC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "(test_name LIKE '%$term%') OR (test_content LIKE '%$term%')";
}
}
$sql = $connect -> query("SELECT test_name, test_content, DATE_FORMAT(test_date , '%l:%i %p %w, %e%D %M, %Y') AS t_date, test_channel, test_id FROM testimonials  WHERE " . implode(' AND ', $searchTermBits) . " ORDER BY test_id DESC ");

}else{
$sql = $connect -> query("SELECT test_name, test_content, DATE_FORMAT(test_date , '%l:%i %p %w, %e%D %M, %Y') AS t_date, test_channel, test_id FROM testimonials  WHERE (test_name LIKE '%$search%' OR test_content LIKE '%$search%' OR test_channel LIKE '%$search%') ORDER BY test_id DESC ");  
}
}
try{
$getTest = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}
echo json_encode($getTest);
}else if (isset($_GET['call']) && ($_GET['call'] === 'users')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];


if ($search === 'default') {
$sql = $connect -> query("SELECT i.user_name, i.user_image, u.user_email, u.user_phone, id_user, user_level  FROM user u INNER JOIN user_info i ON i.user_id = u.id_user WHERE u.user_status <> 'd' ORDER BY id_user DESC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "(user_name LIKE '%$term%')";
}
}
$sql = $connect -> query("SELECT i.user_name, i.user_image, u.user_email, u.user_phone, id_user, user_level  FROM user u INNER JOIN user_info i  ON i.user_id = u.id_user WHERE u.user_status <> 'd' AND " . implode(' AND ', $searchTermBits) . " ORDER BY id_user DESC ");

}else{
$sql = $connect -> query("SELECT i.user_name, i.user_image, u.user_email, u.user_phone, id_user, user_level FROM user u INNER JOIN user_info i ON i.user_id = u.id_user WHERE u.user_status <> 'd' AND (user_name LIKE '%$search%' OR user_email LIKE '%$search%' OR user_phone LIKE '%$search%') ORDER BY id_user DESC ");  
}
}
try{
$getTest = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}
echo json_encode($getTest);
}else if (isset($_GET['call']) && ($_GET['call'] === 'gallery')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];


if ($search === 'default') {
$sql = $connect -> query("SELECT image_location, image_alt, image_description, image_id FROM gallery ORDER BY image_id DESC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "(image_alt LIKE '%$term%') OR (image_description LIKE '%$term%')";
}
}
$sql = $connect -> query("SELECT image_location, image_alt, image_description, image_id FROM gallery WHERE " . implode(' AND ', $searchTermBits) . " ORDER BY image_id DESC");

}else{
$sql = $connect -> query("SELECT image_location, image_alt, image_description, image_id FROM gallery WHERE (image_alt LIKE '%$search%' OR image_description ) ORDER BY image_id DESC");  
}
}
try{
$getGallery = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}
echo json_encode($getGallery);
}else if (isset($_GET['call']) && ($_GET['call'] === 'activity')) {
$recordsPerPage = $_GET['recordsPerPage'];
$start = $_GET['start'];
$search = $_GET['search'];


if ($search === 'default') {
$sql = $connect -> query("SELECT i.user_name, l.user_action, l.action_id, DATE_FORMAT(l.act_time , '%l:%i %p %w, %e%D %M, %Y') AS a_time FROM userLog l INNER JOIN user_info i ON i.user_id = l.user ORDER BY l.log_id DESC LIMIT $start, $recordsPerPage");  
}else if ($search !== 'default') {
$newSearch = explode(" ", $search);
if (count($newSearch) > 1) {
$searchTermBits = array();
foreach ($newSearch as $term) {
$term = trim($term);
if (!empty($term)) {
$searchTermBits[] = "(user_name LIKE '%$term%')";
}
}
$sql = $connect -> query("SELECT i.user_name, l.user_action, l.action_id, DATE_FORMAT(l.act_time , '%l:%i %p %w, %e%D %M, %Y') AS a_time FROM userLog l INNER JOIN user_info i ON i.user_id = l.user  WHERE " . implode(' AND ', $searchTermBits) . " ORDER BY log_id DESC ");

}else{
$sql = $connect -> query("SELECT i.user_name, l.user_action, l.action_id, DATE_FORMAT(l.act_time , '%l:%i %p %w, %e%D %M, %Y') AS a_time FROM userLog l INNER JOIN user_info i ON i.user_id = l.user WHERE (user_name LIKE '%$search%' ) ORDER BY log_id DESC ");  
}
}
try{
$getLog = $sql -> fetchAll(PDO::FETCH_ASSOC);
}catch (PDOException $e) {
echo $e->getMessage();
}
echo json_encode($getLog);
}else if (isset($_GET['call']) && ($_GET['call'] === 'logging out')) {
session_unset();
session_destroy();
echo 'bye';
}else if (isset($_GET['call']) && ($_GET['call'] === 'Get Model')) {
$recordsPerPage = $_GET['recordsPerPage'];
$brand = $_GET['brand'];
$sql = $connect -> query("SELECT DISTINCT car_model FROM cars WHERE car_brand = '$brand' ");
try{
    $getModel = $sql -> fetchAll(PDO::FETCH_ASSOC);
    }catch (PDOException $e) {
    echo $e->getMessage();
    }
    echo json_encode($getModel);
}else{
die();
}

$connect = null; 
?>