<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Data Petugas</h1>

        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tbl_petugas" data-toggle="tab" aria-expanded="true"> Tabel Petugas </a>
          </li>

          <li>
            <a href="#tmbh_petugas" data-toggle="tab" aria-expanded="true"> Tambah Petugas </a>
          </li>
        </ul>

        <div class="tab-content">

          <!--TAB TABEL MOBIL-->
          <div class="tab-pane fade active in" id="tbl_petugas">
            <form method="post" action="<?php echo base_url('index.php/admin/view_petugas/');?>" enctype="multipart/form-data" >
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
                      <th>ID Petugas</th>
                      <th>Nama</th>
                      <th>No HP</th>
                      <th>username</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      if(isset($petugas)){
                        $no=1;
                        foreach ($petugas as $data) {
                          echo '
                      
                      

                    <tr>
                      <td>'.$no.'</td>
                        <td>'.$data['id_petugas'].'</td>
                        <td>'.$data['nama_petugas'].'</td>
                        <td>'.$data['no_hp_petugas'].'</td>
                        <td>'.$data['username'].'</td>
                        <td>
                            <a href="'.base_url().'index.php/admin/edit_petugas_v/'.$data['id_petugas'].'" type="button" class="fa fa-edit"> | </a>

                            <a href="'.base_url().'index.php/admin/delete_petugas/'.$data['id_petugas'].'" type="button" class="glyphicon glyphicon-trash">  </a>

                        </td>                    
                    </tr>

                    ';
                        $no++;
                      }}
                    ?>

                  </tbody>
                </table>

              </div>
            </form>
          </div>
          <!--END TAB TABEL PENYEWA-->

          <!--TAB TAMBAH PENYEWA-->
          <div class="tab-pane fade" id="tmbh_petugas">
            <form method="post" action="<?php echo base_url('index.php/admin/tambah_petugas/');?>" enctype="multipart/form-data" >
              <div class="panel-body">
                <div class="col-lg-6">
                  <?php
                    $notif = $this->session->flashdata('notif');
                    if (!empty($notif))
                        echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                  ?>

                    <div class="form-group">
                        <label>ID PETUGAS</label>
                        <input class="form-control" type="text" name="id_petugas" value="<?php echo $kode_petugas?>" readonly  required>
                    </div>

                    <div class="form-group">
                        <label>NAMA</label>
                        <input class="form-control" type="text" name="nama_petugas" placeholder="NAMA" required>
                    </div>

                    <div class="form-group">
                        <label>NO HP</label>
                        <input class="form-control" type="text" name="no_hp_petugas" placeholder="NO HP" required>
                    </div>

                    <div class="form-group">
                        <label> USERNAME </label>
                        <input class="form-control" type="text" name="username" placeholder="USERNAME" required>
                    </div>

                    <div class="form-group">
                        <label> Password </label>
                        <input class="form-control" type="text" name="password" placeholder="PASSWORD" required>
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