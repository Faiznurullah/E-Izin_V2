<?php
session_start();

if($_COOKIE["userpassword"]==='')
{
    header("location: login.php");
}
include '../config/koneksi.php';
$password = $_COOKIE["userpassword"];

 ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Siswa</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-envelope"></i>
        </div>
        <div class="sidebar-brand-text mx-3">E-Izin</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-home"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="aturan.php">
          <i class="fas fa-fw fa-book-open"></i>
          <span>Aturan</span></a>
      </li>
  </li>


      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="izin.php">
          <i class="fas fa-fw fa-envelope"></i>
          <span>Izin Siswa</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>



          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Siswa</span>
                <img class="img-profile rounded-circle" src="../img/user.png" alt="Photo">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <div class="card shadow mb-4">
                 <!-- Card Header - Dropdown -->
                 <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
<h6 class="m-0 font-weight-bold text-primary">Izin SIswa:</h6>
                 </div>
                 <!-- Card Body -->
                 <div class="card-body">

                   <form method="post" name="kirim" enctype="multipart/form-data" required>
                   <div class="row ml-5 mb-2 mt-3">
                     <?php
                     $det=mysqli_query($conn, "select * from siswa where nik='$password'");
                     $d=mysqli_fetch_array($det);
                     ?>
                     <!--ini hidden file-->
                     <input class="form-control" type="hidden" value="<?php echo $d['nama']; ?>" name="name" required>
                     <input class="form-control" type="hidden" value="<?php echo $d['kelas']; ?>" name="kelas" required>
                     <input class="form-control" type="hidden" value="<?php echo $d['nik']; ?>" name="nik" required>




                   <div class="col-md-4">

                   <P><b>Pilih File:</b></p>
                   <input class="form-control" type="file"  name="pict" required><br>
                   <P><b>Tanggal:</b></p>
                   <input class="form-control" type="date"  name="tanggal" required>

                   </div>
                   </div>

                   <div class="row ml-5 mb-2 mt-3">

                   <div class="col-md-5">
                   <button type="submit" class="btn btn-info" name='kirim'>Kirim</button>&nbsp;<input type="reset" class="btn btn-danger"  value="Reset">
                   </div>

                   </div>
                   </form>
                   <?php


                   if(isset($_POST['kirim'])){

                     $nama = $_POST['name'];
                     $kelas = $_POST['kelas'];
                     $nik = $_POST['nik'];
                     $tanggal = $_POST['tanggal'];
                     $nama_file = $_FILES['pict']['name'];
                     $ukuran_file = $_FILES['pict']['size'];
                     $source = $_FILES['pict']['tmp_name'];
                     $folder = '../tampung_pdf/';
                     $boleh_eks = array('pdf');
                     $x = explode('.', $nama_file);
                     $ekstensi = strtolower(end($x));





                  if(in_array($ekstensi, $boleh_eks) === true){

                  if($ukuran_file < 3044070){

                       move_uploaded_file($source,$folder.$nama_file);

                       $insert = mysqli_query($conn, "INSERT INTO surat VALUES (
                        NULL,
                        '$nama',
                        '$kelas',
                        '$nik',
                        '$tanggal',
                        '$nama_file'
                          )");


                  if($insert){

                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                       echo "<div class='alert alert-primary mt-4 ml-5' role='alert'>";
                      echo "<p><center>Sukses Kirim Surat</center></p>";
                       echo   "</div>";
                       echo "</div>";


                  }else{
                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                       echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                      echo "<p><center>Gagal Kirim Surat</center></p>";
                       echo   "</div>";
                       echo "</div>";

                  }



                  }else{

                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                       echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                      echo "<p><center>Ukuran File Terlalu Besar</center></p>";
                       echo   "</div>";
                       echo "</div>";


                  }


                  }else{
                    echo "<div class='col-md-10 col-sm-12 col-xs-12 ml-5 mt-5'>";
                       echo "<div class='alert alert-danger mt-4 ml-5' role='alert'>";
                      echo "<p><center>Hanya Boleh File Type Pdf Saja</center></p>";
                       echo   "</div>";
                       echo "</div>";

                  }




                   }

                   ?>

</div>
</div>

        </div>
        <!-- /.container-fluid -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Ingin Keluar ?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih Tombol "Logout" Untuk Keluar Dan Tombol "Cancel" Untuk Membatalkan</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
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

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
