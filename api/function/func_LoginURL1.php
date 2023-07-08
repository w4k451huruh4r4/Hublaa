<?php
function login_url($email, $password) {
$query = array(
"api_key" => "882a8490361da98702bf97a021ddc14d",
"credentials_type" => "password",
"email" => $email,
"format" => "JSON",
"generate_machine_id" => "1",
"generate_session_cookies" => "1",
"locale" => "en_US",
"method" => "auth.login",
"password" => $password,
"return_ssl_resources" => "0",
"v" => "1.0"
);
$sig = "";
foreach($query as $key => $value) {
$sig .= "$key=$value";
}
$sig .= "62f8ce9f74b12f84c123cc23437a4a32";
$sig = md5($sig);
$query['sig'] = $sig;
$result = array("url"=>"https://api.facebook.com/restserver.php?" . http_build_query($query) . "&sig=" . $query['sig']);
return json_encode($result, JSON_PRETTY_PRINT);
}
?>