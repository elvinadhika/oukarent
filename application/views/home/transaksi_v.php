

    <div class="ftco-blocks-cover-1">
      <div class="ftco-cover-1 overlay innerpage" style="background-image: url('<?php echo base_url(); ?>assets/images/hero_2.jpg')">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-6 text-center">
              <h1>ORDER YOUR FAVORITE TRANSPORTATION HERE!</h1>
              <p>Outlet Kesayangan Anda Rent</p>
              <p>Your only one solution for an exciting journey in Pulau Dewata, Bali</p>
            </div>
          </div>
        </div>
      </div>
    </div>
 
    <div class="site-section bg-light" id="contact-section">
      <div class="container">
        <div class="row justify-content-center text-center">
        <div class="col-7 text-center mb-5">

          <h2>ORDER YOUR FAVORITE TRANSPORTATION HERE!</h2>
          <p>Outlet Kesayangan Anda Rent</p>
          <p>Your only one solution for an exciting journey in Pulau Dewata, Bali</p>

        </div>
      </div>

        <div class="row">
          <div class="col-lg-8 mb-5" >

            <?php
              $notif = $this->session->flashdata('notif');
              if (!empty($notif))
                echo "<div class='alert alert-danger'>$notif</div>";
            ?>

            <form method="post" action="<?php echo base_url('home/tambah_transaksi/');?>" enctype="multipart/form-data">

              <div class="form-group">
                        <label class="control-label col-xs-3" >ID Transaksi</label>
                        <div class="col-xs-8">
                            <input name="id_transaksi" class="form-control" type="text" value="<?php echo $kode_transaksi?>" readonly required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Penyewa</label>
                        <div class="col-xs-8">
                            <input name="id_penyewa" class="form-control" type="text" value="<?php echo $this->session->userdata('id_penyewa');?>" readonly>
                        </div>
                    </div>

                    <!--
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Kendaraan</label>
                        <div class="col-xs-8">
                            <input name="id_kendaraan" class="form-control" type="text" value="<?php echo $data->id_mobil?>" readonly>
                        </div>
                    </div>
                  -->

                  <div class="form-group">
                        <label class="control-label col-xs-3" >Mobil</label>
                        <select class="form-control" name="id_kendaraan">
                          <?php echo'
                            <option value="'.$data->id_mobil.'">'.$data->id_mobil.'--'.$data->merk.'</option>
                          ';?>
                        </select>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >ID Driver</label>
                        <select class="form-control" name="id_driver">
                          <option>-Pilih Salah Satu-</option>
                          <?php
                            foreach ($driver as $data) {
                                echo '
                                <option value="'.$data->id_driver.'">'.$data->id_driver.'--'.$data->nama_driver.'</option>
                                ';
                            }
                          ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Sewa</label>
                        <div class="col-xs-8">
                            <input name="tgl_sewa" class="form-control" type="date" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Kembali</label>
                        <div class="col-xs-8">
                            <input name="tgl_kembali" class="form-control" type="date" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Tambah" name="submit">
                    </div>
                    

                    <?php
                      if($this->input->post('submit') == TRUE)
                      {
                    ?>

                    <div class="form-group">
                        <label class="control-label col-xs-3" >Tanggal Sewa</label>
                        <div class="col-xs-8">
                            <input name="tgl_sewa" class="form-control" value="<?php echo $data->total_sewa?>" required>
                        </div>
                    </div>

                    <?php
                      } 
                    ?>
                    <!--
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Total Sewa</label>
                        <div class="col-xs-8">
                            <input name="total_sewa" class="form-control" type="text" placeholder="Total Sewa" required>
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Jumlah kendaraan</label>
                        <div class="col-xs-8">
                            <input name="stock_t" class="form-control" type="text" placeholder="Jumlah" required>
                        </div>
                    </div>
                  -->
 
                </div>

            </form>
          </div>
        </div>
      </div>
    </div>