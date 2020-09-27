<?php 
include_once ('config.php');

if( isset($_POST["register"])) {
    
    if(registrasi($_POST) > 0) {
        echo '<script> alert("user baru berhasil mendaftar"); </script>';
    } else{
        echo mysqli_error($koneksi);
    }
}
function registrasi($data) {
	global $koneksi;
	

	$username = strtolower(stripslashes($data["username"]));
	$password = mysqli_real_escape_string($koneksi, $data["password"]);
	$password2 = mysqli_real_escape_string($koneksi, $data["password2"]);

	//cek apakah ada username sudah ada atau belum
	$result = mysqli_query($koneksi, "SELECT username FROM users WHERE  username = '$username'");

	if(mysqli_fetch_assoc($result)) {
		echo '<script> alert("username yang dipilih sudah ada!") </script>';
		return false;
	}

	//cek konfirmasi password
	if($password !== $password2) {
		echo '<script> alert("konfirmasi password tidak sesuai!"); </script>';

		return false;
	}

	//enskripsi password dengan hash
	$password = password_hash($password, PASSWORD_DEFAULT);

	//tambahkan user baru ke database
	mysqli_query($koneksi, "INSERT INTO users VALUES('', '$username', '$password')");

	return mysqli_affected_rows($koneksi);

}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>DAFTAR</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Buat Akun</h3></div>
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-row">
                                            </div>
                                                <div class="form-group"><label class="small mb-1" for="username">Username</label><input class="form-control py-4" type="username" name="username" id="username" placeholder="Masukkan Username" /></div>
                                                <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="password">Password</label><input class="form-control py-4" type="password" name="password" id="password" placeholder="Masukkan Password" /></div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group"><label class="small mb-1" for="password2">Konfirmasi Password</label><input class="form-control py-4" type="password" name="password2" id="password2" placeholder="Konfirmasi Password" /></div>
                                                </div>
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" type="submit" name="register">Buat Akun</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="login.php">Silahkan Login Jika Sudah Punya Akun</a></div>
                                    </div>      
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
<?php 
include 'layout/footer.php';
?>
