<?php
session_start();
$email = htmlspecialchars(trim($_POST['email_input']));
$password = htmlspecialchars(trim($_POST['password_input']));

try {
    $pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");

// retreive SALT and hashed PW of "email" (DB)
    $stmt = $pdo->prepare("SELECT *  FROM users WHERE email = (?)");
    $stmt->execute(array($email));

    if ($stmt->rowCount() == 0) {
        header("Location: ../login.php");

    } else {
        $row = $stmt->fetch();

// append SALT to password and HASH (sha256) it
        $salt = $row['salt'];
        $password .= $salt;
        $password = hash("sha256", $password);


// compare hashed value from db (con. to email) and entered hashed pw
        if ($password == $row['password']) {
            $_SESSION['sid'] = session_id();
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];

            if ($row['image'] != null) {
                $_SESSION['image'] = $row['image'];
            } else {
                $_SESSION['image'] = "img/default_image.png";
            }

            $pdo = null;
            $stmt = null;

            header("Location: ../index.php");
            exit;
        } else {
            $pdo = null;
            $stmt = null;
            session_destroy();
            header("Location: ../login.php");
        }
    }

} catch (PDOException $e) {
    echo "Error while connection to DB!  $e->getMessage();";
}

?>