<?php
session_start();

if(isset($_SESSION["login"])) {
    header("Location: index.php");
    exit;
}

include_once ('config.php');


if(isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {

        //cek passwordnya
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            
            //set session user
            $_SESSION["login"] = true;

            //redirect user ke halaman utama jika password benar
            header("Location: index.php");
            exit;
        }

    }

    $error = true;

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
        <title>Login</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
    <body class="bg-primary">

    

        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>

                                    <?php if(isset($error)) : ?>
                                        <div class="alert alert-danger" role="alert">
                                             <p class="text-center">Username atau Password salah!</p>
                                        </div>
                                    <?php endif; ?>
                                    
                                    <div class="card-body">
                                        <form action="" method="post">
                                            <div class="form-group"><label class="small mb-1" for="username">Username</label><input class="form-control py-4" type="text" name="username" id="username" placeholder="Masukkan Username" /></div>
                                            <div class="form-group"><label class="small mb-1" for="password">Password</label><input class="form-control py-4" type="password" name="password" id="password" placeholder="Enter password" /></div>
                                            <div class="text-center"><button class="btn btn-primary" type="submit" name="login">Login</button></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Silahkan Daftar Jika Belum Punya Akun</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
    </body>
</html>
<?php
include 'layout/footer.php';
?>
