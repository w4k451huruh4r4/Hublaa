<?php 
header('Content-Type: application/json');
$email = $_GET['email'];
$password = $_GET['password'];
if(empty($email)) {
$error = array("error_code"=>100, "error_msg"=>"The parameter email is required (100)");
echo json_encode($error, JSON_PRETTY_PRINT);
} elseif(empty($password)) {
$error = array("error_code"=>100, "error_msg"=>"The parameter password is required (100)");
echo json_encode($error, JSON_PRETTY_PRINT);
} elseif(strlen($email) < 4 || strlen($email) > 50 || strlen($password) < 6 ) {
$error = array("error_code"=>100, "error_msg"=>"Invalid email or password (100)");
echo json_encode($error, JSON_PRETTY_PRINT);
} else {
require "function/func_LoginURL1.php";
$generateURL = login_url($email, $password);
$resultURL = json_decode($generateURL, true);
if($resultURL['url']) {
echo $generateURL;
} else {
$error = array("error_code"=>1000, "error_msg"=> array("message"=>"Something went error at (loginURL.php). Please contact administrator. (1000)"));
echo json_encode($error, JSON_PRETTY_PRINT);
}
}
?>