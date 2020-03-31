<?php
$view = "<form action=\"http://localhost/reserviation/addEntry.php\" method=\"post\">";
    $view =$view."<div class=\"form-group\">".
                "<input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Entery Name\"  required>".
                "</div>".
                "<div class=\"form-group\">".
                    
                    "<input type=\"number\" class=\"form-control\" name=\"capicty\" placeholder=\"Enter Capicty\" required>".
                "</div>".
                "<div class=\"form-group\">".
                    
                "<input type=\"text\" class=\"form-control\" name=\"phone\" placeholder=\"Enter phone\" required>".
                "</div>".
                "<div class=\"form-group\">".
                    
                "<input type=\"text\" class=\"form-control\" name=\"lat\" placeholder=\"Entery lat\" required>".
                "</div>".
                "<div class=\"form-group\">".
                    
                "<input type=\"text\" class=\"form-control\" name=\"lan\" placeholder=\"Entery lan\" required>".
                "</div>".
                "<button type=\"submit\" class=\"btn btn-outline-primary btn-block\" name=\"submit\">Submit</button>".
            "</form>";
    if(isset($_GET["id"])){
        $servername = "localhost";
        $user = "root";
        $password = null;
        
        
        $conn = new mysqli($servername, $user, $password,"reservation");
        
        // Check connection
        if ($conn->connect_error) {
             die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM entry where id = ".$_GET["id"];
           

        $result = $conn->query($sql);
        
            
        if ($result->num_rows > 0) {
                        
            while($row = $result->fetch_assoc()) {
                $id=$row["id"];
                $view= "<form action=\"http://localhost/reserviation/updateEntry.php\" method=\"post\">";
                $view =$view."<div class=\"form-group\">".
                            "<input type=\"hidden\" name=\"id\" value='$id' />".
                                "<input type=\"text\" class=\"form-control\" name=\"name\" placeholder=\"Entery Name\" value='".$row["name"]."' required>".
                            "</div>".
                            "<div class=\"form-group\">".
                                
                                "<input type=\"number\" class=\"form-control\" name=\"capicty\" placeholder=\"Enter Capicty\" value='".$row["capicty"]. "'required>".
                            "</div>".
                            "<div class=\"form-group\">".
                                
                            "<input type=\"text\" class=\"form-control\" name=\"phone\" placeholder=\"Enter phone\" value='".$row["phone"]. "'required>".
                            "</div>".
                            "<div class=\"form-group\">".
                                
                            "<input type=\"text\" class=\"form-control\" name=\"lat\" placeholder=\"Entery lat\" value='".$row["lat"]. "'required>".
                            "</div>".
                            "<div class=\"form-group\">".
                                
                            "<input type=\"text\" class=\"form-control\" name=\"lan\" placeholder=\"Entery lan\" value='".$row["lan"]. "'required>".
                            "</div>".
                            "<button type=\"submit\" class=\"btn btn-outline-primary btn-block\" name=\"submit\">Submit</button>".
                        "</form>";
            }
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
  <body>
        
    <div class="container-fluid">
        <!-- Grey with black text -->
        <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
            <a class="navbar-brand" href="#">Online Reservation</a>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/reserviation/dashboard.php">Home</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/reserviation/manageEntry.php">Manage Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/reserviation/manageUniversity.php">Manage University</a>
                </li>
                
            </ul>
        </nav>
      </div>
      <div class="row">
      <div class="card" style="margin: auto;margin-top: 2%;">
            
            <div class="card-header">Manage Entry</div>
            <div class="card-body">
                
                    <?php echo $view ?>
            </div>
        </div>
    </div>

    </div>
    
  </body>
</html>