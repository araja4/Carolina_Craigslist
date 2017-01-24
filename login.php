<!DOCTYPE html>
<html lang="en">

   <head>
     <meta charset="utf-8">
     <title>Login</title>
      <link rel="stylesheet" type="text/css" href="firstpage.css" />
   </head>

   <body>

		 <h1><img src="ram.gif" id="logo">Carolina Craigslist</h1>

		 <?php
		 	session_start();
			if(isset($_POST['bttLogin'])){
				require 'connect.php';
				$username = $_POST['username'];
				$password = $_POST['password'];
				$result = mysqli_query($con, 'select * from Users where Username="'.$username.'" and Password="'.$password.'"');
				if(mysqli_num_rows($result)==1){
					$_SESSION['username'] = $username;
					header('Location: home.php');
				}
				else
					echo "Invalid login information. Please re-enter:";
				}
			?>

		<form method="post">
				<table>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td><input type="submit" name="bttLogin" value="Login"></td>
					</tr>
				</table>
		</form>

    <a href="firstpage.php" ><button>Back</button></a>
    
	</body>
</html>
