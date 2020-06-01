<?php
$pdo = new PDO("mysql:host=localhost;dbname=smaroo", "smaroo", "smaroo");

$data = $_POST;

$salt = bin2hex(random_bytes(12)); //wird 256 (>= sha256)
$email = trim($data['email_input']);
$password = trim($data['password_input']);

$password .= $salt; //append salt


//TODO PW Länge, PW match direkt in form lösen
if($data['password_input'] !== $data['password_confirm']){
    die("Passwords don't match!");
}

echo $salt . "\n";
echo "email: " . $email . " pwd: " . $password;
//header("Location: login.php")

?>

