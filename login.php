<?php
	session_start();
	require 'koneksi.php';	

	if (isset($_COOKIE['id'])&&isset($_COOKIE['key'])) {
		$id = $_COOKIE['id'];
		$key = $_COOKIE['key'];

		$result = mysqli_query($con, "SELECT * FROM user WHERE id = $id");
		$row = mysqli_fetch_assoc($result);

		if ($key === hash('sha256', $row['username'])) {
			# code...
			$_SESSION['login'] = true;
		}
	}

	if (isset($_SESSION["login"])) {
		# code...
		echo "<script>
				alert('You already login account !');
				document.location.href = 'index.php';
			</script>";
	}

	if (isset($_POST["submit"])) {
		# code...
		login($_POST);
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<h1>Login Your Account Here</h1>
		<center>
			<form action="" method="post"> 
				<hr>
				<table cellpadding="10px">
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" required="Fill this blank"></td>
					</tr>
					<tr>
						<td>Password</td>
						<td><input type="password" name="password" required="Fill this blank"></td>
					</tr>
				</table>
				<input type="checkbox" name="remember" style="width: 30px;">Remember me ? <br><br>
				<button type="reset" class="input">Reset</button>
				<button type="submit" name="submit" class="input">Login</button>
				<hr>
			</form>
			<a href="register.php">Do you haven't account ?</a>
		</center>
</body>
</html>