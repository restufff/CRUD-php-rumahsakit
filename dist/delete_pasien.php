<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

include_once ('config.php');
 
if(isset($_GET['id'])){
	$id = $_GET['id'];
	
	$cek = mysqli_query($koneksi, "SELECT * FROM pasien WHERE id='$id'") or die(mysqli_error($koneksi));
	
	if(mysqli_num_rows($cek) > 0){
		$del = mysqli_query($koneksi, "DELETE FROM pasien WHERE id='$id'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Deleted."); document.location="pasien.php";</script>';
		}else{
			echo '<script>alert("Failed."); document.location="pasien.php";</script>';
		}
	}else{
		echo '<script>alert("Not Found."); document.location="pasien.php";</script>';
	}
}else{
	echo '<script>alert("Not Found."); document.location="pasien.php";</script>';
}
 
?>