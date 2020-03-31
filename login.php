<?php
    session_start();
    $username = $_POST["username"];
    $userpassword = $_POST["password"];
    
    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT username FROM users where username='$username' && password ='$userpassword'";
    $result = $conn->query($sql);

    header('Content-type: application/json');
    if ($result->num_rows > 0) {
        $_SESSION["username"] = $username;
        echo json_encode(['error'=>'false','msg'=>'login successfly']);
    } else {
        echo json_encode(['error'=>'true','msg'=>'user not found']);
    }
    

?>