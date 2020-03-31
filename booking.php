<?php
    session_start();
    $username = $_POST["username"] ;
    $entryid = $_POST["entryid"];

    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    header('Content-type: application/json');
    $sql = "INSERT INTO booking(username,entryid,status) VALUES ('$username', '$entryid', 0)";

    if ($conn->query($sql)=== TRUE) {
        echo json_encode(['error'=>'false','msg'=>'your request is send , successfuly']);
    }
    else echo json_encode(['error'=>'true','msg'=>'somthing wrong']);
    

?>