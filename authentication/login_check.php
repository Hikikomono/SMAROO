<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=smaroo", "smaroo", "smaroo");

    $email = trim($_POST['email_input']);
    $password = trim($_POST['password_input']);

// retreive SALT and hashed PW of "email" (DB)

    $stmt = $pdo->prepare("SELECT password, salt, email FROM users WHERE email = (?)");
    $stmt->execute(array($email));

    $row = $stmt->fetch();


// append SALT to password and HASH (sha256) it

    $salt = $row['salt'];
    $password .= $salt;
    $password = hash("sha256", $password);


// compare hashed value from db (con. to email) and entered hashed pw

//https://www.php.net/manual/de/function.password-verify.php
    if ($password == $row['password'] && $email == $row['email']) {
        session_start();
        $_SESSION['sid'] = session_id();


        $pdo = null;
        $stmt = null;

        header("Location: ../index.php");
        exit;
    } else {
        $pdo = null;
        $stmt = null;
        header("Location: ../login.php");
        //header("HTTP/1.0 401 Unauthorized Error ");

        exit;
    }


}catch (PDOException $e){
    echo "Error while connection to DB! \n";
    echo $e->getMessage();
    die();
}
?>