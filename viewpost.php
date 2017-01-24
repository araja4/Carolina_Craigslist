<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="viewpost.css" />
</head>
<body>
  <h1><img src="ram.gif" id="logo">Carolina Craigslist</h1>

  <div id="nav">
    <a class="navigation" href="home.html" id="home">Home</a>
    <a class="navigation" href="viewbyusername.php" id="view">My Posts</a>
    <a class="navigation" href="create.html" id="create">Create Posts</a>
    <a class="navigation" href="firstpage.php" id="logout">Logout</a> <!-- end session and send to login page -->
  </div>

  <?php include 'viewpostbyid.php' ?>

  <img src="<?php echo $picture; ?>" id="postPic" alt="No picture included in post. See item info below.">

  <table border="0" cellspacing="3" cellpadding="2">
<!--
    <tr>
      <td>
        Title
      </td>
      <td>
        Description
      </td>
      <td>
        Price
      </td>
      <td>
        Category
      </td>
      <td>
        Phone Number
      </td>
      <td>
        Username
      </td>
    </tr>
-->
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
        <strong>Contact the seller:</strong> <?php echo $user_name; ?> by phone at <?php echo $phonenumber; ?>
      </td>
    </tr>
  </table>

  </body>
</html>
