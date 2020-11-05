<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header"> Edit Data Mobil</h1>
      </div>

      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-default">
          <div class="panel-body">

            <?php
                        $notif = $this->session->flashdata('notif');
                        if (!empty($notif))
                            echo "<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>$notif</div>";
                    ?>
                    
            <form method="post" action="<?php echo base_url('index.php/admin/edit_car/');?>" enctype="multipart/form-data">
              <div class="col-lg-6">
                <div class="form-group">
                              <label>ID Mobil</label>
                              <input class="form-control" type="text" name="id_mobil" value="<?php echo $data->id_mobil?>" readonly required>
                          </div>

                          <div class="form-group">
                              <label>Merk Mobil</label>
                              <input class="form-control" type="text" name="merk" value="<?php echo $data->merk?>" required>
                          </div>

                          <div class="form-group">
                              <label>Transmission</label>
                              <input class="form-control" type="text" name="transmission" value="<?php echo $data->transmission?>" required>
                          </div>

                          <div class="form-group">
                              <label>Harga Sewa</label>
                              <input class="form-control" type="text" name="harga_sewa" value="<?php echo $data->harga_sewa?>" required>
                          </div>

                          <div class="form-group">
                            <label>Stock</label>
                              <input class="form-control" type="text" name="stock" value="<?php echo $data->stock?>" required>
                          </div>

                          <!--
                          <div class="form-group">
                              <label>Foto</label>
                              <input type='file' id="imgInp" class="form-control" name="foto_kendaraan" required/>
                          </div>
                          -->

                          <input type="submit" class="btn btn-primary" value="Simpan" name="submit">
                          <input type="reset" class="btn btn-default" value="Reset">


                      </div>

                      <div class="col-lg-6">
                          <img src="<?php echo base_url('uploads/kendaraan/').$data->foto_kendaraan;?>" style="height:250px; width:100%; margin-top:10px">
                      </div>
              
            </form>
          </div>            
          </div>
          
        </div>

      </div>
  </div>
</div>