<!DOCTYPE html>
<html lang="en">
   <head>
     <meta charset="utf-8">
     <title></title>
      <link rel="stylesheet" type="text/css" href="firstpage.css" />
   </head>
   <body>
     <?php
      session_start();
      session_destroy();
     ?>

     <h1><img src="ram.gif" id="logo">Carolina Craigslist</h1>

     <p>Welcome to Carolina Craigslist, a site geared towards buyers and sellers located in the area surrounding the University of North Carolina at Chapel Hill.<br> On our site, you can post and view items for sale, much like Craigslist.<br>If you have not visited our site before and do not have an account with us, please create an account by clicking the button below.<br> Otherwise, please login. We hope you will enjoy our site.<p>

     <a href="login.php" ><button>Login</button></a>
     <a href="createAccount.php" ><button>Create Account</button></a>

   </body>
</html>
