<?php 
    $ID_KKLP = $_GET['id'];
    $qry_prof = mysqli_query($mysqli, "SELECT * FROM tb_kklp WHERE id = $ID_KKLP");
    $prof = mysqli_fetch_array($qry_prof); ?>
                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <div>       
                                <a href="?page=peserta-tempat" class="btn btn-warning"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
                            <h1 class="h4 mb-0 text-gray-800 border-bottom"><?php echo $prof['asal_instansi'] ?></h1>
                            <!-- ditambahin icon surat di kiri tulisannya -->
                            
                        </div>
    
                        <!-- DataTables Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                Selesai Pada Tanggal : <?php echo TanggalIndo($prof['tgl_keluar']) ?>  
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                
                                    <table class="table table-bordered mt-4 mb-4" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nomor Induk</th>
                                                <th>Nama Lengkap</th>
                                                <th>Jenis Kelamin</th>
                                                <th>Program Studi</th>
                                                <th>No. HP</th>
                                                <th>Surel</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                              $no=1;
    
                                              $dt    = mysqli_query($mysqli, "SELECT * FROM tb_user WHERE id_kklp = $ID_KKLP");
    
                                              while($data = mysqli_fetch_array($dt)){
                                            ?>
                                            <tr>
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $data['nomor_induk'] ?></td>
                                                <td><?php echo $data['nama_lengkap'] ?></td>
                                                <td><?php if($data['jkel'] == 'L') {echo "Laki-Laki";} else {echo "perempuan";} ?></td>
                                                <td><?php echo $data['prodi'] ?></td>
                                                <td><?php echo $data['no_hp'] ?></td>
                                                <td><?php echo $data['email'] ?></td>
                                                <td>
                                                  <ul class="list-inline m-0">
                                                  
                                                    
                                                    <li class="list-inline-item" data-toggle="modal" data-target="<?php echo "#deleteModal".$no ?>">
                                                      <button class="confirmation btn btn-danger btn-sm mt-1" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i> Delete</button>
                                                    </li>
                                                    
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
                                                            <a class="btn btn-danger" href="controller.php?page=peserta-kklp&action=delete&id=<?php echo $data['id'] ?>&id_kklp=<?php echo $ID_KKLP; ?>">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <!-- MODAL EDIT -->
                                            <div class="modal fade" id="<?php echo "editModal".$no ?>" tabindex="-1" role="dialog" aria-hidden="true">
                                              <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
    
                                                  <div class="modal-header border-bottom-secondary">
                                                    <h5 class="modal-title text-gray-900">Edit - Penanggung Jawab</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
    
                                                  <form action="controller.php?page=peserta-kklp&action=update" method="POST" enctype="multipart/form-data">
                                                    <div class="modal-body text-gray-900">
                                                    <h3>Data Peserta</h3>
                                                    <div class="form-group">
                                                      <label for="data2">Nomor Induk</label>
                                                      <input type="hidden" name="id_kklp" value="<?php echo $ID_KKLP; ?>">
                                                      <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                      <input type="text" class="form-control" name="nomor_induk" required="required" value="<?php echo $data['nomor_induk']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="data2">Nama Lengkap</label>
                                                      <input type="text" class="form-control" name="nama_lengkap" required="required" value="<?php echo $data['nama_lengkap']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="data2">Program Studi</label>
                                                      <input type="text" class="form-control" name="prodi" required="required" value="<?php echo $data['prodi']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="data2">Jenis Kelamin</label>
                                                      <select name="jkel" id="" class="form-control">
                                                        <option value="L" <?php if($data['jkel'] == "L") {echo "Selected";}  ?>>Laki - Laki</option>
                                                        <option value="P" <?php if($data['jkel'] == "P") {echo "Selected";}  ?>>perempuan</option>
                                                      </select>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="data2">No. HP</label>
                                                      <input type="text" class="form-control" name="no_hp" required="required" value="<?php echo $data['no_hp']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="data2">Surel (E-Mail)</label>
                                                      <input type="text" class="form-control" name="email" required="required" value="<?php echo $data['email']; ?>">
                                                    </div>
                                                    <h3>Akun Peserta</h3>
                                                    <div class="form-group">
                                                      <label for="data2">Username</label>
                                                      <input type="text" class="form-control" name="username" required="required" value="<?php echo $data['username']; ?>">
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="data2">Password (Tidak di isi jika tidak berubah)</label>
                                                      <input type="password" class="form-control" name="password">
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
                                
                            </div>
                        </div>
    
                <!-- </div> -->
                
    
                <!-- Modal ADD DATA -->
                <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
    
                      <div class="modal-header border-bottom-secondary">
                        <h5 class="modal-title text-gray-900">Tambah Penanggung Jawab</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
    
                      <form action="controller.php?page=peserta-kklp&action=insert" method="POST" enctype="multipart/form-data">
                        <div class="modal-body text-gray-900">
                          <h3>Data Peserta</h3>
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
                
    