<?php
session_start();
$username_session = $_SESSION['username'];
$email_session = $_SESSION['email'];

//https://stackoverflow.com/questions/5597148/change-some-user-settings-but-not-all-from-a-single-form-php-mysql

$pdo = new PDO("mysql:host=localhost;dbname=smaroo_db", "smaroo", "smaroo");


echo $_POST['image'] . "<br>";

if (!empty($_FILES['image']['name'])){
    echo "start image upload <br>";

        $name = $_FILES['image']['name']; // | 'name' beinhaltet Dateiname auf dem Computer des Benutzers
        $target_dir = "images/";
        $target_file = $target_dir . basename($_FILES['image']['name']);

        echo "Filename: $name <br>";
        echo "target file: $target_file <br>";

        // Select file type
        //pathinfo(path_to_uploaded_file, return_slice_of_path_file)
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        echo "Filetype: " . $imageFileType . "<br>";

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        // Check extension
        if( in_array($imageFileType,$extensions_arr) ) {
            echo "typecheck bestanden <br>";

            // Insert record
            $stmt = $pdo->prepare("UPDATE users
                                            SET image = ?
                                            WHERE email = ?");
           $stmt->bindParam(1, $name);
           $stmt->bindParam(2, $email_session);

            if($stmt->execute()){
                // Upload file
                echo "in upload file <br>";
                move_uploaded_file($_FILES['image']['images'], $target_dir . $name);
            }
        }
}

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
//header("Location: ../profile.php");

?>