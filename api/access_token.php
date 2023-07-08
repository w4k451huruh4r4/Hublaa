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
$curl = curl_init();
curl_setopt($curl, CURLOPT_HTTPHEADER, array(
'Content-Type: application/json',
));
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_URL, $resultURL['url']);
$result = curl_exec($curl);
if($result) {
$decode = json_decode($result, true);
echo json_encode($decode, JSON_PRETTY_PRINT);
} else {
$error = array("error_code"=>1001, "error_msg"=> array("message"=>"Something went error at (access_token.php). Please contact administrator. (1001)"));
echo json_encode($error, JSON_PRETTY_PRINT);
}
curl_close($curl);
} else {
$error = array("error_code"=>1000, "error_msg"=> array("message"=>"Something went error at (access_token.php). Please contact administrator. (1000)"));
echo json_encode($error, JSON_PRETTY_PRINT);
}
}
?>