<?php

echo "Hello World";
$servername = "cssql.seattleu.edu";
$username = "bd_srukun";
$password = "AK93IH7Y";
$database = "bd_srukun";


$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection Failed." .mysqli_connect_error());
}
echo "Connected successfully";





// $sqlCreateUsers = 
// "CREATE TABLE Users(
//     UserID CHAR(11) PRIMARY KEY,
//     Username VARCHAR(20),
//     Passkey VARCHAR(20),
//     FirstName VARCHAR(20) NOT NULL,
//     LastName VARCHAR(20) NOT NULL,
//     Email VARCHAR(20),
//     UserType CHAR(1)
// )";

// if (mysqli_query($conn, $sqlCreateUsers)) {
//     echo "Tables created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateUsers . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlCreateTenants =
// "CREATE TABLE Tenants(
//     UserID CHAR(11) PRIMARY KEY,
//     FamilySize INT,
//     FOREIGN KEY(UserID) REFERENCES Users(UserID)
// )";
// if (mysqli_query($conn, $sqlCreateTenants)) {
//     echo "Tables created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateTenants . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlCreateLandlords =
// "CREATE TABLE Landlords(
//     UserID CHAR(11) PRIMARY KEY,
//     Emp_ID_Num CHAR(10) NOT NULL,
//     FOREIGN KEY (UserID) REFERENCES Users(UserID)
// )";
// if (mysqli_query($conn, $sqlCreateLandlords)) {
//     echo "Tables created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateLandlords . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlCreateProperty =
// "CREATE TABLE Property(
//     PropertyID CHAR(12) PRIMARY KEY,
//     Cost DECIMAL(8,2),
//     Amenities VARCHAR(50),
//     PetsAllowed CHAR(1),
//     GasAvailable CHAR(1),
//     StreetAddress VARCHAR(50),
//     City VARCHAR(85),
//     ZipCode CHAR(6),
//     NumBeds INT,
//     NumBaths DECIMAL(3, 1),
//     DatePosted DATE,
//     PropertyType VARCHAR(9)
// )";
// if (mysqli_query($conn, $sqlCreateProperty)) {
//     echo "Property table created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateProperty . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlCreateBookmark =
// "CREATE TABLE Bookmark(
//     BookmarkID CHAR(7) PRIMARY  KEY,
//     UserID CHAR(11),
//     PropertyID CHAR(12),
//     FOREIGN KEY (UserID) REFERENCES Users(UserID),
//     FOREIGN KEY (PropertyID) REFERENCES Property(PropertyID)
// )";
// if (mysqli_query($conn, $sqlCreateBookmark)) {
//     echo "Bookmark table created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateBookmark . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlCreateReviews =
// "CREATE TABLE Reviews(
//     ReviewID INT PRIMARY KEY,
//     UserID CHAR(11),
//     PropertyID CHAR(12),
//     ReviewStars INT,
//     ReviewDescription VARCHAR(100),
//     FOREIGN KEY (UserID) REFERENCES Users(UserID),
//     FOREIGN KEY (PropertyID) REFERENCES Property(PropertyID)
// )";
// if (mysqli_query($conn, $sqlCreateReviews)) {
//     echo "Reviews Tables created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateReviews . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlCreateImages =
// "CREATE TABLE Images(
//     ImageID CHAR(12) PRIMARY KEY,
//     ImageName VARCHAR(100),
//     PropertyID CHAR(12),
//     FOREIGN KEY (PropertyID) REFERENCES Property(PropertyID)
// )";
// if (mysqli_query($conn, $sqlCreateImages)) {
//     echo "Images Tables created successfully";
// } else {
//     echo "Error creating table: ".$sqlCreateImages . "<br>";
//     echo mysqli_error($conn);
// }

