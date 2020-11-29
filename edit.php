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
	
	$id = $_GET["id"];
	$tampil = tampil("SELECT * FROM club WHERE id=$id")[0];

	if (isset($_POST["submit"])) {
		# code...

		if (edit($_POST)>0) {
			# code...
			echo "
				<script>
					alert('New Club Success Editted !');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('New Club Failed to Editted !');
					document.location.href = 'index.php';
				</script>
			";
		}
	}
	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<h1>Edit Data Club Premier League 2020</h1>
	<br>
	<center>
	<form action="" method="post">
		<hr>
		<table cellpadding="10px">
			<input type="hidden" name="id" value="<?php echo $tampil["id"]; ?>">
			<tr>
				<td>Club Name</td>
				<td><input type="text" name="nama" required="Fill this blank" value="<?php echo $tampil["nama"]; ?>"></td>
			</tr>
			<tr>
				<td>Born</td>
				<td><input type="text" name="tahun" required="Fill this blank" value="<?php echo $tampil["tahun"]; ?>"></td>
			</tr>
			<tr>
				<td>Stadium</td>
				<td><input type="text" name="stadion" required="Fill this blank" value="<?php echo $tampil["stadion"]; ?>"></td>
			</tr>
			<tr>
				<td>Nickname</td>
				<td><input type="text" name="julukan" required="Fill this blank" value="<?php echo $tampil["julukan"]; ?>"></td>
			</tr>
			<tr>
				<td>Logo Name File</td>
				<td><input type="text" name="gambar" required="Fill this blank" value="<?php echo $tampil["gambar"]; ?>"></td>
			</tr>
		</table>
		<a href="index.php" class="input">Cancel</a>
		<button type="submit" name="submit" class="input">Update</button>
		<hr>
	</form>
	</center>
</body>
</html>