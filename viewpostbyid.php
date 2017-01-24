<?php
$id = $_GET['id'];
$servername = "classroom.cs.unc.edu";
$username = "psanka";
$password = "random123";
$dbname = "psankadb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

 $sql = "SELECT * FROM Posts p WHERE p.PostID = ".$id."";
    //echo "I made it here";

     $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        // echo "id: " . $row["Title"]."";
        $title = $row["Title"];
        $description = $row["Description"];
        $price = $row["Price"];
        $phonenumber = $row["PhoneNumber"];
        $userID = $row["UserID"];
        $categoryID = $row["CategoryID"];
        $picture = $row["Picture"];
    }

     $sql = "SELECT CategoryName FROM Categories WHERE CategoryID = ".$categoryID ."";
    $category_name;
     $catresult = $conn->query($sql);
        while($row = $catresult->fetch_assoc()) {
        $category_name = $row["CategoryName"];
    }

      $sql = "SELECT UserName FROM Users WHERE UserID = '".$userID ."'";
    $user_name;
     $userresult = $conn->query($sql);
        while($row = $userresult->fetch_assoc()) {
        $user_name = $row["UserName"];
    }


    }?>
