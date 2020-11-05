<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Data Mobil</h1>

        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tbl_mobil" data-toggle="tab" aria-expanded="true"> Tabel Mobil </a>
          </li>

          <li>
            <a href="#tmbh_mobil" data-toggle="tab" aria-expanded="true"> Form Tambah Mobil </a>
          </li>
        </ul>

        <div class="tab-content">

          <!--TAB TABEL MOBIL-->
          <div class="tab-pane fade active in" id="tbl_mobil">
            <form method="post" action="<?php echo base_url('index.php/admin/view_mobil/');?>" enctype="multipart/form-data" >
              <div class="panel-body">

                <?php
                  $notif = $this->session->flashdata('notif');
                  if (!empty($notif))
                      echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                ?>

                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <tr>
                      <th> No </th>
                      <th>ID Mobil</th>
                      <th>Merk</th>
                      <th>Door</th>
                      <th>Seats</th>
                      <th>Transmission</th>
                      <th>Harga Sewa</th>
                      <th>Status</th>
                      <th>Foto Kendaraan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no=1;
                      foreach ($tb_mobil as $data) {
                        echo "

                    <tr>
                      <td>$no</td>
                        <td>$data->id_mobil</td>
                        <td>$data->merk</td>
                        <td>$data->door</td>
                        <td>$data->seats</td>
                        <td>$data->transmission</td>
                        <td>$data->harga_sewa</td>
                        <td>$data->status_c</>
                        <td>
                            <img src='".base_url()."uploads/kendaraan/".$data->foto_kendaraan."' alt='image1' style='width:100px'>
                        </td>
                        <td>
                            <a href='".base_url()."index.php/admin/edit_car_v/$data->id_mobil' type='button' class='fa fa-edit'> | </a>
                            <a href='".base_url()."index.php/admin/hapus_mobil/$data->id_mobil' type='button' class='glyphicon glyphicon-trash'></a>
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
          <!--END TAB TABEL MOBIL-->

          <!--TAB TAMBAH MOBIL-->
          <div class="tab-pane fade" id="tmbh_mobil">
            <form method="post" action="<?php echo base_url('index.php/admin/tambah_mobil/');?>" enctype="multipart/form-data" >
              <div class="panel-body">
                <div class="col-lg-6">
                  <?php
                  $notif = $this->session->flashdata('notif');
                  if (!empty($notif))
                      echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                  ?>

                  <div class="form-group">
                      <label>ID Mobil</label>
                      <input class="form-control" type="text" name="id_mobil" value="<?php echo $kode_mobil?>" required readonly>
                  </div>

                  <div class="form-group">
                      <label>Merk Mobil</label>
                      <input class="form-control" type="text" name="merk" placeholder="Merk" required>
                  </div>

                  <div class="form-group">
                         <label>Satus</label>
                        <input class="form-control" type="text" name="status_c" placeholder="status" required>
                  </div>

                  <div class="form-group">
                         <label>Jenis</label>
                          <select class="form-control" name="jenis">
                              <option> Pilih Salah Satu </option>
                              <option value="Motor"> Motor </option>
                              <option value="Mobil"> Mobil </option>
                          </select>
                  </div>

                  <div class="form-group">
                        <label>Door</label>
                        <select class="form-control" name="door">
                              <option> Pilih Salah Satu </option>
                              <option value="---"> Tidak ada </option>
                              <option value="4"> 4 </option>
                              <option value="3"> 3 </option>
                              <option value="2"> 2 </option>
                          </select>
                  </div>

                  <div class="form-group">
                        <label>Seats</label>
                         <select class="form-control" name="seats">
                              <option> Pilih Salah Satu </option>
                              <option value="---"> Tidak ada </option>
                              <option value="6"> 6 </option>
                              <option value="5"> 5 </option>
                              <option value="4"> 4 </option>
                              <option value="3"> 3 </option>
                              <option value="2"> 2 </option>
                          </select>
                  </div>
                  
                  <div class="form-group">
                         <label>Transmission</label>
                        <select class="form-control" name="transmission">
                              <option> Pilih Salah Satu </option>
                              <option value="Manual"> Manual </option>
                              <option value="Matic"> Matic </option>
                          </select>
                  </div>

                  <div class="form-group">
                      <label>Harga Sewa</label>
                        <input class="form-control" type="text" name="harga_sewa" placeholder="harga_sewa" required>
                  </div>

                  <div class="form-group">
                        <label>Foto</label>
                        <input type='file' id="imgInp" class="form-control" name="foto_kendaraan" required/>
                  </div>

                  <div class="form-group">
                      <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                      <input type="reset" class="btn btn-default" value="Reset">
                  </div>

                </div>

                <div class="col-lg-6">
                    <img id="blah" src="#" alt="your image" class="form-control" style="height:250px; width:100%; margin-top:10px"/>
                </div>

              </div>
            </form>
          </div>
          <!--END TAB TAMBAH MOBIL-->



        </div>



        <!--END BODY CONTENT-->
      </div>
    </div>
  </div>
</div>