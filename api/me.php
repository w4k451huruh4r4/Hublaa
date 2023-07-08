<?php 
header('Content-Type: application/json');
require "function/func_HublaaAPI.php";
parse_str($_SERVER['QUERY_STRING'], $query);
if($query) {
echo HublaaAPI('/me', 'GET', $query, false);
} else {
$error = array("error"=> array("message"=>"Unsupported request. (100)", "code"=>100));
echo json_encode($error, JSON_PRETTY_PRINT);
}
?>