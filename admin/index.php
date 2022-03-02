<?php include('config/connect-db.php'); ?>
<?php include('config/auth.php'); ?>
<?php include('config/base-url.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <link rel="icon" href="../css/logo.png" sizes="16x16" type="image/png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>SISTEM INFORMASI PENERIMAAN KKLP</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for DataTables -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center mt-4" href="index.php">
                <div class="sidebar-brand-icon ">
                    <img src="../css/logo.png" width="50px" style="margin: 20px;">
                </div>
                <div class="sidebar-brand-text"><?php echo $_SESSION['nama']; ?></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>HOME</span></a>
            </li>
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                
            </div>
            
            <?php if ($_SESSION['status'] == 'ADMIN') { ?>

            
            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?page=penerimaan-peserta">
                    <i class="fas fa-fw fa-users"></i>
                    <span>PENERIMAAN KKLP</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=peserta-nonaktif">
                    <i class="fas fa-fw fa-toggle-off"></i>
                    <span>PESERTA SELESAI</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pinjam"
                    aria-expanded="true" aria-controls="pinjam">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>KELOLA REFERENSI</span>
                </a>
          
                    
                <div id="pinjam" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=penempatan">PENEMPATAN</a>
                        <a class="collapse-item" href="?page=penanggung-jawab">PENANGGUNG JAWAB</a>
                    </div>
            </li>

            <!-- Session User -->
            <?php  }elseif ($_SESSION['status'] == 'USER') { ?>
                
                <li class="nav-item">
                    <a class="nav-link" href="?page=profil">
                        <i class="fas fa-fw fa-user"></i>
                        <span>PROFIL</span></a>
                </li>
            
            <?php  }elseif ($_SESSION['status'] == 'PJ') { ?>
                
                <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="?page=peserta-tempat">
                    <i class="fas fa-fw fa-users"></i>
                    <span>PESERTA AKTIF</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?page=peserta-nonaktif-tempat">
                    <i class="fas fa-fw fa-toggle-off"></i>
                    <span>PESERTA SELESAI</span></a>
            </li>
                
                  <?php } ?>
            <!-- Nav Item - Utilities Collapse Menu -->
             

            <li class="nav-item">
                <a class="nav-link" href="config/logout.php">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>LOG OUT</span></a>
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
                

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

            <div class="container-fluid mt-4">
              <?php
              if (empty($_GET["page"])) {
                include "dashboard.php";
              } elseif ($_GET['page'] == 'penerimaan-peserta') {
                include "penerimaan-peserta.php";
              } elseif ($_GET['page'] == 'peserta-kklp') {
                include "peserta_kklp.php";
              } elseif ($_GET['page'] == 'penempatan') {
                include "penempatan.php";
              } elseif ($_GET['page'] == 'penanggung-jawab') {
                include "penanggung-jawab.php";
              } elseif ($_GET['page'] == 'peserta-nonaktif') {
                include "peserta-nonaktif.php";
              } elseif ($_GET['page'] == 'peserta-selesai') {
                include "peserta-selesai.php";
              } elseif ($_GET['page'] == 'laporan-peserta') {
                include "laporan-peserta.php";
              } elseif ($_GET['page'] == 'peserta-tempat') {
                include "peserta-tempat.php";
              } elseif ($_GET['page'] == 'peserta-nonaktif-tempat') {
                include "peserta-nonaktif-tempat.php";
              } elseif ($_GET['page'] == 'peserta-detail-tempat') {
                include "peserta-detail-tempat.php";
              } elseif ($_GET['page'] == 'peserta-selesai-tempat') {
                include "peserta-selesai-tempat.php";
              } elseif ($_GET['page'] == 'profil') {
                include "profil.php";
              }
              ?>
            </div> <!-- /.container-fluid -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>

            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">tinggalkan halaman?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">klik "Logout" jika ingin meninggalkan halaman. </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                            <a class="btn btn-primary" href="login.html">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; 2021 DINAS PENDIDIKAN PROV. SULAWESI SELATAN</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Tooltip -->
    <!-- <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script> -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Select 2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script>
        $(document).ready(function() {
            $("#id_penempatan").change(function() {
                var postForm = {
                        'id': document.getElementById("id_penempatan").value
                };
                $.ajax({
                    type: "post",
                    url: "sub_kode.php",
                    data: postForm,
                    success: function(data) {
                        alert(data);
                        $("#id_penanggung_jawab").html(data);
                    }
                });
            });
        });
    </script>
        
    
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    
<?php 
function TanggalIndo($date){
  $BulanIndo = array( 
                    "Januari", 
                    "Februari", 
                    "Maret", 
                    "April", 
                    "Mei", 
                    "Juni", 
                    "Juli", 
                    "Agustus", 
                    "September", 
                    "Oktober", 
                    "November", 
                    "Desember"
                    );

  $tahun = substr($date, 0, 4);
  $bulan = substr($date, 5, 2);
  $tgl   = substr($date, 8, 2);

  $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;   
  return($result);
} ?>
</html>


<?php include('assets/paginasi/script-paginasi.php'); ?>