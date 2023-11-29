<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tenants</title>
    <link rel="stylesheet" href="tablestyle.css">
</head>
<body>
    <div class="navagation-container">
        <div class="navagation-logo">
            <p>RentSimple</p>
        </div>
        <div class="navagation-menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="relations.html">Relations</a></li>
                <li><a href="#">Search</a></li>
            </ul>
        </div>
        <div class="navagation-login">
            <p>Login</p>
        </div>
    </div>
    <div class="body-container">
        <div class="info-container">
            <p>Tenants Table</p>
            <?php 
            $servername = "cssql.seattleu.edu";
            $username = "bd_srukun";
            $password = "AK93IH7Y";
            $database = "bd_srukun";
            
            
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            if (!$conn) {
                die("Connection Failed." .mysqli_connect_error());
            }
                        
            $sqlSelectUsers = "SELECT * FROM Tenants"; // Modify this query as needed
            $result = mysqli_query($conn, $sqlSelectUsers);
            
            // Display query results
            if (mysqli_num_rows($result) > 0) {

                echo "<table border = '1'>\n";
                // output data of each row
                echo "<tr>\n";
                echo "<th>UserID</th>\n<th>Family Size</th>\n";
                echo "</tr>\n";
            
                while($row = mysqli_fetch_row($result)) {
                    echo "<tr>\n";
                    echo "<td>" . $row[0] . "</td>\n" . "<td>". $row[1] . "</td>\n";
                    
                    echo "</tr>\n";
                }
                echo "</table>\n";
            } else {
                echo "0 results";
            }
            mysqli_free_result($result);
            
            if(isset($_GET['action'])){
                $action = $_GET['action'];
                switch ($action){
                    case 'users':
            
                        break;
                    default:
            
                        break;
                }
            }
            
             $conn->close();
            
            
            ?> 
        </div>
        <div class="table">

        </div>
    </div>
    

</body>
</html>