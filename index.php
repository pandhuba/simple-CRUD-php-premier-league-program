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

	$jmlDataperHal = 2;
	$jmlData = count(tampil("SELECT * FROM club"));
	$jmlHal = ceil($jmlData / $jmlDataperHal);
	$halAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
	$dataAwal = ($jmlDataperHal*$halAktif)-$jmlDataperHal;

	$tampil = tampil("SELECT * FROM club ORDER BY id DESC");
	// $tampil = tampil("SELECT * FROM club ORDER BY id DESC LIMIT $dataAwal, $jmlDataperHal");

	if (isset($_POST["search"])) {
		# code...
		$tampil = cari($_POST["keyword"]);

	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
	<h1>Premier League Fighter 2020</h1>
	<br>
	<center>
		
		<form action="" method="post">
			<input id="search" type="text" name="keyword" placeholder="Input Keywords" autocomplete="off" style="border-radius: 10px; font-size: 17px;">
			<button type="submit" name="search" class="input" style="margin-right: 20px;">Search</button> |||
			<a href="tambah.php" class="input" style="margin-left: 20px; margin-right: 20px;">Data Input</a> |||
			<a href="logout.php" class="input" style="margin-left: 20px">Logout</a>
		</form>
	</center>
	<br>
	<div id="container">
	<table class="table">
	  	<thead>
		    <tr>
		      	<th scope="col">NO</th>
		      	<th scope="col">Action</th>
		      	<th scope="col">Club Name</th>
		      	<th scope="col">Born</th>
		      	<th scope="col">Stadium</th>
		      	<th scope="col">Nickname</th>
		      	<th scope="col">Logo</th>
		    </tr>
	  	</thead>
	  	<tbody>
		  	<?php 
		  	$i=1;
		  	foreach ($tampil as $club) { ?>
		    <tr>
		      	<th scope="row"><?php echo $i+$dataAwal; ?></th>
		      	<td>
		      		<a href="edit.php?id=<?php echo $club["id"]; ?>" class="update">Update</a> || 
		      		<a href="hapus.php?id=<?php echo $club["id"]; ?>" class="delete" onclick=" return confirm('Are you sure to delete this club ?')">Delete</a>
		      	</td>
		      	<td><?php echo $club["nama"] ?></td>
		      	<td><?php echo $club["tahun"]; ?></td>
		      	<td><?php echo $club["stadion"] ?></td>
		      	<td><?php echo $club["julukan"] ?></td>
		      	<td><img src="images/<?php echo $club["gambar"]; ?>"></td>
		    </tr>
		    <?php $i++; 
		    } ?>
	  	</tbody>
	</table>
	</div><hr>
	<center>
		<?php if ($halAktif > 1) { ?>
			<a href="?halaman=<?php echo $halAktif-1; ?>" style="font-size: 21px">&laquo</a>
		<?php } ?>
		
		<?php for($i=1;$i<=$jmlHal;$i++) { 
			if ($i == $halAktif) { ?>
				<a href="?halaman=<?php echo $i; ?>"  style="font-size: 30px; color: darkred;"><?= $i ?></a>
			<?php } else { ?>
				<a href="?halaman=<?php echo $i; ?>"  style="font-size: 21px"><?= $i ?></a>
			<?php }; ?>
		<?php }; 
		if ($halAktif < $jmlHal) { ?>
		 	<a href="?halaman=<?php echo $halAktif+1; ?>"  style="font-size: 21px"">&raquo</a>
		 <?php } ?>
		
	</center>
	<br><br><br><br><br><br><br>
</body>

<script type="text/javascript" src="ajax.js"></script>
</html>