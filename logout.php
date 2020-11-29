<?php 
	session_start();

	session_unset();
	session_destroy();

	setcookie('id', '', time()-3600);
	setcookie('key', '', time()-3600);
	echo "<script>
				alert('You are logout now !');
				document.location.href = 'login.php';
			</script>";
 ?>