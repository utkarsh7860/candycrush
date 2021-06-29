<?php 

include 'config.php';

session_start();

error_reporting(0);

if (isset($_SESSION['username'])) {
    header("Location: candycrush.php");
}

if (isset($_POST['submit'])) {
	$email = $_POST['email'];
	$password = md5($_POST['password']);
     ;
	$sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
	$sql_query = "SELECT ID FROM users WHERE email ='$email' ";
	$score = mysqli_query($conn, $sql_query);
	// if ($score->num_rows >0) {

	// 	$row = mysqli_fetch_assoc($score);
	// 	$sc = $row['score'];
	// }

	$result = mysqli_query($conn, $sql);
	if ($result->num_rows > 0) {
		$row = mysqli_fetch_assoc($result);
		// $row = mysqli_fetch_assoc($score);
		$_SESSION['username'] = $row['username'];
		/*$score = "SELECT score * FROM users WHERE username='$username' AND password='$password'";*/
		// $_SESSION['usr_score'] = $row['score'];
		header("Location: candycrush.php");
	} else {
		echo "<script>alert('Woops! Email or Password is Wrong.')</script>";
	}

}

?>

<!DOCTYPE html>
<html>
<head>
	

	<link rel="stylesheet" type="text/css" href="style.css">

	<title>Login Form</title>
</head>
<body>
	<div class="container">
		<form action="" method="POST" class="login-email">
			<p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
			<div class="input-group">
				<input type="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
			</div>
			<div class="input-group">
				<input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Login</button>
			</div>
			<p class="login-register-text">Don't have an account? <a href="register.php">Register Here</a>.</p>
		</form>
	</div>
</body>
</html>