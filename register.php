<?php 
	session_start();
	require 'koneksi.php';

	if (isset($_COOKIE['login'])) {
						# code...
		if ($_COOKIE['login'] == 'true') {
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
		if (register($_POST)) {
			# code...
			echo "<script>
					alert('Success Registry !');
					document.location.href = 'login.php'
				  </script>";
		} else {
			echo "<script>
					alert('Registry Failed !')
				  </script>";
		}
	}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<h1>Register Your Account Here</h1>
	<center>
		<form action="" method="post"> 
			<hr>
			<table cellpadding="10px">
				<tr>
					<td>Username</td>
					<td><input type="text" name="username" required="Fill this blank" autocomplete="off"></td>
				</tr>
				<tr>
					<td>Password</td>
					<td><input type="password" name="password" required="Fill this blank" autocomplete="off"></td>
				</tr>
				<tr>
					<td>Repeat Password</td>
					<td><input type="password" name="password2" required="Fill this blank" autocomplete="off"></td>
				</tr>
			</table>
			<button type="reset" class="input">Reset</button>
			<button type="submit" name="submit" class="input">Register</button>
			<hr>
		</form>
		<a href="login.php">Do you have account ?</a>
	</center>
</body>
</html>