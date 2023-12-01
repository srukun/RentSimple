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

                <h1>Register</h1>
                


                <label><b>Email</b></label>
                <input type="text" placeholder="Enter Email" name="email" id="email" required>
                <br>
                <label><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="userN" id="userN" required>
                <br>
                <label><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
                <br>
                <label><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
                <br>
                <label><b>First Name</b></label>
                <input type="text" placeholder="Enter First Name" name="fname" id=fname" required>
                <br>
                <label><b>Last Name</b></label>
                <input type="text" placeholder="Enter Last Name" name="lname" id="lname" required>
                <br>

                <label><b>User Type</b></label>
                <select id="usertype" name="selectUserType">
                    <option value="T">Tenant</option>
                    <option value="L">Landlord</option>
                </select>


                <hr>
                <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
                <button type="submit" class="egister-login-btn">Register</button>
            </div>

            <div class="container signin">
                <p>Already have an account? <a href="login.php">Sign in</a>.</p>
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
            $inputUsername = $_POST['userN'];
            $inputPass = $_POST['psw'];
            $inputRepeatPass = $_POST['psw-repeat'];
            $inputFName = $_POST['fname'];
            $inputLName = $_POST['lname'];
            $inputUserType = $_POST['selectUserType'];


            $sqlCheckIfExist = "Select * From Users Where Email = '$inputEmail'";
            
            $result = mysqli_query($conn, $sqlCheckIfExist);
            $num = mysqli_num_rows($result);


            //$sqlDeleteInfo = "Delete From Users Where Email = '1'";
            // $sqlDeleteInfo2 = "Delete From Users Where Email = 'chicken@farm.com'";
            // $sqlDeleteInfo3 = "Delete From Users Where Email = 'sharrukun2@gmail.com'";
             //mysqli_query($conn, $sqlDeleteInfo);
            // mysqli_query($conn, $sqlDeleteInfo2);
            // mysqli_query($conn, $sqlDeleteInfo3);
            

            if(mysqli_num_rows($result) > 0){
                echo "Account Already Exists";
            }
            elseif(mysqli_num_rows($result) <= 0 && strlen($inputEmail) > 0){
                
                $digits = 11;
                $InputUserID = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
    
                $sqlQuery = "INSERT INTO Users (UserID, Username, Passkey, FirstName, LastName, Email, UserType)
                        VALUES
                        ('$InputUserID', '$inputUsername', '$inputPass', '$inputFName', '$inputLName', '$inputEmail',
                        '$inputUserType')";
                if(mysqli_query($conn, $sqlQuery)){
                    echo "New records inserted succusfully";
                }
                else{
                    echo "Error: " . mysqli_error($conn);
                }
            }
            
            







            $conn->close();
            ?>

            </div>

    </div>
</body>
</html>