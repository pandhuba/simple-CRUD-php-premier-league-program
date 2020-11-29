<?php 
	session_start();
	require 'koneksi.php';

	if (!isset($_SESSION["login"])) {
		# code...
		echo "<script>
				alert('You must login first !');
				document.location.href = 'login.php';
			</script>";
	}
	
	$id = $_GET["id"];
	if (hapus($id)>0) {
			# code...
			echo "
				<script>
					alert('New Club Success Deleted !');
					document.location.href = 'index.php';
				</script>
			";
		} else {
			echo "
				<script>
					alert('New Club Failed to Deleted !');
					document.location.href = 'index.php';
				</script>
			";
		}
?>