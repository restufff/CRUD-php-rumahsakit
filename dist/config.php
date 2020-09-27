<?php
$koneksi = mysqli_connect("localhost","root","","uts_web");
 
if (mysqli_connect_errno()){
	echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
