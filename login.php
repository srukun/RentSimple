<?php
session_start();

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
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>
        <div class="navagation-login">
            <p><a href="login.php">Login</a></p>
        </div>
    </div>
    <div class="body-container">
        <div class="info-container">
        </div>
        <div class="login-register-area">
        <form method="POST" action="">
            <div class="container">

                <h1>Login</h1>
                


                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>
                <br>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                <br>

                <button type="submit" class="egister-login-btn">Login</button>
            </div>

            <div class="container signin">
                <p>Don't have an account? <a href="register.php">Sign Up</a>.</p>
            </div>
        </form>
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

            $inputEmail = $_POST['email'];
            $inputPass = $_POST['psw'];

            $sqlQuery = "Select Email, Passkey From Users Where Email = '$inputEmail'";

            $result = mysqli_query($conn, $sqlQuery);

            if($result && strlen($inputEmail) > 0 && strlen($inputPass) > 0){
                if(mysqli_num_rows($result) == 1){

                    $row = mysqli_fetch_assoc($result);

                    $hashedPass = $row['Passkey'];
                    
                    if($inputPass == $hashedPass){
                        
                        $_SESSION['user'] = $row['Email'];
                        header("Location: home.php");
                        exit();
                    }
                    else{
                        echo "Invalid email or password1";
                    }
                }
                else{
                    echo "Invalid email or password";
                }
            }
            elseif(!$result &&  strlen($inputEmail) > 0 && strlen($inputPass) > 0){
                echo "Error: " . mysqli_error($conn);
            }






            mysqli_close($conn);
            ?>

            </div>

    </div>
</body>
</html>