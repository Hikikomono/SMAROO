<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");

    $salt = bin2hex(random_bytes(64));

    $email = trim($_POST['email_input']);
    $userName = trim($_POST['username_input']);
    $password = trim($_POST['password_input']);
    $password .= $salt; //append salt

//TODO hash salted password
   $password = hash("sha256", $password);

// insert user-data into db
    try {
        $stmt = $pdo->prepare("INSERT INTO users (email, username, password, salt) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $userName);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $salt);

        $stmt->execute();


        $pdo = null;
        $stmt = null;

    }catch (Exception $e){
        echo "Exception caught: \n" . $e->getMessage();
    }

    header("Location: ../login.php");

}catch(PDOException $e){
    echo "Error while trying to connect to the DB";
    echo $e->getMessage();
    die();
} /*

//TODO PW Länge, PW match direkt in form lösen

if($data['password_input'] !== $data['password_confirm']){
    die("Passwords don't match!");
}

echo $salt . "\n";
echo "email: " . $email . " pwd: " . $password;
//
*/
?>

