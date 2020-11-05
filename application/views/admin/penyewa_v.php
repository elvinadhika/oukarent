<div id="page-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="page-header"> Data Penyewa</h1>

        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tbl_penyewa" data-toggle="tab" aria-expanded="true"> Tabel Penyewa </a>
          </li>
        </ul>

        <div class="tab-content">

          <!--TAB TABEL MOBIL-->
          <div class="tab-pane fade active in" id="tbl_penyewa">
            <form method="post" action="<?php echo base_url('index.php/admin/view_penyewa/');?>" enctype="multipart/form-data" >
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
                      <th>ID Penyewa</th>
                      <th>Nama Penyewa</th>
                      <th>Alamat</th>
                      <th>No HP</th>
                      <th>Email</th>
                      <th>Username</th>
                      <th>Foto KTP</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php
                      $no=1;
                      foreach ($penyewa as $data) {
                        echo "

                    <tr>
                      <td>$no</td>
                        <td>$data->id_penyewa</td>
                        <td>$data->nama_penyewa</td>
                        <td>$data->alamat_penyewa</td>
                        <td>$data->no_hp_penyewa</td>
                        <td>$data->email_penyewa</td>
                        <td>$data->username_penyewa</td>
                        <td>
                            <img src='".base_url()."uploads/ktp/".$data->foto."' alt='image1' style='width:100px'>
                        </td>
                        <td>
                            <a href='".base_url()."index.php/admin/hapus_penyewa/$data->id_penyewa' type='button' class='glyphicon glyphicon-trash'></a>
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

        </div>



        <!--END BODY CONTENT-->
      </div>
    </div>
  </div>
</div>