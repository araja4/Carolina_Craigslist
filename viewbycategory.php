<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="viewbycategory.css" />
  </head>

  <body>
    <h1><img src="ram.gif" id="logo">Carolina Craigslist</h1>

    <div id="nav">
      <a class="navigation" href="home.html" id="home">Home</a>
      <a class="navigation" href="viewbyusername.php" id="view">My Posts</a>
      <a class="navigation" href="create.html" id="create">Create Posts</a>
      <a class="navigation" href="firstpage.php" id="logout">Logout</a> <!-- end session and send to login page -->
    </div>

    <?php
      $category = $_GET['category'];
    ?>

    <h2><?php echo "".$category."" ?> Posts</h2>

    <?php
      $servername = "classroom.cs.unc.edu";
      $username = "psanka";
      $password = "random123";
      $dbname = "psankadb";

      // Create connection
      $conn = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // echo "Connected successfully";

      $sql = "SELECT CategoryID FROM Categories WHERE CategoryName = '".$category ."'";

      $result = $conn->query($sql);
      $categoryid;
      while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["StudentID"]."";
        $categoryid = $row["CategoryID"];
      }
      $sql = "SELECT * FROM Posts p WHERE p.CategoryID =".$categoryid;
      //echo "I made it here";
      $result = $conn->query($sql);

      if ($result->num_rows > 0):
    ?>

    <table cellspacing="3" cellpadding="10">
      <tr id="head">
        <td id="header"><strong>Title</strong></td>
        <td id="header"><strong>Description</strong></td>
        <td id="header"><strong>Price ($)</strong></td>
        <td id="header"><strong>Phone Number</strong></td>
        <td id="header"><strong>Username</strong></td>
        <td id="header"><strong>Picture</strong></td>
      </tr>

      <?php while($row = $result->fetch_assoc()): ?>

      <tr id="row">
        <td id="title">
          <a href="<?php print ("viewpost.php?id=".$row["PostID"]."")?>"><?php echo "".$row["Title"].""; ?></a>
        </td>
        <td id="description">
          <?php echo "" . $row["Description"].""; ?>
        </td>
        <td id="price">
          <?php echo "" . $row["Price"].""; ?>
        </td>
        <td id="phonenumber">
          <?php echo "" . $row["PhoneNumber"].""; ?>
        </td>
        <td><?php
             $picture = $row["Picture"];
             $userID = $row["UserID"];
             $sql = "SELECT UserName FROM Users WHERE UserID = '".$userID ."'";
             $user_name;
             $userresult = $conn->query($sql);
             while($row = $userresult->fetch_assoc()) {
               $user_name = $row["UserName"];
             }
             echo "" . $user_name.""; ?>
        </td>
        <td>
          <img id="pic" src="<?php echo "" . $picture.""; ?>">
        </td>
      </tr>
      <?php endwhile; ?>
    </table>

    <?php endif;

    // output data of each row
   // while($row = $result->fetch_assoc()) {
     //   echo "title " . $row["Title"]."";

//        $title = $row["Title"];
//        $description = $row["Description"];
//        $price = $row["Price"];
//
//    }
//
//    }


    ?>
  </body>
</html>
