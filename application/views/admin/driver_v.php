<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Data Driver</h1>

        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tbl_driver" data-toggle="tab" aria-expanded="true"> Tabel Penyewa </a>
          </li>

          <li>
            <a href="#tmbh_driver" data-toggle="tab" aria-expanded="true"> Tambah Driver </a>
          </li>
        </ul>

        <div class="tab-content">

          <!--TAB TABEL MOBIL-->
          <div class="tab-pane fade active in" id="tbl_driver">
            <form method="post" action="<?php echo base_url('index.php/admin/view_driver/');?>" enctype="multipart/form-data" >
              <div class="panel-body">

                <?php
                  $notif = $this->session->flashdata('notif');
                  if (!empty($notif))
                      echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                ?>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>ID Driver</th>
                      <th>Nama</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th> Bayaran </th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no=1;
                      foreach ($driver as $data) {
                        echo "

                    <tr>
                      <td>$no</td>
                        <td>$data->id_driver</td>
                        <td>$data->nama_driver</td>
                        <td>$data->alamat_driver</td>
                        <td>$data->no_hp</td>
                        <td>$data->harga_driver</td>
                        <td>
                            <a href='".base_url()."index.php/admin/edit_driver_v/$data->id_driver' type='button' class='fa fa-edit'> | </a>
                            <a href='".base_url()."index.php/admin/hapus_driver/$data->id_driver' type='button' class='glyphicon glyphicon-trash'></a>
                        </td>                     
                    </tr>

                    ";
                        $no++;
                      }
                    ?>

                  </tbody>
                </table>

              </div>
            </form>
          </div>
          <!--END TAB TABEL PENYEWA-->

          <!--TAB TAMBAH PENYEWA-->
          <div class="tab-pane fade" id="tmbh_driver">
            <form method="post" action="<?php echo base_url('index.php/admin/tambah_driver/');?>" enctype="multipart/form-data" >
              <div class="panel-body">
                <div class="col-lg-6">
                  <?php
                    $notif = $this->session->flashdata('notif');
                    if (!empty($notif))
                        echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                  ?>

                    <div class="form-group">
                        <label>ID DRIVER</label>
                        <input class="form-control" type="text" name="id_driver" value="<?php echo $kode_driver?>" readonly required>
                    </div>

                    <div class="form-group">
                        <label>NAMA</label>
                        <input class="form-control" type="text" name="nama_driver" placeholder="NAMA" required>
                    </div>

                    <div class="form-group">
                        <label>ALAMAT</label>
                        <input class="form-control" type="text" name="alamat_driver" placeholder="ALAMAT" required>
                    </div>

                    <div class="form-group">
                        <label>NO HP</label>
                        <input class="form-control" type="text" name="no_hp" placeholder="NO HP" required>
                    </div>

                    <div class="form-group">
                        <label> BIAYA SEWA </label>
                        <input class="form-control" type="text" name="harga_driver" placeholder="BIAYA SEWA" required>
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                        <input type="reset" class="btn btn-default" value="Reset">
                    </div>

                  </div>

              </div>
            </form>
          </div>
          <!--END TAB TAMBAH PENYEWA-->

        </div>



        <!--END BODY CONTENT-->
      </div>
    </div>
  </div>
</div>