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
            <p>Click one of the relations to excute SQL query
            <br>
            Description:
            <br>
            1.Avg cost per city - Gets the average cost of properties grouped by city
            <br>
            2.Get Review By Property - Lists all reviews and the names of users that created them
            <br>
            3.Rated Everyone 3 and under- Gets all properties rated 3 stars and under 
            <br>
            4.Greater than 2 bookmarks - Takes all users that left two or more bookmarks on a property, and returns the PropertyID along with the user who left the bookmark.
            <br>
            5.All Bookmarks - Lists all bookmarks and the names of users that saved them
            <br>
            6.Get Properties Not Bookmarked - Lists all properties that have not been bookmarked by any user.



            </p>
        </div>
        <div class="buttons">
            <div>
                <a href="Queries.php?action=avg_cost_city"><button >Query1</button></a>
                <a href="Queries.php?action=get_review_property"><button >Query2</button></a>
                <a href="Queries.php?action=get_all_property"><button >Query3</button></a>
            </div>
            <div>
                <a href="Queries.php?action=get_users_two_plus_bookmarks"><button >Query4</button></a>
                <a href="Queries.php?action=get_all_bookmarks"><button >Query5</button></a>
                <a href="Queries.php?action=get_properties_not_bookmarked"><button >Query6</button></a>

            </div>
        </div>
        <div id="display-area" class="display-overflow">

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
                case 'avg_cost_city':
                    $sqlSelectUsers = "SELECT City, AVG(Cost) AS AverageCost
                    FROM Property
                    GROUP BY City";
                    break;
                case 'get_review_property':
                    $sqlSelectUsers = "SELECT Reviews.PropertyID, Users.FirstName, Users.LastName, Reviews.ReviewStars, Reviews.ReviewDescription
                    FROM Reviews
                    INNER JOIN Users ON Reviews.UserID = Users.UserID
                    INNER JOIN Property ON Reviews.PropertyID = Property.PropertyID";
                    break;
                case 'get_all_property':
                    $sqlSelectUsers = "SELECT PropertyID from Property
                    WHERE PropertyID in (SELECT PropertyID from Reviews
                    WHERE ReviewStars <= 3)";
                    break;
                case 'get_users_two_plus_bookmarks':
                    $sqlSelectUsers = "SELECT UserID, COUNT(DISTINCT BookmarkID) AS Saved
                    FROM Bookmark
                    GROUP BY UserID
                    HAVING (Saved >= 2)
                    ORDER BY Saved DESC";
                    break;
                case 'get_all_bookmarks':
                    $sqlSelectUsers = "SELECT Bookmark.PropertyID, Users.FirstName, Users.LastName 
                    FROM Bookmark
                    INNER JOIN Property ON Bookmark.PropertyID = Property.PropertyID
                    INNER JOIN Users ON Bookmark.UserID = Users.UserID";
                    break;
                case 'get_properties_not_bookmarked':
                    $sqlSelectUsers = "SELECT Property.PropertyID, Property.StreetAddress
                    FROM Property
                    LEFT JOIN Bookmark ON Property.PropertyID = Bookmark.PropertyID
                    WHERE Bookmark.PropertyID IS NULL";
                    break;
                default:

                break;
            }
            $result = mysqli_query($conn, $sqlSelectUsers);

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

            $conn->close();
            ?>

            </div>

    </div>
</body>
</html>