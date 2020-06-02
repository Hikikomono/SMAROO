<?php



    $salt = bin2hex(random_bytes(256));

    $password_1 = "abc";
    $password_1 .= $salt;
    $password_1 = hash("sha256", $password);
    echo $password_1 . "<br>";

    $password_2 = "abc";
    $password_2 .= $salt;
    $password_2 = hash("sha256", $password);
    echo $password_2 . "<br>";



 /*
//TODO PW Länge, PW match direkt in form lösen

if($data['password_input'] !== $data['password_confirm']){
    die("Passwords don't match!");
}

echo $salt . "\n";
echo "email: " . $email . " pwd: " . $password;
//
*/
?>

