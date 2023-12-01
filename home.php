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
    <link rel="stylesheet" href="style.css">
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
        <div class="info-card">
            <p>RentSimple</p>
            <h1>Find Your Next Home</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam maiores cupiditate dicta? Repellendus consectetur perferendis alias mollitia exercitationem nesciunt inventore similique! Nesciunt obcaecati labore aliquid commodi est, doloremque in omnis.</p>
            <button class="more-info-button">More Information</button>
        </div>
        <div class="info-image-card">
            
        </div>
    </div>

</body>
</html>