// $sqlInsertUsers = "INSERT INTO Users (UserID, Username, Passkey, FirstName, LastName, Email, UserType)
// VALUES
//     ('12345678901', 'user1', 'password1', 'John', 'Doe', 'user1@example.com', 'T'),
//     ('98765432109', 'user2', 'password2', 'Jane', 'Smith', 'user2@example.com', 'L'),
//     ('12309876543', 'user3', 'password3', 'Mike', 'Johnson', 'user3@example.com', 'T'),
//     ('87654321098', 'user4', 'password4', 'Emily', 'Williams', 'user4@example.com', 'L'),
//     ('34567890123', 'user5', 'password5', 'David', 'Brown', 'user5@example.com', 'T'),
//     ('65432109876', 'user6', 'password6', 'Linda', 'Taylor', 'user6@example.com', 'L'),
//     ('23456789012', 'user7', 'password7', 'Chris', 'Lee', 'user7@example.com', 'T'),
//     ('76543210987', 'user8', 'password8', 'Maria', 'Wilson', 'user8@example.com', 'L'),
//     ('45678901234', 'user9', 'password9', 'Robert', 'Hall', 'user9@example.com', 'T'),
//     ('54321098765', 'user10', 'password10', 'Sarah', 'Davis', 'user10@example.com', 'L'),
//     ('65432100123', 'user11', 'password11', 'Michael', 'Anderson', 'user11@example.com', 'T'),
//     ('76543200987', 'user12', 'password12', 'Jennifer', 'Evans', 'user12@example.com', 'L'),
//     ('87654340098', 'user13', 'password13', 'William', 'Clark', 'user13@example.com', 'T'),
//     ('98765432019', 'user14', 'password14', 'Laura', 'Thomas', 'user14@example.com', 'L'),
//     ('12345000987', 'user15', 'password15', 'Joseph', 'Moore', 'user15@example.com', 'T'),
//     ('23456780987', 'user16', 'password16', 'Emily', 'Walker', 'user16@example.com', 'L'),
//     ('34560009876', 'user17', 'password17', 'Daniel', 'Harris', 'user17@example.com', 'T'),
//     ('45678098765', 'user18', 'password18', 'Amanda', 'White', 'user18@example.com', 'L'),
//     ('98760000987', 'user19', 'password19', 'Matthew', 'Martin', 'user19@example.com', 'T'),
//     ('65432198076', 'user20', 'password20', 'Olivia', 'Thompson', 'user20@example.com', 'L')";
// if (mysqli_query($conn, $sqlInsertUsers)) {
//     echo "New records created successfully";
// } else {
//     echo "Error: " . $sqlInsertUsers . "<br>" . mysqli_error($conn);
// }

// $sqlInsertTenants = 
// "INSERT INTO Tenants (UserID, FamilySize)
// SELECT UserID, FLOOR(RAND() * 10) + 1 /*wanted to make random family sizes*/
// FROM Users
// WHERE UserType = 'T'";
// if (mysqli_query($conn, $sqlInsertTenants)) {
//     echo "New records created successfully";
// } else {
//     echo "Error: " . $sqlInsertTenants . "<br>" . mysqli_error($conn);
// }

// $sqlInsertLandlords = 
// "INSERT INTO Landlords (UserID, Emp_ID_Num)
// SELECT UserID, CAST(FLOOR(RAND() * 10000000000) AS CHAR(10))
// FROM Users
// WHERE UserType = 'L'";
// if (mysqli_query($conn, $sqlInsertLandlords)) {
//     echo "New landlord records created successfully";
// } else {
//     echo "Error: " . $sqlInsertLandlords . "<br>" . mysqli_error($conn);
// }

// $sqlInsertProperty = 
// "INSERT INTO Property (PropertyID, Cost, Amenities, PetsAllowed, GasAvailable, StreetAddress, City, ZipCode, NumBeds, NumBaths, DatePosted, PropertyType)
// VALUES
//     ('PROP0000001', 1200.00, 'Swimming pool, gym', 'Y', 'N', '123 Main St', 'City1', '123456', 3, 2.5, '2023-11-05', 'House'),
//     ('PROP0000002', 900.00, 'Laundry, parking', 'N', 'Y', '456 Elm St', 'City2', '234567', 2, 1.5, '2023-11-05', 'Apartment'),
//     ('PROP0000003', 1500.00, 'Garage, garden', 'Y', 'Y', '789 Oak St', 'City3', '345678', 4, 3.0, '2023-11-05', 'House'),
//     ('PROP0000004', 800.00, 'Parking', 'N', 'N', '101 Pine St', 'City4', '456789', 1, 1.0, '2023-11-05', 'Apartment'),
//     ('PROP0000005', 1400.00, 'Pool, balcony', 'Y', 'Y', '234 Cedar St', 'City5', '567890', 2, 2.0, '2023-11-05', 'Apartment'),
//     ('PROP0000006', 1100.00, 'Laundry', 'N', 'N', '345 Maple St', 'City6', '678901', 3, 1.5, '2023-11-05', 'Townhouse'),
//     ('PROP0000007', 1600.00, 'Garage, garden', 'Y', 'Y', '456 Birch St', 'City7', '789012', 4, 3.5, '2023-11-05', 'House'),
//     ('PROP0000008', 750.00, 'Parking', 'N', 'N', '567 Oak St', 'City8', '890123', 1, 1.0, '2023-11-05', 'Apartment'),
//     ('PROP0000009', 1300.00, 'Balcony', 'Y', 'N', '678 Walnut St', 'City9', '901234', 2, 2.5, '2023-11-05', 'Townhouse'),
//     ('PROP0000010', 950.00, 'Laundry, parking', 'N', 'Y', '789 Pine St', 'City10', '012345', 2, 1.0, '2023-11-05', 'Townhouse')";
// if (mysqli_query($conn, $sqlInsertProperty)) {
//     echo "New property records created successfully";
// } else {
//     echo "Error: " . $sqlInsertProperty . "<br>" . mysqli_error($conn);
// }

