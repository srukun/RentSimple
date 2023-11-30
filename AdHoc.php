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
            <p>Ad Hoc Query</p>
        </div>
        <div class="navagation-menu">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="relations.php">Relations</a></li>
                <li><a href="Queries.php">Queries</a></li>
                <li><a href="Queries.php">Ad Hoc Query</a></li>
            </ul>
        </div>
        <div class="navagation-login">
            <p>Login</p>
        </div>
    </div>
    <div class="body-container">
        <div class="info-container">
            <p>Click one of the relations to excute SQL query</p>
        </div>
        <div class="buttons">
            <div>
                <a href="Queries.php?action=avg_cost_city"><button >Average Cost Per City</button></a>
                <a href="Queries.php?action=get_review_property"><button >Get Review By Property</button></a>
                <a href="Queries.php?action=get_all_property"><button >Search By Cost</button></a>
            </div>
            <div>
                <a href="Queries.php?action=get_users_two_plus_bookmarks"><button >Search by bookmarks</button></a>
                <a href="Queries.php?action=get_all_bookmarks"><button >All bookmarks</button></a>
                <a href="Queries.php?action=get_properties_not_bookmarked"><button >Properties not bookmarked</button></a>

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