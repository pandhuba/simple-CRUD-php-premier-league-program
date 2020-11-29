<?php 
	if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    } 
	$con = mysqli_connect("localhost","root","","premier_league");

	function tampil($query){
		global $con;
		$result = mysqli_query($con, $query);
		$rows = [];

		while ($row=mysqli_fetch_assoc($result)) {
			# code...
			$rows[] = $row;
		}
		return $rows;
	}

	function tambah($data){
		$nama = htmlspecialchars($data["nama"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$stadion = htmlspecialchars($data["stadion"]);
		$julukan = htmlspecialchars($data["julukan"]);
		$gambar = htmlspecialchars($data["gambar"]);

		global $con;
		$query = "INSERT INTO club VALUES 
				('', '$nama', '$tahun', '$stadion', '$julukan', '$gambar')";

		mysqli_query($con, $query);
		return mysqli_affected_rows($con);
	}

	function hapus($id){
		global $con;
		$query = "DELETE FROM club WHERE id=$id";
		mysqli_query($con, $query);

		return mysqli_affected_rows($con);
	}

	function edit($data){
		global $con;

		$id = $data["id"];
		$nama = htmlspecialchars($data["nama"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$stadion = htmlspecialchars($data["stadion"]);
		$julukan = htmlspecialchars($data["julukan"]);
		$gambar = htmlspecialchars($data["gambar"]);

		$query = "UPDATE club SET nama='$nama',tahun='$tahun',stadion='$stadion',julukan='$julukan',gambar='$gambar' WHERE id=$id";
		mysqli_query($con, $query);

		return mysqli_affected_rows($con);
	}

	function cari($keyword){
		global $con;
		$query = "SELECT * FROM club WHERE 
				nama LIKE '%$keyword%' OR
				tahun LIKE '%$keyword%' OR
				stadion LIKE '%$keyword%' OR
				julukan LIKE '%$keyword%' ORDER BY id DESC
				";

		return tampil($query);
	}

	function register($data){
		global $con;

		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($con, $data["password"]);
		$password2 = mysqli_real_escape_string($con, $data["password2"]);

		$result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");
		if (mysqli_fetch_assoc($result)) {
			# code...
			echo "<script>
					alert('Username taken other User !');
				  </script>";

			return false;
		};

		if ($password !== $password2) {
			# code...
			echo "<script>
					alert('Password not match !');
				  </script>";

			return false;
		};

		$password = password_hash($password, PASSWORD_DEFAULT);

		$query = "INSERT INTO user VALUES ('','$username','$password')";
		mysqli_query($con, $query);

		return mysqli_affected_rows($con);
	}

	function login($data){
		global $con;

		$username = $data["username"];
		$password = $data["password"];

		$result = mysqli_query($con, "SELECT * FROM user WHERE username = '$username'");

		if (mysqli_num_rows($result) === 1) {
			# code...
			$row = mysqli_fetch_assoc($result);
			if (password_verify($password, $row["password"])) {
				$_SESSION['login'] = true;
				if (isset($data['remember'])) {
					# code...
					setcookie('id', $row['id'], time()+86400);
					setcookie('key', hash('sha256', $row['username']), time()+86400);
				}
				header("Location: index.php");
				exit;
			} else {
				echo "<script>
						alert('Username or Password is Wrongs !');
					</script>";

				return false;
			}
		} else {
			echo "<script>
					alert('Username or Password is Wrongs !');
				  </script>";

			return false;
		}

	}
?>