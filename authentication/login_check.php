<?php
$email = $_POST['email_input'];
$password = $_POST['password_input'];

//https://www.php.net/manual/de/function.password-verify.php
if($email == 'rob@rob' and $password == '1337')
{
    session_start();
    $_SESSION['sid']=session_id();
    header("location:securepage.php");
    exit;
}
else{
    header("HTTP/1.0 401 Unauthorized Error ");
    http_redirect("login.php");
    exit;
}
?>