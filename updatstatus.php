<?php
    $id = $_GET['id'];
    $status = 1;
    if(isset($_GET["reject"]))
        $status = 2;

        $servername = "localhost";
        $user = "root";
        $password = null;
    
    
        $conn = new mysqli($servername, $user, $password,"reservation");
    
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "update booking set status = $status where id=$id";
        $conn->query($sql);
        header("Location: http://localhost/reserviation/dashboard.php");
        
?>