// /*changed so not all reviews are by same person*/
// $sqlInsertReviews = 
// "INSERT INTO Reviews(ReviewID, UserID, PropertyID, ReviewStars, ReviewDescription)
// VALUES
//     (12345678, '12345678901', 'PROP0000001', 5, 'Lots of natural lighting.'),
//     (98765432, '12345678901', 'PROP0000002', 4, 'Very cozy vibe, but not very spacious.'),
//     (54321098, '12309876543', 'PROP0000003', 5, 'Has many amenities and has gas and pets.'),
//     (87654321, '12309876543', 'PROP0000004', 4, 'Very modern looking, but not many amenities.'),
//     (23456789, '34567890123', 'PROP0000005', 5, 'Has everything. Even a pool.'),
//     (76543210, '34567890123', 'PROP0000006', 3, 'Very mid. But hey we got laundry.'),
//     (34567890, '23456789012', 'PROP0000007', 4, 'Has a nice garage, but there is mold present.'),
//     (65432109, '23456789012', 'PROP0000008', 1, 'Genuinely horrific.'),
//     (98765433, '23456789012', 'PROP0000009', 2, 'The only thing saving this is the balcony.'),
//     (12345677, '65432100123', 'PROP0000010', 5, 'Quiet area, very clean.')";
// if (mysqli_query($conn, $sqlInsertReviews)) {
//     echo "New reviews records created successfully";
// } else {
//     echo "Error: " . $sqlInsertReviews . "<br>" . mysqli_error($conn);
// }

// $sqlInsertBookmark = 
// "INSERT INTO Bookmark (BookmarkID, UserID, PropertyID)
// VALUES
//     (1234567, '12345678901', 'PROP0000001'),
//     (9876543, '12345678901', 'PROP0000003'),
//     (5432109, '12345678901', 'PROP0000005'),
//     (8765432, '12309876543', 'PROP0000001'),
//     (2345678, '12309876543', 'PROP0000002'),
//     (7654321, '34567890123', 'PROP0000004'),
//     (3456789, '34567890123', 'PROP0000003'),
//     (6543210, '23456789012', 'PROP0000005'),
//     (9876544, '23456789012', 'PROP0000002'),
//     (1234568, '23456789012', 'PROP0000010')";
// if (mysqli_query($conn, $sqlInsertBookmark)) {
//     echo "New bookmark records created successfully";
// } else {
//     echo "Error: " . $sqlInsertBookmark . "<br>" . mysqli_error($conn);
// }

// $sqlInsertImages = 
// "INSERT INTO Images (ImageID, ImageName, PropertyID)
// VALUES
//     (123456789012, 'Bedroom1', 'PROP0000001'),
//     (987654321012, 'Bathroom1', 'PROP0000001'),
//     (567890123456, 'Bedroom1', 'PROP0000002'),
//     (210987654321, 'Bathroom2', 'PROP0000002'),
//     (444555666777, 'LivingRoom', 'PROP0000003'),
//     (888999000111, 'FrontofHouse', 'PROP0000004'),
//     (123123123123, 'Kitchen', 'PROP0000004'),
//     (555666777888, 'Bedroom2', 'PROP0000004'),
//     (999000111222, 'Pool', 'PROP0000005'),
//     (777888999000, 'Balcony', 'PROP0000009')";
// if (mysqli_query($conn, $sqlInsertImages)) {
//     echo "New images records created successfully";
// } else {
//     echo "Error: " . $sqlInsertImages . "<br>" . mysqli_error($conn);
// }

echo "test";
// Perform SQL query
$sqlSelectUsers = "SELECT * FROM Users"; // Modify this query as needed
$result = mysqli_query($conn, $sqlSelectUsers);

// Display query results
if (mysqli_num_rows($result) > 0) {
    echo "<table border = '1'>\n";
    // output data of each row
    echo "<tr>\n";
    echo "<th>Course Code</th>\n<th>Course Name</th>\n";
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