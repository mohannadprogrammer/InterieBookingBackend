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
                <li class="nav-item active">
                    <a class="nav-link" href="http://localhost/reserviation/dashboard.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/reserviation/manageEntry.php">Manage Entry</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/reserviation/manageUniversity.php">Manage University</a>
                </li>
                
            </ul>
        </nav>
      </div>
      <div class="row">

    <form action="http://localhost/reserviation/dashboard.php" method="get" style='margin-left:10%;margin-top:5%' class="form-inline">
    <div class="form-group">
        <label for="sel1">filter</label>
    <select class="form-control" id="sel1" name="f">
        <option value = "-1">All</option>
        <option value = "0">Unprocessed</option>
        <option value = "1">Accepted</option>
        <option value = "2">Rejected</option>
    </select>
    <input type="submit" class="btn btn-outline-primary"/>
    </div>
    </form>

    <table class="table" style="margin-left:10%;margin-right=10%">
    <thead>
      <tr>
        <th>Customer</th>
        <th>Entry</th>
        <th>Status</th>
        <th>Operations</th>
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

            $sql = "SELECT u.fullname,e.name,b.status,b.id FROM users u ".
                    "join booking b on (u.username =b.username) ".
                    "join entry e on (b.entryid = e.id)";
           
            if(isset($_GET['f']))
                if($_GET['f'] != "-1"){
                    $f = $_GET['f'];
                    $sql = "SELECT u.fullname,e.name,b.status,b.id FROM users u ".
                            "join booking b on (u.username =b.username) ".
                            "join entry e on (b.entryid = e.id) ".
                            "where b.status = $f";
                }

            $result = $conn->query($sql);
        
            
            if ($result->num_rows > 0) {
                $tab = "<tr>";
                while($row = $result->fetch_assoc()) {
                    $tab = $tab."<td>".$row['fullname']."</td>";
                    $tab = $tab."<td>".$row['name']."</td>";
                    $status = $row["status"];
                    if($status == 0){
                        $id = $row['id'];
                        $tab = $tab."<td style='color:blue'>Unprocessed</td>";
                        $tab = $tab."<td style='color:blue'>"."<form method = \"get\" action=\"http://localhost/reserviation/updatstatus.php\" class=\"form-inline\">".
                            "<input type=\"submit\" class=\"btn btn-success\" value=\"Accept\" name=\"accept\"/>".
                            "<input type=\"hidden\" name=\"id\" value='$id' />".
                            "<input type=\"submit\" class=\"btn btn-danger\" value=\"Reject\" name=\"reject\"/></form></td>";

                    }
                    else if ($status == 1){
                        $tab = $tab."<td style='color:green'>Accepted</td>";
                        $tab = $tab."<td>------</td>";
                    }
                    else{
                         $tab = $tab."<td style='color:red'>Rejected</td>";
                         $tab = $tab."<td>------</td>";
                    }
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