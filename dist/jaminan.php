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
        <title>JAMINAN PEMBAYARAN</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <div class="container-fluid">
        <h1 class="mt-4">Jaminan Pembayaran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Data</li>
                <li class="breadcrumb-item active">Jaminan Pembayaran</li>
            </ol>
    </div>
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">JAMINAN PEMBAYARAN</h3>
    <div class="card-body">
        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"><a href="add_jaminan.php" class="text-success"><i
                class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                <table class="table table-bordered table-responsive-md table-striped text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">NO</th> 
                            <th class="text-center">INSTANSI PEMBAYARAN</th>
                            <th class="text-center">AKSI</th>
                        </tr>
                        </thead>
                            <tbody>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM jam_pembayaran ORDER BY id DESC") or die(mysqli_error($koneksi));
                            if(mysqli_num_rows($sql) > 0){
                                $no = 1;
                                while($data = mysqli_fetch_assoc($sql)){
                                    echo '
                                    <tr>
                                        <td>'.$no.'</td>
                                        <td>'.$data['nm_pemb'].'</td>
                                        <td>
                                            <a href="edit_jaminan.php?id='.$data['id'].'" class="btn btn-warning btn-rounded btn-sm my-0">EDIT</a>
                                            <a href="delete_jaminan.php?id='.$data['id'].'" class="btn btn-danger btn-rounded btn-sm my-0"onclick="return confirm(\'Are you sure?\')">HAPUS</a>
                                        </td>
                                    </tr>
                                    ';
                                    $no++;
                                }
                            }else{
                                echo '
                                <tr>
                                    <td colspan="6">No Data.</td>
                                </tr>
                                ';
                            }
                            ?>
          
                        </tbody>
                        </table>
                    </div>
                </div>
                </div>
    
</body>
</html>
<?php 
include 'layout/footer.php';
?>