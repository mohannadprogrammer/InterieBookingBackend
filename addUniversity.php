<?php
    $name = $_POST["name"];
    $lat = $_POST["lat"];
    $lan = $_POST["lan"];
    
    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    header('Content-type: application/json');
        $sql = "INSERT INTO university (name,lat,lan) VALUES ('$name', '$lat','$lan')";

        if ($conn->query($sql) === TRUE) {
            echo json_encode(['error'=>'false','msg'=>'university saved']);
        }
        else echo json_encode(['error'=>'true','msg'=>'somthing wrong']);
        header("Location: http://localhost/reserviation/manageUniversity.php");
    
    

?>