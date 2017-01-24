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
if(isset($_POST['bttCreate'])){
	require 'connect.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if($password==$confirmPassword && $username!="" && $password!=""){
		$result = mysqli_query($con, 'INSERT INTO Users (Username, Password) VALUES ("'.$username.'", "'.$password.'")');
		if($result){
			$_SESSION['username'] = $username;
			header('Location: home.php');
			}
		else
			echo "Database error. Try Again";
	}
	else
		echo "Passwords don't match, or you have not entered data for all of the required entries.";

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
					<td>Confirm Password</td>
					<td><input type="password" name="confirmPassword"></td>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td><input type="submit" name="bttCreate" value="Create Account"></td>
				</tr>
			</table>
		</form>

    <a href="firstpage.php" ><button>Back</button></a>

	</body>
</html>
