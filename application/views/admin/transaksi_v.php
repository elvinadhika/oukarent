<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tabel Transaksi</h1>
                </div>

                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                          <?php
                          $notif = $this->session->flashdata('notif');
                          if (!empty($notif))
                            echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                          ?>
                          
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Penyewa</th>
                                        <th>Mobil</th>
                                        <th>Tanggal Sewa</th>
                                        <th>Tanggal Kembali</th>
                                        <th>Deadline</th>
                                        <th>Denda</th>
                                        <th>Status</th>
                                        <th>Aksi</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  <?php foreach ($peminjaman as $pinjam): ?>
                                    <tr>
                                    <td><?php echo $pinjam->nama_penyewa; ?></td>
                                    <td><?php echo $pinjam->merk; ?></td>
                                    <td><?php $tanggalsewa = date_create($pinjam->tgl_sewa);echo date_format($tanggalsewa, "d M Y"); ?>
                                    </td>
                                    <td><?php $tanggalkembali = date_create($pinjam->tgl_kembali);echo date_format($tanggalkembali, "d M Y"); ?>
                                    </td>
                                    <td>
                                        <?php
                                          $tanggalsewa = strtotime($pinjam->tgl_sewa);
                                          $tanggalkembali = strtotime($pinjam->tgl_kembali);
                                          $deadline = 0;
                                              if( $tanggalsewa > $tanggalkembali) 
                                              {
                                                $diff = $tanggalsewa - $tanggalkembali;
                                                $deadline = floor($diff / 86400);
                                                echo $deadline.' Hari Terlambat';
                                              }

                                              else if($tanggalsewa < $tanggalkembali)
                                              {
                                                $diff = $tanggalkembali - $tanggalsewa;
                                                echo (floor($diff / 86400)+1).' Hari lagi';
                                              } else {
                                                echo 'Hari ini deadline';
                                              } ?>
                                    </td>

                                    <td><?php
                                          $tanggalkembali = strtotime($pinjam->tgl_kembali);
                                          $tanggalsewa = strtotime($pinjam->tgl_sewa);
                                          $denda = 0;

                                              if($tanggalsewa > $tanggalkembali) 
                                              {
                                                $diff = $tanggalsewa - $tanggalkembali;
                                                $denda = floor($diff / 86400)*50000;
                                                echo 'Rp'.$denda;
                                              } 

                                              else if($tanggalsewa < $tanggalkembali) 
                                              {
                                                $diff = $tanggalkembali - $tanggalsewa;
                                                echo ' Rp.0';
                                              } else {
                                                echo 'Rp.0';
                                              } ?>
                                                
                                    </td>

                                    <td><?php echo $pinjam->status; ?></td>

                                    <td>
                                      <a href='<?php echo base_url(); ?>index.php/admin/kembali/<?php echo $pinjam->id_transaksi; ?>' type='button' class='btn btn-success'>Kembali</a>
                                    </td>
                                  </tr>
                                  <?php endforeach; ?></tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
