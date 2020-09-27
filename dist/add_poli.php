<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
    
    include_once ('config.php');
    include 'layout/sidebar.php';
    include 'layout/topmenu.php';
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tambah Poliklinik</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <div class="container-fluid">
        <h1 class="mt-4">Tambah Poliklinik</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data</li>
                <li class="breadcrumb-item"><a href="poli.php">Poliklinik</a></li>
                <li class="breadcrumb-item active">Tambah Poliklinik</li>
            </ol>
    <div class="container" style="margin-top:20px">
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">TAMBAH POLIKLINIK</h3>
    <div class="card-body">
            <?php
                if(isset($_POST['submit'])) {
                $nm_poli = $_POST['nm_poli'];
                $lantai = $_POST['lantai'];
                
                require("config.php");
                
                $result = mysqli_query($koneksi, "INSERT INTO poliklinik(nm_poli,lantai) VALUES('$nm_poli','$lantai')");
                
                if($result){
					echo '<script>alert("Success."); document.location="poli.php";</script>';
				}else{
					echo '<div class="alert alert-warning">Failed.</div>';
				}
			}
		
		?>

        
		
		
		<form action="" method="post">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">NAMA</label>
				<div class="col-sm-10">
					<input type="text" name="nm_poli" class="form-control" size="4" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">LANTAI</label>
				<div class="col-sm-10">
					<input type="text" name="lantai" class="form-control" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">&nbsp;</label>
				<div class="col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="SUBMIT">
				</div>
			</div>
		</form>
		
    </div>
    <div>
	
	<footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; RFRS</div>
                            <div>
                                <div class="text-muted"><b>RESTU FAUZI</b> &middot; <b>183112706450123</b></div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>