<?php
$salt = bin2hex(random_bytes(64));

$email = htmlspecialchars(trim($_POST['email_input']));
$userName =  htmlspecialchars(trim($_POST['username_input']));
$password =  htmlspecialchars(trim($_POST['password_input']));

//TODO Idee mit AJAY, JQUERY und MODAL (Bootstrap) umsetzen
//backend input validity check
if(!($userName < 3 || $password < 5)){
    header("Location: ../register.php");
}

else {
    $password .= $salt; //append salt
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


//TODO hash salted password
        $password = hash("sha256", $password);

// insert user-data into db
        try {
            $stmt = $pdo->prepare("INSERT INTO users (email, username, password, salt) VALUES (?, ?, ?, ?)");
            $stmt->bindParam(1, $email);
            $stmt->bindParam(2, $userName);
            $stmt->bindParam(3, $password);
            $stmt->bindParam(4, $salt);

        } catch (Exception $e) {
            echo "Exception: " . $e->getMessage();
        }

        if($stmt->execute()){
            $pdo = null;
            $stmt = null;
            header("Location: ../login.php");
        }else{
            $pdo = null;
            $stmt = null;
            header("Location: ../register.php");
        }
    } catch (PDOException $e) {
        echo "Error while connecting to Database: $e->getMessage()";
        die();
    }
}
?>

