<?php
session_start();
$username_session = $_SESSION['username'];
$email_session = $_SESSION['email'];

//https://stackoverflow.com/questions/5597148/change-some-user-settings-but-not-all-from-a-single-form-php-mysql

$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


if (isset($_POST['password_old']) && !empty($_POST['password_old']) && isset($_POST['password_new']) && !empty($_POST['password_new'])){
    //check if entered pw is valid
    echo "in pw if <br>";
    $stmt = $pdo->prepare("SELECT password, salt 
                                    FROM users 
                                    WHERE email = ?");
    $stmt->execute(array($email_session));

    $row = $stmt->fetch();
    $salt = $row['salt'];
    $password_current = $row['password'];
    $password_verify = $_POST['password_old'];


// append SALT to password and HASH (sha256) it
    $password_verify .= $salt;
    $password_verify = hash("sha256",  $password_verify);

    echo "$password_verify <br>";
    echo "$password_current <br>";
    //check if password_old is the same as password in DB
    if ($password_verify == $password_current) {
        echo "in check if entered pw correct <br>";
        //create new salt & append it to new pw & hash result
        $salt = bin2hex(random_bytes(64));
        $password_new = $_POST['password_new'];
        $password_new .= $salt;
        $password_new = hash("sha256",  $password_new);

        //update new PW to db
        $stmt = $pdo->prepare("UPDATE users
                                        SET password = ?, salt = ?
                                        WHERE email = ?");
        $stmt->bindParam(1, $password_new);
        $stmt->bindParam(2, $salt);
        $stmt->bindParam(3, $email_session);

        if($stmt->execute()){
            echo "statement executed";
        }
    }
}

if (isset($_POST['username']) && !empty($_POST['username'])) {

    $stmt = $pdo->prepare(
        "UPDATE users
                       SET username = ?
                       WHERE email = ?");

    $stmt->bindParam(1, $_POST['username']);
    $stmt->bindParam(2, $email_session);

    if ($stmt->execute()) {
        $_SESSION['username'] = $_POST['username'];
    }
}

if (isset($_POST['email']) && !empty($_POST['email'])) {
    //$stmt = null;
    $stmt = $pdo->prepare(
        "UPDATE users
                       SET email = ?
                       WHERE email = ?");

    $stmt->bindParam(1, $_POST['email']);
    $stmt->bindParam(2, $email_session);

    if ($stmt->execute()) {
        $_SESSION['email'] = $_POST['email'];
    }

}

else {
    //error dass keine variablen gesetzt sind => redirect profile.php
}

//redirect to profile.php
header("Location: ../profile.php");

?>