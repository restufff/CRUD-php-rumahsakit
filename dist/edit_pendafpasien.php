<?php
session_start();

if(!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}
    
    include_once ('config.php');
    include 'layout/sidebar.php';
    include 'layout/topmenu.php';
    

if(isset($_POST['update']))
{   
    $id = $_POST['id'];

    $nama=$_POST['nama'];
    $nm_pemb=$_POST['nm_pemb'];
    $nm_poli=$_POST['nm_poli'];
    $tgl_kunjungan=$_POST['tgl_kunjungan'];

    
    $result = mysqli_query($koneksi, "UPDATE pendaftaran SET nama='$nama',nm_pemb='$nm_pemb',nm_poli='$nm_poli', tgl_kunjungan='$tgl_kunjungan' WHERE id=$id");

    
    header("Location: pendaf_pasien.php");
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
        <title>Edit Pendaftaran Pasien</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <div class="container-fluid">
        <h1 class="mt-4">Edit Pendaftaran Pasien</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pendaf_pasien.php">Pendaftaran Pasien</a></li>
                <li class="breadcrumb-item active">Tambah Edit Pendaftaran Pasien</li>
            </ol>
            <div class="container" style="margin-top:20px">
            <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">EDIT PENDAFTARAN PASIEN</h3>
    <div class="card-body">

    <form action="add_pendafpasien.php" method="post" name="form1">
    <?php ?>
    <div class="form-group">
    <label for="exampleFormControlSelect1">NAMA</label>
    <select class="form-control" name="nama">
      <option disable selected></option>
      <?php
    while($data = mysqli_fetch_array($result)) {   
        ?>
        <option value="<?=$data['nama']?>"><?=$data['nama']?></option>
    <?php
    }
    ?>
    
    </select>
  </div>


  <form action="add_pendafpasien.php" method="post" name="form1">
    <?php ?>
    <div class="form-group">
    <label for="exampleFormControlSelect1">JAMINAN PEMBAYARAN</label>
    <select class="form-control" name="nm_pemb">
      <option disable selected></option>
      <?php
      
      include_once("config.php");
      
     
      $result = mysqli_query($koneksi, "SELECT * FROM jam_pembayaran ORDER BY id DESC");
      
    while($data = mysqli_fetch_array($result)) {   
        ?>
        <option value="<?=$data['nm_pemb']?>"><?=$data['nm_pemb']?></option>
    <?php
    }
    ?>
    
    </select>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">POLIKLINIK</label>
    <select class="form-control" name="nm_poli">
      <option disable selected></option>
      <?php
      
      include_once("config.php");
      
      
      $result = mysqli_query($koneksi, "SELECT * FROM poliklinik ORDER BY id DESC");
      
    while($data = mysqli_fetch_array($result)) {   
        ?>
        <option value="<?=$data['nm_poli']?>"><?=$data['nm_poli']?></option>
    <?php
    }
    ?>
    
    </select>
  </div>

  <div class="form-group row">
    <label for="tanggal" class="col-sm-2 col-form-label">TANGAL KUNJUNGAN</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" name="tgl_kunjungan">
        </div>
  </div>
  <input class="btn btn-primary" type="submit" name="update" value="UPDATE">
  <a class="btn btn-warning" href="pendaf_pasien.php" role="button">BACK</a>
    </form>
</form>
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