<!-- Begin Page Content -->
<!-- <div class="container-fluid"> -->
<?php
$ID_TEMPAT = $_SESSION['id_penempatan'];

$qry = "SELECT * FROM (
          SELECT a.id AS id_kklp, a.file_name,a.id_penempatan, a.id_penanggung_jawab, a.asal_instansi, a.tgl_masuk, a.tgl_keluar, b.nama_penempatan, c.nama_penanggung_jawab, c.NIP   FROM tb_kklp a
          LEFT JOIN tb_penempatan b ON a.id_penempatan = b.id
          LEFT JOIN tb_penanggung_jawab c ON a.id_penanggung_jawab = c.id
          WHERE a.tgl_keluar <= date(NOW()) AND a.id_penempatan = $ID_TEMPAT ) A";

$orderby = "";

$view = "peserta-tempat";

$column = [
  'value' => ['asal_instansi', 'tgl_masuk', 'tgl_keluar', 'nama_penempatan', 'nama_penanggung_jawab'],
  'label' => ['Asal Instansi', 'Tanggal Masuk', 'Tanggal Keluar', 'Penempatan', 'Penanggung Jawab'],
  'type' => ['text', 'date', 'date', 'text', 'text']
];

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h4 mb-0 text-gray-800 border-bottom">PESERTA SELESAI</h1>
  <!-- ditambahin icon surat di kiri tulisannya -->
  <div>
  </div>
</div>

<!-- DataTables Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    Per Tanggal : <?php echo TanggalIndo(date('Y-m-d')); ?>

  </div>
  <div class="card-body">
    <div class="table-responsive">



      <table class="table table-bordered mt-4 mb-4" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>No</th>
            <th>Asal Instansi</th>
            <th>Tanggal Masuk</th>
            <th>Tanggal Keluar</th>
            <th>Penempatan</th>
            <th>Penanggung Jawab</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $no = 1;

          include('assets/paginasi/main-paginasi.php');

          while ($data = mysqli_fetch_array($dt)) {
            ?>
            <tr>
              <td><?php echo $no ?></td>
              <td><?php echo $data['asal_instansi'] ?></td>
              <td><?php echo TanggalIndo($data['tgl_masuk']) ?></td>
              <td><?php echo TanggalIndo($data['tgl_keluar']) ?></td>
              <td><?php echo $data['nama_penempatan'] ?></td>
              <td><?php echo $data['nama_penanggung_jawab'] ?></td>
              <td>
                <ul class="list-inline m-0">
                  <li class="list-inline-item">
                    <a href="?page=peserta-selesai&id=<?php echo $data['id_kklp'] ?>"
                      class="btn btn-secondary btn-sm rounded-3 mt-1"><i class="fa fa-user"></i> Detail Peserta</a>
                  </li>
                </ul>
              </td>
            </tr>

            <!-- MODAL EDIT -->
            <div class="modal fade" id="<?php echo "editModal" . $no ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">

                  <div class="modal-header border-bottom-secondary">
                    <h5 class="modal-title text-gray-900">Peserta <?php echo $data['asal_instansi'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body text-gray-900">
                    <ol class="list-group d-flex">
                      <?php
                      $qry_pserta = mysqli_query($mysqli, "SELECT * FROM tb_user WHERE id_kklp = " . $data['id_kklp'] . "");

                      while ($peserta = mysqli_fetch_array($qry_pserta)) { ?>
                        <li class="list-group-item text-center"><a
                            href="?page=laporan-peserta&id=<?php echo $peserta['id'] ?>"><?php echo $peserta['nama_lengkap'] ?></a>
                        </li>
                      <?php } ?>
                    </ol>
                  </div>
                </div>
              </div>
            </div>
            <?php $no++;
          } ?>
        </tbody>
      </table>
    </div>

  </div>
</div>

<!-- </div> -->


<!-- Modal ADD DATA -->
<div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">

      <div class="modal-header border-bottom-secondary">
        <h5 class="modal-title text-gray-900">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="controller.php?page=penerimaan-kklp&action=insert" method="POST" enctype="multipart/form-data">
        <div class="modal-body text-gray-900">
          <div class="form-group">
            <label for="data2">Asal Instansi</label>
            <input type="text" class="form-control" name="asal_instansi" required="required">
          </div>
          <div class="form-group">
            <label for="data2">Tanggal Masuk</label>
            <input type="date" class="form-control" name="tgl_masuk" required="required">
          </div>
          <div class="form-group">
            <label for="data2">Tanggal Keluar</label>
            <input type="date" class="form-control" name="tgl_keluar" required="required">
          </div>
          <div class="form-group">
            <label for="data2">Penempatan</label>
            <select name="id_penempatan" id="penempatan" class="form-control show-tick">
              <?php
              $qry = mysqli_query($mysqli, "SELECT * FROM tb_penempatan");
              while ($penempatan = mysqli_fetch_array($qry)) { ?>
                <option value="<?php echo $penempatan['id'] ?>"><?php echo $penempatan['nama_penempatan'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="data2">Penanggung Jawab</label>
            <select name="id_penanggung_jawab" id="penanggung_jawab" class="form-control show-tick">
              <?php
              $qry = mysqli_query($mysqli, "SELECT * FROM tb_penanggung_jawab");
              while ($pj = mysqli_fetch_array($qry)) { ?>
                <option value="<?php echo $pj['id'] ?>"><?php echo $pj['nama_penanggung_jawab'] ?></option>
              <?php } ?>
            </select>
          </div>
          <div class="form-group">
            <label for="data2">Surat Penerimaan</label>
            <input type="file" class="form-control" name="file_name" required="required">
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