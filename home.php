<?php
    $error = "";
    if(isset($_POST["submit"])){
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
    
        $sql = "SELECT username FROM admin where username='$username' && password ='$userpassword'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $_SESSION["admin"] = $username;
            header("Location: http://localhost/reserviation/dashboard.php");
        } else {
            header("Location: http://localhost/reserviation/home.php?er=user is not found");
        }
    }
    

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="./bootstrap-4.3.1-dist/css/bootstrap.min.css">
    <script src="./bootstrap-4.3.1-dist/js/bootstrap.min.js"></script>
    <script src="./bootstrap-4.3.1-dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .logo {
            max-width: 50px;
            max-height: 50px;
        }
        
    </style>


  </head>
  <body style="background-color: gray;">
        
        <br><br><br><br>
      <div class="row"> 
          
        <div class="card" style="margin: auto;margin-top: 2%;">
            
                <div class="card-header">Admin Login</div>
                <div class="card-body">
                <p style="color:red"><?php if(isset($_GET["er"])){ echo $_GET["er"];}?></p>
                    <form action="http://localhost/reserviation/home.php" method="post">
                        <div class="form-group">
                            
                            <input type="text" class="form-control" name="username" placeholder="Enter your username">
                        </div>
                        <div class="form-group">
                            
                            <input type="password" class="form-control" name="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-outline-primary btn-block" name="submit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
  </body>
</html>