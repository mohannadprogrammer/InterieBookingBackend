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
                <li class="nav-item ">
                    <a class="nav-link" href="http://localhost/reserviation/manageEntry.php">Manage Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="http://localhost/reserviation/manageUniversity.php">Manage University</a>
                </li>
                
            </ul>
        </nav>
      </div>
      <div class="row">

    <form action="http://localhost/reserviation/addOrUpdateUni.php" method="get" style='margin-left:90%;margin-top:5%' class="form-inline">
    
        <input type="submit" class="btn btn-success" value="Add"/>
    </form>

    <table class="table" style="margin-left:10%;margin-right=10%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Lat</th>
        <th>Lan</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $servername = "localhost";
            $user = "root";
            $password = null;
        
        
            $conn = new mysqli($servername, $user, $password,"reservation");
        
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM university ";
           

            $result = $conn->query($sql);
        
            
            if ($result->num_rows > 0) {
                $tab = "<tr>";
                while($row = $result->fetch_assoc()) {
                    $id=$row['id'];
                    $tab = $tab."<td>".$row['id']."</td>";
                    $tab = $tab."<td>".$row['name']."</td>";
                    $tab = $tab."<td>".$row['lat']."</td>";
                    $tab = $tab."<td>".$row['lan']."</td>";
                    $tab = $tab."<td style='color:blue'>"."<form method = \"get\" action=\"http://localhost/reserviation/addOrUpdateUni.php\" class=\"form-inline\">".
                        "<input type=\"submit\" class=\"btn btn-primary\" value=\"Edit\" name=\"accept\"/>".
                        "<input type=\"hidden\" name=\"id\" value='$id' /> </form> </td>";
                    $tab = $tab."</tr>";
                }
                echo $tab;
            } else {
                echo "<td>No data avalible</td>";
            }
            
        
        ?>
      
      
    </tbody>
  </table>      
        
    </div>
    
  </body>
</html>