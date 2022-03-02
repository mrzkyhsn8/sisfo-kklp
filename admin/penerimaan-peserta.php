                <!-- Begin Page Content -->
                <!-- <div class="container-fluid"> -->
                <?php
		
        $qry    = "SELECT * FROM (
          SELECT a.id AS id_kklp, a.file_name,a.id_penempatan, a.id_penanggung_jawab, a.asal_instansi, a.tgl_masuk, a.tgl_keluar, b.nama_penempatan, c.nama_penanggung_jawab, c.NIP   FROM tb_kklp a
          LEFT JOIN tb_penempatan b ON a.id_penempatan = b.id
          LEFT JOIN tb_penanggung_jawab c ON a.id_penanggung_jawab = c.id  
          WHERE a.tgl_keluar > date(NOW()) ) A";
        
        $orderby = ""; 
    
        $view   = "penerimaan-peserta";            
    
        $column = [
                'value'  => ['asal_instansi', 'tgl_masuk', 'tgl_keluar', 'nama_penempatan', 'nama_penanggung_jawab'],
                'label'  => ['Asal Instansi', 'Tanggal Masuk','Tanggal Keluar', 'Penempatan', 'Penanggung Jawab'],
                'type'   => ['text', 'date', 'date', 'text', 'text']
              ];
    
    ?>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h4 mb-0 text-gray-800 border-bottom">DAFTAR PENERIMAAN PESERTA</h1>
                            <!-- ditambahin icon surat di kiri tulisannya -->
                            <div>       
                            </div>
                        </div>
    
                        <!-- DataTables Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                              <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                <a href="index.php?page=add-kode-arsip" class="btn btn-outline-dark" data-toggle="modal" data-target="#addDataModal"><i class="fas fa-plus-circle" aria-hidden="true"></i> Tambah</a>
                                <?php  }elseif ($_SESSION['status'] = 'USER') {
                                    echo " - ";
                                  } ?>
                                
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
    
                                <?php include('assets/paginasi/form-pencarian.php'); ?>
                                
                                    <table class="table table-bordered mt-4 mb-4" width="100%" cellspacing="0">
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
                                              $no=1;
    
                                              include('assets/paginasi/main-paginasi.php');
    
                                              while($data = mysqli_fetch_array($dt)){
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
                                                  <?php if ($_SESSION['status'] == 'ADMIN') { ?>
                                                    <!-- action buttons -->
                                                  
                                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#editModal".$no ?>">
                                                      <button class="btn btn-success btn-sm rounded-3 mt-1" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i> Edit</button>
                                                    </li>
                                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                      <button class="confirmation btn btn-danger btn-sm rounded-3 mt-1" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a target="_blank" href="<?php echo $data['file_name'] ?>" class="btn btn-warning btn-sm rounded-3 mt-1"><i class="fa fa-info"></i> Detail</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a href="?page=peserta-kklp&id=<?php echo $data['id_kklp'] ?>" class="btn btn-secondary btn-sm rounded-3 mt-1"><i class="fa fa-user"></i> Peserta</a>
                                                    </li>
                                                  <?php  }elseif ($_SESSION['status'] = 'USER') { ?>
                                                    <li class="list-inline-item">
                                                      <a target="_blank" href="<?php echo $data['file_name'] ?>" class="btn btn-warning btn-sm rounded-3 mt-1"><i class="fa fa-info"></i> Detail</a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                      <a target="_blank" href="<?php echo $data['file_disposisi'] ?>" class="btn btn-primary btn-sm rounded-3 mt-1"><i class="fa fa-info"></i> Disposisi</a>
                                                    </li>
                                                    <?php } ?>
                                                </ul>
                                                </td>
                                            </tr>
                                            <!-- Modal Edit -->
                                            
    
                                            <!-- Modal Delete -->
                                            <!-- Modal DELETE DATA -->
                                            <div class="modal fade" id="<?php echo "deleteModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModal">Yakin ingin menghapus data ini?</h5>
                                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">Klik "Hapus" jika anda yakin ingin menghapus data ini.</div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                            <a class="btn btn-danger" href="controller.php?page=surat-masuk-new&action=delete&id=<?php echo $data['id'] ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- MODAL EDIT -->
                                            <div class="modal fade" id="<?php echo "editModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
    
                                                  <div class="modal-header border-bottom-secondary">
                                                    <h5 class="modal-title text-gray-900">Edit - Kode Arsip</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
    
                                                  <form action="controller.php?page=penerimaan-kklp&action=update" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body text-gray-900">
                                                      
                                                      <div class="form-group">
                                                        <label for="data2">Asal Instansi</label>
                                                        <input type="hidden" name="id" value="<?php echo $data['id_kklp']; ?>">
                                                        <input type="text" class="form-control" name="asal_instansi" required="required" value="<?php echo $data['asal_instansi']; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="data2">Tanggal Masuk</label>
                                                        <input type="date" class="form-control" name="tgl_masuk" required="required" value="<?php echo $data['tgl_masuk']; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="data2">Tanggal Keluar</label>
                                                        <input type="date" class="form-control" name="tgl_keluar" required="required" value="<?php echo $data['tgl_keluar']; ?>">
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="data2">Penempatan</label>
                                                          <select name="id_penempatan" id="penempatan" class="form-control show-tick">
                                                                  <?php  
                                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_penempatan");
                                                                      while($penempatan = mysqli_fetch_array($query)){ ?>
                                                                  <option value="<?php echo $penempatan['id'] ?>" <?php if ($penempatan['id'] == $data['id_penempatan']) {
                                                                    echo "Selected";
                                                                  } ?>><?php echo $penempatan['nama_penempatan'] ?></option>
                                                              <?php } ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group">
                                                          <label for="data2">Penanggung Jawab</label>
                                                          <select name="id_penanggung_jawab" id="penanggung_jawab" class="form-control show-tick">
                                                                  <?php  
                                                                    $query = mysqli_query($mysqli, "SELECT * FROM tb_penanggung_jawab");
                                                                      while($pj = mysqli_fetch_array($query)){ ?>
                                                                  <option value="<?php echo $pj['id'] ?>" <?php if ($penempatan['id'] == $data['id_penempatan']) {
                                                                    echo "Selected";
                                                                  } ?> ><?php echo $pj['nama_penanggung_jawab'] ?></option>
                                                              <?php } ?>
                                                          </select>
                                                      </div>
                                                      <div class="form-group">
                                                        <label for="data2">Surat Penerimaan (Tidak Di Isi Jika tidak berubah)</label>
                                                        <input type="file" class="form-control" name="file_name">
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
                                            <?php $no++;} ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php include('assets/paginasi/btn-paginasi.php'); ?>
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
                              <select name="id_penempatan" id="id_penempatan" class="form-control show-tick">
                              <option value=''> --- Pilih --- </option>
                                      <?php  
                                        $qry = mysqli_query($mysqli, "SELECT * FROM tb_penempatan");
                                          while($penempatan = mysqli_fetch_array($qry)){ ?>
                                      <option value="<?php echo $penempatan['id'] ?>"><?php echo $penempatan['nama_penempatan'] ?></option>
                                  <?php } ?>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="data2">Penanggung Jawab</label>
                              <select name="id_penanggung_jawab" id="id_penanggung_jawab" class="form-control show-tick">
                                <option value=''> --- Pilih --- </option>
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
                
    