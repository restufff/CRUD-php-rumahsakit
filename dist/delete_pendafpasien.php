<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include_once ('config.php');
 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM pendaftaran WHERE id='$id'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM pendaftaran WHERE id='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Deleted."); document.location="pendaf_pasien.php";</script>';
		}else{
			echo '<script>alert("Failed."); document.location="pendaf_pasien.php";</script>';
		}
	}else{
		echo '<script>alert("Not Found."); document.location="pendaf_pasien.php";</script>';
	}
}else{
	echo '<script>alert("Not Found."); document.location="pendaf_pasien.php";</script>';
}
 
?>