<!DOCTYPE html>
<html lang="en">

<head>


  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Siswa Login</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>


<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-2"></div>
              <div class="col-lg-8">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Selamat Datang Siswa</h1>
                  </div>
                  <form  method="post" enctype="multipart/form-data" >
                    <div class="form-group">
                      <input type="text" name='username' class="form-control form-control-user" value="<?php if(isset($_COOKIE["user_login"])) { echo $_COOKIE["user_login"]; } ?>"  id="exampleInputEmail"  placeholder="Nama Kamu..." required>
                    </div>
                    <div class="form-group">
                      <input type="password" name='password' class="form-control form-control-user"  value="<?php if(isset($_COOKIE["userpassword"])) { echo $_COOKIE["userpassword"]; } ?>"  id="exampleInputEmail"  placeholder="Nick Kamu..." required>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name='remember' class="custom-control-input" id="customCheck" <?php if(isset($_COOKIE["user_login"])) { ?> checked <?php } ?> required>
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>

                    <button class="btn btn-primary btn-user btn-block" name="kirim">Masuk Sebagai Siswa</button>
                    <hr>

                  </form>


                </div>
              </div>
              <div class="col-lg-2"></div>
            </div>
            <?php

            include('../config/koneksi.php');
            if(isset($_POST["kirim"]))
            {
            $username= addslashes($_POST['username']);
            $password= addslashes($_POST['password']);
            $sql = "Select * from siswa where nama ='$username' and nik ='$password'";
            	$result = mysqli_query($conn,$sql);
            	$row = mysqli_fetch_array($result);
            	if($row) {
            			$_SESSION["userid"]= $row["id"];

            			if(!empty($_POST["remember"])) {
            				setcookie ("user_login",$_POST["username"],time()+ 3600);
            				setcookie ("userpassword",$_POST["password"],time()+ 3600);
            			} else {
            				if(isset($_COOKIE["user_login"])) {
            					setcookie ("user_login","");
            				}
            				if(isset($_COOKIE["userpassword"])) {
            					setcookie ("userpassword","");
            				}
            			}
            	header('location: index.php');
            	} else {

                echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                   echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                  echo "<p><center>Gagal Masuk Sebagai Siswa</center></p>";
                   echo   "</div>";
                   echo "</div>";



            	}
            }
            ?>

          </div>
        </div>

      </div>


    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>
</html>
