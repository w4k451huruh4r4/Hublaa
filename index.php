<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Hublaa-Lite</title>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
</head>
<body>
<div name="hublaa-panel" id="hublaa-panel" class="hublaa-panel"></div>
<script>
$(document).ready(function(){
$("#hublaa-panel").html('<div name="hublaa-alert" id="hublaa-alert" class="hublaa-alert" style="display:none"></div><div name="hublaa-login" id="hublaa-login" class="hublaa-login" style="display:none"></div><div name="hublaa-home" id="hublaa-home" class="hublaa-home" style="display:none"></div>');
$("#hublaa-login").html('<input type="text" name="email" id="email" class="email" Placeholder="Email"><input type="password" name="password" id="password" class="password" Placeholder="Password"><button name="login_button" id="login_button" class="login_button">Login via Facebook</button>');
$("#hublaa-home").html('<button name="back_login" id="back_login" class="back_login">Back</button><input type="text" name="access_token" id="access_token" class="access_token"><button name="home_button" id="home_button" class="home_button">Next</button>');
$('#hublaa-login').css({'display':'inline'});
$("#login_button").click(function(){
var email = $("#email").val();
var password = $("#password").val();
$.getJSON("/api/access_token.php?email="+ email +"&password="+ password +"", function(data){
if(data.uid && data.access_token) {
$('#hublaa-login').css({'display':'none'});
$('#hublaa-home').css({'display':'inline'});
alert("ID:"+ data.uid +"\n Access Token:"+ data.access_token);
} else if(data.error_code && data.error_msg) {
$("#hublaa-alert").html('Error Code:'+ data.error_code +'. Error Message:'+ data.error_msg +'');
$('#hublaa-alert').css({'display':'inline'});
setTimeout(function(){
$('#hublaa-alert').css({'display':'none'});
}, 5000);
} else {
alert("Something went error. Please contact administrator.");
}
});
});
});
</script>
</body>
</html>
