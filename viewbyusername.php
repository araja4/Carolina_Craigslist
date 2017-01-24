<!DOCTYPE html>

<?php
    session_start();
    if(!(isset($_SESSION['username']) && !empty($_SESSION['username']))) {
        header("Location: firstpage.php"); /* Redirect browser */
        exit();
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="viewbyusername.css" />
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
    session_start();
    $myusername = $_SESSION['username'];
  ?>

  <h2><?php echo "Posts by: ".$myusername."" ?></h2>

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
    //echo "Connected successfully";

    $sql = "SELECT UserID FROM Users WHERE Username = '".$myusername ."'";

     $result = $conn->query($sql);
     $userid;
     while($row = $result->fetch_assoc()) {
        //echo "id: " . $row["StudentID"]."";
        $userid = $row["UserID"];
      }
      $sql = "SELECT * FROM Posts p WHERE p.UserID =".$userid;
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
         <td id="header"><strong>Category</strong></td>
         <td id="header"><strong>Picture</strong></td>
       </tr>

       <!--
       border-bottom=1px solid #000;
       border-top= 1px solid #000;
       -->

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
         <td>
           <?php
              $picture = $row["Picture"];
              $categoryID = $row["CategoryID"];
              $sql = "SELECT CategoryName FROM Categories WHERE CategoryID = '".$categoryID ."'";
              $category_name;
              $catresult = $conn->query($sql);
              while($row = $catresult->fetch_assoc()) {
                $category_name = $row["CategoryName"];
              }
              echo "" . $category_name."";
            ?>
          </td>
          <td>
            <img id="pic" src="<?php print ("" . $picture."")?>">
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

/*
    <?php while($row = $result->fetch_assoc()): ?>
      <table border="0" cellspacing="3" cellpadding="2">
        <tr>
          <td>
            <strong>Category:</strong> <?php echo $category_name; ?>
          </td>
        </tr>

        <tr>
          <td>
            <strong>Title:</strong> <em><?php echo $title; ?></em>
          </td>
        </tr>

        <tr>
          <td>
            <strong>Description:</strong> <?php echo $description; ?>
          </td>
        </tr>

        <tr>
          <td>
            <strong>Price:</strong> $<?php echo $price; ?>
          </td>
        </tr>

        <tr>
          <td>
            <strong>Phone Numver:</strong> <?php echo $phonenumber; ?>
          </td>
        </tr>
      </table>
      <?php endwhile; ?>

*/


    ?>
  </body>
</html>
