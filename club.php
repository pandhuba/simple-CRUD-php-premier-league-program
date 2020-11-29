<?php 
	require 'koneksi.php';
	$keyword = $_GET['cari'];
	$query = "SELECT * FROM club WHERE 
				nama LIKE '%$keyword%' OR
				tahun LIKE '%$keyword%' OR
				stadion LIKE '%$keyword%' OR
				julukan LIKE '%$keyword%' ORDER BY id DESC
				";
	$tampil = tampil($query);
 ?>

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
		      	<th scope="row"><?php echo $i; ?></th>
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