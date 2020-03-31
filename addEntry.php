<?php
    $name = $_POST["name"];
    $lat = $_POST["lat"];
    $lan = $_POST["lan"];
    $cap = $_POST["capicty"];
    $phone = $_POST["phone"];
    
    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }


    header('Content-type: application/json');
        $sql = "INSERT INTO entry (name,lat,lan,capicty,phone) VALUES ('$name', '$lat','$lan',$cap,'$phone')";

        if ($conn->query($sql) === TRUE) {
            $jos =json_encode(['error'=>'false','msg'=>'entry saved']);
            echo  "";
        }
        else echo json_encode(['error'=>'true','msg'=>'somthing wrong']);
        header("Location: http://localhost/reserviation/manageEntry.php");
    
    

?>