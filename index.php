<?php include('admin/config/connect-db.php'); ?>
<!-- Sweet Alert -->
<script src="sweetalert/sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
<!DOCTYPE html>
<!-- saved from url=(0051)https://getbootstrap.com/docs/5.0/examples/sign-in/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login e-Report KKLP</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="css/logo.png" sizes="16x16" type="image/png">
<link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="css/logo.png">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }
      body{
        background : rgb(174 171 153);
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>
<body class="text-center" >
    
<main class="form-signin">
  <form method="POST" id="formLogin">
    <img class="mb-4" src="css/logo.png" alt="" width="100" height="100">
    <b><h1 class="h3 mb-3 fw-normal" style="color: black;">LOGIN</h1></b>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating mt-3">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
      <label for="floatingPassword">Password</label>
    </div>
    <div class="form-floating mt-3">
      <select name="status" id="" class="form-control mt-3 mb-3">
        <option value=""> -- PILIH -- </option>
        <option value="1">Peserta</option>
        <option value="3">PJ Lapangan</option>
        <option value="2">Admin</option>
      </select>
      <label for="floatinguser">Status</label>
    </div>

    <button class="w-100 btn btn-lg btn-danger text-white" type="submit">Sign in</button>
    <p class="mt-5 mb-3 text-muted" style="color: white;">© 2021</p>
  </form>
  <div class="mt-2 mb-2">Belum Punya Akun ? <a href="#" data-bs-toggle="modal" data-bs-target="#addDataModal">Daftar</a></div>
</main>


    
  

</body></html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- Modal ADD DATA -->
                <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
    
                      <div class="modal-header border-bottom-secondary">
                        <h5 class="modal-title text-gray-900">Daftar</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                          <span >&times;</span>
                        </button>
                      </div>
    
                      <form method="POST" enctype="multipart/form-data" id="formMhs">
                        <div class="modal-body text-gray-900">
                          <h3>Data Peserta</h3>
                          <div class="form-group">
                              <label for="data2">Asal Instansi</label>
                              <select name="id_kklp" id="penempatan" class="form-control show-tick">
                                      <?php  
                                        $qry = mysqli_query($mysqli, "SELECT * FROM tb_kklp WHERE tgl_keluar > date(NOW())");
                                          while($kklp = mysqli_fetch_array($qry)){ ?>
                                      <option value="<?php echo $kklp['id'] ?>"><?php echo $kklp['asal_instansi']." ( ".TanggalIndo($kklp['tgl_masuk'])." - ".TanggalIndo($kklp['tgl_keluar'])." )" ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                          <div class="form-group">
                            <label for="data2">Nomor Induk</label>
                            <input type="hidden" name="id_kklp" value="<?php echo $ID_KKLP; ?>">
                            <input type="text" class="form-control" name="nomor_induk" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Program Studi</label>
                            <input type="text" class="form-control" name="prodi" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Jenis Kelamin</label>
                            <select name="jkel" id="" class="form-control">
                              <option value="L">Laki - Laki</option>
                              <option value="P">perempuan</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="data2">No. HP</label>
                            <input type="text" class="form-control" name="no_hp" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Surel (E-Mail)</label>
                            <input type="text" class="form-control" name="email" required="required">
                          </div>
                          <h3>Akun Peserta</h3>
                          <div class="form-group">
                            <label for="data2">Username</label>
                            <input type="text" class="form-control" name="username" required="required">
                          </div>
                          <div class="form-group">
                            <label for="data2">Password</label>
                            <input type="password" class="form-control" name="password" required="required">
                          </div>
                        </div>
                        <div class="modal-footer border-top-0 d-flex justify-content-center">
                          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                          <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                      </form>
    
                    </div>
                  </div>
                </div>
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
<script src="admin/vendor/jquery/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() { 
  $("#formMhs").submit(function(e) {
      e.preventDefault();
      $.ajax({
          url: 'admin/controller.php?page=peserta-kklp-new&action=insert',
          type: 'post',
          data: $(this).serialize(),             
          success: function(data) {    
            document.getElementById("formMhs").reset();
            $('#addDataModal').modal('toggle');           
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Pendaftaran Anda Sudah Tersimpan',
              text: 'Harap Menunggu Konfirmasi Akun',
              showConfirmButton: true
            });
          }
      });
  });
})

/* $(document).ready(function() { 
  $("#formlogin").submit(function(e) {
      e.preventDefault();
      $.ajax({
          url: 'admin/controller.php?page=data-siswa-new&action=insert',
          type: 'post',
          data: $(this).serialize(),             
          success: function(data) {    
            document.getElementById("formlogin").reset();
            $('#addDataModal').modal('toggle');           
            Swal.fire({
              position: 'center',
              icon: 'success',
              title: 'Pendaftaran Anda Sudah Tersimpan',
              text: 'Harap Menunggu Konfirmasi Akun',
              showConfirmButton: true
            });
          }
      });
  });
}) */

$(document).ready(function() { 
$("#formLogin").submit(function(e) {
var data = $("#formLogin").serialize();
  $.ajax({

        type : 'POST',
        url  : 'proses_login.php',
        data : data,
        success :  function(response){      
          if (response == "error") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Akun Mungkin Belum Terkonfirmasi atau Belum Mendaftar',
              footer: '<button class="btn btn-danger register" onclick="Swal.close()">Belum Mendaftar?</button>'
            });
            
          }else if(response == "error-none") {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Silahkan Pilih Status',
            });
            
          }else{
            var myJson = JSON.parse(response);
            
            Swal.fire({
              icon: 'success',
              type: 'success',
              title: 'Success!',
              text: 'Login Berhasil',
              timer: 1000
            });
            setTimeout(function() {window.location.href = myJson.url;}, 1000);
            /* console.log(myJson);
            alert(myJson.status); */
            
          }
        }/*  */
        });
          return false;
    });
});
</script>