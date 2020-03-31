<?php
    session_start();
    $username = $_SESSION["username"] ;

    $servername = "localhost";
    $user = "root";
    $password = null;


    $conn = new mysqli($servername, $user, $password,"reservation");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT u.lat, u.lan FROM users us join university u on (us.university = u.id) where us.username='$username'";
    $result = $conn->query($sql);

    header('Content-type: application/json');
    $data = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data = $row;
        }
        
        echo json_encode($data);
    } else {
        echo json_encode([]);
    }
    

?>