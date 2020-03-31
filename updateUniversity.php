<?php
    $name = $_POST["name"];
    $lat = $_POST["lat"];
    $lan = $_POST["lan"];
    $id = $_POST["id"];
    
    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    
    $sql = "UPDATE university set name = '$name' ,lat = '$lat' ,lan = '$lan' where id = '$id'";

    echo $sql;
    $conn->query($sql);
    header("Location: http://localhost/reserviation/manageUniversity.php");
        
    
    

?>