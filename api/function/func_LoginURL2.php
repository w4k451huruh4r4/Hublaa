<?php
function login_url($email, $password) {
$query = array(
"email" => $email,
"format" => "JSON",
"generate_session_cookies" => "1",
"locale" => "en_US",
"password" => $password,
"sdk" => "ios",
"sdk_version" => "2",
"sig" => "3f555f99fb61fcd7aa0c44f58f522ef6",
);
$result = array("url"=>"https://b-api.facebook.com/method/auth.login?access_token=237759909591655%25257C0f140aabedfb65ac27a739ed1a2263b1&" . http_build_query($query));
return json_encode($result, JSON_PRETTY_PRINT);
}
?>