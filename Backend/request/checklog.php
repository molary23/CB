<?php 
/*define('AJAX_REQUEST', isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');
if(!AJAX_REQUEST) {die();} */
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/connect/connect.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/fljc/mails/mail.php');

$header  = "MIME-Version: 1.0" . PHP_EOL;
$header .= "Content-type:text/html;charset=UTF-8" . PHP_EOL;

$date = date('Y-m-d H:i:s');
if ((isset($_POST['type'])) && ($_POST['type']  === 'Log In')) {
    $username = $_POST['username'];	
    $password = $_POST['password'];
    
    $sql = $connect -> query("SELECT user_password, id_user FROM user WHERE user_email = '$username' OR user_phone = '$username' AND user_status != 'd' LIMIT 1");
    $count = $sql -> rowCount();
    
    if ($count <= 0) {
        $response = 0;
    }else{
    try{
        $getUser = $sql -> fetch(PDO::FETCH_ASSOC);
        $pass = $getUser['user_password'];
        $userID = $getUser['id_user'];
        if (empty($pass)) { 
        $sqlR = $connect -> query("SELECT recover FROM user_recover WHERE user_id = '$userID' LIMIT 1");
            try {
        $getR = $sqlR -> fetch(PDO::FETCH_ASSOC);
        $pwd = $getR['recover'];
        $verify = password_verify($password,$pwd);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
        } else {
            $verify = password_verify($password,$pass);
        }
        
        if (!$verify) {
            $response = 1;
        }else{
        $stmt = $connect -> prepare("INSERT INTO userLog (user, act_time, user_action) VALUES (:user, :login_time, :act)");
        $stmt -> execute(array(':user' => $userID, ':login_time' => $date, ':act' => 'l' ));
        if ($stmt) {
            $_SESSION['id_user'] = $userID;
            $_SESSION['ad'] = 'M';
            $response = 2;
        }
        }
        }catch (PDOException $e) {
        echo $e->getMessage();
        }
    }
    echo json_encode($response);
    }else if ((isset($_POST['type'])) && ($_POST['type']  === 'Password Help')) {
        $username = $_POST['forgot'];
        
        $sql = $connect -> query("SELECT id_user, user_email FROM user WHERE user_email = '$username' OR user_phone = '$username' AND user_status = 'a' LIMIT 1");
        $count = $sql -> rowCount();
        
        if ($count <= 0) {
            $response = 0;
        }else{
        $getID = $sql -> fetch(PDO::FETCH_ASSOC);
        $user_id = $getID['id_user'];
        $user_email = $getID['user_email'];
        $stmt = $connect -> prepare("INSERT INTO userLog (user, act_time, user_action) VALUES (:user, :login_time, :act)");
        $stmt -> execute(array(':user' => $user_id, ':login_time' => $date, ':act' => 'r' ));
            // Send Mail
        $header .= "From:" . $officeGenEmail . PHP_EOL . 'X-Mailer: PHP/' . phpversion();
        $reqMsg = passwordRequest('username');
        $subject = "New Password Reset Request";
        $mail = mail($user_email, $subject, $reqMsg, $header);
            $response = 200;
        }
        echo json_encode($response);
        }else{
            die();
        }
$connect = null;   
?>