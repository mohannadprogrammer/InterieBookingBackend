<?php
    $username = $_POST["username"];
    $fulname = $_POST["fullname"];
    $university = $_POST["university"];
    $userpassword = $_POST["password"];
    $email = $_POST["email"];
    

    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT username FROM users where username='$username'";
    $result = $conn->query($sql);

    header('Content-type: application/json');
    if ($result->num_rows > 0) {
        echo "kk";
    } else {
        $sql = "INSERT INTO users VALUES ('$username', '$fulname', '$university','$userpassword','$email')";

        if ($conn->query($sql) === TRUE) {
            echo "تمت العملية";
        }
        else echo "حدث خطا ارجوا المحاوله مرة اخرى ";
    }
    

?>