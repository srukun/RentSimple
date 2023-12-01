<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="relationsstyle.css">
</head>
<body>
    <div class="navagation-container">
        <div class="navagation-logo">
            <p>RentSimple</p>
        </div>
        <div class="navagation-menu">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="relations.php">Relations</a></li>
                <li><a href="Queries.php">Queries</a></li>
                <li><a href="AdHoc.php">Ad Hoc Query</a></li>
            </ul>
        </div>
        <div class="navagation-login">
            <a href="logout.php"><p>Logout</p></a>
        </div>
    </div>
    <div class="body-container">
        <div class="info-container">
            <p>Click one of the relations to excute SQL query and list all the tuples in that particular relation.</p>
        </div>
        <div class="buttons">
            <div>
                <a href="relations.php?action=display_users"><button >Users</button></a>
                <a href="relations.php?action=display_tenants"><button >Tenants</button></a>
                <a href="relations.php?action=display_landlords"><button >Landlords</button></a>
            </div>
            <div>
                <a href="relations.php?action=display_property"><button >Property</button></a>
                <a href="relations.php?action=display_reviews"><button >Reviews</button></a>
                <a href="relations.php?action=display_bookmarks"><button >Bookmarks</button></a>

            </div>
        </div>
        <div id="display-area">

            <?php
            $servername = "cssql.seattleu.edu";
            $username = "bd_srukun";
            $password = "AK93IH7Y";
            $database = "bd_srukun";
            
            
            $conn = mysqli_connect($servername, $username, $password, $database);
            
            if (!$conn) {
                die("Connection Failed." .mysqli_connect_error());
            }

            $sqlSelectUsers = "";
            

            

            $action = $_GET['action'];

            switch($action){
                case 'display_users':
                    $sqlSelectUsers = "SELECT * FROM Users Order By FirstName";
                    break;
                case 'display_tenants':
                    $sqlSelectUsers = "SELECT * FROM Tenants";
                    break;
                case 'display_landlords':
                    $sqlSelectUsers = "SELECT * FROM Landlords";
                    break;
                case 'display_property':
                    $sqlSelectUsers = "SELECT * FROM Property";
                    break;
                case 'display_reviews':
                    $sqlSelectUsers = "SELECT * FROM Reviews";
                    break;
                case 'display_bookmarks':
                    $sqlSelectUsers = "SELECT * FROM Bookmark";
                    break;
                default:

                break;
            }
            $result = mysqli_query($conn, $sqlSelectUsers);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1'><tr>";
            
                    
                    $numColumns = mysqli_num_fields($result);
            
                    for ($i = 0; $i < $numColumns; $i++) {
                        $columnName = mysqli_fetch_field_direct($result, $i)->name;
                        echo "<th>$columnName</th>";
                    }

                    echo "</tr>";
            
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        foreach ($row as $columnValue) {
                            echo "<td>$columnValue</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "No records found";
                }
            } else {
                echo "Error executing the query: " . mysqli_error($conn);
            }

            $conn->close();
            ?>

            </div>

    </div>
</body>
</html>