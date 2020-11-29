<?php 
	session_start();
	require "koneksi.php";

	if (!isset($_SESSION["login"])) {
		# code...
		echo "<script>
				alert('You must login first !');
				document.location.href = 'login.php';
			</script>";
	}
	
	if (isset($_POST["submit"])) {
		# code...

		if (tambah($_POST)>0) {
			# code...
			echo "
				<script>
					alert('New Club Success Added !');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('New Club Failed to Added !');
					document.location.href = 'tambah.php';
				</script>
			";
		}
	}
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Input Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<h1>Input New Club Premier League 2020</h1>
	<br>
	<center>
	<form action="" method="post">
		<hr>
		<table cellpadding="10px">
			<tr>
				<td>Club Name</td>
				<td><input type="text" name="nama" required="Fill this blank"></td>
			</tr>
			<tr>
				<td>Born</td>
				<td><input type="text" name="tahun" required="Fill this blank"></td>
			</tr>
			<tr>
				<td>Stadium</td>
				<td><input type="text" name="stadion" required="Fill this blank"></td>
			</tr>
			<tr>
				<td>Nickname</td>
				<td><input type="text" name="julukan" required="Fill this blank"></td>
			</tr>
			<tr>
				<td>Logo Name File</td>
				<td><input type="text" name="gambar" required="Fill this blank"></td>
			</tr>
		</table>
		<a href="index.php" class="input">Cancel</a>
		<button type="reset" class="input">Reset</button>
		<button type="submit" name="submit" class="input">Input</button>
		<hr>
	</form>
	</center>
</body>
</html>