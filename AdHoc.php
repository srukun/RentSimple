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
    <title>Ad Hoc Query</title>
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
            <p>Please enter your query here</p>
        </div>
        <div class="buttons">
            <div>
            <form method="POST" action="">
            <table>
                <tbody><tr>
                <td align="right">
                    <strong>Please enter your query here<br></strong>
                </td>
                <td>
                    <select id="action" name="action">
                    <option value="select">SELECT</option>
                    <option value="insert into">INSERT INTO</option>
                    <option value="update">UPDATE</option>
                    <option value="delete from">DELETE FROM</option>
                    </select>
                    <input size="50" name="query" type="text">
                </td>
                </tr>
                <tr>
                <td align="right">
                    <input value="Clear" type="reset">
                </td>
                <td>
                    <input value="Submit" type="submit">
                </td>
                </tr>
            </tbody></table>
            </form>



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

            
            

            

            $selectAction = $_POST['action'];
            switch($selectAction){
                case 'select':
                    $sqlSelectUsers = "SELECT " . $_POST['query'];
                
                    selectQuery($sqlSelectUsers);
                    break;
                case 'insert into':
                    $sql = "INSERT " . $_POST['query'];
                    if ($conn->query($sql) === TRUE) {
                        echo "New record inserted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    break;
                case 'update':
                    $sql = "UPDATE " . $_POST['query'];
                    if ($conn->query($sql) === TRUE) {
                        echo "Record updated successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    break;
                case 'delete from':
                    $sql = "DELETE FROM " . $_POST['query'];
                    echo "$sql";
                    if (mysqli_query($conn, $sql) === TRUE) {
                        echo "Record deleted successfully";
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                    }
                    break;
                default:

                break;
            }
            function selectQuery($funcQuery){
                global $conn;
                $result = mysqli_query($conn, $funcQuery);
                



                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<table border='1'><tr>";
                
                        $row = mysqli_fetch_assoc($result);
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
            }
            

            $conn->close();
            ?>

            </div>

    </div>
</body>
</html>